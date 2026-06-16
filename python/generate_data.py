"""
Generate realistic Bank Churn dataset matching Kaggle Churn_Modelling.csv statistics.
Based on documented statistics from: https://www.kaggle.com/datasets/mathchi/churn-modelling
"""

import pandas as pd
import numpy as np
import os

np.random.seed(42)

n = 10000

geo_counts = {'France': 5014, 'Spain': 2477, 'Germany': 2509}
geo_labels = []
for geo, count in geo_counts.items():
    geo_labels.extend([geo] * count)
np.random.shuffle(geo_labels)

gender_counts = {'Male': 5457, 'Female': 4543}
gender_labels = []
for g, count in gender_counts.items():
    gender_labels.extend([g] * count)
np.random.shuffle(gender_labels)

product_counts = {1: 5084, 2: 4590, 3: 266, 4: 60}
product_labels = []
for p, count in product_counts.items():
    product_labels.extend([p] * count)
np.random.shuffle(product_labels)

card_counts = {1: 7055, 0: 2945}
card_labels = []
for c, count in card_counts.items():
    card_labels.extend([c] * count)
np.random.shuffle(card_labels)

active_counts = {1: 5154, 0: 4846}
active_labels = []
for a, count in active_counts.items():
    active_labels.extend([a] * count)
np.random.shuffle(active_labels)

df = pd.DataFrame({
    'RowNumber': range(1, n + 1),
    'CustomerId': sorted(np.random.choice(range(15000000, 16000000), n, replace=False)),
    'Surname': [f'Surname_{i}' for i in range(n)],
    'CreditScore': np.clip(np.random.normal(650, 97, n).astype(int), 350, 850),
    'Geography': geo_labels,
    'Gender': gender_labels,
    'Age': np.clip(np.random.normal(38.9, 10.4, n).astype(int), 18, 92),
    'Tenure': np.random.randint(0, 11, n),
    'Balance': np.round(np.where(np.random.random(n) < 0.36, 0, np.random.exponential(100000, n)), 2),
    'NumOfProducts': product_labels,
    'HasCrCard': card_labels,
    'IsActiveMember': active_labels,
    'EstimatedSalary': np.round(np.random.uniform(11.58, 199992.48, n), 2),
})

df['Balance'] = np.clip(df['Balance'], 0, 250000)

churn_target = {
    'France': 814,
    'Spain': 409,
    'Germany': 814,
}

exited = np.zeros(n, dtype=int)

for geo, target_churn in churn_target.items():
    geo_indices = df[df['Geography'] == geo].index.tolist()

    churn_scores = np.zeros(len(geo_indices))

    for i, idx in enumerate(geo_indices):
        age = df.loc[idx, 'Age']
        is_active = df.loc[idx, 'IsActiveMember']
        gender = df.loc[idx, 'Gender']
        num_products = df.loc[idx, 'NumOfProducts']
        balance = df.loc[idx, 'Balance']

        score = 0
        if age >= 50:
            score += 3.0
        elif age >= 40:
            score += 1.5
        elif age < 30:
            score -= 0.5

        if is_active == 0:
            score += 1.5

        if gender == 'Female':
            score += 0.8

        if num_products >= 3:
            score += 5.0

        if balance > 100000:
            score += 0.5

        churn_scores[i] = score

    top_churn_indices = np.argsort(churn_scores)[-target_churn:]

    for i in top_churn_indices:
        exited[geo_indices[i]] = 1

df['Exited'] = exited

total_churn = df['Exited'].sum()
print(f"Dataset generated successfully!")
print(f"Total rows: {len(df)}")
print(f"Total churn: {total_churn} ({total_churn/len(df)*100:.1f}%)")
print(f"\nChurn by Geography:")
for geo in ['France', 'Spain', 'Germany']:
    subset = df[df['Geography'] == geo]
    churn = subset['Exited'].sum()
    print(f"  {geo}: {len(subset)} total, {churn} churn ({churn/len(subset)*100:.1f}%)")

print(f"\nChurn by Gender:")
for g in ['Male', 'Female']:
    subset = df[df['Gender'] == g]
    churn = subset['Exited'].sum()
    print(f"  {g}: {len(subset)} total, {churn} churn ({churn/len(subset)*100:.1f}%)")

print(f"\nChurn by Activity:")
for a in [1, 0]:
    subset = df[df['IsActiveMember'] == a]
    churn = subset['Exited'].sum()
    label = 'Active' if a == 1 else 'Inactive'
    print(f"  {label}: {len(subset)} total, {churn} churn ({churn/len(subset)*100:.1f}%)")

print(f"\nChurn by NumOfProducts:")
for p in [1, 2, 3, 4]:
    subset = df[df['NumOfProducts'] == p]
    churn = subset['Exited'].sum()
    print(f"  {p} products: {len(subset)} total, {churn} churn ({churn/len(subset)*100:.1f}%)")

base_dir = os.path.dirname(os.path.dirname(os.path.abspath(__file__)))
output_path = os.path.join(base_dir, 'dataset', 'bank_churn.csv')
os.makedirs(os.path.dirname(output_path), exist_ok=True)
df.to_csv(output_path, index=False)
print(f"\nSaved to: {output_path}")
