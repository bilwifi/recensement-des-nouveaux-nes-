@extends('layouts.master-login')

@section('content')    
    <form class="form-signin" method="post">
      @csrf   
      <div class="text-center mb-4">
        <img class="mb-4" src="{{ asset('img/snenimg.jpg') }}" alt="" width="300" height="200">    
        <div class="card bg-light">
          <div class="card-body">
              <h5 class="card-title">PRESTATEURS DE SOINS</h5>
              <div class="alert alert-danger" id='msgErrors' hidden>
    
    <p class="msgErrors"></p>
</div>
              <p>
                 <input type="input" name="slug" value=""  maxlength="45" id="inputName" class="form-control" placeholder="Entrez votre slug" required autofocus>
              </p>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Valider</button>

          </div>


      </div>

     
      </div>

      <div class="form-label-group"> 
         <a href="{{ route('commune')}}" class="btn btn-lg btn-success btn-block  " type="submit">COMMUNE</a>
        </div>
      
   </form>
@endsection
@section('script')
 {{--  <script src="http://127.0.0.1:3000/js/app.js"></script> 
  <script type="text/javascript" src="http://127.0.0.1:3000/js/appForm.js"></script> --}}
@endsection                 
