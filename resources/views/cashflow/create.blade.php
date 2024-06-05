<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Add Cashflow') }}
        </h2>
    </x-slot>

    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    @if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 flex flex-col gap-8">
                    <div>
                        <h1 class="text-xl font-semibold">Project Information</h1>
                        <table class="table-auto w-full">
                            <tr>
                                <td class="w-1/5 py-1 text-gray-500">Project Name</td>
                                <td>{{ $project->name }}</td>
                            </tr>
                            <tr>
                                <td class="w-1/5 py-1 text-gray-500">Site Manager</td>
                                <td>{{ $project->site_manager }}</td>
                            </tr>
                            </tr>
                            <tr>
                                <td class="w-1/5 py-1 text-gray-500">Depreciation</td>
                                <td id="project-depreciation">{{ $project->depreciation }}%</td>
                            </tr>
                            </tr>
                            <tr>
                                <td class="w-1/5 py-1 text-gray-500">Tax</td>
                                <td id="project-tax">{{ $project->tax }}%</td>
                            </tr>
                        </table>
                    </div>
                    <form action="{{ route('cashflow.store', $project->id) }}" method="post">
                        @csrf
                        <div class="flex gap-4">
                            <div class="flex-1 mb-4">
                                <x-input-label for="year" :value="__('Year')" />
                                <x-text-input min=0 id="year" class="block mt-1 w-full" type="number" name="year" :value="old('year')" />
                                <x-input-error :messages="$errors->get('year')" class="mt-2" />
                            </div>
                            <div class="flex-1 mb-4">
                                <x-input-label for="production" :value="__('Production (Mbbl)')" />
                                <x-text-input min=0 id="production" class="block mt-1 w-full" type="number" name="production" :value="old('production')" />
                                <x-input-error :messages="$errors->get('production')" class="mt-2" />
                            </div>
                            <div class="flex-1 mb-4">
                                <x-input-label for="income" :value="__('Income')" />
                                <x-text-input min=0 id="income" class="block mt-1 w-full" type="number" name="income" :value="old('income')" readonly/>
                                <x-input-error :messages="$errors->get('income')" class="mt-2" />
                            </div>
                            <div class="flex-1 mb-4">
                                <x-input-label for="opex" :value="__('Operational')" />
                                <x-text-input min=0 id="opex" class="block mt-1 w-full" type="number" name="opex" :value="old('opex')" />
                                <x-input-error :messages="$errors->get('opex')" class="mt-2" />
                            </div>
                            <div class="flex-1 mb-4">
                                <x-input-label for="depreciation" :value="__('Depreciation')" />
                                <x-text-input min=0 max=100 id="depreciation" class="block mt-1 w-full" type="number" :value="old('depreciation')" readonly/>
                                <x-input-error :messages="$errors->get('depreciation')" class="mt-2" />
                            </div>
                            <div class="flex-1 mb-4">
                                <x-input-label for="taxable_income" :value="__('Taxable Income')" />
                                <x-text-input min=0 id="taxable_income" class="block mt-1 w-full" type="number" name="taxable_income" :value="old('taxable_income')" readonly/>
                                <x-input-error :messages="$errors->get('taxable_income')" class="mt-2" />
                            </div>
                            <div class="flex-1 mb-4">
                                <x-input-label for="tax" :value="__('Tax')" />
                                <x-text-input min=0 id="tax" class="block mt-1 w-full" type="number" :value="old('tax')" readonly/>
                                <x-input-error :messages="$errors->get('tax')" class="mt-2" />
                            </div>
                            <div class="flex-1 mb-4">
                                <x-input-label for="net_cashflow" :value="__('NCF')" />
                                <x-text-input min=0 id="net_cashflow" class="block mt-1 w-full" type="number" name="net_cashflow" :value="old('net_cashflow')" readonly/>
                                <x-input-error :messages="$errors->get('net_cashflow')" class="mt-2" />
                            </div>
                        </div>
                        <input type="hidden" name="project_id" value="{{ $project->id }}">
                        <x-primary-button>
                            {{ __('Submit') }}
                        </x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
    <script src="{{ asset('js/cashflow/index.js')}}"></script>
    @endpush
</x-app-layout>
