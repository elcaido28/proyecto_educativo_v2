<?php
include('config/config.php');
$id=$_REQUEST['id'];
$result=mysqli_query($con, "DELETE FROM curso_periodo WHERE id_curso_periodo='$id'");
header("Location:ingreso_cursos.php");
?>