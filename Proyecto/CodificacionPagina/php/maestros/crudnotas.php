<?php
include_once '../../conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$nota = (isset($_POST['nota'])) ? $_POST['nota'] : '';
$fecha = (isset($_POST['fecha'])) ? $_POST['fecha'] : '';
$entrega = (isset($_POST['entrega'])) ? $_POST['entrega'] : '';

$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';

switch($opcion){
    case 1:
        $consulta = "INSERT INTO `notas`(`ev_entregadas_id`, `valor_nota`, `fecha`) VALUES ('$entrega','$nota','$fecha')";			
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 
        
        $opcion = 4;      
        break;    
    case 2:        
        $consulta = "UPDATE `notas` SET `valor_nota`='$nota',`fecha`='$fecha' WHERE `ev_entregadas_id`='$entrega'";		
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
        $consulta = "SELECT * FROM `notas` WHERE ev_entregadas_id = '$entrega'";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
}

print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
$conexion=null;
?>