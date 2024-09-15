<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>
<body class="w-96 h-96 bg-gray-900">
    <div class="w-12 h-12 border border-red-500 bg-black">
        <h1 class="text-white">hello</h1>
    </div>
    @include('layouts.title')
</body>
</html>
