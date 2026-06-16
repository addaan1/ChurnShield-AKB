@extends('layouts.landing')

@section('title', 'ChurnShield')

@section('content')
<nav class="fixed top-0 left-0 right-0 z-50 bg-white/90 dark:bg-slate-900/90 backdrop-blur-xl border-b border-slate-200 dark:border-slate-800">
    <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">
        <a href="{{ route('landing') }}" class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-xl gradient-bg flex items-center justify-center">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                </svg>
            </div>
            <span class="font-display font-bold text-xl gradient-text">ChurnShield</span>
        </a>

        <div class="hidden md:flex items-center gap-8">
            <a href="#problem" class="text-sm font-medium text-slate-700 dark:text-slate-300 hover:text-indigo-600 dark:hover:text-indigo-400 transition-colors">Masalah</a>
            <a href="#features" class="text-sm font-medium text-slate-700 dark:text-slate-300 hover:text-indigo-600 dark:hover:text-indigo-400 transition-colors">Fitur</a>
            <a href="#methodology" class="text-sm font-medium text-slate-700 dark:text-slate-300 hover:text-indigo-600 dark:hover:text-indigo-400 transition-colors">Metodologi</a>
            <a href="#team" class="text-sm font-medium text-slate-700 dark:text-slate-300 hover:text-indigo-600 dark:hover:text-indigo-400 transition-colors">Tim</a>
            <button id="darkModeToggle" class="p-2 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-800 transition-colors">
                <svg class="w-5 h-5 hidden dark:block text-slate-600 dark:text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/>
                </svg>
                <svg class="w-5 h-5 block dark:hidden text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"/>
                </svg>
            </button>
            <a href="{{ route('dashboard.index') }}" class="px-5 py-2.5 rounded-xl gradient-bg text-white text-sm font-semibold hover:opacity-90 transition-opacity shadow-lg shadow-indigo-500/25">
                Buka Dashboard
            </a>
        </div>

        <div class="flex items-center gap-3 md:hidden">
            <button id="darkModeToggleMobile" class="p-2 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-800 transition-colors">
                <svg class="w-5 h-5 hidden dark:block" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/>
                </svg>
                <svg class="w-5 h-5 block dark:hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"/>
                </svg>
            </button>
            <button id="mobileMenuBtn" class="p-2 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-800">
                <svg class="w-6 h-6 text-slate-700 dark:text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>
        </div>
    </div>

    <div id="mobileMenu" class="hidden md:hidden px-6 pb-4 space-y-2">
        <a href="#problem" class="block px-4 py-2 rounded-lg text-sm font-medium text-slate-700 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-800">Masalah</a>
        <a href="#features" class="block px-4 py-2 rounded-lg text-sm font-medium text-slate-700 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-800">Fitur</a>
        <a href="#methodology" class="block px-4 py-2 rounded-lg text-sm font-medium text-slate-700 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-800">Metodologi</a>
        <a href="#team" class="block px-4 py-2 rounded-lg text-sm font-medium text-slate-700 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-800">Tim</a>
        <a href="{{ route('dashboard.index') }}" class="block px-4 py-2 rounded-xl gradient-bg text-white text-sm font-semibold text-center">Buka Dashboard</a>
    </div>
</nav>

