<?php
include('config/config.php');

$idap=$_REQUEST['id'];
$periodo=$_POST['periodo'];
$asignatura=$_POST['asignatura'];

$ingreso=mysqli_query($con,"UPDATE asignatura_periodo SET id_asignatura='$asignatura', id_periodo='$periodo' WHERE id_asignatura_periodo=$idap") or die ("error".mysqli_error());
mysqli_close($con);
header("Location:editar_asignatura_periodo.php?id=$idap");
 ?>
