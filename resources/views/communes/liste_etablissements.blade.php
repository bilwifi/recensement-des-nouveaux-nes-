@extends('communes.layouts.master')
@include('partials.includes.dataTables.dataTables')
@include('partials.includes.dataTables.buttons')
@section('content')
<div class="container">
	<button type="button" class="addModal btn btn-info" data-toggle="modal" data-target="#addModal">
  		 <span class="fa fa-plus"> </span> Nouveau établissement
	</button><br><br>
	<div >
	  <div >
	  	<div class="create">
		</div>
		{!!$dataTable->table() !!}
    

<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Modifier</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        {{-- msg d'erreur --}}
        {{-- Formulaire Edition--}}
        <form id="etudiantForm" action="{{ route('commune.crud_etablissements.store') }}" method="POST" name="etudiantForm" class="form-horizontal">
            @csrf
           <input type="hidden" name="idetablissement" id="idetablissement">
            <div class="form-group">
                <label for="nom"  class="control-label">Nom de l'établissement</label>
                <div class="col-sm-12">
                    <input type="text"  class="form-control" id="nom" name="nom"   maxlength="50" required="required">
                </div>
            </div>
            <div class="form-group">
                <label for="nom"  class="control-label">Abbreviation de l'établissement</label>
                <div class="col-sm-12">
                    <input type="text"  class="form-control" id="abbr" name="abbr"  maxlength="50" required="">
                </div>
            </div>
            <div class="form-group">
                <label for="adresse"  class="control-label">Adresse</label>
                <div class="col-sm-12">
                    <input type="text"  class="form-control" id="adresse" name="adresse"  maxlength="50" required="">
                </div>
            </div>
           
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
	        <button type="submit" class="save btn btn-primary">Enregistrer</button>
	      </div>
        </form>

      </div>
    </div>
  </div>
</div>

<!-- Modal Creation-->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Ajouter</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        {{-- msg d'erreur --}}
        {{-- Formulaire Creation --}}
        <form id="etudiantFormCreate" action="{{ route('commune.create_etablissement') }}" method="POST" name="etudiantFormCreate" class="form-horizontal_create">
            @csrf
           <input type="hidden" name="idetablissement" id="idetablissement">
            <div class="form-group">
                <label for="nom"  class="control-label">Nom de l'établissement</label>
                <div class="col-sm-12">
                    <input type="text"  class="form-control" id="nom" name="nom"   maxlength="50" required="required">
                </div>
            </div>
            <div class="form-group">
                <label for="nom"  class="control-label">Abbreviation de l'établissement</label>
                <div class="col-sm-12">
                    <input type="text"  class="form-control" id="abbr" name="abbr"  maxlength="50" required="">
                </div>
            </div>
            <div class="form-group">
                <label for="adresse"  class="control-label">Adresse</label>
                <div class="col-sm-12">
                    <input type="text"  class="form-control" id="adresse" name="adresse"  maxlength="50" required="">
                </div>
            </div>
            <div id="user-etablissement">
            	<hr>
            	<div class="card-title">Information de l'utilisateur admin</div>
            	<div class="form-group">
	                <label for="user_id"  class="control-label">N° Identification</label>
	                <div class="col-sm-12">
	                    <input type="text"  class="form-control" id="user_id" name="user_id"  maxlength="50" required="">
	                </div>
           		</div>
           		<div class="form-group">
	                <label for="user_nom"  class="control-label">Nom</label>
	                <div class="col-sm-12">
	                    <input type="text"  class="form-control" id="user_nom" name="user_nom"  maxlength="50" required="">
	                </div>
           		</div>
           		<div class="form-group">
	                <label for="user_prenom"  class="control-label">Prenom</label>
	                <div class="col-sm-12">
	                    <input type="text"  class="form-control" id="user_prenom" name="user_prenom"  maxlength="50" >
	                </div>
           		</div>
            </div>

	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
	        <button type="submit" class="save btn btn-primary">Enregistrer</button>
	      </div>
        </form>
        
      </div>
    </div>
  </div>
</div>








































	  </div>
	</div>
</div>	
@stop
@push('scripts')
{!!$dataTable->scripts() !!}

<script type="text/javascript">
	
	{{-- Ajout étudiant formulaire --}}
	$(document).on('click', '.addModal', function() {
	    $('#msgErrors').html('');
  		$('#msgErrors').attr('hidden','true');

		$('.modal-title').text('Ajouter');
		// resetmodalData()
		$('.form-horizontal_create').trigger("reset");
		$('.form-horizontal_create').show();
		$('#myModal').modal('show');
		});

	{{-- edition du formulaire --}}
	$(document).on('click', '.edit-modal', function() {
		    $('#msgErrors').html('');
      		$('#msgErrors').attr('hidden','true');

			$('#footer_action_button').text(" Update");
			$('#footer_action_button').addClass('fa fa-check');
			$('#footer_action_button').removeClass('fa fa-trash');
			$('.actionBtn').addClass('btn-success');
			$('.actionBtn').removeClass('btn-danger');
			$('.actionBtn').removeClass('delete');
			$('.actionBtn').addClass('edit');
			$('.modal-title').text('Modifier');
			$('.deleteContent').hide();
			$('.form-horizontal').show();
			var stuff = $(this).data('info').split(',');
			fillmodalData(stuff)
			$('#myModal').modal('show');
			});

	// remplissage formulaire par les donnée d'une ligne selectionée
	function fillmodalData(details){
			$('#idetablissement').val(details[0]);
			$('#nom').val(details[1]);
      $('#abbr').val(details[2]);
			$('#adresse').val(details[3]);
			}

	function resetmodalData(){
			$('#nom').val('');
      $('#abbr').val('');
			$('#adresse').val('');
			}



	{{-- Suppression  --}}
	$(document).on('click', '.delete-modal', function() {
		$('#footer_action_button').text(" Delete");
		$('#footer_action_button').removeClass('glyphicon-check');
		$('#footer_action_button').addClass('glyphicon-trash');
		$('.actionBtn').removeClass('btn-success');
		$('.actionBtn').addClass('btn-danger');
		$('.actionBtn').removeClass('edit');
		$('.actionBtn').addClass('delete');
		$('.modal-title').text('Delete');
		$('.deleteContent').show();
		$('.form-horizontal').hide();
		var stuff = $(this).data('info').split(',');
		$('.divd').text(stuff[0]);
		$('.dname').html(stuff[1] +" "+stuff[2]);
		$('#myModal').modal('show');
	});

</script>
@endpush