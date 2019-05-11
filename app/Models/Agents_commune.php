<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Agents_commune extends Authenticatable
{
    use Notifiable;

    protected $primaryKey = 'idagents_commune';

    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'idpersonne', 'idcommune','pseudo', 'password','profil'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];




    public static function getUsersByCommune($idcommune){
        return self::UsersByCommune($idcommune)->join('personnes','personnes.idpersonne','agents_communes.idpersonne')->get();
    } 


    public static function scopeUsersByCommune($query,$idcommune){
        return $query->where('idcommune',$idcommune);
    }
}
