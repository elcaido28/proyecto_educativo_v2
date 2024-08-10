<?php
include('config/config.php');

$periodo=$_POST['periodo'];
$paralelo=$_POST['paralelo'];
$curso=$_POST['cursos'];

$ingreso=mysqli_query($con,"INSERT into curso_periodo (id_paralelo,id_curso,id_periodo) values ('$paralelo','$curso','$periodo')") or die ("error".mysqli_error());
mysqli_close($con);
header("Location:ingreso_cursos.php");
 ?>
