<?php
include_once 'conexion_bd.php';

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

if(isset($_POST['usuario']) && isset($_POST['pass'])){
    $username = $_POST['usuario'];
    $password = $_POST['pass'];

    $db = new Database();
    $query = $db->connect()->prepare('SELECT *FROM usuarios WHERE usuarios_nombre = :usuario AND usuarios_pass = :pass');
    $query->execute(['usuario' => $username, 'pass' => $password]);

    $row = $query->fetch(PDO::FETCH_NUM);
    
    if($row == true){
        $rol = $row[3];
        $_SESSION['usuario'] = $username;
        $usuarioid = $row[0];
        $_SESSION['usuarioid'] = $usuarioid;
        
        $_SESSION['rol'] = $rol;
        switch($rol){
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
            header('location: /Proyecto_AnalisisyDisenodesistemas/Proyecto/CodificacionPagina/php/admin/indexpadres.php');
            break;
  
          default:
        }
    }else{
        // no existe el usuario
        echo "<div class='alert alert-danger' role='alert'>
        Contraseña o Usuario incorrectos
      </div>";
    }
    

}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina principal</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</head>
<body>
    <!-- Image and text -->
<nav class="navbar navbar-light bg-light">
    <a class="navbar-brand" href="/Proyecto_AnalisisyDisenodesistemas/Proyecto/CodificacionPagina/">
      <img src="/Proyecto_AnalisisyDisenodesistemas/Proyecto/CodificacionPagina/rsc/Mundo Educativo.png" width="40" height="40" class="d-inline-block align-top" alt="">
      <span class="navbar-brand mb-0 h1">Sistema de Consulta Escolar</span>
    </a>
  </nav>
<div class="container">
    <div class="row">
        <div class="col-lg-1"></div>
        <div class="col"><form action="" method="post">
          <!-- Mostrar erro -->
          <?php
          ?>
            <!-- Email input -->
            <div class="form-outline mb-4">
                <label class="form-label" for="usuario">Usuario</label>
              <input type="user" id="usuario" class="form-control" name="usuario"/>
            </div>
          
            <!-- Password input -->
            <div class="form-outline mb-4">
                <label class="form-label" for="pass">Contrasena</label>
              <input type="password" id="pass" class="form-control" name="pass" />
            </div>
          
            <!-- 2 column grid layout for inline styling -->
            <div class="row mb-4">
              <div class="col d-flex justify-content-center">
                <a href="">Forgot password?</a>
              </div>
            </div>
          
            <!-- Submit button -->
            <input type="submit" class="btn btn-primary btn-block mb-4" id="send" name="send" value="Iniciar Sesion">
          
</div>
</body>
</html>
