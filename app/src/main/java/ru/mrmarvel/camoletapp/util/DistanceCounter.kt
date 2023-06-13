package ru.mrmarvel.camoletapp.util

import android.location.Location
import android.util.Log
import androidx.compose.ui.unit.min
import ru.mrmarvel.camoletapp.data.SharedViewModel
import ru.mrmarvel.camoletapp.data.models.Flat
import ru.mrmarvel.camoletapp.data.models.Floor
import ru.mrmarvel.camoletapp.data.models.House
import ru.mrmarvel.camoletapp.data.models.Project
import ru.mrmarvel.camoletapp.data.models.ResultNearestObject
import ru.mrmarvel.camoletapp.data.models.Section
import ru.mrmarvel.camoletapp.data.sources.ProjectSource
import java.util.stream.Stream

class DistanceCounter {
    fun split(coords: String): DoubleArray {
        return Stream.of(*coords.split(",".toRegex()).dropLastWhile { it.isEmpty() }
            .toTypedArray())
            .mapToDouble { s: String -> s.toDouble() }
            .toArray()
    }

    suspend fun getNearestObject(sharedViewModel: SharedViewModel): ResultNearestObject {
        val currLocation = sharedViewModel.currentLocation.value
        val currSource = sharedViewModel.projectRepository
        val resultObject = ResultNearestObject()
        if (currLocation == null) return resultObject

        Log.d("MYDEBUG", "GETTING NEAREST OBJ")
        val projects = currSource.getProjects()
        var minDist: Double = Double.MAX_VALUE
        for (project in projects){
            if (project.coordinates == null) continue
            val projLocation = Location("")
            val coords = split(project.coordinates)
            projLocation.latitude = coords[0]
            projLocation.longitude = coords[1]
            val dist = currLocation.distanceTo(projLocation).toDouble()
            if (dist < minDist){
                minDist = dist
                resultObject.project = project
            }
        }

        // ЖОСКИЙ КОСТЫЛЬ ДЛЯ ОТОБРАЖЕНИЯ
        // ППОТОМУ ЧТО В БД НЕ ВСЕ КООРДИНАТЫ ЕСТЬ
        if (projects.size > 0) resultObject.project = projects[0]
        else return resultObject
        val houses = currSource.getHouseByIdProject(listOf(resultObject.project!!.id))
        minDist = Double.MAX_VALUE
        for (house in houses){
            if (house.coordinates == null) continue
            val projLocation = Location("")
            val coords = split(house.coordinates)
            projLocation.latitude = coords[0]
            projLocation.longitude = coords[1]
            val dist = currLocation.distanceTo(projLocation).toDouble()
            if (dist < minDist){
                minDist = dist
                resultObject.house = house
            }
        }

        // ЖОСКИЙ КОСТЫЛЬ ДЛЯ ОТОБРАЖЕНИЯ
        // ППОТОМУ ЧТО В БД НЕ ВСЕ КООРДИНАТЫ ЕСТЬ
        if (houses.size > 0) resultObject.house = houses[0]
        else return resultObject
        val sections = currSource.getSectionByIdHouse(listOf(resultObject.house!!.id))
        minDist = Double.MAX_VALUE
        for (section in sections){
            if (section.coordinates == null) continue
            val projLocation = Location("")
            val coords = split(section.coordinates)
            projLocation.latitude = coords[0]
            projLocation.longitude = coords[1]
            val dist = currLocation.distanceTo(projLocation).toDouble()
            if (dist < minDist){
                minDist = dist
                resultObject.section = section
            }
        }

        // ЖОСКИЙ КОСТЫЛЬ ДЛЯ ОТОБРАЖЕНИЯ
        // ППОТОМУ ЧТО В БД НЕ ВСЕ КООРДИНАТЫ ЕСТЬ
        if (sections.size > 0) resultObject.section = sections[0]
        else return resultObject
        resultObject.floor = currSource.getFloorByIdSection(listOf(resultObject.section!!.id))[0]

        resultObject.flatsList = currSource.getAllFlatsOnFloor(resultObject.floor!!.id)

        return resultObject
    }

    fun getNearestFlat(flats: List<Flat>, currentLocation: Location?): Flat {
        var minDist: Double = Double.MAX_VALUE
        var nearestFlat: Flat = Flat()

        if (currentLocation == null) return nearestFlat

        Log.d("MYDEBUG", "GETTING NEAREST FLAT")
        for (flat in flats){
            if (flat.coordinates == null) continue
            val projLocation = Location("")
            val coords = split(flat.coordinates!!)
            projLocation.latitude = coords[0]
            projLocation.longitude = coords[1]
            val dist = currentLocation.distanceTo(projLocation).toDouble()
            if (dist < minDist){
                minDist = dist
                nearestFlat = flat
            }
        }
        return nearestFlat
    }
}