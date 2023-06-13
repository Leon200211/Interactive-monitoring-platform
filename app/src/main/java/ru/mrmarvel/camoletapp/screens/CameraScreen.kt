package ru.mrmarvel.camoletapp.screens

import android.Manifest
import android.location.Location
import android.location.LocationListener
import android.os.Build
import android.util.Log
import android.widget.Toast
import androidx.compose.animation.AnimatedVisibility
import androidx.compose.animation.Crossfade
import androidx.compose.animation.fadeIn
import androidx.compose.animation.fadeOut
import androidx.compose.foundation.background
import androidx.compose.foundation.layout.Arrangement
import androidx.compose.foundation.layout.Box
import androidx.compose.foundation.layout.Column
import androidx.compose.foundation.layout.fillMaxSize
import androidx.compose.foundation.layout.padding
import androidx.compose.foundation.text.BasicTextField
import androidx.compose.material.IconButton
import androidx.compose.material.Surface
import androidx.compose.runtime.Composable
import androidx.compose.runtime.DisposableEffect
import androidx.compose.runtime.SideEffect
import androidx.compose.runtime.mutableStateOf
import androidx.compose.runtime.remember
import androidx.compose.ui.Alignment
import androidx.compose.ui.Modifier
import androidx.compose.ui.graphics.Color
import androidx.compose.ui.platform.LocalContext
import androidx.compose.ui.platform.LocalLifecycleOwner
import androidx.compose.ui.text.TextStyle
import androidx.compose.ui.text.style.TextAlign
import androidx.compose.ui.tooling.preview.Preview
import androidx.compose.ui.unit.dp
import androidx.lifecycle.Lifecycle
import androidx.lifecycle.LifecycleEventObserver
import androidx.lifecycle.LifecycleOwner
import com.google.accompanist.permissions.ExperimentalPermissionsApi
import com.google.accompanist.permissions.rememberMultiplePermissionsState
import com.google.relay.compose.BoxScopeInstanceImpl.align
import com.tencent.yolov8ncnn.Yolov8Ncnn
import kotlinx.coroutines.CoroutineScope
import kotlinx.coroutines.Dispatchers
import kotlinx.coroutines.launch
import ru.mrmarvel.camoletapp.camerabutton.Action
import ru.mrmarvel.camoletapp.camerabutton.CameraButton
import ru.mrmarvel.camoletapp.changeroombutton.ChangeRoomButton
import ru.mrmarvel.camoletapp.data.CameraScreenViewModel
import ru.mrmarvel.camoletapp.data.SharedViewModel
import ru.mrmarvel.camoletapp.flatinputfield.FlatInputField
import ru.mrmarvel.camoletapp.simpleroombutton.SimpleRoomButton
import ru.mrmarvel.camoletapp.ui.CameraFragment
import ru.mrmarvel.camoletapp.ui.MOPFragment
import ru.mrmarvel.camoletapp.ui.RoomFragment
import ru.mrmarvel.camoletapp.ui.TopLeftBar
import ru.mrmarvel.camoletapp.util.DistanceCounter
import ru.mrmarvel.camoletapp.util.StatCounter

