<?php
include('config/config.php');

$num_matri=$_POST['num_matri'];
$fecha=date('Y-m-d');
$id_periodo=$_POST['periodo'];
$id_estudiante=$_POST['estudiante'];
$representante=$_POST['representante'];
$consul=mysqli_query($con,"SELECT * from representante where cedula='$representante'");
$row=mysqli_fetch_assoc($consul);
$id_representante=$row['id_representante'];

$id_curso=$_POST['curso'];
$estado="1";
//TABLA MATRICULA
$ingreso=mysqli_query($con,"INSERT into matricula (num_matricula,fecha,id_estudiante,id_representante,id_curso_periodo,id_periodo,id_estado) values ('$num_matri','$fecha','$id_estudiante','$id_representante','$id_curso','$id_periodo','$estado')") or die ("error".mysqli_error());
//USUARIOS ESTUDIANTE - Representante
$consulta11=mysqli_query($con,"SELECT * from estudiante  where id_estudiante='$id_estudiante' ");
 $row11=mysqli_fetch_array($consulta11);
   $cedula_estu=$row11['cedula'];

$ingreso20=mysqli_query($con,"INSERT into usuarios (cedula,clave,id_privilegio,id_estado) values ('$cedula_estu','$num_matri','4','$estado')") or die ("error".mysqli_error());
$ingreso21=mysqli_query($con,"INSERT into usuarios (cedula,clave,id_privilegio,id_estado) values ('$representante','$num_matri','5','$estado')") or die ("error".mysqli_error());


//TABLA NOTAS
$consulta=mysqli_query($con,"SELECT * from matricula  ORDER BY id_matricula ASC ");
 while($row=mysqli_fetch_array($consulta)){
   $id_matricula=$row['id_matricula'];
}
$ingreso2=mysqli_query($con,"INSERT into notas (id_matricula,id_periodo) values ('$id_matricula','$id_periodo')") or die ("error".mysqli_error());

// QUIMESTRE 1
$consulta2=mysqli_query($con,"SELECT * from notas  ORDER BY id_notas ASC ");
 while($row2=mysqli_fetch_array($consulta2)){
   $id_notas=$row2['id_notas'];
}

mysqli_close($con);
header("Location:ingreso_matricula.php");
 ?>
