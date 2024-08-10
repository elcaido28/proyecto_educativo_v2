<?php
include('config/config.php');

$paralelo=$_POST['paralelo'];
$cantidad=$_POST['cantidad'];

$ingreso=mysqli_query($con,"INSERT into paralelo (paralelo,cantidad) values ('$paralelo','$cantidad')") or die ("error".mysqli_error());
mysqli_close($con);
header("Location:ingreso_cursos.php");
 ?>
