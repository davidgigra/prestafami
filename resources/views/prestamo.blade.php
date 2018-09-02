<!DOCTYPE html>
<html lang="es">
@extends('layouts.admin')
  @section('utility')

  <div class="card mb-12 ">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

          <ol class="breadcrumb badge-light">
            <li class="breadcrumb-item  ">
            <a href="{{Route('home')}}">Inicio</a></li>
            <li class="breadcrumb-item active">Prestamo</li>
          </ol>
  
  <div class="input-group">
    <div class="input-group-prepend">
      <div class="input-group-text" id="btnGroupAddon"><i class="fa fa-search fa-lg"></i></div>
    </div>
    <input type="text" class="form-control col-md-3 " id="myInput" onkeyup="myFunction()" placeholder="Buscar Clientes..." >
  </div>
</div>


<table class="table table-bordered table-dark"  id="myTable">
  <thead>
    <tr class="header" >
      <tr>
       <th style="width:15%;">Cédula</th>
       <th style="width:15%;">Nombre</th>
       <th style="width:15%;">Apellido</th>
       <th style="width:15%;">Teléfono</th>
       <th style="width:18%;">Prestamo</th>
       <th style="width:15%;">Estado</th>
       <th style="width:15%;">Acción</th>
    </tr>
 
              <tfoot>
                <tr>
                  <th>Cédula</th>
                  <th>Nombre</th>
                  <th>Apellido</th>
                  <th>Teléfono</th>
                  <th>Prestamo</th>
                  <th>Estado</th>
                  <th>Acción</th>
                </tr>
              </tfoot>

              <tbody>
              @foreach($clients as $client)
                <tr>
                  <td>{{$client->cedula}}</td>
                  <td>{{$client->name}}</td>
                  <td>{{$client->lastName}}</td>
                  <td>{{$client->phone}}</td>
                  <td>{{$client->email}}</td>
                  <td>{{$client->address}}</td>

                  <td>
                    <div class="btn-group" role="group" aria-label="Basic example">
                     
                      <button type="button" title="Añadir Prestamo" class="btn btn-primary" data-toggle="modal" data-target="#Visualiza{{$client->id}}"><i class="fa fa-plus fa-lg" aria-hidden="true" ></i></button>
                      
                      <button type="button" title="Pagar Cuota" class="btn btn-warning" data-toggle="modal" data-target="#Editar{{$client->id}}"><i class="fa fa-handshake-o fa-lg"></i></button>
                      
                    </div>
                  </td>
                 </tr>


<!-- ------------------Añadir Prestamo ------------------------------------------------->
                  <div class="modal fade bd-example-modal-fa-10x" id="Visualiza{{$client->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-header badge-light " >
                          <h5 class="modal-title " id="exampleModalCenterTitle">Agregar Prestamo</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div><br></br>
                      
                      


                              <form method="POST" action="{{ route('client.store') }}">
                                {!! csrf_field() !!}
                                <div class="form-group">
                                  <div class="form-row">
                                     
                                     <div class="col-md-6">
                                      <label >Capital</label>
                                      <input type="number" class="form-control" id="capital" placeholder="Ingrese el Capital">    
                                    </div>

                                    <div class="col-md-6">
                                      <label >Numero De Cuotas</label>
                                      <input type="number"  class="form-control " id="cuotas" placeholder="Numero de cuotas">
                                    </div>

                                    <div class="col-md-6"><br></br>
                                      <label >Porcentaje De Interes</label>
                                      <input type="number"  class="form-control " id="interes" placeholder="porcentaje de Interes">
                                    </div>

                                  <div class="form-group col-md-5"><br></br>
                                    <label>Metodo</label>
                                    <select id="metodo" class="form-control" placeholder="selecione">
                                      <option value="linear">Capital Linear</option>
                                      <option value="amortizado">Amortizado</option>
                                      <option value="altermino">Capital al termino</option>
                                    </select>
                                 </div>

                                 <div class="form-group col-md-5">
                                    <label>Frecuencia De Pago</label>
                                    <select id="frecuencia" class="form-control">
                                      <option value="quincenal">Quincenal</option>
                                      <option value="mensual">Mensual</option>
                                    </select>
                                 </div>
                            </div>


                           <div class="form-group col-md-3">
                             <button class="btn btn-primary" type="submit" >Guardar</button>
                           </div>

</div>


<!--------------------- Pagar Cuota ------------------------------------------->
                 
                  
                
                   @endforeach
              </tbody>
           </table>


@include('pagination.default', ['paginator' => $clients])



<script>
    function myFunction() {
      var input, filter, table, tr, td, i;
      input = document.getElementById("myInput");
      filter = input.value.toUpperCase();
      table = document.getElementById("myTable");
      tr = table.getElementsByTagName("tr");
      for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[0];
        ta = tr[i].getElementsByTagName("td")[1];
        if (td||ta) {
          if (td.innerHTML.toUpperCase().indexOf(filter) > -1||ta.innerHTML.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
          } else {
            tr[i].style.display = "none";
          }
        }       
      }
    }


     window.onscroll = function() {scrollFunction()};
                function scrollFunction() {
                if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                  document.getElementById("myBtn").style.display = "block";
                    } else {
                      document.getElementById("myBtn").style.display = "none";}}
                function topFunction() {
                document.body.scrollTop = 0;
                document.documentElement.scrollTop = 0;}
 </script>  
 <button onclick="topFunction()" id="myBtn"><i class="fa fa-arrow-circle-up fa-lg" aria-hidden="true"></i></button>
        
@endsection

</html>

  
