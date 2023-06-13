package ru.mrmarvel.camoletapp.screens

import android.content.Context
import androidx.compose.animation.core.Animatable
import androidx.compose.animation.core.AnimationSpec
import androidx.compose.animation.core.FastOutLinearInEasing
import androidx.compose.animation.core.keyframes
import androidx.compose.foundation.Image
import androidx.compose.foundation.layout.Arrangement
import androidx.compose.foundation.layout.Column
import androidx.compose.foundation.layout.fillMaxSize
import androidx.compose.foundation.layout.fillMaxWidth
import androidx.compose.foundation.layout.offset
import androidx.compose.foundation.layout.padding
import androidx.compose.material.Surface
import androidx.compose.material.Text
import androidx.compose.material.TextField
import androidx.compose.runtime.Composable
import androidx.compose.runtime.remember
import androidx.compose.runtime.rememberCoroutineScope
import androidx.compose.ui.Alignment
import androidx.compose.ui.Modifier
import androidx.compose.ui.graphics.Color
import androidx.compose.ui.platform.LocalContext
import androidx.compose.ui.res.painterResource
import androidx.compose.ui.res.stringResource
import androidx.compose.ui.unit.dp
import com.google.gson.Gson
import kotlinx.coroutines.launch
import ru.mrmarvel.camoletapp.R
import ru.mrmarvel.camoletapp.bigappname.BigAppName
import ru.mrmarvel.camoletapp.blue1linebutton.Blue1lineButton
import ru.mrmarvel.camoletapp.data.LoginError
import ru.mrmarvel.camoletapp.data.LoginScreenViewModel
import ru.mrmarvel.camoletapp.data.models.User

private val shakeKeyframes: AnimationSpec<Float> = keyframes {
    val durationMillis = 800
    val easing = FastOutLinearInEasing

    // generate 8 keyframes
    for (i in 1..8) {
        val x = when (i % 3) {
            0 -> 4f
            1 -> -4f
            else -> 0f
        }
        x at durationMillis / 10 * i with easing
    }
}

@Composable
fun LoginScreen(
    loginScreenViewModel: LoginScreenViewModel,
    navigateToMonitoringScreen: () -> Unit = {},
) {
    val context = LocalContext.current
    val coroutineScope = rememberCoroutineScope()
    val loginError = remember { loginScreenViewModel.loginError }
    val username = remember { loginScreenViewModel.username }
    val password = remember { loginScreenViewModel.password }
    val formOffsetX = remember { Animatable(0f) }
    Surface(
        Modifier.fillMaxSize()
    ) {
        Column(
            horizontalAlignment = Alignment.CenterHorizontally,
            verticalArrangement = Arrangement.Center,
            modifier = Modifier.padding(30.dp)
        ) {
            BigAppName(
                text = stringResource(id = R.string.company_name),
                modifier = Modifier.padding(bottom = 50.dp)
            )
            val inputModifier = Modifier
                .fillMaxWidth()
                .padding(bottom = 15.dp)
                .offset(x = formOffsetX.value.dp)
            TextField(
                modifier = inputModifier,
                leadingIcon = {
                    Image(
                        painter = painterResource(id = R.drawable.user_icon),
                        contentDescription = "Login icon"
                    )
                },
                value = username.value,
                onValueChange = { username.value = it },
                placeholder = { Text("BungerUsername") },
                singleLine = true,
                label = { Text("Логин") }
            )
            TextField(
                modifier = inputModifier,
                leadingIcon = {
                    Image(
                        painter = painterResource(id = R.drawable.lock_icon),
                        contentDescription = "Password icon"
                    )
                },
                placeholder = { Text("coolpassword1234") },
                value = password.value,
                onValueChange = { password.value = it },
                singleLine = true,
                label = { Text("Пароль") }
            )
            if (loginError.value == LoginError.WRONG_PASSWORD) {
                Text(stringResource(id = R.string.login_error_unknown_user), color = Color.Red)
            }
            if (loginError.value == LoginError.BLANK_FIELDS) {
                Text(stringResource(R.string.login_error_blank_fields), color = Color.Red)
            }
            if (loginError.value == LoginError.USERNAME_NOT_FOUND) {
                Text(stringResource(R.string.login_error_unknown_user), color = Color.Red)
            }

            Blue1lineButton(
                buttonText = "ВОЙТИ",
                onItemClicked = {
                    coroutineScope.launch {
                        if (loginScreenViewModel.verifyLogin()) {
                            loginScreenViewModel.user?.let {
                                saveUserToFile(context = context, it)
                            }
                            navigateToMonitoringScreen()
                        } else {
                            formOffsetX.animateTo(
                                targetValue = 0f,
                                animationSpec = shakeKeyframes,
                            )
                        }
                    }
                },
                modifier = Modifier.padding(top = 50.dp)
            )
        }
    }
}

fun saveUserToFile(context: Context, user: User) {
    context.openFileOutput("login.json", Context.MODE_PRIVATE).use {
        it.write(Gson().toJson(user).toString().toByteArray())
    }
}