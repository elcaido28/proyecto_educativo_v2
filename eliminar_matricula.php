<?php
include('config/config.php');
$id=$_REQUEST['id'];

$result=mysqli_query($con, "UPDATE matricula SET id_estado='2' WHERE id_matricula='$id'");
header('Location:ingreso_matricula.php');
?>