<?php
include('config/config.php');
$id=$_REQUEST['id'];
$result=mysqli_query($con, "DELETE FROM asignatura_periodo WHERE id_asignatura_periodo='$id'");
header("Location:ingreso_asignaturas.php");
?>