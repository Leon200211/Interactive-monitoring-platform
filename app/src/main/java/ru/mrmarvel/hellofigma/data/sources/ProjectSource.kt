package ru.mrmarvel.hellofigma.data.sources

import android.util.Log
import com.google.gson.GsonBuilder
import okhttp3.HttpUrl
import okhttp3.OkHttpClient
import okhttp3.Request
import org.json.JSONArray
import org.json.JSONObject
import retrofit2.Call
import retrofit2.Response
import retrofit2.Retrofit
import retrofit2.converter.gson.GsonConverterFactory
import retrofit2.converter.scalars.ScalarsConverterFactory
import ru.gildor.coroutines.okhttp.await
import ru.mrmarvel.hellofigma.data.models.Project
import ru.mrmarvel.hellofigma.data.repository.ProjectRepository

class ProjectSource {
    suspend fun getAll(): List<Project> {
        val client = OkHttpClient()
        val queryParams = HttpUrl.parse("http://u1988986.isp.regruhosting.ru/rest")!!.newBuilder()
            .addQueryParameter("sql", "SELECT * FROM projects;")
        val api = Request.Builder()
            .url(queryParams.build())
            .get()
            .build()
        // BLOCKING
        val response = client.newCall(api).await()
        val result = response.body()?.string() ?: "[]"
        Log.d("MYDEBUG", "Send data to server was: $result")
        val jsonArray = JSONArray(result)
        val ormArray = mutableListOf<Project>()
        for (i in 0 until jsonArray.length()) {
            val x = GsonBuilder().create().fromJson(jsonArray.get(i).toString(), Project::class.java)
            ormArray.add(x)
        }
        return ormArray
    }
}