<section class="relative min-h-screen flex items-center overflow-hidden pt-24 bg-white dark:bg-slate-900">
    <div class="absolute inset-0 grid-pattern opacity-40 dark:opacity-20"></div>
    <div class="absolute top-0 right-0 w-1/2 h-full bg-gradient-to-l from-indigo-50/80 to-transparent dark:from-indigo-950/20 pointer-events-none"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-6 py-16 grid lg:grid-cols-2 gap-12 items-center">
        <div>
            <div data-aos="fade-right" data-aos-duration="600" class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-indigo-50 dark:bg-indigo-500/10 border border-indigo-200 dark:border-indigo-500/20 text-indigo-600 dark:text-indigo-400 text-sm font-medium mb-6">
                <span class="w-2 h-2 rounded-full bg-indigo-500 pulse-dot"></span>
                Analisis Keputusan Bisnis Berbasis Data
            </div>

            <h1 data-aos="fade-right" data-aos-duration="800" class="font-display text-4xl md:text-5xl lg:text-6xl font-extrabold text-slate-900 dark:text-white mb-6 leading-tight">
                Prediksi <span class="gradient-text">Customer Churn</span><br>
                <span class="text-slate-700 dark:text-slate-300">dengan Machine Learning</span>
            </h1>

            <p data-aos="fade-right" data-aos-duration="800" data-aos-delay="200" class="text-lg text-slate-600 dark:text-slate-400 mb-8 max-w-lg">
                Dashboard interaktif untuk menganalisis pola churn 10.000 nasabah bank menggunakan Logistic Regression, Random Forest, dan XGBoost.
            </p>

            <div data-aos="fade-right" data-aos-duration="800" data-aos-delay="300" class="flex flex-col sm:flex-row gap-4">
                <a href="{{ route('dashboard.index') }}" class="px-8 py-4 rounded-xl gradient-bg text-white font-semibold text-lg hover:opacity-90 transition-all shadow-2xl shadow-indigo-500/30 hover:shadow-indigo-500/50 hover:-translate-y-1">
                    Jelajahi Dashboard
                    <svg class="inline w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                    </svg>
                </a>
                <a href="#problem" class="px-8 py-4 rounded-xl border-2 border-slate-300 dark:border-slate-600 text-slate-700 dark:text-slate-300 font-semibold text-lg hover:bg-slate-100 dark:hover:bg-slate-800 transition-all hover:-translate-y-1">
                    Pelajari Lebih Lanjut
                </a>
            </div>

            <div data-aos="fade-up" data-aos-delay="500" class="flex items-center gap-8 mt-10 pt-8 border-t border-slate-200 dark:border-slate-700">
                <div>
                    <div class="text-2xl font-display font-bold text-slate-900 dark:text-white" data-counter="10000">0</div>
                    <div class="text-sm text-slate-500 dark:text-slate-400">Nasabah</div>
                </div>
                <div class="w-px h-10 bg-slate-200 dark:bg-slate-700"></div>
                <div>
                    <div class="text-2xl font-display font-bold text-red-500">20.4%</div>
                    <div class="text-sm text-slate-500 dark:text-slate-400">Churn Rate</div>
                </div>
                <div class="w-px h-10 bg-slate-200 dark:bg-slate-700"></div>
                <div>
                    <div class="text-2xl font-display font-bold text-emerald-500">3</div>
                    <div class="text-sm text-slate-500 dark:text-slate-400">Model ML</div>
                </div>
            </div>
        </div>

        <div data-aos="fade-left" data-aos-duration="1000" class="hidden lg:block">
            <div class="dashboard-mockup relative">
                <div class="bg-slate-900 rounded-2xl shadow-2xl shadow-indigo-500/20 border border-slate-700 overflow-hidden">
                    <div class="flex items-center gap-2 px-4 py-3 bg-slate-800 border-b border-slate-700">
                        <div class="w-3 h-3 rounded-full bg-red-400"></div>
                        <div class="w-3 h-3 rounded-full bg-amber-400"></div>
                        <div class="w-3 h-3 rounded-full bg-emerald-400"></div>
                        <span class="ml-3 text-xs text-slate-400">churnshield.app/dashboard</span>
                    </div>

                    <div class="p-5 space-y-4">
                        <div class="grid grid-cols-4 gap-3">
                            <div class="p-3 rounded-xl bg-slate-800/50 border border-slate-700">
                                <div class="text-xs text-slate-400 mb-1">Total</div>
                                <div class="text-lg font-bold text-indigo-400">10,000</div>
                            </div>
                            <div class="p-3 rounded-xl bg-slate-800/50 border border-slate-700">
                                <div class="text-xs text-slate-400 mb-1">Churn</div>
                                <div class="text-lg font-bold text-red-400">2,037</div>
                            </div>
                            <div class="p-3 rounded-xl bg-slate-800/50 border border-slate-700">
                                <div class="text-xs text-slate-400 mb-1">Setia</div>
                                <div class="text-lg font-bold text-emerald-400">7,963</div>
                            </div>
                            <div class="p-3 rounded-xl bg-slate-800/50 border border-slate-700">
                                <div class="text-xs text-slate-400 mb-1">Rate</div>
                                <div class="text-lg font-bold text-amber-400">20.4%</div>
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-3">
                            <div class="p-3 rounded-xl bg-slate-800/50 border border-slate-700">
                                <div class="text-xs text-slate-400 mb-2">Churn per Negara</div>
                                <div class="space-y-2">
                                    <div>
                                        <div class="flex justify-between text-xs mb-1">
                                            <span class="text-slate-300">France</span>
                                            <span class="font-semibold text-slate-300">16.2%</span>
                                        </div>
                                        <div class="h-1.5 rounded-full bg-slate-700">
                                            <div class="h-1.5 rounded-full bg-indigo-500" style="width: 16.2%"></div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="flex justify-between text-xs mb-1">
                                            <span class="text-slate-300">Germany</span>
                                            <span class="font-semibold text-red-400">32.4%</span>
                                        </div>
                                        <div class="h-1.5 rounded-full bg-slate-700">
                                            <div class="h-1.5 rounded-full bg-red-500" style="width: 32.4%"></div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="flex justify-between text-xs mb-1">
                                            <span class="text-slate-300">Spain</span>
                                            <span class="font-semibold text-slate-300">16.5%</span>
                                        </div>
                                        <div class="h-1.5 rounded-full bg-slate-700">
                                            <div class="h-1.5 rounded-full bg-sky-500" style="width: 16.5%"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="p-3 rounded-xl bg-slate-800/50 border border-slate-700">
                                <div class="text-xs text-slate-400 mb-2">Model Terbaik</div>
                                <div class="flex items-center gap-2 mb-2">
                                    <div class="w-8 h-8 rounded-lg bg-gradient-to-br from-emerald-500 to-green-500 flex items-center justify-center">
                                        <span class="text-xs font-bold text-white">RF</span>
                                    </div>
                                    <div>
                                        <div class="text-sm font-semibold text-slate-200">Random Forest</div>
                                        <div class="text-xs text-slate-400">F1: 63.2%</div>
                                    </div>
                                </div>
                                <div class="space-y-1.5">
                                    <div class="h-1.5 rounded-full bg-slate-700">
                                        <div class="h-1.5 rounded-full bg-emerald-500" style="width: 84.2%"></div>
                                    </div>
                                    <div class="h-1.5 rounded-full bg-slate-700">
                                        <div class="h-1.5 rounded-full bg-emerald-500" style="width: 60.3%"></div>
                                    </div>
                                    <div class="h-1.5 rounded-full bg-slate-700">
                                        <div class="h-1.5 rounded-full bg-emerald-500" style="width: 66.3%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="absolute -top-4 -right-4 w-20 h-20 bg-gradient-to-br from-indigo-500 to-sky-500 rounded-2xl opacity-20 blur-xl"></div>
                <div class="absolute -bottom-4 -left-4 w-24 h-24 bg-gradient-to-br from-emerald-500 to-cyan-500 rounded-2xl opacity-20 blur-xl"></div>
            </div>
        </div>
    </div>
