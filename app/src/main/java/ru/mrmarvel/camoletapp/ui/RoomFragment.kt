package ru.mrmarvel.camoletapp.ui

import android.util.Log
import androidx.compose.animation.AnimatedVisibility
import androidx.compose.animation.expandVertically
import androidx.compose.animation.fadeIn
import androidx.compose.animation.fadeOut
import androidx.compose.animation.shrinkVertically
import androidx.compose.foundation.layout.Arrangement
import androidx.compose.foundation.layout.Box
import androidx.compose.foundation.layout.PaddingValues
import androidx.compose.foundation.layout.fillMaxHeight
import androidx.compose.foundation.layout.fillMaxSize
import androidx.compose.foundation.layout.padding
import androidx.compose.foundation.lazy.LazyColumn
import androidx.compose.runtime.Composable
import androidx.compose.runtime.DisposableEffect
import androidx.compose.runtime.mutableStateOf
import androidx.compose.runtime.remember
import androidx.compose.ui.Alignment
import androidx.compose.ui.Modifier
import androidx.compose.ui.platform.LocalLifecycleOwner
import androidx.compose.ui.unit.dp
import androidx.lifecycle.Lifecycle
import androidx.lifecycle.LifecycleEventObserver
import androidx.lifecycle.LifecycleOwner
import com.tencent.yolov8ncnn.CheckLogic
import com.tencent.yolov8ncnn.RoomType
import com.tencent.yolov8ncnn.Yolov8Ncnn
import ru.mrmarvel.camoletapp.data.CameraScreenViewModel
import com.tencent.yolov8ncnn.FlatStatistic
import ru.mrmarvel.camoletapp.data.SharedViewModel
import ru.mrmarvel.camoletapp.endroombutton.EndRoomButton
import ru.mrmarvel.camoletapp.simpleroombutton.SimpleRoomButton

