$(document).ready(function() {
    var user_id, opcion;
    opcion = 4;   

    
    tablaMaterias = $('#tablaMaterias').DataTable({  
        "ajax":{            
            "url": "crudmaterias.php", 
            "method": 'POST', //usamos el metodo POST
            "data":{opcion:opcion}, //enviamos opcion 4 para que haga un SELECT
            "dataSrc":""
        },
        "columns":[
            {"data": "materia_id"},
            {"data": "nombre_materia"},
            {"defaultContent": "<div class='btn-group' fech_rege='group' aria-label='Basic mixed styles example'><button type='button' class='btn btn-danger btnBorrar'>Eliminar</button><button type='button' class='btn btn-warning btnEditar'>Editar</button>"}
        ]
    });     
     
    var fila; //captura la fila, para editar o eliminar
//submit para el Alta y Actualización
$('#formMaterias').submit(function(e){                         
    e.preventDefault(); //evita el comportambiento normal del submit, es decir, recarga total de la página
    materia = $.trim($('#materia').val());                     
        $.ajax({
          url: "crudmaterias.php",
          type: "POST",
          datatype:"json",    
          data:  {user_id:user_id, materia:materia ,opcion:opcion},    
          success: function(data) {
            tablaMaterias.ajax.reload(null, false);
           }
        });			        
    $('#modalCRUD').modal('hide');											     			
});
    
    //para limpiar los campos antes de dar de Alta una Persona
    $("#btnNuevo").click(function(){
        opcion = 1; //alta           
        user_id=null;
        $("#formMaterias").trigger("reset");
        $(".modal-header").css( "background-color", "#fff");
        $(".modal-header").css( "color", "black" );
        $(".modal-title").text("Alta de materia");
        $('#modalCRUD').modal('show');		    
    });
    
    //Editar        
    $(document).on("click", ".btnEditar", function(){		        
        opcion = 2;//editar
        fila = $(this).closest("tr");	
        user_id = parseInt($(this).closest('tr').find('td:eq(0)').text()) ;         
        materia = fila.find('td:eq(1)').text();
        $("#materia").val(materia);
        $(".modal-header").css("background-color", "#fff");
        $(".modal-header").css("color", "black" );
        $(".modal-title").text("Editar materia");		
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
              url: "crudmaterias.php",
              type: "POST",
              datatype:"json",    
              data:  {opcion:opcion, user_id:user_id},    
              success: function() {
                  tablaMaterias.row(fila.parents('tr')).remove().draw();                  
               }
            });	
        }
     });
         
    });    