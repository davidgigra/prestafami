<!DOCTYPE html>
<html lang="es">
@extends('layouts.admin')
@section('utility')
<head><title>PrestaFami</title></head>
<br></br>
<body class="bg-dark">
<div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Registro De Cliente</div>
      <div class="card-body">


  <ol class="breadcrumb badge-light">
  <li class="breadcrumb-item  ">
  <a href="{{Route('home')}}">Inicio</a></li>
  <li class="breadcrumb-item active">Registro De Cliente</li>
  </ol>


        <form method="POST" action="{{ route('client.store') }}">
          {!! csrf_field() !!}
          <div class="form-group">
            <div class="form-row">
               <div class="col-md-3">
                <label>Cédula</label>
                <input class="form-control" type="number" min="100"  name="cedula"  required=""  oninvalid="setCustomValidity('Debe Contener Min 8 Caracteres')"oninput="setCustomValidity('')"><br> <br>

              </div>
               <div class="col-md-3">
                <label >Teléfono</label>
                <input class="form-control" type="number"  name="phone"  required="">
              </div>
              <div class="col-md-3">
                <label >Nombre Completo</label>
                <input class="form-control"  type="text" name="name" required="">
              </div>
              <div class="col-md-3">
                <label >Apellidos</label>
                <input class="form-control" type="text"  name="lastName" required="">
              </div>
            <div class="col-md-3">
                <label ">Email</label>
                <input class="form-control" name="email" type="email" required="">
            </div>
            <div class="col-md-3">
                <label >Direccion de Residencia</label>
                <input class="form-control" name="address" type="text" required="">
              </div>
            </div>
          </div>
        
        <h5>Referencia Personal</h5>
         <div class="form-group">
            <div class="form-row">           
            <div class="col-md-3">
            <label >Nombre Completo </label>
            <input class="form-control" name="guarantorName" type="text" required="" >
          </div>
              <div class="col-md-3">
                <label >Apellidos</label>
                <input class="form-control" name="guarantorLastName" type="text" required="">
              </div>

              <div class="col-md-3">
                <label>Teléfono</label>
                <input class="form-control" name="guarantorPhone" type="number" required="">
              </div>
        </div>
        </div>
      
          <button class="btn btn-primary" type="submit" >Registrar</button>
        </form>
       
      </div>
    </div>
  </div>
 </div> 
</body>
</html>