</section>

<section id="problem" class="py-24 bg-slate-50 dark:bg-slate-800/50">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-16">
            <span data-aos="fade-up" class="inline-block px-4 py-1.5 rounded-full bg-red-500/10 text-red-500 text-sm font-semibold mb-4">Latar Belakang</span>
            <h2 data-aos="fade-up" data-aos-delay="100" class="font-display text-4xl md:text-5xl font-bold mb-4 text-slate-900 dark:text-white">
                Mengapa Keputusan <span class="gradient-text">Sering Gagal?</span>
            </h2>
            <p data-aos="fade-up" data-aos-delay="200" class="text-lg text-slate-600 dark:text-slate-400 max-w-2xl mx-auto">
                Industri perbankan menghadapi biaya akuisisi nasabah baru yang jauh lebih tinggi dibanding mempertahankan nasabah lama.
            </p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div data-aos="fade-up" data-aos-delay="100" class="p-6 rounded-2xl bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 card-hover">
                <div class="w-12 h-12 rounded-xl bg-red-500/10 flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L4.082 16.5c-.77.833.192 2.5 1.732 2.5z"/>
                    </svg>
                </div>
                <h3 class="font-display font-semibold text-lg mb-2 text-slate-900 dark:text-white">Asumsi yang Salah</h3>
                <p class="text-sm text-slate-600 dark:text-slate-400">Keputusan dibangun dari intuisi manajemen, bukan bukti empiris dari pola data nasabah.</p>
            </div>

            <div data-aos="fade-up" data-aos-delay="200" class="p-6 rounded-2xl bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 card-hover">
                <div class="w-12 h-12 rounded-xl bg-amber-500/10 flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                    </svg>
                </div>
                <h3 class="font-display font-semibold text-lg mb-2 text-slate-900 dark:text-white">Perubahan Perilaku</h3>
                <p class="text-sm text-slate-600 dark:text-slate-400">Preferensi dan loyalitas nasabah terus bergeser sehingga keputusan yang dahulu tepat menjadi usang.</p>
            </div>

            <div data-aos="fade-up" data-aos-delay="300" class="p-6 rounded-2xl bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 card-hover">
                <div class="w-12 h-12 rounded-xl bg-blue-500/10 flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <h3 class="font-display font-semibold text-lg mb-2 text-slate-900 dark:text-white">Keterbatasan Sumber Daya</h3>
                <p class="text-sm text-slate-600 dark:text-slate-400">Anggaran retensi terbatas dan harus diarahkan pada segmen berisiko tinggi, bukan disebar merata.</p>
            </div>

            <div data-aos="fade-up" data-aos-delay="400" class="p-6 rounded-2xl bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 card-hover">
                <div class="w-12 h-12 rounded-xl bg-purple-500/10 flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                    </svg>
                </div>
                <h3 class="font-display font-semibold text-lg mb-2 text-slate-900 dark:text-white">Minim Validasi Data</h3>
                <p class="text-sm text-slate-600 dark:text-slate-400">Tanpa pengujian model dan metrik yang jelas, dampak keputusan tidak terukur dan sulit dipertanggungjawabkan.</p>
            </div>
        </div>
    </div>
