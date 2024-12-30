<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TrainingProgram;

class DashboardController extends Controller
{
    /**
     * Konstruktor untuk middleware `auth`.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Menampilkan dashboard utama.
     */
    public function index()
    {
        $upcomingEvents = TrainingProgram::where('start_date', '>=', now())
            ->orderBy('start_date', 'asc')
            ->take(3)
            ->get();

        return view('dashboard', compact('upcomingEvents'));
    }
}
