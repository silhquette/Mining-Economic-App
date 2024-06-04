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

                    <h4 class="font-bold mt-4">Cash Flow</h4>
                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th>Tahun</th>
                                <th>Produksi</th>
                                <th>Pendapatan</th>
                                <th>Investasi Kapital</th>
                                <th>Investasi Non-Kapital</th>
                                <th>Biaya Operasional</th>
                                <th>Depresiasi</th>
                                <th>Pendapatan Bersih</th>
                                <th>Pajak</th>
                                <th>Pendapatan Kena Pajak</th>
                                <th>Arus Kas Bersih</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($project->cashflows as $cashflow)
                                <tr>
                                    <td>{{ $cashflow->year }}</td>
                                    <td>{{ $cashflow->production }}</td>
                                    <td>{{ $cashflow->income }}</td>
                                    <td>{{ $cashflow->invest_capital }}</td>
                                    <td>{{ $cashflow->invest_noncapital }}</td>
                                    <td>{{ $cashflow->opex }}</td>
                                    <td>{{ $cashflow->depreciation }}</td>
                                    <td>{{ $cashflow->net_income }}</td>
                                    <td>{{ $cashflow->tax }}</td>
                                    <td>{{ $cashflow->taxable_income }}</td>
                                    <td>{{ $cashflow->net_cashflow }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>