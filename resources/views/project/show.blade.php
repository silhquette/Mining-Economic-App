<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Project Details') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="font-bold mb-4">{{ $project->name }}</h3>
                    <p>Manajer Situs: {{ $project->site_manager }}</p>
                    <p>Dibuat pada: {{ $project->created_at }}</p>

                    <h4 class="font-bold mt-4 mb-4">Cash Flow</h4>
                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th class="border dark:border-gray-100 border-gray-900 p-2">Tahun</th>
                                <th class="border dark:border-gray-100 border-gray-900 p-2">Produksi</th>
                                <th class="border dark:border-gray-100 border-gray-900 p-2">Pendapatan</th>
                                <th class="border dark:border-gray-100 border-gray-900 p-2">Investasi Kapital</th>
                                <th class="border dark:border-gray-100 border-gray-900 p-2">Investasi Non-Kapital</th>
                                <th class="border dark:border-gray-100 border-gray-900 p-2">Biaya Operasional</th>
                                <th class="border dark:border-gray-100 border-gray-900 p-2">Depresiasi</th>
                                <th class="border dark:border-gray-100 border-gray-900 p-2">Pendapatan Bersih</th>
                                <th class="border dark:border-gray-100 border-gray-900 p-2">Pajak</th>
                                <th class="border dark:border-gray-100 border-gray-900 p-2">Pendapatan Kena Pajak</th>
                                <th class="border dark:border-gray-100 border-gray-900 p-2">Arus Kas Bersih</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="border dark:border-gray-100 border-gray-900 p-2">0</td>
                                    <td class="border dark:border-gray-100 border-gray-900 p-2">0</td>
                                    <td class="border dark:border-gray-100 border-gray-900 p-2">0</td>
                                    <td class="border dark:border-gray-100 border-gray-900 p-2">{{ $project->invest_capital }}</td>
                                    <td class="border dark:border-gray-100 border-gray-900 p-2">{{ $project->invest_noncapital }}</td>
                                    <td class="border dark:border-gray-100 border-gray-900 p-2">0</td>
                                    <td class="border dark:border-gray-100 border-gray-900 p-2">0</td>
                                    <td class="border dark:border-gray-100 border-gray-900 p-2">0</td>
                                    <td class="border dark:border-gray-100 border-gray-900 p-2">0</td>
                                    <td class="border dark:border-gray-100 border-gray-900 p-2">0</td>
                                    <td class="border dark:border-gray-100 border-gray-900 p-2">{{( $project->invest_capital+$project->invest_noncapital)*-1 }}</td>
                            </tr>
                            @foreach ($project->cashflows as $cashflow)
                                <tr>
                                    <td class="border dark:border-gray-100 border-gray-900 p-2">{{ $loop->iteration }}</td>
                                    <td class="border dark:border-gray-100 border-gray-900 p-2">{{ $cashflow->production }}</td>
                                    <td class="border dark:border-gray-100 border-gray-900 p-2">{{ $cashflow->income }}</td>
                                    <td class="border dark:border-gray-100 border-gray-900 p-2">0</td>
                                    <td class="border dark:border-gray-100 border-gray-900 p-2">0</td>
                                    <td class="border dark:border-gray-100 border-gray-900 p-2">{{ $cashflow->opex }}</td>
                                    <td class="border dark:border-gray-100 border-gray-900 p-2">{{ $cashflow->depreciation }}</td>
                                    <td class="border dark:border-gray-100 border-gray-900 p-2">{{ $cashflow->net_income }}</td>
                                    <td class="border dark:border-gray-100 border-gray-900 p-2">{{ $cashflow->tax }}</td>
                                    <td class="border dark:border-gray-100 border-gray-900 p-2">{{ $cashflow->taxable_income }}</td>
                                    <td class="border dark:border-gray-100 border-gray-900 p-2">{{ $cashflow->net_cashflow }}</td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="11" class="text-center">
                                    <a class="inline-block bg-gray-500 w-full p-2 mt-4 rounded-lg" href="{{ route('cashflow.create', $project->id) }}">Tambah Cashflow</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>