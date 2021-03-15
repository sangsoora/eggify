<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Budget;
use App\Models\Operator;
use App\Models\Provider;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $operators_count = Operator::all()->count();
        $providers_count = Provider::distributor()->get()->count();
        $producers_count = Provider::producer()->get()->count();
        $budgets_count = Budget::all()->count();

        return view('admin.dashboard', compact('operators_count', 'providers_count', 'producers_count', 'budgets_count'));
    }
}
