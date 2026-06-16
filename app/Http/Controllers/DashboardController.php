<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    public function index()
    {
        $dataPath = public_path('data/eda_results.json');

        if (file_exists($dataPath)) {
            $edaData = json_decode(file_get_contents($dataPath), true);
            $data = $edaData['overview'];
            $data['geography'] = $edaData['geography'];
            $data['ageGroups'] = $edaData['ageGroups'];
        } else {
            $data = [
                'totalNasabah' => 10000,
                'nasabahChurn' => 2037,
                'nasabahSetia' => 7963,
                'churnRate' => 20.4,
                'geography' => [
                    'France' => ['total' => 5014, 'churn' => 810, 'rate' => 16.2],
                    'Germany' => ['total' => 2509, 'churn' => 814, 'rate' => 32.4],
                    'Spain' => ['total' => 2477, 'churn' => 413, 'rate' => 16.7],
                ],
                'ageGroups' => [
                    '18-29' => ['total' => 1641, 'churn' => 124, 'rate' => 7.6],
                    '30-39' => ['total' => 4346, 'churn' => 473, 'rate' => 10.9],
                    '40-49' => ['total' => 2618, 'churn' => 806, 'rate' => 30.8],
                    '50-59' => ['total' => 869, 'churn' => 487, 'rate' => 56.0],
                    '60+' => ['total' => 526, 'churn' => 147, 'rate' => 27.9],
                ],
            ];
        }

        return view('dashboard.index', compact('data'));
    }
}
