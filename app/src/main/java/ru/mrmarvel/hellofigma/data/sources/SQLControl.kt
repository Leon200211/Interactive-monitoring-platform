package ru.mrmarvel.hellofigma.data.sources

import org.json.JSONObject
import retrofit2.Call
import retrofit2.http.Field
import retrofit2.http.POST
import retrofit2.http.Query

interface SQLControl {
    @POST("/")
    suspend fun sql(@Query("sql") sql: String): Call<String>
}