</section>

<section id="features" class="py-24 bg-white dark:bg-slate-900">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-16">
            <span data-aos="fade-up" class="inline-block px-4 py-1.5 rounded-full bg-sky-500/10 text-sky-500 text-sm font-semibold mb-4">Fitur Dashboard</span>
            <h2 data-aos="fade-up" data-aos-delay="100" class="font-display text-4xl md:text-5xl font-bold mb-4 text-slate-900 dark:text-white">
                Eksplorasi Data <span class="gradient-text">Secara Mandiri</span>
            </h2>
            <p data-aos="fade-up" data-aos-delay="200" class="text-lg text-slate-600 dark:text-slate-400 max-w-2xl mx-auto">
                Dashboard interaktif yang memungkinkan manajemen mengeksplorasi data dan insight secara real-time.
            </p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div data-aos="zoom-in" data-aos-delay="100" class="group p-6 rounded-2xl bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 card-hover">
                <div class="w-14 h-14 rounded-2xl gradient-bg flex items-center justify-center mb-5 group-hover:scale-110 transition-transform">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/>
                    </svg>
                </div>
                <h3 class="font-display font-semibold text-lg mb-2 text-slate-900 dark:text-white">Ringkasan KPI</h3>
                <p class="text-sm text-slate-600 dark:text-slate-400">Total nasabah, churn rate, dan metrik kunci dalam kartu ringkas.</p>
            </div>

            <div data-aos="zoom-in" data-aos-delay="200" class="group p-6 rounded-2xl bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 card-hover">
                <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-sky-500 to-cyan-500 flex items-center justify-center mb-5 group-hover:scale-110 transition-transform">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                </div>
                <h3 class="font-display font-semibold text-lg mb-2 text-slate-900 dark:text-white">Analisis Demografis</h3>
                <p class="text-sm text-slate-600 dark:text-slate-400">Distribusi churn per geografi, usia, dan gender dengan filter interaktif.</p>
            </div>

            <div data-aos="zoom-in" data-aos-delay="300" class="group p-6 rounded-2xl bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 card-hover">
                <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-amber-500 to-orange-500 flex items-center justify-center mb-5 group-hover:scale-110 transition-transform">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                    </svg>
                </div>
                <h3 class="font-display font-semibold text-lg mb-2 text-slate-900 dark:text-white">Analisis Perilaku</h3>
                <p class="text-sm text-slate-600 dark:text-slate-400">Churn terhadap keaktifan, kepemilikan produk, dan kartu kredit.</p>
            </div>

            <div data-aos="zoom-in" data-aos-delay="400" class="group p-6 rounded-2xl bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 card-hover">
                <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-emerald-500 to-green-500 flex items-center justify-center mb-5 group-hover:scale-110 transition-transform">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.394 3.394 0 0014 15.449V17a1 1 0 01-1 1h-2a1 1 0 01-1-1v-1.551a3.394 3.394 0 00-.457-1.902l-.548-.547z"/>
                    </svg>
                </div>
                <h3 class="font-display font-semibold text-lg mb-2 text-slate-900 dark:text-white">Prediksi Churn</h3>
                <p class="text-sm text-slate-600 dark:text-slate-400">Simulasi prediksi probabilitas churn berdasarkan input data nasabah.</p>
            </div>
        </div>
    </div>
