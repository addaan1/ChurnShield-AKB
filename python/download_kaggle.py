"""
Download dataset Bank Churn asli dari Kaggle.

Cara penggunaan:
1. Install kagglehub: pip install kagglehub
2. Pastikan kamu sudah login ke Kaggle:
   - Buka https://www.kaggle.com dan login
   - Klik profile → Account → Create New API Token
   - Simpan kaggle.json di ~/.kaggle/kaggle.json (Windows: C:\Users\<user>\.kaggle\kaggle.json)
3. Jalankan: python python/download_kaggle.py

Alternatif manual:
- Download langsung dari: https://www.kaggle.com/datasets/shubh0799/churn-modelling
- Ekstrak dan simpan file Churn_Modelling.csv sebagai dataset/bank_churn.csv
"""

import os
import shutil
import sys

try:
    import kagglehub
except ImportError:
    print("ERROR: kagglehub belum terinstall.")
    print("Jalankan: pip install kagglehub")
    sys.exit(1)

print("Mendownload dataset Bank Churn dari Kaggle...")
print("Pastikan kamu sudah login ke Kaggle (lihat petunjuk di file ini).")

try:
    path = kagglehub.dataset_download("shubh0799/churn-modelling")
    print(f"Dataset downloaded to: {path}")

    base_dir = os.path.dirname(os.path.dirname(os.path.abspath(__file__)))
    dataset_dir = os.path.join(base_dir, 'dataset')
    target_path = os.path.join(dataset_dir, 'bank_churn.csv')

    os.makedirs(dataset_dir, exist_ok=True)

    if os.path.isdir(path):
        csv_file = os.path.join(path, 'Churn_Modelling.csv')
        if not os.path.exists(csv_file):
            for root, dirs, files in os.walk(path):
                for f in files:
                    if f.lower().endswith('.csv'):
                        csv_file = os.path.join(root, f)
                        break
    else:
        csv_file = path

    shutil.copy2(csv_file, target_path)
    print(f"Dataset disalin ke: {target_path}")
    print("\nSekarang jalankan: python python/analysis.py")

except Exception as e:
    print(f"ERROR: {e}")
    print("\nKemungkinan penyebab:")
    print("1. Belum login ke Kaggle")
    print("2. Tidak ada koneksi internet")
    print("\nCoba download manual dari:")
    print("https://www.kaggle.com/datasets/shubh0799/churn-modelling")
    print("Lalu simpan sebagai dataset/bank_churn.csv")
    sys.exit(1)
