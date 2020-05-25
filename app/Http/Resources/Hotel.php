<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\Resource;

class Hotel extends Resource
{
    /**
     * Transform the resource into an array.
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
            'email'=>$this->email,
            'created_at'=>(Carbon::parse($this->created_at))->format('U'),
        ];
    }
}
