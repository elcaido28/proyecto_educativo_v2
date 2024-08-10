<?php
include('config/config.php');
$salida="";
if(isset($_POST['consulta'])){
  $id_estu=$_POST['consulta'];
$consulta=mysqli_query($con,"SELECT * from representante where  id_estudiante='$id_estu'");
$row=mysqli_fetch_array($consulta);
if (isset($row['cedula'])) {
  $salida=$row['cedula'];
}else {
  $salida="0";
}
}
echo $salida;
mysqli_close($con);

 ?>
