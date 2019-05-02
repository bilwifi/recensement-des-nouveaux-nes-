@extends('etablissements.layouts.master')
@section('content')
<div class="container">
	<div class="card">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item"> <a class="nav-link active show" data-toggle="tab" href="#home" role="tab" aria-selected="true"><span class="hidden-sm-up"></span> <span class="hidden-xs-down">Notification</span></a> </li>
            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile" role="tab" aria-selected="false"><span class="hidden-sm-up"></span> <span class="hidden-xs-down">Statut</span></a> </li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content tabcontent-border">
            <div class="tab-pane active show" id="home" role="tabpanel">
            	<div class="row">
            		<div class="col-3"></div>
	                <div class="p-20 col-9">
	                    <div class="card-body">
	                    	<form method="POST" >
	                    		@csrf
	                    		{{-- NON SECURISEE --}}
	                    		<input type="text" name="iddeclarant" hidden value="{{ auth()->user()->idpersonne }}">
	                    		<input type="text" name="idetablissement" hidden value="{{ $etablissement->idetablissement }}">
	                    		{{-- -------------------------------------- --}}
								<div id="data-mere" class="card row " style="background-color: #e9ecef">
	                                <h5 class="card-title">Donée de la mère</h5>
	                    		<input type="text" name="idmere" hidden value="{{ $declaration['mere']->idpersonne }}">

	                                <div class="card-body">
	                                	<div class="form-group row">
	                                        <label for="mereIdN" class="col-3 control-label col-form-label">N° ID National</label>
	                                        <div class="col-8">
	                                            <input type="text" class="form-control" name="mereIdN" id="mereIdN" value="{{ old('mereIdN') ? old('mereIdN') : $declaration['mere']->numIdN}}">
	                                        </div>
	                                    </div>
	                                    <div class="form-group row">
	                                        <label for="mereNom" class="col-3 control-label col-form-label">Nom</label>
	                                        <div class="col-8">
	                                            <input type="text" class="form-control" name="mereNom" id="mereNom" value="{{ old('mereNom') ? old('mereNom') : $declaration['mere']->nom}}">
	                                        </div>
	                                    </div>
	                                    <div class="form-group row">
	                                        <label for="merePostnom" class="col-3 control-label col-form-label">Postnom</label>
	                                        <div class="col-8">
	                                            <input type="text" class="form-control" name="merePostnom" id="merePostnom" value="{{ old('merePostnom') ? old('merePostnom') : $declaration['mere']->postnom}}">
	                                        </div>
	                                    </div>
	                                    <div class="form-group row">
	                                        <label for="merePrenom" class="col-3 control-label col-form-label">Prenom</label>
	                                        <div class="col-8">
	                                            <input type="text" class="form-control" name="merePrenom" id="merePrenom" value="{{ old('merePrenom') ? old('merePrenom') : $declaration['mere']->prenom}}">
	                                        </div>
	                                    </div>

	                                    <div class="form-group row">
	                                        <label for="mereLieuNaissance" class="col-3 control-label col-form-label">Lieu de naissance</label>
	                                        <div class="col-8">
	                                            <input type="text" class="form-control" name="mereLieuNaissance" id="mereLieuNaissance" value="{{ old('mereLieuNaissance') ? old('mereLieuNaissance') : $declaration['mere']->lieuNaissance}}">
	                                        </div>
	                                    </div>
	                                    <div class="form-group row">
	                                        <label for="mereDateNaissance" class="col-3 control-label col-form-label">Date de naissance</label>
	                                        <div class="col-8">
	                                            <input type="Date" class="form-control" name="mereDateNaissance" id="mereDateNaissance" value="{{ old('mereDateNaissance') ? old('mereDateNaissance') : $declaration['mere']->dateNaissance}}">
	                                        </div>
	                                    </div>
	                                    <div class="form-group row">
	                                        <label for="mereNationalite" class="col-3 control-label col-form-label">Nationalité</label>
	                                        <div class="col-8">
	                                            <input type="text" class="form-control" name="mereNationalite" id="mereNationalite" value="{{ old('mereNationalite') ? old('mereNationalite') : $declaration['mere']->nationalite}}">
	                                        </div>
	                                    </div>
	                                    <div class="form-group row">
	                                        <label for="mereProfession" class="col-3 control-label col-form-label">Profession</label>
	                                        <div class="col-8">
	                                            <input type="text" class="form-control" name="mereProfession" id="mereProfession" value="{{ old('mereProfession') ? old('mereProfession') : $declaration['mere']->profession}}">
	                                        </div>
	                                    </div>
	                                    <div class="form-group row">
	                                        <label for="mereAdresse" class="col-3 control-label col-form-label">Adresse</label>
	                                        <div class="col-8">
	                                            <input type="text" class="form-control" name="mereAdresse" id="mereAdresse" value="{{ old('mereAdresse') ? old('mereAdresse') : $declaration['mere']->idadresse}}">
	                                        </div>
	                                    </div>
	                                    <div class="form-group row">
	                                        <label for="mereTelephone" class="col-3 control-label col-form-label">Telephone</label>
	                                        <div class="col-8">
	                                            <input type="tel" class="form-control" name="mereTelephone" id="mereTelephone" value="{{ old('mereTelephone') ? old('mereTelephone') : $declaration['mere']->telephone}}">
	                                        </div>
	                                    </div>


	                                </div>
								</div> 
								<br>
								<div id="data-pere" class="card row " style="background-color: #e9ecef">
	                                <h5 class="card-title">Donée du père</h5>
	                                <div class="card-body">
	                    				<input type="text" name="idpere" hidden value="{{ $declaration['pere']->idpersonne }}">

	                                	<div class="form-group row">
	                                        <label for="pereIdN" class="col-3 control-label col-form-label">N° ID National</label>
	                                        <div class="col-8">
	                                            <input type="text" class="form-control" name="pereIdN" id="pereIdN" value="{{ old('pereIdN') ? old('pereIdN') : $declaration['pere']->numIdN}}">
	                                        </div>
	                                    </div>
	                                	<div class="form-group row">
	                                        <label for="pereNom" class="col-3 control-label col-form-label">Nom</label>
	                                        <div class="col-8">
	                                            <input type="text" class="form-control" name="pereNom" id="pereNom"  value="{{ old('pereNom') ? old('pereNom') : $declaration['pere']->nom}}">
	                                        </div>
	                                    </div>
	                                    <div class="form-group row">
	                                        <label for="perePostnom" class="col-3 control-label col-form-label">Postnom</label>
	                                        <div class="col-8">
	                                            <input type="text" class="form-control" name="perePostnom" id="perePostnom" value="{{ old('perePostnom') ? old('perePostnom') : $declaration['pere']->postnom}}">
	                                        </div>
	                                    </div>
	                                    <div class="form-group row">
	                                        <label for="perePrenom" class="col-3 control-label col-form-label">Prenom</label>
	                                        <div class="col-8">
	                                            <input type="text" class="form-control" name="perePrenom" id="perePrenom" value="{{ old('perePrenom') ? old('perePrenom') : $declaration['pere']->prenom}}">
	                                        </div>
	                                    </div>

	                                    <div class="form-group row">
	                                        <label for="pereLieuNaissance" class="col-3 control-label col-form-label">Lieu de naissance</label>
	                                        <div class="col-8">
	                                            <input type="text" class="form-control" name="pereLieuNaissance" id="pereLieuNaissance" value="{{ old('pereLieuNaissance') ? old('pereLieuNaissance') : $declaration['pere']->lieuNaissance}}">
	                                        </div>
	                                    </div>
	                                    <div class="form-group row">
	                                        <label for="pereDateNaissance" class="col-3 control-label col-form-label">Date de naissance</label>
	                                        <div class="col-8">
	                                            <input type="Date" class="form-control" name="pereDateNaissance" id="pereDateNaissance" value="{{ old('pereDateNaissance') ? old('pereDateNaissance') : $declaration['pere']->dateNaissance}}">
	                                        </div>
	                                    </div>
	                                    <div class="form-group row">
	                                        <label for="pereNationalite" class="col-3 control-label col-form-label">Nationalité</label>
	                                        <div class="col-8">
	                                            <input type="text" class="form-control" name="pereNationalite" id="pereNationalite" value="{{ old('pereNationalite') ? old('pereNationalite') : $declaration['pere']->nationalite}}">
	                                        </div>
	                                    </div>
	                                    <div class="form-group row">
	                                        <label for="pereProfession" class="col-3 control-label col-form-label">Profession</label>
	                                        <div class="col-8">
	                                            <input type="text" class="form-control" name="pereProfession" id="pereProfession" value="{{ old('pereProfession') ? old('pereProfession') : $declaration['pere']->profession}}">
	                                        </div>
	                                    </div>
	                                    <div class="form-group row">
	                                        <label for="pereAdresse" class="col-3 control-label col-form-label">Adresse</label>
	                                        <div class="col-8">
	                                            <input type="text" class="form-control" name="pereAdresse" id="pereAdresse" value="{{ old('pereAdresse') ? old('pereAdresse') : $declaration['pere']->idadresse}}">
	                                        </div>
	                                    </div>
	                                    <div class="form-group row">
	                                        <label for="pereTelephone" class="col-3 control-label col-form-label">Telephone</label>
	                                        <div class="col-8">
	                                            <input type="tel" class="form-control" name="pereTelephone" id="pereTelephone" value="{{ old('pereTelephone') ? old('pereTelephone') : $declaration['pere']->telephone}}">
	                                        </div>
	                                    </div>


	                                </div>
								</div>
								<br>
								<div id="data-enfant" class="card row " style="background-color: #e9ecef">
	                                <h5 class="card-title">Nouveau-né</h5>
	                                <div class="card-body">
	                    				<input type="text" name="idenfant" hidden value="{{ $declaration['enfant']->idpersonne }}">

	                                	<div class="form-group row">
	                                        <label for="enfantNom" class="col-3 control-label col-form-label">Nom</label>
	                                        <div class="col-8">
	                                            <input type="text" class="form-control" name="enfantNom" id="enfantNom" value="{{ old('enfantNom') ? old('enfantNom') : $declaration['enfant']->nom}}">
	                                        </div>
	                                    </div>
	                                    <div class="form-group row">
	                                        <label for="enfantPostnom" class="col-3 control-label col-form-label">Postnom</label>
	                                        <div class="col-8">
	                                            <input type="text" class="form-control" name="enfantPostnom" id="enfantPostnom" value="{{ old('enfantPostnom') ? old('enfantPostnom') : $declaration['enfant']->postnom}}">
	                                        </div>
	                                    </div>
	                                    <div class="form-group row">
	                                        <label for="enfantPrenom" class="col-3 control-label col-form-label">Prenom</label>
	                                        <div class="col-8">
	                                            <input type="text" class="form-control" name="enfantPrenom" id="enfantPrenom" value="{{ old('enfantPrenom') ? old('enfantPrenom') : $declaration['enfant']->prenom}}">
	                                        </div>
	                                    </div>
	                                    <div class="form-group row">
	                                        <label for="enfantSexe" class="col-3 control-label col-form-label">Sexe</label>
	                                        <div class="col-8">
	                                            <input type="text" class="form-control" name="enfantSexe" id="enfantSexe" value="{{ old('enfantSexe') ? old('enfantSexe') : $declaration['enfant']->sexe}}">
	                                        </div>
	                                    </div>

	                                    <div class="form-group row">
	                                        <label for="enfantLieuNaissance" class="col-3 control-label col-form-label">Lieu de naissance</label>
	                                        <div class="col-8">
	                                            <input type="text" class="form-control" name="enfantLieuNaissance" id="enfantLieuNaissance" value="{{ old('enfantLieuNaissance') ? old('enfantLieuNaissance') : $declaration['enfant']->lieuNaissance}}">
	                                        </div>
	                                    </div>
	                                    <div class="form-group row">
	                                        <label for="enfantDateNaissance" class="col-3 control-label col-form-label">Date de naissance</label>
	                                        <div class="col-8">
	                                            <input type="Date" class="form-control" name="enfantDateNaissance" id="enfantDateNaissance" value="{{ old('enfantDateNaissance') ? old('enfantDateNaissance') : $declaration['enfant']->dateNaissance}}">
	                                        </div>
	                                    </div>
	                                </div>
								</div> 
								<br>
								<div class="card row" style="background-color: #e9ecef">
									<div class="form-group row" >
                                        <label for="cituation_matrimonial_parent" class="col-4 control-label col-form-label">cituation_matrimonial_parent</label>
                                        <div class="col-8">
                                            <input type="text" class="form-control" name="cituation_matrimonial_parent" id="cituation_matrimonial_parent" value="{{ old('cituation_matrimonial_parent') ? old('cituation_matrimonial_parent') : $declaration['declaration']->cituation_matrimonial_parent}}">
                                        </div>
                                    </div>
									<div class="form-group row">
                                        <label for="cituation_amoureuse_parent" class="col-4 control-label col-form-label">cituation_amoureuse_parent</label>
                                        <div class="col-8">
                                            <input type="text" class="form-control" name="cituation_amoureuse_parent" id="cituation_amoureuse_parent" value="{{ old('cituation_amoureuse_parent') ? old('cituation_amoureuse_parent') : $declaration['declaration']->cituation_amoureuse_parent}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="commentaire" class="col-4 control-label col-form-label">Commentaire</label>
                                        <div class="col-8">
                                            <textarea class="form-control" name="commentaire" id="commentaire" >
                                            	{{ old('commentaire') ? old('commentaire') : $declaration['declaration']->commentaire}}
                                            </textarea> 
                                        </div>
                                    </div>
								</div>   
								<div id="form-submit">
									<button type="submit">Valider</button>
								</div>                	
	                    	</form>
	                    </div>
	                </div>
           		</div>
            </div>
            <div class="tab-pane p-20" id="profile" role="tabpanel">
                <div class="p-20">
                    <p class="m-t-10">2</p>
                </div>
            </div>
        
        </div>
  	</div>
</div>
@stop