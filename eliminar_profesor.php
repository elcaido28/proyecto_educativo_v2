<?php
include('config/config.php');
$id=$_REQUEST['id'];

$result=mysqli_query($con, "UPDATE profesor SET id_estado='2' WHERE id_profesor='$id'");
header('Location:ingreso_profesores.php');
?>