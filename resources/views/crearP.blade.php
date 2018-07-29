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
  <a href="home">Inicio</a></li>
  <li class="breadcrumb-item active">Registro De Cliente</li>
  </ol>

        <form>
          <div class="form-group">
            <div class="form-row">
               <div class="col-md-5">
                <label for="exampleInputCC">Cédula</label>
                <input class="form-control" type="text" >
              </div>
               <div class="col-md-5">
                <label for="exampleInputTel">Teléfono</label>
                <input class="form-control" type="text" >
              </div>
              <div class="col-md-5">
                <label >Primer Nombre</label>
                <input class="form-control"  type="text"  >
              </div>
              <div class="col-md-5">
                <label for="exampleInputSegNombre">Segundo Nombre</label>
                <input class="form-control" type="text" >
              </div>
              <div class="col-md-5">
                <label for="exampleInputApellido">Apellidos</label>
                <input class="form-control" type="text"  >
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="form-row">
            <div class="col-md-6">
            <label for="exampleInputEmail1">Email</label>
            <input class="form-control" id="exampleInputEmail1" type="email"  >
          </div>
        
              <div class="col-md-6">
                <label for="exampleInputLastName">Direccion de Residencia</label>
                <input class="form-control" id="exampleInputLastName" type="text" >
              </div>
        </div>
        </div>
        <h5>Referencia Personal</h5>
         <div class="form-group">
            <div class="form-row">           
            <div class="col-md-6">
            <label for="exampleInputEmail1">Nombres </label>
            <input class="form-control" id="exampleInputEmail1" type="email"  >
          </div>
        
              <div class="col-md-6">
                <label for="exampleInputLastName">Apellidos</label>
                <input class="form-control" id="exampleInputLastName" type="text" >
              </div>

              <div class="col-md-6">
                <label for="exampleInputLastName">Teléfono</label>
                <input class="form-control" id="exampleInputLastName" type="text" >
              </div>
        </div>
        </div>
      </div>
       
          <a class="btn btn-primary btn-block" href="home">Registrar</a>
        </form>
       
      </div>
    </div>
  </div>

</body>
</html>
