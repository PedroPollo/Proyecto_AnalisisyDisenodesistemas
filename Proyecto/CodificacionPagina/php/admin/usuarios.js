$(document).ready(function() {
    var user_id, opcion;
    opcion = 4;   

    
    tablaUsuarios = $('#tablaUsuarios').DataTable({  
        "ajax":{            
            "url": "crudusuarios.php", 
            "method": 'POST', //usamos el metodo POST
            "data":{opcion:opcion}, //enviamos opcion 4 para que haga un SELECT
            "dataSrc":""
        },
        "columns":[
            {"data": "id"},
            {"data": "username"},
            {"data": "password"},
            {"data": "nombre"},
            {"data": "ap_paterno"},
            {"data": "ap_materno"},
            {"data": "rol"},
            {"defaultContent": "<div class='btn-group' role='group' aria-label='Basic mixed styles example'><button type='button' class='btn btn-danger btnBorrar'>Eliminar</button><button type='button' class='btn btn-warning btnEditar'>Editar</button>"}
        ]
    });     
     
    var fila; //captura la fila, para editar o eliminar
//submit para el Alta y Actualización
$('#formUsuarios').submit(function(e){                         
   // e.preventDefault(); //evita el comportambiento normal del submit, es decir, recarga total de la página
    username = $.trim($('#username').val());   
    password = $.trim($('#password').val());  
    nombre = $.trim($('#nombre').val());
    ap_paterno = $.trim($('#ap_paterno').val());    
    ap_materno = $.trim($('#ap_materno').val());    
    rol = $.trim($('#rol').val());                    
        $.ajax({
          url: "crudusuarios.php",
          type: "POST",
          datatype:"json",    
          data:  {user_id:user_id, username:username, nombre:nombre, ap_paterno:ap_paterno, ap_materno:ap_materno, rol:rol ,opcion:opcion, password:password},    
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
        $("#formUsuarios").trigger("reset");
        $(".modal-header").css( "background-color", "#fff");
        $(".modal-header").css( "color", "black" );
        $(".modal-title").text("Alta de Usuario");
        $('#modalCRUD').modal('show');		    
    });
    
    //Editar        
    $(document).on("click", ".btnEditar", function(){		        
        opcion = 2;//editar
        fila = $(this).closest("tr");	
        user_id = fila.find('td:eq(0)')            
        username = fila.find('td:eq(1)').text();
        password = fila.find('td:eq(2)').text();
        nombre = fila.find('td:eq(3)').text();
        ap_paterno = fila.find('td:eq(4)').text();
        ap_materno = fila.find('td:eq(5)').text();
        rol = fila.find('td:eq(6)').text();
        $("#username").val(username);
        $("#nombre").val(nombre);
        $("#ap_paterno").val(ap_paterno);
        $("#ap_materno").val(ap_materno);
        $("#rol").val(rol);
        $("#password").val(password);
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
              url: "crudusuarios.php",
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