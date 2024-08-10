<?php
include('config/config.php');

$idcp=$_REQUEST['id'];
$curso=$_POST['cursos'];
$periodo=$_POST['periodo'];
$paralelo=$_POST['paralelo'];

$ingreso=mysqli_query($con,"UPDATE curso_periodo SET id_paralelo='$paralelo', id_curso='$curso', id_periodo='$periodo' WHERE id_curso_periodo=$idcp") or die ("error".mysqli_error());
mysqli_close($con);
header("Location:editar_periodo.php?idp=$idcp");
 ?>
