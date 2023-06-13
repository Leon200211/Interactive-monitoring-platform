package com.tencent.yolov8ncnn;

import android.content.res.AssetManager;
import android.view.Surface;

import java.util.HashMap;
import java.util.Vector;

public class Yolov8Ncnn
{
    public native boolean loadModel(AssetManager mgr, int modelid, int cpugpu);
    public native boolean openCamera(int facing);
    public native boolean closeCamera();
    public native boolean setOutputWindow(Surface surface);
    public native HashMap<Integer, Vector<Float>> getData();
    public native Vector<String> getClasses();
    public native boolean changeState(boolean state);
    static {
        System.loadLibrary("yolov8ncnn");
    }
}
