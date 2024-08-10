<?php
include('config/config.php');

$nombre=$_POST['nombre'];
$id_tipo_materia=$_POST['id_tipo_materia'];

$ingreso=mysqli_query($con,"INSERT into asignatura (nombre,id_tipo_materia) values ('$nombre','$id_tipo_materia')") or die ("error".mysqli_error());
mysqli_close($con);
header("Location:ingreso_asignaturas.php");
 ?>
