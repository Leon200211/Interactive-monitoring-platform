package ru.mrmarvel.camoletapp.data.repository

import ru.mrmarvel.camoletapp.data.models.User
import ru.mrmarvel.camoletapp.data.sources.SQLSource

class UserRepository(private val sqlSource: SQLSource) {
    suspend fun getAll(): List<User> {
        return sqlSource.getAllUsers()
    }
}