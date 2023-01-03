<?php
include_once '../../conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : '';
$username = (isset($_POST['username'])) ? $_POST['username'] : '';
$clave = (isset($_POST['clave'])) ? $_POST['clave'] : '';


$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$user_id = (isset($_POST['user_id'])) ? $_POST['user_id'] : '';

switch($opcion){
    case 1:
        $consulta = "INSERT INTO `padres`(`nombre`, `username`, `clave`) VALUES ('$nombre','$username','$clave')";			
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 
        
        $consulta = "SELECT * FROM padres ORDER BY padres_id DESC LIMIT 1";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);       
        break;    
    case 2:        
        $consulta = "UPDATE `padres` SET `nombre`='$nombre',`username`='$username',`clave`='$clave' WHERE `padres_id`='$user_id'";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        
        $consulta = "SELECT * FROM padres WHERE padres_id='$user_id' ";       
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 3:        
        $consulta = "DELETE FROM padres WHERE padres_id='$user_id' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();                           
        break;
    case 4:    
        $consulta = "SELECT * FROM padres";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
}

print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
$conexion=null;
?>