$(document).ready(function() {
    var user_id, opcion;
    opcion = 4;   

    
    tablaUsuarios = $('#tablaProfesores').DataTable({  
        "ajax":{            
            "url": "crudprofesores.php", 
            "method": 'POST', //usamos el metodo POST
            "data":{opcion:opcion}, //enviamos opcion 4 para que haga un SELECT
            "dataSrc":""
        },
        "columns":[
            {"data": "profesor_id"},
            {"data": "nombre"},
            {"data": "direccion"},
            {"data": "cedula"},
            {"data": "clave"},
            {"data": "telefono"},
            {"data": "correo"},
            {"data": "nivel_est"},
            {"defaultContent": "<div class='btn-group' correo='group' aria-label='Basic mixed styles example'><button type='button' class='btn btn-danger btnBorrar'>Eliminar</button><button type='button' class='btn btn-warning btnEditar' disabled>Editar</button>"}
        ]
    });     
     
    var fila; //captura la fila, para editar o eliminar
//submit para el Alta y Actualización
$('#formProfesores').submit(function(e){                         
    e.preventDefault(); //evita el comportambiento normal del submit, es decir, recarga total de la página
    nombre = $.trim($('#nombre').val());   
    direccion = $.trim($('#direccion').val());  
    cedula = $.trim($('#cedula').val());
    clave = $.trim($('#clave').val());    
    telefono = $.trim($('#telefono').val());    
    correo = $.trim($('#correo').val());  
    nivel_est = $.trim($('#nivel_est').val());                   
        $.ajax({
          url: "crudprofesores.php",
          type: "POST",
          datatype:"json",    
          data:  {user_id:user_id, nombre:nombre, cedula:cedula, clave:clave, telefono:telefono, correo:correo ,opcion:opcion, direccion:direccion, nivel_est:nivel_est},    
          success: function(data) {
            tablaUsuarios.ajax.reload(null, false);
           }
        });			        
    $('#modalCRUD').modal('hide');											     			
});
    
    //para limpiar los campos antes de dar de Alta una Persona
    $("#btnNuevo").click(function(){
        opcion = 1; //alta           
        user_id=null;
        $("#formProfesores").trigger("reset");
        $(".modal-header").css( "background-color", "#fff");
        $(".modal-header").css( "color", "black" );
        $(".modal-title").text("Alta de Profesores");
        $('#modalCRUD').modal('show');		    
    });
    
    //Editar        
    $(document).on("click", ".btnEditar", function(){		        
        opcion = 2;//editar
        fila = $(this).closest("tr");	
        user_id = fila.find('td:eq(0)')            
        nombre = fila.find('td:eq(1)').text();
        direccion = fila.find('td:eq(2)').text();
        cedula = fila.find('td:eq(3)').text();
        clave = fila.find('td:eq(4)').text();
        telefono = fila.find('td:eq(5)').text();
        correo = fila.find('td:eq(6)').text();
        nivel_est = fila.find('td:eq(7)').text();
        $("#nombre").val(nombre);
        $("#cedula").val(cedula);
        $("#clave").val(clave);
        $("#telefono").val(telefono);
        $("#correo").val(correo);
        $("#direccion").val(direccion);
        $("#nivel_est").val(nivel_est);
        $(".modal-header").css("background-color", "#fff");
        $(".modal-header").css("color", "black" );
        $(".modal-title").text("Editar Profesor");		
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
              url: "crudprofesores.php",
              type: "POST",
              datatype:"json",    
              data:  {opcion:opcion, user_id:user_id},    
              success: function() {
                  tablaUsuarios.row(fila.parents('tr')).remove().draw();                  
               }
            });	
        }
     });
         
    });    