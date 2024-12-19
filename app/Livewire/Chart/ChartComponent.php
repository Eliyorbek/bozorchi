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
        $sales = Order::selectRaw('DATE(created_at) as sale_date, SUM(total_sum) as total_amount')
            ->groupBy('sale_date')
            ->orderBy('sale_date', 'asc')
            ->get();

        $this->chartData = [
            'labels' => $sales->pluck('sale_date')->map(function ($date) {
                return Carbon::parse($date)->format('d.m.Y'); // Kunning sanasi va oy nomini formatlash
            }),
            'data' => $sales->pluck('total_amount'), // To'g'ri ustun nomi
        ];

    }
    public function render()
    {
        return view('livewire.chart.chart-component');
    }
}
