package ru.mrmarvel.camoletapp.data

import android.location.Location
import androidx.compose.runtime.MutableState
import androidx.compose.runtime.mutableStateListOf
import androidx.compose.runtime.mutableStateOf
import androidx.compose.runtime.snapshots.SnapshotStateList
import androidx.lifecycle.ViewModel
import ru.mrmarvel.camoletapp.data.models.MonitoringBuildingGroup
import ru.mrmarvel.camoletapp.data.models.MonitoringBuildingItem
import ru.mrmarvel.camoletapp.data.models.ResultNearestObject
import ru.mrmarvel.camoletapp.data.repository.ProjectRepository
import ru.mrmarvel.camoletapp.data.sources.ProjectSource
import ru.mrmarvel.camoletapp.screens.startingDate
import ru.mrmarvel.camoletapp.util.StatCounter
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
    val _monitoringBuildingGroupList = mutableStateListOf<MonitoringBuildingGroup>()
    val monitoringBuildingGroupList: SnapshotStateList<MonitoringBuildingGroup> = mutableStateListOf()
    val openedGroups: SnapshotStateList<MonitoringBuildingGroup> = mutableStateListOf()
    val projectRepository = ProjectRepository(ProjectSource())

    val selectedProjectName = mutableStateOf("Мытищи парк")
    val selectedBuildingName = mutableStateOf("1")
    val selectedSectionNumber = mutableStateOf("1")
    val selectedFloorNumber = mutableStateOf("2")
    val observeRoomCount = mutableStateOf(0)
    val observeMOPCount = mutableStateOf(0)

    val currentLocation: MutableState<Location?> = mutableStateOf(null)
    val nearestObject: MutableState<ResultNearestObject> = mutableStateOf(ResultNearestObject())

    val statCounter = StatCounter()

    init {
        _monitoringBuildingGroupList += MonitoringBuildingGroupProvider.monitoringItems
        if (_monitoringBuildingGroupList.size > 0) openedGroups.add(_monitoringBuildingGroupList[0])
        monitoringBuildingGroupList += _monitoringBuildingGroupList
    }

    fun addBuildingGroup(group: MonitoringBuildingGroup) {
        _monitoringBuildingGroupList.add(group)
    }
}