
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="Bil Wifi" content="{{ config('app.name') }} by KinDev">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href={{ asset('favicon.ico') }}>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ !empty ($title) ? $title .' | '. config('app.name') : config('app.name') }}  </title>

    @yield('stylesheet1')
        <!-- Custom CSS -->
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
     <link href="{{ asset('bootstrap/icons/font-awesome/css/fontawesome-all.css') }}" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    @yield('stylesheet')
    <!-- Coustom styleSheet--->
    @stack('stylesheets')


</head>

  <body>

{{-- @include('etablissements.layouts.partials._header')
@include('etablissements.layouts.partials._header_img')
@include('etablissements.layouts.partials._nav') --}}
<br>
    <div class="container font-weight-bold text-monospace">
        

        <div class="card bg-light " >
  <div class="card-header">
  	Hôpital : {{ $declaration['etablissement']['nom'] }} <br>
  	Adresse : {{ $declaration['etablissement']['idadresse'] }}
  </div>
  <div class="card-body">
    

    <table class="table ">
 {{--  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
    </tr>
  </thead> --}}
  <tbody>
  	<tr><td colspan="2"><h3>Identité de la mère</h3></td></tr>
    <tr>
      <td>Nom</td>
      <td>{{ $declaration['mere']['nom'] }}</td>
    </tr>
    <tr>
      <td>Postnom</td>
      <td>{{ $declaration['mere']['postnom'] }}</td>
    </tr>
    <tr>
      <td>Prenom</td>
      <td>{{ $declaration['mere']['prenom'] }}</td>
    </tr>
    <tr>
      <td>Lieu de naissance</td>
      <td>{{ $declaration['mere']['lieuNaissance'] }}</td>
    </tr>
    <tr>
      <td>Date de naissance</td>
      <td>{{ $declaration['mere']['dateNaissance'] }}</td>
    </tr>
    <tr>
      <td>Nationalité</td>
      <td>{{ $declaration['mere']['nationalite'] }}nation</td>
    </tr>
    <tr>
      <td>Profession</td>
      <td>{{ $declaration['mere']['profession'] }}Adresse</td>
    </tr>
    <tr>
      <td>Télephone</td>
      <td>{{ $declaration['mere']['telephone'] }}tel</td>
    </tr>


    <tr><td colspan="2"><h3>Identité du pére</h3></td></tr>
    <tr>
      <td>Nom</td>
      <td>{{ $declaration['pere']['nom'] }}nom</td>
    </tr>
    <tr>
      <td>Postnom</td>
      <td>{{ $declaration['pere']['postnom'] }}</td>
    </tr>
    <tr>
      <td>Prenom</td>
      <td>{{ $declaration['pere']['prenom'] }}</td>
    </tr>
    <tr>
      <td>Lieu de naissance</td>
      <td>{{ $declaration['pere']['lieuNaissance'] }}</td>
    </tr>
    <tr>
      <td>Date de naissance</td>
      <td>{{ $declaration['pere']['dateNaissance'] }}</td>
    </tr>
    <tr>
      <td>Nationalité</td>
      <td>{{ $declaration['pere']['nationalite'] }}</td>
    </tr>
    <tr>
      <td>Profession</td>
      <td>{{ $declaration['pere']['profession'] }}</td>
    </tr>
    <tr>
      <td>Télephone</td>
      <td>{{ $declaration['pere']['telephone'] }}</td>
    </tr>

    <tr><td colspan="2"><h3>Identité du nouveau né</h3></td></tr>
    <tr>
      <td>Nom</td>
      <td>{{ $declaration['enfant']['nom'] }}</td>
    </tr>
    <tr>
      <td>Postnom</td>
      <td>{{ $declaration['enfant']['postnom'] }}</td>
    </tr>
    <tr>
      <td>Prenom</td>
      <td>{{ $declaration['enfant']['prenom'] }}</td>
    </tr>
    <tr>
      <td>Lieu de naissance</td>
      <td>{{ $declaration['enfant']['lieuNaissance'] }}</td>
    </tr>
    <tr>
      <td>Date de naissance</td>
      <td>{{ $declaration['enfant']['dateNaissance'] }}</td>
    </tr>
    <tr>
      <td>{{ $declaration['enfant']['nom'] }}Nationalité</td>
      <td>{{ $declaration['enfant']['nationalite'] }}</td>
    </tr>
    

    <tr><td colspan="2"><h3>Informations sociales</h3></td></tr>
    <tr>
      <td>Situation matrimoniale</td>
      <td>{{ $declaration['declaration']['cituation_matrimonial_parent'] }}</td>
    </tr>
    <tr>
      <td>Cituation amoureuse</td>
      <td>{{ $declaration['declaration']['cituation_amoureuse_parent'] }}</td>
    </tr>
    <tr>
      <td>Commentaire</td>
      <td>{{ $declaration['declaration']['commentaire'] }}</td>
    </tr>
  
  	    <tr><td colspan="2"><h3>Déclarant</h3></td></tr>
    <tr>
      <td>Nom</td>
      <td>{{ $declaration['declarant']['nom'] }}</td>
    </tr>
    <tr>
      <td>Postnom</td>
      <td>{{ $declaration['declarant']['postnom'] }}</td>
    </tr>
    <tr>
      <td>Prenom</td>
      <td>{{ $declaration['declarant']['prenom'] }}</td>
    </tr>
    <tr>
      <td>Lieu de naissance</td>
      <td>{{ $declaration['declarant']['lieuNaissance'] }}</td>
    </tr>
   
    <tr>
      <td>Nationalité</td>
      <td>{{ $declaration['declarant']['nationalite'] }}</td>
    </tr>

    <tr>
      <td>Télephone</td>
      <td>{{ $declaration['declarant']['telephone'] }}</td>
    </tr>
    
  </tbody>
</table>








  </div>
  <div class="card-footer">
  	<p class="text-right">Kinshasa : {{ $declaration['declaration']['created_at'] }}</p>
  	
  </div>
</div>
<div class="container">
            <a href="{{ url()->previous() }}">RETOUR</a>
        </div>

    </div>



    <script src={{ asset('backend/assets/libs/jquery/dist/jquery.min.js') }}></script>
    <script src={{ asset('backend/assets/libs/bootstrap/dist/js/bootstrap.min.js') }}></script>
    
  
    <!-- this page js -->

@stack('scripts')
@include('flashy::message')

  </body>

<!-- Mirrored from getbootstrap.com/docs/4.1/examples/pricing/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 07 Nov 2018 23:41:46 GMT -->
</html>
