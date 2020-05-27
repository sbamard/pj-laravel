<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Professionnel extends Model
{
    //données pouvant etre transmise sans risque
    protected $fillable = ['prenom', 'nom', 'cp', 'ville', 'telephone', 'mail', 'formation', 'domaine', 'source', 'observation', 'metier_id'];

    public function metier()
    {
        return $this->belongsTo(Metier::class);
    }

}
