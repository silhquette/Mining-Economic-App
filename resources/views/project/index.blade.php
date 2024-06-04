<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Your Projects') }}
        </h2>
    </x-slot>

    <div class="p-6 sm:rounded-lg max-w-7xl mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            @foreach ($projects as $project)
                <a class="flex flex-col justify-between bg-white text-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6" href="{{ route('project.show', $project->id) }}">
                    <div class="font-semibold text-3xl mb-2">{{ $project->name }}</div>
                    <div>
                        <div>{{ $project->site_manager }}</div>
                        <div class="text-gray-400">Dibuat pada: {{ $project->created_at }}</div>
                    </div>
                </a>
            @endforeach
            <a class="flex justify-center items-center bg-white text-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6" href="{{ route('project.create') }}">
                Add New Project
            </a>
        </div>
    </div>
</x-app-layout>