@extends('communes.layouts.master')
@include('partials.includes.dataTables.dataTables')
@include('partials.includes.dataTables.buttons')
@section('content')
<div class='content'>
	<h3>Accueil</h3>
	<hr>
	<h5>Notifications réçus</h5>
	<br>
</div>
	  <div>
		{!!$dataTable->table() !!}
	  </div>
@stop
@push('scripts')
{!!$dataTable->scripts() !!}
@endpush