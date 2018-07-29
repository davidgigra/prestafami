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
             <th style="width:20%;">Cedula</th>
             <th style="width:20%;">Name</th>
             <th style="width:20%;">Position</th>
             <th style="width:20%;">Office</th>
             <th style="width:20%;">Start date</th>
             <th style="width:20%;">Salary</th>

              <tfoot>
                <tr>
                  <th>Cedula</th>
                  <th>Name</th>
                  <th>Position</th>
                  <th>Office</th>
                  <th>Start date</th>
                  <th>Salary</th>
                </tr>
              </tfoot>
              <tbody>
             
                
                <tr>
                  <td>47</td>
                  <td>Hermione Butler</td>
                  <td>Regional Director</td>
                  <td>London</td>
                  <td>2011/03/21</td>
                  <td>$356,250</td>
                </tr>
                <tr>
                  <td>21</td>
                  <td>Lael Greer</td>
                  <td>Systems Administrator</td>
                  <td>London</td>
                  <td>2009/02/27</td>
                  <td>$103,500</td>
                </tr>
                <tr>
                  <td>30</td>
                  <td>Jonas Alexander</td>
                  <td>Developer</td>
                  <td>San Francisco</td> 
                  <td>2010/07/14</td>
                  <td>$86,500</td>
                </tr>
            
              </tbody>
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
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
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
@endsection

  
