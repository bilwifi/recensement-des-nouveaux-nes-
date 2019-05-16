@extends('etablissements.layouts.master')
@section('stylesheet')
    <!-- Custom CSS -->
    <link href="{{ asset('matrix/assets/libs/jquery-steps/jquery.steps.css') }}" rel="stylesheet">
    <link href="{{ asset('matrix/assets/libs/jquery-steps/steps.css') }}" rel="stylesheet">
    <link href="{{ asset('matrix/dist/css/style.min.css') }}" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
@endsection
@section('content')
<div class="card">
    <div class="card-body wizard-content">
        <h4 class="card-title">Création Dossier de naissance</h4>
        <h6 class="card-subtitle"></h6>
        <form id="example-form" method="POST" class="m-t-40">
            @csrf
            {{-- NON SECURISEE --}}
            <input type="text" name="iddeclarant" hidden value="{{ auth()->user()->idpersonne }}">
            <input type="text" name="idetablissement" hidden value="{{ $etablissement->idetablissement }}">
            <div>
                <h3>Identité de la mère</h3>
                <section>
                    <div class="row">
                        <div class="col-6">
                            <input type="text" name="idmere" hidden value="{{ $declaration['mere']->idpersonne }}">
                            <label for="mereIdN">N° Identitification*</label>
                            <input id="mereIdN" name="mereIdN" type="text" class="required form-control"  value="{{ old('mereIdN') ? old('mereIdN') : $declaration['mere']->numIdN}}">
                            <label for="mereNom">Nom *</label>
                            <input id="mereNom" name="mereNom" type="text" class=" required form-control" value="{{ old('mereNom') ? old('mereNom') : $declaration['mere']->nom}}">
                            <label for="merePostnom">Postnom </label>
                            <input id="merePostnom" name="merePostnom" type="text" class=" form-control" value="{{ old('merePostnom') ? old('merePostnom') : $declaration['mere']->postnom}}">
                            <label for="merePrenom">Prenom *</label>
                            <input id="merePrenom" name="merePrenom" type="text" class="required form-control" value="{{ old('merePrenom') ? old('merePrenom') : $declaration['mere']->prenom}}">
                            <label for="mereLieuNaissance">Lieu de naissance *</label>
                            <input id="mereLieuNaissance" name="mereLieuNaissance" type="text" class="required form-control" value="{{ old('mereLieuNaissance') ? old('mereLieuNaissance') : $declaration['mere']->lieuNaissance}}">
                            <label for="mereDateNaissance">Date de naissance *</label>
                            <input id="mereDateNaissance" name="mereDateNaissance" type="date" class="required form-control" value="{{ old('mereDateNaissance') ? old('mereDateNaissance') : $declaration['mere']->dateNaissance}}">
                            <label for="mereNationalite">Nationalité *</label>
                            <input id="mereNationalite" name="mereNationalite" type="text" class="required form-control" value="{{ old('mereNationalite') ? old('mereNationalite') : $declaration['mere']->nationalite}}">
                            <label for="mereProfession">Profession </label>
                            <input id="mereProfession" name="mereProfession" type="text" class=" form-control" value="{{ old('mereProfession') ? old('mereProfession') : $declaration['mere']->profession}}">
                            <label for="mereAdresse">Adresse </label>
                            <input id="mereAdresse" name="mereAdresse" type="text" class=" form-control" value="{{ old('mereAdresse') ? old('mereAdresse') : $declaration['mere']->idadresse}}">
                            <label for="mereTelephone">Télephone </label>
                            <input id="mereTelephone" name="mereTelephone" type="digits" class=" form-control" value="{{ old('mereTelephone') ? old('mereTelephone') : $declaration['mere']->telephone}}">
                            
                            <p>(*) Champ obligatoire</p>
                        </div>      
                    </div>
                </section>
                <h3>Identité du pére</h3>
                <section>
                    <div class="row">
                        <div class="col-6">
                            <input type="text" name="idpere" hidden value="{{ $declaration['pere']->idpersonne }}">
                            <label for="pereIdN">N° Identitification*</label>
                            <input id="pereIdN" name="pereIdN" type="text" class="required form-control" value="{{ old('pereIdN') ? old('pereIdN') : $declaration['pere']->numIdN}}">
                            <label for="pereNom">Nom *</label>
                            <input id="pereNom" name="pereNom" type="text" class=" required form-control" value="{{ old('pereNom') ? old('pereNom') : $declaration['pere']->nom}}">
                            <label for="perePostnom">Postnom </label>
                            <input id="perePostnom" name="perePostnom" type="text" class=" form-control" value="{{ old('perePostnom') ? old('perePostnom') : $declaration['pere']->postnom}}">
                            <label for="perePrenom">Prenom *</label>
                            <input id="perePrenom" name="perePrenom" type="text" class="required form-control" value="{{ old('perePrenom') ? old('perePrenom') : $declaration['pere']->prenom}}">
                            <label for="pereLieuNaissance">Lieu de naissance *</label>
                            <input id="pereLieuNaissance" name="pereLieuNaissance" type="text" class="required form-control" value="{{ old('pereLieuNaissance') ? old('pereLieuNaissance') : $declaration['pere']->lieuNaissance}}">
                            <label for="pereDateNaissance">Date de naissance *</label>
                            <input id="pereDateNaissance" name="pereDateNaissance" type="date" class="required form-control" value="{{ old('pereDateNaissance') ? old('pereDateNaissance') : $declaration['pere']->dateNaissance}}">
                            <label for="pereNationalite">Nationalité *</label>
                            <input id="pereNationalite" name="pereNationalite" type="text" class="required form-control" value="{{ old('pereNationalite') ? old('pereNationalite') : $declaration['pere']->nationalite}}">
                            <label for="pereProfession">Profession </label>
                            <input id="pereProfession" name="pereProfession" type="text" class=" form-control" value="{{ old('pereProfession') ? old('pereProfession') : $declaration['pere']->profession}}">
                            <label for="pereAdresse">Adresse </label>
                            <input id="pereAdresse" name="pereAdresse" type="text" class=" form-control" value="{{ old('pereAdresse') ? old('pereAdresse') : $declaration['pere']->idadresse}}">
                            <label for="pereTelephone">Télephone </label>
                            <input id="pereTelephone" name="pereTelephone" type="digits" class=" form-control" value="{{ old('pereTelephone') ? old('pereTelephone') : $declaration['pere']->telephone}}">
                            
                            <p>(*) Champ obligatoire</p>
                        </div>      
                    </div>
                </section>
                <h3>Nouveau-né</h3>
                <section>
                    <div class="row">
                        <div class="col-6">
                            <input type="text" name="idenfant" hidden value="{{ $declaration['enfant']->idpersonne }}">
                            <label for="enfantNom">Nom *</label>
                            <input id="enfantNom" name="enfantNom" type="text" class=" required form-control" value="{{ old('enfantNom') ? old('enfantNom') : $declaration['enfant']->nom}}">
                            <label for="enfantPostnom">Postnom </label>
                            <input id="enfantPostnom" name="enfantPostnom" type="text" class=" form-control" value="{{ old('enfantPostnom') ? old('enfantPostnom') : $declaration['enfant']->postnom}}">
                            <label for="enfantPrenom">Prenom *</label>
                            <input id="enfantPrenom" name="enfantPrenom" type="text" class="required form-control" value="{{ old('enfantPrenom') ? old('enfantPrenom') : $declaration['enfant']->prenom}}">
                            <label for="enfantSexe">Sexe* </label>
                            <input id="enfantSexe" name="enfantSexe" type="text" class=" form-control" value="{{ old('enfantSexe') ? old('enfantSexe') : $declaration['enfant']->sexe}}">
                            <label for="enfantLieuNaissance">
                            Lieu de naissance *</label>
                            <input id="enfantLieuNaissance" name="enfantLieuNaissance" type="text" class="required form-control" value="{{ old('enfantLieuNaissance') ? old('enfantLieuNaissance') : $declaration['enfant']->lieuNaissance }}">
                            <label for="enfantDateNaissance">Date de naissance *</label>
                            <input id="enfantDateNaissance" name="enfantDateNaissance" type="date" class="required form-control"  value="{{ old('enfantDateNaissance') ? old('enfantDateNaissance') : $declaration['enfant']->dateNaissance }}">
                            <p>(*) Champ obligatoire</p>
                        </div>
                    </div>
                </section>
                <h3>Information socials</h3>
                <section>
                    <div class="row">
                        <div class="col-6">
                                <label for="cituation_matrimonial_parent">Situation matrimoniale</label>
                                <input id="cituation_matrimonial_parent" name="cituation_matrimonial_parent" type="text" class=" form-control" value="{{ old('cituation_matrimonial_parent') ? old('cituation_matrimonial_parent') : $declaration['declaration']->cituation_matrimonial_parent}}">
                                <label for="cituation_amoureuse_parent">Cituation amoureuse </label>
                                <input id="cituation_amoureuse_parent" name="cituation_amoureuse_parent" type="text" class="  form-control" value="{{ old('cituation_amoureuse_parent') ? old('cituation_amoureuse_parent') : $declaration['declaration']->cituation_amoureuse_parent}}">
                                <label for="commentaire">Commentaire </label>
                                <input id="commentaire" name="commentaire" type="text" class=" form-control" value="{{ old('commentaire') ? old('commentaire') : $declaration['declaration']->commentaire}}">
                                
                                <p>(*) Champ obligatoire</p>
                        </div>
                    </div>
                </section>
                <h3>Finish</h3>
                <section>
                    <input id="acceptTerms" name="acceptTerms" type="checkbox" class="required">
                    <label for="acceptTerms">Valider la modification.</label>
                </section>
            </div>
        </form>
    </div>
