package ru.mrmarvel.camoletapp.data.sources

import retrofit2.Call
import retrofit2.http.POST
import retrofit2.http.Query

interface SQLControl {
    @POST("/")
    suspend fun sql(@Query("sql") sql: String): Call<String>
}