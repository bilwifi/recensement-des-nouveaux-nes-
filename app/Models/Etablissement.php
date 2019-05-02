<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Etablissement extends Model
{
    

    protected $primaryKey = 'idetablissement';


    public function getRouteKeyName(){
    	return 'slug';
    }
}