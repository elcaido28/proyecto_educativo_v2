<?php
include('config/config.php');

$periodo=$_POST['periodo'];
$cursos=$_POST['cursos'];
$profesor=$_POST['profesor'];

$ingreso=mysqli_query($con,"INSERT into pre_planificacion (cedula_profesor,id_curso_periodo,id_periodo) values ('$profesor','$cursos','$periodo')") or die ("error".mysqli_error());
mysqli_close($con);
header("Location:ingreso_planificacion.php");
 ?>
