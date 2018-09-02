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
          <a href="home">Inicio</a></li>
        </ol> 
  
<form action="/action_page.php">
  Birthday: <input type="date" name="bday">
  <input type="submit">
</form>


<div class="container">
    <div class="row">
        <div class='col-sm-6'>
            <div class="form-group">
                <div class='input-group date' id='datetimepicker2'>
                    <input type='text' class="form-control" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            $(function () {
                $('#datetimepicker2').datetimepicker({
                    locale: 'ru'
                });
            });
        </script>
    </div>
</div>


</html>