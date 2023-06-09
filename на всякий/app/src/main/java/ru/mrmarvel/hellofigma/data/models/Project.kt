package ru.mrmarvel.hellofigma.data.models

data class Project(
    val id: Int,
    val title: String,
    val address: String,
    val coordinates: String,
    val areaCoordinates: String
)