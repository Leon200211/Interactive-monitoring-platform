package com.tencent.yolov8ncnn;

import java.util.Arrays;
import java.util.HashMap;
import java.util.Vector;

public class CheckLogic {

    // finish, plaster, rough
    static int[] ceilingClasses = {1, 21, 2};
    static int[] wallClasses = {15, 17, 18};
    static int[] floorClasses = {5, 20, 6};
    static int[] allFinishClasses = {0, 1, 3, 5, 8, 9, 10, 13, 15, 19};
    static int[] allIntClasses = {0, 3, 4, 8, 9, 10, 13, 14, 15, 19};
    static int windowsill = 19;
    static int slopes = 10;
    static int socket = 11;
    static int switch_ = 12;

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

    public static float sum(float[] array) {
        float sum = 0;
        for (float value : array) {
            sum += value;
        }
        return sum;
    }

    public static void compareAndResetClasses(HashMap<Integer, Vector<Float>> room, int[] classes){
        float[] probs = new float[classes.length];
        for(int i = 0; i < probs.length; i++){
            int len = room.get(classes[i]).size() - 1;
            probs[i] = room.get(classes[i]).get(len);
         }
        float s = sum(probs);
        if (s == 0.0){
            int len = room.get(classes[2]).size() - 1;
            room.get(classes[2]).set(len, 1.0f);
        }
        else {
            int more_probable_class = getIndexOfMaximum(probs);
            for(int i = 0; i < classes.length; i++){
                if (i != more_probable_class){
                    int len = room.get(classes[i]).size() - 1;
                    room.get(classes[i]).set(len, 0.0f);
                }
                else {
                    int len = room.get(classes[i]).size() - 1;
                    room.get(classes[i]).set(len, 1.0f);
                }
            }
        }
    }

    public static void isWallFinish(HashMap<Integer, Vector<Float>> room) {
        int wallFinishClass = wallClasses[0];
        int last = room.get(wallFinishClass).size() - 1;
        if (room.get(wallFinishClass).get(last) > 0.0f){
            for (int i = 0; i < 3; i++){
                if (i == 0) room.get(ceilingClasses[i]).set(last, 1.0f);
                else room.get(ceilingClasses[i]).set(last, 0.0f);
            }
            if (room.containsKey(windowsill)) {
                room.get(slopes).set(last, 1.0f);
                room.get(windowsill).set(last, 1.0f);
            }
        }
    }

    public static void isFloorFinish(HashMap<Integer, Vector<Float>> room) {
        int floorFinishClass = floorClasses[0];
        int last = room.get(floorFinishClass).size() - 1;
        if (room.get(floorFinishClass).get(last) > 0.0f){
            for (int i = 0; i < 3; i++){
                if (i == 0){
                    room.get(ceilingClasses[i]).set(last, 1.0f);
                    room.get(wallClasses[i]).set(last, 1.0f);
                }
                else {
                    room.get(ceilingClasses[i]).set(last, 0.0f);
                    room.get(wallClasses[i]).set(last, 0.0f);
                }
            }
            if (room.containsKey(windowsill)) {
                room.get(slopes).set(last, 1.0f);
                room.get(windowsill).set(last, 1.0f);
            }
        }
    }

    public static void setSwitchFromSocket(HashMap<Integer, Vector<Float>> room, int socketUpBound) {
        int last = room.get(socket).size() - 1;
        int val = Math.round(room.get(socket).get(last));
        if (room.get(switch_).get(last) > 0.0){
            room.get(switch_).set(last, 1.0f);
            room.get(socket).set(last, (float) Math.max(val, 1.0));
        }
        val = Math.round(room.get(socket).get(last));
        if (val > 0){
            room.get(socket).set(last, (float) Math.max(val, socketUpBound));
            room.get(switch_).set(last, 1.0f);
        }
    }

    public static void roundProbs(HashMap<Integer, Vector<Float>> room, float thres) {
        int last;
        float val;
        for (int i = 0; i < allIntClasses.length; i++) {
            if (room.containsKey(allIntClasses[i])) {
                last = room.get(allIntClasses[i]).size() - 1;
                val = room.get(allIntClasses[i]).get(last);

                // Сорри времени нема, пишем как придется
                room.get(allIntClasses[i]).set(last, val < (i == 14 ? 0.8 : thres) ? 0.0f : 1.0f);
            }
        }
    }

//    public static void isCupboard(FlatStatistic flatStatistic) {
//        boolean isCup = flatStatistic.kitchen.get(3).contains()
//        float val;
//        for (int i = 0; i < allIntClasses.length; i++) {
//            if (room.containsKey(i)) {
//                val = room.get(allIntClasses[i]).get(last);
//                room.get(allIntClasses[i]).set(last, val < thres ? 0.0f : 1.0f);
//            }
//        }
//    }
}
