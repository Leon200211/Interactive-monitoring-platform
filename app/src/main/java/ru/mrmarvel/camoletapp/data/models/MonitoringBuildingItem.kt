package ru.mrmarvel.camoletapp.data.models

import java.util.Date

data class MonitoringBuildingItem (
    var id: Int = idGenerator++,
    var name: String,
    var date: Date,
    var coordinates: String,

) {
    companion object {
        private var idGenerator = 1
    }
}