fun processRoomStatistic(cameraViewModel: CameraScreenViewModel, yolov8Ncnn: Yolov8Ncnn){
    val roomType = cameraViewModel.selectedRoomType.value
    cameraViewModel.roomRealData = yolov8Ncnn.data
    Log.d("MYDEBUG", cameraViewModel.roomRealData.toString())

    for ((key, value) in cameraViewModel.roomRealData) {
        when (roomType) {
            RoomType.KITCHEN -> {
                if (key in cameraViewModel.flatStatistic.kitchen.keys){
                    val index = cameraViewModel.flatStatistic.kitchen[key]?.lastIndex ?: 0
                    if (key == 11)
                        cameraViewModel.flatStatistic.kitchen[key]?.set(index, value[1])
                    else
                        cameraViewModel.flatStatistic.kitchen[key]?.set(index, value[0])
                }
            }
            RoomType.LIVING -> {
                if (key in cameraViewModel.flatStatistic.living.keys){
                    val index = cameraViewModel.flatStatistic.living[key]?.lastIndex ?: 0
                    if (key == 11)
                        cameraViewModel.flatStatistic.living[key]?.set(index, value[1])
                    else
                        cameraViewModel.flatStatistic.living[key]?.set(index, value[0])
                }
            }

            RoomType.HALL -> {
                if (key in cameraViewModel.flatStatistic.hall.keys){
                    val index = cameraViewModel.flatStatistic.hall[key]?.lastIndex ?: 0
                    if (key == 11)
                        cameraViewModel.flatStatistic.hall[key]?.set(index, value[1])
                    else
                        cameraViewModel.flatStatistic.hall[key]?.set(index, value[0])
                }
            }

            RoomType.SANITARY -> {
                if (key in cameraViewModel.flatStatistic.sanitary.keys){
                    val index = cameraViewModel.flatStatistic.sanitary[key]?.lastIndex ?: 0
                    if (key == 11)
                        cameraViewModel.flatStatistic.sanitary[key]?.set(index, value[1])
                    else if (value[1] > 20)
                        cameraViewModel.flatStatistic.sanitary[key]?.set(index, value[0])
                }
            }

        }
    }
    // TODO: Проверить логику
    val floorClasses: IntArray = intArrayOf(5, 6, 20)
    val ceilingClasses: IntArray = intArrayOf(1, 2, 21)
    val wallClasses: IntArray = intArrayOf(15, 17, 18)
    when(roomType){
        RoomType.KITCHEN -> {
            CheckLogic.compareAndResetClasses(cameraViewModel.flatStatistic.kitchen, floorClasses)
            CheckLogic.compareAndResetClasses(cameraViewModel.flatStatistic.kitchen, ceilingClasses)
            CheckLogic.compareAndResetClasses(cameraViewModel.flatStatistic.kitchen, wallClasses)
            Log.d("MYDEBUG", cameraViewModel.flatStatistic.kitchen.toString())
            CheckLogic.isWallFinish(cameraViewModel.flatStatistic.kitchen)
            CheckLogic.isFloorFinish(cameraViewModel.flatStatistic.kitchen)
            CheckLogic.setSwitchFromSocket(cameraViewModel.flatStatistic.kitchen, 5)
            CheckLogic.roundProbs(cameraViewModel.flatStatistic.kitchen, 0.4f)
            Log.d("MYDEBUG", cameraViewModel.flatStatistic.kitchen.toString())
        }
        RoomType.LIVING -> {
            CheckLogic.compareAndResetClasses(cameraViewModel.flatStatistic.living, floorClasses)
            CheckLogic.compareAndResetClasses(cameraViewModel.flatStatistic.living, ceilingClasses)
            CheckLogic.compareAndResetClasses(cameraViewModel.flatStatistic.living, wallClasses)
            Log.d("MYDEBUG", cameraViewModel.flatStatistic.living.toString())
            CheckLogic.isWallFinish(cameraViewModel.flatStatistic.living)
            CheckLogic.isFloorFinish(cameraViewModel.flatStatistic.living)
            CheckLogic.setSwitchFromSocket(cameraViewModel.flatStatistic.living, 5)
            CheckLogic.roundProbs(cameraViewModel.flatStatistic.living, 0.4f)
            Log.d("MYDEBUG", cameraViewModel.flatStatistic.living.toString())
        }
        RoomType.HALL -> {
            CheckLogic.compareAndResetClasses(cameraViewModel.flatStatistic.hall, floorClasses)
            CheckLogic.compareAndResetClasses(cameraViewModel.flatStatistic.hall, ceilingClasses)
            CheckLogic.compareAndResetClasses(cameraViewModel.flatStatistic.hall, wallClasses)
            Log.d("MYDEBUG", cameraViewModel.flatStatistic.hall.toString())
            CheckLogic.isWallFinish(cameraViewModel.flatStatistic.hall)
            CheckLogic.isFloorFinish(cameraViewModel.flatStatistic.hall)
            CheckLogic.setSwitchFromSocket(cameraViewModel.flatStatistic.hall, 2)
            CheckLogic.roundProbs(cameraViewModel.flatStatistic.hall, 0.4f)
            Log.d("MYDEBUG", cameraViewModel.flatStatistic.hall.toString())
        }
        RoomType.SANITARY -> {
            CheckLogic.compareAndResetClasses(cameraViewModel.flatStatistic.sanitary, floorClasses)
            CheckLogic.compareAndResetClasses(cameraViewModel.flatStatistic.sanitary, ceilingClasses)
            CheckLogic.compareAndResetClasses(cameraViewModel.flatStatistic.sanitary, wallClasses)
            Log.d("MYDEBUG", cameraViewModel.flatStatistic.sanitary.toString())
            CheckLogic.isWallFinish(cameraViewModel.flatStatistic.sanitary)
            CheckLogic.isFloorFinish(cameraViewModel.flatStatistic.sanitary)
            CheckLogic.setSwitchFromSocket(cameraViewModel.flatStatistic.sanitary, 2)
            CheckLogic.roundProbs(cameraViewModel.flatStatistic.sanitary, 0.4f)
            Log.d("MYDEBUG", cameraViewModel.flatStatistic.sanitary.toString())
        }
    }
    cameraViewModel.selectedRoomType.value = null
}

