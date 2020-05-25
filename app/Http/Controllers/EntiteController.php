<?php

namespace App\Http\Controllers;

use App\Entite;
use App\Http\Resources\Entite as Resource;
use Illuminate\Http\Request;

class EntiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $liste =  Resource::collection(Entite::all());
        return Response()->json($liste);
    }

    public function search($keyword)
    {
        $liste = Resource::collection(Entite::where('nom','ilike',"%$keyword%")->orderBy('id','DESC')->get());
        return Response()->json($liste);
    }

    public function getDefaultList()
    {
        $liste = Resource::collection(Entite::orderBy('id','DESC')->take(100)->get());
        return Response()->json($liste);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   $cs =  Entite::create([
        'sigle' => $request->sigle,
        'nom' => $request->nom,

    ]);

        return Response()->json($cs);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Entite  $entite
     * @return \Illuminate\Http\Response
     */
    public function show(Entite $entite)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Entite  $entite
     * @return \Illuminate\Http\Response
     */
    public function edit(Entite $entite)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Entite  $entite
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Entite $entite)
    {
        $entite->update($request->all());

        return response()->json(new Resource($entite), 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Entite  $entite
     * @return \Illuminate\Http\Response
     */
    public function destroy(Entite $entite)
    {
        $objet = new Resource($entite);
       $entite->delete();

        return response()->json($objet, 200);
    }
}
