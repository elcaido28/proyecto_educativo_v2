<?php
include('config/config.php');
$fecha=date('Y-m-d');

$idpro=$_REQUEST['id'];
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
   $logo="img_profesor/".$foto;
   copy($ruta,$logo);
}else {
   $result2= mysqli_query($con,"SELECT * from profesor where cedula='$cedula'");
   $row2= mysqli_fetch_assoc($result2);
   $logo=$row2['foto'];
}

$modificar="UPDATE profesor SET cedula='$cedula', nombres='$nombres', apellidos='$apellidos', sexo='$sexo', fecha_naci='$fecha_naci', direccion='$direccion', email='$correo', foto='$logo' WHERE id_profesor='$idpro'";
$ejec=mysqli_query($con,$modificar) or die ("error".mysqli_error());
mysqli_close($con);
header("Location:editar_profesor.php?idp=$idpro");
 ?>
