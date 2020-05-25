<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ObjectifStrategique extends Model
{
    protected $guarded = [];

    public function entite(){
        return $this->belongsTo(Entite::class);
    }

    public function objectifSpecifiques(){
        return $this->hasMany(ObjectifSpecifique::class);
    }
}
