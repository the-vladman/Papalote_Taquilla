@extends('taquilla')

@section('home')

<div class="row">
      <div class="col s6 offset-s3">
        <div class="card-panel">
      <div class="row">
      	<div class="row">
        <div class="input-field col s12">
          <i class="material-icons prefix">assignment_ind</i>
          <input id="boleto" type="text" class="validate">
          <label for="boleto">Número del boleto</label>
        </div>
      </div>
        <div class="input-field col s12">
          <i class="material-icons prefix">account_circle</i>
          <input id="nombre" type="text" class="validate">
          <label for="nombre">Nombre</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <i class="material-icons prefix">email</i>
          <input id="email" type="email" class="validate">
          <label for="email">Email</label>
        </div>
      </div>
      <div class="row">
      	<div class="input-field col s6">
          <i class="material-icons prefix">info</i>
          <input id="edad" type="text" class="validate">
          <label for="edad">Edad</label>
        </div>

        <div class="input-field col s6">
         <select>
      	<option value="" disabled selected>Choose your option</option>
      	<option value="H">Hombre</option>
      	<option value="M">Mujer</option>
   	 	</select>
          <label for="genero">Genero</label>
        </div>
      </div>
       <div class="input-field col s12">
    <select>
      <option value="" disabled selected>Choose your option</option>
      <option value="1">Option 1</option>
      <option value="2">Option 2</option>
      <option value="3">Option 3</option>
    </select>
    <label>Materialize Select</label>
  </div>
        </div>
      </div>
    </div>

@endsection