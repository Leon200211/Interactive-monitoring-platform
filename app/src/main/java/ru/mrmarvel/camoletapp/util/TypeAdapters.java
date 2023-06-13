package ru.mrmarvel.camoletapp.util;

import com.google.gson.Gson;
import com.google.gson.GsonBuilder;
import com.google.gson.JsonSyntaxException;
import com.google.gson.TypeAdapter;
import com.google.gson.stream.JsonReader;
import com.google.gson.stream.JsonToken;
import com.google.gson.stream.JsonWriter;

import java.io.IOException;

public class TypeAdapters {
    private static TypeAdapter<Number> LongTypeAdapter = new TypeAdapter<Number>() {

        @Override
        public void write(JsonWriter out, Number value)
                throws IOException {
            out.value(value);
        }

        @Override
        public Number read(JsonReader in) throws IOException {
            if (in.peek() == JsonToken.NULL) {
                in.nextNull();
                return null;
            }
            try {
                String result = in.nextString();
                if ("".equals(result)) {
                    return null;
                }
                return Long.parseLong(result);
            } catch (NumberFormatException e) {
                throw new JsonSyntaxException(e);
            }
        }
    };

    private static TypeAdapter<Number> IntTypeAdapter = new TypeAdapter<Number>() {

        @Override
        public void write(JsonWriter out, Number value)
                throws IOException {
            out.value(value);
        }

        @Override
        public Number read(JsonReader in) throws IOException {
            if (in.peek() == JsonToken.NULL) {
                in.nextNull();
                return null;
            }
            try {
                String result = in.nextString();
                if ("".equals(result)) {
                    return null;
                }
                return Integer.parseInt(result);
            } catch (NumberFormatException e) {
                throw new JsonSyntaxException(e);
            }
        }
    };

    private static TypeAdapter<String> StringTypeAdapter = new TypeAdapter<String>() {

        @Override
        public void write(JsonWriter out, String value)
                throws IOException {
            out.value(value);
        }

        @Override
        public String read(JsonReader in) throws IOException {
            if (in.peek() == JsonToken.NULL) {
                in.nextNull();
                return null;
            }
            try {
                String result = in.nextString();
                if ("".equals(result)) {
                    return null;
                }
                return result;
            } catch (NumberFormatException e) {
                throw new JsonSyntaxException(e);
            }
        }
    };

    public final static Gson gson = new GsonBuilder()
            .registerTypeAdapter(int.class, IntTypeAdapter)
            .registerTypeAdapter(Integer.class, IntTypeAdapter)
            .registerTypeAdapter(String.class, StringTypeAdapter)
            .registerTypeAdapter(long.class, LongTypeAdapter)
            .registerTypeAdapter(Long.class, LongTypeAdapter).create();
}
