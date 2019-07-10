@extends('communes.layouts.master')
@include('partials.includes.dataTables.dataTables')
@include('partials.includes.dataTables.buttons')
@section('content')
<div class='content'>
	{{-- <h3>Accueil</h3> --}}
	<h5>Notifications réçus</h5>
	<hr>
	<br>
</div>
<div class="card">
  <div class="card-body">
	{!!$dataTable->table() !!}
  </div>
</div>
@stop
@push('scripts')
{!!$dataTable->scripts() !!}
@endpush