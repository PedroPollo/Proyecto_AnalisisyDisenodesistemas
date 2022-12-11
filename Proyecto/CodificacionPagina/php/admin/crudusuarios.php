<?php

class Conexion{	  
    public static function Conectar() {        
        define('servidor', 'localhost');
        define('nombre_bd', 'proyecto');
        define('usuario', 'root');
        define('password', '');					        
        $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');			
        try{
            $conexion = new PDO("mysql:host=".servidor."; dbname=".nombre_bd, usuario, password, $opciones);			
            return $conexion;
        }catch (Exception $e){
            die("El error de Conexión es: ". $e->getMessage());
        }
    }
}

$objeto = new Conexion();
$conexion=$objeto->Conectar();

$username = (isset($_POST['username'])) ? $_POST['username'] : '';
$rol = (isset($_POST['rol'])) ? $_POST['rol'] : '';
$password = (isset($_POST['password'])) ? $_POST['password'] : '';


$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$user_id = (isset($_POST['user_id'])) ? $_POST['user_id'] : '';


switch($opcion){
    case 1:
        $consulta = "INSERT INTO usuarios (`usuarios_nombre`,`usuarios_pass`,`usuarios_rol_id`) VALUES('$username', '$password', '$rol') ";			
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 
        
        $consulta = "SELECT * FROM usuarios ORDER BY usuarios_id DESC LIMIT 1";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);       
        break;    
    case 2:        
        $consulta = "UPDATE usuarios SET usuarios_nombre='$username', rol='$rol', password='$password' WHERE usuarios_id='$user_id' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        
        $consulta = "SELECT * FROM usuarios WHERE usuarios_id='$user_id' ";       
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 3:        
        $consulta = "DELETE FROM usuarios WHERE usuarios_id='$user_id' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();                           
        break;
    case 4:    
        $consulta = "SELECT * FROM usuarios";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
}

print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
$conexion=null;
?>