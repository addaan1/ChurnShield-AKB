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
                'nasabahChurn' => 2038,
                'nasabahSetia' => 7962,
                'churnRate' => 20.4,
                'geography' => [
                    'France' => ['total' => 5014, 'churn' => 814, 'rate' => 16.2],
                    'Germany' => ['total' => 2509, 'churn' => 814, 'rate' => 32.4],
                    'Spain' => ['total' => 2477, 'churn' => 410, 'rate' => 16.6],
                ],
                'ageGroups' => [
                    '18-29' => ['total' => 1842, 'churn' => 282, 'rate' => 15.3],
                    '30-39' => ['total' => 3452, 'churn' => 538, 'rate' => 15.6],
                    '40-49' => ['total' => 2478, 'churn' => 489, 'rate' => 19.7],
                    '50-59' => ['total' => 1847, 'churn' => 612, 'rate' => 33.1],
                    '60+' => ['total' => 381, 'churn' => 117, 'rate' => 30.7],
                ],
            ];
        }

        return view('dashboard.index', compact('data'));
    }
}
