# Dataset Bank Churn

## Sumber Resmi

Dataset yang digunakan adalah **Bank Churn Dataset** dari Kaggle:

🔗 **URL:** https://www.kaggle.com/datasets/shubh0799/churn-modelling

## Cara Mendapatkan Dataset

### Opsi 1: Download Otomatis (Direkomendasikan)

1. Login ke akun Kaggle di https://www.kaggle.com
2. Buka halaman dataset: https://www.kaggle.com/datasets/shubh0799/churn-modelling
3. Klik tombol **Download** atau buat API token
4. Simpan file API token (`kaggle.json`) di:
   - **Windows:** `C:\Users\<username>\.kaggle\kaggle.json`
   - **Linux/Mac:** `~/.kaggle/kaggle.json`
5. Jalankan script downloader:
   ```bash
   python python/download_kaggle.py
   ```

### Opsi 2: Download Manual

1. Download dataset dari Kaggle
2. Ekstrak file ZIP
3. Rename file `Churn_Modelling.csv` menjadi `bank_churn.csv`
4. Pindahkan ke folder ini: `dataset/bank_churn.csv`

## Struktur Dataset

Dataset ini terdiri dari **10.000 baris** data nasabah bank dengan variabel:

| Kolom | Deskripsi |
|-------|-----------|
| RowNumber | Nomor urut |
| CustomerId | ID unik nasabah |
| Surname | Nama belakang |
| CreditScore | Skor kredit (350-850) |
| Geography | Negara (France, Germany, Spain) |
| Gender | Jenis kelamin (Male, Female) |
| Age | Usia nasabah |
| Tenure | Lama menjadi nasabah (tahun) |
| Balance | Saldo rekening |
| NumOfProducts | Jumlah produk bank |
| HasCrCard | Memiliki kartu kredit (1=Ya, 0=Tidak) |
| IsActiveMember | Status keaktifan (1=Aktif, 0=Tidak) |
| EstimatedSalary | Estimasi gaji tahunan |
| **Exited** | **Target: 1=Churn, 0=Setia** |

## Catatan

File `bank_churn.csv` tidak di-commit ke GitHub karena ukurannya besar dan merupakan data pihak ketiga. Pastikan untuk mendownload dataset setelah clone repository.