</div>
@endsection
@push('scripts')
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="{{ asset('matrix/assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ asset('matrix/assets/libs/popper.js/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('matrix/assets/libs/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{ asset('matrix/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js') }}"></script>
    <script src="{{ asset('matrix/assets/extra-libs/sparkline/sparkline.js') }}"></script>
    <!--Wave Effects -->
    <script src="{{ asset('matrix/dist/js/waves.js') }}"></script>
    <!--Menu sidebar -->
    <script src="{{ asset('matrix/dist/js/sidebarmenu.js') }}"></script>
    <!--Custom JavaScript -->
    <script src="{{ asset('matrix/dist/js/custom.min.js') }}"></script>
    <!-- this page js -->
    <script src="{{ asset('matrix/assets/libs/jquery-steps/build/jquery.steps.min.js') }}"></script>
    <script src="{{ asset('matrix/assets/libs/jquery-validation/dist/jquery.validate.min.js') }}"></script>
    <script>
        // Basic Example with form
    var form = $("#example-form");
    form.validate({
        errorPlacement: function errorPlacement(error, element) { element.before(error); },
        rules: {
            confirm: {
                equalTo: "#password"
            }
        }
    });
     form.children("div").steps({
        headerTag: "h3",
        bodyTag: "section",
        transitionEffect: "slideLeft",
        onStepChanging: function(event, currentIndex, newIndex) {
            form.validate().settings.ignore = ":disabled,:hidden";
            return form.valid();
        },
        onFinishing: function(event, currentIndex) {
            form.validate().settings.ignore = ":disabled";
            return form.valid();
        },
        onFinished: function(event, currentIndex) {
            form.submit();
        }
    });


    </script>
@endpush

