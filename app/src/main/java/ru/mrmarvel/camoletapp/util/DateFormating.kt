package ru.mrmarvel.camoletapp.util

fun getRussianMonthName(monthNum: Int): String {
    val monthsNames = listOf(
        "Январь","Февраль","Март","Апрель",
        "Май","Июнь","Июль","Август",
        "Сентябрь", "Октябрь","Ноябрь","Декабрь"
    )
    if (monthNum < 1) throw IllegalArgumentException("Less than 1")
    if (monthNum > 12) throw IllegalArgumentException("More than 12")
    return monthsNames[monthNum+1]
}