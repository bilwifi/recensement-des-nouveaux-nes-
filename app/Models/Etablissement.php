<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Etablissement extends Model
{
    

    protected $primaryKey = 'idetablissement';
	public $timestamps = false;
    protected $fillable = [
         'nom', 'abbr','pseudo','idadresse'
    ];

    public function getRouteKeyName(){
    	return 'slug';
    }
    /**
     * Evénement éloquent lors de la creation d'un établissement
     * l'année academique en cours est recuperée automatique
     */
    protected static function boot(){
        parent::boot();

        static::creating(function($etablissement){
           $etablissement->slug = str_slug($etablissement->abbr, $separator = '-');
        });
    }

    public static function getEtablissements(){
    	return self::join('users_etablissements','users_etablissements.idetablissement','etablissements.idetablissement')
    		->where('users_etablissements.isAdmin','=',true)
    		->get([
    				'etablissements.idetablissement',
    				'etablissements.nom',
    				'etablissements.abbr',
                    'etablissements.slug',
    				'etablissements.idadresse',
    				'users_etablissements.pseudo',
    			]);
    }
}
