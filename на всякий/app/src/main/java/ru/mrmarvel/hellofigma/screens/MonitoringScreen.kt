package ru.mrmarvel.hellofigma.screens

import android.widget.Toast
import androidx.compose.animation.animateContentSize
import androidx.compose.animation.core.tween
import androidx.compose.foundation.layout.Arrangement
import androidx.compose.foundation.layout.Column
import androidx.compose.foundation.layout.Row
import androidx.compose.foundation.layout.fillMaxWidth
import androidx.compose.foundation.layout.padding
import androidx.compose.foundation.lazy.LazyColumn
import androidx.compose.material.Scaffold
import androidx.compose.material.Surface
import androidx.compose.runtime.Composable
import androidx.compose.runtime.LaunchedEffect
import androidx.compose.runtime.remember
import androidx.compose.ui.Alignment
import androidx.compose.ui.Modifier
import androidx.compose.ui.platform.LocalContext
import androidx.compose.ui.tooling.preview.Preview
import androidx.compose.ui.unit.dp
import androidx.lifecycle.viewmodel.compose.viewModel
import com.google.accompanist.flowlayout.FlowColumn
import com.google.accompanist.flowlayout.FlowCrossAxisAlignment
import com.google.accompanist.flowlayout.FlowMainAxisAlignment
import ru.mrmarvel.hellofigma.camoletappbar.CamoletAppBar
import ru.mrmarvel.hellofigma.data.SharedViewModel
import ru.mrmarvel.hellofigma.data.models.MonitoringBuildingGroup
import ru.mrmarvel.hellofigma.data.models.MonitoringBuildingItem
import ru.mrmarvel.hellofigma.makevideo.MakeVideo
import ru.mrmarvel.hellofigma.monitoringitembuildingnew.MonitoringItemBuildingNew
import ru.mrmarvel.hellofigma.monitoringitembuildingnew.Open
import ru.mrmarvel.hellofigma.monitoringitembuildingsubitem.MonitoringItemBuildingSubItem
import ru.mrmarvel.hellofigma.monthmonitoringlabel.MonthLabel
import java.util.Calendar
import kotlinx.coroutines.*
import java.util.Date


val startingDate: Calendar = Calendar.Builder().setDate(2023, 5, 22).build()



fun getRussianMonthName(monthNum: Int): String {
    val monthsNames = listOf(
        "Январь","Февраль","Март","Апрель",
        "Май","Июнь","Июль","Август",
        "Сентябрь", "Октябрь","Ноябрь","Декабрь"
    )
    if (monthNum < 1) throw IllegalArgumentException("Less than 1")
    if (monthNum > 12) throw IllegalArgumentException("More than 12")
    return monthsNames[monthNum+1]
}
@Composable
fun MonitoringScreen(
    sharedViewModel: SharedViewModel = SharedViewModel(),
    navigateToCameraScreen: () -> Unit
) {
    LaunchedEffect(true) {
        launch {
            sharedViewModel.projectRepository.getAll()
            for (project in sharedViewModel.projectRepository.projects.value) {
                sharedViewModel.monitoringBuildingGroupList.add(
                    MonitoringBuildingGroup(
                        id = project.id,
                        opened = false,
                        coordinates = project.coordinates,
                        date = Date(),
                        items = listOf(),
                        name = project.title
                    )
                )
            }
        }
    }

    // var monitoringItems = listOf<MonitoringBuildingGroup>(MonitoringBuildingGroupProvider.monitoringItems[0])
    val context = LocalContext.current
    Scaffold(
        topBar = {
            CamoletAppBar(Modifier.fillMaxWidth(),
                onBurgerClick = {
                    Toast.makeText(context, "Открыть меню!", Toast.LENGTH_SHORT).show()
                },
                onProfileClick = {
                    Toast.makeText(context, "Открыть профиль!", Toast.LENGTH_SHORT).show()
                },
                appBarText = "МОНИТОРИНГ"
            )
        },
        bottomBar = {
            Row(
                modifier = Modifier
                    .fillMaxWidth()
                    .padding(bottom = 32.dp, top = 4.dp),
                horizontalArrangement = Arrangement.Center,
                verticalAlignment = Alignment.CenterVertically,
            ) {
                MakeVideo(Modifier,  onMakeVideoClicked = {
                    Toast.makeText(context, "Создать видео!", Toast.LENGTH_SHORT).show()
                    navigateToCameraScreen()
                })
            }
        }
    ) { scaffoldPadding ->
        Surface(
            Modifier.padding(scaffoldPadding),
        ) {
            Main(sharedViewModel)
        }
    }
}
@Preview
@Composable
fun Main(sharedViewModel: SharedViewModel = SharedViewModel()) {
    val monitoringItems = remember {sharedViewModel.monitoringBuildingGroupList}
    val openedGroups = remember {sharedViewModel.openedGroups}
    Surface(Modifier.fillMaxWidth()) {


        LazyColumn(
            verticalArrangement = Arrangement.spacedBy(8.dp),
            horizontalAlignment = Alignment.CenterHorizontally,
            modifier = Modifier
                .padding(vertical = 10.dp, horizontal = 20.dp)
                .fillMaxWidth()
                .animateContentSize(tween(durationMillis = 250, delayMillis = 250)),
        ) {

            var lastMonth = 0
            items(monitoringItems.size) { i ->
                val monitoringItem = monitoringItems[i]
                val dateCalendar = Calendar.getInstance()
                dateCalendar.time = monitoringItem.date
                val monthNum = dateCalendar.get(Calendar.MONTH)
                val monthName = getRussianMonthName(monthNum)
                val showMonth = lastMonth != monthNum
                lastMonth = monthNum
                val hasItems = monitoringItem.items.isNotEmpty()
                val itemItems = monitoringItem.items
                Column(horizontalAlignment = Alignment.End,
                    modifier = Modifier
                        .fillMaxWidth(0.87f) // Костыль для FlowColumn
                        .animateContentSize(tween(durationMillis = 250, delayMillis = 250)),
                ) {
                    if (showMonth) {
                        MonthLabel(monthName = monthName)
                    }
                    val context = LocalContext.current
                    MonitoringBuildingGroupByModel(monitoringItem, onExtendClick = {
                        if (monitoringItem.opened) {

                            sharedViewModel.openedGroups.remove(monitoringItem)
                            monitoringItem.opened = false
                        } else {

                            monitoringItem.opened = true
                            sharedViewModel.openedGroups.add(monitoringItem)
                        }
                    },
                    onItemClick = {
                        if (itemItems.size > 1) return@MonitoringBuildingGroupByModel
                        if (!hasItems) {
                            Toast.makeText(context, "Нет отчётов!", Toast.LENGTH_SHORT).show()
                            return@MonitoringBuildingGroupByModel
                        }
                        val itemItem = itemItems[0]
                        Toast.makeText(context,
                            "Открыть единственный отчёт ${itemItem.name} с ID ${itemItem.id}}",
                            Toast.LENGTH_SHORT).show()

                    })
                    if (hasItems && openedGroups.contains(monitoringItem)) {
                        // НЕльзя использовать вложенные списки
                        // Поэтому здесь костыль FlowColumn,
                        // Который нормально размер не ставит >:(

                        FlowColumn(
                            Modifier
                                .padding(top = 8.dp),
                            mainAxisSpacing = 8.dp,
                            crossAxisAlignment = FlowCrossAxisAlignment.End,
                            mainAxisAlignment = FlowMainAxisAlignment.End,
                        ) {
                            itemItems.forEach { itemInItem ->
                                MonitoringBuildingSubItemByModel(
                                    itemInItem,
                                    onItemClick = {
                                        Toast.makeText(context,
                                            "Открыть этот отчёт ${itemInItem.name} " +
                                                    "с ID ${itemInItem.id}}",
                                            Toast.LENGTH_SHORT).show()
                                    }
                                )
                            }
                        }
                    }
                }
            }

        }


    }
}

