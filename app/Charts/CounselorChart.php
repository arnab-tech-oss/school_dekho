<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class CounselorChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build($title, $interested, $not_interested, $no_respond, $admission): \ArielMejiaDev\LarapexCharts\PieChart
    {

        return $this->chart->pieChart()
            ->setTitle($title)
            ->setSubtitle('.')
            ->addData([$interested, $not_interested, $no_respond, $admission])
            ->setLabels(['Interested', 'Not interested', 'No Response', 'Admission']);
    }
}
