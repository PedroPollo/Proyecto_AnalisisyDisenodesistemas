$(document).ready(function() {
    var user_id, opcion;
    
    tablaContenidos = $('#tablaContenidos').DataTable({  
        "ajax":{            
            "url": "crudcontenidos.php", 
            "method": 'POST', //usamos el metodo POST
            "data":{opcion:opcion,clase:clase}, //enviamos opcion 4 para que haga un SELECT
            "dataSrc":""
        },
        "columns":[
            {"data": "contenido_id"},
            {"data": "titulo"},
            {"data": "descripcion"},
            {"data": "material"},
            {"defaultContent": "<div class='btn-group' fech_rege='group' aria-label='Basic mixed styles example'><button type='button' class='btn btn-success btnCalificar'>Ver trabajos</button></div>"}
        ]
    });     

     $(document).on("click",".btnCalificar",function(){
        fila=$(this);
        user_id = parseInt($(this).closest('tr').find('td:eq(0)').text());
        location.href = "evaluaciones.php?contenido="+user_id;
     });
         
    });    