@extends('layouts.admin')
  @section('utility')
  <br>
  <br>
  <br>
  <br>
  <br>
  <div class="card card-mb-6 mb-6">

  	<form>
		<form>
		  <div class="form-group">
		    <label >Capital</label>
		    <input type="number" class="form-control" id="capital" placeholder="Ingrese el Capital">
		  </div>
		  <div class="form-group">
		    <label>Numero de Cuotas</label>
		    <input type="number"  class="form-control " id="cuotas" placeholder="Numero de cuotas">
		  </div>
		</form>
		<div class="mb-12">
		<button class="btn btn-primary" onclick="alerta()">Submit</button>
		</div>
  </div>

  <script>
  	function alerta(){
  		//document.write('<h1>document header</h1>')
  		var casa='document header';
  		pepe.innerHTML=casa;
  	}
  </script>
  <h1 id="pepe"></h1>