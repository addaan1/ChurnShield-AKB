<div align="center">

# 🛡️ ChurnShield

### Dashboard Analisis Keputusan Bisnis — Strategi Retensi Nasabah Bank

*Prediksi Customer Churn dengan Pemodelan Multivariat Machine Learning*

---

[![Laravel](https://img.shields.io/badge/Laravel-13-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)](https://laravel.com)
[![Tailwind CSS](https://img.shields.io/badge/Tailwind_CSS-4-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white)](https://tailwindcss.com)
[![Python](https://img.shields.io/badge/Python-3.12-3776AB?style=for-the-badge&logo=python&logoColor=white)](https://python.org)
[![scikit-learn](https://img.shields.io/badge/scikit--learn-1.8-F7931E?style=for-the-badge&logo=scikit-learn&logoColor=white)](https://scikit-learn.org)
[![XGBoost](https://img.shields.io/badge/XGBoost-3.0-00B4D8?style=for-the-badge)](https://xgboost.readthedocs.io)
[![ApexCharts](https://img.shields.io/badge/ApexCharts-5-6366F1?style=for-the-badge)](https://apexcharts.com)
[![Vite](https://img.shields.io/badge/Vite-8-646CFF?style=for-the-badge&logo=vite&logoColor=white)](https://vitejs.dev)
[![License](https://img.shields.io/badge/License-MIT-green?style=for-the-badge)](LICENSE)

</div>

---

## 📋 Daftar Isi

- [Tentang Project](#-tentang-project)
- [Fitur Utama](#-fitur-utama)
- [Tech Stack](#-tech-stack)
- [Dataset](#-dataset)
- [Model Machine Learning](#-model-machine-learning)
- [Temuan Kunci](#-temuan-kunci)
- [Instalasi](#-instalasi)
- [Data Pipeline](#-data-pipeline-python)
- [Struktur Halaman](#-struktur-halaman)
- [Tim](#-tim)
- [Rekomendasi Bisnis](#-rekomendasi-bisnis)

---

## 🎯 Tentang Project

**ChurnShield** adalah dashboard web interaktif yang menyajikan hasil analisis keputusan bisnis berbasis data untuk memprediksi dan mengurangi *customer churn* pada industri perbankan.

Project ini dibangun untuk mata kuliah **Analisis Keputusan Bisnis** dan menggunakan dataset **Bank Churn** yang terdiri dari **10.000 nasabah** dengan berbagai variabel prediktor.

> 💡 **Inti persoalan:** Keputusan retensi perlu divalidasi data agar dugaan berubah menjadi probabilitas churn yang terukur.

---

## ✨ Fitur Utama

### Landing Page
- 🎨 Hero section dengan **dashboard mockup interaktif**
- 🌊 Scroll animations menggunakan **AOS** (Animate On Scroll)
- 🔢 Animated counters untuk statistik kunci
- 📱 Fully responsive design
- 🌙 **Dark/Light mode** toggle (tersimpan di localStorage)

### Dashboard
- 📊 **Overview** — KPI cards, donut chart, bar chart geografi & usia
- 👥 **Analisis Demografis** — Churn per negara, usia, gender + tabel detail
- ⚡ **Analisis Perilaku** — Churn berdasarkan keaktifan, produk, kartu kredit
- 🤖 **Evaluasi Model** — Radar chart, grouped bar, gauge chart perbandingan 3 model ML
- 🔮 **Prediksi Churn** — Form interaktif dengan **real ML prediction** (Logistic Regression weights)

### Fitur Tambahan
- 🌓 Dark/Light mode dengan auto-detect system preference
- 📱 Responsive sidebar navigation
- 🎯 Churn Prediction Calculator dengan rekomendasi otomatis
- 📈 Interactive charts (ApexCharts)

---

## 🛠️ Tech Stack

| Layer | Technology |
|-------|-----------|
| **Backend** | Laravel 13 (PHP 8.4) |
| **Frontend CSS** | Tailwind CSS 4 |
| **Charts** | ApexCharts 5 |
| **Animations** | AOS (Animate On Scroll) |
| **Build Tool** | Vite 8 |
| **Fonts** | Inter + Poppins (Bunny Fonts) |
| **ML Pipeline** | Python 3.12, scikit-learn, XGBoost, pandas, numpy |

---

## 📊 Dataset

- **Sumber:** [Bank Churn Dataset (Kaggle)](https://www.kaggle.com/datasets/shubh0799/churn-modelling)
- **Jumlah Data:** 10.000 nasabah
- **Variabel:** CreditScore, Geography, Gender, Age, Tenure, Balance, NumOfProducts, HasCrCard, IsActiveMember, EstimatedSalary, Exited (target)

| Variabel | Tipe | Deskripsi |
|----------|------|-----------|
| CreditScore | Numerik | Skor kredit nasabah (350-850) |
| Geography | Kategorikal | Negara: France, Spain, Germany |
| Gender | Kategorikal | Male / Female |
| Age | Numerik | Usia nasabah (18-92) |
| Tenure | Numerik | Lama menjadi nasabah (0-10 tahun) |
| Balance | Numerik | Saldo rekening |
| NumOfProducts | Numerik | Jumlah produk yang digunakan (1-4) |
| HasCrCard | Biner | Memiliki kartu kredit (0/1) |
| IsActiveMember | Biner | Status keaktifan (0/1) |
| EstimatedSalary | Numerik | Estimasi gaji tahunan |
| **Exited** | **Target** | **Churn (1) / Setia (0)** |

---

## 🤖 Model Machine Learning

Tiga model klasifikasi dibangun dan dibandingkan:

| Model | Accuracy | Precision | Recall | F1-Score | Deskripsi |
|-------|----------|-----------|--------|----------|-----------|
| Logistic Regression | 70.8% | 38.3% | 71.7% | 50.0% | Baseline, mudah diinterpretasi |
| Random Forest | 84.2% | 60.3% | 66.3% | 63.2% | Ensemble tree, non-linear |
| **Random Forest** | **84.2%** | **60.3%** | **66.3%** | **63.2%** | **Ensemble tree, terbaik** |

> 📌 **Evaluasi:** Seluruh model diuji pada data hold-out 20% menggunakan empat metrik — Accuracy, Precision, Recall, dan F1-Score.

---

## 🔍 Temuan Kunci

| Insight | Detail |
|---------|--------|
| 📉 **Churn Rate** | 20.4% (1 dari 5 nasabah berhenti) |
| 🌍 **Geografi** | Germany churn tertinggi (32.4%), hampir 2x lipat France (16.2%) & Spain (16.7%) |
| 👴 **Usia** | Rata-rata usia nasabah churn 44.8 tahun, puncak di kelompok 50-59 tahun (56.0%) |
| 👩 **Gender** | Perempuan churn 25.1% vs Laki-laki 16.5% |
| 💤 **Keaktifan** | Nasabah tidak aktif churn 26.9% vs aktif 14.3% |
| 📦 **Produk** | 3 produk churn 82.7%, 4 produk churn 100.0% |

---

## 🚀 Instalasi

### Prasyarat
- PHP >= 8.2
- Composer
- Node.js >= 18
- Python >= 3.10
- npm

### Langkah Instalasi

```bash
# 1. Clone repository
git clone https://github.com/addaan1/ChurnShield-AKB.git
cd ChurnShield-AKB

# 2. Install dependencies PHP
composer install

# 3. Install dependencies Node
npm install

# 4. Copy file environment
cp .env.example .env

# 5. Generate application key
php artisan key:generate

# 6. Install Python dependencies
pip install -r python/requirements.txt

# 7. Download dataset Bank Churn dari Kaggle
#    (butuh login Kaggle, lihat petunjuk di dataset/README.md)
python python/download_kaggle.py

# 8. Jalankan EDA + Modelling
python python/analysis.py

# 9. Build frontend assets
npm run build

# 10. Jalankan development server
php artisan serve
```

> ⚠️ **Catatan Dataset:** Dataset `bank_churn.csv` tidak di-commit ke repository karena berasal dari Kaggle. Kamu harus mendownload dataset terlebih dahulu (langkah 7) sebelum menjalankan `analysis.py`.

Buka browser di **http://localhost:8000**

### Untuk Development

```bash
# Terminal 1: Laravel server
php artisan serve

# Terminal 2: Vite dev server (hot reload)
npm run dev
```

---

## 🐍 Data Pipeline (Python)

```
python/
├── download_kaggle.py  # Download dataset asli dari Kaggle
├── analysis.py         # EDA + Training 3 model + Export JSON
└── requirements.txt    # Dependencies Python

dataset/
├── README.md           # Petunjuk download dataset
└── bank_churn.csv      # Dataset dari Kaggle (download manual/otomatis)

public/data/
├── eda_results.json    # Hasil EDA (dibaca Laravel)
├── model_results.json  # Hasil modelling (dibaca Laravel)
└── model_weights.json  # Koefisien model (untuk prediksi real-time)
```

```bash
# Download dataset (butuh login Kaggle)
python python/download_kaggle.py

# Jalankan EDA + Modelling + Export
python python/analysis.py
```

> 💡 Untuk dataset asli Kaggle, download dari [kaggle.com/datasets/shubh0799/churn-modelling](https://www.kaggle.com/datasets/shubh0799/churn-modelling) dan simpan sebagai `dataset/bank_churn.csv`. Lihat petunjuk lengkap di `dataset/README.md`.

---

## 🗂️ Struktur Halaman

| URL | Halaman | Deskripsi |
|-----|---------|-----------|
| `/` | Landing Page | Hero, masalah, fitur, metodologi, tim |
| `/dashboard` | Overview | KPI cards, donut chart, bar chart |
| `/dashboard/demographics` | Demografis | Churn per negara, usia, gender |
| `/dashboard/behavior` | Perilaku | Churn per keaktifan, produk, kartu kredit |
| `/dashboard/models` | Evaluasi Model | Perbandingan 3 model ML |
| `/dashboard/predict` | Prediksi Churn | Simulasi prediksi real-time |
| `/about` | Tentang Tim | Profil anggota kelompok |

---

## 👥 Tim

**Kelompok 1 — Analisis Keputusan Bisnis**

| Nama | NIM |
|------|-----|
| Sahrul Adicandra Effendy | 164231013 |
| Raihan Naufal Sauqi | 164231107 |
| Aflah Zein Japamel | 164231085 |
| Muhammad Ilham Gustami | 164231089 |
| Mohammad Faizal Aprilianto | 164231095 |

---

## 💼 Rekomendasi Bisnis

1. **🎯 Targetkan Segmen Risiko Tinggi** — Prioritaskan nasabah Germany dan usia 50-59 menggunakan skor probabilitas churn dari model XGBoost.

2. **🔄 Reaktivasi Nasabah Pasif** — Jalankan kampanye keterlibatan bagi nasabah tidak aktif yang churn 32.2%, melalui penawaran, notifikasi, dan onboarding ulang.

3. **🤖 Operasionalkan Model Prediktif** — Terapkan XGBoost untuk menghasilkan daftar nasabah berisiko secara berkala agar intervensi retensi tepat sasaran.

4. **💰 Alokasi Sumber Daya Berbasis Risiko** — Distribusikan insentif retensi secara proporsional terhadap nilai nasabah dan probabilitas churn, bukan disebar merata.

5. **📊 Pemantauan Berkelanjutan** — Pantau churn melalui dashboard dan latih ulang model secara periodik mengikuti perubahan perilaku nasabah.

---

## 📄 Lisensi

Project ini dibuat untuk tugas mata kuliah **Analisis Keputusan Bisnis**.

---

<div align="center">

**Dibuat dengan ❤️ oleh Kelompok 1 — Analisis Keputusan Bisnis**

[⬆ Kembali ke atas](#-churnshield)

</div>
