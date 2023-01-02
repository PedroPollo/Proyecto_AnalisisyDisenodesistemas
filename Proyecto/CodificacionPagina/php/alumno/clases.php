<?php 
session_start();
if($_SESSION['rol'] != 3){
  header('location: ../../index.php');
}
$user = $_SESSION['n'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
<script defer src="https://app.embed.im/snow.js"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <?php
$conexion = mysqli_connect("localhost","root","","proyecto");
$sql = "SELECT alumnos.nombre_alumno FROM `alumnos` WHERE alumno_id = '$user'";
$resultado = mysqli_query($conexion,$sql);
$row = mysqli_fetch_array($resultado);
$alumno = $row[0];
mysqli_free_result($resultado);
?>
    <title><?php echo $alumno; ?></title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
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
        <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Profesor</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="indexalumno.php">Pagina principal</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="clases.php">Clases</a>
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
        <?php
        $sql="SELECT procesoprofesor.proceso_id, materias.nombre_materia, grados.nombre_grado, aulas.nombre_aula, profesor.nombre FROM materias, procesoalumno, procesoprofesor, grados, aulas, profesor WHERE procesoalumno.alumno_id = '$user' AND procesoprofesor.proceso_id = procesoalumno.proceso_id AND materias.materia_id = procesoprofesor.materia_id AND grados.grado_id = procesoprofesor.grado_id AND aulas.aula_id = procesoprofesor.aula_id AND profesor.profesor_id = procesoprofesor.profesor_id;";
        $resultado = mysqli_query($conexion,$sql);
        ?>
<div class="p-3 m-0 border-0 bd-example">
     <div class="row">
      <?php 
      while ($row = mysqli_fetch_array($resultado)){
      ?>
        <div class="col-lg-3">
          <div class="card" style="width: 18rem;">
          <img src="/Proyecto_AnalisisyDisenodesistemas/Proyecto/CodificacionPagina/rsc/image.png" class="card-img-top">
          <div class="card-body">
              <h5 class="card-title"><?php echo $row[1] ?></h5>
              <p>Grado:<a class="btn btn-primary disabled" tabindex="-1" role="button" aria-disabled="true"><?php echo $row[2] ?></a><br>
              Aula:<a class="btn btn-primary disabled" tabindex="-1" role="button" aria-disabled="true"><?php echo $row[3] ?></a><br>
              Profesor:<a class="btn btn-primary disabled" tabindex="-1" role="button" aria-disabled="true"><?php echo $row[4] ?></a></p>
              <div class="btn-group" role="group" aria-label="Basic example">
                <a href="contenidos.php?clase=<?php echo $row[0]; ?>" type="button" class="btn btn-dark">Acceder</a>
              </div>
          </div>
          </div>
        </div>
      <?php } ?>
     </div>
</div>

</body>
</html>