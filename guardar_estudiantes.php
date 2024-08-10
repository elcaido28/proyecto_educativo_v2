<?php
include('config/config.php');
$fecha=date('Y-m-d');

$cedula=$_POST['cedula'];
$nombres=$_POST['nombres'];
$apellidos=$_POST['apellidos'];
$sexo=$_POST['sexo'];
$fecha_naci=$_POST['fecha_naci'];
$direccion=$_POST['direccion'];
$correo =$_POST['correo'];
 $estado="1";
 if ($_FILES["foto"]["name"]!="") {
   $foto=$_FILES["foto"]["name"];
   $ruta=$_FILES["foto"]["tmp_name"];
   $logo="img_estudiante/".$foto;
   copy($ruta,$logo);
 }else {
   $logo="img_estudiante/default.png";
 }

$ingreso=mysqli_query($con,"INSERT into estudiante (fecha,cedula,nombres,apellidos,sexo,fecha_naci,direccion,email,foto,id_estado) values
('$fecha','$cedula','$nombres','$apellidos','$sexo','$fecha_naci','$direccion','$correo','$logo','$estado')") or die ("error".mysqli_error());
mysqli_close($con);
header("Location:ingreso_estudiantes.php");
 ?>
