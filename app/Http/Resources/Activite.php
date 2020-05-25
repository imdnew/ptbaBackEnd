<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\Resource;

class Activite extends Resource
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
            'activite' => $this->activite,
            'cible' => $this->cible,
            'cout_estimatif' => $this->cout_estimatif,
            't1' => $this->t1,
            't2' => $this->t2,
            't3' => $this->t3,
            't4' => $this->t4,
            'contrainte_realisation' => $this->contrainte_realisation,
            'direction' => $this->direction,
            'objectif_specifique' => $this->objectifSpecifique,
            'created_at' => (Carbon::parse($this->created_at))->format('Y-m-d'),
            'updated_at' => (Carbon::parse($this->updated_at))->format('Y-m-d'),
        ];
    }
}
