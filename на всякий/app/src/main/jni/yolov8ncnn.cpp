// Tencent is pleased to support the open source community by making ncnn available.
//
// Copyright (C) 2021 THL A29 Limited, a Tencent company. All rights reserved.
//
// Licensed under the BSD 3-Clause License (the "License"); you may not use this file except
// in compliance with the License. You may obtain a copy of the License at
//
// https://opensource.org/licenses/BSD-3-Clause
//
// Unless required by applicable law or agreed to in writing, software distributed
// under the License is distributed on an "AS IS" BASIS, WITHOUT WARRANTIES OR
// CONDITIONS OF ANY KIND, either express or implied. See the License for the
// specific language governing permissions and limitations under the License.

#include <android/asset_manager_jni.h>
#include <android/native_window_jni.h>
#include <android/native_window.h>

#include <android/log.h>

#include <jni.h>

#include <string>
#include <vector>

#include <platform.h>
#include <benchmark.h>

#include "yolo.h"

#include "ndkcamera.h"

#include <opencv2/core/core.hpp>
#include <opencv2/imgproc/imgproc.hpp>
# include <map>
# include <unordered_set>


#if __ARM_NEON
#include <arm_neon.h>
#endif // __ARM_NEON


static int draw_unsupported(cv::Mat &rgb) {
    const char text[] = "unsupported";

    int baseLine = 0;
    cv::Size label_size = cv::getTextSize(text, cv::FONT_HERSHEY_SIMPLEX, 1.0, 1, &baseLine);

    int y = (rgb.rows - label_size.height) / 2;
    int x = (rgb.cols - label_size.width) / 2;

    cv::rectangle(rgb, cv::Rect(cv::Point(x, y),
                                cv::Size(label_size.width, label_size.height + baseLine)),
                  cv::Scalar(255, 255, 255), -1);

    cv::putText(rgb, text, cv::Point(x, y + label_size.height),
                cv::FONT_HERSHEY_SIMPLEX, 1.0, cv::Scalar(0, 0, 0));

    return 0;
}

static int draw_fps(cv::Mat &rgb) {
    // resolve moving average
    float avg_fps = 0.f;
    {
        static double t0 = 0.f;
        static float fps_history[10] = {0.f};

        double t1 = ncnn::get_current_time();
        if (t0 == 0.f) {
            t0 = t1;
            return 0;
        }

        float fps = 1000.f / (t1 - t0);
        t0 = t1;

        for (int i = 9; i >= 1; i--) {
            fps_history[i] = fps_history[i - 1];
        }
        fps_history[0] = fps;

        if (fps_history[9] == 0.f) {
            return 0;
        }

        for (int i = 0; i < 10; i++) {
            avg_fps += fps_history[i];
        }
        avg_fps /= 10.f;
    }

    char text[32];
    sprintf(text, "FPS=%.2f", avg_fps);

    int baseLine = 0;
    cv::Size label_size = cv::getTextSize(text, cv::FONT_HERSHEY_SIMPLEX, 0.5, 1, &baseLine);

    int y = 0;
    int x = rgb.cols - label_size.width;

    cv::rectangle(rgb, cv::Rect(cv::Point(x, y),
                                cv::Size(label_size.width, label_size.height + baseLine)),
                  cv::Scalar(255, 255, 255), -1);

    cv::putText(rgb, text, cv::Point(x, y + label_size.height),
                cv::FONT_HERSHEY_SIMPLEX, 0.5, cv::Scalar(0, 0, 0));

    return 0;
}

static Yolo *g_yolo = 0;
static ncnn::Mutex lock;

class MyNdkCamera : public NdkCameraWindow {
public:
    virtual void on_image_render(cv::Mat &rgb) const;
};


