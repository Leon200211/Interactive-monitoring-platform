package ru.mrmarvel.camoletapp.screens

import androidx.compose.foundation.layout.Column
import androidx.compose.foundation.layout.fillMaxSize
import androidx.compose.foundation.layout.fillMaxWidth
import androidx.compose.foundation.layout.padding
import androidx.compose.material.Scaffold
import androidx.compose.material.Surface
import androidx.compose.material.Text
import androidx.compose.material.rememberScaffoldState
import androidx.compose.runtime.Composable
import androidx.compose.runtime.rememberCoroutineScope
import androidx.compose.ui.Alignment
import androidx.compose.ui.Modifier
import androidx.compose.ui.graphics.Color
import androidx.compose.ui.platform.LocalContext
import androidx.compose.ui.tooling.preview.Preview
import androidx.compose.ui.unit.dp
import kotlinx.coroutines.launch
import ru.mrmarvel.camoletapp.camoletappbar.CamoletAppBar
import ru.mrmarvel.camoletapp.camoletappbar.Show
import ru.mrmarvel.camoletapp.customcamoletappbar.CustomCamoletAppBar
import ru.mrmarvel.camoletapp.profilelabel.ProfileLabel
import ru.mrmarvel.camoletapp.ui.NavigationDrawer


@Composable
fun ProfileScreen(
    modifier: Modifier = Modifier,
    navigateToHelpScreen: () -> Unit = {},
    navigateToMonitoringScreen: () -> Unit = {}
) {
    val scaffoldState = rememberScaffoldState()
    val context = LocalContext.current
    Scaffold(
        modifier = modifier.fillMaxSize(),
        scaffoldState = scaffoldState,
        topBar = {
            val coroutineScope = rememberCoroutineScope()
            CamoletAppBar(modifier.fillMaxWidth(),
                appBarText = "ПРОФИЛЬ",
                show = Show.All,
                onBurgerClick = {
                    coroutineScope.launch {
                        scaffoldState.drawerState.open()
                    }
                }
            )
        },
        drawerContent = {
            NavigationDrawer(scaffoldState = scaffoldState,
                navigateToHelpScreen = navigateToHelpScreen,
                navigateToMonitoringScreen = navigateToMonitoringScreen
            )
        },
        drawerBackgroundColor = Color.Transparent,
        drawerElevation = 0.dp,
    ) {padding ->
        Surface(
            Modifier
                .padding(padding)
                .padding(15.dp)
                .fillMaxSize()
        ) {
            Column(
                Modifier.fillMaxWidth()
            ) {
                /*IconButton(
                    modifier = Modifier
                        .size(24.dp)
                        .align(End),
                    onClick = {

                    }
                ) {
                    Image(
                        painter = painterResource(id = R.drawable.edit_image),
                        contentDescription = "Edit profile")
                }*/
                Column(
                    horizontalAlignment = Alignment.CenterHorizontally,
                    modifier = Modifier.padding(top = 30.dp)
                ) {
                    Text("ID", Modifier.padding(bottom = 1.dp))
                    ProfileLabel(
                        Modifier.padding(bottom = 16.dp),
                        text = "120894")
                    val elementModifier = Modifier
                        .fillMaxWidth()
                        .padding(bottom = 8.dp)
                    val elementLabelModifier = Modifier
                        .padding(bottom = 1.dp)
                        .fillMaxWidth()
                    Column {
                        Text("Фамилия", elementLabelModifier)
                        ProfileLabel(elementModifier, text = "Унгер")
                        Text("Имя", elementLabelModifier)
                        ProfileLabel(elementModifier, text = "Антон")
                        Text("Отчество", elementLabelModifier)
                        ProfileLabel(elementModifier, text = "Юрьевич")
                    }
                }
            }
        }
    }
}

@Preview
@Composable
fun Avatar() {

}

@Preview
@Composable
fun ProfileScreenPreview() {
    ProfileScreen()
}

@Preview
@Composable
fun CustomCamoletAppBarPreview() {
    CustomCamoletAppBar()
}