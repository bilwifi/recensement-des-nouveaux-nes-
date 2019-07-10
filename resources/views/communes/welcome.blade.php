@extends('communes.layouts.master')
@section('content')
<div class="card " style=" margin-top:2%;">
  {{-- <div class="card-header">
    Quote
  </div> --}}

  <div class="card-body">
    <div class="row">
    	<div class="col">
    		<div class="card text-center text-white bg-primary mb-3" style="max-width: 18rem;">
			  {{-- <div class="card-header">Header</div> --}}
			  <div class="card-body">
			    <a href="{{ route('commune.accueil') }}" class=" btn btn-primary"  >
			    	<h5 class="card-title " ><i class="fas fa-spinner fa-2x"></i></h5>
			    	<h5 class="card-text">DOSSIERS EN COURS</h5>
			    </a>
			  </div>
			</div>
    	</div>
    	<div class="col">
    		<div class="card text-center text-white bg-primary mb-3" style="max-width: 18rem;">
			  {{-- <div class="card-header">Header</div> --}}
			  <div class="card-body">
			    <a href="{{ route('commune.archive') }}" class="btn btn-primary ">
			    	<h5 class="card-title " ><i class=" fas fa-archive fa-2x"></i></h5>
			    	<h5 class="card-text">DOSSIERS ARCHIVÉS</h5>
			    </a>
			  </div>
			</div>
    	</div>
    	<div class="col">
    		<div class="card text-center text-white bg-primary mb-3" style="max-width: 18rem;">
			  {{-- <div class="card-header">Header</div> --}}
			  <div class="card-body">
			    <a href="{{ route('commune.create_declaration') }}" class="btn btn-primary">
			    	<h5 class="card-title " ><i class=" fas fa-plus fa-2x"></i></h5>
			    	<h5 class="card-text">NOUVEAU DOSSIER</h5>
			    </a>
			  </div>
			</div>
    	</div>
    	
    </div>
    @if(auth()->user()->profil == 'admin')
    <div class="row">
    	<div class="col-2"></div>
    	<div class="col">
    		<div class="card text-center text-white bg-primary mb-3" style="max-width: 18rem;">
			  {{-- <div class="card-header">Header</div> --}}
			  <div class="card-body">
			    <a href="{{ route('commune.get_etablissements') }}" class=" btn btn-primary btn-block"  >
			    	<h5 class="card-title " ><i class="fas fa-home fa-2x"></i></h5>
			    	<h5 class="card-text">HÔPITAUX</h5>
			    </a>
			  </div>
			</div>
    	</div>
    	<div class="col">
    		<div class="card text-center text-white bg-primary mb-3" style="max-width: 18rem;">
			  {{-- <div class="card-header">Header</div> --}}
			  <div class="card-body">
			    <a href="{{ route('commune.get_users') }}" class="btn btn-primary">
			    	<h5 class="card-title " ><i class=" fas fa-user fa-2x"></i></h5>
			    	<h5 class="card-text">UTILISATEURS</h5>
			    </a>
			  </div>
			</div>
    	</div>
    	<div class="col-2"></div>
    </div>
    @endif
  </div>


@stop