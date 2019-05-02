<?php

namespace App\Http\Controllers\Etablissements;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\DeclarationController;

use App\Models\Etablissement;
use App\Models\Declaration;
use App\DataTables\Etablissements\ListeNotificationsDataTable;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:users_etablissement');
    }

    public function index(){
    	// dd(auth()->user()->idetablissement);
    	// dd(Etablissement::find(auth()->user()->idetablissement)->slug);
    	return redirect()->route('etablissement.accueil',Etablissement::find(auth()->user()->idetablissement)->slug);
    }

    public function acceuil(Etablissement $etablissement,ListeNotificationsDataTable $dataTables){
        // dd($etablissement->slug);

        return $dataTables->with([
                                    'idetablissement' => auth()->user()->idetablissement,
                                    'etablissement_slug' => $etablissement->slug,
                                ])
                            ->render('etablissements.acceuil');

    }

    public function create_declaration(Etablissement $etablissement){
        return view('etablissements.create_declaration',compact('etablissement'));
    }

    public function edit_declaration(Etablissement $etablissement, Declaration $declaration){
        $declaration = DeclarationController::edit($declaration->iddeclaration);
        return view('etablissements.edit_declaration',compact('declaration','etablissement'));
    }
}
 

