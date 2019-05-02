<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Personne extends Model
{
     
	protected $primaryKey = 'idpersonne';
	public $timestamps = false;
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
   protected $fillable = [
        'numIdN', 'nom', 'postnom','prenom','prenom','sexe','lieuNaissance','dateNaissance','idadresse','telephone','profession','nationalite',
    ];
}


