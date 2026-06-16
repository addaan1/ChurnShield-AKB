@extends('layouts.dashboard')

@section('title', 'Tentang Tim')
@section('page-title', 'Tentang Tim')

@section('content')
<div class="space-y-6">
    <div class="p-6 rounded-2xl bg-gradient-to-br from-indigo-50 to-sky-50 dark:from-indigo-500/10 dark:to-sky-500/10 border border-indigo-500/20">
        <div class="flex items-center gap-4">
            <div class="w-14 h-14 rounded-2xl gradient-bg flex items-center justify-center flex-shrink-0">
                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                </svg>
            </div>
            <div>
                <h3 class="font-display font-semibold text-lg">Kelompok 1 - Analisis Keputusan Bisnis</h3>
                <p class="text-sm text-slate-500 dark:text-slate-400">Strategi Retensi Nasabah Bank: Prediksi Customer Churn dengan Pemodelan Multivariat</p>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <div class="p-6 rounded-2xl bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 card-hover text-center">
            <div class="w-24 h-24 rounded-full gradient-bg flex items-center justify-center mx-auto mb-4 text-4xl font-bold text-white">A</div>
            <h3 class="font-display font-semibold text-lg">Sahrul Adicandra Effendy</h3>
            <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">164231013</p>
            <span class="inline-block mt-3 px-4 py-1.5 rounded-full bg-indigo-500/10 text-indigo-500 text-xs font-semibold">Anggota</span>
        </div>

        <div class="p-6 rounded-2xl bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 card-hover text-center">
            <div class="w-24 h-24 rounded-full bg-gradient-to-br from-sky-500 to-cyan-500 flex items-center justify-center mx-auto mb-4 text-4xl font-bold text-white">R</div>
            <h3 class="font-display font-semibold text-lg">Raihan Naufal Sauqi</h3>
            <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">164231107</p>
            <span class="inline-block mt-3 px-4 py-1.5 rounded-full bg-sky-500/10 text-sky-500 text-xs font-semibold">Anggota</span>
        </div>

        <div class="p-6 rounded-2xl bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 card-hover text-center">
            <div class="w-24 h-24 rounded-full bg-gradient-to-br from-amber-500 to-orange-500 flex items-center justify-center mx-auto mb-4 text-4xl font-bold text-white">A</div>
            <h3 class="font-display font-semibold text-lg">Aflah Zein Japamel</h3>
            <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">164231085</p>
            <span class="inline-block mt-3 px-4 py-1.5 rounded-full bg-amber-500/10 text-amber-500 text-xs font-semibold">Anggota</span>
        </div>

        <div class="p-6 rounded-2xl bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 card-hover text-center">
            <div class="w-24 h-24 rounded-full bg-gradient-to-br from-emerald-500 to-green-500 flex items-center justify-center mx-auto mb-4 text-4xl font-bold text-white">I</div>
            <h3 class="font-display font-semibold text-lg">Muhammad Ilham Gustami</h3>
            <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">164231089</p>
            <span class="inline-block mt-3 px-4 py-1.5 rounded-full bg-emerald-500/10 text-emerald-500 text-xs font-semibold">Anggota</span>
        </div>

        <div class="p-6 rounded-2xl bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 card-hover text-center">
            <div class="w-24 h-24 rounded-full bg-gradient-to-br from-purple-500 to-pink-500 flex items-center justify-center mx-auto mb-4 text-4xl font-bold text-white">F</div>
            <h3 class="font-display font-semibold text-lg">Mohammad Faizal Aprilianto</h3>
            <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">164231095</p>
            <span class="inline-block mt-3 px-4 py-1.5 rounded-full bg-purple-500/10 text-purple-500 text-xs font-semibold">Anggota</span>
        </div>
    </div>

    <div class="p-6 rounded-2xl bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700">
        <h3 class="font-display font-semibold text-lg mb-4">Tentang Project</h3>
        <div class="grid md:grid-cols-2 gap-6">
            <div>
                <h4 class="font-semibold text-sm text-slate-700 dark:text-slate-300 mb-2">Deskripsi</h4>
                <p class="text-sm text-slate-500 dark:text-slate-400">
                    ChurnShield adalah dashboard web interaktif yang menyajikan hasil analisis keputusan bisnis berbasis data untuk strategi retensi nasabah bank. Project ini menggunakan dataset Bank Churn dari Kaggle yang terdiri dari 10.000 nasabah.
                </p>
            </div>
            <div>
                <h4 class="font-semibold text-sm text-slate-700 dark:text-slate-300 mb-2">Tech Stack</h4>
                <div class="flex flex-wrap gap-2">
                    <span class="px-3 py-1 rounded-full bg-red-500/10 text-red-500 text-xs font-semibold">Laravel</span>
                    <span class="px-3 py-1 rounded-full bg-sky-500/10 text-sky-500 text-xs font-semibold">Tailwind CSS</span>
                    <span class="px-3 py-1 rounded-full bg-indigo-500/10 text-indigo-500 text-xs font-semibold">ApexCharts</span>
                    <span class="px-3 py-1 rounded-full bg-emerald-500/10 text-emerald-500 text-xs font-semibold">AOS</span>
                    <span class="px-3 py-1 rounded-full bg-amber-500/10 text-amber-500 text-xs font-semibold">Vite</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