@Composable
fun RoomFragment(
    sharedViewModel: SharedViewModel,
    cameraViewModel: CameraScreenViewModel,
    yolov8Ncnn: Yolov8Ncnn,
    lifecycleOwner: LifecycleOwner = LocalLifecycleOwner.current
) {
    val isFlatChangeWindowShown = remember {mutableStateOf(false)}
    val currentFlatNumber = remember {cameraViewModel.currentFlatNumber}
    val currentRoomType = remember {cameraViewModel.selectedRoomType}
    val isFlatLocked = remember {cameraViewModel.isFlatLocked}
    val isRoomStatSaved = remember {mutableStateOf(true)}
    val isFloorStatSaved = remember {mutableStateOf(false)}
    val isRoomEverChoose = remember {mutableStateOf(false)}


    AnimatedVisibility(visible = currentRoomType.value != null,
        enter = fadeIn(),
        exit = fadeOut()
    ) {
        Box(modifier = Modifier
            .fillMaxSize()
            .padding(32.dp),
            contentAlignment = Alignment.BottomEnd
        ) {
            EndRoomButton(onItemClick = {
                yolov8Ncnn.changeState(false)
                processRoomStatistic(cameraViewModel, yolov8Ncnn)
                isRoomStatSaved.value = true
            })
        }
    }
    val roomsNames = listOf("Санузел", "Коридор", "Жилая", "Кухня")
    AnimatedVisibility(
        visible = remember {cameraViewModel.selectedRoomType}.value == null,
        enter = expandVertically(expandFrom = Alignment.Top),
        exit = shrinkVertically(shrinkTowards = Alignment.Top),
    ) {
        Box(
            modifier = Modifier
                .fillMaxSize()
                .padding(vertical = 32.dp, horizontal = 2.dp),
            contentAlignment = Alignment.BottomEnd
        ) {
            val elementPadding = PaddingValues(vertical = 16.dp)
            LazyColumn(
                modifier = Modifier.fillMaxHeight(),
                horizontalAlignment = Alignment.CenterHorizontally,
                verticalArrangement = Arrangement.Bottom,
                contentPadding = elementPadding
            ) {
                items(roomsNames.size) { i ->
                    SimpleRoomButton(
                        modifier=Modifier.padding(elementPadding),
                        roomName = roomsNames[i], onItemClick = {
                            sharedViewModel.observeRoomCount.value += 1
                            isRoomStatSaved.value = false
                            isRoomEverChoose.value = true
                            cameraViewModel.selectedRoomType.value = RoomType.toEnum(roomsNames[i])
                            cameraViewModel.flatStatistic.add_room(cameraViewModel.selectedRoomType.value)
                            yolov8Ncnn.changeState(true)
                        })
                }
            }
        }
    }

    DisposableEffect(lifecycleOwner) {
        val observer = LifecycleEventObserver { _, event ->
            if (event == Lifecycle.Event.ON_START) {
                cameraViewModel.flatStatistic = FlatStatistic()
                cameraViewModel.flatStatistic.flatId = cameraViewModel.currentFlat.id
                Log.d("MYDEBUG", "START")
            } else if (event == Lifecycle.Event.ON_STOP) {
                Log.d("MYDEBUG", "LIFESTOP")
                // TODO Выделить в функцию
                yolov8Ncnn.changeState(false)
                if (!isRoomStatSaved.value) {
                    isRoomStatSaved.value = true
                    processRoomStatistic(cameraViewModel, yolov8Ncnn)
                }
                if (!isFloorStatSaved.value && isRoomEverChoose.value) {
                    isFloorStatSaved.value = true
                    cameraViewModel.floorFlatStatistic.add(cameraViewModel.flatStatistic)
                }
                Log.d("MYDEBUG", cameraViewModel.floorFlatStatistic.size.toString())

            }
        }

        lifecycleOwner.lifecycle.addObserver(observer)
        onDispose {
            Log.d("MYDEBUG", "DISPOSESTOP")

            // TODO Выделить в функцию
            yolov8Ncnn.changeState(false)
            if (!isRoomStatSaved.value) {
                isRoomStatSaved.value = true
                processRoomStatistic(cameraViewModel, yolov8Ncnn)
            }
            if (!isFloorStatSaved.value && isRoomEverChoose.value) {
                isFloorStatSaved.value = true
                cameraViewModel.floorFlatStatistic.add(cameraViewModel.flatStatistic)
            }
            Log.d("MYDEBUG", cameraViewModel.flatStatistic.toString())
            lifecycleOwner.lifecycle.removeObserver(observer)
        }
    }
}