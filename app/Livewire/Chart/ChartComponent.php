<?php

namespace App\Livewire\Chart;

use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Carbon;
use Livewire\Component;

class ChartComponent extends Component
{
    public $chartData;

    public function mount()
    {
        $this->loadChartData();
    }

    public function loadChartData()
    {
        $sales = Order::selectRaw('MONTH(created_at) as month, SUM(total_sum) as total_sales')
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        $this->chartData = [
            'labels' => $sales->pluck('month')->map(function ($month) {
                return Carbon::create()->month($month)->format('F');
            }),
            'data' => $sales->pluck('total_sales'),
        ];

    }
    public function render()
    {
        return view('livewire.chart.chart-component');
    }
}
