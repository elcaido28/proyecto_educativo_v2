<?php
include('config/config.php');
$salida="";
if(isset($_POST['consu'])){
  $id_estu=$_POST['consu'];
$consulta=mysqli_num_rows(mysqli_query($con,"SELECT * from matricula where id_curso_periodo='$id_estu'"));
$consulta2=mysqli_query($con,"SELECT * from curso_periodo where id_curso_periodo='$id_estu'");
$row2=mysqli_fetch_array($consulta2);
$id_curso=$row2['id_curso'];
$id_paralelo=$row2['id_paralelo'];
$periodo=$row2['id_periodo'];
//$consulta=25;
if ($consulta>=25) {
//  $salida="Alerta, En este curso ya hay 25 estudiantes asigne otro paralelo";

  $consulta3=mysqli_num_rows(mysqli_query($con,"SELECT * from curso_periodo where id_curso='$id_curso' and id_periodo='$periodo'"));
  $num_paralelo=$id_paralelo;
  $num_paralelo=$num_paralelo+1;
  if ($num_paralelo>$consulta3) {
  //  $salida="Alerta, Curso agotado no hay mas paralelos";
    $num_paralelo=$num_paralelo-1;
  }else{
    $consulta4=mysqli_query($con,"SELECT * from curso_periodo where id_curso='$id_curso' and id_paralelo='$num_paralelo' and id_periodo='$periodo'");
    $row4=mysqli_fetch_array($consulta4);
    $id_curso_periodo4=$row4['id_curso_periodo'];


    $consulta5=mysqli_query($con,"SELECT * from curso_periodo CP inner join curso C on C.id_curso=CP.id_curso inner join paralelo P on P.id_paralelo=CP.id_paralelo inner join periodo PP on PP.id_periodo=CP.id_periodo  where  PP.id_periodo='$periodo' and CP.id_curso_periodo='$id_curso_periodo4'");
       $row5=mysqli_fetch_array($consulta5);
      $salida.="<label class='etiq_caja'>Curso</label> <select class='F_combo' name='curso' id='matri_curso_peri' required ><option value='".$row5['id_curso_periodo']."' >".$row5['curso']." - ".$row5['paralelo']."</option>";
          $salida.= "<option value='".$row5['id_curso_periodo']."'>". $row5['curso']." - ".$row5['paralelo']."</option>";}
      $salida.="</select>";



}else{
    //$salida="hay - ".$consulta."  estudiantes";
}

// $row=mysqli_fetch_array($consulta);
// if (isset($row['cedula'])) {
//   $salida=$row['cedula'];
// }else {
//   $salida="0";
// }
}
echo $salida;
mysqli_close($con);

 ?>
