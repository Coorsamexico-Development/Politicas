<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Finiquito;
use App\Models\Politic;

class paginaController extends Controller
{
    public function index()
    {
         $repuesta = collect();
        $finiquitos = Finiquito::select('nombre', 'apellidop', 'apellidom', 'fecha')
        ->whereEjercido( 0)
        ->get();
        $repuesta->finiquitos = $finiquitos;
        return view('pagina.politicas', ['respuesta' => $repuesta]);
    }


    public function lastPolicts()
    {
        $lastPolitic = Politic::select('politics.imagePolitic','politics.namepolitica','politics.pdf','politics.id_statu')
        ->whereId_statu(3)
        ->orderbyDesc('updated_at')
        ->limit(5)
        ->get();
        return $lastPolitic;
    }

    public function politicCategories(){

        $politicCategory = Politic::select('politics.imagePolitic','politics.namepolitica','politics.pdf','tipopoliticas.name','politics.id_statu')
        ->join('tipopoliticas','tipopoliticas.id','=','politics.type_politic')
        ->where('id_statu','=',3)
        ->orWhere('id_statu','=', 1)
        ->get();
        return $politicCategory;


    }

}
