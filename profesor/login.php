<?php
session_start();
  $nomU = $_POST['cedula'];
  $pas = $_POST['clave'];
  if(empty($nomU) || empty($pas)){
  	header("Location: index.php");
  	exit();
  }

   include('../config/config.php');
   $result= mysqli_query($con,"SELECT * from usuarios U INNER JOIN privilegios P on P.id_privilegios=U.id_privilegio where U.cedula ='$nomU' and U.id_estado='1'");
   $row= mysqli_fetch_assoc($result);
   $abc=$row['id_usuarios'];
   if($row['clave']==$pas){
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
     header("Location:../dashboard.php");
   }else{
     header("Location: index.php");
   }
 ?>
