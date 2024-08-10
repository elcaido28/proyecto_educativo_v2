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
$parentesco =$_POST['parentesco'];
 $estado="1";
  $id_estudiante=$_REQUEST['id'];
 if ($_FILES["foto"]["name"]!="") {
   $foto=$_FILES["foto"]["name"];
   $ruta=$_FILES["foto"]["tmp_name"];
   $logo="img_representante/".$foto;
   copy($ruta,$logo);
 }else {
  $logo="img_representante/default.png";
 }

$ingreso=mysqli_query($con,"INSERT into representante (fecha,cedula,nombres,apellidos,sexo,fecha_naci,direccion,email,foto,parentesco,id_estado,id_estudiante) values
('$fecha','$cedula','$nombres','$apellidos','$sexo','$fecha_naci','$direccion','$correo','$logo','$parentesco','$estado','$id_estudiante')") or die ("error".mysqli_error());
mysqli_close($con);
header("Location:ingreso_representante.php?id=$id_estudiante");
 ?>
