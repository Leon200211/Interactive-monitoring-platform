package com.tencent.yolov8ncnn

enum class RoomType {
    KITCHEN, LIVING, SANITARY, HALL;

    fun toText(): String {
        return when (this) {
            KITCHEN -> "Кухня"
            LIVING -> "Жилая"
            SANITARY -> "Санузел"
            HALL -> "Коридор"
        }
        return ""
    }

    fun toEndRoomType(): String {
        return when (this) {
            KITCHEN -> "Кухню"
            LIVING -> "Жилую"
            SANITARY -> "Санузел"
            HALL -> "Коридор"
        }
        return ""
    }


    companion object {
        fun toEnum(room: String?): RoomType? {
            when (room) {
                "Кухня" -> return KITCHEN
                "Жилая" -> return LIVING
                "Санузел" -> return SANITARY
                "Коридор" -> return HALL
            }
            return null
        }
    }
}