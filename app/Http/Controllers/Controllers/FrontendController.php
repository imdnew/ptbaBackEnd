<?php

namespace App\Http\Controllers\Controllers;

use App\Http\Controllers\Repositories\StatRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Article;
use Carbon\Carbon;
use App\Events\newStat;


class FrontendController extends Controller
{

    private $sr;

    public function __construct(StatRepository $sr){
        $this->sr=$sr;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        $articles = Article::where('sup', FALSE)->where('id_categorie', 2)->orderBy('id', 'DESC')->limit(3)->get();
        $communiques = Article::where('sup', FALSE)->where('id_categorie', 4)->orderBy('id', 'DESC')->limit(9)->get();

        $confrimes = DB::select('select SUM(casconfirmes)  from statsparlocalitecasconfirmes');
        $declares = DB::select('select SUM(nombre)  from statsparlocalitedeclaration');
        $gueris = DB::select('select SUM(guerisons)  from statsparlocaliteguerisons ');
        $deces = DB::select('select SUM(deces) from statsparlocalitedeces  ');

        return view('frontend.home', compact('communiques', 'articles', 'confrimes', 'declares', 'gueris', 'deces'));
    }

    public function statistiques()
    {
        $confrimes = DB::select('select SUM(casconfirmes)  from statsparlocalitecasconfirmes');
        $declares = DB::select('select SUM(nombre)  from statsparlocalitedeclaration');
        $gueris = DB::select('select SUM(guerisons)  from statsparlocaliteguerisons ');
        $deces = DB::select('select SUM(deces) from statsparlocalitedeces  ');
        return view('frontend.statistiques', compact('confrimes', 'declares', 'gueris', 'deces'));
    }

    public function articleread($alias)
    {
        $article = Article::where('alias', $alias)->first();

        return view('frontend.article', compact('article'));
    }

    public function statsparlocalitecasconfirmes()
    {
        return json_encode($this->sr->getGlobalStat(),JSON_NUMERIC_CHECK);
    }


    public function actualites()
    {
        $articles = Article::where('sup', FALSE)->where('id_categorie', 2)->orderBy('id', 'DESC')->limit(9)->get();


        $confrimes = DB::select('select SUM(casconfirmes)  from statsparlocalitecasconfirmes');
        $declares = DB::select('select SUM(nombre)  from statsparlocalitedeclaration');
        $gueris = DB::select('select SUM(guerisons)  from statsparlocaliteguerisons ');
        $deces = DB::select('select SUM(deces) from statsparlocalitedeces  ');

        return view('frontend.actualites', compact('articles', 'confrimes', 'declares', 'gueris', 'deces'));
    }

    public function corus()
    {
        return view('frontend.corus');
    }
    public function contact()
    {
        return view('frontend.contact');
    }
    public function telechargement()
    {
        return view('frontend.telechargement');
    }

    public function covid19()
    {
        return view('frontend.covid19');
    }
}
