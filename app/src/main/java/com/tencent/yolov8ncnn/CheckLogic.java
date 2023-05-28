package com.tencent.yolov8ncnn;

import java.util.HashMap;
import java.util.Vector;

public class CheckLogic {

    public static int getIndexOfMaximum( float[] array )
    {
        if ( array == null || array.length == 0 ) return -1; // null or empty

        int max_ = 0;
        for ( int i = 1; i < array.length; i++ )
        {
            if ( array[i] > array[max_] ) max_ = i;
        }
        return max_; // position of the first largest found
    }

    public static void compareAndResetClasses(HashMap<Integer, Float> room, int[] classes){
        float[] probs = new float[classes.length];
        for(int i = 0; i < probs.length; i++){
            probs[i] = room.get(classes[i]);
         }
        int more_probable_class = getIndexOfMaximum(probs);
        for(int i = 0; i < classes.length; i++){
            if (i != more_probable_class){
                room.put(classes[i], 0.0f);
            }
        }
    }
}
