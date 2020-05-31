<?php
namespace App\Http\Controllers;

use App\ObjectifSpecifique;
use App\Http\Resources\ObjectifSpecifique as Resource;
use Illuminate\Http\Request;

class ObjectifSpecifiqueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $liste = Resource::collection(ObjectifSpecifique::all());
        return Response()->json($liste);
    }

    public function search($keyword)
    {
        $liste = Resource::collection(ObjectifSpecifique::where('libelle', 'ilike', "%$keyword%")
            ->orwhere('code','ilike',"%$keyword%")
            ->orderBy('id', 'DESC')->get());
        return Response()->json($liste);
    }

    public function getDefaultList()
    {
        $liste = Resource::collection(ObjectifSpecifique::orderBy('id', 'DESC')->take(100)->get());
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cs = ObjectifSpecifique::create([
            'code' => $request->code,
            'libelle' => $request->libelle,
            'objectif_strategique_id' => (int)$request->objectifstrategique,

        ]);

        return Response()->json(new Resource($cs));
    }

    /**
     * Display the specified resource.
     *
     * @param \App\ObjectifSpecifique $objectifspecifique
     *
     * @return \Illuminate\Http\Response
     */
    public function show(ObjectifSpecifique $objectifspecifique)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\ObjectifSpecifique $objectifspecifique
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(ObjectifSpecifique $objectifspecifique)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\ObjectifSpecifique $objectifspecifique
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ObjectifSpecifique $objectifspecifique)
    {
        $objectifspecifique->update($request->all());

        return response()->json(new Resource($objectifspecifique), 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\ObjectifSpecifique $objectifspecifique
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(ObjectifSpecifique $objectifspecifique)
    {

        $objet = new Resource($objectifspecifique);

        $objectifspecifique->delete();

        return response()->json($objet, 200);
    }
}
