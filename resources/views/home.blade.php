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
  
        <input type="text" class="form-control col-md-3" id="myInput" onkeyup="myFunction()" placeholder="Buscar Clientes...">
        
        <table id="myTable">
         <tr class="header">
             <th style="width:18%;">Cedula</th>
             <th style="width:18%;">nombre</th>
             <th style="width:18%;">apellido</th>
             <th style="width:18%;">telefono</th>
             <th style="width:18%;">direccion</th>
             <th style="width:18%;">email</th>
             <th style="width:10%;">acción</th>

              <tfoot>
                <tr>
                  <th>Cedula</th>
                  <th>nombre</th>
                  <th>apellido</th>
                  <th>telefono</th>
                  <th>direccion</th>
                  <th>email</th>
                  <th>acción</th>
                </tr>
              </tfoot>
              <tbody>
             
              @foreach($clients as $client)
                <tr>
                  <td>{{$client->cedula}}</td>
                  <td>{{$client->name}}</td>
                  <td>{{$client->lastName}}</td>
                  <td>{{$client->phone}}</td>
                  <td>{{$client->address}}</td>
                  <td>{{$client->email}}</td>
                  <td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#{{$client->id}}">D</button></td>

                  <!-- Modal Eliminar -->
                  <div class="modal fade" id="{{$client->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
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
                          <form method="DELETE" action="{{Route('client.destroy', $client->id)}}">
                          <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                        </div>
                      </div>
                    </div>
                  </div>

                  
                @endforeach
            
              </tbody>
            </table>
            {!!$clients->render()!!}
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
         <footer class="sticky-footer">
      <div class="container bg-light">
        <div class="text-center">
          <small>COOPERATIVA MULTIACTIVA PARA El APOYO FAMILIAR</small>
        </div>
      </div>

    </footer>
@endsection

  
