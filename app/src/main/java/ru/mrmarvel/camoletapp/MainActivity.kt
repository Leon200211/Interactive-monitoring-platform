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

package ru.mrmarvel.camoletapp

import android.os.Bundle
import android.view.View
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
import androidx.navigation.compose.NavHost
import androidx.navigation.compose.composable
import androidx.navigation.compose.rememberNavController
import dagger.hilt.android.AndroidEntryPoint
import ru.mrmarvel.camoletapp.data.CameraScreenViewModel
import ru.mrmarvel.camoletapp.data.LoginScreenViewModel
import ru.mrmarvel.camoletapp.data.SharedViewModel
import ru.mrmarvel.camoletapp.monitoringitembuildingnew.MonitoringItemBuildingNew
import ru.mrmarvel.camoletapp.screens.CameraScreen
import ru.mrmarvel.camoletapp.screens.HelpScreen
import ru.mrmarvel.camoletapp.screens.LoginScreen
import ru.mrmarvel.camoletapp.screens.MonitoringScreen
import ru.mrmarvel.camoletapp.screens.ObserveResultScreen
import ru.mrmarvel.camoletapp.screens.ObserveStartScreen
import ru.mrmarvel.camoletapp.screens.ProfileScreen
import ru.mrmarvel.camoletapp.ui.theme.CamoletTheme

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
    private val cameraScreenViewModel: CameraScreenViewModel by viewModels()
    private val loginScreenViewModel: LoginScreenViewModel by viewModels()
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        window.decorView.systemUiVisibility = View.SYSTEM_UI_FLAG_FULLSCREEN
        actionBar?.hide()
        var isAuthorized = false
        if (filesDir.list()?.contains("login.json") == true) {
            isAuthorized = true
        }
        var startDestination = "login_screen"
        if (isAuthorized) {
            startDestination = "monitoring_screen"
        }
        setContent {
            val navController = rememberNavController()
            val context = LocalContext.current
            CamoletTheme {
                // A surface container using the 'background' color from the theme
                Surface(
                    modifier = Modifier.fillMaxSize(),
                    color = MaterialTheme.colors.background
                ) {
                    NavHost(navController = navController, startDestination = startDestination) {
                        composable("login_screen") {
                            LoginScreen(loginScreenViewModel = loginScreenViewModel,
                                navigateToMonitoringScreen = {
                                    navController.navigate("monitoring_screen") {
                                        popUpTo("login_screen") {inclusive=true}
                                    }
                                }
                            )
                        }
                        composable("monitoring_screen") {
                            MonitoringScreen(sharedViewModel = sharedViewModel,
                                navigateToCameraScreen = {
                                    navController.navigate("camera_screen")
                                },
                                navigateToObserverStartScreen = {
                                    navController.navigate("observe_start_screen")
                                },
                                navigateToProfileScreen = {
                                    navController.navigate("profile_screen")
                                },
                                navigateToHelpScreen = {
                                    navController.navigate("help_screen")
                                }
                            )
                        }
                        composable("camera_screen") {
                            CameraScreen(
                                cameraViewModel = cameraScreenViewModel,
                                sharedViewModel = sharedViewModel,
                                navigateToObserveResultScreen = {
                                    navController.navigate("observe_result_screen") {
                                        popUpTo("monitoring_screen")
                                    }
                                },
                                // navigateToMonitoringScreen = {
                                //     navController.navigate("monitoring_screen", navOptions =
                            //     NavOptions.Builder().)
                                // }
                            )
                        }
                        composable("observe_start_screen") {
                            ObserveStartScreen(
                                cameraScreenViewModel = cameraScreenViewModel,
                                sharedViewModel = sharedViewModel,
                                navigateToCameraScreen = {
                                    navController.navigate("camera_screen")
                                },
                                navigateBack = {
                                    navController.popBackStack()
                                },
                                navigateToHelpScreen = {
                                    navController.navigate("help_screen")
                                },
                                navigateToProfileScreen = {
                                    navController.navigate("profile_screen")
                                },
                            )
                        }
                        composable("observe_result_screen") {
                            ObserveResultScreen(
                                cameraScreenViewModel = cameraScreenViewModel,
                                sharedViewModel = sharedViewModel,
                                navigateToMonitoringScreen = {
                                    navController.navigate("monitoring_screen")
                                },
                                navigateToHelpScreen = {
                                    navController.navigate("help_screen")
                                },
                                navigateToProfileScreen = {
                                    navController.navigate("profile_screen")
                                },
                            )
                        }
                        composable("profile_screen") {
                            ProfileScreen(
                                navigateToMonitoringScreen = {
                                    navController.navigate("monitoring_screen") {
                                        popUpTo("monitoring_screen") {inclusive = true}
                                    }
                                },
                                navigateToHelpScreen = {
                                    navController.navigate("help_screen")
                                }
                            )
                        }
                        composable("help_screen") {
                            HelpScreen(
                                navigateToMonitoringScreen = {
                                    navController.popBackStack()
                                },
                                navigateToProfileScreen = {
                                    navController.navigate("profile_screen")
                                }
                            )
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
    CamoletTheme() {
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
        CamoletTheme() {
            MonitoringItemBuildingNew(
                dateNumber = "19",
                dateFull = "Март 19 2024",
                coordinates = "55.685812, 37.409567",
                projectName = "ЖК Жульен в подольске"
            )
        }
    }
}