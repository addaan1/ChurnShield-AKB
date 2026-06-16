@extends('layouts.dashboard')

@section('title', 'Overview')
@section('page-title', 'Dashboard Overview')

@section('content')
<div class="space-y-6">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="p-6 rounded-2xl bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 card-hover">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 rounded-xl bg-indigo-500/10 flex items-center justify-center">
                    <svg class="w-6 h-6 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                </div>
                <span class="text-xs font-semibold text-indigo-500 bg-indigo-500/10 px-2 py-1 rounded-full">Total</span>
            </div>
            <h3 class="text-3xl font-display font-bold" data-counter="{{ $data['totalNasabah'] }}">0</h3>
            <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">Total Nasabah</p>
        </div>

        <div class="p-6 rounded-2xl bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 card-hover">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 rounded-xl bg-red-500/10 flex items-center justify-center">
                    <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                    </svg>
                </div>
                <span class="text-xs font-semibold text-red-500 bg-red-500/10 px-2 py-1 rounded-full">Churn</span>
            </div>
            <h3 class="text-3xl font-display font-bold text-red-500" data-counter="{{ $data['nasabahChurn'] }}">0</h3>
            <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">Nasabah Churn</p>
        </div>

        <div class="p-6 rounded-2xl bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 card-hover">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 rounded-xl bg-emerald-500/10 flex items-center justify-center">
                    <svg class="w-6 h-6 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <span class="text-xs font-semibold text-emerald-500 bg-emerald-500/10 px-2 py-1 rounded-full">Setia</span>
            </div>
            <h3 class="text-3xl font-display font-bold text-emerald-500" data-counter="{{ $data['nasabahSetia'] }}">0</h3>
            <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">Nasabah Setia</p>
        </div>

        <div class="p-6 rounded-2xl bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 card-hover">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 rounded-xl bg-amber-500/10 flex items-center justify-center">
                    <svg class="w-6 h-6 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <span class="text-xs font-semibold text-amber-500 bg-amber-500/10 px-2 py-1 rounded-full">Rate</span>
            </div>
            <h3 class="text-3xl font-display font-bold text-amber-500">{{ $data['churnRate'] }}%</h3>
            <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">Churn Rate</p>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <div class="p-6 rounded-2xl bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700">
            <h3 class="font-display font-semibold text-lg mb-4">Distribusi Churn vs Setia</h3>
            <div id="churnDonut"></div>
        </div>

        <div class="p-6 rounded-2xl bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700">
            <h3 class="font-display font-semibold text-lg mb-4">Churn per Negara</h3>
            <div id="geographyChart"></div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <div class="p-6 rounded-2xl bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700">
            <h3 class="font-display font-semibold text-lg mb-4">Churn per Kelompok Usia</h3>
            <div id="ageChart"></div>
        </div>

        <div class="p-6 rounded-2xl bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700">
            <h3 class="font-display font-semibold text-lg mb-4">Model Terbaik: XGBoost</h3>
            <div class="space-y-4 mt-6">
                <div>
                    <div class="flex justify-between text-sm mb-2">
                        <span class="text-slate-500 dark:text-slate-400">Accuracy</span>
                        <span class="font-semibold text-indigo-500">85.7%</span>
                    </div>
                    <div class="h-3 rounded-full bg-slate-200 dark:bg-slate-700">
                        <div class="h-3 rounded-full gradient-bg" style="width: 85.7%"></div>
                    </div>
                </div>
                <div>
                    <div class="flex justify-between text-sm mb-2">
                        <span class="text-slate-500 dark:text-slate-400">Precision</span>
                        <span class="font-semibold text-indigo-500">81.0%</span>
                    </div>
                    <div class="h-3 rounded-full bg-slate-200 dark:bg-slate-700">
                        <div class="h-3 rounded-full gradient-bg" style="width: 81%"></div>
                    </div>
                </div>
                <div>
                    <div class="flex justify-between text-sm mb-2">
                        <span class="text-slate-500 dark:text-slate-400">Recall</span>
                        <span class="font-semibold text-indigo-500">45.6%</span>
                    </div>
                    <div class="h-3 rounded-full bg-slate-200 dark:bg-slate-700">
                        <div class="h-3 rounded-full gradient-bg" style="width: 45.6%"></div>
                    </div>
                </div>
                <div>
                    <div class="flex justify-between text-sm mb-2">
                        <span class="text-slate-500 dark:text-slate-400">F1-Score</span>
                        <span class="font-semibold text-indigo-500">58.4%</span>
                    </div>
                    <div class="h-3 rounded-full bg-slate-200 dark:bg-slate-700">
                        <div class="h-3 rounded-full gradient-bg" style="width: 58.4%"></div>
                    </div>
                </div>
            </div>
            <div class="mt-6 p-4 rounded-xl bg-indigo-50 dark:bg-indigo-500/10 border border-indigo-500/20">
                <p class="text-sm text-indigo-700 dark:text-indigo-300">
                    <strong>Insight:</strong> XGBoost memberikan prediksi paling andal dengan F1-Score 58.4%, memastikan anggaran retensi tepat sasaran.
                </p>
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
const labelStyle = { style: { colors: textColor } };

