$(document).ready(function() {
    var user_id, opcion;
    opcion = 4;   

    
    tablaAlumnos = $('#tablaAlumnos').DataTable({  
        "ajax":{            
            "url": "crudalumnos.php", 
            "method": 'POST', //usamos el metodo POST
            "data":{opcion:opcion}, //enviamos opcion 4 para que haga un SELECT
            "dataSrc":""
        },
        "columns":[
            {"data": "alumno_id"},
            {"data": "nombre_alumnno"},
            {"data": "edad"},
            {"data": "direccion"},
            {"data": "cedula"},
            {"data": "correo"},
            {"data": "fecha_registro"},
            {"defaultContent": "<div class='btn-group' correo='group' aria-label='Basic mixed styles example'><button type='button' class='btn btn-danger btnBorrar'>Eliminar</button><button type='button' class='btn btn-warning btnEditar'>Editar</button>"}
        ]
    });     
     
    var fila; //captura la fila, para editar o eliminar
//submit para el Alta y Actualización
$('#formAlumno').submit(function(e){                         
    e.preventDefault(); //evita el comportambiento normal del submit, es decir, recarga total de la página
    nombre = $.trim($('#nombre').val());   
    direccion = $.trim($('#direccion').val());  
    cedula = $.trim($('#cedula').val());
    edad = $.trim($('#age').val());    
    correo = $.trim($('#correo').val());  
    fecha_reg = $.trim($('#fecha_reg').val());                   
        $.ajax({
          url: "crudalumnos.php",
          type: "POST",
          datatype:"json",    
          data:  {user_id:user_id, nombre:nombre, cedula:cedula, edad:edad, correo:correo ,opcion:opcion, direccion:direccion, fecha_reg:fecha_reg},    
          success: function(data) {
            tablaAlumnos.ajax.reload(null, false);
           }
        });			        
    $('#modalCRUD').modal('hide');											     			
});
    
    //para limpiar los campos antes de dar de Alta una Persona
    $("#btnNuevo").click(function(){
        opcion = 1; //alta           
        user_id=null;
        $("#formAlumnos").trigger("reset");
        $(".modal-header").css( "background-color", "#fff");
        $(".modal-header").css( "color", "black" );
        $(".modal-title").text("Alta de Alumno");
        $('#modalCRUD').modal('show');		    
    });
    
    //Editar        
    $(document).on("click", ".btnEditar", function(){		        
        opcion = 2;//editar
        fila = $(this).closest("tr");	
        user_id = fila.find('td:eq(0)')            
        nombre = fila.find('td:eq(1)').text();
        direccion = fila.find('td:eq(3)').text();
        cedula = fila.find('td:eq(4)').text();
        edad = fila.find('td:eq(2)').text();
        correo = fila.find('td:eq(5)').text();
        fecha_reg = fila.find('td:eq(6)').text();
        $("#nombre").val(nombre);
        $("#cedula").val(cedula);
        $("#age").val(edad);
        $("#correo").val(correo);
        $("#direccion").val(direccion);
        $("#fecha_reg").val(fecha_reg);
        $(".modal-header").css("background-color", "#fff");
        $(".modal-header").css("color", "black" );
        $(".modal-title").text("Editar Alumno");		
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
              url: "crudalumnos.php",
              type: "POST",
              datatype:"json",    
              data:  {opcion:opcion, user_id:user_id},    
              success: function() {
                  tablaAlumnos.row(fila.parents('tr')).remove().draw();                  
               }
            });	
        }
     });
         
    });    