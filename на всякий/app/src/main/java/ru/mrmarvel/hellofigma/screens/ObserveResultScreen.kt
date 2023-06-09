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
import androidx.compose.runtime.remember
import androidx.compose.ui.Alignment
import androidx.compose.ui.Modifier
import androidx.compose.ui.platform.LocalContext
import androidx.compose.ui.tooling.preview.Preview
import androidx.compose.ui.unit.dp
import com.google.accompanist.flowlayout.FlowColumn
import com.google.accompanist.flowlayout.FlowCrossAxisAlignment
import com.google.accompanist.flowlayout.FlowMainAxisAlignment
import ru.mrmarvel.hellofigma.backbutton.BackButton
import ru.mrmarvel.hellofigma.blue1linebutton.Blue1lineButton
import ru.mrmarvel.hellofigma.camoletappbar.CamoletAppBar
import ru.mrmarvel.hellofigma.data.SharedViewModel
import ru.mrmarvel.hellofigma.data.models.MonitoringBuildingGroup
import ru.mrmarvel.hellofigma.data.models.MonitoringBuildingItem
import ru.mrmarvel.hellofigma.infofield.InfoField
import ru.mrmarvel.hellofigma.infofield.InfoLabel
import ru.mrmarvel.hellofigma.monitoringitembuildingnew.MonitoringItemBuildingNew
import ru.mrmarvel.hellofigma.monitoringitembuildingnew.Open
import ru.mrmarvel.hellofigma.monitoringitembuildingsubitem.MonitoringItemBuildingSubItem
import ru.mrmarvel.hellofigma.monthmonitoringlabel.MonthLabel
import ru.mrmarvel.hellofigma.videoframe.VideoFrame
import java.util.Calendar

@Composable
fun ObserveResultScreen(
    sharedViewModel: SharedViewModel = SharedViewModel(),
    navigateToMonitoringScreen: () -> Unit
) {
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
                appBarText = "РЕЗУЛЬТАТ ОБХОДА"
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
                Blue1lineButton(Modifier,
                    buttonText = "Скачать “шахматки”",
                    onItemClicked = {
                        Toast.makeText(context, "Создать видео!", Toast.LENGTH_SHORT).show()
                    }
                )
            }
        }
    ) { scaffoldPadding ->
        Surface(
            Modifier.padding(scaffoldPadding),
        ) {
            ObserveResultMain()
        }
    }
}
@Preview
@Composable
private fun ObserveResultMain(sharedViewModel: SharedViewModel = SharedViewModel()) {
    Surface(Modifier.fillMaxWidth()) {
        Column(horizontalAlignment = Alignment.CenterHorizontally,
            modifier = Modifier
                .fillMaxWidth()
                .padding(30.dp)
        ) {
            BackButton(
                Modifier
                    .align(Alignment.Start)
                    .padding(bottom = 8.dp))
            VideoFrame()
            val elementModifier = Modifier.padding(vertical = 3.dp)
            Column(Modifier.padding(top = 24.dp)) {
                InfoField(labelText = "ЖК", valueText ="Жульен", modifier = elementModifier)
                InfoField(labelText = "Дом", valueText ="Корпус 1", modifier = elementModifier)
                InfoField(labelText = "Секция", valueText ="2", modifier = elementModifier)
                InfoField(labelText = "Этаж", valueText ="3", modifier = elementModifier)
            }
        }
    }
}

@Preview
@Composable
fun VideoFramePreview() {
    VideoFrame()
}