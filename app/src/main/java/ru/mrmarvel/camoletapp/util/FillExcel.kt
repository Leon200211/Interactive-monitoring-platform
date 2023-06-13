package ru.mrmarvel.camoletapp.util
//
//import android.util.Log
//import com.grapecity.documents.excel.*
//import com.grapecity.documents.excel.drawing.*
//import com.grapecity.documents.excel.IWorksheet
//import com.grapecity.documents.excel.Workbook
//import java.util.HashMap
//import java.util.Vector
//
//fun processStatistic(data: HashMap<Int, Vector<Float>>?) {
//    val workbook = Workbook()
//    val worksheet = workbook.worksheets.get(0)
//    Log.d("excel", "Data got")
//
//    worksheet.getRange("B3:C7").value =
//        arrayOf(
//            arrayOf<Any>("ITEM", "AMOUNT"),
//            arrayOf("Income 1", 2500),
//            arrayOf("Income 2", 1000),
//            arrayOf("Income 3", 250),
//            arrayOf("Other", 250)
//        )
//    worksheet.getRange("B10:C23").value =
//        arrayOf(
//            arrayOf<Any>("ITEM", "AMOUNT"),
//            arrayOf("Rent/mortgage", 800),
//            arrayOf("Electric", 120),
//            arrayOf("Gas", 50),
//            arrayOf("Cell phone", 45),
//            arrayOf("Groceries", 500),
//            arrayOf("Car payment", 273),
//            arrayOf("Auto expenses", 120),
//            arrayOf("Student loans", 50),
//            arrayOf("Credit cards", 100),
//            arrayOf("Auto Insurance", 78),
//            arrayOf("Personal care", 50),
//            arrayOf("Entertainment", 100),
//            arrayOf("Miscellaneous", 50)
//        )
//
//    worksheet.getRange("B2:C2").merge()
//    worksheet.getRange("B2").value = "MONTHLY INCOME"
//    worksheet.getRange("B9:C9").merge()
//    worksheet.getRange("B9").value = "MONTHLY EXPENSES"
//    worksheet.getRange("E2:G2").merge()
//    worksheet.getRange("E2").value = "PERCENTAGE OF INCOME SPENT"
//    worksheet.getRange("E5:G5").merge()
//    worksheet.getRange("E5").value = "SUMMARY"
//    worksheet.getRange("E3:F3").merge()
//    worksheet.getRange("E9").value = "BALANCE"
//    worksheet.getRange("E6").value = "Total Monthly Income"
//    worksheet.getRange("E7").value = "Total Monthly Expenses"
//
//    val incomeTable = worksheet.getTables().add(worksheet.getRange("B3:C7"), true)
//    incomeTable.setName("tblIncome")
//    incomeTable.setTableStyle(workbook.getTableStyles().get("TableStyleMedium4"))
//    val expensesTable = worksheet.getTables().add(worksheet.getRange("B10:C23"), true)
//    expensesTable.setName("tblExpenses")
//    expensesTable.setTableStyle(workbook.getTableStyles().get("TableStyleMedium4"))
//
//    worksheet.getNames().add("TotalMonthlyIncome", "=SUM(tblIncome[AMOUNT])")
//    worksheet.getNames().add("TotalMonthlyExpenses", "=SUM(tblExpenses[AMOUNT])")
//    worksheet.getRange("E3").setFormula("=TotalMonthlyExpenses")
//    worksheet.getRange("G3").setFormula("=TotalMonthlyExpenses/TotalMonthlyIncome")
//    worksheet.getRange("G6").setFormula("=TotalMonthlyIncome")
//    worksheet.getRange("G7").setFormula("=TotalMonthlyExpenses")
//    worksheet.getRange("G9").setFormula("=TotalMonthlyIncome-TotalMonthlyExpenses")
//
//    worksheet.setStandardHeight(26.25)
//    worksheet.setStandardWidth(8.43)
//
//    worksheet.getRange("2:24").setRowHeight(27.0)
//    worksheet.getRange("A:A").setColumnWidth(2.855)
//    worksheet.getRange("B:B").setColumnWidth(33.285)
//    worksheet.getRange("C:C").setColumnWidth(25.57)
//    worksheet.getRange("D:D").setColumnWidth(1.0)
//    worksheet.getRange("E:F").setColumnWidth(25.57)
//    worksheet.getRange("G:G").setColumnWidth(14.285)
//
////    val currencyStyle = workbook.getStyles().get("Currency")
////    currencyStyle.setIncludeAlignment(true)
////    currencyStyle.setHorizontalAlignment(HorizontalAlignment.Left)
////    currencyStyle.setVerticalAlignment(VerticalAlignment.Bottom)
////    currencyStyle.setNumberFormat("$#,##0.00")
////    val heading1Style = workbook.getStyles().get("Heading 1")
////    heading1Style.setIncludeAlignment(true)
////    heading1Style.setHorizontalAlignment(HorizontalAlignment.Center)
////    heading1Style.setVerticalAlignment(VerticalAlignment.Center)
////    heading1Style.getFont().setName("Century Gothic")
////    heading1Style.getFont().setBold(true)
////    heading1Style.getFont().setSize(11.0)
////    heading1Style.getFont().setColor(Color.GetWhite())
////    heading1Style.setIncludeBorder(false)
////    heading1Style.setIncludePatterns(true)
////    heading1Style.getInterior().setColor(Color.FromArgb(32, 61, 64))
////    val percentStyle = workbook.getStyles().get("Percent")
////    percentStyle.setIncludeAlignment(true)
////    percentStyle.setHorizontalAlignment(HorizontalAlignment.Center)
////    percentStyle.setIncludeFont(true)
////    percentStyle.getFont().setColor(Color.FromArgb(32, 61, 64))
////    percentStyle.getFont().setName("Century Gothic")
////    percentStyle.getFont().setBold(true)
////    percentStyle.getFont().setSize(14.0)
////    worksheet.getSheetView().setDisplayGridlines(false)
////    worksheet.getRange("C4:C7, C11:C23, G6:G7, G9").setStyle(currencyStyle)
////    worksheet.getRange("B2, B9, E2, E5").setStyle(heading1Style)
////    worksheet.getRange("G3").setStyle(percentStyle)
////    worksheet.getRange("E6:G6").getBorders().get(BordersIndex.EdgeBottom).setLineStyle(BorderLineStyle.Medium)
////    worksheet.getRange("E6:G6").getBorders().get(BordersIndex.EdgeBottom).setColor(Color.FromArgb(32, 61, 64))
////    worksheet.getRange("E7:G7").getBorders().get(BordersIndex.EdgeBottom).setLineStyle(BorderLineStyle.Medium)
////    worksheet.getRange("E7:G7").getBorders().get(BordersIndex.EdgeBottom).setColor(Color.FromArgb(32, 61, 64))
////    worksheet.getRange("E9:G9").getInterior().setColor(Color.FromArgb(32, 61, 64))
////    worksheet.getRange("E9:G9").setHorizontalAlignment(HorizontalAlignment.Left)
////    worksheet.getRange("E9:G9").setVerticalAlignment(VerticalAlignment.Center)
////    worksheet.getRange("E9:G9").getFont().setName("Century Gothic")
////    worksheet.getRange("E9:G9").getFont().setBold(true)
////    worksheet.getRange("E9:G9").getFont().setSize(11.0)
////    worksheet.getRange("E9:G9").getFont().setColor(Color.GetWhite())
////    worksheet.getRange("E3:F3").getBorders().setColor(Color.FromArgb(32, 61, 64))
////
////    workbook.save("SimpleBudget.xlsx")
//}