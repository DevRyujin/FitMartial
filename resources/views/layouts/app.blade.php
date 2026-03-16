<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSRF -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Page Title -->
    <title>{{ isset($title) ? $title . ' - FitMartial' : 'FitMartial' }}</title>

    <meta name="description" content="FitMartial - Your Ultimate Martial Arts and Fitness Destination">
    <meta name="keywords" content="Martial Arts, Fitness, Training, Workouts, Health, Wellness">
    <meta name="author" content="FitMartial Team">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="{{ url()->current() }}">

    <!-- Google Fonts (your fonts) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend+Zetta:wght@100..900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

    <!-- Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    
</head>

<body class="antialiased bg-gray-950 text-white">
    <div class="min-h-screen flex">

        {{-- Sidebar always shown --}}
        <aside class="w-64 shrink-0">
            <x-sidebar />
        </aside>

        {{-- Main content --}}
        <div class="flex-1 min-w-0">

            @isset($header)
                <header class="bg-gray-900 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <main class="p-6">
                {{ $slot }}
            </main>
        </div>
    </div>

</body>
</html>
