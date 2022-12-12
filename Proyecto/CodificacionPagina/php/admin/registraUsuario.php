<?php 

include_once '../../conexion_bd.php';
$usuario = $_POST["username"];
$pass = $_POST["password"];
$rol = $_POST["roles"];

$conexion=mysqli_connect('localhost','root','','proyecto');
        $sql = "INSERT INTO `usuarios`(`usuarios_nombre`, `usuarios_pass`, `usuarios_rol_id`) VALUES ('".$usuario."','".$pass."','".$rol."')";
        $result=mysqli_query($conexion,$sql);
        if($result){
            return header("Location:adminusuarios.php");
        }else{
            return "error";
        }

?>