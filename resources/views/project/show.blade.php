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
                                <td class="w-1/5 py-1 text-gray-500">Created at</td>
                                <td>{{ date_format($project->created_at, 'D, d M Y') }}</td>
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

                    <table class="table-auto w-full divide-y divide-gray-900 dark:divide-gray-100 text-center">
                        <thead>
                            <tr>
                                <th class="py-2 tracking-wider">Year</th>
                                <th class="py-2 tracking-wider">Production (Mbbl)</th>
                                <th class="py-2 tracking-wider">Income</th>
                                <th class="py-2 tracking-wider">Invest Capital</th>
                                <th class="py-2 tracking-wider">Invest Non-Capital</th>
                                <th class="py-2 tracking-wider">Operational</th>
                                <th class="py-2 tracking-wider">Depreciation</th>
                                <th class="py-2 tracking-wider">Taxable Income</th>
                                <th class="py-2 tracking-wider">Tax</th>
                                <th class="py-2 tracking-wider">NCF</th>
                                <th class="py-2 tracking-wider">Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-700">
                            <tr>
                                <td class="whitespace-nowrap p-4">0</td>
                                <td class="whitespace-nowrap text-gray-500 dark:text-gray-400 p-4">0</td>
                                <td class="whitespace-nowrap text-gray-500 dark:text-gray-400 p-4">0</td>
                                <td class="whitespace-nowrap p-4">${{ number_format($project->invest_capital, 2, ".", "") }}</td>
                                <td class="whitespace-nowrap p-4">${{ number_format($project->invest_noncapital, 2, ".", "") }}</td>
                                <td class="whitespace-nowrap text-gray-500 dark:text-gray-400 p-4">0</td>
                                <td class="whitespace-nowrap text-gray-500 dark:text-gray-400 p-4">0</td>
                                <td class="whitespace-nowrap text-gray-500 dark:text-gray-400 p-4">0</td>
                                <td class="whitespace-nowrap text-gray-500 dark:text-gray-400 p-4">0</td>
                                <td class="whitespace-nowrap p-4">${{ number_format(($project->invest_capital+$project->invest_noncapital)*-1, 2, ".", "") }}</td>
                                <td class="whitespace-nowrap"></td>
                            </tr>
                            @foreach ($project->cashflows as $cashflow)
                                <tr>
                                    <td class="whitespace-nowrap p-4">{{ $cashflow->year }}</td>
                                    <td class="whitespace-nowrap p-4">{{ $cashflow->production }}</td>
                                    <td class="whitespace-nowrap p-4">${{ number_format($cashflow->income, 2, ".", "") }}</td>
                                    <td class="whitespace-nowrap text-gray-500 dark:text-gray-400 p-4">0</td>
                                    <td class="whitespace-nowrap text-gray-500 dark:text-gray-400 p-4">0</td>
                                    <td class="whitespace-nowrap p-4">${{ number_format($cashflow->opex, 2, ".", "") }}</td>
                                    <td class="whitespace-nowrap p-4">${{ number_format(($cashflow->income - $cashflow->opex) * $project->depreciation/100, 2, ".", "") }}</td>
                                    <td class="whitespace-nowrap p-4">${{ number_format($cashflow->taxable_income, 2, ".", "") }}</td>
                                    <td class="whitespace-nowrap p-4">${{ number_format($cashflow->taxable_income * $project->tax / 100, 2, ".", "") }}</td>
                                    <td class="whitespace-nowrap p-4">${{ number_format($cashflow->net_cashflow, 2, ".", "") }}</td>
                                    <td class="whitespace-nowrap text-gray-500 dark:text-gray-400 p-4">
                                        <div class="flex gap-4">
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
                                <td colspan="9" class="whitespace-nowrap font-semibold p-4">Total</td>
                                <td class="whitespace-nowrap font-semibold p-4">${{ number_format(($project->invest_capital  +$project->invest_noncapital) * -1 + $project->cashflows->sum('net_cashflow'), 2, ".", "") }}</td>
                                <td class="whitespace-nowrap font-semibold p-4"></td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="text-center">
                        <a class="inline-block bg-gray-800 dark:bg-gray-200 text-white dark:text-gray-800 w-full py-2 uppercase font-semibold text-xs rounded-lg hover:bg-gray-700 dark:hover:bg-white" href="{{ route('cashflow.create', $project->id) }}">Add Cashflow</a>
                        <a class="inline-block bg-transparent dark:text-white text-gray-800 w-full py-2 mt-4 uppercase font-semibold text-xs rounded-lg hover:border-gray-800 hover:border dark:hover:border-white  transition ease-in-out duration-150" href="{{ route('project.index') }}">Back to Project</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>