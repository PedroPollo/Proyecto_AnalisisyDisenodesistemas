<?php

$conexion=mysqli_connect('localhost','root','','proyecto');

$username = (isset($_POST['username'])) ? $_POST['username'] : '';
<<<<<<< Updated upstream
$rol = (isset($_POST['rol'])) ? $_POST['rol'] : '';
=======
$nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : '';
$ap_paterno = (isset($_POST['ap_paterno'])) ? $_POST['ap_paterno'] : '';
$ap_materno = (isset($_POST['ap_materno'])) ? $_POST['ap_materno'] : '';
>>>>>>> Stashed changes
$password = (isset($_POST['password'])) ? $_POST['password'] : '';
$rol = (isset($_POST['rol'])) ? $_POST['rol'] : '';


$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$user_id = (isset($_POST['user_id'])) ? $_POST['user_id'] : '';


switch($opcion){
    case 1:
<<<<<<< Updated upstream
        $consulta = "INSERT INTO usuarios (`usuarios_nombre`,`usuarios_pass`,`usuarios_rol_id`) VALUES('$username', '$password', '$rol') ";			
        $datos = mysqli_query($conexion, $consulta);
        $resultado = mysqli_fetch_all($datos);
        echo json_encode($resultado);
        break;    
    case 2:        
        $consulta = "UPDATE usuarios SET usuarios_nombre='$username', rol='$rol', password='$password' WHERE usuarios_id='$user_id' ";		
        $datos = mysqli_query($conexion, $consulta);
        echo json_encode($datos);
=======
        $consulta = "INSERT INTO usuarios (username, nombre, ap_paterno, ap_materno, password, rol) VALUES('$username', '$nombre', '$ap_paterno', '$ap_materno', '$password', '$rol') ";			
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 
        
        $consulta = "SELECT * FROM usuarios ORDER BY user_id DESC LIMIT 1";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);       
        break;    
    case 2:        
        $consulta = "UPDATE usuarios SET username='$username', nombre='$nombre', ap_paterno='$ap_paterno', ap_materno='$ap_materno', password='$password', rol='$rol' WHERE id='$user_id' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        
        $consulta = "SELECT * FROM usuarios WHERE id='$user_id' ";       
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
>>>>>>> Stashed changes
        break;
    case 3:        
        $consulta = "DELETE FROM usuarios WHERE usuarios_id='$user_id' ";		
        $resultado = mysqli_query($conexion,$consulta);
        echo json_encode($resultado);              
        break;
    case 4:    
        $consulta = "SELECT * FROM usuarios";
        $resultado = mysqli_query($conexion,$consulta);
        $datos =  mysqli_fetch_array($resultado);
        echo json_encode($datos);
    case 5:
        $consulta = "SELECT * FROM usuarios WHERE usuarios_id='$user_id'";
        $resultado = mysqli_query($conexion,$consulta);
        $datos =  mysqli_fetch_array($resultado);
        echo json_encode($datos);
        break;
}

?>