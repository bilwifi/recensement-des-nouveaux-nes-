@extends('etablissements.layouts.master')
@include('partials.includes.dataTables.dataTables')
@include('partials.includes.dataTables.buttons')
@section('content')
<div class="container">
	<div class="card">
	  <div class="card-body">
		{!!$dataTable->table() !!}
	  </div>
	</div>
</div>	
@stop
@push('scripts')
{!!$dataTable->scripts() !!}
@endpush