</section>

<section id="methodology" class="py-24 bg-slate-50 dark:bg-slate-800/50">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-16">
            <span data-aos="fade-up" class="inline-block px-4 py-1.5 rounded-full bg-emerald-500/10 text-emerald-500 text-sm font-semibold mb-4">Metodologi</span>
            <h2 data-aos="fade-up" data-aos-delay="100" class="font-display text-4xl md:text-5xl font-bold mb-4 text-slate-900 dark:text-white">
                Alur Kerja <span class="gradient-text">Terstruktur</span>
            </h2>
            <p data-aos="fade-up" data-aos-delay="200" class="text-lg text-slate-600 dark:text-slate-400 max-w-2xl mx-auto">
                Dari data mentah hingga rekomendasi keputusan bisnis yang konkret dan terukur.
            </p>
        </div>

        <div class="relative">
            <div class="hidden lg:block absolute top-1/2 left-0 right-0 h-0.5 bg-gradient-to-r from-indigo-500 via-sky-500 to-emerald-500 -translate-y-1/2"></div>

            <div class="grid lg:grid-cols-5 gap-8">
                <div data-aos="fade-up" data-aos-delay="100" class="relative text-center">
                    <div class="w-16 h-16 rounded-2xl gradient-bg flex items-center justify-center mx-auto mb-4 relative z-10 shadow-lg shadow-indigo-500/30">
                        <span class="text-2xl font-bold text-white">1</span>
                    </div>
                    <h3 class="font-display font-semibold text-lg mb-2 text-slate-900 dark:text-white">Pengumpulan Data</h3>
                    <p class="text-sm text-slate-600 dark:text-slate-400">Memuat dataset Bank Churn dari Kaggle (10.000 nasabah).</p>
                </div>

                <div data-aos="fade-up" data-aos-delay="200" class="relative text-center">
                    <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-sky-500 to-cyan-500 flex items-center justify-center mx-auto mb-4 relative z-10 shadow-lg shadow-sky-500/30">
                        <span class="text-2xl font-bold text-white">2</span>
                    </div>
                    <h3 class="font-display font-semibold text-lg mb-2 text-slate-900 dark:text-white">Preprocessing</h3>
                    <p class="text-sm text-slate-600 dark:text-slate-400">Encoding kategorikal dan scaling variabel numerik.</p>
                </div>

                <div data-aos="fade-up" data-aos-delay="300" class="relative text-center">
                    <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-amber-500 to-orange-500 flex items-center justify-center mx-auto mb-4 relative z-10 shadow-lg shadow-amber-500/30">
                        <span class="text-2xl font-bold text-white">3</span>
                    </div>
                    <h3 class="font-display font-semibold text-lg mb-2 text-slate-900 dark:text-white">Eksplorasi Data</h3>
                    <p class="text-sm text-slate-600 dark:text-slate-400">Analisis pola churn berdasarkan geografi, usia, dan perilaku.</p>
                </div>

                <div data-aos="fade-up" data-aos-delay="400" class="relative text-center">
                    <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-purple-500 to-pink-500 flex items-center justify-center mx-auto mb-4 relative z-10 shadow-lg shadow-purple-500/30">
                        <span class="text-2xl font-bold text-white">4</span>
                    </div>
                    <h3 class="font-display font-semibold text-lg mb-2 text-slate-900 dark:text-white">Pemodelan</h3>
                    <p class="text-sm text-slate-600 dark:text-slate-400">Melatih 3 model dan evaluasi dengan 4 metrik.</p>
                </div>

                <div data-aos="fade-up" data-aos-delay="500" class="relative text-center">
                    <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-emerald-500 to-green-500 flex items-center justify-center mx-auto mb-4 relative z-10 shadow-lg shadow-emerald-500/30">
                        <span class="text-2xl font-bold text-white">5</span>
                    </div>
                    <h3 class="font-display font-semibold text-lg mb-2 text-slate-900 dark:text-white">Rekomendasi</h3>
                    <p class="text-sm text-slate-600 dark:text-slate-400">Menerjemahkan hasil model menjadi aksi bisnis konkret.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="team" class="py-24 bg-white dark:bg-slate-900">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-16">
            <span data-aos="fade-up" class="inline-block px-4 py-1.5 rounded-full bg-indigo-500/10 text-indigo-500 text-sm font-semibold mb-4">Tim Kami</span>
            <h2 data-aos="fade-up" data-aos-delay="100" class="font-display text-4xl md:text-5xl font-bold mb-4 text-slate-900 dark:text-white">
                Kelompok <span class="gradient-text">1</span>
            </h2>
            <p data-aos="fade-up" data-aos-delay="200" class="text-lg text-slate-600 dark:text-slate-400">
                Analisis Keputusan Bisnis
            </p>
        </div>

        <div class="grid md:grid-cols-3 lg:grid-cols-5 gap-6">
            <div data-aos="flip-up" data-aos-delay="100" class="text-center p-6 rounded-2xl bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 card-hover">
                <div class="w-20 h-20 rounded-full gradient-bg flex items-center justify-center mx-auto mb-4 text-3xl font-bold text-white">A</div>
                <h3 class="font-display font-semibold text-slate-900 dark:text-white">Sahrul Adicandra E.</h3>
                <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">164231013</p>
                <span class="inline-block mt-3 px-3 py-1 rounded-full bg-indigo-500/10 text-indigo-500 text-xs font-semibold">Anggota</span>
            </div>

            <div data-aos="flip-up" data-aos-delay="200" class="text-center p-6 rounded-2xl bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 card-hover">
                <div class="w-20 h-20 rounded-full bg-gradient-to-br from-sky-500 to-cyan-500 flex items-center justify-center mx-auto mb-4 text-3xl font-bold text-white">R</div>
                <h3 class="font-display font-semibold text-slate-900 dark:text-white">Raihan Naufal S.</h3>
                <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">164231107</p>
                <span class="inline-block mt-3 px-3 py-1 rounded-full bg-sky-500/10 text-sky-500 text-xs font-semibold">Anggota</span>
            </div>

            <div data-aos="flip-up" data-aos-delay="300" class="text-center p-6 rounded-2xl bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 card-hover">
                <div class="w-20 h-20 rounded-full bg-gradient-to-br from-amber-500 to-orange-500 flex items-center justify-center mx-auto mb-4 text-3xl font-bold text-white">A</div>
                <h3 class="font-display font-semibold text-slate-900 dark:text-white">Aflah Zein J.</h3>
                <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">164231085</p>
                <span class="inline-block mt-3 px-3 py-1 rounded-full bg-amber-500/10 text-amber-500 text-xs font-semibold">Anggota</span>
            </div>

            <div data-aos="flip-up" data-aos-delay="400" class="text-center p-6 rounded-2xl bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 card-hover">
                <div class="w-20 h-20 rounded-full bg-gradient-to-br from-emerald-500 to-green-500 flex items-center justify-center mx-auto mb-4 text-3xl font-bold text-white">I</div>
                <h3 class="font-display font-semibold text-slate-900 dark:text-white">Muhammad Ilham G.</h3>
                <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">164231089</p>
                <span class="inline-block mt-3 px-3 py-1 rounded-full bg-emerald-500/10 text-emerald-500 text-xs font-semibold">Anggota</span>
            </div>

            <div data-aos="flip-up" data-aos-delay="500" class="text-center p-6 rounded-2xl bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 card-hover">
                <div class="w-20 h-20 rounded-full bg-gradient-to-br from-purple-500 to-pink-500 flex items-center justify-center mx-auto mb-4 text-3xl font-bold text-white">F</div>
                <h3 class="font-display font-semibold text-slate-900 dark:text-white">M. Faizal Aprilianto</h3>
                <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">164231095</p>
                <span class="inline-block mt-3 px-3 py-1 rounded-full bg-purple-500/10 text-purple-500 text-xs font-semibold">Anggota</span>
            </div>
        </div>
    </div>
