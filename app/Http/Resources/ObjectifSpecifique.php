<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\Resource;

class ObjectifSpecifique extends Resource
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
            'id' => $this->id,
            'code' => $this->code,
            'libelle' => $this->libelle,
            'objectif_strategique_id' =>$this->objectif_stategique_id,
            'objectif_strategique' => $this->objectifStrategique,
            'created_at' => (Carbon::parse($this->created_at))->format('Y-m-d'),
            'updated_at' => (Carbon::parse($this->updated_at))->format('Y-m-d'),
        ];
    }
}
