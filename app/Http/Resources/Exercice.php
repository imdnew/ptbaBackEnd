<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\Resource;

class Exercice extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'date_debut'=>(Carbon::parse($this->date_debut))->format('Y-m-d'),
            'date_fin'=>(Carbon::parse($this->date_fin))->format('d/m/Y'),
            'annee'=>$this->annee,
            'created_at'=>(Carbon::parse($this->created_at))->format('Y-m-d'),
        ];
    }
}
