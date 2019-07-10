@extends('etablissements.layouts.master')
@include('partials.includes.dataTables.dataTables')
@include('partials.includes.dataTables.buttons')
@section('content')
<div class="card-body">
	<div>
		{{-- <h3>Accueil</h3> --}}
		<p>Notifications en cours</p>
		<hr>
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