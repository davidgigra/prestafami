<!DOCTYPE html>
<html lang="es">
@extends('layouts.admin')
@section('utility')
<link rel="stylesheet" href="style.css">
<br></br>


<body class="bg-dark">
<div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Simulador De Credito</div>
      <div class="card-body">


  <ol class="breadcrumb badge-light">
  <li class="breadcrumb-item  ">
  <a href="{{Route('home')}}">Inicio</a></li>
  <li class="breadcrumb-item active">Simulador De Credito</li>
  </ol>


        <form method="POST" action="{{ route('client.store') }}">
          {!! csrf_field() !!}
          <div class="form-group">
            <div class="form-row">
               
               <div class="col-md-3">
                <label >Capital</label>
                <input type="number" class="form-control" id="capital" placeholder="Ingrese el Capital">    
              </div>

              <div class="col-md-3">
                <label >Numero De Cuotas</label>
                <input type="number"  class="form-control " id="cuotas" placeholder="Numero de cuotas">
              </div>

              <div class="col-md-3">
                <label >Porcentaje De Interes</label>
                <input type="number"  class="form-control " id="interes" placeholder="porcentaje de Interes">
              </div>

            <div class="form-group col-md-4"><br></br>
              <label>Metodo</label>
              <select id="metodo" class="form-control" placeholder="selecione">
                <option value="linear">Capital Linear</option>
                <option value="amortizado">Amortizado</option>
                <option value="altermino">Capital al termino</option>
              </select>
           </div>

           <div class="form-group col-md-4"><br></br>
              <label>Frecuencia De Pago</label>
              <select id="frecuencia" class="form-control">
                <option value="quincenal">Quincenal</option>
                <option value="mensual">Mensual</option>
              </select>
           </div>

<!------------------------------- Button modal ------------------------>
		
		</div>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" onclick="simuladorCredito()">Calcular</button>
		</form>
		<div class="mb-12"> </div>

<!--------------------------------- Modal ---------------------------------------------------->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Simulador De Credito</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>


      

     
      <div class="modal-body">     
		  <div class="form-group">
            <div id="imprimible">
		    <label >Total A Pagar</label>
		    <label class="form-control col-md-4" id="totalPagar"></label>
		    <table class="table">
			  <thead>
            	<tr>
                   <th style="width:5%;">#</th>
                   <th style="width:5%;">Total A Pagar</th>
                   <th style="width:5%;">Fecha De Vencimiento</th>
                   <th style="width:5%;">Abono Al Capital</th>
                   <th style="width:5%;">Intereses</th>
                </tr>
			  </thead>
			  <tbody id=myTable>
			    
			  </tbody>
			</table>
		    </div>
		  </div>
         </div>
        <div class="col-md-3">
            <a class="btn btn-primary" id="btnImprimirDiv"><i class="fa fa-print fa-lg"></i>Imprimir</a>
            
        </div>
     </div>
  </div>
</div>


