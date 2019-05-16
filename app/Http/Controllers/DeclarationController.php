<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Personne;
use App\Models\Declaration;
use Flashy;
class DeclarationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mere = [
            'idpersonne'=> $request->mere,
            'numIdN' => $request->mereIdN,
            'nom' => $request->mereNom,
            'postnom' => $request->merePostnom,
            'prenom' => $request->merePrenom,
            'sexe' => 'F',
            'lieuNaissance' => $request->mereLieuNaissance,
            'dateNaissance' => $request->mereDateNaissance,
            'idadresse' => $request->mereAdresse,
            'telephone' => $request->mereTelephone,
            'profession' => $request->mereProfession,
            'nationalite' => $request->mereNationalite,
        ];
        
        $pere = [
            'idpersonne'=> $request->idpere,    
            'numIdN' => $request->pereIdN,
            'nom' => $request->pereNom,
            'postnom' => $request->perePostnom,
            'prenom' => $request->perePrenom,
            'sexe' => 'M',
            'lieuNaissance' => $request->pereLieuNaissance,
            'dateNaissance' => $request->pereDateNaissance,
            'idadresse' => $request->pereAdresse,
            'telephone' => $request->pereTelephone,
            'profession' => $request->pereProfession,
            'nationalite' => $request->pereNationalite,
        ];
        $enfant = [
            'idpersonne'=> $request->idenfant,    
            'numIdN' => null,
            'nom' => $request->enfantNom,
            'postnom' => $request->enfantPostnom,
            'prenom' => $request->enfantPrenom,
            'sexe' => $request->enfantSexe,
            'lieuNaissance' => $request->enfantLieuNaissance,
            'dateNaissance' => $request->enfantDateNaissance,
            'nationalite' => 'CONGOLAISE',
            'idadresse' => $request->mereAdresse,


            
        ];

        $mere = Personne::updateOrCreate(
            [
                'numIdN' => $mere['numIdN']
            ],
            $mere
        );
        $pere = Personne::updateOrCreate(
            [
                'numIdN' => $pere['numIdN']
            ],
            $pere
        );
        $enfant = Personne::updateOrCreate(
            [
                'idpersonne'=>$enfant['idpersonne'],
            ],
            $enfant
        );

        $declarant = Personne::find($request->iddeclarant);

        $declaration = [
            'idmere' => $mere->idpersonne,
            'idpere' => $pere->idpersonne,
            'idenfant' => $enfant->idpersonne,
            'iddeclarant' => $declarant->idpersonne,
            'idetablissement' => $request->idetablissement,
            'cituation_matrimonial_parent'=>$request->cituation_matrimonial_parent,
            'cituation_amoureuse_parent'=>$request->cituation_amoureuse_parent,
            'commentaire'=>$request->commentaire,
        ];  

        $declaration = Declaration::updateOrCreate(
            [
                'idmere'=>$mere->idpersonne,
                'idenfant'=>$enfant->idpersonne,
            ],
            $declaration
        );
        Flashy::success('Dossier crée avec succès');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public static function edit($id)
    {
        $declaration = Declaration::findDeclaration($id);
        return $declaration;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Declaration::destroy($id);
        Flashy::success('Dossier supprimé');
        return redirect()->back();
    }
}
