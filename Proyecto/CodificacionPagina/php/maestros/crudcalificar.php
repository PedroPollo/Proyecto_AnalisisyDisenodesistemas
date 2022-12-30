<?php
include_once '../../conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$titulo = (isset($_POST['titulo'])) ? $_POST['titulo'] : '';
$descripcion = (isset($_POST['descripcion'])) ? $_POST['descripcion'] : '';
$material = (isset($_POST['material'])) ? $_POST['material'] : '';
$contenido = (isset($_POST['contenido'])) ? $_POST['contenido'] : '';

$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$user_id = (isset($_POST['user_id'])) ? $_POST['user_id'] : '';

switch($opcion){
    case 1:
        $consulta = "INSERT INTO `contenidos`(`titulo`, `descripcion`, `material`, `procesoprofesor_id`) VALUES ('$titulo','$descripcion','$material','$clase')";			
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 
        
        $opcion = 4;      
        break;    
    case 2:        
        $consulta = "UPDATE `contenidos` SET `titulo`='$titulo',`descripcion`='$descripcion',`material`='$material' WHERE `contenido_id`= '$user_id'";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        
        $$opcion = 4;
        break;
    case 3:        
        $consulta = "DELETE FROM contenidos WHERE contenido_id='$user_id' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();                           
        break;
    case 4:    
        $consulta = "SELECT * FROM `evaluaciones` WHERE contenido_id = '$contenido' ";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
}

print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
$conexion=null;
?>