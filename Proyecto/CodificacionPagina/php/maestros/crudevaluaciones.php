<?php
include_once '../../conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$titulo = (isset($_POST['titulo'])) ? $_POST['titulo'] : '';
$descripcion = (isset($_POST['descripcion'])) ? $_POST['descripcion'] : '';
$fecha = (isset($_POST['fecha'])) ? $_POST['fecha'] : '';
$porcentaje = (isset($_POST['porcentaje'])) ? $_POST['porcentaje'] : '';
$contenido = (isset($_POST['contenido'])) ? $_POST['contenido'] : '';

$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$user_id = (isset($_POST['user_id'])) ? $_POST['user_id'] : '';

switch($opcion){
    case 1:
        $consulta = "INSERT INTO `evaluaciones`(`titulo`, `descripcion`, `fecha`, `porcentaje`, `contenido_id`) VALUES ('$titulo','$descripcion','$fecha','$porcentaje','$contenido')";			
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 
        
        $opcion = 4;      
        break;    
    case 2:        
        $consulta = "UPDATE `evaluaciones` SET `titulo`='$titulo',`descripcion`='$descripcion',`fecha`='$fecha',`porcentaje`='$porcentaje' WHERE `evaluacion_id`='$user_id'";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        
        $$opcion = 4;
        break;
    case 3:        
        $consulta = "DELETE FROM evaluaciones WHERE evaluacion_id='$user_id' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();                           
        break;
    case 4:    
        $consulta = "SELECT * FROM `evaluaciones` WHERE contenido_id = '$contenido'";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
}

print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
$conexion=null;
?>