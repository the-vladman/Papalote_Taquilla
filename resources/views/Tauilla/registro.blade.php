@extends('taquilla')

@section('home')

@if ($errors->any())
  <ul class="alert alert-damage">
    @foreach ($errors->all() as $error)
      <li>{{$error}}</li>
    @endforeach
  </u>
@endif

<div class="row">
 

  <form action="/registro" method="POST">
     <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="col s6 offset-s3">
        <div class="row">
          <div class="input-field col s12">
            <i class="material-icons prefix">assignment_ind</i>
            <input name="boleto" type="text" class="validate">
            <label for="boleto">Número del boleto</label>
          </div>
          <div class="input-field col s12">
            <i class="material-icons prefix">account_circle</i>
            <input name="nombre" type="text" class="validate">
            <label for="nombre">Nombre</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
            <i class="material-icons prefix">email</i>
            <input name="email" type="email" class="validate">
            <label for="email">Email</label>
          </div>
        </div>
        <div class="row">
        	<div class="input-field col s6">
            <i class="material-icons prefix">info</i>
            <input name="edad" type="text" class="validate">
            <label for="edad">Edad</label>
          </div>

          <div class="input-field col s6">    
            <select name="genero" class="browser-default">
              <option value="" disabled selected>Género</option>
              <option value="F">Chica</option>
              <option value="M">Chico</option>
            </select>
         </div>
        </div>
        <div class="row">
            <button class="btn waves-effect waves-light" type="submit" name="action">Submit<i class="material-icons right">send</i>
            </button>
        </div>
      </div>
  </form>
</div>

@endsection