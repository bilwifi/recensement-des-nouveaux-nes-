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

    public static function getDeclaration(){
        $mere = Personne::select('idpersonne as idmere','nom as mere.nom');
        $enfant = Personne::select('idpersonne as idenfant','prenom as enfant.prenom','sexe as enfant.sexe','dateNaissance as enfant.dateNaiss');
        $user = Personne::select(['idpersonne as iddeclarant','nom as declarant.nom','prenom as declarant.prenom']);
        $etablissement = Etablissement::select('idetablissement as etablissement_id','nom as etablissement.nom','abbr as etablissement.abbr');

        return $data = self::leftJoinSub($mere, 'mere', function ($join) {
                        $join->on('declarations.idmere', '=', 'mere.idmere');
                    })
                    ->leftJoinSub($enfant, 'enfant', function ($join) {
                        $join->on('declarations.idenfant', '=', 'enfant.idenfant');
                    })
                    ->leftJoinSub($user, 'user', function ($join) {
                        $join->on('declarations.iddeclarant', '=', 'user.iddeclarant');
                    })
                    ->leftJoinSub($etablissement, 'etablissement', function ($join) {
                        $join->on('declarations.idetablissement', '=', 'etablissement.etablissement_id');
                    }); 
    }


    public static function getDeclarationByEtablissement($idetablissement){
    	$data = self::getDeclaration();
        return $data->DeclarationByEtablissement($idetablissement)->DeclarationEtablissement()->get();
                    
    }
    public static function getDeclarationByCommune(){
        $data = self::getDeclaration();
        return $data->DeclarationCommune()->get();
                    
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

    public static function scopeDeclarationEtablissement($query){
        return $query->where('statut',1);
    }

    public static function scopeDeclarationCommune($query){
        return $query->where('statut',2);
    }
    
}
