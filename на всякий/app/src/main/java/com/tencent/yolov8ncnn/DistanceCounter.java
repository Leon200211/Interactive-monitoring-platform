package com.tencent.yolov8ncnn;

import java.util.stream.Stream;

public class DistanceCounter {
    public double degreesToRadians(double degrees){
        return degrees * Math.PI / 180;
    }
    public double calculateDistance(double lat1, double lon1, double lat2, double lon2){
        float earthRadiusKm = 6371.0f;
        double dLat = degreesToRadians(lat2-lat1);
        double dLon = degreesToRadians(lon2-lon1);

        lat1 = degreesToRadians(lat1);
        lat2 = degreesToRadians(lat2);
        double a = Math.sin(dLat/2) * Math.sin(dLat/2) +
                Math.sin(dLon/2) * Math.sin(dLon/2) * Math.cos(lat1) * Math.cos(lat2);
        double c =  2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a));
        return earthRadiusKm * c;
    }
    public double[] split(String coords){
        double[] arr = Stream.of(coords.split(","))
                .mapToDouble (Double::parseDouble)
                .toArray();
        return arr;
    }
}
