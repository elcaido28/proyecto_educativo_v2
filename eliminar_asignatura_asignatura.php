<?php
include('config/config.php');
$id=$_REQUEST['id'];
$result=mysqli_query($con, "DELETE FROM asignatura WHERE id_asignatura='$id'");
header("Location:ingreso_asignaturas.php");
?>