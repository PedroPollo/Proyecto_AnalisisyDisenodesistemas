$(document).ready(function() {
    var user_id, opcion;
    opcion = 4;   
     
     
    var fila; //captura la fila, para editar o eliminar
//submit para el Alta y Actualización
$('#formNotas').submit(function(e){                         
    e.preventDefault(); //evita el comportambiento normal del submit, es decir, recarga total de la página
    titulo = $.trim($('#titulo').val());   
    fecha = $.trim($('#fecha').val());  
    descripcion = $.trim($('#descripcion').val()); 
    porcentaje = $.trim($('#porcentaje').val()); 
        $.ajax({
          url: "crudevaluaciones.php",
          type: "POST",
          datatype:"json",    
          data:  {user_id:user_id, titulo:titulo, descripcion:descripcion,opcion:opcion, fecha:fecha, porcentaje:porcentaje,contenido:contenido},    
          success: function(data) {
            tablaNotas.ajax.reload(null, false);
           }
        });			        
    $('#modalCRUD').modal('hide');											     			
});
    
    //para limpiar los campos antes de dar de Alta una Persona
    $("#btnNuevo").click(function(){
        opcion = 1; //alta           
        user_id=null;
        $("#formNotas").trigger("reset");
        $(".modal-header").css( "background-color", "#fff");
        $(".modal-header").css( "color", "black" );
        $(".modal-title").text("Agregar Evaluacion");
        $('#modalCRUD').modal('show');		    
    });
    
    //Editar        
    $(document).on("click", ".btnEditar", function(){		        
        opcion = 2;//editar
        fila = $(this).closest("tr");	
        user_id = parseInt($(this).closest('tr').find('td:eq(0)').text()) ;         
        titulo = fila.find('td:eq(1)').text();
        fecha = fila.find('td:eq(3)').text();
        descripcion = fila.find('td:eq(2)').text();
        porcentaje = fila.find('td:eq(4)').text();
        $("#titulo").val(titulo);
        $("#fecha").val(fecha);
        $("#descripcion").val(descripcion);
        $("#porcentaje").val(porcentaje);
        $(".modal-header").css("background-color", "#fff");
        $(".modal-header").css("color", "black" );
        $(".modal-title").text("Editar Evaluacion");		
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
              url: "crudevaluaciones.php",
              type: "POST",
              datatype:"json",    
              data:  {opcion:opcion, user_id:user_id},    
              success: function() {
                  tablaNotas.row(fila.parents('tr')).remove().draw();                  
               }
            });	
        }
     });

     $(document).on("click",".btnCalificar",function(){
        fila=$(this);
        user_id = parseInt($(this).closest('tr').find('td:eq(0)').text());
        location.href = "entregas.php?evaluacion="+user_id;
     });
         
    });    