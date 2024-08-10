<?php
include('config/config.php');
$id=$_REQUEST['id'];
$result=mysqli_query($con, "DELETE FROM pre_planificacion WHERE id_pre_planificacion='$id'");
header("Location:ingreso_planificacion.php");
?>