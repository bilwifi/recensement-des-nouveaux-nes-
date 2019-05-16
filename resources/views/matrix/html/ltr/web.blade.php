<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="matrix/assets/images/favicon.png">
    <title>Matrix Template - The Ultimate Multipurpose admin template</title>
    <!-- Custom CSS -->
    <link href="matrix/assets/libs/jquery-steps/jquery.steps.css" rel="stylesheet">
    <link href="matrix/assets/libs/jquery-steps/steps.css" rel="stylesheet">
    <link href="matrix/dist/css/style.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
                <div class="card">
                    <div class="card-body wizard-content">
                        <h4 class="card-title">Basic Form Example</h4>
                        <h6 class="card-subtitle"></h6>
                        <form id="example-form" action="#" class="m-t-40">
                            @csrf
                            <div>
                                <h3>Identité de la mère</h3>
                                <section>
                                    <label for="mereIdN">N° Identitification*</label>
                                    <input id="mereIdN" name="mereIdN" type="text" class="required form-control">
                                    <label for="mereNom">Nom *</label>
                                    <input id="mereNom" name="mereNom" type="text" class=" required form-control">
                                    <label for="merePostnom">Postnom </label>
                                    <input id="merePostnom" name="merePostnom" type="text" class=" form-control">
                                    <label for="merePrenom">Prenom </label>
                                    <input id="mereLieuNaissance" name="mereLieuNaissance" type="text" class=" form-control">
                                    <label for="mereLieuNaissance">Lieu de naissance *</label>
                                    <input id="merePrenom" name="merePrenom" type="text" class="required form-control">
                                    <label for="mereDateNaissance">Date de naissance *</label>
                                    <input id="mereDateNaissance" name="mereDateNaissance" type="date" class="required form-control">
                                    <label for="mereNationalite">Nationalité *</label>
                                    <input id="mereNationalite" name="mereNationalite" type="text" class="required form-control">
                                    <label for="mereProfession">Profession </label>
                                    <input id="mereProfession" name="mereProfession" type="text" class=" form-control">
                                    <label for="mereAdresse">Adresse </label>
                                    <input id="mereAdresse" name="mereAdresse" type="text" class=" form-control">
                                    <label for="mereTelepone">Télephone </label>
                                    <input id="mereTelepone" name="mereTelepone" type="digits" class=" form-control">
                                    
                                    <p>(*) Champ obligatoire</p>
                                </section>
                                <h3>Identité du père</h3>
                                <section>
                                    <label for="pereIdN">N° Identitification*</label>
                                    <input id="pereIdN" name="pereIdN" type="text" class="required form-control">
                                    <label for="pereNom">Nom *</label>
                                    <input id="pereNom" name="pereNom" type="text" class=" required form-control">
                                    <label for="perePostnom">Postnom </label>
                                    <input id="perePostnom" name="perePostnom" type="text" class=" form-control">
                                    <label for="perePrenom">Prenom </label>
                                    <input id="pereLieuNaissance" name="pereLieuNaissance" type="text" class=" form-control">
                                    <label for="pereLieuNaissance">Lieu de naissance *</label>
                                    <input id="perePrenom" name="perePrenom" type="text" class="required form-control">
                                    <label for="pereDateNaissance">Date de naissance *</label>
                                    <input id="pereDateNaissance" name="pereDateNaissance" type="date" class="required form-control">
                                    <label for="pereNationalite">Nationalité *</label>
                                    <input id="pereNationalite" name="pereNationalite" type="text" class="required form-control">
                                    <label for="pereProfession">Profession </label>
                                    <input id="pereProfession" name="pereProfession" type="text" class=" form-control">
                                    <label for="pereAdresse">Adresse </label>
                                    <input id="pereAdresse" name="pereAdresse" type="text" class=" form-control">
                                    <label for="pereTelepone">Télephone </label>
                                    <input id="pereTelepone" name="pereTelepone" type="digits" class=" form-control">
                                    
                                    <p>(*) Champ obligatoire</p>
                                </section>
                                <h3>Nouveau-né</h3>
                                <section>
                        {{--             <label for="enfantIdN">N° Identitification*</label>
                                    <input id="enfantIdN" name="enfantIdN" type="text" class="required form-control" >--}}
                                    <label for="enfantNom">Nom *</label>
                                    <input id="enfantNom" name="enfantNom" type="text" class=" required form-control">
                                    <label for="enfantPostnom">Postnom </label>
                                    <input id="enfantPostnom" name="enfantPostnom" type="text" class=" form-control">
                                    <label for="enfantPrenom">Prenom </label>
                                    <input id="enfantLieuNaissance" name="enfantLieuNaissance" type="text" class="required form-control"><label for="enfantSexe">Sexe* </label>
                                    <input id="enfantSexe" name="enfantSexe" type="text" class=" form-control">
                                    <label for="enfantLieuNaissance">Lieu de naissance *</label>
                                    <input id="enfantPrenom" name="enfantPrenom" type="text" class="required form-control">
                                    <label for="enfantDateNaissance">Date de naissance *</label>
                                    <input id="enfantDateNaissance" name="enfantDateNaissance" type="date" class="required form-control">
                                    <p>(*) Champ obligatoire</p>
                                </section>
                                <h3>Information socials</h3>
                                <section>
                                    <label for="cituation_matrimonial_parent">Situation matrimoniale</label>
                                    <input id="cituation_matrimonial_parent" name="cituation_matrimonial_parent" type="text" class=" form-control">
                                    <label for="cituation_amoureuse_parent">Cituation amoureuse </label>
                                    <input id="cituation_amoureuse_parent" name="cituation_amoureuse_parent" type="text" class="  form-control">
                                    <label for="Commentaire">Commentaire </label>
                                    <input id="Commentaire" name="Commentaire" type="text" class=" form-control">
                                    
                                    <p>(*) Champ obligatoire</p>
                                </section>
                                <h3>Finish</h3>
                                <section>
                                    <input id="acceptTerms" name="acceptTerms" type="checkbox" class="required">
                                    <label for="acceptTerms">Les infomations entrées sont correctes.</label>
                                </section>
                            </div>
                        </form>
                    </div>
                </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="matrix/assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="matrix/assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="matrix/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="matrix/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="matrix/assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="matrix/dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="matrix/dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="matrix/dist/js/custom.min.js"></script>
    <!-- this page js -->
    <script src="matrix/assets/libs/jquery-steps/build/jquery.steps.min.js"></script>
    <script src="matrix/assets/libs/jquery-validation/dist/jquery.validate.min.js"></script>
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
</body>

</html>