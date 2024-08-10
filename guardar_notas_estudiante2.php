
<?php
include('config/config.php');


$estudiante=$_REQUEST['id_estudiante'];
$periodo=$_REQUEST['id_periodo'];
$curso_p=$_REQUEST['id_curso'];
$materia=$_REQUEST['id_materia'];

$parcial=$_POST['parcial'];

$promedioQ=$_POST['promedio'];
$examen_quimestral=$_POST['examen_quimestral'];

if ($materia!=11) {
$deber=$_POST['deber'];
$A_individual=$_POST['A_individual'];
$A_grupal=$_POST['A_grupal'];
$leccion=$_POST['leccion'];
$aporte=$_POST['aporte'];
$suma=$deber+$A_individual+$A_grupal+$leccion+$aporte;
$promedio=$suma/5;
}else{
  $comb_comporta=$_POST['comb_comporta'];
}


// QUIMESTRE 1
$consulta2=mysqli_query($con,"SELECT * from matricula M inner join notas N on N.id_matricula=M.id_matricula inner join estudiante E on E.id_estudiante=M.id_estudiante where E.id_estudiante='$estudiante'  ORDER BY N.id_notas ASC ");
 while($row2=mysqli_fetch_array($consulta2)){
   $id_notas=$row2['id_notas'];
}

if ($promedioQ=="") {
  $ingreso3=mysqli_query($con,"INSERT into quimestre2 (promedio,examen,id_periodo,id_notas,id_asignatura_periodo) values ('0.00','0.00','$periodo','$id_notas','$materia')") or die ("error".mysqli_error());

  // CONSULTAS PARA MODIFICAR
  $consulta31=mysqli_query($con,"SELECT * from quimestre2 where id_periodo='$periodo' and id_notas='$id_notas' and id_asignatura_periodo='$materia' ORDER BY id_quimestre2 ASC ");
   while($row31=mysqli_fetch_array($consulta31)){
     $id_quimestre2=$row31['id_quimestre2'];
  }


  //  PARCIAL 1  =>  DE QUIMESTRE 1
  $ingreso7=mysqli_query($con,"INSERT into parcial1_q2 (deber,activi_individual,activi_grupal,leccion,aporte,promedio,id_quimestre2) values ('0.00','0.00','0.00','0.00','0.00','0.00','$id_quimestre2')") or die ("error".mysqli_error());

  //  PARCIAL 2  =>  DE QUIMESTRE 1
  $ingreso8=mysqli_query($con,"INSERT into parcial2_q2 (deber,activi_individual,activi_grupal,leccion,aporte,promedio,id_quimestre2) values ('0.00','0.00','0.00','0.00','0.00','0.00','$id_quimestre2')") or die ("error".mysqli_error());

  //  PARCIAL 3  =>  DE QUIMESTRE 1
  $ingreso9=mysqli_query($con,"INSERT into parcial3_q2 (deber,activi_individual,activi_grupal,leccion,aporte,promedio,id_quimestre2) values ('0.00','0.00','0.00','0.00','0.00','0.00','$id_quimestre2')") or die ("error".mysqli_error());

  //  PROMEDIO PRACIAL =>  DE QUIMESTRE 1
  $ingreso10=mysqli_query($con,"INSERT into promedio_q2 (p1,p2,p3,sub_pro,promedio,id_quimestre2) values ('0.00','0.00','0.00','0.00','0.00','$id_quimestre2')") or die ("error".mysqli_error());

}

// CONSULTAS PARA MODIFICAR
$consulta3=mysqli_query($con,"SELECT * from quimestre2 where id_periodo='$periodo' and id_notas='$id_notas' and id_asignatura_periodo='$materia' ORDER BY id_quimestre2 ASC ");
 while($row3=mysqli_fetch_array($consulta3)){
   $id_quimestre2=$row3['id_quimestre2'];
}

