package ru.mrmarvel.camoletapp.data.models

import com.google.gson.annotations.SerializedName

data class Project(
    val id: Int,
    val title: String,
    val address: String,
    val coordinates: String?,
    @SerializedName("area_coordinates")
    val areaCoordinates: String
)

data class House(
    val id: Int,
    val title: String,
    val coordinates: String?,
)

data class Section(
    val id: Int,
    @SerializedName("section_number")
    val title: String,
    val coordinates: String?,
)

data class Floor(
    val id: Int,
    @SerializedName("floor_number")
    val floorNumber: String
)

data class Flat(
    var id: Int = 0,
    var id_floor: Int = 0,
    var apartment_number: Int = 0,
    var coordinates: String? = null,
    var sockets: Int = 0,
    var switches: Int = 0,
    var toilet: Int = 0,
    var sink: Int = 0,
    var bath: Int = 0,
    var floor_finishing: Int = 0,
    var draft_floor_department: Int = 0,
    var ceiling_finishing: Int = 0,
    var draft_ceiling_finish: Int = 0,
    var wall_finishing: Int = 0,
    var draft_wall_finish: Int = 0,
    var windowsill: Int = 0,
    var kitchen: Int = 0,
    var slopes: Int = 0,
    var doors: Int = 0,
    var wall_plaster: Int = 0,
    var trash: Int = 0,
    var radiator: Int = 0,
    var floor_plaster: Int = 0,
    var ceiling_plaster: Int = 0,
    var windows: Int = 0,
)

data class ResultNearestObject(
    var project: Project? = null,
    var house: House? = null,
    var section: Section? = null,
    var floor: Floor? = null,
    var flatsList: List<Flat> = listOf()
)