<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Member;

class DashboardController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $totalMembers = Member::count();
        $professionDistribution = Member::select('profession', DB::raw('COUNT(*) as total'))
            ->groupBy('profession')
            ->get();

        return view('dashboard', compact('professionDistribution', 'totalMembers'));
    }
}
