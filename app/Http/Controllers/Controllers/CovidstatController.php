<?php

namespace App\Http\Controllers\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Covidstat;
use App\Vuelocalite;
use App\Events\newStat;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExportHomme;
use App\Http\Controllers\Repositories\StatRepository;


class CovidstatController extends Controller
{

    private $sr;

    public function __construct(StatRepository $sr){
        $this->sr=$sr;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listes = DB::table('localites')
            ->join('covidstats', 'localites.id', '=', 'covidstats.id_localite')
            ->select('covidstats.*', 'localites.nom')
            ->where('covidstats.sup', FALSE)
            ->orderBy('covidstats.id', 'DESC')
            ->get();


        return view('stats.index', compact('listes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $listes = Localite::where('sup', FALSE)->distinct()->get();
        $listes = DB::select('select distinct on (nom) nom, id from localites');

        /**
         * @Author : <Wendmi class="yameogo@tic gov bf"></Wendmi>
         * Date : 30 Mars 2020
         * Objectif : Permettre de recupérer les 3 derniers 
         *            enregistrements et eles afficher pour eviter
         *            de repartir chaque efois vers la listee ecomplète
         */

        $dernieresdeclarations = DB::table('localites')
            ->join('covidstats', 'localites.id', '=', 'covidstats.id_localite')
            ->select('covidstats.*', 'localites.nom')
            ->where('covidstats.sup', FALSE)
            ->orderBy('covidstats.id', 'DESC')
            ->limit(5)
            ->get();

        return view('stats.create', compact('listes', 'dernieresdeclarations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            "dated" => "required",
            "statut" => "required",
            "localite" => "required",
            "sexe" => "required",
            "nombrecas" => "required",
        ]);

        $dated = str_replace("/", "-", $request->dated);
        $year = Carbon::parse($dated)->format('Y');
        $month = Carbon::parse($dated)->format('m');
        $day = Carbon::parse($dated)->format('j');

        $typeenregistrement = $request->statut;
        $id_localite = $request->localite;
        $sexe = $request->sexe;
        $nombrecas = $request->nombrecas;

       $cs =  Covidstat::create([

            'id_localite' => $id_localite,
            'annee' => Carbon::parse($dated)->format('Y'),
            'dated' => Carbon::createFromDate($year, $month, $day), // $request->dated,
            'moislettre' => Carbon::parse($dated)->format('M'),
            'moisnum' => Carbon::parse($dated)->format('m'),
            'sexe' => $sexe,
            'typeenregistrement' => $typeenregistrement,
            'nombrecas' => $request->nombrecas,

        ]);

        /*  $localite = Localite::where('id', $id_localite)->first();

       // UPDATE SEXE VALUE
        switch ($sexe) {
            case 'homme':
                DB::update('update localites set homme = homme+? where id = ?', [$nombrecas, $id_localite]);
                break;

            case 'femme':
                DB::update('update localites set femme = femme + ? where id = ?', [$nombrecas, $id_localite]);
                break;
        }


        // UPDATE STATUS VALUE
        switch ($typeenregistrement) {
            case 'nouveau':
                DB::update('update localites set nouveau = nouveau+? where id = ?', [$nombrecas, $id_localite]);
                break;

            case 'guerison':
                DB::update('update localites set guerison = guerison+? where id = ?', [$nombrecas, $id_localite]);
                break;

            case 'deces':
                DB::update('update localites set deces = deces+? where id = ?', [$nombrecas, $id_localite]);
                break;

            case 'confinement':
                DB::update('update localites set confinement = confinement+? where id = ?', [$nombrecas, $id_localite]);
                break;

            case 'suivis':
                DB::update('update localites set suivis = suivis+? where id = ?', [$nombrecas, $id_localite]);
                break;
        } */
        event(new newStat([
            'id_localite' => $id_localite,
            'typeenregistrement' => $typeenregistrement,
            'nombrecas' => $request->nombrecas,
            'mapdata' => json_encode($this->sr->getMapStat(),JSON_NUMERIC_CHECK),
            'statdata' => json_encode($this->sr->getGlobalStat(),JSON_NUMERIC_CHECK),
        ]));

        $cs = $this->sr->getCovidStatById($cs->id);

        $dated = Carbon::parse($cs->dated);
        $fd = $dated->format('d/m/Y');
        $cs->dated = $fd;

        $response = array();
        if($cs){
            $response = array('msg' => 'Declaration effectuée avec success!','data'=>$cs, 'status' => true);
        }else{
            $response = array('msg' => 'Une erreur s\'est produit ! merci de ressayer','data'=>null, 'status' => false);
        }
        return Response()->json($response);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Save ville with geom
     */
    public function saveville()
    {
        $geom = Storage::disk('public')->get('dataville/dataville.json');

        // // JSON
        $json_villes = json_decode($geom, true);

        // // VILLES
        $villes = $json_villes[0]['row_to_json'];

        $array = array(
            'ville' => $villes,
        );

        return json_encode($array);
    }

    /**
     * Ville save with geom
     */
    public function villesave(Request $request)
    {
        // dd($request->geom);
        $geom = $request->geom;
        $geom = $geom[0];
        // dd($geom);
        DB::insert("insert into localites (long, lat, code, nom) values (?, ?,?,?)", [$geom[0], $geom[1], $request->code, $request->nom]);
    }

    /**
     * download json data localite
     */
    public function getjson()
    {

        /**
         * @Author : <Wendmi class="yameogo@tic gov bf"></Wendmi>
         * Date : 31 Mars 2020
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
            // $properties->hommes = $localite->homme;
            // $properties->femmes = $localite->femme;
            // $properties->nouveau = $localite->homme + $localite->femme;
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



        /************ REGIONS ********************************/
        $geom = Storage::disk('public')->get('dataville/regions.json');

        // // JSON
        $json_regions = json_decode($geom, true);

        // // Regions
        $regions = $json_regions[0]['row_to_json'];
        /************ END REGIONS ********************************/

        // VILLES
        $ville = json_encode($tab, JSON_NUMERIC_CHECK);

        // REGIONS
        $region = json_encode($regions);

        $data = array('ville' => $tab, 'region' => $regions);

        return json_encode($data, JSON_NUMERIC_CHECK);
    }
 /**
     * Get CovidStat Last Update Date
     */
    public function getLastUpdateStat()
    {

        /**
         * @Author : <Wendmi class="yameogo@tic gov bf"></Wendmi>
         * Date : 19 Avril 2020
         * Objectif : Permettre de recupérer la dernière date de
         *            declaration des cas
         *select('max(updated_at) as dated')
         */
        $lastedate = DB::table('covidstats')->where('sup', false)->max('updated_at');
       // dd($lastedate);
       // $lastedated = Carbon::parse($lastedate->updated_at);
        $lastedated = Carbon::parse($lastedate);
        $lastedate = $lastedated->format('U');

        /**
         * Recuperation de la dee check javascript pour savoir s'il faut raffraichir les
         * données à partir de la BD ou pas
         */
        $c = time(); //c comme Check
        //$c = $c->format('U');



        $data = array('l' => $lastedate);

        return json_encode($data, JSON_NUMERIC_CHECK);
    }

    /**
     * Export homme
     */
    public function exportHomme()
    {
        return Excel::download(new ExportHomme, 'homme.csv');
    }

    /**
     * Export femme
     */
    public function exportFemme()
    {
        return Excel::download(new ExportHomme, 'femme.csv');
    }
}
