<?php

namespace App\Http\Controllers;

use App\Hotel;
use http\Env\Response;
use Illuminate\Http\Request;
use App\Http\Resources\Hotel as HotelResource;
class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      // $liste =  Hotel::all();
       $liste =  HotelResource::collection(Hotel::all());
        return Response()->json($liste);
    }

    public function search($keyword)
    {
        $liste = HotelResource::collection(Hotel::where('nom','ilike',"%$keyword%")->orderBy('id','DESC')->get());
        return Response()->json($liste);
    }

    public function getDefaultList()
    {
         $liste = HotelResource::collection(Hotel::orderBy('id','DESC')->take(100)->get());
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
        $cs =  Hotel::create([
            'nom' => $request->nom,
            'telephone' => $request->telephone,
            'email' => $request->email,
            'adresse' => $request->adresse,

        ]);

        return Response()->json($cs);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function show(Hotel $hotel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function edit(Hotel $hotel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hotel $hotel)
    {
        $hotel->update($request->all());

        return response()->json(new HotelResource($hotel), 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hotel $hotel)
    {
        $objet = new HotelResource($hotel);
        $hotel->delete();

        return response()->json($objet, 200);
    }
}
