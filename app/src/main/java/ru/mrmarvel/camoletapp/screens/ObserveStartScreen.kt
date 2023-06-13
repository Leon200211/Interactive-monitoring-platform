package ru.mrmarvel.camoletapp.screens

import android.Manifest
import android.content.Context
import android.content.pm.PackageManager
import android.location.Location
import android.location.LocationListener
import android.location.LocationManager
import android.os.Build
import android.util.Log
import android.widget.Toast
import androidx.compose.foundation.background
import androidx.compose.foundation.layout.Arrangement
import androidx.compose.foundation.layout.Column
import androidx.compose.foundation.layout.Row
import androidx.compose.foundation.layout.fillMaxWidth
import androidx.compose.foundation.layout.padding
import androidx.compose.material.Scaffold
import androidx.compose.material.Surface
import androidx.compose.material.Text
import androidx.compose.material.TextField
import androidx.compose.material.rememberScaffoldState
import androidx.compose.runtime.Composable
import androidx.compose.runtime.DisposableEffect
import androidx.compose.runtime.MutableState
import androidx.compose.runtime.SideEffect
import androidx.compose.runtime.mutableStateOf
import androidx.compose.runtime.remember
import androidx.compose.runtime.rememberCoroutineScope
import androidx.compose.ui.Alignment
import androidx.compose.ui.Modifier
import androidx.compose.ui.graphics.Color
import androidx.compose.ui.platform.LocalContext
import androidx.compose.ui.platform.LocalLifecycleOwner
import androidx.compose.ui.res.colorResource
import androidx.compose.ui.tooling.preview.Preview
import androidx.compose.ui.unit.dp
import androidx.core.app.ActivityCompat
import androidx.lifecycle.Lifecycle
import androidx.lifecycle.LifecycleEventObserver
import androidx.lifecycle.LifecycleOwner
import com.google.accompanist.permissions.ExperimentalPermissionsApi
import com.google.accompanist.permissions.rememberMultiplePermissionsState
import kotlinx.coroutines.CoroutineScope
import kotlinx.coroutines.Dispatchers
import kotlinx.coroutines.launch
import ru.mrmarvel.camoletapp.R
import ru.mrmarvel.camoletapp.backbutton.BackButton
import ru.mrmarvel.camoletapp.blue1linebutton.Blue1lineButton
import ru.mrmarvel.camoletapp.camoletappbar.CamoletAppBar
import ru.mrmarvel.camoletapp.data.CameraScreenViewModel
import ru.mrmarvel.camoletapp.data.SharedViewModel
import ru.mrmarvel.camoletapp.ui.NavigationDrawer
import ru.mrmarvel.camoletapp.util.DistanceCounter
import ru.mrmarvel.camoletapp.videoframe.VideoFrame

@OptIn(ExperimentalPermissionsApi::class)
@Composable
fun ObserveStartScreen(
    cameraScreenViewModel: CameraScreenViewModel,
    sharedViewModel: SharedViewModel,
    navigateToCameraScreen: () -> Unit = {},
    navigateBack: () -> Unit = {},
    navigateToHelpScreen: () -> Unit = {},
    navigateToProfileScreen: () -> Unit = {}
) {
    val context = LocalContext.current
    val scaffoldState = rememberScaffoldState()
    val coroutineScope = rememberCoroutineScope()
    val onLocationChange = LocationListener { location: Location ->
        sharedViewModel.currentLocation.value = location
        CoroutineScope(Dispatchers.IO).launch {
            sharedViewModel.nearestObject.value = DistanceCounter().getNearestObject(sharedViewModel)
            sharedViewModel.selectedProjectName.value = sharedViewModel.nearestObject.value.project?.title ?: ""
            sharedViewModel.selectedBuildingName.value = sharedViewModel.nearestObject.value.house?.title ?: ""
            sharedViewModel.selectedSectionNumber.value = sharedViewModel.nearestObject.value.section?.title ?: ""
            sharedViewModel.selectedFloorNumber.value = sharedViewModel.nearestObject.value.floor?.floorNumber ?: ""
        }
    }
    val permissions = mutableListOf(
        Manifest.permission.ACCESS_FINE_LOCATION,
        Manifest.permission.ACCESS_COARSE_LOCATION
    )

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
    val lifecycleOwner: LifecycleOwner = LocalLifecycleOwner.current
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
                appBarText = "НАЧАЛО ОБХОДА"
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
                //val
                Blue1lineButton(Modifier,
                    buttonText = "Начать",
                    onItemClicked = {
                        cameraScreenViewModel.isFlatLocked.value = false
                        navigateToCameraScreen()
                    }
                )
            }
        },
        scaffoldState = scaffoldState,
        drawerContent = {
            NavigationDrawer(
                scaffoldState = scaffoldState,
                navigateToMonitoringScreen = navigateBack,
                navigateToHelpScreen = navigateToHelpScreen
            )
        },
        drawerBackgroundColor = Color.Transparent,
        drawerElevation = 0.dp
    ) { scaffoldPadding ->
        Surface(
            Modifier.padding(scaffoldPadding),
        ) {
            ObserveStartMain(sharedViewModel = sharedViewModel, navigateBack = navigateBack)
        }
    }
    if (permissionState.allPermissionsGranted) {
        DisposableEffect(lifecycleOwner) {
            val observer = LifecycleEventObserver { _, event ->
                if (event == Lifecycle.Event.ON_RESUME) {
                    Log.d("MYDEBUG", "ON_RESUME")
                    registerLocation(context, onLocationChange)
                } else if (event == Lifecycle.Event.ON_PAUSE){
                    Log.d("MYDEBUG", "ON_PAUSE")
                    unregisterLocation(context, onLocationChange)
                }
            }

            lifecycleOwner.lifecycle.addObserver(observer)
            onDispose {
                Log.d("MYDEBUG", "DISPOSESTOP")
                lifecycleOwner.lifecycle.removeObserver(observer)
            }
        }
    }
}