<script>
        function imprimirElemento(elemento) {
          var ventana = window.open('', 'PRINT', 'height=600,width=720');
          ventana.document.write('<html><head><title>' + document.title + '</title>');
          ventana.document.write('<link rel="stylesheet" href="imprimir.css">'); //Cargamos otra hoja, no la normal
          ventana.document.write('</head><body >');
          ventana.document.write(elemento.innerHTML);
          ventana.document.write('</body></html>');
          ventana.document.close();
          ventana.focus();
          ventana.onload = function() {
            ventana.print();
            ventana.close();
          };
          return true;
        }


        document.querySelector("#btnImprimirDiv").addEventListener("click", function() {
          var div = document.querySelector("#imprimible");
          imprimirElemento(div);
        });

	function simuladorCredito(){
		var capital=Number(document.getElementById("capital").value);
        var cuotas=Number(document.getElementById("cuotas").value);
        var interes=Number(document.getElementById("interes").value);
        var metodo=document.getElementById("metodo").value;
        var frecuencia=document.getElementById("frecuencia").value;

        var element = document.getElementById("myTable");
		while (element.firstChild) {
		  element.removeChild(element.firstChild);
		}

		var hoy = new Date(); 

        if(metodo=="linear"){
        	if(frecuencia=="mensual"){
            	var total = capital+((capital*(interes/100))*cuotas);
            	totalPagar.innerHTML=total.toFixed(1);
                for(var i=1;i<=cuotas;i++){
                    var x = document.createElement("TR");
                    x.setAttribute("id", String(i));
                    document.getElementById("myTable").appendChild(x);
                    //numero cuota
                    var ncuota = document.createElement("TH");
                    var vncuota = document.createTextNode(String(i));
                    ncuota.appendChild(vncuota);
                    document.getElementById(String(i)).appendChild(ncuota);
                    //total cuota
                    total = (capital/cuotas)+(capital*(interes/100));
                    var totalcuota = document.createElement("TD");
                    var vtotalCuota = document.createTextNode(total.toFixed(1));
                    totalcuota.appendChild(vtotalCuota);
                    document.getElementById(String(i)).appendChild(totalcuota);
                    // fechaVen
                    var dateVen = new Date(hoy.getFullYear(),hoy.getMonth()+i,hoy.getDate());
                    var fechaVen = document.createElement("TD");
                    var vfechaVen = document.createTextNode(String(dateVen.getDate())+"/"+String(dateVen.getMonth()+1)+"/"+String(dateVen.getFullYear()));
                    fechaVen.appendChild(vfechaVen);
                    document.getElementById(String(i)).appendChild(fechaVen);
                    //numero abonoCapital
                    total = capital/cuotas;
                    var abonoCapital = document.createElement("TD");
                    var vabonoCapital = document.createTextNode(total.toFixed(1));
                    abonoCapital.appendChild(vabonoCapital);
                    document.getElementById(String(i)).appendChild(abonoCapital);
                    //interes
                    total = (interes*capital)/100
                    var intereses = document.createElement("TD");
                    var vinteres = document.createTextNode(total.toFixed(1));
                    intereses.appendChild(vinteres);
                    document.getElementById(String(i)).appendChild(intereses);
                }
            }else{
                var total = capital+((capital*(interes/100))*cuotas);
            	totalPagar.innerHTML=total.toFixed(1);
                for(var i=1;i<=cuotas;i++){
                    var x = document.createElement("TR");
                    x.setAttribute("id", String(i));
                    document.getElementById("myTable").appendChild(x);
                    //numero cuota
                    var ncuota = document.createElement("TH");
                    var vncuota = document.createTextNode(String(i));
                    ncuota.appendChild(vncuota);
                    document.getElementById(String(i)).appendChild(ncuota);
                    //total cuota
                    total = (capital/cuotas)+(capital*(interes/200));
                    var totalcuota = document.createElement("TD");
                    var vtotalCuota = document.createTextNode(total.toFixed(1));
                    totalcuota.appendChild(vtotalCuota);
                    document.getElementById(String(i)).appendChild(totalcuota);
                    // fechaVen
                    var dateVen = new Date(hoy.getFullYear(),hoy.getMonth(),hoy.getDate()+(i*15));
                    var fechaVen = document.createElement("TD");
                    var vfechaVen = document.createTextNode(String(dateVen.getDate())+"/"+String(dateVen.getMonth()+1)+"/"+String(dateVen.getFullYear()));
                    fechaVen.appendChild(vfechaVen);
                    document.getElementById(String(i)).appendChild(fechaVen);
                    //numero abonoCapital
                    total = capital/cuotas;
                    var abonoCapital = document.createElement("TD");
                    var vabonoCapital = document.createTextNode(total.toFixed(1));
                    abonoCapital.appendChild(vabonoCapital);
                    document.getElementById(String(i)).appendChild(abonoCapital);
                    //interes
                    total = (interes*capital)/200
                    var intereses = document.createElement("TD");
                    var vinteres = document.createTextNode(total.toFixed(1));
                    intereses.appendChild(vinteres);
                    document.getElementById(String(i)).appendChild(intereses);
                }
            }
        }else if (metodo=="amortizado"){
        	if(frecuencia=="mensual"){
            	var total = cuotas*capital*((interes/100)/(1-Math.pow((1+(interes/100)),(-1*cuotas))));//--
            	totalPagar.innerHTML=total.toFixed(1);
            	var cuota = capital*((interes/100)/(1-Math.pow((1+(interes/100)),(-1*cuotas))));
                for(var i=1;i<=cuotas;i++){
                    var x = document.createElement("TR");
                    x.setAttribute("id", String(i));
                    document.getElementById("myTable").appendChild(x);
                    //numero cuota
                    var ncuota = document.createElement("TH");
                    var vncuota = document.createTextNode(String(i));
                    ncuota.appendChild(vncuota);
                    document.getElementById(String(i)).appendChild(ncuota);
                    //total cuota
                    var totalcuota = document.createElement("TD");
                    var vtotalCuota = document.createTextNode(cuota.toFixed(1));
                    totalcuota.appendChild(vtotalCuota);
                    document.getElementById(String(i)).appendChild(totalcuota);
                    // fechaVen
                    var dateVen = new Date(hoy.getFullYear(),hoy.getMonth()+i,hoy.getDate());
                    var fechaVen = document.createElement("TD");
                    var vfechaVen = document.createTextNode(String(dateVen.getDate())+"/"+String(dateVen.getMonth()+1)+"/"+String(dateVen.getFullYear()));
                    fechaVen.appendChild(vfechaVen);
                    document.getElementById(String(i)).appendChild(fechaVen);
                    //abonoCapital
                    var abono = cuota - (capital*(interes/100));//--
                    var abonoCapital = document.createElement("TD");
                    var vabonoCapital = document.createTextNode(abono.toFixed(1));
                    abonoCapital.appendChild(vabonoCapital);
                    document.getElementById(String(i)).appendChild(abonoCapital);
                    //interes
                    total = (capital*(interes/100))//--
                    var intereses = document.createElement("TD");
                    var vinteres = document.createTextNode(total.toFixed(1));
                    intereses.appendChild(vinteres);
                    document.getElementById(String(i)).appendChild(intereses);
                    capital = capital - abono;
                }
            }else{
                var total = cuotas*capital*((interes/200)/(1-Math.pow((1+(interes/200)),(-1*cuotas))));//--
            	totalPagar.innerHTML=total.toFixed(1);
            	var cuota = capital*((interes/200)/(1-Math.pow((1+(interes/200)),(-1*cuotas))));
                for(var i=1;i<=cuotas;i++){
                    var x = document.createElement("TR");
                    x.setAttribute("id", String(i));
                    document.getElementById("myTable").appendChild(x);
                    //numero cuota
                    var ncuota = document.createElement("TH");
                    var vncuota = document.createTextNode(String(i));
                    ncuota.appendChild(vncuota);
                    document.getElementById(String(i)).appendChild(ncuota);
                    //total cuota
                    var totalcuota = document.createElement("TD");
                    var vtotalCuota = document.createTextNode(cuota.toFixed(1));
                    totalcuota.appendChild(vtotalCuota);
                    document.getElementById(String(i)).appendChild(totalcuota);
                    // fechaVen
                    var dateVen = new Date(hoy.getFullYear(),hoy.getMonth(),hoy.getDate()+(i*15));
                    var fechaVen = document.createElement("TD");
                    var vfechaVen = document.createTextNode(String(dateVen.getDate())+"/"+String(dateVen.getMonth()+1)+"/"+String(dateVen.getFullYear()));
                    fechaVen.appendChild(vfechaVen);
                    document.getElementById(String(i)).appendChild(fechaVen);
                    //abonoCapital
                    var abono = cuota - (capital*(interes/200));//--
                    var abonoCapital = document.createElement("TD");
                    var vabonoCapital = document.createTextNode(abono.toFixed(1));
                    abonoCapital.appendChild(vabonoCapital);
                    document.getElementById(String(i)).appendChild(abonoCapital);
                    //interes
                    total = (capital*(interes/200))//--
                    var intereses = document.createElement("TD");
                    var vinteres = document.createTextNode(total.toFixed(1));
                    intereses.appendChild(vinteres);
                    document.getElementById(String(i)).appendChild(intereses);
                    capital = capital - abono;
                }
            }
        }else {
        	if(frecuencia=="mensual"){
            	var total = capital+((capital*(interes/100))*cuotas);
            	totalPagar.innerHTML=total.toFixed(1);
                for(var i=1;i<=cuotas;i++){
                    var x = document.createElement("TR");
                    x.setAttribute("id", String(i));
                    document.getElementById("myTable").appendChild(x);
                    //numero cuota
                    var ncuota = document.createElement("TH");
                    var vncuota = document.createTextNode(String(i));
                    ncuota.appendChild(vncuota);
                    document.getElementById(String(i)).appendChild(ncuota);
                    //total cuota
                    if(i==cuotas){
                    total = capital+(capital*(interes/100));
                	}else{
                		total = capital*(interes/100);
                	}
                    var totalcuota = document.createElement("TD");
                    var vtotalCuota = document.createTextNode(total.toFixed(1));
                    totalcuota.appendChild(vtotalCuota);
                    document.getElementById(String(i)).appendChild(totalcuota);
                    // fechaVen
                    var dateVen = new Date(hoy.getFullYear(),hoy.getMonth()+i,hoy.getDate());
                    var fechaVen = document.createElement("TD");
                    var vfechaVen = document.createTextNode(String(dateVen.getDate())+"/"+String(dateVen.getMonth()+1)+"/"+String(dateVen.getFullYear()));
                    fechaVen.appendChild(vfechaVen);
                    document.getElementById(String(i)).appendChild(fechaVen);
                    //numero abonoCapital
                    if(i==cuotas){
                    total = capital;
                	}else{
                		total = 0;
                	}
                    var abonoCapital = document.createElement("TD");
                    var vabonoCapital = document.createTextNode(total.toFixed(1));
                    abonoCapital.appendChild(vabonoCapital);
                    document.getElementById(String(i)).appendChild(abonoCapital);
                    //interes
                    total = (interes*capital)/100
                    var intereses = document.createElement("TD");
                    var vinteres = document.createTextNode(total.toFixed(1));
                    intereses.appendChild(vinteres);
                    document.getElementById(String(i)).appendChild(intereses);
                }
            }else{
                var total = capital+((capital*(interes/200))*cuotas);
            	totalPagar.innerHTML=total.toFixed(1);
                for(var i=1;i<=cuotas;i++){
                    var x = document.createElement("TR");
                    x.setAttribute("id", String(i));
                    document.getElementById("myTable").appendChild(x);
                    //numero cuota
                    var ncuota = document.createElement("TH");
                    var vncuota = document.createTextNode(String(i));
                    ncuota.appendChild(vncuota);
                    document.getElementById(String(i)).appendChild(ncuota);
                    //total cuota
                    if(i==cuotas){
                    total = capital+(capital*(interes/200));
                	}else{
                		total = capital*(interes/200);
                	}
                    var totalcuota = document.createElement("TD");
                    var vtotalCuota = document.createTextNode(total.toFixed(1));
                    totalcuota.appendChild(vtotalCuota);
                    document.getElementById(String(i)).appendChild(totalcuota);
                    // fechaVen
                    var dateVen = new Date(hoy.getFullYear(),hoy.getMonth(),hoy.getDate()+(i*15));
                    var fechaVen = document.createElement("TD");
                    var vfechaVen = document.createTextNode(String(dateVen.getDate())+"/"+String(dateVen.getMonth()+1)+"/"+String(dateVen.getFullYear()));
                    fechaVen.appendChild(vfechaVen);
                    document.getElementById(String(i)).appendChild(fechaVen);
                    //numero abonoCapital
                    if(i==cuotas){
                    total = capital;
                	}else{
                		total = 0;
                	}
                    var abonoCapital = document.createElement("TD");
                    var vabonoCapital = document.createTextNode(total.toFixed(1));
                    abonoCapital.appendChild(vabonoCapital);
                    document.getElementById(String(i)).appendChild(abonoCapital);
                    //interes
                    total = (interes*capital)/200
                    var intereses = document.createElement("TD");
                    var vinteres = document.createTextNode(total.toFixed(1));
                    intereses.appendChild(vinteres);
                    document.getElementById(String(i)).appendChild(intereses);
                }
            }
        }
    }
        
</script>