new ApexCharts(document.querySelector("#churnDonut"), {
    series: [{{ $data['nasabahSetia'] }}, {{ $data['nasabahChurn'] }}],
    chart: {
        type: 'donut',
        height: 300,
        fontFamily: 'Inter, sans-serif',
    },
    labels: ['Nasabah Setia', 'Nasabah Churn'],
    colors: ['#10B981', '#EF4444'],
    legend: {
        position: 'bottom',
        labels: { colors: textColor }
    },
    plotOptions: {
        pie: {
            donut: {
                labels: {
                    show: true,
                    total: {
                        show: true,
                        label: 'Total',
                        color: textColor,
                        formatter: () => '10,000'
                    }
                }
            }
        }
    },
    dataLabels: { enabled: false },
    stroke: { width: 0 },
}).render();

new ApexCharts(document.querySelector("#geographyChart"), {
    series: [{
        name: 'Churn Rate (%)',
        data: [
            @foreach($data['geography'] as $country => $geo)
            { x: '{{ $country }}', y: {{ $geo['rate'] }} },
            @endforeach
        ]
    }],
    chart: {
        type: 'bar',
        height: 300,
        fontFamily: 'Inter, sans-serif',
        toolbar: { show: false },
    },
    plotOptions: {
        bar: {
            horizontal: true,
            borderRadius: 8,
            barHeight: '60%',
        }
    },
    colors: ['#6366F1'],
    xaxis: {
        labels: { style: { colors: textColor } },
        axisBorder: { show: false },
    },
    yaxis: {
        labels: { style: { colors: textColor } },
    },
    grid: gridConfig,
    dataLabels: {
        enabled: true,
        formatter: (val) => val + '%',
        style: { colors: ['#fff'] }
    },
}).render();

new ApexCharts(document.querySelector("#ageChart"), {
    series: [{
        name: 'Churn Rate (%)',
        data: [
            @foreach($data['ageGroups'] as $age => $group)
            { x: '{{ $age }}', y: {{ $group['rate'] }} },
            @endforeach
        ]
    }],
    chart: {
        type: 'bar',
        height: 300,
        fontFamily: 'Inter, sans-serif',
        toolbar: { show: false },
    },
    plotOptions: {
        bar: {
            borderRadius: 8,
            columnWidth: '50%',
        }
    },
    colors: ['#0EA5E9'],
    xaxis: {
        labels: { style: { colors: textColor } },
        axisBorder: { show: false },
    },
    yaxis: {
        labels: {
            style: { colors: textColor },
            formatter: (val) => val + '%'
        },
    },
    grid: gridConfig,
    dataLabels: {
        enabled: true,
        formatter: (val) => val + '%',
        style: { colors: ['#fff'] }
    },
}).render();
</script>
@endpush
