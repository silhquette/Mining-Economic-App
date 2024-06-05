<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Your Projects') }}
        </h2>
    </x-slot>

    <div class="p-6 sm:rounded-lg max-w-7xl mx-auto">
        @if (Session::has('success'))
            <div class="flex mx-auto w-fit bg-gray-200 rounded-lg p-4 mb-4">
                <p class="mx-4 text-sm text-gray-800"><i class="fa-regular fa-circle-check mr-2"></i><span class="font-medium">Sistem : </span>{{ Session::get('success') }}</p>
            </div>
        @endif
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            @foreach ($projects as $project)
                <div
                    class="group/project flex flex-col justify-between bg-white text-gray-900 dark:text-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 relative">
                    <div class="font-semibold text-3xl mb-2 w-5/6">{{ $project->name }}</div>
                    <div>
                        <div>{{ $project->site_manager }}</div>
                        <div class="text-gray-400">Dibuat pada: {{ $project->created_at }}</div>
                        <a href="{{ route('project.show', $project->id) }}"
                            class="inline-flex justify-center mt-4 items-center w-full py-2 bg-gray-800 dark:bg-gray-200 border rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase hover:bg-gray-700 dark:hover:bg-white">Detail</a>
                        <form action="{{ route('project.destroy', $project->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button class="absolute top-4 right-4 text-red-500 invisible group-hover/project:visible"><i
                                    class="fa-solid fa-trash"></i></button>
                        </form>
                    </div>
                </div>
            @endforeach
            <a class="flex justify-center items-center bg-white text-gray-900 dark:text-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6"
                href="{{ route('project.create') }}">
                <i class="fa-solid fa-circle-plus mr-2"></i>Add New Project
            </a>
        </div>
    </div>
</x-app-layout>
