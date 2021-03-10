<?php
include("conexion.php");
$nombre=$conn->real_escape_string($_POST['nombre']);
$telefono=$conn->real_escape_string($_POST['telefono']);
$fecha_nacimiento=$conn->real_escape_string($_POST['fecha_nacimiento']);
$estado_civil=$conn->real_escape_string($_POST['estado_civil']);
if(!empty($nombre)&&!empty($telefono)&&!empty($fecha_nacimiento)&&!empty($estado_civil)){
    $SELECT="SELECT telefono FROM empleados WHERE telefono = ? limit 1";
    $INSERT="INSERT INTO empleados (nombre,telefono,fecha_nacimiento,estado_civil) values (?,?,?,?)";
    $stmt=$conn->prepare($SELECT);
    $stmt->bind_param('s',$telefono);
    $stmt->execute();
    $stmt->bind_result($telefono);
    $stmt->store_result();
    $rnum=$stmt->num_rows();
    if($rnum==0){
        $stmt->close();
        $stmt=$conn->prepare($INSERT);
        $stmt->bind_param('ssss',$nombre,$telefono,$fecha_nacimiento,$estado_civil);
        $stmt->execute();
        echo "agregado con exito";
        header("Location: index.php");
    }else{
        echo "ya existe un usuario registrado";
        header("Location: agregar.php");
        $stmt->close();
    }
}else{
    echo "ingrese todos los campos";
    header("Location: agregar.php");
    die();
}


?>