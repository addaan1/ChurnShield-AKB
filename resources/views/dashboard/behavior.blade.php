@extends('layouts.dashboard')

@section('title', 'Perilaku')
@section('page-title', 'Analisis Perilaku Nasabah')

@section('content')
<div class="space-y-6">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @php
            $inactiveRate = $data['activity']['Inactive']['rate'] ?? 0;
            $activeRate = $data['activity']['Active']['rate'] ?? 0;
            $prod3Rate = $data['products']['3']['rate'] ?? 0;
            $prod4Rate = $data['products']['4']['rate'] ?? 0;
        @endphp
        <div class="p-6 rounded-2xl bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700">
            <div class="flex items-center gap-3 mb-2">
                <div class="w-3 h-3 rounded-full bg-red-500"></div>
                <span class="text-sm text-slate-500 dark:text-slate-400">Nasabah Tidak Aktif</span>
            </div>
            <h3 class="text-2xl font-display font-bold text-red-500">{{ $inactiveRate }}%</h3>
            <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">Churn rate nasabah tidak aktif (aktif: {{ $activeRate }}%)</p>
        </div>

        <div class="p-6 rounded-2xl bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700">
            <div class="flex items-center gap-3 mb-2">
                <div class="w-3 h-3 rounded-full bg-amber-500"></div>
                <span class="text-sm text-slate-500 dark:text-slate-400">3 Produk</span>
            </div>
            <h3 class="text-2xl font-display font-bold text-amber-500">{{ $prod3Rate }}%</h3>
            <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">Churn rate sangat tinggi pada nasabah multi-produk</p>
        </div>

        <div class="p-6 rounded-2xl bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700">
            <div class="flex items-center gap-3 mb-2">
                <div class="w-3 h-3 rounded-full bg-red-500"></div>
                <span class="text-sm text-slate-500 dark:text-slate-400">4 Produk</span>
            </div>
            <h3 class="text-2xl font-display font-bold text-red-500">{{ $prod4Rate }}%</h3>
            <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">Semua nasabah dengan 4 produk melakukan churn</p>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <div class="p-6 rounded-2xl bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700">
            <h3 class="font-display font-semibold text-lg mb-4">Churn: Aktif vs Tidak Aktif</h3>
            <div id="activityChart"></div>
        </div>

        <div class="p-6 rounded-2xl bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700">
            <h3 class="font-display font-semibold text-lg mb-4">Churn Rate per Jumlah Produk</h3>
            <div id="productChart"></div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <div class="p-6 rounded-2xl bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700">
            <h3 class="font-display font-semibold text-lg mb-4">Total & Churn per Jumlah Produk</h3>
            <div id="productGroupedChart"></div>
        </div>

        <div class="p-6 rounded-2xl bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700">
            <h3 class="font-display font-semibold text-lg mb-4">Kepemilikan Kartu Kredit</h3>
            <div id="creditCardChart"></div>
        </div>
    </div>

    <div class="p-6 rounded-2xl bg-gradient-to-br from-indigo-50 to-sky-50 dark:from-indigo-500/10 dark:to-sky-500/10 border border-indigo-500/20">
        <h3 class="font-display font-semibold text-lg mb-4">Temuan Kunci</h3>
        <div class="grid md:grid-cols-2 gap-4">
            <div class="flex items-start gap-3">
                <div class="w-8 h-8 rounded-lg bg-red-500/10 flex items-center justify-center flex-shrink-0 mt-0.5">
                    <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L4.082 16.5c-.77.833.192 2.5 1.732 2.5z"/>
                    </svg>
                </div>
                <div>
                    <h4 class="font-semibold text-sm">Keaktifan = Pengungkit Retensi</h4>
                    <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">Nasabah tidak aktif churn {{ $inactiveRate }}%, hampir 2x lipat nasabah aktif ({{ $activeRate }}%). Keaktifan adalah faktor yang bisa langsung dipengaruhi bank.</p>
                </div>
            </div>
            <div class="flex items-start gap-3">
                <div class="w-8 h-8 rounded-lg bg-amber-500/10 flex items-center justify-center flex-shrink-0 mt-0.5">
                    <svg class="w-4 h-4 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L4.082 16.5c-.77.833.192 2.5 1.732 2.5z"/>
                    </svg>
                </div>
                <div>
                    <h4 class="font-semibold text-sm">Multi-Produk Berisiko Tinggi</h4>
                    <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">Nasabah dengan 3 produk churn {{ $prod3Rate }}% dan 4 produk mencapai {{ $prod4Rate }}%. Evaluasi pengalaman nasabah multi-produk sangat diperlukan.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
