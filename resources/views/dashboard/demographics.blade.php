@extends('layouts.dashboard')

@section('title', 'Demografis')
@section('page-title', 'Analisis Demografis')

@section('content')
<div class="space-y-6">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="p-6 rounded-2xl bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700">
            <div class="flex items-center gap-3 mb-2">
                <div class="w-3 h-3 rounded-full bg-red-500"></div>
                <span class="text-sm text-slate-500 dark:text-slate-400">Churn Tertinggi</span>
            </div>
            <h3 class="text-2xl font-display font-bold text-red-500">Germany</h3>
            <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">32.4% churn rate - hampir 2x lipat negara lain</p>
        </div>

        <div class="p-6 rounded-2xl bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700">
            <div class="flex items-center gap-3 mb-2">
                <div class="w-3 h-3 rounded-full bg-amber-500"></div>
                <span class="text-sm text-slate-500 dark:text-slate-400">Usia Paling Rentan</span>
            </div>
            <h3 class="text-2xl font-display font-bold text-amber-500">50-59 Tahun</h3>
            <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">33.1% churn rate pada kelompok usia ini</p>
        </div>

        <div class="p-6 rounded-2xl bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700">
            <div class="flex items-center gap-3 mb-2">
                <div class="w-3 h-3 rounded-full bg-purple-500"></div>
                <span class="text-sm text-slate-500 dark:text-slate-400">Gender Lebih Rentan</span>
            </div>
            <h3 class="text-2xl font-display font-bold text-purple-500">Perempuan</h3>
            <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">25.1% churn rate vs 16.5% laki-laki</p>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <div class="p-6 rounded-2xl bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700">
            <h3 class="font-display font-semibold text-lg mb-4">Churn Rate per Negara</h3>
            <div id="geoBarChart"></div>
        </div>

        <div class="p-6 rounded-2xl bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700">
            <h3 class="font-display font-semibold text-lg mb-4">Total Nasabah & Churn per Negara</h3>
            <div id="geoGroupedChart"></div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <div class="p-6 rounded-2xl bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700">
            <h3 class="font-display font-semibold text-lg mb-4">Churn Rate per Kelompok Usia</h3>
            <div id="ageBarChart"></div>
        </div>

        <div class="p-6 rounded-2xl bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700">
            <h3 class="font-display font-semibold text-lg mb-4">Churn per Gender</h3>
            <div id="genderChart"></div>
        </div>
    </div>

    <div class="p-6 rounded-2xl bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700">
        <h3 class="font-display font-semibold text-lg mb-4">Detail Data Demografis</h3>
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="border-b border-slate-200 dark:border-slate-700">
                        <th class="text-left py-3 px-4 font-semibold text-slate-500 dark:text-slate-400">Kategori</th>
                        <th class="text-left py-3 px-4 font-semibold text-slate-500 dark:text-slate-400">Segmen</th>
                        <th class="text-right py-3 px-4 font-semibold text-slate-500 dark:text-slate-400">Total</th>
                        <th class="text-right py-3 px-4 font-semibold text-slate-500 dark:text-slate-400">Churn</th>
                        <th class="text-right py-3 px-4 font-semibold text-slate-500 dark:text-slate-400">Churn Rate</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data['geography'] as $name => $geo)
                    <tr class="border-b border-slate-100 dark:border-slate-700/50 hover:bg-slate-50 dark:hover:bg-slate-700/30">
                        <td class="py-3 px-4 text-slate-500 dark:text-slate-400">Geografi</td>
                        <td class="py-3 px-4 font-medium">{{ $name }}</td>
                        <td class="py-3 px-4 text-right">{{ number_format($geo['total']) }}</td>
                        <td class="py-3 px-4 text-right text-red-500">{{ number_format($geo['churn']) }}</td>
                        <td class="py-3 px-4 text-right">
                            <span class="px-2 py-1 rounded-full text-xs font-semibold {{ $geo['rate'] > 25 ? 'bg-red-500/10 text-red-500' : 'bg-emerald-500/10 text-emerald-500' }}">
                                {{ $geo['rate'] }}%
                            </span>
                        </td>
                    </tr>
                    @endforeach
                    @foreach($data['ageGroups'] as $name => $age)
                    <tr class="border-b border-slate-100 dark:border-slate-700/50 hover:bg-slate-50 dark:hover:bg-slate-700/30">
                        <td class="py-3 px-4 text-slate-500 dark:text-slate-400">Usia</td>
                        <td class="py-3 px-4 font-medium">{{ $name }}</td>
                        <td class="py-3 px-4 text-right">{{ number_format($age['total']) }}</td>
                        <td class="py-3 px-4 text-right text-red-500">{{ number_format($age['churn']) }}</td>
                        <td class="py-3 px-4 text-right">
                            <span class="px-2 py-1 rounded-full text-xs font-semibold {{ $age['rate'] > 25 ? 'bg-red-500/10 text-red-500' : 'bg-emerald-500/10 text-emerald-500' }}">
                                {{ $age['rate'] }}%
                            </span>
                        </td>
                    </tr>
                    @endforeach
                    @foreach($data['gender'] as $name => $gen)
                    <tr class="border-b border-slate-100 dark:border-slate-700/50 hover:bg-slate-50 dark:hover:bg-slate-700/30">
                        <td class="py-3 px-4 text-slate-500 dark:text-slate-400">Gender</td>
                        <td class="py-3 px-4 font-medium">{{ $name }}</td>
                        <td class="py-3 px-4 text-right">{{ number_format($gen['total']) }}</td>
                        <td class="py-3 px-4 text-right text-red-500">{{ number_format($gen['churn']) }}</td>
                        <td class="py-3 px-4 text-right">
                            <span class="px-2 py-1 rounded-full text-xs font-semibold {{ $gen['rate'] > 25 ? 'bg-red-500/10 text-red-500' : 'bg-emerald-500/10 text-emerald-500' }}">
                                {{ $gen['rate'] }}%
                            </span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
