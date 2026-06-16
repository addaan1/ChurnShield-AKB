<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PredictController extends Controller
{
    public function index()
    {
        return view('dashboard.predict');
    }

    public function predict(Request $request)
    {
        $validated = $request->validate([
            'credit_score' => 'required|numeric|min:300|max:850',
            'age' => 'required|numeric|min:18|max:100',
            'tenure' => 'required|numeric|min:0|max:10',
            'balance' => 'required|numeric|min:0',
            'num_products' => 'required|numeric|min:1|max:4',
            'geography' => 'required|in:France,Germany,Spain',
            'gender' => 'required|in:Male,Female',
            'is_active' => 'required|in:0,1',
            'has_cr_card' => 'required|in:0,1',
            'estimated_salary' => 'required|numeric|min:0',
        ]);

        $weightsPath = public_path('data/model_weights.json');

        if (!file_exists($weightsPath)) {
            return response()->json(['error' => 'Model weights not found. Run python analysis.py first.'], 500);
        }

        $weights = json_decode(file_get_contents($weightsPath), true);

        $geoMap = array_flip($weights['label_encoders']['geography']);
        $genderMap = array_flip($weights['label_encoders']['gender']);

        $features = [
            (float) $validated['credit_score'],
            (float) ($geoMap[$validated['geography']] ?? 0),
            (float) ($genderMap[$validated['gender']] ?? 0),
            (float) $validated['age'],
            (float) $validated['tenure'],
            (float) $validated['balance'],
            (float) $validated['num_products'],
            (float) $validated['has_cr_card'],
            (float) $validated['is_active'],
            (float) $validated['estimated_salary'],
        ];

        $scaler = $weights['scaler'];
        $scaled = [];
        for ($i = 0; $i < count($features); $i++) {
            $scaled[] = ($features[$i] - $scaler['mean'][$i]) / $scaler['scale'][$i];
        }

        $lr = $weights['logistic_regression'];
        $z = $lr['intercept'];
        for ($i = 0; $i < count($scaled); $i++) {
            $z += $scaled[$i] * $lr['coefficients'][$i];
        }

        $probability = 1 / (1 + exp(-$z));
        $probability = round($probability * 100, 1);
        $probability = max(0, min(100, $probability));

        if ($probability >= 60) {
            $riskLevel = 'High';
            $riskColor = '#EF4444';
        } elseif ($probability >= 30) {
            $riskLevel = 'Medium';
            $riskColor = '#F59E0B';
        } else {
            $riskLevel = 'Low';
            $riskColor = '#10B981';
        }

        $recommendations = [];

        if ($validated['geography'] === 'Germany') {
            $recommendations[] = 'Prioritaskan program retensi khusus untuk nasabah di Germany (churn rate 32.4%).';
        }
        if ($validated['age'] >= 50) {
            $recommendations[] = 'Tawarkan layanan personalized untuk nasabah usia matang yang lebih rentan churn.';
        }
        if ($validated['is_active'] == 0) {
            $recommendations[] = 'Jalankan kampanye reaktivasi melalui notifikasi dan penawaran khusus.';
        }
        if ($validated['num_products'] >= 3) {
            $recommendations[] = 'Evaluasi pengalaman nasabah multi-produk dan sederhanakan proses layanan.';
        }
        if ($validated['gender'] === 'Female') {
            $recommendations[] = 'Perhatikan kebutuhan spesifik nasabah perempuan dalam program retensi.';
        }
        if ($validated['credit_score'] < 600) {
            $recommendations[] = 'Tawarkan program edukasi keuangan untuk nasabah dengan credit score rendah.';
        }

        return response()->json([
            'probability' => $probability,
            'risk_level' => $riskLevel,
            'risk_color' => $riskColor,
            'recommendations' => $recommendations,
            'model_used' => 'Logistic Regression',
        ]);
    }
}
