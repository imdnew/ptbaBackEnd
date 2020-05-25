<?php

namespace App\Http\Controllers\Repositories;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Covidstat;
use App\Vuelocalite;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class StatRepository 
{
    
public function getMapStat(){
     /**
         * @Author : <Wendmi class="yameogo@tic gov bf"></Wendmi>
         * Date : 05 Avril 2020
         * Objectif : Permettre de recupérer la dernière date de 
         *            declaration des cas
         *            (issue des coms du SIG et du Ministère de la santé)
         */
        $lastedate = Covidstat::select('dated')->where('sup', false)->orderBy('dated', 'desc')->first();
        $lastedate = Carbon::parse($lastedate->dated);
        $lastedate = $lastedate->format('d/m/Y');

        $serie = array();

        $localites = Vuelocalite::where(function ($q) {
            $q->where('nouveau', '>', 0)
                ->orWhere('guerison', '>', 0)
                ->orWhere('deces', '>', 0);
        })->get();

        $tab = new \StdClass();
        $tab->type = "FeatureCollection";

        foreach ($localites as $localite) {

            // GEOM
            $long = $localite->long;
            $lat = $localite->lat;

            $properties = new \StdClass();
            $properties->ville = $localite->nom;
            $properties->lastedate = $lastedate;
           $properties->nouveaux = $localite->nouveau;
            $properties->guerisons = $localite->guerison;
            $properties->deces = $localite->deces;
            $properties->confinements = $localite->confinement;
            $properties->suivis = $localite->suivis;

            $feature = new \StdClass();
            $feature->type = "Feature";
            $feature->properties = $properties;

            $geometrie = new \StdClass();
            $geometrie->type = "Point";
            $geometrie->coordinates = [$long, $lat];
            $feature->geometry = $geometrie;

            $tab->features[] = $feature;
        }



        /*  REGIONS */
        $geom = Storage::disk('public')->get('dataville/regions.json');

        // JSON
        $json_regions = json_decode($geom, true);

        // Regions
        $regions = $json_regions[0]['row_to_json'];
        /* END REGIONS **/

        // VILLES
        $ville = json_encode($tab, JSON_NUMERIC_CHECK);

        // REGIONS
        $region = json_encode($regions);

        $data = array('ville' => $tab, 'region' => $regions);

        //return $data;
        return $data;
}

public function getGlobalStat(){
    $cass = [];
    $confrimes = DB::select('select *  from statsparlocalitecasconfirmes');
    $declares = DB::select('select *  from statsparlocalitedeclaration');
    $gueris = DB::select('select *  from statsparlocaliteguerisons ');
    $deces = DB::select('select *  from statsparlocalitedeces  ');


    $jourdates = DB::select('select le  from statsnationaljourcasconfirmes order by le DESC limit 15');

    $jourconfrimes = DB::select('select casconfirmes  from statsnationaljourcasconfirmes order by le DESC limit 15');
    $jourgueris = DB::select('select guerisons  from statsnationaljourguerisons order by le DESC limit 15');
    $jourdeces = DB::select('select deces  from statsnationaljourdeces order by le DESC limit 15');


    $sommeconfrimes = DB::select('select SUM(casconfirmes)  from statsnationaljourcasconfirmes');
    $sommegueris = DB::select('select SUM(guerisons)  from statsnationaljourguerisons');
    $sommedeces = DB::select('select SUM(deces)  from statsnationaljourdeces');


    $dat = [];

    foreach ($jourdates as $jdate) {
        $dat[] = date('d/m', strtotime($jdate->le)); //date_format("Y/m/d H:i:s");

    }
    $dat = array_reverse($dat);

    $conf = [];
    foreach ($jourconfrimes as $jdate) {
        $conf[] = (int) $jdate->casconfirmes;
    }
    $conf = array_reverse($conf);

    $gue = [];
    foreach ($jourgueris as $jdate) {
        $gue[] = (int) $jdate->guerisons;
    }
    $gue = array_reverse($gue);
    $des = [];
    foreach ($jourdeces as $jdate) {
        $des[] = (int) $jdate->deces;
    }
    $des = array_reverse($des);
    $cass[] = array(
        'confrimes' => $confrimes,
        'declares' => $declares,
        'gueris' => $gueris,
        'deces' => $deces,
        'jourdates' => (object) $dat,
        'jourconfrimes' => $conf,
        'jourdeces' => $des,
        'jourgueris' => $gue,

        'sommeconfrimes' => $sommeconfrimes[0]->sum,
        'sommedeces' => $sommedeces[0]->sum,
        'sommegueris' => $sommegueris[0]->sum
    );

    //return $data;
    return $cass;

}

public function getCovidStatById($id){
    $covidStat = DB::table('localites')
        ->join('covidstats', 'localites.id', '=', 'covidstats.id_localite')
        ->select('covidstats.*', 'localites.nom')
        ->where('covidstats.sup', FALSE)
        ->where('covidstats.id', $id)
        ->orderBy('covidstats.id', 'DESC')
        ->first();
       // ->get();
    return $covidStat;
}
    
}
