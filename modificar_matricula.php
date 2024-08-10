<?php
include('config/config.php');

$fecha=date('Y-m-d');
$numa=$_REQUEST['num'];

$num_matri=$_POST['num_matri'];
$id_periodo=$_POST['periodo'];
$id_estudiante=$_POST['estudiante'];
$representante=$_POST['representante'];
$consul=mysqli_query($con,"SELECT * from representante where cedula='$representante'");
$row=mysqli_fetch_assoc($consul);
$id_representante=$row['id_representante'];
$id_curso=$_POST['curso'];

echo $numa;
echo "<br>";
echo $num_matri;
echo "<br>";
echo $id_periodo;
echo "<br>";
echo $id_estudiante;
echo "<br>";
echo $representante;
echo "<br>";
echo $id_representante;
echo "<br>";
echo $id_curso;
echo "<br>";

//TABLA MATRICULA
$ingreso=mysqli_query($con,"UPDATE matricula SET num_matricula='$num_matri', id_estudiante='$id_estudiante', id_representante='$id_representante', id_curso_periodo='$id_curso', id_periodo='$id_periodo' WHERE id_matricula='$numa'") or die ("error".mysqli_error());

mysqli_close($con);
header("Location:ingreso_matricula.php?idm=$numa");
 ?>
