package ru.mrmarvel.hellofigma.data

import androidx.compose.runtime.mutableStateListOf
import androidx.compose.runtime.snapshots.SnapshotStateList
import androidx.lifecycle.ViewModel
import ru.mrmarvel.hellofigma.data.models.MonitoringBuildingGroup
import ru.mrmarvel.hellofigma.data.models.MonitoringBuildingItem
import ru.mrmarvel.hellofigma.data.repository.ProjectRepository
import ru.mrmarvel.hellofigma.data.sources.ProjectSource
import ru.mrmarvel.hellofigma.screens.startingDate
import java.util.Calendar


object MonitoringBuildingGroupProvider {

    var monitoringItems: List<MonitoringBuildingGroup>

    init {
        monitoringItems = listOf(
            MonitoringBuildingGroup(name="ЖК Жульен", date= startingDate.time, coordinates = "55.499117, 37.517850", opened = true),
            MonitoringBuildingGroup(name="ЖК Жульен", date= Calendar.Builder().setDate(2023, 5, 23).build().time, coordinates = "55.499117, 37.517850"),
            MonitoringBuildingGroup(name="ЖК Жульен", date= Calendar.Builder().setDate(2023, 6, 2).build().time, coordinates = "55.499117, 37.517850"),
        )
        monitoringItems[0].items = listOf(
            MonitoringBuildingItem(name="Обход № 123. Корпус №1.1", date=monitoringItems[0].date, coordinates = "55.499117, 37.517850")
        )
        monitoringItems[2].items = monitoringItems[0].items + monitoringItems[0].items
    }

}

class SharedViewModel: ViewModel() {
    private val _monitoringBuildingGroupList = mutableStateListOf<MonitoringBuildingGroup>()
    val monitoringBuildingGroupList: SnapshotStateList<MonitoringBuildingGroup> = _monitoringBuildingGroupList
    val openedGroups: SnapshotStateList<MonitoringBuildingGroup> = mutableStateListOf()
    val projectRepository = ProjectRepository(ProjectSource())
    init {
        monitoringBuildingGroupList += MonitoringBuildingGroupProvider.monitoringItems
        if (monitoringBuildingGroupList.size > 0) openedGroups.add(monitoringBuildingGroupList[0])
    }

    fun addBuildingGroup(group: MonitoringBuildingGroup) {
        _monitoringBuildingGroupList.add(group)
    }
}