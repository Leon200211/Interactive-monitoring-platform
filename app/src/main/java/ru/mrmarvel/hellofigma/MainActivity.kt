/*
 * Copyright 2022 Google LLC
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *      http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

package ru.mrmarvel.hellofigma

import android.os.Bundle
import android.view.View
import android.view.WindowManager
import android.widget.TextView
import androidx.activity.ComponentActivity
import androidx.activity.compose.setContent
import androidx.activity.viewModels
import androidx.compose.foundation.layout.Box
import androidx.compose.foundation.layout.Column
import androidx.compose.foundation.layout.fillMaxSize
import androidx.compose.foundation.layout.wrapContentSize
import androidx.compose.material.MaterialTheme
import androidx.compose.material.Surface
import androidx.compose.runtime.Composable
import androidx.compose.ui.Modifier
import androidx.compose.ui.platform.LocalContext
import androidx.compose.ui.tooling.preview.Preview
import androidx.core.view.WindowCompat
import androidx.navigation.NavGraph
import androidx.navigation.NavOptions
import androidx.navigation.compose.NavHost
import androidx.navigation.compose.composable
import androidx.navigation.compose.rememberNavController
import dagger.hilt.android.AndroidEntryPoint
import ru.mrmarvel.hellofigma.data.SharedViewModel
import ru.mrmarvel.hellofigma.monitoringitembuildingnew.MonitoringItemBuildingNew
import ru.mrmarvel.hellofigma.screens.CameraScreen
import ru.mrmarvel.hellofigma.screens.MonitoringScreen
import ru.mrmarvel.hellofigma.screens.ObserveResultScreen
import ru.mrmarvel.hellofigma.ui.theme.HelloFigmaTheme

val elem = @Composable {
    MonitoringItemBuildingNew(
        dateNumber = "19",
        dateFull = "Март 19 2024",
        coordinates = "55.685812, 37.409567",
        projectName = "ЖК Жульен"
    )
}

@AndroidEntryPoint
class MainActivity : ComponentActivity() {
    private val sharedViewModel: SharedViewModel by viewModels()
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        window.decorView.systemUiVisibility = View.SYSTEM_UI_FLAG_FULLSCREEN
        actionBar?.hide()
        setContent {
            val navController = rememberNavController()
            val context = LocalContext.current
            HelloFigmaTheme {
                // A surface container using the 'background' color from the theme
                Surface(
                    modifier = Modifier.fillMaxSize(),
                    color = MaterialTheme.colors.background
                ) {
                    NavHost(navController = navController, startDestination = "monitoring_screen") {
                        composable("monitoring_screen") {
                            MonitoringScreen(sharedViewModel = sharedViewModel,
                                navigateToCameraScreen = {
                                    navController.navigate("camera_screen")
                                }
                            )
                        }
                        composable("camera_screen") {
                            CameraScreen(
                                navigateToObserveResultScreen = {
                                    navController.navigate("observe_result_screen") {
                                        popUpTo("monitoring_screen") { inclusive = true }
                                    }
                                }
                                // navigateToMonitoringScreen = {
                                //     navController.navigate("monitoring_screen", navOptions =
                            //     NavOptions.Builder().)
                                // }
                            )
                        }
                        composable("observe_result_screen") {
                            ObserveResultScreen(sharedViewModel, navigateToMonitoringScreen = {
                                navController.navigate("monitoring_screen") {
                                    popUpTo("monitoring_screen") { inclusive = true }
                                }
                            })
                        }
                    }
                }
            }
        }
    }
}

@Preview(heightDp = 360)
@Composable
private fun PreviewThreeBlock() {
    HelloFigmaTheme() {
        Surface(
            color = MaterialTheme.colors.background,
            modifier = Modifier.fillMaxSize(),
        ) {
            Column(Modifier.wrapContentSize()) {
                elem()
                elem()
            }



        }
    }
}

@Preview
@Composable
fun MonitoringBuildingItemPreview() {
    Box(Modifier.wrapContentSize()) {
        HelloFigmaTheme() {
            MonitoringItemBuildingNew(
                dateNumber = "19",
                dateFull = "Март 19 2024",
                coordinates = "55.685812, 37.409567",
                projectName = "ЖК Жульен в подольске"
            )
        }
    }
}