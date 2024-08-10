<?php
include('config/config.php');

$ida=$_REQUEST['id'];
$nombre=$_POST['nombre'];
$tipo=$_POST['id_tipo_materia'];

$ingreso=mysqli_query($con,"UPDATE asignatura SET nombre='$nombre', id_tipo_materia='$tipo' WHERE id_asignatura=$ida") or die ("error".mysqli_error());
mysqli_close($con);
header("Location:editar_asignatura.php?id=$ida");
 ?>
