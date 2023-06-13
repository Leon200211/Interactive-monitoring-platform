package ru.mrmarvel.camoletapp.screens

import androidx.compose.animation.animateContentSize
import androidx.compose.foundation.ExperimentalFoundationApi
import androidx.compose.foundation.layout.Column
import androidx.compose.foundation.layout.fillMaxSize
import androidx.compose.foundation.layout.fillMaxWidth
import androidx.compose.foundation.layout.padding
import androidx.compose.foundation.lazy.LazyColumn
import androidx.compose.material.Scaffold
import androidx.compose.material.Surface
import androidx.compose.material.Text
import androidx.compose.material.rememberScaffoldState
import androidx.compose.runtime.Composable
import androidx.compose.runtime.mutableStateOf
import androidx.compose.runtime.remember
import androidx.compose.runtime.rememberCoroutineScope
import androidx.compose.ui.Alignment
import androidx.compose.ui.Modifier
import androidx.compose.ui.graphics.Color
import androidx.compose.ui.tooling.preview.Preview
import androidx.compose.ui.unit.dp
import kotlinx.coroutines.launch
import ru.mrmarvel.camoletapp.blue1linebuttonbold.Blue1lineButtonBold
import ru.mrmarvel.camoletapp.camoletappbar.CamoletAppBar
import ru.mrmarvel.camoletapp.profilelabel.ProfileLabel
import ru.mrmarvel.camoletapp.ui.NavigationDrawer

data class QA(
    val question: String = "Это вопрос?",
    val answer: String = "Ответ всегда близко"
)

val QAs = listOf(
    QA("Как создать новый мониторинг?"),
    QA("Как посмотреть “шахматки”?"),
    QA("Как зафиксировать квартиру на камере?")
)

@OptIn(ExperimentalFoundationApi::class)
@Composable
fun HelpScreen(
    modifier: Modifier = Modifier,
    navigateToMonitoringScreen: () -> Unit = {},
    navigateToProfileScreen: () -> Unit = {},
) {
    val scaffoldState = rememberScaffoldState()
    val coroutineScope = rememberCoroutineScope()
    Scaffold(
        modifier = modifier.fillMaxSize(),
        scaffoldState = scaffoldState,
        topBar = {
            CamoletAppBar(appBarText = "ПОМОЩЬ",
                modifier = Modifier.fillMaxWidth(),
                onProfileClick = navigateToProfileScreen,
                onBurgerClick = {
                    coroutineScope.launch {
                        scaffoldState.drawerState.open()
                    }
                }
            )
        },
        drawerContent = {
                        NavigationDrawer(
                            scaffoldState = scaffoldState,
                            navigateToMonitoringScreen = navigateToMonitoringScreen,
                            navigateToHelpScreen = {}
                        )
        },
        drawerBackgroundColor = Color.Transparent,
        drawerElevation = 0.dp,
    ) { padding->
        Surface(
            Modifier
                .padding(padding)
                .padding(30.dp)) {
            Column (
                horizontalAlignment = Alignment.CenterHorizontally
            ) {
                Blue1lineButtonBold(
                    text = "ЧАСТО ЗАДАВАЕМЫЕ ВОПРОСЫ",
                    modifier = Modifier.padding(vertical = 32.dp)
                )
                val elementModifier = Modifier
                    .padding(vertical = 16.dp)
                    .fillMaxWidth()
                LazyColumn(
                    horizontalAlignment = Alignment.CenterHorizontally,
                ) {
                    items(QAs.size) { i ->
                        val qa = QAs[i]
                        val opened = remember { mutableStateOf(false) }
                        Column (
                            Modifier.animateContentSize()
                        ) {
                            ProfileLabel(
                                text = qa.question,
                                modifier = elementModifier,
                                onItemClick = {opened.value = !opened.value}
                            )
                            if (opened.value) {
                                Text(text = qa.answer)
                            }
                        }
                    }
                }
            }
        }

    }
}
@Preview
@Composable
fun Blue1lineButtonBoldPreview() {
    Blue1lineButtonBold(text = "ЧАСТО ЗАДАВАЕМЫЕ ВОПРОСЫ")
}