


function abrir(value){
    var dialog = document.getElementById('favDialog');  
    var xhttp = new XMLHttpRequest();
     xhttp.onreadystatechange = function() {
         if (this.readyState == 4 && this.status == 200) {
             document.getElementById("imagen").src = this.responseText;
      
       
     }
   };
   
     xhttp.open("GET", "logica_alquiler.php?q="+value+"&opcion="+1,true);
     xhttp.send();
     
     
     var inputs = document.getElementsByClassName('btn_alquilar');
 
     for(var i = 0; i < inputs.length; i++){
   
         inputs[i].disabled = true;
     }
     
     //obtener cantidad de scooters disponibles cantidad_Alquiler
     var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
             document.getElementById("cantidad_Alquiler").max =this.responseText;
             document.getElementById("cantidad_Disponible").value=this.responseText;
       
      }
    };
      xhttp.open("GET", "logica_alquiler.php?q="+value+"&opcion="+2,true);
   xhttp.send();

   document.getElementById("cantidad_Alquiler").value=1;
   dialog.show();
 }
 
 function cerrar(){
    var dialog = document.getElementById('favDialog');
    var inputs = document.getElementsByClassName('btn_alquilar');
 
 
     
     
 
 
     for(var i = 0; i < inputs.length; i++){
   
         inputs[i].disabled = false;
     }
 
     document.getElementById("total").value=0;
     document.getElementById("tiempo").options[0].selected = 'selected';
    dialog.close();
    limpiar();

 }
 
 
 function reserva(){
    var dialog = document.getElementById('favDialog');  
    var codigo;
    var select = document.getElementById('tiempo');
    var value = select.options[select.selectedIndex].value;
    //parametros para la base de datos
    var nombre= document.getElementById("Nombre").value;
    var apellido= document.getElementById("Apellido").value;
    var cedula= document.getElementById("Cedula").value;
    var celular= document.getElementById("Celular").value;
    var correo= document.getElementById("Correo").value;
    var cantidad_scooter=document.getElementById("cantidad_Alquiler").value;
    var total=document.getElementById("total").value;
    const estado = 2;
    //----------------------------
    if(value==0)
        document.getElementById("error").innerHTML="Es obligatorio elegir un tiempo de alquiler";
    
    else if(value>0)
    {
        if((nombre==""||nombre==null) || (apellido==""||apellido==null)||(cedula==""||cedula==null)||(celular==""||celular==null)||(correo==""||correo==null))
        {
        document.getElementById("error").innerHTML="Rellene los campos";

        }
        else{
            var xhttp2 = new XMLHttpRequest();
            xhttp2.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById('cod_reserva').innerHTML=this.responseText;
             
            }
          };
            xhttp2.open("GET", "logica_alquiler.php?opcion="+3+"&nombre="+nombre+"&apellido="+apellido+"&cedula="+cedula+"&celular="+celular+"&correo="+correo+"&cantidad="+cantidad_scooter+"&total="+total+"&estado="+estado,true);
           // xhttp2.open("GET","logica_alquiler.php?opcion=3");
            xhttp2.send();
            dialog.close();
            var inputs = document.getElementsByClassName('btn_alquilar');
 
 
     
     
 
 
            for(var i = 0; i < inputs.length; i++){
          
                inputs[i].disabled = false;
            }

            codigo_reserva();
            limpiar();
            
        }
    }
 
 }


 function calcular()
 {  
    var select = document.getElementById('tiempo');
    var value = select.options[select.selectedIndex].value;
    var cantidad_scooter=document.getElementById("cantidad_Alquiler").value;
    var total=0;
    console.log(value);
    console.log(cantidad_scooter);

    if(value>0)
    {   
        document.getElementById("error").innerHTML="";

        if(value==1)
           total+=10;
           
        else if(value==2)
            total+=15;
           
        

        total=total*cantidad_scooter;
        document.getElementById("total").value=total;
    }

    else{
        document.getElementById("error").innerHTML="Es obligatorio elegir un tiempo de alquiler";
        document.getElementById("total").value=0;
    }



 } 


 function codigo_reserva()
 {
    var dialog = document.getElementById('dialogo_reserva');
    dialog.show();  

 }

 function cerrar_reserva()
 {
    var dialog = document.getElementById('dialogo_reserva');
    dialog.close();
    limpiar();
 }

function limpiar()
{
    document.getElementById("tiempo").options[0].selected = 'selected';
    //parametros para la base de datos
     document.getElementById("Nombre").value="";
    document.getElementById("Apellido").value="";
     document.getElementById("Cedula").value="";
    document.getElementById("Celular").value="";
     document.getElementById("Correo").value="";
    document.getElementById("cantidad_Alquiler").value="";
    document.getElementById("total").value="0";
}