<?php
session_start();
if(isset($_SESSION['rol'])){
    switch($_SESSION['rol']){
        case 1:
            header('location: /Proyecto_AnalisisyDisenodesistemas/Proyecto/CodificacionPagina/php/admin/indexadmin.php');
        break;
        case 2:
            header('location: /Proyecto_AnalisisyDisenodesistemas/Proyecto/CodificacionPagina/php/maestros/indexmaestros.php');
        break;
        case 3:
            header('location: /Proyecto_AnalisisyDisenodesistemas/Proyecto/CodificacionPagina/php/alumno/indexalumno.php');
        break;
        case 4:
            header('location: /Proyecto_AnalisisyDisenodesistemas/Proyecto/CodificacionPagina/php/padres/indexpadres.php');
        break;
        default:
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <script defer src="https://app.embed.im/snow.js"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <title>Pagina principal</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</head>
<body>
    <!-- Image and text -->
<nav class="navbar navbar-light bg-light">
    <a class="navbar-brand" href="index.php">
      <img src="/Proyecto_AnalisisyDisenodesistemas/Proyecto/CodificacionPagina/rsc/Mundo Educativo.png" width="40" height="40" class="d-inline-block align-top" alt="">
      <span class="navbar-brand mb-0 h1">Sistema de Consulta Escolar</span>
    </a>
    <div class="dropdown text-left">
  <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
    Iniciar Sesion
  </button>
  <ul class="dropdown-menu dropdown-menu-dark">
    <li><a class="dropdown-item active" href="login.php">Administrador</a></li>
    <li><a class="dropdown-item" href="loginprof.php">Profesor</a></li>
    <li><a class="dropdown-item" href="#">Something else here</a></li>
  </ul>
</div>
  </nav>
  <div id="page" class="container-fluid d-print-block">
    <header id="page-header" class="row">
<div class="col-12 pt-3 pb-3">
    <div class="card ">
        <div class="card-body ">
            <div class="d-sm-flex align-items-center">
                <div class="mr-auto">
                    <div class="page-context-header"><div class="page-header-headings"><h1>Escuela Mundo Educativo</h1></div></div>
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
<div class="col">
    <div id="page" class="container-fluid d-print-block">
        <div class="card"><img src="/Proyecto_AnalisisyDisenodesistemas/Proyecto/CodificacionPagina/rsc/Banner Mundo E.png" style="max-width:100%;max-height: 400px;width:auto;height:auto;"></div>
    </div>
</div>
</header>
</body>
</html>
