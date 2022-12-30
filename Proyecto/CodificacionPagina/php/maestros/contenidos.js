
$(document).ready(function() {
    var user_id, opcion;
    opcion = 4;   

    
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
            {"defaultContent": "<div class='btn-group' fech_rege='group' aria-label='Basic mixed styles example'><button type='button' class='btn btn-danger btnBorrar'>Eliminar</button><button type='button' class='btn btn-warning btnEditar'>Editar</button><button type='button' class='btn btn-success btnCalificar'>Calificar</button></div>"}
        ]
    });     
     
    var fila; //captura la fila, para editar o eliminar
//submit para el Alta y Actualización
$('#formContenidos').submit(function(e){                         
    e.preventDefault(); //evita el comportambiento normal del submit, es decir, recarga total de la página
    titulo = $.trim($('#titulo').val());   
    material = $.trim($('#material').val());  
    descripcion = $.trim($('#descripcion').val()); 
    clase = $.trim($('#clase').val());                  
        $.ajax({
          url: "crudcontenidos.php",
          type: "POST",
          datatype:"json",    
          data:  {user_id:user_id, titulo:titulo, descripcion:descripcion,opcion:opcion, material:material, clase:clase},    
          success: function(data) {
            tablaContenidos.ajax.reload(null, false);
           }
        });			        
    $('#modalCRUD').modal('hide');											     			
});
    
    //para limpiar los campos antes de dar de Alta una Persona
    $("#btnNuevo").click(function(){
        opcion = 1; //alta           
        user_id=null;
        $("#formContenidos").trigger("reset");
        $(".modal-header").css( "background-color", "#fff");
        $(".modal-header").css( "color", "black" );
        $(".modal-title").text("Agregar Asignacion");
        $('#modalCRUD').modal('show');		    
    });
    
    //Editar        
    $(document).on("click", ".btnEditar", function(){		        
        opcion = 2;//editar
        fila = $(this).closest("tr");	
        user_id = parseInt($(this).closest('tr').find('td:eq(0)').text()) ;         
        titulo = fila.find('td:eq(1)').text();
        material = fila.find('td:eq(3)').text();
        descripcion = fila.find('td:eq(2)').text();
        $("#titulo").val(titulo);
        $("#material").val(material);
        $("#descripcion").val(descripcion);
        $(".modal-header").css("background-color", "#fff");
        $(".modal-header").css("color", "black" );
        $(".modal-title").text("Editar Asignacion");		
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
              url: "crudcontenidos.php",
              type: "POST",
              datatype:"json",    
              data:  {opcion:opcion, user_id:user_id},    
              success: function() {
                  tablaContenidos.row(fila.parents('tr')).remove().draw();                  
               }
            });	
        }
     });

     $(document).on("click",".btnCalificar",function(){
        fila=$(this);
        user_id = parseInt($(this).closest('tr').find('td:eq(0)').text());
        location.href = "calificar.php?contenido="+user_id;
     });
         
    });    