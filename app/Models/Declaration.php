<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Personne;

class Declaration extends Model
{
    protected $primaryKey = 'iddeclaration';

    protected $fillable = [
        'idmere', 'idpere', 'idenfant','iddeclarant','idetablissement','cituation_matrimonial_parent','cituation_amoureuse_parent','commentaire',
    ];


    public static function getDeclarationByEtablissement($idetablissement){
    	$mere = Personne::select('idpersonne as idmere','nom as mere.nom');
    	$enfant = Personne::select('idpersonne as idenfant','prenom as enfant.prenom','sexe as enfant.sexe','dateNaissance as enfant.dateNaiss');
    	$user = Personne::select(['idpersonne as iddeclarant','nom as declarant.nom','prenom as declarant.prenom']);

    	$data = self::leftJoinSub($mere, 'mere', function ($join) {
                        $join->on('declarations.idmere', '=', 'mere.idmere');
                    })
    				->leftJoinSub($enfant, 'enfant', function ($join) {
                        $join->on('declarations.idenfant', '=', 'enfant.idenfant');
                    })
                    ->leftJoinSub($user, 'user', function ($join) {
                        $join->on('declarations.iddeclarant', '=', 'user.iddeclarant');
                    }); 
        return $data->DeclarationByEtablissement($idetablissement)->get();
                    
    }

    public static function findDeclaration($id){
        $declaration = self::find($id);    
        if ($declaration) {
            $mere = Personne::find($declaration->idmere);
            $pere = Personne::find($declaration->idpere);
            $enfant = Personne::find($declaration->idenfant);
            $declarant = Personne::find($declaration->iddeclarant);
        }
        return [
            'declaration' => $declaration,
            'mere' => isset($mere) ? $mere : null,
            'pere' => isset($pere) ? $pere : null,
            'enfant' => isset($enfant) ? $enfant : null,
            'declarant' => isset($declarant) ? $declarant : null
        ];
                    
    }



    /**********
    * SCOPES 
    **********/

    /**
    * Select par etablissement
    */

    public static function scopeDeclarationByEtablissement($query,$idetablissement){

        return $query->where('idetablissement',$idetablissement);
                        

    }
    
}
