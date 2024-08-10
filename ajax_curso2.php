<?php
include('config/config.php');
$salida="";

session_start();
$cedu_profe=$_SESSION['CEDU'];

if(isset($_POST['consul'])){
  $periodo=$_POST['consul'];
$consulta=mysqli_query($con,"SELECT * from pre_planificacion PPL INNER JOIN curso_periodo CP ON PPL.id_curso_periodo=CP.id_curso_periodo inner join curso C on C.id_curso=CP.id_curso inner join paralelo P on P.id_paralelo=CP.id_paralelo inner join periodo PP on PP.id_periodo=CP.id_periodo  where  PP.id_periodo='$periodo' and PPL.cedula_profesor='$cedu_profe'");

  $salida.="<label class='etiq_caja'>Curso</label> <select class='F_combo' name='curso' required ><option value='' >-SELECCIONE-</option>";
       while($row=mysqli_fetch_array($consulta)){
         if (isset($row['curso'])) {
      $salida.= "<option value='".$row['id_curso_periodo']."'>". $row['curso']." - ".$row['paralelo']."</option>";} }
  $salida.="</select>";



}else {
  $salida="0";
}

echo $salida;
mysqli_close($con);

 ?>
