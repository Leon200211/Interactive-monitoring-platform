package ru.mrmarvel.camoletapp.util;

import static java.security.AccessController.getContext;

import android.content.Context;
import android.os.Environment;
import android.util.Log;

import java.io.BufferedReader;
import java.io.File;
import java.io.FileInputStream;
import java.io.FileOutputStream;
import java.io.IOException;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.lang.reflect.Field;
import java.util.HashMap;


import org.apache.poi.hssf.usermodel.HSSFSheet;
import org.apache.poi.hssf.usermodel.HSSFWorkbook;
import org.apache.poi.ss.usermodel.Cell;
import org.apache.poi.ss.usermodel.ConditionalFormattingRule;
import org.apache.poi.ss.usermodel.ConditionalFormattingThreshold;
import org.apache.poi.ss.usermodel.DataBarFormatting;
import org.apache.poi.ss.usermodel.ExtendedColor;
import org.apache.poi.ss.usermodel.Row;
import org.apache.poi.ss.usermodel.SheetConditionalFormatting;
import org.apache.poi.ss.util.CellRangeAddress;
import org.apache.poi.xssf.usermodel.XSSFCellStyle;
import org.apache.poi.xssf.usermodel.XSSFConditionalFormattingRule;
import org.apache.poi.xssf.usermodel.XSSFSheet;
import org.apache.poi.xssf.usermodel.XSSFWorkbook;
import org.apache.poi.xssf.usermodel.XSSFDataBarFormatting;
import org.apache.xmlbeans.XmlObject;


public class ExcelWriter {

    public XSSFWorkbook workbook;
    public XSSFWorkbook report;
    public XSSFCellStyle style;

    //    private String nameTemplate = "Готовности по типу";
    public HashMap<Percentage, String> PercentageEnumToString = new HashMap<Percentage, String>(){{
        put(Percentage.FLOOR_ROUGH, "% Пола без отделки");
        put(Percentage.FLOOR_PLASTER, "% Пола с черновой");
        put(Percentage.FLOOR_FINISH, "% Пола с чистовой");
        put(Percentage.CEILING_ROUGH, "% Потолка без отделки");
        put(Percentage.CEILING_PLASTER, "% Потолка с черновой");
        put(Percentage.CEILING_FINISH, "% Потолка с чистовой");
        put(Percentage.WALL_ROUGH, "% Стен без отделки");
        put(Percentage.WALL_PLASTER, "% Стен с черновой");
        put(Percentage.WALL_FINISH, "% Стен с чистовой");

        put(Percentage.MOP_FLOOR_ROUGH, "% Пола без отделки МОП");
        put(Percentage.MOP_FLOOR_PLASTER, "% Пола с черновой МОП");
        put(Percentage.MOP_FLOOR_FINISH, "% Пола с чистовой МОП");
        put(Percentage.MOP_CEILING_ROUGH, "% Потолка без отделки МОП");
        put(Percentage.MOP_CEILING_PLASTER, "% Потолка с черновой МОП");
        put(Percentage.MOP_CEILING_FINISH, "% Потолка с чистовой МОП");
        put(Percentage.MOP_WALL_ROUGH, "% Стен без отделки МОП");
        put(Percentage.MOP_WALL_PLASTER, "% Стен с черновой МОП");
        put(Percentage.MOP_WALL_FINISH, "% Стен с чистовой МОП");

        put(Percentage.DOORS, "% Дверей");
        put(Percentage.TRASH, "% Мусора");
        put(Percentage.SOCKET_SWITCH, "% Розеток и выключателей");
        put(Percentage.WINDOW, "% Отделки окон");
        put(Percentage.RADIATOR, "% Установки батарей");
        put(Percentage.KITCHEN_STUFF, "% Установки кухонь");
        put(Percentage.TOILET, "% Установки унитазов");
        put(Percentage.BATH, "% Установки ванн");
        put(Percentage.SINK, "% Установки раковин");
    }};

    public ExcelWriter() {
        this.workbook = new XSSFWorkbook();
    }

    public void readWorkbook(Context context){
        try{
            InputStream file = context.getAssets().open("reportTemplate.xlsx");
            this.report = new XSSFWorkbook(file);

        } catch (Exception e){
            Log.d("READ ERROR", e.toString());
        }

    }

