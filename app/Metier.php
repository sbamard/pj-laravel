<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Metier extends Model
{
    //données pouvant être mises à jour sans risque
    protected $fillable = ['libelle', 'description', 'slug'];
}
