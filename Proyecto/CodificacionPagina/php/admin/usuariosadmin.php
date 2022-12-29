<?php 
session_start();
if($_SESSION['rol'] != 1){
  header('location: ../../index.php');
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador</title>
    <!-- Bootstraps , dataTables-->
    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<link rel="stylesheet" href="../assets/datatables/datatables.min.css">
<link rel="stylesheet"  type="text/css" href="assets/datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">    


</head>
<body>
<nav class="navbar navbar-dark bg-dark fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="/Proyecto_AnalisisyDisenodesistemas/Proyecto/CodificacionPagina/">
            <img src="/Proyecto_AnalisisyDisenodesistemas/Proyecto/CodificacionPagina/rsc/Mundo Educativo.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
            Escuela Mundo Educativo
          </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Acciones</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="indexadmin.php">Pagina principal</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="usuariosadmin.php">Administrar Usuarios</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="profesoresadmin.php">Administrar Profesores</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="alumnosadmin.php">Administrar Alumnos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="gradosadmin.php">Administrar Grados</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="aulasadmin.php">Administrar Aulas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="materiasadmin.php">Administrar Materias</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="periodosadmin.php">Administrar Periodo</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " aria-current="page" href="actividadadmin.php">Administrar Actividad</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " aria-current="page" href="profmatadadmin.php">Administrar Profesores Materias</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="../../logout.php">Cerrar Sesion</a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</nav>
      <header id="page-header" class="row">
        <div class="col-12 pt-3 pb-3">
            <div class="card ">
                <div class="card-body ">
                    <div class="d-sm-flex align-items-center">
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
        </header>
        <div class="container caja">
        <table id="tablaUsuarios" class="table" style="width: 100%">
            <thead>
            <div class="col-12 pt-3 pb-3">
    <div class="card ">
        <div class="card-body ">
            <div class="d-sm-flex align-items-center">
                <div class="mr-auto">
                    <div class="page-context-header"><div class="page-header-headings"><h1>Administrar Usuarios</h1></div></div>
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
              <tr>
                <th scope="col" class="text-center">ID</th>
                <th scope="col" class="text-center">Username</th>
                <th scope="col" class="text-center">Password</th>
                <th scope="col" class="text-center">Nombre</th>
                <th scope="col" class="text-center">Apellido Paterno</th>
                <th scope="col" class="text-center">Apellido Materno</th>
                <th scope="col" class="text-center">Rol</th>
                <th scope="col" class="text-center">Accion</th>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
          <!-- Button trigger modal -->
          <button id="btnNuevo" type="button" class="btn btn-primary" data-toggle="modal">Agregar usuario</button>
        </div>

       <!--Modal para CRUD-->
<div class="modal fade" id="modalCRUD" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
            </div>
        <form id="formUsuarios">    
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">Username:</label>
                    <input type="text" class="form-control" id="username">
                    </div>
                    </div>
                    <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre">
                    </div> 
                    </div>    
                </div>
                <div class="row"> 
                    <div class="col-lg-6">
                    <div class="form-group">
                    <label for="ap_paterno" class="col-form-label">Apellido Paterno</label>
                    <input type="text" class="form-control" id="ap_paterno">
                    </div>               
                    </div>
                    <div class="col-lg-6">
                    <div class="form-group">
                    <label for="ap_materno" class="col-form-label">Apellido Materno</label>
                    <input type="text" class="form-control" id="ap_materno">
                    </div>
                    </div>  
                </div>
                <div class="row">
                    <div class="col-lg-9">
                        <div class="form-group">
                          <label for="rol">Rol</label>
                        <select id="rol" class="form-select" aria-label="Default select example">
                        <option selected>Seleccione el rol</option>
                        <option value="1">Administrador</option>
                        <option value="2">Maestro</option>
                        <option value="3">Alumno</option>
                        <option value="4">Padre</option>
                        </select>
                        </div>
                        <div class="form-group">
                        <label for="" class="col-form-label">Contraseña</label>
                        <input type="password" class="form-control" id="password">
                        </div>
                    </div>    
                </div>                
            </div>
            <div class="modal-footer">
              <input type="submit" id="btnGuardar" class="btn btn-success" value="Guardar">
          </div>
        </form>    
        </div>
    </div>
</div>  


<!-- jQuery ,Popper.js, datatables JS -->
<script src="../assets/jquery/jquery-3.3.1.min.js"></script>
<script src="../assets/popper/popper.min.js"></script>
<script src="../assets/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../assets/datatables/datatables.min.js"></script>  

<script type="text/javascript" src="usuarios.js"></script> 

</body>
</html>