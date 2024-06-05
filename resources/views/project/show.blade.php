<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Project Details') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (Session::has('success'))
                <div class="flex mx-auto w-fit bg-lime-500 dark:bg-gray-200 rounded-lg p-4 mb-4">
                    <p class="mx-4 text-sm text-white dark:text-gray-800"><i class="fa-regular fa-circle-check mr-2"></i><span class="font-bold">Sistem : </span>{{ Session::get('success') }}</p>
                </div>
            @endif
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="font-bold mb-4">{{ $project->name }}</h3>
                    <p>Manajer Situs: {{ $project->site_manager }}</p>
                    <p>Dibuat pada: {{ $project->created_at }}</p>

                    <h4 class="font-bold mt-4 mb-4">Cash Flow</h4>
                    <table class="table-auto w-full divide-y divide-gray-900 dark:divide-gray-100">
                        <thead>
                            <tr>
                                <th class="p-2 tracking-wider">Year</th>
                                <th class="p-2 tracking-wider">Production (Mbbl)</th>
                                <th class="p-2 tracking-wider">Income</th>
                                <th class="p-2 tracking-wider">Invest Capital</th>
                                <th class="p-2 tracking-wider">Invest Non-Capital</th>
                                <th class="p-2 tracking-wider">Operational</th>
                                <th class="p-2 tracking-wider">Depreciation</th>
                                <th class="p-2 tracking-wider">Net Income</th>
                                <th class="p-2 tracking-wider">Tax</th>
                                <th class="p-2 tracking-wider">Taxable Income</th>
                                <th class="p-2 tracking-wider">NCF</th>
                                <th class="p-2 tracking-wider">Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-300">
                            <tr>
                                <td class="whitespace-nowrap text-sm font-medium p-2">0</td>
                                <td class="whitespace-nowrap text-sm font-medium text-gray-500 dark:text-gray-400 p-2">0</td>
                                <td class="whitespace-nowrap text-sm font-medium text-gray-500 dark:text-gray-400 p-2">0</td>
                                <td class="whitespace-nowrap text-sm font-medium p-2">${{ number_format($project->invest_capital, 2, ".", "") }}</td>
                                <td class="whitespace-nowrap text-sm font-medium p-2">${{ number_format($project->invest_noncapital, 2, ".", "") }}</td>
                                <td class="whitespace-nowrap text-sm font-medium text-gray-500 dark:text-gray-400 p-2">0</td>
                                <td class="whitespace-nowrap text-sm font-medium text-gray-500 dark:text-gray-400 p-2">0</td>
                                <td class="whitespace-nowrap text-sm font-medium text-gray-500 dark:text-gray-400 p-2">0</td>
                                <td class="whitespace-nowrap text-sm font-medium text-gray-500 dark:text-gray-400 p-2">0</td>
                                <td class="whitespace-nowrap text-sm font-medium text-gray-500 dark:text-gray-400 p-2">0</td>
                                <td class="whitespace-nowrap text-sm font-medium p-2">${{ number_format(($project->invest_capital+$project->invest_noncapital)*-1, 2, ".", "") }}</td>
                                <td class="whitespace-nowrap"></td>
                            </tr>
                            @foreach ($project->cashflows as $cashflow)
                                <tr>
                                    <td class="whitespace-nowrap text-sm font-medium p-2">{{ $loop->iteration }}</td>
                                    <td class="whitespace-nowrap text-sm font-medium p-2">{{ $cashflow->production }}</td>
                                    <td class="whitespace-nowrap text-sm font-medium p-2">${{ number_format($cashflow->income, 2, ".", "") }}</td>
                                    <td class="whitespace-nowrap text-sm font-medium text-gray-500 dark:text-gray-400 p-2">0</td>
                                    <td class="whitespace-nowrap text-sm font-medium text-gray-500 dark:text-gray-400 p-2">0</td>
                                    <td class="whitespace-nowrap text-sm font-medium p-2">${{ number_format($cashflow->opex, 2, ".", "") }}</td>
                                    <td class="whitespace-nowrap text-sm font-medium p-2">{{ $cashflow->depreciation }}%</td>
                                    <td class="whitespace-nowrap text-sm font-medium p-2">${{ number_format($cashflow->net_income, 2, ".", "") }}</td>
                                    <td class="whitespace-nowrap text-sm font-medium p-2">{{ $cashflow->tax }}%</td>
                                    <td class="whitespace-nowrap text-sm font-medium p-2">${{ number_format($cashflow->taxable_income, 2, ".", "") }}</td>
                                    <td class="whitespace-nowrap text-sm font-medium p-2">${{ number_format($cashflow->net_cashflow, 2, ".", "") }}</td>
                                    <td class="whitespace-nowrap text-sm font-medium text-gray-500 dark:text-gray-400 p-2">
                                        <div class="flex space-x-2">
                                            <a href="{{ route('cashflow.edit', [$project->id, $cashflow->id]) }}" class="hover:text-gray-900 hover:dark:text-gray-200"><i class="fa-solid fa-pen-to-square"></i></a>
                                            <form action="{{ route('cashflow.destroy', [$project->id, $cashflow->id]) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="hover:text-red-600"><i class="fa-solid fa-trash"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="10" class="whitespace-nowrap text-sm font-medium p-2">Total</td>
                                <td class="whitespace-nowrap text-sm font-medium p-2">$1000000.00</td>
                                <td class="whitespace-nowrap text-sm font-medium p-2"></td>
                            </tr>
                            <tr>
                                <td colspan="12" class="text-center">
                                    <a class="inline-block bg-gray-800 dark:bg-gray-200 text-white dark:text-gray-800 w-full py-2 mt-8 uppercase font-semibold text-xs rounded-lg hover:bg-gray-700 dark:hover:bg-white" href="{{ route('cashflow.create', $project->id) }}">Add Cashflow</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>