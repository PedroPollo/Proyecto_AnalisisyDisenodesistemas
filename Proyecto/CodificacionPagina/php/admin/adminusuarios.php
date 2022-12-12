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
    <link href ="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css" rel="stylesheet">
    <title>Administrador</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Import jQuery , popper, Bootstraps JS, dataTables -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
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
        <?php
        $conexion=mysqli_connect('localhost','root','','proyecto');
        $sql = "SELECT * FROM usuarios";
        $result=mysqli_query($conexion,$sql);
        ?>
        <table class="table table-striped" id="tablaUsuarios">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Usuario</th>
      <th scope="col">Contraseña</th>
      <th scope="col">Rol</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>
    <?php
    while($mostrar=mysqli_fetch_array($result)){
    ?>
    <tr>
    <td><?php echo $mostrar[0] ?></td>
    <td><?php echo $mostrar[1] ?></td>
    <td><?php echo $mostrar[2] ?></td>
    <td><?php switch($mostrar[3]){
      case 1: echo "Administrador";
      break;
      case 2: echo "Maestro";
      break;
      case 3: echo "Alumno";
      break;
      case 4: echo "Padre";
      break;
      default: echo "Sin asignar";
      break;
    } ?></td>
    <td><input type="button" class="btn btn-danger" data-id='<?php echo $mostrar[0];?>' value="Eliminar"> | <button type="button" data-id='<?php echo $mostrar[0];?>' class="btn btn-success editbtn" data-bs-toggle="modal" data-bs-target="#modal">Editar</button></td>
    </tr>
    <?php
    }
    ?>
  </tbody>
</table>
<button id="BotonAgregar" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal">Agregar Nuevo Usuario</button>

<!--Modal para Agregar o Editar-->
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar o Editar Usuario</h5>
            </div>
        <form action="registraUsuario.php" method="POST">   
        <div class="modal-body">
                <div class="row">
                    <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">Usuario:</label>
                    <input type="text" class="form-control" id="username" name="username">
                    </div>
                    </div>
                    <div class="col-lg-6">
                    
                    </div>    
                </div>
                <div class="row">
                    <div class="col-lg-9">
                        <div class="form-group">
                        <label for="" class="col-form-label">Contraseña</label>
                        <input type="password" class="form-control" id="password" name="password">
                        </div>
                    </div>    
                  </div>
                  <div class="row">
                    <div class="col-lg-3">    
                        <div class="form-group">
                        <label for="r" class="col-form-label">Rol</label>
                        <select name="roles" id="roles" name="roles">
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
                <button type="submit" id="ConfirmarAgregar" class="btn btn-primary">Guardar</button>
            </div>
        </form>    
        </div>
    </div>
</div> 

<script type='text/javascript'>
            $(document).ready(function(){
 
                $('.editbtn').click(function(){
                   
                    var user_id = $(this).data('id');
 
                    // AJAX request
                    $.ajax({
                        url: 'ajaxfile.php',
                        type: 'post',
                        data: {user_id: user_id},
                        success: function(response){ 
                            // Add response in Modal body
                            $('.modal-body').html(response); 
 
                            // Display Modal
                            $('#modal').modal('show'); 
                        }
                    });
                });
            });
            </script>

</body>
</html>