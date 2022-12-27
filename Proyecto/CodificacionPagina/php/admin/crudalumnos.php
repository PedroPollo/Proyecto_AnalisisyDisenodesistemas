<?php
include_once '../../conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : '';
$direccion = (isset($_POST['direccion'])) ? $_POST['direccion'] : '';
$cedula = (isset($_POST['cedula'])) ? $_POST['cedula'] : '';
$age = (isset($_POST['age'])) ? $_POST['age'] : '';
$correo = (isset($_POST['correo'])) ? $_POST['correo'] : '';
$fecha_reg = (isset($_POST['fecha_reg'])) ? $_POST['fecha_reg'] : '';

$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$user_id = (isset($_POST['user_id'])) ? $_POST['user_id'] : '';

switch($opcion){
    case 1:
        $consulta = "INSERT INTO `alumnos`(`nombre_alumno`, `direccion`, `cedula`, `edad`, `correo`, `fecha_registro`) VALUES('$nombre','$direccion', '$cedula', '$age', '$correo', '$fecha_reg') ";			
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 
        
        $consulta = "SELECT * FROM alumnos ORDER BY alumno_id DESC LIMIT 1";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);       
        break;    
    case 2:        
        $consulta = "UPDATE `profesor` SET `nombre`='$nombre',`direccion`='$direccion',`cedula`='$cedula',`clave`='$clave',`telefono`='$telefono',`correo`='$correo', `nivel_est`='$nivel_est' WHERE id='$user_id' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        
        $consulta = "SELECT * FROM alumnos WHERE alumno_id='$user_id' ";       
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 3:        
        $consulta = "DELETE FROM profesor WHERE profesor_id='$user_id' ";		
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