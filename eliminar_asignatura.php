<?php
include('config/config.php');
$id=$_REQUEST['id'];
$idp=$_REQUEST['idprof'];
$result=mysqli_query($con, "DELETE FROM materia_profesor WHERE id_materia_profesor='$id'");
header("Location:ingreso_asig_mate_profe.php?id=$idp");
?>