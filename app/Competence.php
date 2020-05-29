<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Competence extends Model
{
    // données pouvant être mises à jour sans risque
    protected $fillable = ['libelle', 'description'];

    public function professionnels(){

        return $this->belongsToMany(Professionnel::class)->withTimestamps();

    }

}
