"""
ChurnShield - Analisis Data & Pemodelan
Script untuk EDA, training model, dan export hasil ke JSON
"""

import pandas as pd
import numpy as np
import json
import os
from sklearn.model_selection import train_test_split
from sklearn.preprocessing import StandardScaler, LabelEncoder
from sklearn.linear_model import LogisticRegression
from sklearn.ensemble import RandomForestClassifier
from sklearn.metrics import accuracy_score, precision_score, recall_score, f1_score, confusion_matrix

try:
    from xgboost import XGBClassifier
    HAS_XGBOOST = True
except ImportError:
    HAS_XGBOOST = False
    print("Warning: xgboost not installed. Install with: pip install xgboost")

BASE_DIR = os.path.dirname(os.path.dirname(os.path.abspath(__file__)))
DATASET_PATH = os.path.join(BASE_DIR, 'dataset', 'bank_churn.csv')
OUTPUT_DIR = os.path.join(BASE_DIR, 'public', 'data')

os.makedirs(OUTPUT_DIR, exist_ok=True)


def load_data():
    """Load dataset dari CSV"""
    print("Loading dataset...")
    df = pd.read_csv(DATASET_PATH)
    print(f"Dataset loaded: {df.shape[0]} rows, {df.shape[1]} columns")
    print(f"Columns: {list(df.columns)}")
    return df


def preprocess_data(df):
    """Preprocessing data"""
    print("\nPreprocessing data...")

    df_clean = df.copy()

    drop_cols = ['Surname', 'CustomerId', 'RowNumber']
    for col in drop_cols:
        if col in df_clean.columns:
            df_clean = df_clean.drop(col, axis=1)

    le_gender = LabelEncoder()
    df_clean['Gender'] = le_gender.fit_transform(df_clean['Gender'])

    le_geo = LabelEncoder()
    df_clean['Geography'] = le_geo.fit_transform(df_clean['Geography'])

    X = df_clean.drop('Exited', axis=1)
    y = df_clean['Exited']

    return X, y, le_geo, le_gender


def eda_analysis(df):
    """Exploratory Data Analysis"""
    print("\n" + "="*60)
    print("EXPLORATORY DATA ANALYSIS")
    print("="*60)

    total = len(df)
    churn = int(df['Exited'].sum())
    loyal = total - churn
    churn_rate = round((churn / total) * 100, 1)

    print(f"\nTotal Nasabah: {total}")
    print(f"Nasabah Churn: {churn}")
    print(f"Nasabah Setia: {loyal}")
    print(f"Churn Rate: {churn_rate}%")

    geography_stats = {}
    for geo in sorted(df['Geography'].unique()):
        subset = df[df['Geography'] == geo]
        geo_total = len(subset)
        geo_churn = int(subset['Exited'].sum())
        geo_rate = round((geo_churn / geo_total) * 100, 1)
        geography_stats[geo] = {
            'total': geo_total,
            'churn': geo_churn,
            'rate': geo_rate
        }
        print(f"  {geo}: {geo_total} nasabah, {geo_churn} churn ({geo_rate}%)")

    age_groups = {
        '18-29': (18, 29),
        '30-39': (30, 39),
        '40-49': (40, 49),
        '50-59': (50, 59),
        '60+': (60, 100)
    }
    age_stats = {}
    for label, (min_age, max_age) in age_groups.items():
        subset = df[(df['Age'] >= min_age) & (df['Age'] <= max_age)]
        age_total = len(subset)
        age_churn = int(subset['Exited'].sum())
        age_rate = round((age_churn / age_total) * 100, 1) if age_total > 0 else 0
        age_stats[label] = {
            'total': age_total,
            'churn': age_churn,
            'rate': age_rate
        }
        print(f"  Usia {label}: {age_total} nasabah, {age_churn} churn ({age_rate}%)")

    gender_stats = {}
    for gender in sorted(df['Gender'].unique()):
        subset = df[df['Gender'] == gender]
        gen_total = len(subset)
        gen_churn = int(subset['Exited'].sum())
        gen_rate = round((gen_churn / gen_total) * 100, 1)
        gender_stats[gender] = {
            'total': gen_total,
            'churn': gen_churn,
            'rate': gen_rate
        }
        print(f"  {gender}: {gen_total} nasabah, {gen_churn} churn ({gen_rate}%)")

    activity_stats = {}
    for active in sorted(df['IsActiveMember'].unique()):
        label = 'Active' if active == 1 else 'Inactive'
        subset = df[df['IsActiveMember'] == active]
        act_total = len(subset)
        act_churn = int(subset['Exited'].sum())
        act_rate = round((act_churn / act_total) * 100, 1)
        activity_stats[label] = {
            'total': act_total,
            'churn': act_churn,
            'rate': act_rate
        }
        print(f"  {label}: {act_total} nasabah, {act_churn} churn ({act_rate}%)")

    product_stats = {}
    for prod in sorted(df['NumOfProducts'].unique()):
        subset = df[df['NumOfProducts'] == prod]
        prod_total = len(subset)
        prod_churn = int(subset['Exited'].sum())
        prod_rate = round((prod_churn / prod_total) * 100, 1)
        product_stats[str(prod)] = {
            'total': prod_total,
            'churn': prod_churn,
            'rate': prod_rate
        }
        print(f"  {prod} Produk: {prod_total} nasabah, {prod_churn} churn ({prod_rate}%)")

    credit_card_stats = {}
    for cc in sorted(df['HasCrCard'].unique()):
        label = 'Yes' if cc == 1 else 'No'
        subset = df[df['HasCrCard'] == cc]
        cc_total = len(subset)
        cc_churn = int(subset['Exited'].sum())
        cc_rate = round((cc_churn / cc_total) * 100, 1)
        credit_card_stats[label] = {
            'total': cc_total,
            'churn': cc_churn,
            'rate': cc_rate
        }

    eda_data = {
        'overview': {
            'totalNasabah': total,
            'nasabahChurn': churn,
            'nasabahSetia': loyal,
            'churnRate': churn_rate
        },
        'geography': geography_stats,
        'ageGroups': age_stats,
        'gender': gender_stats,
        'activity': activity_stats,
        'products': product_stats,
        'creditCard': credit_card_stats
    }

    eda_path = os.path.join(OUTPUT_DIR, 'eda_results.json')
    with open(eda_path, 'w') as f:
        json.dump(eda_data, f, indent=2)
    print(f"\nEDA results saved to: {eda_path}")

    return eda_data


