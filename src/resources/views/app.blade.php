<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>関東の天気情報だよ！</title>

        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    </head>
    <body>
    <div id="app">
        <!--デフォルトでappの要素中でvue.jsが有効になっている-->
        <example-component></example-component>

    </div>
    </body>
    <script src="{{ mix('js/app.js') }}" ></script>
</html>
