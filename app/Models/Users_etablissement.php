<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Users_etablissement extends Authenticatable
{
    use Notifiable;
    
    protected $primaryKey = 'idusers_etablissement';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
   protected $fillable = [
        'idpersonne', 'pseudo', 'password','profil','isAdmin','idetablissement',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 
    ];

    public static function getUsersByEtablissement($idetablissement){
        return self::UsersByEtablissement($idetablissement)->join('personnes','personnes.idpersonne','users_etablissements.idpersonne')->get();
    } 


    public static function scopeUsersByEtablissement($query,$idetablissement){
        return $query->where('idetablissement',$idetablissement);
    }
}
