<!DOCTYPE html>
<html lang="es">
@extends('layouts.app')
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

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

  

#myBtn {
  display: none;
  position: fixed;
  bottom: 20px;
  right: 30px;
  z-index: 99;
  font-size: 18px;
  border: none;
  outline: none;
  background-color: red;
  color: white;
  cursor: pointer;
  padding: 15px;
  border-radius: 4px;
}

#myBtn:hover {
  background-color: #555;
}

.sidenav {
    height: 100%;
    width: 0;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color: rgb(0, 0, 0);
    overflow-x: hidden;
    transition: 0.5s;
    padding-top: 60px;
}

.sidenav a {
    padding: 8px 8px 8px 10px;
    text-decoration: none;
    font-size: 18px;
    color: #ffffff;
    display: block;
    transition: 0.3s;
}
.tituloSim {
    padding: 30px 30px 30px 5px;
    
    font-size: 18px;
    color: #ffffff;
  }
.table-responsive{
    padding: 130px 130px 310px 15px;
    
    font-size: 18px;
    color: #000f00;
  }

.sidenav a:hover {
    color: #666666;
}

.sidenav .closebtn {
    position: absolute;
    top: 0;
    right: 25px;
    font-size: 36px;
    margin-left: 50px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 150px;}
  .sidenav a {font-size: 18px;}
}


</style>



<body class="fixed-nav  bg-light" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>


<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" style="text-decoration:none" onclick="closeNav()">&times;</a>

  <li class="nav-item" data-toggle="tooltip" data-placement="right" >
          <a class="nav-link" href="{{Route('home')}}">
            <i class="fa fa-fw fa-group"></i>
            <span class="nav-link-text">Clientes</span>
          </a>
        </li>
  <li class="nav-item" data-toggle="tooltip" data-placement="right" >
          <a href="simuladorC">
            <i class="fa fa-fw fa-dollar"></i>
            <span class="nav-link-text">Simular Credito</span>
          </a>
        </li>
          <li class="nav-item" data-toggle="tooltip" data-placement="right" >
          <a class="nav-link" href="tables.html">
            <i class="fa fa-fw fa-dollar"></i>
            <span class="nav-link-text">Añadir Prestamo</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" >
          <a class="nav-link" href="tables.html">
            <i class="fa fa-fw fa-dollar"></i>
            <span class="nav-link-text">Pago De Prestamo</span>
          </a>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" >
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-address-book-o"></i>
            <span class="nav-link-text">Cliente</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents">
            <li>
              <a href="{{Route('client.create')}}">Crear Perfil</a>
            </li>
            <li>
              <a href="{{Route('client.index')}}">Actualizar Perfil</a>
            </li>
            <li>
              <a href="cards.html">Visualizar Perfil</a>
            </li>
          </ul>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseExamplePages" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-file"></i>
            <span class="nav-link-text">Informes</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseExamplePages">
            <li>
              <a href="{{ route('home') }} ">Quincenal</a>
            </li>
            <li>
              <a href="register.html">Mensual</a>
            </li>
            
            <li>
              <a href="register.html">Ingresos Por Intereses</a>
           </li>
          </ul>
          </li>

           <li class="nav-item" data-toggle="tooltip" data-placement="right" >
          <a class="nav-link" href="{{Route('cContrasena')}}">
            <i class="fa fa-fw fa-key"></i>
            <span class="nav-link-text">Cambiar Contaseña</span>
          </a>
        </li>
</div>



<span style= "font-size:30px; cursor:pointer; color:rgb(220, 220, 221, 1);" onclick="openNav()">&#9776; PRESTAFAMI</span>

<script>
function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}
</script>



  <!-- ALERTA DE MESSAGES------------------------------------------------------------------------>


  <!--Opciones Salir/Cambiar clave-->
      

      <ul class="navbar-nav ml-auto">
          <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i>Salir</a>
        </li>
      </ul>
  </nav>
 
  @yield('utility')

  

</body>

    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">¿Desea Cerrar Sesión?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">x</span>
            </button>
          </div>
          <div class="modal-body"> Seleccione "Salir" para finalizar su sesión actual.</div>
          <div class="modal-footer">
            <button class="btn btn-primary" type="button" data-dismiss="modal">Cancelar</button>
            <a class="btn btn-danger" href="{{ route('logout') }}">
                                        {{(' Salir ') }}
                                    </a>
                                </div>
             
          </div>
        </div>
      </div>
    </div>

</html> 