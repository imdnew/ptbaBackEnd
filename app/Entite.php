<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entite extends Model
{
    protected $guarded = [];

    public function exercices()
    {

        return $this->hasMany(Exercice::class);

    }

    public function objectifStrategiques(){
        return $this->hasMany(ObjectifStrategique::class);
    }

    public function sourceFinancements(){
        return $this->hasMany(SourceFinancement::class);
    }

    public function directions(){
        return $this->hasMany(Direction::class);
    }

    public function activites(){
        return $this->hasManyThrough(Activite::class,Direction::class,'entite_id','direction_id');
    }
}