@Composable
fun MonitoringBuildingGroupByModel(group: MonitoringBuildingGroup,
                                   modifier: Modifier = Modifier,
                                   onExtendClick: (() -> Unit)? = null,
                                   onItemClick: () -> Unit = {}
) {
    val dateCalendar = Calendar.getInstance()
    dateCalendar.time = group.date
    val dayNum = dateCalendar.get(Calendar.DAY_OF_MONTH)
    val monthNum = dateCalendar.get(Calendar.MONTH)
    val monthName = getRussianMonthName(monthNum)
    val yearNum = dateCalendar.get(Calendar.YEAR)
    dateCalendar.time = group.date
    var openState = Open.NotExist
    if (group.items.isNotEmpty()) {
        openState = if (group.opened) {
            Open.Yes
        } else {
            Open.No
        }
    }
    val context = LocalContext.current
    MonitoringItemBuildingNew(
        open = openState,
        dateNumber = String.format("%02d", dayNum),
        dateFull = "$monthName $dayNum $yearNum",
        projectName = group.name,
        coordinates = group.coordinates,
        modifier = modifier,
        onExtendButtonClick = {onExtendClick?.invoke()},
        onItemClick = onItemClick
        // {
        //     group.opened = !group.opened
        //     Toast.makeText(context, group.opened.toString(), Toast.LENGTH_SHORT).show()
        // }
    )
}

@Preview
@Composable
fun MonitoringBuildingGroupPreview() {
    MonitoringBuildingGroupByModel(SharedViewModel().monitoringBuildingGroupList[2])
}

@Composable
fun MonitoringBuildingSubItemByModel(item: MonitoringBuildingItem,
                                     modifier: Modifier = Modifier,
                                     onItemClick: () -> Unit = {},
) {
    val dateCalendar = Calendar.getInstance()
    dateCalendar.time = item.date
    val dayNum = dateCalendar.get(Calendar.DAY_OF_MONTH)
    val monthNum = dateCalendar.get(Calendar.MONTH)
    val monthName = getRussianMonthName(monthNum)
    val yearNum = dateCalendar.get(Calendar.YEAR)
    MonitoringItemBuildingSubItem(modifier,
        projectName = item.name,
        coordinates = item.coordinates,
        fullDate = "$monthName $dayNum $yearNum",
        onItemClick = onItemClick
    )
}

@Preview
@Composable
fun MonitoringBuildingSubItemByModelPreview() {
    MonitoringBuildingSubItemByModel(
        item = SharedViewModel().monitoringBuildingGroupList[0].items[0]
    )
}