//typedef struct _JNI_POSREC {
//    jclass cls;
//    jmethodID constructortorID;
//    jfieldID labelID;
//    jfieldID probID;
//    jfieldID x0ID;
//    jfieldID x1ID;
//    jfieldID y0ID;
//    jfieldID y1ID;
//} JNI_POSREC;
//
//JNI_POSREC *jniPosRec = NULL;
//
//void LoadJniPosRec(JNIEnv *env) {
//
//    jniPosRec = new JNI_POSREC;
//
//    if (jniPosRec != NULL)
//        return;
//
//    jniPosRec->cls = env->FindClass("com/tencent/yolov8ncnn/SimpleObjects");
//
//    if (jniPosRec->cls != NULL)
//        printf("sucessfully created class");
//
//    jniPosRec->constructortorID = env->GetMethodID(jniPosRec->cls, "<init>", "()V");
//    if (jniPosRec->constructortorID != NULL) {
//        printf("sucessfully created ctorID");
//    }
//
//    jniPosRec->labelID = env->GetFieldID(jniPosRec->cls, "label", "I");
//    jniPosRec->probID = env->GetFieldID(jniPosRec->cls, "prob", "F");
//    jniPosRec->x0ID = env->GetFieldID(jniPosRec->cls, "x0", "F");
//    jniPosRec->x1ID = env->GetFieldID(jniPosRec->cls, "x1", "F");
//    jniPosRec->y0ID = env->GetFieldID(jniPosRec->cls, "y0", "F");
//    jniPosRec->y1ID = env->GetFieldID(jniPosRec->cls, "y1", "F");
//}
//
//void FillSimpleObjects(JNIEnv *env, jobject jPosRec, SimpleObject *cPosRec) {
//
//    env->SetIntField(jPosRec, jniPosRec->labelID, (jint) cPosRec->label);
//    env->SetFloatField(jPosRec, jniPosRec->probID, (jfloat) cPosRec->prob);
//    env->SetFloatField(jPosRec, jniPosRec->x0ID, (jfloat) cPosRec->x0);
//    env->SetFloatField(jPosRec, jniPosRec->x1ID, (jfloat) cPosRec->x1);
//    env->SetFloatField(jPosRec, jniPosRec->y0ID, (jfloat) cPosRec->y0);
//    env->SetFloatField(jPosRec, jniPosRec->y1ID, (jfloat) cPosRec->y1);
//}


std::map<int, std::vector<float> *> detected;
int current_room_type = -1;
enum class Rooms {
    Bedroom,
    Bathroom,
    Kitchen
};

static const char *class_names[] = {
        "bath", "ceiling_finish", "ceiling_rough", "cupboard_kitchen", "door", "floor_finish",
        "floor_rough", "no_door", "radiator", "sink", "slope", "socket", "switch", "toilet",
        "trash", "wall_finish", "wall_no", "wall_plaster", "wall_rough", "windowsill"
};

bool in_vector(std::vector<int> vec, int item) {
    return std::find(vec.begin(), vec.end(), item) != vec.end();
}

void MyNdkCamera::on_image_render(cv::Mat &rgb) const {
    // nanodet

    int threshold = 0.0;
    if (this->state){
        ncnn::MutexLockGuard g(lock);
        {
            if (g_yolo) {
//            std::vector<SimpleObject> s_objects;
                std::vector<Object> objects;
                g_yolo->detect(rgb, objects);
                g_yolo->draw(rgb, objects);
                std::vector<Object>::iterator obj_iterator = objects.begin();
                while (obj_iterator != objects.end()) {
                    switch (current_room_type) {
                        //TODO: MAKE threshold logic
                        case (int) Rooms::Bathroom:
                            break;
                        case (int) Rooms::Bedroom:
                            break;
                        case (int) Rooms::Kitchen:
                            break;
                    }
                    if (detected.count(obj_iterator->label) > 0) {
                        // found
                        detected[obj_iterator->label]->push_back(obj_iterator->prob);
                    } else {
                        // not found
                        detected[obj_iterator->label] = new std::vector<float>;
                        detected[obj_iterator->label]->push_back(obj_iterator->prob);
                    }
                    obj_iterator++;
                }

//            all_frames.push_back(s_objects);
            } else {
                draw_unsupported(rgb);
            }
        }
    }
    draw_fps(rgb);
}

static MyNdkCamera *g_camera = 0;

