package ru.mrmarvel.hellofigma.data.repository

import androidx.compose.runtime.mutableStateListOf
import androidx.compose.runtime.mutableStateOf
import androidx.lifecycle.LiveData
import androidx.lifecycle.Transformations
import kotlinx.coroutines.Dispatchers
import ru.mrmarvel.hellofigma.data.models.Project
import ru.mrmarvel.hellofigma.data.sources.ProjectSource

class ProjectRepository(private val projectSource: ProjectSource) {
    var projects = mutableStateOf(listOf<Project>())
    suspend fun getAll(): List<Project> {
        projects.value = projectSource.getAll()
        return projects.value
    }

}

