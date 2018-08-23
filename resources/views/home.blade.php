@extends('layouts.admin')
  @section('utility')
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

         <table class= "table" id="myTable">
         <tr class="header">
             <th style="width:15%;">Cédula</th>
             <th style="width:15%;">Nombre</th>
             <th style="width:15%;">Apellido</th>
             <th style="width:15%;">Teléfono</th>
             <th style="width:18%;">E-mail</th>
             <th style="width:15%;">Dirección</th>
             <th style="width:15%;">Acción</th>

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
                     
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Visualiza{{$client->id}}"><i class="fa fa-tripadvisor fa-lg"></i></button>
                      
                      <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#{{$client->id}}"> <i class="fa fa-trash-o fa-lg"></i></button>

                      <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#Editar{{$client->id}}"><i class="fa fa-pencil-square-o fa-lg"></i></button>
                      
                    </div>
                  </td>

                  <!-- Modal Eliminar -->
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

<style>
.modal-content{font:normal 15px/15px verdana;
    heigth:500px;
    padding:30px 30px 30px 30px;
    }

.pagination {
    display: inline-block;
}

.pagination a {
    color: black;
    float: left;
    padding: 8px 16px;
    text-decoration: none;
}

.pagination a.active {
    background-color: #4CAF50;
    color: white;
}

.pagination a:hover:not(.active) {background-color: #ddd;}
</style>

 <!-- Modal Visualizar -->
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
                        <body class="bg-dark">
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
                                        <label ">Email</label>
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
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>   
                
                <!-- Modal Editar -->
                
                    <div class="modal fade bd-example-modal-fa-lg" id="Editar{{$client->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-header " >
                          <h5 class="modal-title " id="exampleModalCenterTitle">Editar cliente</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <div class="modal-body">
                            <div class="form-group">
                              <div class="form-row">
                                 <div class="col-md-4">
                        <form method="POST" action="{{ route('clientupdate') }}">
                        {!! csrf_field() !!}
                        <input type="hidden" name="id" value="{{ $client->id }}">
                        <div class="form-group">
                          <div class="form-row">
                             <div class="col-md-7">
                              <label>Cédula</label>
                              <input class="form-control" type="text" name="cedula" value="{{$client->cedula}}">
                            </div>
                             <div class="col-md-5">
                              <label >Teléfono</label>
                              <input class="form-control" type="text" name="phone" value="{{$client->phone}}">
                            </div>
                            <div class="col-md-6">
                              <label >Nombre</label>
                              <input class="form-control"  type="text" name="name" value="{{$client->name}}">
                            </div>
                            <div class="col-md-6">
                              <label >Apellidos</label>
                              <input class="form-control" type="text"  name="lastName"  value="{{$client->lastName}}">
                            </div>
                          </div>
                        </div>

                        <div class="form-group">
                          <div class="form-row">
                          <div class="col-md-4">
                          <label ">Email</label>
                          <input class="form-control" name="email" type="email" value="{{$client->email}}"> 
                        </div>
                      
                            <div class="col-md-4">
                              <label >Direccion de Residencia</label>
                              <input class="form-control" name="address" type="text" value="{{$client->address}}">
                            </div>
                      </div>
                      </div>
                      @foreach($guarantors as $guarantor)
                        @if($guarantor->id == $client->guarantor_id)
                        <h5>Referencia Personal</h5>
                       <div class="form-group">
                          <div class="form-row">           
                          <div class="col-md-4">
                          <label >Nombre Completo </label>
                          <input class="form-control" name="guarantorName" type="text" value="{{$guarantor->name}}" >
                        </div>

                            <div class="col-md-4">
                              <label >Apellidos</label>
                              <input class="form-control" name="guarantorLastName" type="text" value="{{$guarantor->lastName}}">
                            </div>

                            <div class="col-md-3">
                              <label>Teléfono</label>
                              <input class="form-control" name="guarantorPhone" type="text"  value="{{$guarantor->phone}}">
                             </div>
                          </div>
                      </div>
                      </div>
                        @endif
                      @endforeach
                    
                        <button class="btn btn-primary" type="submit" >Registrar</button>
                      </form>
                      </div>
                    </div>
                  </div>
                </div>
              @endforeach
              </tbody>

              <div> {!! $clients->render() !!} </div>
              
            </table>
            
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
</script>  
          </div>
   
        <button onclick="topFunction()" id="myBtn">↑</button>
        
          <script>
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

</div>


<div class="card-body">
    <div class="row">
      <div class="col-sm-12 col-md-7">
        <div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate">
          <ul class="pagination">
            <li class="paginate_button page-item previous disabled" id="dataTable_previous">
              <a href="#" aria-controls="dataTable" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li>

              <li class="paginate_button page-item active">
                <a href="{{ route('client.store') }} " aria-controls="dataTable" data-dt-idx="1" tabindex="0" class="page-link" >1</a>

              </li><li class="paginate_button page-item ">
                <a href="{{ route('client.store') }}" aria-controls="dataTable" data-dt-idx="2" tabindex="0" class="page-link">2</a>

              </li><li class="paginate_button page-item ">
                <a href="#" aria-controls="dataTable" data-dt-idx="3" tabindex="0" class="page-link">3</a></li>

              <li class="paginate_button page-item ">
                <a href="#" aria-controls="dataTable" data-dt-idx="4" tabindex="0" class="page-link">4</a></li>

              <li class="paginate_button page-item ">
                <a href="#" aria-controls="dataTable" data-dt-idx="5" tabindex="0" class="page-link">5</a></li>

              <li class="paginate_button page-item ">
                <a href="#" aria-controls="dataTable" data-dt-idx="6" tabindex="0" class="page-link">6</a></li>
                
              <li class="paginate_button page-item next" id="dataTable_next">
                <a href="#" aria-controls="dataTable" data-dt-idx="7" tabindex="0" class="page-link">Next</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


         <footer class="sticky-footer">
      <div class="container bg-light">
        <div class="text-center">
          <small>COOPERATIVA MULTIACTIVA PARA El APOYO FAMILIAR</small>
        </div>
      </div>

    </footer>
@endsection

  
