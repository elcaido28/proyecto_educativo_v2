<?php
include('config/config.php');
$fecha=date('Y-m-d');
$id_repre=$_REQUEST['id'];
$idestu=$_REQUEST['ide'];

$cedula=$_POST['cedula'];
$nombres=$_POST['nombres'];
$apellidos=$_POST['apellidos'];
$sexo=$_POST['sexo'];
$fecha_naci=$_POST['fecha_naci'];
$direccion=$_POST['direccion'];
$correo =$_POST['correo'];
$parentesco =$_POST['parentesco'];
 if ($_FILES["foto"]["name"]!="") {
   $foto=$_FILES["foto"]["name"];
   $ruta=$_FILES["foto"]["tmp_name"];
   $logo="img_representante/".$foto;
   copy($ruta,$logo);
 }else {
   $result2= mysqli_query($con,"SELECT * from representante where cedula='$cedula'");
   $row2= mysqli_fetch_assoc($result2);
   $logo=$row2['foto'];
 }

$modificar="UPDATE representante SET cedula='$cedula', nombres='$nombres', apellidos='$apellidos', sexo='$sexo', fecha_naci='$fecha_naci', direccion='$direccion', email='$correo', foto='$logo', parentesco='$parentesco' WHERE id_representante='$id_repre'";
$ejec=mysqli_query($con,$modificar) or die ("error".mysqli_error());
mysqli_close($con);
header("Location:editar_representante.php?idrep=$id_repre&ide=$idestu");

 ?>
