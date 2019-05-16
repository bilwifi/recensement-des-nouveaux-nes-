@extends('etablissements.layouts.master')
@include('partials.includes.dataTables.dataTables')
@include('partials.includes.dataTables.buttons')
@section('content')
<div class="container">
	<div>
		<h3>Accueil</h3>
		<hr>
		<p>Notifications en cours</p>
		<br>
	</div>
	<div >
		{!!$dataTable->table() !!}
	</div>
</div>	
@stop
@push('scripts')
{!!$dataTable->scripts() !!}
@endpush