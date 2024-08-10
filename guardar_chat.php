<?php
include('config/config.php');
session_start();

$fecha=date('Y-m-d');
if(isset($_SESSION['PRIV']) && $_SESSION['PRIV']=="Profesor"){
	$id_profesor=$_SESSION['ID_pro'];
	$ced_profesor=$_SESSION['CEDU'];
	$descripcion=$_SESSION['NU'].": ".$_POST['mensaje'];
	//BUSCAR DATOS DEL CURSO
    $consulta1="SELECT * FROM pre_planificacion WHERE cedula_profesor='$ced_profesor'";
    $ejec1=mysqli_query($con,$consulta1);
    $row1=mysqli_fetch_array($ejec1);
    $curso=$row1['id_curso_periodo'];
}elseif(isset($_SESSION['PRIV']) && $_SESSION['PRIV']=="Representante"){
	$descripcion=$_SESSION['NU'].": ".$_POST['mensaje'];
	$idrepresentante=$_SESSION['ID_rep'];
      $cons1="SELECT * FROM matricula M INNER JOIN curso_periodo CP ON M.id_curso_periodo=CP.id_curso_periodo inner join representante R on R.id_representante=M.id_representante INNER JOIN pre_planificacion PP ON CP.id_curso_periodo=PP.id_curso_periodo WHERE M.id_representante='$idrepresentante'";
      $ejec1=mysqli_query($con,$cons1);
      $row1=mysqli_fetch_array($ejec1);
      $curso=$row1['id_curso_periodo'];
      $ced_profesor=$row1['cedula_profesor'];
      $nueva_consulta="SELECT * FROM profesor WHERE cedula='$ced_profesor'";
      $ejecutar_consulta=mysqli_query($con,$nueva_consulta);
      $row22=mysqli_fetch_array($ejecutar_consulta);
      $id_profesor=$row22['id_profesor'];
}
$ingreso=mysqli_query($con,"INSERT into chat_parental (fecha, descripcion, id_curso_periodo, id_profesor) values ('$fecha', '$descripcion', '$curso', '$id_profesor')") or die ("error".mysqli_error());
mysqli_close($con);
header("Location:interfaz_chat.php");
?>
