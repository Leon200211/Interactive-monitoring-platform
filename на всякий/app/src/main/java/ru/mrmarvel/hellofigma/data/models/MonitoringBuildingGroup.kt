package ru.mrmarvel.hellofigma.data.models

import java.util.Date

private var monitoringBuildingGroupIdGenerator = 1

data class MonitoringBuildingGroup (
    var id: Int = monitoringBuildingGroupIdGenerator++,
    var name: String,
    var date: Date,
    var coordinates: String,
    var items: List<MonitoringBuildingItem> = listOf(),
    var opened: Boolean = false
)