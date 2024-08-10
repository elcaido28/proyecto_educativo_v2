<?php
include('config/config.php');
$id=$_REQUEST['id'];
$idcurso=$_REQUEST['idcur'];
$result=mysqli_query($con, "DELETE FROM asignatura_curso_periodo WHERE id_asignatura_curso_periodo='$id'");
header("Location:ingreso_asig_mate_curso.php?id_curso_peri=$idcurso");
?>