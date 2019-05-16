<?php

namespace App\Http\Controllers\Communes;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTables\Communes\ListeNotificationsDataTable;
use App\DataTables\Communes\ListeEtablissementsDataTable;
use App\DataTables\Communes\ListeUtilisateursDataTable;
use App\Http\Requests\CreateEtablissementRequest;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUSerRequest;
use App\Models\Etablissement;
use App\Models\Personne;
use App\Models\Users_etablissement;
use App\Models\Agents_commune;
use Hash;





class DashboardController extends Controller
{
   
    public function __construct()
    {
        $this->middleware(['auth:agents_commune','checkAuth']);
    }


    public function acceuil(ListeNotificationsDataTable $dataTables){
    	return $dataTables->with([
                                    'user' => auth()->user()
                                ])
                            ->render('communes.acceuil');
    }
    public function getEtablissements(ListeEtablissementsDataTable  $dataTables){
        return $dataTables->render('communes.liste_etablissements');
    }
    public function createEtablissements(CreateEtablissementRequest  $request){
        $admin = Personne::updateOrCreate([
                                    'numIdN' => $request->user_id
                                ],
                                [
                                    'nom' => $request->user_nom,
                                    'prenom' => $request->user_prenom
                                ]); 
        $etablissement = Etablissement::updateOrCreate([
                                    'idetablissement' => $request->idetablissement
                                ],
                                [
                                    'nom' => $request->nom,
                                    'abbr' => $request->abbr,
                                    'adresse' => $request->adresse
                                ]);
        $compte = Users_etablissement::updateOrCreate([
                                    'idpersonne' => $admin->idpersonne
                                ],
                                [
                                    'pseudo' => 'admin-'.$etablissement->slug,
                                    'password' => Hash::make('password'),
                                    'profil' => 'admin',
                                    'isAdmin'=> true,
                                    'idetablissement' => $etablissement->idetablissement,
                                ]);
        // 
        // FLASHYYYYYYYYYYYYYYYYY
        // ------------------------------------------
        return redirect()->route('commune.get_etablissements');
    }

    public function createuser(CreateUserRequest  $request){
        $user = Personne::updateOrCreate([
                                    'numIdN' => $request->user_id
                                ],
                                [
                                    'nom' => $request->user_nom,
                                    'prenom' => $request->user_prenom,
                                ]); 

         $compte = Agents_commune::updateOrCreate([
                                    'idpersonne' => $user->idpersonne
                                ],
                                [
                                    'pseudo' => $request->user_pseudo,
                                    'password' => Hash::make('password'),
                                    'profil' => $request->user_profil,
                                    'idcommune' => auth()->user()->idcommune,
                                ]);
        // 
        // FLASHYYYYYYYYYYYYYYYYY
        // ------------------------------------------
        return redirect()->route('commune.get_users');
    }

    public function getUsers(ListeUtilisateursDataTable $dataTables){
        return $dataTables->with([
                                    'idcommune' => auth()->user()->idcommune
                                ])
                            ->render('communes.liste_users');
    }
    public function updateUser(UpdateUSerRequest $request){
        $user = Agents_commune::find($request->iduser)->update(['profil'=>$request->profil]);
        // Flashyyy
        // ---------------
        return redirect()->back();
    }
    
}
