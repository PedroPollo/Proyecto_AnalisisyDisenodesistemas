<?php 
session_start();
echo $_SESSION['rol'];
echo $_SESSION['usuario'];
echo "hola";
session_destroy();
header("Location:../../login.php");
?>