<?php

namespace App\Http\Controllers;

class ModelEvalController extends Controller
{
    public function index()
    {
        $dataPath = public_path('data/model_results.json');

        if (file_exists($dataPath)) {
            $modelData = json_decode(file_get_contents($dataPath), true);
            $data = [
                'models' => $modelData['models'],
                'bestModel' => $modelData['bestModel'],
                'featureNames' => $modelData['feature_names'] ?? [],
                'trainSize' => $modelData['train_size'] ?? 0,
                'testSize' => $modelData['test_size'] ?? 0,
            ];
        } else {
            $data = [
                'models' => [
                    'Logistic Regression' => [
                        'accuracy' => 80.1,
                        'precision' => 64.2,
                        'recall' => 22.0,
                        'f1' => 32.8,
                    ],
                    'Random Forest' => [
                        'accuracy' => 85.3,
                        'precision' => 83.6,
                        'recall' => 41.5,
                        'f1' => 55.5,
                    ],
                    'XGBoost' => [
                        'accuracy' => 85.7,
                        'precision' => 81.0,
                        'recall' => 45.6,
                        'f1' => 58.4,
                    ],
                ],
                'bestModel' => 'XGBoost',
                'featureNames' => [],
                'trainSize' => 8000,
                'testSize' => 2000,
            ];
        }

        return view('dashboard.models', compact('data'));
    }
}
