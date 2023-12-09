<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel Livewire Poll</title>
    @vite('resources/css/app.css')


    @livewireStyles
</head>

<body class="container mx-auto mt-10 mb-10 max-w-lg bg-slate-100">
    @livewireScripts
    <div>
        <h1 class=" mb-4 mt-4 text-2xl capitalize">create a poll</h1>
        <livewire:create-poll />
    </div>
    <div>
        <h1 class="mb-4 mt-4 capitalize text-2xl">avilable polls</h1>
        <livewire:polls>
    </div>
</body>

</html>
