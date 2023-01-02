<?php
include_once '../../conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$evaluacion = (isset($_POST['evaluacion'])) ? $_POST['evaluacion'] : '';
$alumno = (isset($_POST['alumno'])) ? $_POST['alumno'] : '';
$observaciones = (isset($_POST['observaciones'])) ? $_POST['observaciones'] : '';
$material = (isset($_POST['material'])) ? $_POST['material'] : '';


$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$user_id = (isset($_POST['user_id'])) ? $_POST['user_id'] : '';

switch($opcion){
    case 1:
        $consulta = "INSERT INTO `ev_entregadas`(`evaluacion_id`, `alumno_id`, `material`, `observacion`) VALUES ('$evaluacion','$alumno','$material','$observaciones')";			
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
        $consulta = "SELECT ev_entregadas.observacion,ev_entregadas.material,notas.valor_nota FROM ev_entregadas,notas WHERE ev_entregadas.evaluacion_id = '$evaluacion' AND ev_entregadas.alumno_id= '$alumno' AND notas.ev_entregadas_id=ev_entregadas.ev_entregadas_id;
        ";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
}

print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
$conexion=null;
?>