    public void fillReport(float[] data){
        XSSFSheet sheet = this.report.getSheet("ScoreMap");
        for(int i = 0; i < data.length; i++){
            Row row = sheet.getRow(i + 1);
            Cell cell = row.getCell(4);
            cell.setCellValue(data[i]);
        }
        saveWorkbook("СКОР_КАРТА.xlsx", this.report);
    }

    public static void applyDataBars(SheetConditionalFormatting sheetCF, String region, ExtendedColor colorPos) {
        CellRangeAddress[] regions = { CellRangeAddress.valueOf(region) };
        ConditionalFormattingRule rule = sheetCF.createConditionalFormattingRule(colorPos);
        DataBarFormatting dbf = rule.getDataBarFormatting();

        dbf.getMinThreshold().setValue(0.0);
        dbf.getMaxThreshold().setValue(1.0);

        dbf.getMinThreshold().setRangeType(ConditionalFormattingThreshold.RangeType.NUMBER);
        dbf.getMaxThreshold().setRangeType(ConditionalFormattingThreshold.RangeType.NUMBER);

        dbf.setWidthMin(0); //cannot work for XSSFDataBarFormatting, see https://svn.apache.org/viewvc/poi/tags/REL_4_0_1/src/ooxml/java/org/apache/poi/xssf/usermodel/XSSFDataBarFormatting.java?view=markup#l57
        dbf.setWidthMax(100); //cannot work for XSSFDataBarFormatting, see https://svn.apache.org/viewvc/poi/tags/REL_4_0_1/src/ooxml/java/org/apache/poi/xssf/usermodel/XSSFDataBarFormatting.java?view=markup#l64

        if (dbf instanceof XSSFDataBarFormatting) {
            try {
                Field _databar = XSSFDataBarFormatting.class.getDeclaredField("_databar");
                _databar.setAccessible(true);
                org.openxmlformats.schemas.spreadsheetml.x2006.main.CTDataBar ctDataBar =
                        (org.openxmlformats.schemas.spreadsheetml.x2006.main.CTDataBar) _databar.get(dbf);
                ctDataBar.setMinLength(0);
                ctDataBar.setMaxLength(100);
            }
            catch (Exception e){}
        }
        sheetCF.addConditionalFormatting(regions, rule);
    }

    public void fillSheet(Percentage sheetName, int numFloor, int numSection, int maxFloor, float percent) {
        int floor = numFloor + 1;
        numFloor = maxFloor - numFloor;
        numFloor++;
        numSection++;
        // CHECK IF SHEET EXISTS
        String sheetN = PercentageEnumToString.get(sheetName);
        XSSFSheet currentSheet = this.workbook.getSheet(sheetN);
        ExtendedColor colorPos = this.workbook.getCreationHelper().createExtendedColor();
        colorPos.setARGBHex("FF638EC6");
        if (currentSheet == null) {
            currentSheet = this.workbook.createSheet(sheetN);
            Row sheetNameRow = currentSheet.createRow(0);
            Cell sheetNameCell = sheetNameRow.createCell(0);
            sheetNameCell.setCellValue(sheetN);
            SheetConditionalFormatting sheetCF = currentSheet.getSheetConditionalFormatting();
            applyDataBars(sheetCF, String.format("B2:W%s", maxFloor + 2), colorPos);
        }
        // FILL CURRENT
        Row row = currentSheet.getRow(numFloor);
        if (row == null){
            row = currentSheet.createRow(numFloor);
        }
        Cell floorCell =  row.createCell(0);
        floorCell.setCellValue(floor);

        Cell cell = row.createCell(numSection);
        cell.setCellValue(Math.random());


        Row sectionRow = currentSheet.getRow(maxFloor + 2);
        if (sectionRow == null){
            sectionRow = currentSheet.createRow(maxFloor + 2);
        }
        Cell sectionCell =  sectionRow.createCell(numSection);
        sectionCell.setCellValue(numSection);
    }

    public void saveWorkbook(String filename, XSSFWorkbook workbook) {
        try {
            Log.d("MYDEBUG", "SAVING");
            File filePath = new File(Environment.getExternalStoragePublicDirectory(Environment.DIRECTORY_DOWNLOADS) + "/" + filename);
            //Write the workbook in file system
            FileOutputStream out = new FileOutputStream(filePath);
            workbook.write(out);
            out.close();
            Log.d("MYDEBUG", "SAVED");
            System.out.println("howtodoinjava_demo.xlsx written successfully on disk.");
        } catch (Exception e) {
            e.printStackTrace();
        }
    }
}

