<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
    @vite('resources/css/app.css') <!-- or other CSS files -->
</head>
<body class="bg-gray-900 text-white"> <!-- Apply bg-gray-900 here -->
    @yield('content')
</body>
</html>