extern "C" {

JNIEXPORT jint JNI_OnLoad(JavaVM *vm, void *reserved) {
    __android_log_print(ANDROID_LOG_DEBUG, "ncnn", "JNI_OnLoad");

    g_camera = new MyNdkCamera;

    return JNI_VERSION_1_4;
}

JNIEXPORT void JNI_OnUnload(JavaVM *vm, void *reserved) {
    __android_log_print(ANDROID_LOG_DEBUG, "ncnn", "JNI_OnUnload");

    {
        ncnn::MutexLockGuard g(lock);

        delete g_yolo;
        g_yolo = 0;
    }

    delete g_camera;
    g_camera = 0;
}



// public native boolean loadModel(AssetManager mgr, int modelid, int cpugpu);
JNIEXPORT jboolean JNICALL
Java_com_tencent_yolov8ncnn_Yolov8Ncnn_loadModel(JNIEnv *env, jobject thiz, jobject assetManager,
                                                 jint modelid, jint cpugpu) {
    if (modelid < 0 || modelid > 6 || cpugpu < 0 || cpugpu > 1) {
        return JNI_FALSE;
    }

    AAssetManager *mgr = AAssetManager_fromJava(env, assetManager);

    __android_log_print(ANDROID_LOG_DEBUG, "ncnn", "loadModel %p", mgr);

    const char *modeltypes[] =
            {
                    "m",
                    "n",
                    "s",
            };

    const int target_sizes[] =
            {
                    640,
                    640,
            };

    const float mean_vals[][3] =
            {
                    {103.53f, 116.28f, 123.675f},
                    {103.53f, 116.28f, 123.675f},
            };

    const float norm_vals[][3] =
            {
                    {1 / 255.f, 1 / 255.f, 1 / 255.f},
                    {1 / 255.f, 1 / 255.f, 1 / 255.f},
            };

    const char *modeltype = modeltypes[(int) modelid];
    int target_size = target_sizes[(int) modelid];
    bool use_gpu = (int) cpugpu == 1;

    // reload
    {
        ncnn::MutexLockGuard g(lock);

        if (use_gpu && ncnn::get_gpu_count() == 0) {
            // no gpu
            delete g_yolo;
            g_yolo = 0;
        } else {
            if (!g_yolo)
                g_yolo = new Yolo;
            g_yolo->load(mgr, modeltype, target_size, mean_vals[(int) modelid],
                         norm_vals[(int) modelid], use_gpu);
        }
    }

    return JNI_TRUE;
}

// public native boolean openCamera(int facing);
JNIEXPORT jboolean

JNICALL Java_com_tencent_yolov8ncnn_Yolov8Ncnn_openCamera(JNIEnv *env, jobject thiz, jint facing) {
    if (facing < 0 || facing > 1)
        return JNI_FALSE;

    __android_log_print(ANDROID_LOG_DEBUG, "ncnn", "openCamera %d", facing);

    g_camera->open((int) facing);

    return JNI_TRUE;
}

// public native boolean closeCamera();
JNIEXPORT jboolean
JNICALL Java_com_tencent_yolov8ncnn_Yolov8Ncnn_closeCamera(JNIEnv *env, jobject thiz) {
    __android_log_print(ANDROID_LOG_DEBUG, "ncnn", "closeCamera");

    g_camera->close();

    return JNI_TRUE;
}

JNIEXPORT jboolean
JNICALL Java_com_tencent_yolov8ncnn_Yolov8Ncnn_changeState(JNIEnv *env, jobject thiz) {
    __android_log_print(ANDROID_LOG_DEBUG, "ncnn", "ChangeState");
    g_camera->state = !g_camera->state;
    return JNI_TRUE;
}


// public native boolean setOutputWindow(Surface surface);
JNIEXPORT jboolean

JNICALL
Java_com_tencent_yolov8ncnn_Yolov8Ncnn_setOutputWindow(JNIEnv *env, jobject thiz, jobject surface) {
    ANativeWindow *win = ANativeWindow_fromSurface(env, surface);

    __android_log_print(ANDROID_LOG_DEBUG, "ncnn", "setOutputWindow %p", win);

    g_camera->set_window(win);

    return JNI_TRUE;
}

JNIEXPORT jobject  JNICALL
Java_com_tencent_yolov8ncnn_Yolov8Ncnn_getData(JNIEnv *env, jobject thiz) {
    jclass hashMapClass = env->FindClass("java/util/HashMap");
    if (hashMapClass == NULL) {
        return NULL;                // alternatively, throw exception (recipeNo019)
    }
    jmethodID hashMapClassConstructorID = env->GetMethodID(hashMapClass, "<init>", "()V");

    jobject hashMap = env->NewObject(hashMapClass, hashMapClassConstructorID);

    jmethodID putMethodID
            = env->GetMethodID(
                    hashMapClass,
                    "put",
                    "(Ljava/lang/Object;Ljava/lang/Object;)Ljava/lang/Object;");

    if(putMethodID == NULL) {
        return NULL;                           // ...
    }


    jclass floatClass = env->FindClass("java/lang/Float");
    if (floatClass == NULL) {
        return NULL;                // alternatively, throw exception (recipeNo019)
    }
    jmethodID floatConstructorID = env->GetMethodID(floatClass, "<init>", "(F)V");
    if (floatConstructorID == NULL) {
        return NULL;
    }

    jclass vectorClass = env->FindClass("java/util/Vector");
    if (vectorClass == NULL) {
        return NULL;                // alternatively, throw exception (recipeNo019)
    }
    jmethodID vectorConstructorID = env->GetMethodID(vectorClass, "<init>", "()V");
    if (vectorConstructorID == NULL) {
        return NULL;                // alternatively, throw exception (recipeNo019)
    }
    jmethodID addMethodID = env->GetMethodID(vectorClass, "add", "(Ljava/lang/Object;)Z");

    jclass intClass = env->FindClass("java/lang/Integer");
    if (intClass == NULL) {
        return NULL;                // alternatively, throw exception (recipeNo019)
    }
    jmethodID intConstructorID = env->GetMethodID(intClass, "<init>", "(I)V");
    if (intConstructorID == NULL) {
        return NULL;                // alternatively, throw exception (recipeNo019)
    }
    for (auto const &pair: detected) {
        // Now, we have object created by Float(f)
        jobject javaVector = env->NewObject(vectorClass, vectorConstructorID);
        for (float i: *pair.second){
            jobject floatValue = env->NewObject(floatClass, floatConstructorID, i);
            env->CallBooleanMethod(javaVector, addMethodID, floatValue);
        }
        jobject key = env->NewObject(intClass, intConstructorID, pair.first);
        env->CallObjectMethod(hashMap, putMethodID, key, javaVector);

    }
    env->DeleteLocalRef(vectorClass);
    env->DeleteLocalRef(floatClass);
    env->DeleteLocalRef(hashMapClass);
    env->DeleteLocalRef(intClass);
    detected.clear();
    return hashMap;
}

}