</section>

<section class="py-24 bg-slate-50 dark:bg-slate-800/50">
    <div class="max-w-4xl mx-auto px-6 text-center">
        <h2 data-aos="fade-up" class="font-display text-4xl md:text-5xl font-bold mb-6 text-slate-900 dark:text-white">
            Siap Mengeksplorasi <span class="gradient-text">Data?</span>
        </h2>
        <p data-aos="fade-up" data-aos-delay="100" class="text-lg text-slate-600 dark:text-slate-400 mb-10">
            Buka dashboard interaktif untuk melihat analisis mendalam tentang churn nasabah dan prediksi model.
        </p>
        <div data-aos="fade-up" data-aos-delay="200" class="flex flex-col sm:flex-row items-center justify-center gap-4">
            <a href="{{ route('dashboard.index') }}" class="px-8 py-4 rounded-xl gradient-bg text-white font-semibold text-lg hover:opacity-90 transition-all shadow-2xl shadow-indigo-500/30 hover:shadow-indigo-500/50 hover:-translate-y-1">
                Buka Dashboard Sekarang
                <svg class="inline w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                </svg>
            </a>
            <a href="{{ route('dashboard.predict') }}" class="px-8 py-4 rounded-xl border-2 border-slate-300 dark:border-slate-600 text-slate-700 dark:text-slate-300 font-semibold text-lg hover:bg-white dark:hover:bg-slate-800 transition-all hover:-translate-y-1">
                Coba Prediksi Churn
            </a>
        </div>
    </div>
</section>

<footer class="py-12 bg-slate-900 border-t border-slate-800">
    <div class="max-w-7xl mx-auto px-6">
        <div class="flex flex-col md:flex-row items-center justify-between gap-6">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl gradient-bg flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                    </svg>
                </div>
                <div>
                    <span class="font-display font-bold text-lg text-white">ChurnShield</span>
                    <p class="text-sm text-slate-400">Analisis Keputusan Bisnis - Kelompok 1</p>
                </div>
            </div>
            <div class="flex items-center gap-6 text-sm text-slate-400">
                <span>Bank Churn Dataset (Kaggle)</span>
                <span>|</span>
                <span>10.000 Nasabah</span>
                <span>|</span>
                <span>2026</span>
            </div>
        </div>
    </div>
</footer>
@endsection
