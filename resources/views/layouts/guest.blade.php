<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'MiniCRM') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased text-gray-900 bg-[#f8fafc] min-h-screen flex flex-col justify-center py-12 sm:px-6 lg:px-8">
        
        <div class="sm:mx-auto sm:w-full sm:max-w-md text-center">
            <!-- Brand Badge -->
            <div class="inline-flex items-center justify-center w-12 h-12 rounded-2xl bg-indigo-600 text-white font-extrabold text-base shadow-lg shadow-indigo-600/25 ring-4 ring-indigo-50">
                CRM
            </div>
            
            <h1 class="mt-4 text-2xl font-black tracking-tight text-gray-900">
                Mini<span class="text-indigo-600">CRM</span>
            </h1>
            <p class="text-[11px] font-bold tracking-widest uppercase text-gray-400 mt-0.5">
                Admin Workspace
            </p>
        </div>

        <!-- Elevated Form Container -->
        <div class="mt-7 sm:mx-auto sm:w-full sm:max-w-[420px] px-4 sm:px-0">
            <div class="bg-white px-8 py-9 rounded-3xl border border-gray-200/80 shadow-xl shadow-gray-200/50">
                {{ $slot }}
            </div>

            <!-- Footer Badge -->
            <p class="mt-8 text-center text-xs font-medium text-gray-400">
                MiniCRM &bull; Internal Company Management
            </p>
        </div>

    </body>
</html>