extern "C"
JNIEXPORT jobject JNICALL
Java_com_tencent_yolov8ncnn_Yolov8Ncnn_getClasses(JNIEnv *env, jobject thiz) {
    jclass vectorClass = env->FindClass("java/util/Vector");
    if (vectorClass == NULL) {
        return NULL;                // alternatively, throw exception (recipeNo019)
    }
    jclass stringClass = env->FindClass("java/lang/String");
    if (vectorClass == NULL) {
        return NULL;                // alternatively, throw exception (recipeNo019)
    }
    jmethodID vectorConstructorID = env->GetMethodID(vectorClass, "<init>", "()V");
    if (vectorConstructorID == NULL) {
        return NULL;                // alternatively, throw exception (recipeNo019)
    }
    jmethodID addMethodID = env->GetMethodID(vectorClass, "add", "(Ljava/lang/Object;)Z");
    jmethodID stringConstructorID = env->GetMethodID(stringClass, "<init>",
                                                     "([BLjava/lang/String;)V");

    if (stringConstructorID == NULL) {
        return NULL;
    }
    // Outer vector
    jobject javaVector = env->NewObject(vectorClass, vectorConstructorID);
    if (javaVector == NULL) {
        return NULL;                // as above
    }

    for (const char *i: class_names) {
        // Now, we have object created by Float(f)

        jbyteArray byteArray = env->NewByteArray(strlen(i));
        env->SetByteArrayRegion(byteArray, 0, strlen(i), (jbyte *) i);

        jstring newString = (jstring) env->NewObject(stringClass, stringConstructorID, byteArray,
                                                     env->NewStringUTF("UTF-8"));



//        jobject strValue = env->NewObject(stringClass, stringConstructorID, (jstring)i);
//        if(strValue == NULL) {
//            return NULL;
//        }
        env->CallBooleanMethod(javaVector, addMethodID, newString);
    }
    env->DeleteLocalRef(vectorClass);
    env->DeleteLocalRef(stringClass);
    return javaVector;
}