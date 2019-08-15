<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>都内の天気情報だよ！</title>
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@3.x/css/materialdesignicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body>
<div id="app">
    <v-app id="inspire" style="background-color: #fff">
        <weather-component></weather-component>
    </v-app>
</div>
</body>
<script src="{{ mix('js/app.js') }}"></script>
</html>
