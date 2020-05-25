<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\Resource;

class Entite extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'sigle' => $this->sigle,
            'nom' => $this->nom,
            'activites' => $this->activites,
            'created_at' => (Carbon::parse($this->created_at))->format('Y-m-d'),
            'updated_at' => (Carbon::parse($this->updated_at))->format('Y-m-d'),
        ];
    }
}
