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
            {"data": "nombre_alumno"},
            {"data": "edad"},
            {"data": "cedula"},
            {"data": "clave"},
            {"data": "correo"},
            {"data": "fecha_registro"},
            {"defaultContent": "<div class='btn-group' fech_rege='group' aria-label='Basic mixed styles example'><button type='button' class='btn btn-danger btnBorrar'>Eliminar</button><button type='button' class='btn btn-warning btnEditar'>Editar</button>"}
        ]
    });     
     
    var fila; //captura la fila, para editar o eliminar
//submit para el Alta y Actualización
$('#formAlumnos').submit(function(e){                         
    e.preventDefault(); //evita el comportambiento normal del submit, es decir, recarga total de la página
    nombre = $.trim($('#nombre').val());   
    age = $.trim($('#age').val());  
    cedula = $.trim($('#cedula').val());    
    correo = $.trim($('#correo').val());    
    fech_reg = $.trim($('#fech_reg').val());
    clave = $.trim($('#clave').val());                    
        $.ajax({
          url: "crudalumnos.php",
          type: "POST",
          datatype:"json",    
          data:  {user_id:user_id, nombre:nombre, cedula:cedula, correo:correo, fech_reg:fech_reg ,opcion:opcion, age:age, clave:clave},    
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
        $(".modal-title").text("Alta de Usuario");
        $('#modalCRUD').modal('show');		    
    });
    
    //Editar        
    $(document).on("click", ".btnEditar", function(){		        
        opcion = 2;//editar
        fila = $(this).closest("tr");	
        user_id = parseInt($(this).closest('tr').find('td:eq(0)').text()) ;         
        nombre = fila.find('td:eq(1)').text();
        age = fila.find('td:eq(2)').text();
        cedula = fila.find('td:eq(3)').text();
        correo = fila.find('td:eq(5)').text();
        fech_reg = fila.find('td:eq(6)').text();
        clave = fila.find('td:eq(4)').text();
        $("#nombre").val(nombre);
        $("#nombre").val(nombre);
        $("#cedula").val(cedula);
        $("#correo").val(correo);
        $("#fech_reg").val(fech_reg);
        $("#age").val(age);
        $("#clave").val(clave);
        $(".modal-header").css("background-color", "#fff");
        $(".modal-header").css("color", "black" );
        $(".modal-title").text("Editar Usuario");		
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