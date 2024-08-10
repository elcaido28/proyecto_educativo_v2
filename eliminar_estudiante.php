<?php
include('config/config.php');
$id=$_REQUEST['id'];

$result=mysqli_query($con, "UPDATE estudiante SET id_estado='2' WHERE id_estudiante='$id'");
header('Location:ingreso_estudiantes.php');
?>