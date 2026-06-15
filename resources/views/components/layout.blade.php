<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>{{config('app.name')}}</title>
</head>
<body class="bg-[#FFEDD6] min-h-screen flex flex-col justify-between font-mono">
    <x-header />
    {{$slot}}
    <x-footer />
</body>
</html>