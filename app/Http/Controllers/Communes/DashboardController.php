<?php

namespace App\Http\Controllers\Communes;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTables\Communes\ListeNotificationsDataTable;
use App\DataTables\Communes\ArchivesDataTable;
use App\DataTables\Communes\ListeEtablissementsDataTable;
use App\DataTables\Communes\ListeUtilisateursDataTable;
use App\Http\Requests\CreateEtablissementRequest;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUSerRequest;
use App\Models\Etablissement;
use App\Models\Personne;
use App\Models\Declaration;
use App\Http\Controllers\DeclarationController;

use App\Models\Users_etablissement;
use App\Models\Agents_commune;
use Hash;
use Flashy;





class DashboardController extends Controller
{
   
    public function __construct()
    {
        $this->middleware(['auth:agents_commune','checkAuth']);
    }

    public function index(){
        return view('communes.welcome');
    }

    public function acceuil(ListeNotificationsDataTable $dataTables){
    	return $dataTables->with([
                                    'user' => auth()->user()
                                ])
                            ->render('communes.acceuil');
    }

    public function archives(ArchivesDataTable $dataTables){
        return $dataTables->with([
                                    'user' => auth()->user()
                                ])
                            ->render('communes.acceuil');
    }
    public function viewDeclaration(Declaration $declaration){
        $declaration = DeclarationController::edit($declaration->iddeclaration);
        return view('etablissements.view_doc_naiss',compact('declaration'));
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
                                // dd(request()->request); 
        $etablissement = Etablissement::updateOrCreate([
                                    'idetablissement' => $request->idetablissement
                                ],
                                [
                                    'nom' => $request->nom,
                                    'abbr' => $request->abbr,
                                    'idadresse' => $request->adresse
                                ]);
        $compte = Users_etablissement::updateOrCreate([
                                    'idpersonne' => $admin->idpersonne
                                ],
                                [
                                    'pseudo' => 'admin-'.$etablissement->slug,
                                    'password' => Hash::make('azerty'),
                                    'profil' => 'admin',
                                    'isAdmin'=> true,
                                    'idetablissement' => $etablissement->idetablissement,
                                ]);
        // 
        // FLASHYYYYYYYYYYYYYYYYY
        // ------------------------------------------
        Flashy::success('Opération effectué avec succès');  
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
                                    'password' => Hash::make('azerty'),
                                    'profil' => $request->user_profil,
                                    // 'idcommune' => auth()->user()->idcommune,
                                ]);
        Flashy::success('Opération effectué avec succès');
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
        Flashy::success('Utilisateur modifié avec succès');
        return redirect()->back();
    }
    
    public function create_declaration(Etablissement $etablissement){
        return view('etablissements.form_declaration',compact('etablissement'));
    }
    public function edit_declaration(Declaration $declaration){
        $etablissement = Etablissement::find($declaration->idetablissement);
        $declaration = DeclarationController::edit($declaration->iddeclaration);
        return view('etablissements.form_edit_declaration',compact('declaration','etablissement','idetablissement'));
    }

    public function archive_declaration(Declaration $declaration){
        $declaration->statut = 3;
        $declaration->save();

        Flashy::success('Dossier archivé avec succès');
        return redirect()->back();
    }
}
