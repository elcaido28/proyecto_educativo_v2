<?php
include('config/config.php');

$idpa=$_REQUEST['id'];
$curso=$_POST['curso'];
$cantidad=$_POST['cantidad'];

$ingreso=mysqli_query($con,"UPDATE paralelo SET paralelo='$curso', cantidad='$cantidad' WHERE id_paralelo=$idpa") or die ("error".mysqli_error());
mysqli_close($con);
header("Location:editar_paralelo.php?idp=$idpa");
 ?>
