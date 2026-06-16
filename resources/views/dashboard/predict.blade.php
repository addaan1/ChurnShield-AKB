@extends('layouts.dashboard')

@section('title', 'Prediksi Churn')
@section('page-title', 'Prediksi Churn Nasabah')

@section('content')
<div class="space-y-6">
    <div class="p-6 rounded-2xl bg-gradient-to-br from-indigo-50 to-sky-50 dark:from-indigo-500/10 dark:to-sky-500/10 border border-indigo-500/20">
        <div class="flex items-center gap-4">
            <div class="w-14 h-14 rounded-2xl gradient-bg flex items-center justify-center flex-shrink-0">
                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.394 3.394 0 0014 15.449V17a1 1 0 01-1 1h-2a1 1 0 01-1-1v-1.551a3.394 3.394 0 00-.457-1.902l-.548-.547z"/>
                </svg>
            </div>
            <div>
                <h3 class="font-display font-semibold text-lg">Simulasi Prediksi Churn</h3>
                <p class="text-sm text-slate-500 dark:text-slate-400">Masukkan data nasabah untuk memprediksi probabilitas churn dan tingkat risiko.</p>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <div class="p-6 rounded-2xl bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700">
            <h3 class="font-display font-semibold text-lg mb-6">Data Nasabah</h3>
            <form id="predictForm" class="space-y-4">
                @csrf
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">Credit Score</label>
                        <input type="number" name="credit_score" value="650" min="300" max="850" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-700 focus:ring-2 focus:ring-indigo-500 focus:border-transparent outline-none transition-all">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">Usia</label>
                        <input type="number" name="age" value="35" min="18" max="100" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-700 focus:ring-2 focus:ring-indigo-500 focus:border-transparent outline-none transition-all">
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">Tenure (Tahun)</label>
                        <input type="number" name="tenure" value="5" min="0" max="10" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-700 focus:ring-2 focus:ring-indigo-500 focus:border-transparent outline-none transition-all">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">Balance</label>
                        <input type="number" name="balance" value="50000" min="0" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-700 focus:ring-2 focus:ring-indigo-500 focus:border-transparent outline-none transition-all">
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">Jumlah Produk</label>
                        <select name="num_products" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-700 focus:ring-2 focus:ring-indigo-500 focus:border-transparent outline-none transition-all">
                            <option value="1">1 Produk</option>
                            <option value="2" selected>2 Produk</option>
                            <option value="3">3 Produk</option>
                            <option value="4">4 Produk</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">Negara</label>
                        <select name="geography" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-700 focus:ring-2 focus:ring-indigo-500 focus:border-transparent outline-none transition-all">
                            <option value="France">France</option>
                            <option value="Germany">Germany</option>
                            <option value="Spain">Spain</option>
                        </select>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">Gender</label>
                        <select name="gender" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-700 focus:ring-2 focus:ring-indigo-500 focus:border-transparent outline-none transition-all">
                            <option value="Male">Laki-laki</option>
                            <option value="Female">Perempuan</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">Status Keaktifan</label>
                        <select name="is_active" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-700 focus:ring-2 focus:ring-indigo-500 focus:border-transparent outline-none transition-all">
                            <option value="1">Aktif</option>
                            <option value="0">Tidak Aktif</option>
                        </select>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">Kartu Kredit</label>
                        <select name="has_cr_card" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-700 focus:ring-2 focus:ring-indigo-500 focus:border-transparent outline-none transition-all">
                            <option value="1">Punya</option>
                            <option value="0">Tidak Punya</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">Estimasi Gaji</label>
                        <input type="number" name="estimated_salary" value="100000" min="0" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-700 focus:ring-2 focus:ring-indigo-500 focus:border-transparent outline-none transition-all">
                    </div>
                </div>

                <button type="submit" id="submitBtn" class="w-full py-3 rounded-xl gradient-bg text-white font-semibold hover:opacity-90 transition-opacity shadow-lg shadow-indigo-500/25 flex items-center justify-center gap-2">
                    <span id="btnText">Prediksi Churn</span>
                    <svg id="btnSpinner" class="hidden animate-spin w-5 h-5 text-white" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                </button>
            </form>
        </div>

        <div class="space-y-6">
            <div id="resultCard" class="p-6 rounded-2xl bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 hidden">
                <h3 class="font-display font-semibold text-lg mb-4">Hasil Prediksi</h3>
                <div class="flex flex-col items-center">
                    <div id="gaugeResult"></div>
                    <div id="riskBadge" class="mt-4 px-6 py-2 rounded-full text-lg font-bold"></div>
                </div>
            </div>

            <div id="recommendationCard" class="p-6 rounded-2xl bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 hidden">
                <h3 class="font-display font-semibold text-lg mb-4">Rekomendasi</h3>
                <div id="recommendationList" class="space-y-3"></div>
            </div>

            <div id="errorCard" class="p-6 rounded-2xl bg-red-50 dark:bg-red-500/10 border border-red-500/20 hidden">
                <div class="flex items-center gap-3">
                    <svg class="w-6 h-6 text-red-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <p id="errorMessage" class="text-sm text-red-700 dark:text-red-300"></p>
                </div>
            </div>

            <div id="placeholderCard" class="p-12 rounded-2xl bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-center">
                <div class="w-20 h-20 rounded-2xl bg-slate-100 dark:bg-slate-700 flex items-center justify-center mx-auto mb-4">
                    <svg class="w-10 h-10 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.394 3.394 0 0014 15.449V17a1 1 0 01-1 1h-2a1 1 0 01-1-1v-1.551a3.394 3.394 0 00-.457-1.902l-.548-.547z"/>
                    </svg>
                </div>
                <h3 class="font-display font-semibold text-lg text-slate-500 dark:text-slate-400">Belum Ada Prediksi</h3>
                <p class="text-sm text-slate-400 dark:text-slate-500 mt-2">Isi form di sebelah kiri dan klik "Prediksi Churn" untuk melihat hasil.</p>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
