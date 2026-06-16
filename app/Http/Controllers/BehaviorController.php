<?php

namespace App\Http\Controllers;

class BehaviorController extends Controller
{
    public function index()
    {
        $dataPath = public_path('data/eda_results.json');

        if (file_exists($dataPath)) {
            $edaData = json_decode(file_get_contents($dataPath), true);
            $data = [
                'activity' => $edaData['activity'],
                'products' => $edaData['products'],
                'creditCard' => $edaData['creditCard'],
            ];
        } else {
            $data = [
                'activity' => [
                    'Active' => ['total' => 5164, 'churn' => 739, 'rate' => 14.3],
                    'Inactive' => ['total' => 4836, 'churn' => 1299, 'rate' => 26.9],
                ],
                'products' => [
                    '1' => ['total' => 5084, 'churn' => 1013, 'rate' => 19.9],
                    '2' => ['total' => 4590, 'churn' => 812, 'rate' => 17.7],
                    '3' => ['total' => 266, 'churn' => 220, 'rate' => 82.7],
                    '4' => ['total' => 60, 'churn' => 60, 'rate' => 100.0],
                ],
                'creditCard' => [
                    'Yes' => ['total' => 7055, 'churn' => 1440, 'rate' => 20.4],
                    'No' => ['total' => 2945, 'churn' => 598, 'rate' => 20.3],
                ],
            ];
        }

        return view('dashboard.behavior', compact('data'));
    }
}
