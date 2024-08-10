<?php
session_start();
  $nomU = $_POST['cedula'];
  $pas = $_POST['clave'];
  $pRIV = $_POST['privilegio'];
  if(empty($nomU) || empty($pas) || empty($pRIV)){
  	header("Location: index.php");
  	exit();
  }
   include('config/config.php');

if ($pRIV=="Administrativo") {
  $result= mysqli_query($con,"SELECT * from usuarios U INNER JOIN privilegios P on P.id_privilegios=U.id_privilegio where U.cedula ='$nomU' and U.id_estado='1'");
  $row= mysqli_fetch_assoc($result);
  $abc=$row['id_usuarios'];
  if($row['clave']==$pas && $row['privilegio']=="Administrador" || $row['clave']==$pas && $row['privilegio']=="Secretaria"){
    $result2= mysqli_query($con,"SELECT * from empleados E where  E.cedula='$nomU'");
    //$result2= mysqli_query($con,"SELECT * from empleados E where  E.cedula='$nomU'");
     $row4= mysqli_fetch_assoc($result2);
     $_SESSION['ID_usu']=$row['id_usuarios'];
     $_SESSION['NU']=$row4['nombres']." ".$row4['apellidos'];
    $_SESSION['PRIV']=$row['privilegio'];
     $_SESSION['FOTO']=$row4['foto'];
    // $_SESSION['estado']=$row4['estado'];

    //$_SESSION['TD']=$row4['todoR'];
    //$_SESSION['S']=$row4['recurso_secre'];
    //$_SESSION['PD']=$row4['recurso_profe_dele'];
    //$_SESSION['SC']=$row4['recurso_secre_conse'];
    header("Location:dashboard.php");
  }else{
    header("Location: index.php");
  }
}

if ($pRIV=="Estudiante") {
  $result= mysqli_query($con,"SELECT * from usuarios U INNER JOIN privilegios P on P.id_privilegios=U.id_privilegio where U.cedula ='$nomU' and U.id_estado='1'");
  $row= mysqli_fetch_assoc($result);
  $abc=$row['id_usuarios'];
  if($row['clave']==$pas && $row['privilegio']=="Estudiante"){
    $result2= mysqli_query($con,"SELECT * from estudiante where cedula='$nomU'");
    //$result2= mysqli_query($con,"SELECT * from empleados E where  E.cedula='$nomU'");
     $row4= mysqli_fetch_assoc($result2);
     $_SESSION['ID_usu']=$row['id_usuarios'];
     $_SESSION['NU']=$row4['nombres']." ".$row4['apellidos'];
     $_SESSION['ID_estu']=$row4['id_estudiante'];
     $_SESSION['CEDULA']=$row4['cedula'];
     $_SESSION['FOTO']=$row4['foto'];
    $_SESSION['PRIV']=$row['privilegio'];
    // $_SESSION['estado']=$row4['estado'];

    //$_SESSION['TD']=$row4['todoR'];
    //$_SESSION['S']=$row4['recurso_secre'];
    //$_SESSION['PD']=$row4['recurso_profe_dele'];
    //$_SESSION['SC']=$row4['recurso_secre_conse'];
    header("Location:dashboard.php");
  }else{
    header("Location: index.php");
  }
}


if ($pRIV=="Representante") {
  $result= mysqli_query($con,"SELECT * from usuarios U INNER JOIN privilegios P on P.id_privilegios=U.id_privilegio where U.cedula ='$nomU' and U.id_estado='1'");
  $row= mysqli_fetch_assoc($result);
  $abc=$row['id_usuarios'];
  $_SESSION['PRIV']=$row['privilegio'];
  if($row['clave']==$pas  && $row['privilegio']=="Representante"){
    $result2= mysqli_query($con,"SELECT * from representante  where  cedula='$nomU'");
    //$result2= mysqli_query($con,"SELECT * from empleados E where  E.cedula='$nomU'");
     $row4= mysqli_fetch_assoc($result2);
     $_SESSION['ID_usu']=$row['id_usuarios'];
     $_SESSION['NU']=$row4['nombres']." ".$row4['apellidos'];

     $_SESSION['ID_rep']=$row4['id_representante'];
     $_SESSION['CEDULA']=$row4['cedula'];
     $_SESSION['FOTO']=$row4['foto'];
    // $_SESSION['estado']=$row4['estado'];

    //$_SESSION['TD']=$row4['todoR'];
    //$_SESSION['S']=$row4['recurso_secre'];
    //$_SESSION['PD']=$row4['recurso_profe_dele'];
    //$_SESSION['SC']=$row4['recurso_secre_conse'];
    header("Location:dashboard.php");
  }else{
    header("Location: index.php");
  }
}


if ($pRIV=="Docente") {
  $result= mysqli_query($con,"SELECT * from usuarios U INNER JOIN privilegios P on P.id_privilegios=U.id_privilegio where U.cedula ='$nomU' and U.id_estado='1'");
  $row= mysqli_fetch_assoc($result);
  $abc=$row['id_usuarios'];
  if($row['clave']==$pas && $row['privilegio']=="Profesor"){
    $result2= mysqli_query($con,"SELECT * from profesor  where  cedula='$nomU'");
    //$result2= mysqli_query($con,"SELECT * from empleados E where  E.cedula='$nomU'");
     $row4= mysqli_fetch_assoc($result2);
     $_SESSION['ID_usu']=$row['id_usuarios'];
     $_SESSION['NU']=$row4['nombres']." ".$row4['apellidos'];
     $_SESSION['ID_pro']=$row4['id_profesor'];
     $_SESSION['CEDU']=$row4['cedula'];
    $_SESSION['PRIV']=$row['privilegio'];
    $_SESSION['FOTO']=$row4['foto'];
    // $_SESSION['estado']=$row4['estado'];

    //$_SESSION['TD']=$row4['todoR'];
    //$_SESSION['S']=$row4['recurso_secre'];
    //$_SESSION['PD']=$row4['recurso_profe_dele'];
    //$_SESSION['SC']=$row4['recurso_secre_conse'];
    header("Location:dashboard.php");
  }else{
    header("Location: index.php");
  }
}

 ?>
