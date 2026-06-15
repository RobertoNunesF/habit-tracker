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
    <main class="grow max-w-5xl w-full mx-auto px-4 py-6 relative">
        {{$slot}}
    </main>
    <x-footer />

    <x-toast />
    <script type="module" src="{{Vite::asset('resources/js/toast.js')}}"></script>
</body>
</html>