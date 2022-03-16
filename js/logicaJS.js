
/*
Al cargar la pagina en cualquier momento se valida la existencia de cookies
(Estado) tiene dos valores (1) y (2) siendo (2) el estado de (pendiente) 
según la base de datos luego PHP hará la consulta SQL*/

window.onload = function() {
    if(getCookie("Estado")==null)
    {
       document.cookie="Estado=2";
      
       
       location.reload();
    }
   
    if(getCookie("Estado")=="2")
       document.getElementById("estado").textContent="Ver solicitudes procesadas";
   else if(getCookie("Estado")=="1")
   document.getElementById("estado").textContent="Ver solicitudes pendientes";
   
   };




/*
Evento de botón para establecer la cookie (Estado) con un valor distinto
cambiar el texto del botón y recargar la pagina.
*/
document.getElementById('estado').onclick = function() {
     
      
   var a = getCookie("Estado");
   if(a=="1")
   {
     
       document.cookie="Estado=2";
       document.getElementById("estado").textContent="Ver solicitudes pendientes";
       location.reload();
   }
   
   else if(a=="2")
   {
       document.cookie="Estado=1";
       
       location.reload();
   }
      
   }
   
/*
Funcion para obtener la o las cookies de la pagina web. No importa si existen varias cookies dentro 
de la pagina web porque se compara el parametro con las cookies existentes
*/
   
   function getCookie(name) {
           var cookieArr = document.cookie.split(";");
       
           for(var i = 0; i < cookieArr.length; i++) {
               var cookiePair = cookieArr[i].split("=");
       
               if(name == cookiePair[0].trim()) {
                   return decodeURIComponent(cookiePair[1]);
               }
           }
       
           return null;
       }



/*Evento de botón para abrir o cerrar el cuadro de dialogo <dialog>*/
function dialogo(){
var dialog = document.getElementById('favDialog');

    document.getElementById('alquilar').onclick = function() {
        dialog.show();
        }
        
        document.getElementById('cerrar').onclick=function(){
            dialog.close();
        }
}
