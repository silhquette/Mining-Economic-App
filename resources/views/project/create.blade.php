<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Project') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('project.store') }}" method="post">
                        @csrf
                        <div class="mb-4">
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                                :value="old('name')" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>
                        <div class="mb-4">
                            <x-input-label for="site_manager" :value="__('Site Manager')" />
                            <x-text-input id="site_manager" class="block mt-1 w-full" type="text" name="site_manager"
                                :value="old('site_manager')" />
                            <x-input-error :messages="$errors->get('site_manager')" class="mt-2" />
                        </div>
                        <div class="mb-4 flex gap-4">
                            <div>
                                <x-input-label for="invest_capital" :value="__('Invest Capital')"/>
                                <x-text-input id="invest_capital" class="block mt-1 w-full" type="number" name="invest_capital"
                                    :value="old('invest_capital')" min=1 />
                                <x-input-error :messages="$errors->get('invest_capital')" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="invest_noncapital" :value="__('Invest Non Capital')"/>
                                <x-text-input id="invest_noncapital" class="block mt-1 w-full" type="number" name="invest_noncapital"
                                    :value="old('invest_noncapital')" min=1 />
                                <x-input-error :messages="$errors->get('invest_noncapital')" class="mt-2" />
                            </div>
                        </div>
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        <x-primary-button class="">
                            {{ __('Submit') }}
                        </x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
