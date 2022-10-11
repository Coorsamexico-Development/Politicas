<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Politic;
use App\Models\Finiquito;
use App\Models\Status_politica;
use App\Models\Tipopolitica;

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
        $politicas = Politic::count();
        $finiquitos = Finiquito::count();
        $tipop = Tipopolitica::count();

        return view('home', ['politicas' => $politicas, 'tipop' => $tipop, 'finiquitos' => $finiquitos]);
    }
}
