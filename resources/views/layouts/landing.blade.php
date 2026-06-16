<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="ChurnShield - Dashboard Analisis Keputusan Bisnis untuk Prediksi Customer Churn Perbankan">
    <title>@yield('title', 'ChurnShield') - Strategi Retensi Nasabah Bank</title>
    <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='%236366F1'%3E%3Cpath d='M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5'/%3E%3C/svg%3E">
    <script>
        (function() {
            const stored = localStorage.getItem('darkMode');
            const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
            const isDark = stored === null ? prefersDark : stored !== 'false';
            if (isDark) document.documentElement.classList.add('dark');
        })();
    </script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>
<body class="bg-white dark:bg-slate-900 text-slate-900 dark:text-white transition-colors duration-300">
    @yield('content')
    @stack('scripts')
</body>
</html>
