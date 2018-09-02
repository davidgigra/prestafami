@extends('layouts.admin')
  @section('utility')
<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->
  <div class="card mb-12 ">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

        <ol class="breadcrumb badge-light">
          <li class="breadcrumb-item  ">
          <a href="home">Inicio</a></li>
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
       <th style="width:18%;">E-mail</th>
       <th style="width:15%;">Dirección</th>
       <th style="width:15%;">Acción</th>
    </tr>
 
              <tfoot>
                <tr>
                  <th>Cédula</th>
                  <th>Nombre</th>
                  <th>Apellido</th>
                  <th>Teléfono</th>
                  <th>E-mail</th>
                  <th>Dirección</th>
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
                     
                      <button type="button" title="Visualizar Cliente" class="btn btn-primary" data-toggle="modal" data-target="#Visualiza{{$client->id}}"><i class="fa fa-tripadvisor fa-lg"></i></button>
                      
                      <button type="button" title="Eliminar Cliente" class="btn btn-danger" data-toggle="modal" data-target="#{{$client->id}}"> <i class="fa fa-trash-o fa-lg"></i></button>

                      <button type="button" title="Editar cliente" class="btn btn-warning" data-toggle="modal" data-target="#Editar{{$client->id}}"><i class="fa fa-pencil-square-o fa-lg"></i></button>
                      
                    </div>
                  </td>
                 </tr>

<!--------------------------- Modal Eliminar ------------------------------------------------------->
          <div class="modal fade" id="{{$client->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <i class="fa fa-spinner fa-pulse fa-lg fa-fw"></i>
                          <h5 class="modal-title" id="exampleModalCenterTitle">Eliminar Cliente</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          ¿Desea eliminar al usuario {{$client->name." ".$client->lastName}}?
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-primary" data-dismiss="modal">cancelar</button>
                          <form method="POST" action="{{Route('clientdestroy')}}">
                            {!! csrf_field() !!}
                          <input type="hidden" name="id" value="{{ $client->id }}">
                          <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                        </div>
                      </div>
                    </div>
                  </div>

<!-- ------------------Modal Visualizar ------------------------------------------------->
                  <div class="modal fade bd-example-modal-fa-5x" id="Visualiza{{$client->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-header badge-light" >
                          <h5 class="modal-title " id="exampleModalCenterTitle">Visualizar Cliente</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                        <body class="badge-light">
                        <div class="container">
                                  <div class="form-group">
                                    <div class="form-row">
                                       <div class="col-md-5">
                                        <label>Cédula</label>
                                        <input class="form-control" placeholder="{{$client->cedula}}" disabled>
                                        </div>

                                       <div class="col-md-5">
                                        <label >Teléfono</label>
                                        <input class="form-control" placeholder="{{$client->phone}}"disabled>
                                        <br><br/>
                                      </div>

                                      <div class="col-md-8">
                                        <label >Nombre Completo</label>
                                        <input class="form-control"  placeholder="{{$client->name.' '.$client->lastName}}"disabled>
                                        <br><br/>
                                      </div>
                                      
                                    <br><div class="col-md-8">
                                        <label ">E-mail</label>
                                        <input class="form-control" placeholder="{{$client->email}}"disabled>
                                        <br><br/>
                                    </div>

                                    <div class="col-md-8">
                                        <label >Direccion de Residencia</label>
                                        <input class="form-control" placeholder="{{$client->address}}"disabled>
                                      </div>
                                    </div>
                                  </div>
                                

                          <h5>Referencia Personal</h5>
                           <div class="form-group">
                              <div class="form-row">           
                              <div class="col-md-8">
                              <label >Nombre Completo </label>
                              @foreach($guarantors as $guarantor)
                                @if($guarantor->id == $client->guarantor_id)
                              <input class="form-control" placeholder="{{$guarantor->name}}"disabled>
                              <br><br/>
                            </div>

                            <div class="col-md-5">
                              <label>Teléfono</label>
                              <input class="form-control" placeholder="{{$guarantor->phone}}"disabled>
                              <br><br/>
                            </div>
                                @endif
                              @endforeach
                          </div>
                          </div>                         
                        </div>
                      </div>
                    </div>
                  </div> 
                </div>  



<!--------------------- Modal Editar ------------------------------------------->
                 
                    <div class="modal fade bd-example-modal-fa-5x" id="Editar{{$client->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-header badge-light" >
                          <h5 class="modal-title " id="exampleModalCenterTitle">Editar cliente</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                     
                      <div class="modal-body">
                            <div class="form-group">
                              <div class="form-row">
                                 <div class="col-md-20">
                        <form method="POST" action="{{ route('clientupdate') }}">
                        {!! csrf_field() !!}
                        <input type="hidden" name="id" value="{{ $client->id }}">
                        <div class="form-group">
                          <div class="form-row">
                             <div class="col-md-6">
                              <label>Cédula</label>
                              <input class="form-control" type="text" name="cedula" value="{{$client->cedula}}">
                            </div>

                             <div class="col-md-6">
                              <label >Teléfono</label>
                              <input class="form-control" type="text" name="phone" value="{{$client->phone}}">
                            </div> 

                            <div class="col-md-6"><br><br/>
                              <label >Nombre</label>
                              <input class="form-control"  type="text" name="name" value="{{$client->name}}">
                            </div>

                            <div class="col-md-6"><br><br/>
                              <label >Apellidos</label> 
                              <input class="form-control" type="text"  name="lastName"  value="{{$client->lastName}}">
                            </div>
                          </div>
                        </div>

                        <div class="form-group">
                          <div class="form-row">
                          <div class="col-md-7"><br>
                          <label ">E-mail</label>
                          <input class="form-control" name="email" type="email" value="{{$client->email}}"> 
                        </div>
                      
                            <div class="col-md-7"><br><br/>
                              <label >Dirección de Residencia</label>
                              <input class="form-control" name="address" type="text" value="{{$client->address}}">
                            </div>
                      </div>
                      </div>
                      @foreach($guarantors as $guarantor)
                        @if($guarantor->id == $client->guarantor_id)
                        <br><br/>
                        <h5>Referencia Personal</h5>
                       <div class="form-group">
                          <div class="form-row">           
                          <div class="col-md-6">
                          <label >Nombre Completo </label>
                          <input class="form-control" name="guarantorName" type="text" value="{{$guarantor->name}}" >
                        </div>

                            <div class="col-md-6">
                              <label >Apellidos</label>
                              <input class="form-control" name="guarantorLastName" type="text" value="{{$guarantor->lastName}}">
                            </div>

                            <div class="col-md-5"><br><br/>
                              <label>Teléfono</label>
                              <input class="form-control" name="guarantorPhone" type="text"  value="{{$guarantor->phone}}">
                             </div>
                          </div>
                      </div>
                      </div>
                    
                        @endif
                      @endforeach
                   
                        <div class="col-md-3">
                        <button class="btn btn-primary" type="submit" >Registrar</button> </div>
                         </form>
                      </div>
                    </div>
                  </div>
                </div>

                
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

  
