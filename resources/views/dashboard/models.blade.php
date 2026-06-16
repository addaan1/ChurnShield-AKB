@extends('layouts.dashboard')

@section('title', 'Evaluasi Model')
@section('page-title', 'Evaluasi Model Prediksi')

@section('content')
<div class="space-y-6">
    <div class="p-6 rounded-2xl bg-gradient-to-br from-indigo-50 to-sky-50 dark:from-indigo-500/10 dark:to-sky-500/10 border border-indigo-500/20">
        <div class="flex items-center gap-4">
            <div class="w-14 h-14 rounded-2xl gradient-bg flex items-center justify-center flex-shrink-0">
                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/>
                </svg>
            </div>
            <div>
                <h3 class="font-display font-semibold text-lg">Model Terbaik: XGBoost</h3>
                <p class="text-sm text-slate-500 dark:text-slate-400">F1-Score 58.4% | Accuracy 85.7% | Precision 81.0% | Recall 45.6%</p>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <div class="p-6 rounded-2xl bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700">
            <h3 class="font-display font-semibold text-lg mb-4">Perbandingan Metrik Model</h3>
            <div id="radarChart"></div>
        </div>

        <div class="p-6 rounded-2xl bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700">
            <h3 class="font-display font-semibold text-lg mb-4">Perbandingan Side-by-Side</h3>
            <div id="groupedBarChart"></div>
        </div>
    </div>

    <div class="p-6 rounded-2xl bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700">
        <h3 class="font-display font-semibold text-lg mb-4">Tabel Perbandingan Detail</h3>
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="border-b border-slate-200 dark:border-slate-700">
                        <th class="text-left py-4 px-4 font-semibold text-slate-500 dark:text-slate-400">Model</th>
                        <th class="text-center py-4 px-4 font-semibold text-slate-500 dark:text-slate-400">Accuracy</th>
                        <th class="text-center py-4 px-4 font-semibold text-slate-500 dark:text-slate-400">Precision</th>
                        <th class="text-center py-4 px-4 font-semibold text-slate-500 dark:text-slate-400">Recall</th>
                        <th class="text-center py-4 px-4 font-semibold text-slate-500 dark:text-slate-400">F1-Score</th>
                        <th class="text-center py-4 px-4 font-semibold text-slate-500 dark:text-slate-400">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data['models'] as $name => $metrics)
                    <tr class="border-b border-slate-100 dark:border-slate-700/50 hover:bg-slate-50 dark:hover:bg-slate-700/30 {{ $name === $data['bestModel'] ? 'bg-indigo-50/50 dark:bg-indigo-500/5' : '' }}">
                        <td class="py-4 px-4">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 rounded-lg {{ $name === $data['bestModel'] ? 'gradient-bg' : 'bg-slate-200 dark:bg-slate-700' }} flex items-center justify-center">
                                    <span class="text-xs font-bold {{ $name === $data['bestModel'] ? 'text-white' : 'text-slate-600 dark:text-slate-300' }}">
                                        {{ substr($name, 0, 2) }}
                                    </span>
                                </div>
                                <span class="font-medium">{{ $name }}</span>
                            </div>
                        </td>
                        <td class="py-4 px-4 text-center">
                            <span class="font-semibold {{ $name === $data['bestModel'] ? 'text-indigo-600 dark:text-indigo-400' : '' }}">{{ $metrics['accuracy'] }}%</span>
                        </td>
                        <td class="py-4 px-4 text-center">
                            <span class="font-semibold {{ $name === $data['bestModel'] ? 'text-indigo-600 dark:text-indigo-400' : '' }}">{{ $metrics['precision'] }}%</span>
                        </td>
                        <td class="py-4 px-4 text-center">
                            <span class="font-semibold {{ $name === $data['bestModel'] ? 'text-indigo-600 dark:text-indigo-400' : '' }}">{{ $metrics['recall'] }}%</span>
                        </td>
                        <td class="py-4 px-4 text-center">
                            <span class="font-bold {{ $name === $data['bestModel'] ? 'text-indigo-600 dark:text-indigo-400' : '' }}">{{ $metrics['f1'] }}%</span>
                        </td>
                        <td class="py-4 px-4 text-center">
                            @if($name === $data['bestModel'])
                            <span class="px-3 py-1 rounded-full gradient-bg text-white text-xs font-bold">TERBAIK</span>
                            @else
                            <span class="px-3 py-1 rounded-full bg-slate-100 dark:bg-slate-700 text-slate-500 dark:text-slate-400 text-xs font-semibold">Baseline</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        @foreach($data['models'] as $name => $metrics)
        <div class="p-6 rounded-2xl bg-white dark:bg-slate-800 border {{ $name === $data['bestModel'] ? 'border-indigo-500/30 ring-2 ring-indigo-500/20' : 'border-slate-200 dark:border-slate-700' }}">
            <div class="flex items-center gap-3 mb-4">
                <div class="w-10 h-10 rounded-lg {{ $name === $data['bestModel'] ? 'gradient-bg' : 'bg-slate-200 dark:bg-slate-700' }} flex items-center justify-center">
                    <span class="font-bold {{ $name === $data['bestModel'] ? 'text-white' : 'text-slate-600 dark:text-slate-300' }}">
                        {{ $name === 'Logistic Regression' ? 'LR' : ($name === 'Random Forest' ? 'RF' : 'XG') }}
                    </span>
                </div>
                <div>
                    <h4 class="font-display font-semibold">{{ $name }}</h4>
                    @if($name === $data['bestModel'])
                    <span class="text-xs text-indigo-500 font-semibold">Model Terbaik</span>
                    @endif
                </div>
            </div>
            <div id="gauge-{{ str_replace(' ', '-', strtolower($name)) }}"></div>
        </div>
        @endforeach
    </div>

    <div class="p-6 rounded-2xl bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700">
        <h3 class="font-display font-semibold text-lg mb-4">Interpretasi Bisnis</h3>
        <div class="grid md:grid-cols-2 gap-6">
            <div class="flex items-start gap-3">
                <div class="w-8 h-8 rounded-lg bg-emerald-500/10 flex items-center justify-center flex-shrink-0 mt-0.5">
                    <svg class="w-4 h-4 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                </div>
                <div>
                    <h4 class="font-semibold text-sm">Precision Tinggi = Hemat Biaya</h4>
                    <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">Precision 81.0% memastikan daftar nasabah berisiko akurat sehingga anggaran retensi tidak terbuang pada nasabah loyal.</p>
                </div>
            </div>
            <div class="flex items-start gap-3">
                <div class="w-8 h-8 rounded-lg bg-amber-500/10 flex items-center justify-center flex-shrink-0 mt-0.5">
                    <svg class="w-4 h-4 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                    </svg>
                </div>
                <div>
                    <h4 class="font-semibold text-sm">Recall Perlu Ditingkatkan</h4>
                    <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">Recall 45.6% masih bisa ditingkatkan melalui penyesuaian ambang batas (threshold) dan pembobotan kelas.</p>
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

