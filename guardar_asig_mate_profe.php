<?php
include('config/config.php');

$id_tipo_materia=$_REQUEST['id_tipo_materia'];
$id_pro=$_REQUEST['id_pro'];

$ingreso=mysqli_query($con,"INSERT into materia_profesor (id_profesor,id_asignatura) values ('$id_pro','$id_tipo_materia')") or die ("error".mysqli_error());
mysqli_close($con);
header("Location:ingreso_asig_mate_profe.php?id=$id_pro");
 ?>