@Composable
fun ObserveStartMain(
    sharedViewModel: SharedViewModel = SharedViewModel(),
    navigateBack: () -> Unit = {}
) {
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
                onItemClick = navigateBack
            )
            VideoFrame()
            val elementModifier = Modifier.padding(vertical = 3.dp)
            Column(Modifier.padding(top = 24.dp)) {
                val projectName = remember {mutableStateOf("Жульен")}
                GeoInput(label = "ЖК", buttonValue = sharedViewModel.selectedProjectName, modifier=elementModifier)
                GeoInput(label = "Дом", buttonValue = sharedViewModel.selectedBuildingName, modifier=elementModifier)
                GeoInput(label = "Секция", buttonValue = sharedViewModel.selectedSectionNumber, modifier=elementModifier)
                GeoInput(label = "Этаж", buttonValue = sharedViewModel.selectedFloorNumber, modifier=elementModifier)
            }
        }
    }
}

@Composable
fun GeoInput(label: String, buttonValue: MutableState<String> = mutableStateOf(""),
modifier: Modifier = Modifier) {
    Surface(
        modifier = Modifier
            .fillMaxWidth()
            .background(colorResource(id = R.color.black))
    ) {
        Row(
            horizontalArrangement = Arrangement.SpaceBetween,
            verticalAlignment = Alignment.CenterVertically,
            modifier = Modifier.padding(horizontal = 8.dp)
        ) {
            Text(label, Modifier.weight(weight = 0.5f))
            TextField(value = buttonValue.value, onValueChange = {buttonValue.value = it},
                Modifier.weight(0.5f))
        }
    }
}

@Preview
@Composable
fun GeoInputPreview() {
    val x = remember {mutableStateOf("Жульен")}
    GeoInput(label = "ЖК", x)
}


public fun registerLocation(context: Context, locationListener: LocationListener) {
    val locationManager = context.getSystemService(Context.LOCATION_SERVICE) as LocationManager
    if (ActivityCompat.checkSelfPermission(
            context,
            Manifest.permission.ACCESS_FINE_LOCATION
        ) != PackageManager.PERMISSION_GRANTED && ActivityCompat.checkSelfPermission(
            context,
            Manifest.permission.ACCESS_COARSE_LOCATION
        ) != PackageManager.PERMISSION_GRANTED
    ) {
        Log.d("MYDEBUG", "Нет разрешений!")
        return
    }
    Log.d("MYDEBUG", "ALL GEO PROVIDERS: ${locationManager.allProviders}")
    if (Build.VERSION.SDK_INT >= Build.VERSION_CODES.S) {
        try {
            if (locationManager.isProviderEnabled(LocationManager.FUSED_PROVIDER)) {
                locationManager.requestLocationUpdates(
                    LocationManager.FUSED_PROVIDER,
                    5000,
                    5f,
                    locationListener
                )
                Log.d("MYDEBUG", "FUSED_PROVIDER")
            }
        }
        catch(e: Exception) {}
    } else {
        try {
            if (locationManager.isProviderEnabled(LocationManager.GPS_PROVIDER)) {
                locationManager.requestLocationUpdates(
                    LocationManager.GPS_PROVIDER,
                    5000,
                    5f,
                    locationListener
                )
                Log.d("MYDEBUG", "GPS_PROVIDER")
            }
        }
        catch(e: Exception) {}
        try {
            if (locationManager.isProviderEnabled(LocationManager.NETWORK_PROVIDER)) {
                locationManager.requestLocationUpdates(
                    LocationManager.NETWORK_PROVIDER,
                    5000,
                    10f,
                    locationListener
                )
                Log.d("MYDEBUG", "NETWORK_PROVIDER")
            }
        }
        catch(e: Exception) {}
    }
    Log.d("MYDEBUG", "register successful!")
}

public fun unregisterLocation(context: Context, locationListener: LocationListener) {
    val locationManager = context.getSystemService(Context.LOCATION_SERVICE) as LocationManager
    locationManager.removeUpdates(locationListener)
    Log.d("MYDEBUG", "unregister successful!")
}