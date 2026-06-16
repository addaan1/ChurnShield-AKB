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
                    'Inactive' => ['total' => 4849, 'churn' => 1302, 'rate' => 26.9],
                    'Active' => ['total' => 5151, 'churn' => 735, 'rate' => 14.3],
                ],
                'products' => [
                    '1' => ['total' => 5084, 'churn' => 1409, 'rate' => 27.7],
                    '2' => ['total' => 4590, 'churn' => 348, 'rate' => 7.6],
                    '3' => ['total' => 266, 'churn' => 220, 'rate' => 82.7],
                    '4' => ['total' => 60, 'churn' => 60, 'rate' => 100.0],
                ],
                'creditCard' => [
                    'No' => ['total' => 2945, 'churn' => 613, 'rate' => 20.8],
                    'Yes' => ['total' => 7055, 'churn' => 1424, 'rate' => 20.2],
                ],
            ];
        }

        return view('dashboard.behavior', compact('data'));
    }
}
