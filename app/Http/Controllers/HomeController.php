<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Article;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stats = DB::table('localites')
            ->join('stats_new_villes', 'localites.id', '=', 'stats_new_villes.id')
            ->select('stats_new_villes.nombre', 'localites.nom')
            ->orderByRaw('stats_new_villes.nombre DESC')
            ->get();

        foreach ($stats as $stat) {
            $array[] = array("name" => $stat->nom, "nombre" => $stat->nombre);
        }

        /**
         * @Author : <Wendmi class="yameogo@tic gov bf"></Wendmi>
         * Date : 30 Mars 2020
         * Objectif : Premettre d'afficher à la page d'accueil 
         *            les stats nationales
         *            et les 5 localités les plus touchées par la pandemie
         */
        $confrimes = DB::select('select *  from statsparlocalitecasconfirmes');
        $declares = DB::select('select *  from statsnationaldeclaration');
        $gueris = DB::select('select *  from statsparlocaliteguerisons ');
        $deces = DB::select('select *  from statsparlocalitedeces  ');
        return view('home', compact('listes', 'deces', 'gueris', 'confrimes', 'declares'));

        // return view('home', compact('array'));
    }
}
