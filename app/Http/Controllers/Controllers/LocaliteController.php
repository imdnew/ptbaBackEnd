<?php

namespace App\Http\Controllers\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Localite;

class LocaliteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listes = Localite::where('sup', FALSE)->get();
        return view('localites.index', compact('listes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('localites.create');
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
            'code' => 'required',
            'nom' => 'required',
            'long' => 'required',
            'lat' => 'required',
        ]);
        $id = Localite::selectRaw("nextval('localites_id_seq') as id")->value('id');
        Localite::create([
            'id' => $id,
            'code' => $request->code,
            'nom' => strtoupper($request->nom),
            'long' => $request->long,
            'lat' => $request->lat,
            'homme' => 0,
            'femme' => 0,
        ]);

        return redirect()->route('localites.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $localite = Localite::where('id', $id)->first();
        return view('localites.show', compact('localite'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $localite = Localite::where('id', $id)->first();
        return view('localites.edit', compact('localite'));
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
        $this->validate($request, [
            'code' => 'required',
            'nom' => 'required',
            'long' => 'required',
            'lat' => 'required',
        ]);

        $localite = Localite::where('id', $id)->first();

        $localite->update([

            'code' => $request->code,
            'nom' => strtoupper($request->nom),
            'long' => $request->long,
            'lat' => $request->lat,
        ]);

        return redirect()->route('localites.index');
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
}