$consulta5=mysqli_query($con,"SELECT * from parcial1_q2 where id_quimestre2='$id_quimestre2' ORDER BY id_parcial1_Q2 ASC ");
 while($row5=mysqli_fetch_array($consulta5)){
   $id_parcial1=$row5['id_parcial1_Q2'];
   $promediop1=$row5['promedio'];
}

  $consulta6=mysqli_query($con,"SELECT * from parcial2_q2 where id_quimestre2='$id_quimestre2' ORDER BY id_parcial2_Q2 ASC ");
   while($row6=mysqli_fetch_array($consulta6)){
     $id_parcial2=$row6['id_parcial2_Q2'];
     $promediop2=$row6['promedio'];
  }

  $consulta7=mysqli_query($con,"SELECT * from parcial3_q2 where id_quimestre2='$id_quimestre2' ORDER BY id_parcial3_Q2 ASC ");
   while($row7=mysqli_fetch_array($consulta7)){
     $id_parcial3=$row7['id_parcial3_Q2'];
     $promediop3=$row7['promedio'];
  }

  $consulta8=mysqli_query($con,"SELECT * from promedio_q2 where id_quimestre2='$id_quimestre2' ORDER BY id_promedio_Q2 ASC ");
   while($row8=mysqli_fetch_array($consulta8)){
     $id_promedio_P=$row8['id_promedio_Q2'];
  }


$ingreso3=mysqli_query($con,"UPDATE quimestre2 SET promedio='$promedioQ',examen='$examen_quimestral' where id_quimestre2='$id_quimestre2' ") or die ("error".mysqli_error());

if ($parcial=="P1" and $materia!=11) {
  $ingreso7=mysqli_query($con,"UPDATE parcial1_q2 SET deber='$deber',activi_individual='$A_individual',activi_grupal='$A_grupal',leccion='$leccion',aporte='$aporte',promedio='$promedio' where id_parcial1_Q2='$id_parcial1'  ") or die ("error".mysqli_error());
  $suma_pro=$promediop1+$promediop2+$promediop3;
  $sub_pro=$suma_pro/3;
  $promedio_quime=$sub_pro*0.8;
  //  PROMEDIO PRACIAL =>  DE QUIMESTRE 1
  $ingreso10=mysqli_query($con,"UPDATE promedio_q2 SET p1='$promediop1',p2='$promediop2',p3='$promediop3',sub_pro='$sub_pro',promedio='$promedio_quime' where id_promedio_Q2='$id_promedio_P'") or die ("error".mysqli_error());
$ingreso3=mysqli_query($con,"UPDATE quimestre2 SET promedio='$promedio_quime' where id_quimestre2='$id_quimestre2' ") or die ("error".mysqli_error());
}elseif($parcial=="P1" and $materia==11) {
  $ingreso7=mysqli_query($con,"UPDATE parcial1_q2 SET deber='$comb_comporta',activi_individual='$comb_comporta',activi_grupal='$comb_comporta',leccion='$comb_comporta',aporte='$comb_comporta',promedio='$comb_comporta' where id_parcial1_Q2='$id_parcial1'  ") or die ("error".mysqli_error());
  $suma_pro=$promediop1+$promediop2+$promediop3;
  $sub_pro=$suma_pro/3;
  //  PROMEDIO PRACIAL =>  DE QUIMESTRE 1
  $ingreso10=mysqli_query($con,"UPDATE promedio_q2 SET p1='$promediop1',p2='$promediop2',p3='$promediop3',sub_pro='$sub_pro',promedio='$sub_pro' where id_promedio_Q2='$id_promedio_P'") or die ("error".mysqli_error());
 $ingreso3=mysqli_query($con,"UPDATE quimestre2 SET promedio='$sub_pro',examen='$sub_pro' where id_quimestre2='$id_quimestre2' ") or die ("error".mysqli_error());
}



