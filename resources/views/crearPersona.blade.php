<!DOCTYPE html>
<html lang="es">
@extends('layouts.admin')
@section('utility')
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>PrestaFami</title>

  <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
  <link href="css/sb-admin.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>


<style>
body {
    font-family: Arial, Helvetica, sans-serif;
  font-size: 20px;
}
.card-header{font:normal 20px/20px verdana;
    heigth:100px;
    text-align:center;
    position:center;
    padding:20px 20px 20px 20px;
    }
.btn btn-primary{font:normal 2px/2px verdana;
    heigth:10px;
    text-align:center;
    position:center;
    padding:20px 20px 20px 20px;
    }

input[type=number]::-webkit-inner-spin-button, 
input[type=number]::-webkit-outer-spin-button { 
  -webkit-appearance: none; 
  margin: 0; 
}

input[type=number] { -moz-appearance:textfield; }

</style>

<br>
<br>
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
                <input class="form-control" type="number" min="100"  name="cedula"  required=""  oninvalid="setCustomValidity('Debe Contener Min 8 Caracteres')"oninput="setCustomValidity('')"/><br /><br />>

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
