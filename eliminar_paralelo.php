<?php
include('config/config.php');
$id=$_REQUEST['id'];
$result=mysqli_query($con, "DELETE FROM paralelo WHERE id_paralelo='$id'");
header("Location:ingreso_cursos.php");
?>