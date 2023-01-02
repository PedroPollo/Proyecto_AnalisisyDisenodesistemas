$(document).ready(function() {
    var user_id, opcion;

    
    tablaEvaluaciones = $('#tablaEvaluaciones').DataTable({  
        "ajax":{            
            "url": "crudevaluaciones.php", 
            "method": 'POST', //usamos el metodo POST
            "data":{contenido:contenido}, //enviamos opcion 4 para que haga un SELECT
            "dataSrc":""
        },
        "columns":[
            {"data": "evaluacion_id"},
            {"data": "titulo"},
            {"data": "descripcion"},
            {"data": "fecha"},
            {"data": "porcentaje"},
            {"defaultContent": "<div class='btn-group' fech_rege='group' aria-label='Basic mixed styles example'><button type='button' class='btn btn-warning btnEntregas'>Ver Entregas</button></div>"}
        ]
    });     
     
    $(document).on("click",".btnEntregas",function(){
        fila=$(this);
        user_id = parseInt($(this).closest('tr').find('td:eq(0)').text());
        location.href = "entregas.php?evaluacion="+user_id;
     });
         
    });    