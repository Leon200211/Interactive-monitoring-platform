package ru.mrmarvel.camoletapp.ui

import android.util.Log
import androidx.compose.foundation.layout.Box
import androidx.compose.foundation.layout.fillMaxSize
import androidx.compose.foundation.layout.padding
import androidx.compose.runtime.Composable
import androidx.compose.runtime.DisposableEffect
import androidx.compose.runtime.mutableStateOf
import androidx.compose.runtime.remember
import androidx.compose.ui.Alignment
import androidx.compose.ui.Modifier
import androidx.compose.ui.platform.LocalLifecycleOwner
import androidx.compose.ui.tooling.preview.Preview
import androidx.compose.ui.unit.dp
import androidx.lifecycle.Lifecycle
import androidx.lifecycle.LifecycleEventObserver
import com.tencent.yolov8ncnn.CheckLogic
import com.tencent.yolov8ncnn.Yolov8Ncnn
import ru.mrmarvel.camoletapp.data.CameraScreenViewModel
import ru.mrmarvel.camoletapp.data.SharedViewModel
import ru.mrmarvel.camoletapp.red2linebutton.Red2lineButton

fun processMOPStatistic(cameraViewModel: CameraScreenViewModel, yolov8Ncnn: Yolov8Ncnn){
    cameraViewModel.roomRealData = yolov8Ncnn.data
    cameraViewModel.floorMOPStatistic.addMOP()
    Log.d("MYDEBUG", cameraViewModel.roomRealData.toString())

    for ((key, value) in cameraViewModel.roomRealData) {
        if (key in cameraViewModel.floorMOPStatistic.mop.keys){
            val index = cameraViewModel.floorMOPStatistic.mop[key]?.lastIndex ?: 0
            if (key == 11)
                cameraViewModel.floorMOPStatistic.mop[key]?.set(index, value[1])
            else
                cameraViewModel.floorMOPStatistic.mop[key]?.set(index, value[0])
        }
    }
    // TODO: Проверить логику
    val floorClasses: IntArray = intArrayOf(5, 20, 6)
    val ceilingClasses: IntArray = intArrayOf(1, 21, 2)
    val wallClasses: IntArray = intArrayOf(15, 17, 18)

    CheckLogic.compareAndResetClasses(cameraViewModel.floorMOPStatistic.mop, floorClasses)
    CheckLogic.compareAndResetClasses(cameraViewModel.floorMOPStatistic.mop, ceilingClasses)
    CheckLogic.compareAndResetClasses(cameraViewModel.floorMOPStatistic.mop, wallClasses)
    CheckLogic.isWallFinish(cameraViewModel.floorMOPStatistic.mop)
    CheckLogic.isFloorFinish(cameraViewModel.floorMOPStatistic.mop)
    CheckLogic.setSwitchFromSocket(cameraViewModel.floorMOPStatistic.mop, 1)
    CheckLogic.roundProbs(cameraViewModel.floorMOPStatistic.mop, 0.4f)

    Log.d("MYDEBUG", cameraViewModel.floorMOPStatistic.mop.toString())
}

@Composable
fun MOPFragment(
    sharedViewModel: SharedViewModel,
    cameraViewModel: CameraScreenViewModel,
    yolov8Ncnn: Yolov8Ncnn,
    modifier: Modifier = Modifier
) {
    val yoloState = remember{ mutableStateOf(true)}
    val isMOPStatSaved = remember {mutableStateOf(false)}

    yolov8Ncnn.changeState(yoloState.value)
    Box(modifier = modifier
        .fillMaxSize()
        .padding(32.dp),
    ) {
        Red2lineButton(Modifier.align(Alignment.BottomCenter), "Завершить", "МОП",
            onItemClick = {
                yoloState.value = false
                cameraViewModel.isMOPSelected.value = false
                processMOPStatistic(cameraViewModel, yolov8Ncnn)
                isMOPStatSaved.value = true
            }
        )
    }
    val lifecycleOwner = LocalLifecycleOwner.current
    DisposableEffect(lifecycleOwner) {
        val observer = LifecycleEventObserver { _, event ->
            if (event == Lifecycle.Event.ON_START) {
                Log.d("MYDEBUG", "START")
            } else if (event == Lifecycle.Event.ON_STOP) {
                Log.d("MYDEBUG", "LIFESTOP") // SCREEN CHANGES (BACK)
                // TODO Выделить в функцию
                yoloState.value = false
                if (!isMOPStatSaved.value) {
                    isMOPStatSaved.value = true
                    processMOPStatistic(cameraViewModel, yolov8Ncnn)
                }
                sharedViewModel.observeMOPCount.value += 1
            }
        }

        lifecycleOwner.lifecycle.addObserver(observer)
        onDispose {
            Log.d("MYDEBUG", "DISPOSESTOP")
            lifecycleOwner.lifecycle.removeObserver(observer)
        }
    }
}

@Preview
@Composable
fun Red2LineButtonPreview() {
    Red2lineButton(line1 = "Завершить", line2 = "МОП")
}