<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class HotelCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
       // return parent::toArray($request);
         return [
        'id'=>$this->id,
        'nom'=>$this->nom,
        'adresse'=>$this->adresse,
        'telephone'=>$this->telephone,
    ];
    }
}
