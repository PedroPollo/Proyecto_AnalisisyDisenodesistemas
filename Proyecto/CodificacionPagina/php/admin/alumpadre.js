$(document).ready(function() {
    var user_id, opcion;
    opcion = 4;   

    
    tablaalumprof = $('#tablaalumprof').DataTable({  
        "ajax":{            
            "url": "crudalumpadre.php", 
            "method": 'POST', //usamos el metodo POST
            "data":{opcion:opcion}, //enviamos opcion 4 para que haga un SELECT
            "dataSrc":""
        },
        "columns":[
            {"data": "procesop_id"},
            {"data": "nombre_alumno"},
            {"data": "nombre"},
            {"defaultContent": "<div class='btn-group' fech_rege='group' aria-label='Basic mixed styles example'><button type='button' class='btn btn-danger btnBorrar'>Eliminar</button>"}
        ]
    });     
     
    var fila; //captura la fila, para editar o eliminar
//submit para el Alta y Actualización
$('#formalumprof').submit(function(e){                         
    e.preventDefault(); //evita el comportambiento normal del submit, es decir, recarga total de la página
    alumno = $.trim($('#alumno').val());   
    padre = $.trim($('#padre').val());                   
        $.ajax({
          url: "crudalumpadre.php",
          type: "POST",
          datatype:"json",    
          data:  {user_id:user_id, alumno:alumno,opcion:opcion, padre:padre},    
          success: function(data) {
            tablaalumprof.ajax.reload(null, false);
           }
        });			        
    $('#modalCRUD').modal('hide');											     			
});
    
    //para limpiar los campos antes de dar de Alta una Persona
    $("#btnNuevo").click(function(){
        opcion = 1; //alta           
        user_id=null;
        $("#formprofmat").trigger("reset");
        $(".modal-header").css( "background-color", "#fff");
        $(".modal-header").css( "color", "black" );
        $(".modal-title").text("Nueva Alumno-Padre");
        $('#modalCRUD').modal('show');		    
    });
    
    
    //Borrar
    $(document).on("click", ".btnBorrar", function(){
        fila = $(this);           
        user_id = parseInt($(this).closest('tr').find('td:eq(0)').text()) ;		
        opcion = 3; //eliminar        
        var respuesta = confirm("¿Está seguro de borrar el registro "+user_id+"?");                
        if (respuesta) {            
            $.ajax({
              url: "crudalumpadre.php",
              type: "POST",
              datatype:"json",    
              data:  {opcion:opcion, user_id:user_id},    
              success: function() {
                  tablaalumprof.row(fila.parents('tr')).remove().draw();                  
               }
            });	
        }
     });
         
    });    