<?php

namespace App\Http\Controllers\Etablissements;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\DeclarationController;
use App\Http\Requests\CreateUserRequestEtablissement;
use App\Http\Requests\UpdateUSerRequest;
use App\Models\Personne;
use App\Models\Etablissement;
use App\Models\Users_etablissement;
use App\Models\Declaration;
use App\DataTables\Etablissements\ListeNotificationsDataTable;
use App\DataTables\Etablissements\ArchivesDataTable;
use App\DataTables\Etablissements\ListeUtilisateursEtablissementDataTable;
use DB;
use Hash;
use Flashy;

class DashboardController extends Controller
{
	public function __construct()
	{
		$this->middleware(['auth:users_etablissement','checkUserRole','checkAuth','slugMiddleware']);
	}

	public function index1(){
		$slug = Etablissement::find(auth()->user()->idetablissement)->slug;
		return redirect()->route('etablissement.index',$slug);
	}

	public function index(Etablissement $etablissement){
		return view('etablissements.welcome',compact('etablissement'));
	}

	public function acceuil(Etablissement $etablissement,ListeNotificationsDataTable $dataTables){
		return $dataTables->with([
									'idetablissement' => auth()->user()->idetablissement,
									'etablissement_slug' => $etablissement->slug,
									'user' => auth()->user()
								])
							->render('etablissements.acceuil');

	}

	public function archives(Etablissement $etablissement,ArchivesDataTable $dataTables){
		return $dataTables->with([
									'idetablissement' => auth()->user()->idetablissement,
									'etablissement_slug' => $etablissement->slug,
									'user' => auth()->user()
								])
							->render('etablissements.acceuil');

	}

	public function viewDeclaration(Etablissement $etablissement,Declaration $declaration){
		$declaration = DeclarationController::edit($declaration->iddeclaration);
		return view('etablissements.view_doc_naiss',compact('declaration'));
	}

	public function create_declaration(Etablissement $etablissement){
		return view('etablissements.form_declaration',compact('etablissement'));
	}

	public function edit_declaration(Etablissement $etablissement, Declaration $declaration){
		$declaration = DeclarationController::edit($declaration->iddeclaration);

		return view('etablissements.form_edit_declaration',compact('declaration','etablissement'));
	}
	public function send_declaration(Etablissement $etablissement, Declaration $declaration){
		$declaration->statut = 2;
		$declaration->date_envoi = DB::raw('NOW()');
		$declaration->save();
        Flashy::success('Dossier envoyé avec succès');

		return redirect()->back();
	}
	public function destroy_declaration(Etablissement $etablissement, Declaration $declaration){
		$declaration->destroy($declaration->iddeclaration);
        Flashy::success('Dossier supprimé');

		return redirect()->back();
	}


	public function createuser(CreateUserRequestEtablissement  $request){
		$user = Personne::updateOrCreate([
									'numIdN' => $request->user_id
								],
								[
									'nom' => $request->user_nom,
									'prenom' => $request->user_prenom,
								]); 

		 $compte = Users_etablissement::updateOrCreate([
									'idpersonne' => $user->idpersonne
								],
								[
									'pseudo' => $request->pseudo,
									'password' => Hash::make('password'),
									'profil' => $request->user_profil,
									'idetablissement' => auth()->user()->idetablissement,
								]);

        Flashy::success('Utilisateur crée avec succès');

		return redirect()->back();
	}

	public function getUsers(ListeUtilisateursEtablissementDataTable $dataTables){
		return $dataTables->with([
									'idetablissement' => auth()->user()->idetablissement
								])
							->render('etablissements.liste_users');
	}
	public function updateUser(UpdateUSerRequest $request){
		$user = Users_etablissement::find($request->iduser)->update(['profil'=>$request->profil]);
        Flashy::success('Utilisateur mis en jour avec succès');
		
		return redirect()->back();
	}
}
 