let gaugeChart = null;

document.getElementById('predictForm').addEventListener('submit', async function(e) {
    e.preventDefault();

    const formData = new FormData(this);
    const submitBtn = document.getElementById('submitBtn');
    const btnText = document.getElementById('btnText');
    const btnSpinner = document.getElementById('btnSpinner');

    submitBtn.disabled = true;
    btnText.textContent = 'Memproses...';
    btnSpinner.classList.remove('hidden');
    document.getElementById('errorCard').classList.add('hidden');

    try {
        const response = await fetch('{{ route("dashboard.predict.run") }}', {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': formData.get('_token'),
                'Accept': 'application/json',
            }
        });

        const result = await response.json();

        if (!response.ok) {
            throw new Error(result.error || 'Terjadi kesalahan saat memproses prediksi.');
        }

        document.getElementById('placeholderCard').classList.add('hidden');
        document.getElementById('resultCard').classList.remove('hidden');
        document.getElementById('recommendationCard').classList.remove('hidden');

        const isDark = document.documentElement.classList.contains('dark');

        if (gaugeChart) gaugeChart.destroy();

        gaugeChart = new ApexCharts(document.querySelector("#gaugeResult"), {
            series: [result.probability],
            chart: { type: 'radialBar', height: 250, fontFamily: 'Inter, sans-serif' },
            plotOptions: {
                radialBar: {
                    startAngle: -135,
                    endAngle: 135,
                    hollow: { size: '55%' },
                    track: { background: isDark ? '#334155' : '#E2E8F0' },
                    dataLabels: {
                        name: { show: true, offsetY: -10, fontSize: '13px', color: isDark ? '#94A3B8' : '#64748B' },
                        value: {
                            show: true,
                            fontSize: '32px',
                            fontWeight: 'bold',
                            color: result.risk_color,
                            formatter: (val) => val + '%'
                        }
                    }
                }
            },
            fill: { colors: [result.risk_color] },
            stroke: { lineCap: 'round' },
            labels: ['Probabilitas Churn'],
        });
        gaugeChart.render();

        const riskBadge = document.getElementById('riskBadge');
        riskBadge.textContent = `Risiko ${result.risk_level}`;
        riskBadge.style.backgroundColor = result.risk_color + '20';
        riskBadge.style.color = result.risk_color;

        const recList = document.getElementById('recommendationList');
        recList.innerHTML = '';
        if (result.recommendations.length > 0) {
            result.recommendations.forEach(rec => {
                recList.innerHTML += `
                    <div class="flex items-start gap-3 p-3 rounded-xl bg-slate-50 dark:bg-slate-700/50">
                        <svg class="w-5 h-5 text-indigo-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <p class="text-sm">${rec}</p>
                    </div>
                `;
            });
        } else {
            recList.innerHTML = `
                <div class="flex items-start gap-3 p-3 rounded-xl bg-emerald-50 dark:bg-emerald-500/10">
                    <svg class="w-5 h-5 text-emerald-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <p class="text-sm text-emerald-700 dark:text-emerald-300">Nasabah ini memiliki risiko churn yang rendah. Pertahankan layanan yang baik!</p>
                </div>
            `;
        }
    } catch (error) {
        console.error('Error:', error);
        document.getElementById('errorCard').classList.remove('hidden');
        document.getElementById('errorMessage').textContent = error.message || 'Terjadi kesalahan. Silakan coba lagi.';
    } finally {
        submitBtn.disabled = false;
        btnText.textContent = 'Prediksi Churn';
        btnSpinner.classList.add('hidden');
    }
});
</script>
@endpush
