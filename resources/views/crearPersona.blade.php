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

</style>


<body class="bg-dark">
<div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Registro De Cliente</div>
      <div class="card-body">


  <ol class="breadcrumb badge-light">
  <li class="breadcrumb-item  ">
  <a href="home">Inicio</a></li>
  <li class="breadcrumb-item active">Registro De Cliente</li>
  </ol>


        <form method="POST" action="{{ route('client.store') }}">
          {!! csrf_field() !!}
          <div class="form-group">
            <div class="form-row">
               <div class="col-md-4">
                <label>Cédula</label>
                <input class="form-control" type="text" name="cedula">
              </div>
               <div class="col-md-3">
                <label >Teléfono</label>
                <input class="form-control" type="text" name="phone">
              </div>
              <div class="col-md-8">
                <label >Nombre Completo</label>
                <input class="form-control"  type="text" name="name" >
              </div>
              </div>
              <div class="col-md-4">
                <label >Apellidos</label>
                <input class="form-control" type="text"  name="lastName">
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="form-row">
            <div class="col-md-4">
            <label ">Email</label>
            <input class="form-control" name="email" type="email"  >
          </div>
        
              <div class="col-md-4">
                <label >Direccion de Residencia</label>
                <input class="form-control" name="address" type="text" >
              </div>
        </div>
        </div>

        <h5>Referencia Personal</h5>
         <div class="form-group">
            <div class="form-row">           
            <div class="col-md-4">
            <label >Nombre Completo </label>
            <input class="form-control" name="guarantorName" type="text"  >
          </div>
              <div class="col-md-4">
                <label >Apellidos</label>
                <input class="form-control" name="guarantorLastName" type="text" >
              </div>

              <div class="col-md-3">
                <label>Teléfono</label>
                <input class="form-control" name="guarantorPhone" type="text" >
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