@OptIn(ExperimentalPermissionsApi::class)
@Composable
fun CameraScreen(
    sharedViewModel: SharedViewModel,
    cameraViewModel: CameraScreenViewModel,
    navigateToObserveResultScreen: () -> Unit = {}
) {
    val context = LocalContext.current
    val permissions = mutableListOf(
        Manifest.permission.CAMERA,
        Manifest.permission.ACCESS_FINE_LOCATION,
        Manifest.permission.ACCESS_COARSE_LOCATION,
        Manifest.permission.WRITE_EXTERNAL_STORAGE,
        Manifest.permission.READ_EXTERNAL_STORAGE,
    )
    permissions += if (Build.VERSION.SDK_INT <= 28){
        listOf(
            Manifest.permission.WRITE_EXTERNAL_STORAGE,
        )
    }else {
        listOf(Manifest.permission.CAMERA)
    }

    val permissionState = rememberMultiplePermissionsState(
        permissions = permissions)

    if (!permissionState.allPermissionsGranted){
        SideEffect {
            permissionState.launchMultiplePermissionRequest()
        }
    }
    if (!permissionState.allPermissionsGranted){
        permissionState.revokedPermissions.forEach {
            // Toast.makeText(context, "Нужно разрешение ${it.permission}!", Toast.LENGTH_LONG).show()
        }
    }

    val isFlatLocked = remember {cameraViewModel.isFlatLocked}
    val isFlatInputShown = remember { cameraViewModel.isFlatInputShown}
    val isMOPSelected = remember {cameraViewModel.isMOPSelected}
    val isRecordingStarted = remember {cameraViewModel.isRecordingStarted}
    val yolov8Ncnn: Yolov8Ncnn = Yolov8Ncnn();

    val lifecycleOwner: LifecycleOwner = LocalLifecycleOwner.current
    val onLocationChange = LocationListener { location: Location ->
        Log.d("MYDEBUG", location.toString())
        cameraViewModel.currentLocation.value = location
        if (!cameraViewModel.isFlatLocked.value) {
            cameraViewModel.currentFlat = DistanceCounter().getNearestFlat(
                sharedViewModel.nearestObject.value.flatsList,
                sharedViewModel.currentLocation.value
            )
            cameraViewModel.currentFlatNumber.value = cameraViewModel.currentFlat.apartment_number.toString()
        }
    }

    Surface(
        Modifier
            .background(Color.Black)
            .fillMaxSize()
    ) {
        if (permissionState.allPermissionsGranted){
            CameraFragment(yolov8Ncnn = yolov8Ncnn)
        }
        AnimatedVisibility(visible = isRecordingStarted.value) {
            AnimatedVisibility(visible = isMOPSelected.value) {
                MOPFragment(sharedViewModel = sharedViewModel, cameraViewModel = cameraViewModel, yolov8Ncnn = yolov8Ncnn)
            }
            AnimatedVisibility(visible = !isMOPSelected.value) {

                Box(modifier = Modifier
                    .fillMaxSize()
                    .padding(8.dp),
                    contentAlignment = Alignment.TopStart
                ) {
                    TopLeftBar(cameraScreenViewModel = cameraViewModel,
                        onChangeFlatClick = {
                            isFlatInputShown.value = !isFlatInputShown.value
                        }
                    )
                }
                AnimatedVisibility(visible = isFlatLocked.value) {
                    RoomFragment(sharedViewModel = sharedViewModel, cameraViewModel = cameraViewModel, yolov8Ncnn = yolov8Ncnn)
                }
            }
        }
        AnimatedVisibility(visible = !isMOPSelected.value) {
            Box(
                modifier = Modifier
                    .fillMaxSize()
                    .padding(32.dp),
                contentAlignment = Alignment.BottomCenter,
            ) {
                Column (
                    horizontalAlignment = Alignment.CenterHorizontally,
                ) {
                    AnimatedVisibility(visible = isRecordingStarted.value
                            && !isMOPSelected.value
                            && !isFlatLocked.value
                    ) {
                        SimpleRoomButton(
                            modifier = Modifier.padding(bottom = 8.dp),
                            roomName = "МОП",
                            onItemClick = {
                                isMOPSelected.value = true
                            }
                        )
                    }
                    IconButton(onClick = {}) {
                        Crossfade(targetState = isRecordingStarted) {
                            val action = when (it.value) {
                                false -> Action.START
                                true -> Action.STOP
                            }
                            CameraButton(action = action, onItemClick = {
                                if (isRecordingStarted.value) {
                                    navigateToObserveResultScreen()
                                }
                                isRecordingStarted.value = !isRecordingStarted.value
                            })
                        }
                    }
                }
            }
        }
        AnimatedVisibility(visible = isFlatInputShown.value,
            enter = fadeIn(),
            exit = fadeOut()
        ) {
            FlatChangeWindow(cameraViewModel = cameraViewModel)
        }
    }
    if (permissionState.allPermissionsGranted) {
        DisposableEffect(lifecycleOwner) {
            val observer = LifecycleEventObserver { _, event ->
                if (event == Lifecycle.Event.ON_RESUME) {
                    Log.d("MYDEBUG", "ON_RESUME")
                    cameraViewModel.currentFlat = DistanceCounter().getNearestFlat(
                        sharedViewModel.nearestObject.value.flatsList,
                        sharedViewModel.currentLocation.value
                    )
                    cameraViewModel.currentFlatNumber.value = cameraViewModel.currentFlat.apartment_number.toString()
                    registerLocation(context, onLocationChange)
                } else if (event == Lifecycle.Event.ON_PAUSE){
                    Log.d("MYDEBUG", "ON_PAUSE")
                    unregisterLocation(context, onLocationChange)
                }
            }

            lifecycleOwner.lifecycle.addObserver(observer)
            onDispose {
                Log.d("MYDEBUG", "DISPOSESTOP")
                var res = sharedViewModel.statCounter.calculateFlatsStatistics(cameraViewModel)
                CoroutineScope(Dispatchers.IO).launch {
                    sharedViewModel.projectRepository.setFlatStatistic(res)
                }
                lifecycleOwner.lifecycle.removeObserver(observer)
            }
        }
    }
}

@Composable
fun FlatChangeWindow(
    cameraViewModel: CameraScreenViewModel,
    modifier: Modifier = Modifier,
) {
    val currentFlatNumber = remember {cameraViewModel.currentFlatNumber}
    val isFlatLocked = remember {cameraViewModel.isFlatLocked}
    val isFlatInputShown = remember {cameraViewModel.isFlatInputShown}
    Box(
        modifier = modifier
            .fillMaxSize()
            .padding(32.dp),
        contentAlignment = Alignment.Center
    ) {
        val textIn = remember { mutableStateOf("") }
        FlatInputField(
            fieldItem = {
                Column(
                    verticalArrangement = Arrangement.Center,
                    modifier = Modifier.fillMaxSize()
                ) {
                    BasicTextField(
                        value = textIn.value,
                        onValueChange = {textIn.value = it},
                        singleLine = true,
                        textStyle = TextStyle(textAlign = TextAlign.Center),
                    )
                }
            },
            onOkClick = {
                val newVal = textIn.value.toIntOrNull() ?: return@FlatInputField
                currentFlatNumber.value = newVal.toString()
                isFlatLocked.value = true
                isFlatInputShown.value = false
            })

    }
}

@Preview
@Composable
fun CameraButtonPreview() {
    Column {
        CameraButton(action = Action.START)
        CameraButton(action = Action.STOP)
    }
}

@Preview
@Composable
fun ChangeRoomButtonPreview() {
    ChangeRoomButton()
}

@Preview
@Composable
fun FlatInputFieldPreview() {
    FlatInputField(
        fieldItem = {
            Column(
                verticalArrangement = Arrangement.Center,
                modifier = Modifier.fillMaxSize()
            ) {
                BasicTextField(
                    value = "1",
                    onValueChange = {},
                    singleLine = true,
                    modifier = Modifier.align(Alignment.Center),
                    textStyle = TextStyle(textAlign = TextAlign.Center),
                )
            }
        })
}

@Preview
@Composable
fun SimpleRoomButtonPreview() {
    SimpleRoomButton(roomName = "МОП")
}