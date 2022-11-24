<?php
if(!empty($_POST["send"])){
    if (empty($_POST["pass"]) or empty($_POST["usuario"])) {
            echo '<div class="alert alert-danger"> Campo vacios </div>';
    } else {
        $usuario=$_POST["usuario"];
        $pass=$_POST["pass"];
        session_start();
        if(isset($_GET['cerrar_sesion'])){
            session_unset(); 
    
            // destroy the session 
            session_destroy(); 
        }
        $_SESSION['usuario']=$usuario;
        $sql=mysqli_query($conexion,"select * from usuarios where usuarios_nombre='$usuario' and usuarios_pass='$pass' ");
        $filas=mysqli_num_rows($sql);
        if ($filas) {
            $rol = $filas[3]
            $_SESSION['rol'] = $rol;
            switch($rol){
                case 1:
                    header('location:indexadmin.php');
                    break;
                case 2: 
                    header('location:indexmaestros.php');
                    break;
                case 3:
                    header('location:indexalumno.php');
                    break;
                case 4:
                    header('location:indexpadres.php');
                    break;
            }
        } else {
            echo '<div class="alert alert-danger"> Contrasena o Usuario Incorrecto </div>';
        }
    }    
}
?>