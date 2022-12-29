$(document).ready(function() {
    var user_id, opcion;
    opcion = 4;   

    
    tablaprofmat = $('#tablaprofmat').DataTable({  
        "ajax":{            
            "url": "crudprofmat.php", 
            "method": 'POST', //usamos el metodo POST
            "data":{opcion:opcion}, //enviamos opcion 4 para que haga un SELECT
            "dataSrc":""
        },
        "columns":[
            {"data": "proceso_id"},
            {"data": "nombre"},
            {"data": "nombre_grado"},
            {"data": "nombre_aula"},
            {"data": "nombre_materia"},
            {"data": "nombre_periodo"},
            {"defaultContent": "<div class='btn-group' fech_rege='group' aria-label='Basic mixed styles example'><button type='button' class='btn btn-danger btnBorrar'>Eliminar</button><button type='button' class='btn btn-warning btnEditar' disabled>Editar</button>"}
        ]
    });     
     
    var fila; //captura la fila, para editar o eliminar
//submit para el Alta y Actualización
$('#formprofmat').submit(function(e){                         
   // e.preventDefault(); //evita el comportambiento normal del submit, es decir, recarga total de la página
    profesor = $.trim($('#nombre').val());   
    grado = $.trim($('#grado').val());  
    aula = $.trim($('#aula').val());    
    materia = $.trim($('#materia').val());    
    periodo = $.trim($('#periodo').val());                    
        $.ajax({
          url: "crudprofmat.php",
          type: "POST",
          datatype:"json",    
          data:  {user_id:user_id, profesor:profesor, aula:aula, materia:materia, periodo:periodo ,opcion:opcion, grado:grado},    
          success: function(data) {
            tablaprofmat.ajax.reload(null, false);
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
        $(".modal-title").text("Relacionar Materia");
        $('#modalCRUD').modal('show');		    
    });
    
    //Editar        
    $(document).on("click", ".btnEditar", function(){		        
        opcion = 2;//editar
        fila = $(this).closest("tr");	
        user_id = parseInt($(this).closest('tr').find('td:eq(0)').text()) ;         
        profesor = fila.find('td:eq(1)').text();
        grado = fila.find('td:eq(2)').text();
        aula = fila.find('td:eq(3)').text();
        materia = fila.find('td:eq(4)').text();
        periodo = fila.find('td:eq(5)').text();
        $("#nombre").val(profesor);
        $("#aula").val(aula);
        $("#materia").val(materia);
        $("#periodo").val(periodo);
        $("#grado").val(grado);
        $(".modal-header").css("background-color", "#fff");
        $(".modal-header").css("color", "black" );
        $(".modal-title").text("Editar relacion de Materia");		
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
              url: "crudprofmat.php",
              type: "POST",
              datatype:"json",    
              data:  {opcion:opcion, user_id:user_id},    
              success: function() {
                  tablaprofmat.row(fila.parents('tr')).remove().draw();                  
               }
            });	
        }
     });
         
    });    