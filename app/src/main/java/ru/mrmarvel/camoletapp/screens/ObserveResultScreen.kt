package ru.mrmarvel.camoletapp.screens

import android.util.Log
import android.widget.Toast
import androidx.compose.foundation.layout.Column
import androidx.compose.foundation.layout.fillMaxWidth
import androidx.compose.foundation.layout.padding
import androidx.compose.material.Scaffold
import androidx.compose.material.Surface
import androidx.compose.material.rememberScaffoldState
import androidx.compose.runtime.Composable
import androidx.compose.runtime.rememberCoroutineScope
import androidx.compose.ui.Alignment
import androidx.compose.ui.Modifier
import androidx.compose.ui.graphics.Color
import androidx.compose.ui.platform.LocalContext
import androidx.compose.ui.tooling.preview.Preview
import androidx.compose.ui.unit.dp
import kotlinx.coroutines.CoroutineScope
import kotlinx.coroutines.Dispatchers
import kotlinx.coroutines.launch
import ru.mrmarvel.camoletapp.backbutton.BackButton
import ru.mrmarvel.camoletapp.blue1linebutton.Blue1lineButton
import ru.mrmarvel.camoletapp.camoletappbar.CamoletAppBar
import ru.mrmarvel.camoletapp.data.CameraScreenViewModel
import ru.mrmarvel.camoletapp.data.SharedViewModel
import ru.mrmarvel.camoletapp.infofield.InfoField
import ru.mrmarvel.camoletapp.ui.NavigationDrawer
import ru.mrmarvel.camoletapp.videoframe.VideoFrame

@Composable
fun ObserveResultScreen(
    cameraScreenViewModel: CameraScreenViewModel,
    sharedViewModel: SharedViewModel = SharedViewModel(),
    navigateToMonitoringScreen: () -> Unit,
    navigateToHelpScreen: () -> Unit = {},
    navigateToProfileScreen: () -> Unit = {}
) {
    val context = LocalContext.current
    val scaffoldState = rememberScaffoldState()
    val coroutineScope = rememberCoroutineScope()
    Scaffold(
        topBar = {
            CamoletAppBar(Modifier.fillMaxWidth(),
                onBurgerClick = {
                    coroutineScope.launch {
                        scaffoldState.drawerState.open()
                    }
                    // Toast.makeText(context, "Открыть меню!", Toast.LENGTH_SHORT).show()
                },
                onProfileClick = {
                    navigateToProfileScreen()
                    // Toast.makeText(context, "Открыть профиль!", Toast.LENGTH_SHORT).show()
                },
                appBarText = "РЕЗУЛЬТАТ ОБХОДА"
            )
        },
        bottomBar = {
            val elementModifier = Modifier.padding(vertical = 8.dp)
            Column(
                modifier = Modifier
                    .fillMaxWidth()
                    .padding(bottom = 32.dp, top = 4.dp),
                horizontalAlignment = Alignment.CenterHorizontally,
            ) {
                Blue1lineButton(elementModifier,
                    buttonText = "Скачать скор-карту",
                    onItemClicked = {
                        Log.d("MYDEBUG", "СЧИТАЕМ")
//                        val excelWriter = ExcelWriter()
                        sharedViewModel.statCounter.fillScoreMap(context, sharedViewModel, cameraScreenViewModel)
                        Toast.makeText(context, "Таблица скачана в папку загрузок!", Toast.LENGTH_SHORT).show()
                    }
                )
                Blue1lineButton(elementModifier,
                    buttonText = "Скачать “шахматки”",
                    onItemClicked = {
                        // Toast.makeText(context, "Создать видео!", Toast.LENGTH_SHORT).show()
//                        var excelWriter: ExcelWriter = ExcelWriter()
//                        excelWriter.readWorkbook(context)
//                        excelWriter.fillReport()
                        for (i in 0..17 ){
                            for (j in 0..7){
                                sharedViewModel.statCounter.fillChessReport(
                                    context,
                                    sharedViewModel,
                                    cameraScreenViewModel,
                                    i,
                                    j,
                                    17
                                )
                            }
                        }
//                        sharedViewModel.statCounter.fillChessReport(
//                            context,
//                            sharedViewModel,
//                            cameraScreenViewModel,
//                            sharedViewModel.nearestObject.value.floor?.floorNumber!!.toInt(),
//                            sharedViewModel.nearestObject.value.section?.title!!.toInt(),
//                            17
//                        )
                        sharedViewModel.statCounter.excelWriter.
                        saveWorkbook("ШАХМАТКИ.xlsx", sharedViewModel.statCounter.excelWriter.workbook)

                        // TODO: Отправлять в бд поэтажно
                        CoroutineScope(Dispatchers.IO).launch {
                            if (sharedViewModel.nearestObject.value.house != null)
                                sharedViewModel.projectRepository.putChessReport(sharedViewModel.nearestObject.value.house!!.id)
                        }

                        Log.d("FILE SAVED", "12341234")
                        Toast.makeText(context, "Шахматки скачаны в папку загрузок”!", Toast.LENGTH_SHORT).show()
                    }
                )
            }
        },
        scaffoldState = scaffoldState,
        drawerContent = {
            NavigationDrawer(
                scaffoldState = scaffoldState,
                navigateToMonitoringScreen = navigateToMonitoringScreen,
                navigateToHelpScreen = navigateToHelpScreen
            )
        },
        drawerBackgroundColor = Color.Transparent,
        drawerElevation = 0.dp
    ) { scaffoldPadding ->
        Surface(
            Modifier.padding(scaffoldPadding),
        ) {
            ObserveResultMain(sharedViewModel, navigateToMonitoringScreen = navigateToMonitoringScreen)
        }
    }
}
@Preview
@Composable
private fun ObserveResultMain(sharedViewModel: SharedViewModel = SharedViewModel(), navigateToMonitoringScreen: () -> Unit = {}) {
    Surface(Modifier.fillMaxWidth()) {
        Column(horizontalAlignment = Alignment.CenterHorizontally,
            modifier = Modifier
                .fillMaxWidth()
                .padding(30.dp)
        ) {
            BackButton(
                Modifier
                    .align(Alignment.Start)
                    .padding(bottom = 8.dp),
                onItemClick = navigateToMonitoringScreen
            )
            VideoFrame()
            val elementModifier = Modifier.padding(vertical = 3.dp)
            Column(Modifier.padding(top = 24.dp)) {
                InfoField(labelText = "ЖК", valueText = sharedViewModel.selectedProjectName.value, modifier = elementModifier)
                InfoField(labelText = "Дом", valueText = sharedViewModel.selectedBuildingName.value, modifier = elementModifier)
                InfoField(labelText = "Секция", valueText = sharedViewModel.selectedSectionNumber.value, modifier = elementModifier)
                InfoField(labelText = "Этаж", valueText = sharedViewModel.selectedFloorNumber.value, modifier = elementModifier)
            }
        }
    }
}

@Preview
@Composable
fun VideoFramePreview() {
    VideoFrame()
}