<!DOCTYPE html>
<html lang="es">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
 
    <style>
    input.texto{font:normal 15px/15px verdana;
    heigth:15px;
    border:solid 1px black;
    text-align:right;
    position:center;
    left:150px;
    padding:2px 2px 2px 2px;
    }
    table, td{font:normal 20px/20px verdana;
    heigth:20px;
    border:solid 1px black;
    text-align:center;
    position:center;
 
    left:10px;
    padding:5px 5px 5px 5px;
    }
    input#calcular{font:normal 15px/15px verdana; 
    heigth:50px;
    border:solid 1px black;
    text-align:center;
    }
 
    form{font:normal 15px/30px verdana;}
    </style>
<body>

<div>
   <h2>SIMULADOR DE CREDITO</h2>  

<script>
 
function validar(e,punto) {
    tecla=(document.all) ? e.keyCode : e.which;
     if(tecla<48 || tecla>57){
      if(punto && (tecla==46 || tecla==44)){
    return true;
    }
    return false}
 
 
}
 
function calcula(){
 
f=document.forms[0];
plazo = 12;
/*plazo=(f.plazo[0].checked)?f.plazo[0].value:f.plazo[1].value; */
 
interesMensual=parseFloat(f.intereses.value)/parseInt(plazo);
pagoTotal=parseFloat(f.capital.value)+parseFloat(f.capital.value*f.cuotas.value*interesMensual/100);
codigo="<table border=1>";
codigo+="<tr>";
codigo+="<td>N° Cuota</td>";
codigo+="<td>Cuota</td>";
codigo+="<td>Amortización</td>";
codigo+="<td>Interés</td>";
codigo+="<td>Falta por pagar</td>";

falta=pagoTotal;
 
for(a=1;a<=f.cuotas.value;a++){
 
cuota=Math.ceil(pagoTotal/f.cuotas.value*100)/100;
amortizacion=parseInt(f.capital.value/f.cuotas.value*100)/100;
interes=parseInt(100*(cuota-amortizacion))/100;
falta=parseInt(100*(falta-cuota))/100;
 
codigo+="<tr>";
codigo+="<td>"+a+"</td>";
codigo+="<td>";
if(a==f.cuotas.value){cuota=parseInt(100*(cuota+falta))/100;falta=0}
codigo+=cuota
codigo+="</td>";
codigo+="<td>";
codigo+=amortizacion
codigo+="</td>";
codigo+="<td>";
codigo+=interes;
codigo+="</td>";
codigo+="<td>";
codigo+=falta;
codigo+="</td>";
codigo+="</tr>";
}
codigo+="</table>";
pepe.innerHTML=codigo;
}
function desenfoque(esto){
esto.value=esto.value.split(',').join('.');
if(isNaN(esto.value)||esto.value<0){
esto.value=''
}
}
</script>
 
   
</head>



  <div id="tablero">
  <form action="javascript:calcula(this.form)">
  <strong>Capital:</strong>
    <input
      class="texto"
      type="text"
      name="capital"
      value="0"
      size="10"
      maxlength="10"
      onkeypress="return validar(event,true)"
      onBlur="desenfoque(this)"
      onFocus="if(this.value==0){this.value=''}"><br>
 
  <strong>Interés:</strong>
    <select name="intereses" id="intereses">
    <option value="11.02">Capital Linear</option>
    <option value="16.02">Saldo Insoluto</option>
    <option value="31.02">Amortizado</option>

  </select><br>
 
  <strong>Nº de cuotas:</strong>
    <input
    class="texto"
    onkeypress="return validar(event)"
    type="text"
    name="cuotas"
    value="0"
    size="3"
    maxlength="3"
    onBlur="desenfoque(this)"
    onFocus="if(this.value==0){this.value=''}"><br>
      <input type="submit" name="calcular" id="calcular" value="Calcular">
    </form>
  </div>
<div id="pepe"></div>
 
</div>




</body>
</html>
