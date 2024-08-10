<?php
include('config/config.php');

$periodo=$_POST['periodo'];
$asignatura=$_POST['asignatura'];

$ingreso=mysqli_query($con,"INSERT into asignatura_periodo (id_asignatura,id_periodo) values ('$asignatura','$periodo')") or die ("error".mysqli_error());
mysqli_close($con);
header("Location:ingreso_asignaturas.php");
 ?>
