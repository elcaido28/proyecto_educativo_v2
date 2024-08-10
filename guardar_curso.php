<?php
include('config/config.php');

$curso=$_POST['curso'];

$ingreso=mysqli_query($con,"INSERT into curso (curso) values ('$curso')") or die ("error".mysqli_error());
mysqli_close($con);
header("Location:ingreso_cursos.php");
 ?>
