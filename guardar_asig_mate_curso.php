<?php
include('config/config.php');

$id_asignatura_periodo=$_REQUEST['id_asignatura_periodo'];
$id_cursoP=$_REQUEST['id_cursoP'];

$ingreso=mysqli_query($con,"INSERT into asignatura_curso_periodo (id_curso_periodo,id_asignatura_periodo) values ('$id_cursoP','$id_asignatura_periodo')") or die ("error".mysqli_error());
mysqli_close($con);
header("Location:ingreso_asig_mate_curso.php?id_curso_peri=$id_cursoP");
?>
