<?php
$conexion=mysqli_connect('localhost','root','','proyecto');

$username= (isset($_POST['username'])) ? $_POST['username'] : '';
$password= (isset($_POST['password'])) ? $_POST['password'] : '';
$rol= (isset($_POST['rol'])) ? $_POST['rol'] : '';

$user_id = (isset($_POST['user_id']))? $_POST['user_id'] : '';
$opcion = (isset($_POST['opcion']))? $_POST['opcion'] : '';

switch ($opcion) {

    case 1:
        $consulta = "INSERT INTO `usuarios`(`usuarios_nombre`, `usuarios_pass`, `usuarios_rol_id`) VALUES ('$username','$password','$rol')";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();

        $consulta = "SELECT * FROM usuarios ORDER BY usuarios_id DESC LIMIT 1";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 2:
        $consulta = "UPDATE `usuarios` SET `usuarios_nombre`='username',`usuarios_pass`='$password',`usuarios_rol_id`='$rol' WHERE `usuarios_id` = '$user_id'";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();

        $consulta = "SELECT * FROM usuarios WHERE `usuarios_id` = '$user_id'";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 3:
        $consulta = "DELETE FROM `usuarios` WHERE `usuarios_id` = '$user_id'";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        break;
    case 4:
        $consulta = "SELECT * FROM usuarios WHERE `usuarios_id` = '$user_id'";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data = $resultado->fetchAll(PDO::FETCH_ASSOC);

            break;
}

print json_encode($data, JSON_UNESCAPED_UNICODE);

?>