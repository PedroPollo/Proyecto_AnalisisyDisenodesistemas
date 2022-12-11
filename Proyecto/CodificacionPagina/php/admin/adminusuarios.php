<?php 
session_start();
if($_SESSION['rol'] != 1){
  header('location: ../../index.php');
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <title>Administrador</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <!--datables CSS básico-->
    <link rel="stylesheet" type="text/css" href="../../assets/datatables/datatables.min.css"/>
    <!--datables estilo bootstrap 4 CSS-->  
    <link rel="stylesheet"  type="text/css" href="../../assets/datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">    
      
</head>
<body>
    <nav class="navbar bg-light">
        <div class="col">
        <div class="container-fluid">
          <a class="navbar-brand" href="/Proyecto_AnalisisyDisenodesistemas/Proyecto/CodificacionPagina/">
            <img src="/Proyecto_AnalisisyDisenodesistemas/Proyecto/CodificacionPagina/rsc/Mundo Educativo.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
            Escuela Mundo Educativo
          </a>
        </div>
    </div>
    <div class="col">
        <ul class="nav justify-content-center">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="alumnosadmin.php">Administrar Alumnos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="padresadmin.php">Administrar Padres</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="maestrosadmin.php">Administrar Maestros</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="materiasadmin.php">Administrar Materias</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="indexadmin.php">Index</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../../logout.php">Cerrar Sesion</a>
            </li>
          </ul>
    </div>
      </nav>
      <header id="page-header" class="row">
        <div class="col-12 pt-3 pb-3">
            <div class="card ">
                <div class="card-body ">
                    <div class="d-sm-flex align-items-center">
                        <div class="mr-auto">
                            <div class="page-context-header"><div class="page-header-headings"><h1>Usuarios</h1></div></div>
                        </div>
        
                        <div class="header-actions-container flex-shrink-0" data-region="header-actions-container">
                        </div>
                    </div>
                    <div class="d-flex flex-wrap">
                        <div class="ml-auto d-flex">
                            
                        </div>
                        <div id="course-header">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
</div>
        </header>
        <div class="container caja">
        <div class="row">
            <div class="col-lg-12">
            <div class="table-responsive">        
                <table id="tablaUsuarios" class="table table-striped table-bordered table-condensed" style="width:100%" >
                    <thead class="text-center">
                        <tr>
                            <th>ID</th>
                            <th>Usuario</th>
                            <th>Contraseña</th>                                
                            <th>Rol</th>  
                            <th>Accion</th>
                        </tr>
                    </thead>
                    <tbody>                           
                    </tbody>        
                </table>               
            </div>
            </div>
        </div>  
    </div>   

  </tbody>
</table>
<button type="button" class="btn btn-primary" id="btnCrear" data-bs-toggle="modal" data-bs-target="#modal">Agregar Nuevo Usuario</button>

<!--Modal para CRUD-->
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
        <form id="formUsuarios">    
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">Usuario:</label>
                    <input type="text" class="form-control" id="username">
                    </div>
                    </div> 
                </div>
                <div class="row">
                    <div class="col-lg-9">
                        <div class="form-group">
                        <label for="" class="col-form-label">Password</label>
                        <input type="text" class="form-control" id="password">
                        </div>
                    </div>   
                </div>
                <div class="row">
                    <div class="col-lg-6"> 
                    <div class="col-lg-3">    
                        <div class="form-group">
                        <label for="rol" class="col-form-label">Rol</label>
                        <select name="rol" id="rol">
                          <option value="1">Administrador</option>
                          <option value="2">Maestro</option>
                          <option value="3">Alumno</option>
                          <option value="4">Padre</option>
                        </select>
                        </div>            
                    </div>    
                </div>                
            </div>
            <div class="modal-footer">
                <button type="button" id="btnGuardar" class="btn btn-dark">Guardar</button>
                <button type="button" id="brnEditar" class="btn btn-dark">Editar</button>
            </div>
        </form>    
        </div>
    </div>
</div>  

<!-- jQuery, Poppers -->
<script src="../../assets/jquery/jquery-3.1.1.min.js"></script>
<script src="../../assets/popper/popper.min.js"></script>

<!--dataTables JS-->
<script type="text/javascript" src="../../assets/datatables/datatables.min.js"></script>

<script>
  document.addEventListener("DOMContentLoaded",function(event){
    var user_id,opcion;
    opcion = 4;
    let tablaUsuarios = $("#tablaUsuarios").DataTable({
      "ajax":{
        url: "crudusuarios.php",
        method : "POST",
        data: {opcion:opcion},
        dataSrc:""
      },
      "columns":[
        {"data": "user_id"},
        {"data": "username"},
        {"data": "password"},
        {"defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btn-sm btnEditar'>Editar</button><button class='btn btn-danger btn-sm btnBorrar'>Eliminar</button></div></div>"}
      ]
    });

    //Funcionabilidad de los Botones
    //Boton Crear usuario
    $('#btnCrear').click(function(){
      $('#btnGuardar').show();
      $('#brnEditar').hide();
      limpiarFormulario();
      $("#modal").modal('show');
    });

    //Boton editar usuario
    $('#brnEditar').click(function(){
      $('#modal').modal('hide');
      let registro = recuperarDatosFormulario();
      modificarRegistro(registro);
    });

    //Boton Guardar (Modal)
    $('#btnGuardar').click(function(){
      $("#modal").modal('hide');
      let registro = recuperarDatosFormulario();
      agregarRegistro(registro);
    });

    //Boton Editar
    $('#tablaUsuarios').on('click','button.btnEditar',function(){
      $('#btnGuardar').hide();
      $('#brnEditar').show();
      let registro = tablaUsuarios.row($(this).parents('tr')).data();
      recuperarRegistro(registro.user_id);
    });

    //Boton Borrar
    $('#tablaUsuarios').on('click','button.btnBorrar',function(){
      if(confirm("¿Esta seguro de borrar el registro?")){
        let registro = tablaUsuarios.row($(this).parents('tr')).data();
        borrarRegistro(registro.user_id);
      }
    });

    //Funciones que interactuan con el formulario
    function limpiarFormulario(){
      $('#username').val('');
      $('#password').val('');
      $('#rol').val('');
    }

    function recuperarDatosFormulario(){
      let registro = {
        user_id: $('#user_id').val(),
        username: $('#username').val(),
        password: $('#password').val(),
        rol: $('#rol').val()
      };
      return registro;
    }

    //Funcion para comunicarse con el servidor
    function agregarRegistro(registro){
      opcion = 1;
      $.ajax({
        type: 'POST',
        url: 'crudusuario.php',
        data: {opcion:opcion,registro:registro},
        success:function(msg){
          tablaUsuarios.ajax.reload();
        },
        error: function(){
          alert("Hay unproblema");
        }
      });
    }

    function borrarRegistro(user_id){
      opcion = 3;
      $.ajax({
        type: 'POST',
        url: 'crudusuario.php',
        data:{opcion:opcion,user_id:user_id},
        success:function(msg){
          tablaUsuarios.ajax.reload();
        },
        error: function(){
          alert("Hay unproblema");
        }
      });
    }

    function recuperarRegistro(user_id){
      opcion = 5;
      $.ajax({
        type: 'POST',
        url: 'crudusuario.php',
        data:{opcion:opcion,user_id:user_id},
        success: function(datos){
          $('#user_id').val(datos[0].user_id);
          $('#username').val(datos[1].username);
          $('#password').val(datos[2].password);
          $('#rol').val(datos[3].rol);
          $("#modal").modal('show');
        },
        error: function(){
          alert("Hay unproblema");
        }
      });
    }

    function modificarRegistro(registro){
      opcion = 2;
      $.ajax({
        type: 'POST',
        url: 'crudusuario.php',
        data:{opcion:opcion,registro:registro.user_id},
        success:function(msg){
          tablaUsuarios.ajax.reload();
        },
        error: function(){
          alert("Hay unproblema");
        }
      });
    }
  });
</script>

</body>
</html>