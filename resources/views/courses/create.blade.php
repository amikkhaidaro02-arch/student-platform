<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Создание нового курса
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-sm">
                <form action="{{ route('courses.store') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Название курса</label>
                        <input type="text" name="title" required class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white rounded-md shadow-sm">
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Код курса (например CS-101)</label>
                        <input type="text" name="code" required class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white rounded-md shadow-sm">
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Ссылка на обложку (URL картинки)</label>
                        <input type="url" name="image_path" placeholder="https://images.unsplash.com/photo-..." class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white rounded-md shadow-sm">
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Описание курса</label>
                        <textarea name="description" rows="4" class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white rounded-md shadow-sm"></textarea>
                    </div>

                    <div class="flex justify-end gap-3">
                        <a href="{{ route('dashboard') }}" class="px-4 py-2 border rounded-md text-gray-600 dark:text-gray-300">Отмена</a>
                        <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-md font-semibold hover:bg-indigo-700">Сохранить курс</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>