def train_models(df):
    """Train 3 model klasifikasi dan export weights"""
    print("\n" + "="*60)
    print("MODEL TRAINING")
    print("="*60)

    X, y, le_geo, le_gender = preprocess_data(df)

    X_train, X_test, y_train, y_test = train_test_split(
        X, y, test_size=0.2, random_state=42, stratify=y
    )

    scaler = StandardScaler()
    X_train_scaled = scaler.fit_transform(X_train)
    X_test_scaled = scaler.transform(X_test)

    print(f"\nTraining set: {X_train.shape[0]} samples")
    print(f"Test set: {X_test.shape[0]} samples")
    print(f"Features: {list(X.columns)}")

    models = {}

    print("\n1. Training Logistic Regression...")
    lr = LogisticRegression(random_state=42, max_iter=1000, class_weight='balanced')
    lr.fit(X_train_scaled, y_train)
    models['Logistic Regression'] = lr

    print("2. Training Random Forest...")
    rf = RandomForestClassifier(n_estimators=200, max_depth=10, random_state=42, class_weight='balanced')
    rf.fit(X_train, y_train)
    models['Random Forest'] = rf

    if HAS_XGBOOST:
        print("3. Training XGBoost...")
        scale_pos = (y_train == 0).sum() / max((y_train == 1).sum(), 1)
        xgb = XGBClassifier(
            n_estimators=200,
            max_depth=6,
            learning_rate=0.1,
            random_state=42,
            scale_pos_weight=scale_pos,
            eval_metric='logloss'
        )
        xgb.fit(X_train, y_train)
        models['XGBoost'] = xgb

    results = {}
    for name, model in models.items():
        if name == 'Logistic Regression':
            y_pred = model.predict(X_test_scaled)
            y_proba = model.predict_proba(X_test_scaled)[:, 1]
        else:
            y_pred = model.predict(X_test)
            y_proba = model.predict_proba(X_test)[:, 1]

        acc = round(accuracy_score(y_test, y_pred) * 100, 1)
        prec = round(precision_score(y_test, y_pred) * 100, 1)
        rec = round(recall_score(y_test, y_pred) * 100, 1)
        f1 = round(f1_score(y_test, y_pred) * 100, 1)
        cm = confusion_matrix(y_test, y_pred)

        results[name] = {
            'accuracy': acc,
            'precision': prec,
            'recall': rec,
            'f1': f1,
            'confusion_matrix': cm.tolist()
        }

        print(f"\n{name}:")
        print(f"  Accuracy:  {acc}%")
        print(f"  Precision: {prec}%")
        print(f"  Recall:    {rec}%")
        print(f"  F1-Score:  {f1}%")

    best_model = max(results.items(), key=lambda x: x[1]['f1'])
    print(f"\nBest model: {best_model[0]} (F1-Score: {best_model[1]['f1']}%)")

    model_data = {
        'models': results,
        'bestModel': best_model[0],
        'feature_names': X.columns.tolist(),
        'train_size': int(X_train.shape[0]),
        'test_size': int(X_test.shape[0])
    }

    model_path = os.path.join(OUTPUT_DIR, 'model_results.json')
    with open(model_path, 'w') as f:
        json.dump(model_data, f, indent=2)
    print(f"\nModel results saved to: {model_path}")

    print("\nExporting model weights for PHP prediction...")
    feature_names = X.columns.tolist()

    scaler_data = {
        'mean': scaler.mean_.tolist(),
        'scale': scaler.scale_.tolist(),
    }

    lr_weights = {
        'coefficients': lr.coef_[0].tolist(),
        'intercept': float(lr.intercept_[0]),
        'feature_names': feature_names,
    }

    rf_importance = {
        'feature_importances': rf.feature_importances_.tolist(),
        'feature_names': feature_names,
    }

    geo_classes = le_geo.classes_.tolist()
    gender_classes = le_gender.classes_.tolist()

    weights_data = {
        'scaler': scaler_data,
        'logistic_regression': lr_weights,
        'random_forest_importance': rf_importance,
        'label_encoders': {
            'geography': geo_classes,
            'gender': gender_classes,
        },
        'feature_names': feature_names,
    }

    weights_path = os.path.join(OUTPUT_DIR, 'model_weights.json')
    with open(weights_path, 'w') as f:
        json.dump(weights_data, f, indent=2)
    print(f"Model weights saved to: {weights_path}")

    return model_data


def main():
    print("="*60)
    print("ChurnShield - Analisis Data & Pemodelan")
    print("="*60)

    df = load_data()
    eda_data = eda_analysis(df)
    model_data = train_models(df)

    print("\n" + "="*60)
    print("SELESAI!")
    print("="*60)
    print(f"\nHasil disimpan di: {OUTPUT_DIR}")
    print("  - eda_results.json")
    print("  - model_results.json")
    print("  - model_weights.json")
    print("\nSekarang jalankan: php artisan serve")


if __name__ == '__main__':
    main()
