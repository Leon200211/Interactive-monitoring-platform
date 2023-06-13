package ru.mrmarvel.camoletapp.data.sources

import android.util.Log
import com.google.gson.GsonBuilder
import okhttp3.HttpUrl
import okhttp3.OkHttpClient
import okhttp3.Request
import org.json.JSONArray
import ru.gildor.coroutines.okhttp.await
import ru.mrmarvel.camoletapp.data.models.User

class SQLSource {
    suspend fun getAllUsers(): List<User> {
        var jsonArray = JSONArray()
        try {
            val client = OkHttpClient()
            val queryParams =
                HttpUrl.parse("http://u1988986.isp.regruhosting.ru/rest")!!.newBuilder()
                    .addQueryParameter(
                        "sql", "SELECT * FROM users;"
                    )
            val api = Request.Builder()
                .url(queryParams.build())
                .get()
                .build()
            // BLOCKING
            val response = client.newCall(api).await()
            val result = response.body()?.string() ?: "[]"
            Log.d("MYDEBUG", "Get Users: $result")
            jsonArray = JSONArray(result)
        } catch (_: Exception) {
            return listOf()
        }
        val ormArray = mutableListOf<User>()
        for (i in 0 until jsonArray.length()) {
            try {
                val x =
                    GsonBuilder().create().fromJson(jsonArray.get(i).toString(), User::class.java)
                ormArray.add(x)
            } catch (_: Exception) {}
        }
        return ormArray
    }


    companion object {
        private val sqlSource = SQLSource()
        fun getSQLSource(): SQLSource {
            return sqlSource
        }

    }
}