const isDark = document.documentElement.classList.contains('dark');
const textColor = isDark ? '#94A3B8' : '#475569';
const gridColor = isDark ? '#334155' : '#CBD5E1';
const gridConfig = { borderColor: gridColor, strokeDashArray: 3 };

new ApexCharts(document.querySelector("#activityChart"), {
    series: [
        {
            name: 'Nasabah Setia',
            data: [
                @foreach($data['activity'] as $status => $act)
                {{ $act['total'] - $act['churn'] }},
                @endforeach
            ]
        },
        {
            name: 'Nasabah Churn',
            data: [
                @foreach($data['activity'] as $status => $act)
                {{ $act['churn'] }},
                @endforeach
            ]
        }
    ],
    chart: { type: 'bar', stacked: true, height: 300, fontFamily: 'Inter, sans-serif', toolbar: { show: false } },
    plotOptions: { bar: { borderRadius: 8, columnWidth: '50%' } },
    colors: ['#10B981', '#EF4444'],
    xaxis: {
        categories: [@foreach($data['activity'] as $status => $act)'{{ $status }}',@endforeach],
        labels: { style: { colors: textColor } },
        axisBorder: { show: false }
    },
    yaxis: { labels: { style: { colors: textColor } } },
    grid: gridConfig,
    legend: { labels: { colors: textColor } },
}).render();

new ApexCharts(document.querySelector("#productChart"), {
    series: [{
        name: 'Churn Rate (%)',
        data: [
            @foreach($data['products'] as $num => $prod)
            { x: '{{ $num }} Produk', y: {{ $prod['rate'] }} },
            @endforeach
        ]
    }],
    chart: { type: 'bar', height: 300, fontFamily: 'Inter, sans-serif', toolbar: { show: false } },
    plotOptions: { bar: { borderRadius: 8, columnWidth: '50%' } },
    colors: ['#F59E0B'],
    xaxis: { labels: { style: { colors: textColor } }, axisBorder: { show: false } },
    yaxis: { labels: { style: { colors: textColor }, formatter: (val) => val + '%' }, max: 100 },
    grid: gridConfig,
    dataLabels: { enabled: true, formatter: (val) => val + '%', style: { colors: ['#fff'] } },
}).render();

new ApexCharts(document.querySelector("#productGroupedChart"), {
    series: [
        {
            name: 'Total Nasabah',
            data: [@foreach($data['products'] as $prod){{ $prod['total'] }},@endforeach]
        },
        {
            name: 'Nasabah Churn',
            data: [@foreach($data['products'] as $prod){{ $prod['churn'] }},@endforeach]
        }
    ],
    chart: { type: 'bar', height: 300, fontFamily: 'Inter, sans-serif', toolbar: { show: false } },
    plotOptions: { bar: { borderRadius: 8, columnWidth: '60%' } },
    colors: ['#6366F1', '#EF4444'],
    xaxis: {
        categories: [@foreach($data['products'] as $num => $prod)'{{ $num }} Produk',@endforeach],
        labels: { style: { colors: textColor } },
        axisBorder: { show: false }
    },
    yaxis: { labels: { style: { colors: textColor } } },
    grid: gridConfig,
    legend: { labels: { colors: textColor } },
}).render();

new ApexCharts(document.querySelector("#creditCardChart"), {
    series: [
        @foreach($data['creditCard'] as $name => $cc)
        {{ $cc['total'] }},
        @endforeach
    ],
    chart: { type: 'donut', height: 300, fontFamily: 'Inter, sans-serif' },
    labels: [@foreach($data['creditCard'] as $name => $cc)'{{ $name === 'Yes' ? 'Punya Kartu' : 'Tidak Punya' }}',@endforeach],
    colors: ['#6366F1', '#94A3B8'],
    legend: { position: 'bottom', labels: { colors: textColor } },
    plotOptions: {
        pie: {
            donut: {
                labels: {
                    show: true,
                    total: { show: true, label: 'Total', color: textColor, formatter: () => '{{ number_format(collect($data["creditCard"])->sum("total"), 0, ",", ",") }}' }
                }
            }
        }
    },
    dataLabels: { enabled: false },
    stroke: { width: 0 },
}).render();
</script>
@endpush
