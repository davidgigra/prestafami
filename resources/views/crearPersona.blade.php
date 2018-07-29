
@extends('layouts.admin')

@section('utility')



  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Registro De Cliente</div>
      <div class="card-body">
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
            <div class="form-row"