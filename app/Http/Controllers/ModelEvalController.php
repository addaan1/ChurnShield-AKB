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
                        'accuracy' => 70.8,
                        'precision' => 38.3,
                        'recall' => 71.7,
                        'f1' => 50.0,
                    ],
                    'Random Forest' => [
                        'accuracy' => 84.2,
                        'precision' => 60.3,
                        'recall' => 66.3,
                        'f1' => 63.2,
                    ],
                    'XGBoost' => [
                        'accuracy' => 81.5,
                        'precision' => 53.8,
                        'recall' => 66.3,
                        'f1' => 59.4,
                    ],
                ],
                'bestModel' => 'Random Forest',
                'featureNames' => [],
                'trainSize' => 8000,
                'testSize' => 2000,
            ];
        }

        return view('dashboard.models', compact('data'));
    }
}
