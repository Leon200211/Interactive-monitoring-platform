package ru.mrmarvel.camoletapp.data

import androidx.compose.runtime.mutableStateOf
import androidx.lifecycle.MutableLiveData
import androidx.lifecycle.ViewModel
import de.nycode.bcrypt.verify
import ru.mrmarvel.camoletapp.data.models.User
import ru.mrmarvel.camoletapp.data.repository.UserRepository
import ru.mrmarvel.camoletapp.data.sources.SQLSource

enum class LoginError {
    WRONG_PASSWORD,
    USERNAME_NOT_FOUND,
    BLANK_FIELDS,
}

class LoginScreenViewModel : ViewModel() {
    var userRepository: UserRepository = UserRepository(SQLSource.getSQLSource())
    var loginError = MutableLiveData<LoginError?>(null)
    var username = mutableStateOf("")
    var password = mutableStateOf("")
    var user: User? = null


    suspend fun verifyLogin(): Boolean {
        if (username.value.isEmpty() || password.value.isEmpty()) {
            loginError.value = LoginError.BLANK_FIELDS
            return false
        }
        try {
            val users = userRepository.getAll()
            for (user in users) {
                if (username.value != user.login) continue
                val isSuccessful = verify(password.value, user.password.toByteArray())
                if (!isSuccessful) {
                    loginError.value = LoginError.WRONG_PASSWORD
                    password.value = ""
                    return false
                }
                this.user = user
                return true
            }
        } catch (_: Exception) {}
        loginError.value = LoginError.USERNAME_NOT_FOUND
        password.value = ""
        return false
    }
}