if ($parcial=="P2" and $materia!=11) {
  $ingreso8=mysqli_query($con,"UPDATE parcial2_q2 SET deber='$deber',activi_individual='$A_individual',activi_grupal='$A_grupal',leccion='$leccion',aporte='$aporte',promedio='$promedio' where id_parcial2_Q2='$id_parcial2'") or die ("error".mysqli_error());
  $suma_pro=$promediop1+$promediop2+$promediop3;
  $sub_pro=$suma_pro/3;
  $promedio_quime=$sub_pro*0.8;
  //  PROMEDIO PRACIAL =>  DE QUIMESTRE 1
  $ingreso10=mysqli_query($con,"UPDATE promedio_q2 SET p1='$promediop1',p2='$promediop2',p3='$promediop3',sub_pro='$sub_pro',promedio='$promedio_quime' where id_promedio_Q2='$id_promedio_P'") or die ("error".mysqli_error());
$ingreso3=mysqli_query($con,"UPDATE quimestre2 SET promedio='$promedio_quime' where id_quimestre2='$id_quimestre2' ") or die ("error".mysqli_error());
}elseif($parcial=="P2" and $materia==11) {
  $ingreso7=mysqli_query($con,"UPDATE parcial2_q2 SET deber='$comb_comporta',activi_individual='$comb_comporta',activi_grupal='$comb_comporta',leccion='$comb_comporta',aporte='$comb_comporta',promedio='$comb_comporta' where id_parcial2_Q2='$id_parcial2'  ") or die ("error".mysqli_error());
  $suma_pro=$promediop1+$promediop2+$promediop3;
  $sub_pro=$suma_pro/3;
  //  PROMEDIO PRACIAL =>  DE QUIMESTRE 1
  $ingreso10=mysqli_query($con,"UPDATE promedio_q2 SET p1='$promediop1',p2='$promediop2',p3='$promediop3',sub_pro='$sub_pro',promedio='$sub_pro' where id_promedio_Q2='$id_promedio_P'") or die ("error".mysqli_error());
$ingreso3=mysqli_query($con,"UPDATE quimestre2 SET promedio='$sub_pro',examen='$sub_pro' where id_quimestre2='$id_quimestre2' ") or die ("error".mysqli_error());
}


if ($parcial=="P3" and $materia!=11) {
  $ingreso9=mysqli_query($con,"UPDATE parcial3_q2 SET deber='$deber',activi_individual='$A_individual',activi_grupal='$A_grupal',leccion='$leccion',aporte='$aporte',promedio='$promedio' where id_parcial3_Q2='$id_parcial3'") or die ("error".mysqli_error());
  $suma_pro=$promediop1+$promediop2+$promediop3;
  $sub_pro=$suma_pro/3;
  $promedio_quime=$sub_pro*0.8;
  //  PROMEDIO PRACIAL =>  DE QUIMESTRE 1
  $ingreso10=mysqli_query($con,"UPDATE promedio_q2 SET p1='$promediop1',p2='$promediop2',p3='$promediop3',sub_pro='$sub_pro',promedio='$promedio_quime' where id_promedio_Q2='$id_promedio_P'") or die ("error".mysqli_error());
$ingreso3=mysqli_query($con,"UPDATE quimestre2 SET promedio='$promedio_quime' where id_quimestre2='$id_quimestre2' ") or die ("error".mysqli_error());
}elseif($parcial=="P3" and $materia==11) {
  $ingreso7=mysqli_query($con,"UPDATE parcial3_q2 SET deber='$comb_comporta',activi_individual='$comb_comporta',activi_grupal='$comb_comporta',leccion='$comb_comporta',aporte='$comb_comporta',promedio='$comb_comporta' where id_parcial3_Q2='$id_parcial3'  ") or die ("error".mysqli_error());
  $suma_pro=$promediop1+$promediop2+$promediop3;
  $sub_pro=$suma_pro/3;
  //  PROMEDIO PRACIAL =>  DE QUIMESTRE 1
  $ingreso10=mysqli_query($con,"UPDATE promedio_q2 SET p1='$promediop1',p2='$promediop2',p3='$promediop3',sub_pro='$sub_pro',promedio='$sub_pro' where id_promedio_Q2='$id_promedio_P'") or die ("error".mysqli_error());
$ingreso3=mysqli_query($con,"UPDATE quimestre2 SET promedio='$sub_pro',examen='$sub_pro' where id_quimestre2='$id_quimestre2' ") or die ("error".mysqli_error());
}


mysqli_close($con);
header("Location:ingreso_calificacion4.php?id_estudiante=$estudiante&id_materia=$materia&id_curso=$curso_p&id_periodo=$periodo");
 ?>
