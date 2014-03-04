/*
 * Función genérica que permite realizar una llamada Ajax
 * cuyo resultado se muestra como contenido de un Div
 */
function cargarBloque(nombreBloque, idDiv){
//    if($("#" + idDiv).length == 0){
        $.ajax({
            type: "POST",
            url: nombreBloque,
            success: function(data){
                $("#" + idDiv).html(data);
            }
        });
//    }
//    else{
//        alert("Div " + idDiv + " no existe");
//    }
}
