<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tipopolitica;

class TipopoliticaController extends Controller
{
    public function index()
    {
        return Tipopolitica::all();
    }
}
