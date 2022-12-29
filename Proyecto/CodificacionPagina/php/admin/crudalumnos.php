<?php
include_once '../../conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : '';
$edad = (isset($_POST['age'])) ? $_POST['age'] : '';
$cedula = (isset($_POST['cedula'])) ? $_POST['cedula'] : '';
$correo = (isset($_POST['correo'])) ? $_POST['correo'] : '';
$fecha_reg = (isset($_POST['fech_reg'])) ? $_POST['fech_reg'] : '';


$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$user_id = (isset($_POST['user_id'])) ? $_POST['user_id'] : '';

switch($opcion){
    case 1:
        $consulta = "INSERT INTO `alumnos`(`nombre_alumno`, `edad`, `cedula`, `correo`, `fecha_registro`) VALUES ('$nombre','$edad','$cedula','$correo','$fecha_reg')";			
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 
        
        $consulta = "SELECT * FROM alumnos ORDER BY alumno_id DESC LIMIT 1";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);       
        break;    
    case 2:        
        $consulta = "UPDATE `alumnos` SET `nombre_alumno`='$nombre',`edad`='$edad',`cedula`='$cedula',`correo`='$correo',`fecha_registro`='$fecha_reg' WHERE `alumno_id`='$user_id'";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        
        $consulta = "SELECT * FROM alumnos WHERE alumno_id='$user_id' ";       
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 3:        
        $consulta = "DELETE FROM alumnos WHERE alumno_id='$user_id' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();                           
        break;
    case 4:    
        $consulta = "SELECT * FROM alumnos";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
}

print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
$conexion=null;
?>