<?php

$conexion=mysqli_connect('localhost','root','','proyecto');

$username = (isset($_POST['username'])) ? $_POST['username'] : '';
$rol = (isset($_POST['rol'])) ? $_POST['rol'] : '';
$password = (isset($_POST['password'])) ? $_POST['password'] : '';


$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$user_id = (isset($_POST['user_id'])) ? $_POST['user_id'] : '';


switch($opcion){
    case 1:
        $consulta = "INSERT INTO usuarios (`usuarios_nombre`,`usuarios_pass`,`usuarios_rol_id`) VALUES('$username', '$password', '$rol') ";			
        $datos = mysqli_query($conexion, $consulta);
        $resultado = mysqli_fetch_all($datos);
        echo json_encode($resultado);
        break;    
    case 2:        
        $consulta = "UPDATE usuarios SET usuarios_nombre='$username', rol='$rol', password='$password' WHERE usuarios_id='$user_id' ";		
        $datos = mysqli_query($conexion, $consulta);
        echo json_encode($datos);
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