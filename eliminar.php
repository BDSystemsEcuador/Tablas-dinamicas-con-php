<?php
    include("conexion.php");
    if($_GET['id']){
        $id=$_GET['id'];
        $query="UPDATE empleados set activo=1 WHERE id = '$id'";
        $conn->query($query);
        header("Location:index.php");
        
    }
?>