<?php
include('config/config.php');
$id=$_REQUEST['id'];
$id_estu=$_REQUEST['idest'];

$result=mysqli_query($con, "UPDATE representante SET id_estado='2' WHERE id_representante='$id'");
header("Location:ingreso_representante.php?id=$id_estu");
?>