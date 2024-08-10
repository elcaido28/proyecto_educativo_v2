<?php
include('config/config.php');

$idc=$_REQUEST['id'];
$curso=$_POST['curso'];

$ingreso=mysqli_query($con,"UPDATE curso SET curso='$curso' WHERE id_curso=$idc") or die ("error".mysqli_error());
mysqli_close($con);
header("Location:editar_curso.php?idc=$idc");
 ?>
