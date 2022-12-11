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
            {"data": "user_id"},
            {"data": "username"},
            {"data": "password"},
            {"data": "rol"},
            {"defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btn-sm btnEditar'>Editar</button><button class='btn btn-danger btn-sm btnBorrar'>Eliminar</button></div></div>"}
        ]
    });     
    
    var fila; //captura la fila, para editar o eliminar
    //submit para el Alta y Actualización
    $('#formUsuarios').submit(function(e){                         
        e.preventDefault(); //evita el comportambiento normal del submit, es decir, recarga total de la página
        username = $.trim($('#username').val());
        password = $.trim($('#password').val());     
        rol= $.trim($('#rol').val());                        
            $.ajax({
              url: "crudusuarios.php",
              type: "POST",
              datatype:"json",    
              data:  {user_id:user_id, username:username,rol:rol, password:password,opcion:opcion},    
              success: function(data) {
                tablaUsuarios.ajax.reload(null, false);
               }
            });			        
        $('#modal').modal('hide');											     			
    });
            
     
    
    //para limpiar los campos antes de dar de Alta una Persona
    $("#btnNuevo").click(function(){
        opcion = 1; //alta           
        user_id=null;
        $("#formUsuarios").trigger("reset");
        $(".modal-header").css( "background-color", "#17a2b8");
        $(".modal-header").css( "color", "white" );
        $(".modal-title").text("Alta de Usuario");
        $('#modal').modal('show');	    
    });
    
    //Editar        
    $(document).on("click", ".btnEditar", function(){		        
        opcion = 2;//editar
        fila = $(this).closest("tr");	        
        user_id = parseInt(fila.find('td:eq(0)').text()); //capturo el ID		            
        username = fila.find('td:eq(1)').text();
        password = fila.find('td:eq(2)').text();
        rol = fila.find('td:eq(3)').text();
        $("#username").val(username);
        $("#password").val(password);
        $("#rol").val(rol);
        $(".modal-header").css("background-color", "#007bff");
        $(".modal-header").css("color", "white" );
        $(".modal-title").text("Editar Usuario");		
        $('#modal').modal('show');		   
    });
    
    //Borrar
    $(document).on("click", ".btnBorrar", function(){
        fila = $(this);           
        user_id = parseInt($(this).closest('tr').find('td:eq(0)').text()) ;		
        opcion = 3; //eliminar        
        var respuesta = confirm("¿Está seguro de borrar el registro "+user_id+"?");                
        if (respuesta) {            
            $.ajax({
              url: "bd/crud.php",
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