new ApexCharts(document.querySelector("#radarChart"), {
    series: [
        @foreach($data['models'] as $name => $metrics)
        {
            name: '{{ $name }}',
            data: [{{ $metrics['accuracy'] }}, {{ $metrics['precision'] }}, {{ $metrics['recall'] }}, {{ $metrics['f1'] }}]
        },
        @endforeach
    ],
    chart: { type: 'radar', height: 350, fontFamily: 'Inter, sans-serif', toolbar: { show: false } },
    colors: ['#94A3B8', '#10B981', '#6366F1'],
    xaxis: {
        categories: ['Accuracy', 'Precision', 'Recall', 'F1-Score'],
        labels: { style: { colors: [textColor, textColor, textColor, textColor] } }
    },
    yaxis: { show: false, min: 0, max: 100 },
    legend: { labels: { colors: textColor } },
    stroke: { width: 2 },
    fill: { opacity: 0.15 },
    markers: { size: 4 },
}).render();

new ApexCharts(document.querySelector("#groupedBarChart"), {
    series: [
        {
            name: 'Logistic Regression',
            data: [{{ $data['models']['Logistic Regression']['accuracy'] }}, {{ $data['models']['Logistic Regression']['precision'] }}, {{ $data['models']['Logistic Regression']['recall'] }}, {{ $data['models']['Logistic Regression']['f1'] }}]
        },
        {
            name: 'Random Forest',
            data: [{{ $data['models']['Random Forest']['accuracy'] }}, {{ $data['models']['Random Forest']['precision'] }}, {{ $data['models']['Random Forest']['recall'] }}, {{ $data['models']['Random Forest']['f1'] }}]
        },
        {
            name: 'XGBoost',
            data: [{{ $data['models']['XGBoost']['accuracy'] }}, {{ $data['models']['XGBoost']['precision'] }}, {{ $data['models']['XGBoost']['recall'] }}, {{ $data['models']['XGBoost']['f1'] }}]
        }
    ],
    chart: { type: 'bar', height: 350, fontFamily: 'Inter, sans-serif', toolbar: { show: false } },
    plotOptions: { bar: { borderRadius: 6, columnWidth: '60%' } },
    colors: ['#94A3B8', '#10B981', '#6366F1'],
    xaxis: {
        categories: ['Accuracy', 'Precision', 'Recall', 'F1-Score'],
        labels: { style: { colors: textColor } },
        axisBorder: { show: false }
    },
    yaxis: { labels: { style: { colors: textColor }, formatter: (val) => val + '%' }, max: 100 },
    grid: gridConfig,
    legend: { labels: { colors: textColor } },
    dataLabels: { enabled: false },
}).render();

@foreach($data['models'] as $name => $metrics)
@php
    $id = str_replace(' ', '-', strtolower($name));
    $color = $name === $data['bestModel'] ? '#6366F1' : ($name === 'Random Forest' ? '#10B981' : '#94A3B8');
@endphp
new ApexCharts(document.querySelector("#gauge-{{ $id }}"), {
    series: [{{ $metrics['f1'] }}],
    chart: { type: 'radialBar', height: 200, fontFamily: 'Inter, sans-serif' },
    plotOptions: {
        radialBar: {
            startAngle: -135,
            endAngle: 135,
            hollow: { size: '60%' },
            track: { background: isDark ? '#334155' : '#E2E8F0' },
            dataLabels: {
                name: { show: true, offsetY: -10, fontSize: '12px', color: textColor },
                value: { show: true, fontSize: '24px', fontWeight: 'bold', color: '{{ $color }}', formatter: (val) => val + '%' }
            }
        }
    },
    fill: { colors: ['{{ $color }}'] },
    stroke: { lineCap: 'round' },
    labels: ['F1-Score'],
}).render();
@endforeach
</script>
@endpush
