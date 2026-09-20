<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Доступные курсы
            </h2>
            <a href="{{ route('courses.create') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:border-indigo-900 focus:ring ring-indigo-300 disabled:opacity-25 transition">
                + Добавить курс
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            {{-- Сообщение об успешном создании --}}
            @if (session('success'))
                <div class="mb-6 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Сетка с карточками курсов --}}
            @if($courses->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($courses as $course)
                        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg flex flex-col justify-between border border-gray-200 dark:border-gray-700">
                            <div>
                                {{-- Обложка курса --}}
                                @if($course->image_path)
                                    <img src="{{ $course->image_path }}" alt="{{ $course->title }}" class="w-full h-48 object-cover">
                                @else
                                    <div class="w-full h-48 bg-gradient-to-r from-indigo-500 to-purple-600 flex items-center justify-center text-white text-2xl font-bold">
                                        {{ $course->code }}
                                    </div>
                                @endif

                                <div class="p-6">
                                    <div class="flex justify-between items-start mb-2">
                                        <span class="text-xs font-semibold px-2.5 py-0.5 rounded bg-indigo-100 text-indigo-800 dark:bg-indigo-900 dark:text-indigo-300">
                                            {{ $course->code }}
                                        </span>
                                        <span class="text-xs text-gray-500 dark:text-gray-400">
                                            {{ $course->created_at->format('d.m.Y') }}
                                        </span>
                                    </div>

                                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">
                                        {{ $course->title }}
                                    </h3>

                                    <p class="text-gray-600 dark:text-gray-300 text-sm mb-4 line-clamp-3">
                                        {{ $course->description ?? 'Описание отсутствует.' }}
                                    </p>
                                </div>
                            </div>

                            <div class="px-6 pb-6 pt-2 border-t border-gray-100 dark:border-gray-700 flex justify-between items-center text-xs text-gray-500 dark:text-gray-400">
                                <span>Преподаватель: <strong>{{ $course->teacher->name ?? 'Не указан' }}</strong></span>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="bg-white dark:bg-gray-800 p-8 rounded-lg shadow-sm text-center">
                    <p class="text-gray-500 dark:text-gray-400 text-lg mb-4">Пока нет доступных курсов.</p>
                    <a href="{{ route('courses.create') }}" class="text-indigo-600 hover:text-indigo-800 font-medium">
                        Создайте первый курс прямо сейчас &rarr;
                    </a>
                </div>
            @endif

        </div>
    </div>
</x-app-layout>