<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Your Projects') }}
        </h2>
    </x-slot>

    <div class="p-6 sm:rounded-lg max-w-7xl mx-auto">
        @if (Session::has('success'))
            <div class="flex mx-auto w-fit bg-lime-500 dark:bg-gray-200 rounded-lg p-4 mb-4">
                <p class="mx-4 text-sm text-white dark:text-gray-800"><i class="fa-regular fa-circle-check mr-2"></i><span
                        class="font-medium">Sistem : </span>{{ Session::get('success') }}</p>
            </div>
        @endif
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            @foreach ($projects as $project)
                <div
                    class="group/project flex flex-col justify-between bg-white text-gray-900 dark:text-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 relative hover:bg-transparent hover:outline hover:outline-1 hover:outline-gray-800 dark:hover:outline-gray-200">
                    <div class="font-semibold text-3xl mb-2 w-5/6">{{ $project->name }}</div>
                    <div>
                        <div>{{ $project->site_manager }}</div>
                        <div class="text-gray-400">Since {{ date_format($project->created_at, 'd M Y') }}</div>
                        <a href="{{ route('project.show', $project->id) }}"
                            class="inline-flex justify-center mt-4 items-center w-full py-2 bg-gray-800 dark:bg-gray-200 border rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase hover:bg-gray-700 dark:hover:bg-white">Detail</a>
                        <a href="{{ route('project.edit', $project->id) }}"
                            class="absolute top-4 right-12 dark:text-gray-200 text-gray-800 text-xl hover:dark:text-gray-300 hover:text-gray-600 invisible group-hover/project:visible"><i
                                class="fa-solid fa-pen-to-square"></i></a>
                        <form action="{{ route('project.destroy', $project->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button
                                class="absolute top-4 right-4 text-xl text-red-500 hover:text-red-600 invisible group-hover/project:visible"><i
                                    class="fa-solid fa-trash"></i></button>
                        </form>
                    </div>
                </div>
            @endforeach
            <a class="flex justify-center items-center bg-white text-gray-900 dark:text-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 hover:bg-transparent hover:outline hover:outline-gray-800 dark:hover:outline-gray-200"
                href="{{ route('project.create') }}">
                <i class="fa-solid fa-circle-plus mr-2"></i>Add New Project
            </a>
        </div>
    </div>
</x-app-layout>
