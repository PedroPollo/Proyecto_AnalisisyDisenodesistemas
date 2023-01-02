$(document).ready(function() {
    var opcion;
    opcion = 4;   

    
    tablaEntregas = $('#tablaEntregas').DataTable({  
        "ajax":{            
            "url": "crudentregas.php", 
            "method": 'POST', //usamos el metodo POST
            "data":{alumno:alumno,evaluacion:evaluacion,opcion:opcion}, //enviamos opcion 4 para que haga un SELECT
            "dataSrc":""
        },
        "columns":[
            {"data": "observacion"},
            {"data": "material"},
            {"data": "valor_nota"},
            {"defaultContent": "<div class='btn-group' fech_rege='group' aria-label='Basic mixed styles example'><button type='button' class='btn btn-warning btnEditar'>Editar</button></div>"}
        ]
    });     
     
    var fila; //captura la fila, para editar o eliminar
//submit para el Alta y Actualización
$('#formEntregas').submit(function(e){
    observaciones = $.trim($('#observaciones').val());   
    material = $.trim($('#material').val());                 
        $.ajax({
          url: "crudentregas.php",
          type: "POST",
          datatype:"json",    
          data:  {opcion:opcion, alumno:alumno, evaluacion:evaluacion,observaciones:observaciones,material:material},    
          success: function(data) {
            tablaEntregas.ajax.reload(null, false);
           }
        });			        
    $('#modalCRUD').modal('hide');											     			
});
    
    //para limpiar los campos antes de dar de Alta una Persona
    $("#btnNuevo").click(function(){
        opcion = 1; //alta           
        user_id=null;
        $("#formEntregas").trigger("reset");
        $(".modal-header").css( "background-color", "#fff");
        $(".modal-header").css( "color", "black" );
        $(".modal-title").text("Agregar Asignacion");
        $('#modalCRUD').modal('show');		    
    });
    
    //Editar        
    $(document).on("click", ".btnEditar", function(){		        
        opcion = 2;//editar
        fila = $(this).closest("tr");	
        observaciones = fila.find('td:eq(0)').text();         
        material = fila.find('td:eq(1)').text();
        $("#observaciones").val(observaciones);
        $("#material").val(material);
        $(".modal-header").css("background-color", "#fff");
        $(".modal-header").css("color", "black" );
        $(".modal-title").text("Editar Asignacion");		
        $('#modalCRUD').modal('show');		   
    });
         
    });    