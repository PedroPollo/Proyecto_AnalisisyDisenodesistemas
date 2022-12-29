<?php
include_once '../../conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$nombre = (isset($_POST['profesor'])) ? $_POST['profesor'] : '';
$grado = (isset($_POST['grado'])) ? $_POST['grado'] : '';
$aula = (isset($_POST['aula'])) ? $_POST['aula'] : '';
$materia = (isset($_POST['materia'])) ? $_POST['materia'] : '';
$periodo = (isset($_POST['periodo'])) ? $_POST['periodo'] : '';


$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$user_id = (isset($_POST['user_id'])) ? $_POST['user_id'] : '';

switch($opcion){
    case 1:
        $consulta = "INSERT INTO `procesoprofesor`(`grado_id`, `aula_id`, `profesor_id`, `materia_id`, `periodo_id`) VALUES ('$grado','$aula','$nombre','$materia','$periodo')";			
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 
        
        $consulta = "SELECT procesoprofesor.proceso_id,profesor.nombre,grados.nombre_grado,aulas.nombre_aula,materias.nombre_materia,periodos.nombre_periodo FROM procesoprofesor,profesor,grados,aulas,materias,periodos WHERE profesor.profesor_id = procesoprofesor.profesor_id AND grados.grado_id = procesoprofesor.grado_id AND aulas.aula_id = procesoprofesor.aula_id AND materias.materia_id = procesoprofesor.materia_id AND periodos.periodo_id = procesoprofesor.periodo_id DESC LIMIT 1";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);       
        break;    
    case 2:        
        $consulta = "UPDATE `alumnos` SET `nombre_alumno`='$nombre',`edad`='$edad',`cedula`='$cedula',`correo`='$correo',`fecha_registro`='$fecha_reg' WHERE `alumno_id`='$user_id'";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        
        $consulta = "SELECT * FROM alumnos WHERE alumno_id='$user_id' ";       
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 3:        
        $consulta = "DELETE FROM procesoprofesor WHERE proceso_id='$user_id' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();                           
        break;
    case 4:    
        $consulta = "SELECT procesoprofesor.proceso_id,profesor.nombre,grados.nombre_grado,aulas.nombre_aula,materias.nombre_materia,periodos.nombre_periodo FROM procesoprofesor,profesor,grados,aulas,materias,periodos WHERE profesor.profesor_id = procesoprofesor.profesor_id AND grados.grado_id = procesoprofesor.grado_id AND aulas.aula_id = procesoprofesor.aula_id AND materias.materia_id = procesoprofesor.materia_id AND periodos.periodo_id = procesoprofesor.periodo_id;";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
}

print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
$conexion=null;
?>