const isDark = document.documentElement.classList.contains('dark');
const textColor = isDark ? '#94A3B8' : '#64748B';
const gridColor = isDark ? '#334155' : '#E2E8F0';

new ApexCharts(document.querySelector("#geoBarChart"), {
    series: [{
        name: 'Churn Rate (%)',
        data: [
            @foreach($data['geography'] as $country => $geo)
            { x: '{{ $country }}', y: {{ $geo['rate'] }} },
            @endforeach
        ]
    }],
    chart: { type: 'bar', height: 300, fontFamily: 'Inter, sans-serif', toolbar: { show: false } },
    plotOptions: { bar: { borderRadius: 8, columnWidth: '50%' } },
    colors: ['#EF4444'],
    xaxis: { labels: { style: { colors: textColor } }, axisBorder: { show: false } },
    yaxis: { labels: { style: { colors: textColor }, formatter: (val) => val + '%' } },
    grid: { borderColor: gridColor },
    dataLabels: { enabled: true, formatter: (val) => val + '%', style: { colors: ['#fff'] } },
}).render();

new ApexCharts(document.querySelector("#geoGroupedChart"), {
    series: [
        {
            name: 'Total Nasabah',
            data: [@foreach($data['geography'] as $geo){{ $geo['total'] }},@endforeach]
        },
        {
            name: 'Nasabah Churn',
            data: [@foreach($data['geography'] as $geo){{ $geo['churn'] }},@endforeach]
        }
    ],
    chart: { type: 'bar', height: 300, fontFamily: 'Inter, sans-serif', toolbar: { show: false } },
    plotOptions: { bar: { borderRadius: 8, columnWidth: '60%' } },
    colors: ['#6366F1', '#EF4444'],
    xaxis: {
        categories: [@foreach($data['geography'] as $country => $geo)'{{ $country }}',@endforeach],
        labels: { style: { colors: textColor } },
        axisBorder: { show: false }
    },
    yaxis: { labels: { style: { colors: textColor } } },
    grid: { borderColor: gridColor },
    legend: { labels: { colors: textColor } },
}).render();

new ApexCharts(document.querySelector("#ageBarChart"), {
    series: [{
        name: 'Churn Rate (%)',
        data: [
            @foreach($data['ageGroups'] as $age => $group)
            { x: '{{ $age }}', y: {{ $group['rate'] }} },
            @endforeach
        ]
    }],
    chart: { type: 'bar', height: 300, fontFamily: 'Inter, sans-serif', toolbar: { show: false } },
    plotOptions: { bar: { borderRadius: 8, columnWidth: '50%' } },
    colors: ['#F59E0B'],
    xaxis: { labels: { style: { colors: textColor } }, axisBorder: { show: false } },
    yaxis: { labels: { style: { colors: textColor }, formatter: (val) => val + '%' } },
    grid: { borderColor: gridColor },
    dataLabels: { enabled: true, formatter: (val) => val + '%', style: { colors: ['#fff'] } },
}).render();

new ApexCharts(document.querySelector("#genderChart"), {
    series: [
        @foreach($data['gender'] as $name => $gen)
        {{ $gen['rate'] }},
        @endforeach
    ],
    chart: { type: 'donut', height: 300, fontFamily: 'Inter, sans-serif' },
    labels: [@foreach($data['gender'] as $name => $gen)'{{ $name }}',@endforeach],
    colors: ['#6366F1', '#EC4899'],
    legend: { position: 'bottom', labels: { colors: textColor } },
    plotOptions: {
        pie: {
            donut: {
                labels: {
                    show: true,
                    total: { show: true, label: 'Avg Churn', color: textColor, formatter: () => '20.8%' }
                }
            }
        }
    },
    dataLabels: { enabled: false },
    stroke: { width: 0 },
}).render();
</script>
@endpush
