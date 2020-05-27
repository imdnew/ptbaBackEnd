<?php

namespace App\Http\Controllers;

use App\ObjectifStrategique;
use App\Http\Resources\ObjectifStrategique as Resource;
use Illuminate\Http\Request;

class ObjectifStrategiqueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $liste =  Resource::collection(ObjectifStrategique::all());
        return Response()->json($liste);
    }

    public function search($keyword)
    {
        $liste = Resource::collection(ObjectifStrategique::where('libelle','ilike',"%$keyword%")->orderBy('id','DESC')->get());
        return Response()->json($liste);
    }

    public function getDefaultList()
    {
        $liste = Resource::collection(ObjectifStrategique::orderBy('id','DESC')->take(100)->get());
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
    {
        $cs =  ObjectifStrategique::create([
            'code' => $request->code,
            'libelle' => $request->libelle,
            'entite_id' =>  (int) $request->entite,

        ]);

        return Response()->json($cs);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ObjectifStrategique  $objectifstrategique
     * @return \Illuminate\Http\Response
     */
    public function show(ObjectifStrategique $objectifstrategique)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ObjectifStrategique  $objectifstrategique
     * @return \Illuminate\Http\Response
     */
    public function edit(ObjectifStrategique $objectifstrategique)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ObjectifStrategique  $objectifstrategique
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ObjectifStrategique $objectifstrategique)
    {
        $objectifstrategique->update($request->all());

        return response()->json(new Resource($objectifstrategique), 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ObjectifStrategique  $objectifstrategique
     * @return \Illuminate\Http\Response
     */
    public function destroy(ObjectifStrategique $objectifstrategique)
    {

        $objet = new Resource($objectifstrategique);

        $objectifstrategique->delete();

        return response()->json($objet, 200);
    }
}
