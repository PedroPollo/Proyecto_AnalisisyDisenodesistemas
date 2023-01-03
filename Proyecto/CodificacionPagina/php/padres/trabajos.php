<?php 
$clase = $_GET['clase'];
session_start();
if($_SESSION['rol'] != 4){
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
$sql = "SELECT padres.nombre FROM `padres` WHERE padres_id = '$user'";
$resultado = mysqli_query($conexion,$sql);
$row = mysqli_fetch_array($resultado);
$prof = $row[0];
mysqli_free_result($resultado);
$alumno = $_GET["alumno"];
$clase = $_GET["clase"];
$contenido = $_GET["contenido"];
$sql = "SELECT * FROM `evaluaciones` WHERE `contenido_id`='$contenido';";
$resultado = mysqli_query($conexion,$sql);
?>
    <title><?php echo $prof; ?></title>

    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<link rel="stylesheet" href="../assets/datatables/datatables.min.css">
<link rel="stylesheet"  type="text/css" href="assets/datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">  
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
            <a class="nav-link" aria-current="page" href="indexpadres.php">Pagina principal</a>
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
        <div class="container caja">
        <table id="tablaContenidos" class="table text-center" style="width: 100%">
        <div class="col-12 pt-3 pb-3">
    <div class="card ">
        <div class="card-body ">
            <div class="d-sm-flex align-items-center">
                <div class="mr-auto">
                    <div class="page-context-header"><div class="page-header-headings"><h1>Evaluaicones</h1></div></div>
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
            <thead>
              <tr>
                <th scope="col" class="text-center">Titulo</th>
                <th scope="col" class="text-center">Descripcion</th>
                <th scope="col" class="text-center">Fecha de Entrega</th>
                <th scope="col" class="text-center">Porcentaje</th>
                <th scope="col" class="text-center">Estatus</th>
                <th scope="col" class="text-center">Nota</th>
              </tr>
            </thead>
            <tbody>
                <?php
                while($row=mysqli_fetch_array($resultado)){
                ?>
                <tr>
                    <td><?php echo $row[1]; ?></td>
                    <td><?php echo $row[2]; ?></td>
                    <td><?php echo $row[3]; ?></td>
                    <td><?php echo $row[4]; ?></td>
                    <td><?php
                    $sql = "SELECT * FROM `ev_entregadas` WHERE `evaluacion_id`='$row[0]' AND `alumno_id`='$alumno';";
                    $resultado2 = mysqli_query($conexion,$sql);
                    $num = mysqli_num_rows($resultado2);
                    $row1 = mysqli_fetch_array($resultado2);
                    if($num != 0){
                        echo '<button type="button" class="btn btn-primary" disabled>Entregado</button>';
                    }else{
                        echo '<button type="button" class="btn btn-danger" disabled>Sin entregar</button>';
                    }
                    ?></td>
                    <td><?php
                    $sql = "SELECT * FROM `notas` WHERE `ev_entregadas_id`='$row1[0]';";
                    $resultado3 = mysqli_query($conexion,$sql);
                    $num1 = mysqli_num_rows($resultado3);
                    $row2 = mysqli_fetch_array($resultado3);
                    if($num1 == 0){
                        echo "";
                    }else{
                        echo $row2[2];
                    }
                    ?></td>
                </tr>
                <?php
                }
                ?>
            </tbody>
          </table>
        </div>

<!-- jQuery ,Popper.js, datatables JS -->
<script src="../assets/jquery/jquery-3.3.1.min.js"></script>
<script src="../assets/popper/popper.min.js"></script>
<script src="../assets/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../assets/datatables/datatables.min.js"></script> 
</body>
</html>