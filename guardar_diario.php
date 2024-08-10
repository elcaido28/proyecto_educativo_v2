<?php
include('config/config.php');
session_start();

$fecha=$_POST['fecha'];
$curso=$_POST['curso'];
$descripcion=$_SESSION['NU']." -  ".$_POST['descripcion'];
$id_profesor=$_SESSION['ID_pro'];

$ingreso=mysqli_query($con,"INSERT into diario (fecha, descripcion, id_curso_periodo, id_profesor) values ('$fecha', '$descripcion', '$curso', '$id_profesor')") or die ("error".mysqli_error());
mysqli_close($con);
header("Location:ingreso_diario.php");
 ?>
