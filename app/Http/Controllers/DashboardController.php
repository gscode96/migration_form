<?php

namespace App\Http\Controllers;

use App\Models\Satisfaction;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {

        $satisfaction       = Satisfaction::orderBy('created_at', 'desc')->limit(5)->get();
        $totalSatisfactions = Satisfaction::count();
        $totalanswered      = Satisfaction::whereNotNull('overall_satisfaction')->count();
        $totalLostData = Satisfaction::where('data_loss', true)->count();

        $startOfQuarter = Carbon::now()->startOfQuarter();
        $endOfQuarter = Carbon::now()->endOfQuarter();

        $avaregeSatisfaction = Satisfaction::whereBetween('created_at', [$startOfQuarter, $endOfQuarter])
            ->whereNotNull('overall_satisfaction')
            ->avg('overall_satisfaction');

        $percentage = ($avaregeSatisfaction / 5) * 100;

        return view('administration.dashboard', \compact('satisfaction', 'totalSatisfactions', 'totalanswered', 'percentage', 'totalLostData'));
    }

}
