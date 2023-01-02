<?php
include_once '../../conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$contenido = (isset($_POST['contenido'])) ? $_POST['contenido'] : '';

$user_id = (isset($_POST['user_id'])) ? $_POST['user_id'] : '';
  
        $consulta = "SELECT * FROM `evaluaciones` WHERE `contenido_id`='$contenido';";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
    

print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
$conexion=null;
?>