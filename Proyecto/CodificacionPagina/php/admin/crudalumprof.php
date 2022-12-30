<?php
include_once '../../conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$nombre = (isset($_POST['alumno'])) ? $_POST['alumno'] : '';
$grupo = (isset($_POST['grupo'])) ? $_POST['grupo'] : '';


$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$user_id = (isset($_POST['user_id'])) ? $_POST['user_id'] : '';

switch($opcion){
    case 1:
        $consulta = "INSERT INTO `procesoalumno`(`alumno_id`, `proceso_id`) VALUES ('$nombre','$grupo')";			
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 
        
        $opcion = 4;     
        break;    
    case 2:        
        $consulta = "UPDATE `procesoalumno` SET `alumno_id`='$nombre',`proceso_id`='$grupo' WHERE `procesoa_id`='$user_id'";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        
        $opcion = 4;
        break;
    case 3:        
        $consulta = "DELETE FROM procesoalumno WHERE `procesoa_id`='$user_id' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();                           
        break;
    case 4:    
        $consulta = "SELECT procesoalumno.procesoa_id, alumnos.nombre_alumno, procesoalumno.proceso_id FROM procesoalumno, alumnos WHERE alumnos.alumno_id = procesoalumno.alumno_id;";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
}

print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
$conexion=null;
?>