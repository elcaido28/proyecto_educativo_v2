<?php
include('config/config.php');

$idpre=$_REQUEST['idpr'];
$periodo=$_POST['periodo'];
$cursos=$_POST['cursos'];
$profesor=$_POST['profesor'];

echo $idpre;
echo "<br>";
echo $periodo;
echo "<br>";
echo $cursos;
echo "<br>";
echo $profesor;
echo "<br>";


$ingreso=mysqli_query($con,"UPDATE pre_planificacion SET cedula_profesor='$profesor', id_curso_periodo='$cursos', id_periodo='$periodo' WHERE id_pre_planificacion='$idpre'") or die ("error".mysqli_error());
mysqli_close($con);
header("Location:editar_planificacion.php?idp=$idpre");
?>
