<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Professionnel extends Model
{
    // données pouvant être mises à jour sans risque
    protected $fillable = ['prenom', 'nom', 'cp', 'ville', 'telephone', 'email',
        'formation', 'domaine', 'source', 'observation', 'metier_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function metier(){

        return $this->belongsTo(Metier::class);

    }

    public function competences(){

        return $this->belongsToMany(Competence::class)->withTimestamps();

    }


}
