<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'StudentPlatform') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased bg-gray-50 dark:bg-gray-900 text-gray-800 dark:text-gray-200 min-h-screen flex flex-col justify-between">
    
    {{-- Шапка --}}
    <header class="max-w-7xl w-full mx-auto p-6 flex justify-between items-center">
        <div class="flex items-center gap-2 font-bold text-xl text-indigo-600 dark:text-indigo-400">
            <x-application-logo class="w-8 h-8 fill-current" />
            <span>StudentPlatform</span>
        </div>

        <div>
            @if (Route::has('login'))
                <nav class="flex gap-4">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
                            Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
                            Войти
                        </a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="font-semibold text-indigo-600 hover:text-indigo-500 dark:text-indigo-400">
                                Регистрация
                            </a>
                        @endif
                    @endauth
                </nav>
            @endif
        </div>
    </header>

    {{-- Главный блок --}}
    <main class="max-w-4xl mx-auto text-center px-6 py-12">
        <h1 class="text-4xl sm:text-6xl font-extrabold tracking-tight text-gray-900 dark:text-white mb-6">
            Платформа для обучения и управления курсами
        </h1>
        
        <p class="text-lg sm:text-xl text-gray-600 dark:text-gray-300 mb-8 max-w-2xl mx-auto">
            Получайте доступ к учебным материалам, отслеживайте прогресс и взаимодействуйте с преподавателями в едином месте.
        </p>

        <div class="flex justify-center gap-4">
            @auth
                <a href="{{ url('/dashboard') }}" class="px-6 py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-lg shadow-md transition">
                    Перейти к курсам &rarr;
                </a>
            @else
                <a href="{{ route('register') }}" class="px-6 py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-lg shadow-md transition">
                    Начать обучение
                </a>
                <a href="{{ route('login') }}" class="px-6 py-3 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 font-semibold rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                    Войти в аккаунт
                </a>
            @endauth
        </div>
    </main>

    {{-- Футер --}}
    <footer class="py-6 text-center text-sm text-gray-500 dark:text-gray-400">
        &copy; {{ date('Y') }} StudentPlatform. Все права защищены.
    </footer>

</body>
</html>