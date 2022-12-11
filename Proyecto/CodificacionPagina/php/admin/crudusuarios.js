$(document).ready(function() {
    var user_id,opcion;
    opcion = 4;

    tablaUsuarios = $('#tablaUsuarios').DataTable({
        "ajax":{
            "url": "crudusuarios.php",
            "method": "POST",
            "data":{opcion:opcion},
            "dataSrc":""
        },
        "columns":[
            {"data": "user_id"},
            {"data": "username"},
            {"data": "password"},
            {"data": "rol"},
            {"defaultContent": "<input type='button' class='btn btn-danger btnBorrar' value='Eliminar'> | <button type='button' class='btn btn-success btnEditar' data-bs-toggle='modal' data-bs-target='#modal'>Editar</button>"}
        ]
    });

var fila;


//Agregar o Editar un usuario
$('#formUsuarios').submit(function(e) {

    e.preventDefault();

    username = $.trim($('#username')).val();
    password = $.trim($('#password')).val();
    rol= $.trim($('#rol').val());
    $.ajax({
        url: "crudusuarios.php",
        type: "POST",
        datatype: "json",
        data: {username:username,password:password,rol:rol,opcion:opcion},
        success: function(data){
            tablaUsuarios.ajax.reload(null,false);
        }
    });
    $('#modal').modal('hide');
});

//Limpiar campos antes de dar de alta a otra persona
$("btnNuevo").click(function(){
    opcion = 1;
    user_id = null;
    $("#formUsuarios").trigger("reset");
    $(".modal-header").css("background-color","white");
    $(".modal-body").css("color","white");
    $(".modal-title").text("Alta de Usuario");
    $('#modal').modal('show');
});

//Editar usuario
$(document).on("clik", ".btnEditar",function(){
    opcion = 2;
    fila = $(this).closest("tr");
    user_id = parseInt(fila.find('td:eq(0)').text());
    username = fila.find('td:eq(1)').text();
    password = fila.find('td:eq(2)').text();
    rol = fila.find('td:eq(3)').text();
    $("#username").val(username);
    $("#password").val(password);
    $("#rol").val(rol);
    $(".modal-header").css("background-color","007bff");
    $(".modal-header").css("color","white");
    $(".modal-title").text("Editar Usuario");
    $('#modal').modal('show');
});

//Borrar
$(document).on("clik", ".btnBorrar",function(){

    fila = $(this);
    user_id = parseInt($(this).closest('tr').find('td:eq(0)').text());
    opcion = 3;
    var respuesta = confirm("¿Está seguro que desea borrar el registro "+user_id+"?");
    if(respuesta){
        $.ajax({
            url: "crudusuarios.php",
            type: "POST",
            datatype: "json",
            data: {opcion:opcion,user_id:user_id},
            success: function(){
                tablaUsuarios.row(fila.parents('tr')).remove().draw();
            }
        })
    }

});

});