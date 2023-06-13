package ru.mrmarvel.camoletapp.data.models

import com.google.gson.annotations.SerializedName

data class User(
    val id: Int,
    val login: String,
    val password: String,
    val role: String,
    @SerializedName("name")
    val fullName: String,
    @Transient
    val name: String,
    @Transient
    val surname: String,
)