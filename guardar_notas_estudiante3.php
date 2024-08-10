
<?php
include('config/config.php');


$estudiante=$_REQUEST['id_estudiante'];
$periodo=$_REQUEST['id_periodo'];
$curso_p=$_REQUEST['id_curso'];
$materia=$_REQUEST['id_materia'];





// QUIMESTRE 1
$consulta2=mysqli_query($con,"SELECT * from matricula M inner join notas N on N.id_matricula=M.id_matricula inner join estudiante E on E.id_estudiante=M.id_estudiante where E.id_estudiante='$estudiante'  ORDER BY N.id_notas ASC ");
 while($row2=mysqli_fetch_array($consulta2)){
   $id_notas=$row2['id_notas'];
}

$num_consu=mysqli_num_rows(mysqli_query($con,"SELECT * from promedio where id_periodo='$periodo' and id_notas='$id_notas' and id_asignatura_periodo='$materia' "));

if ($num_consu<1) {

    $consulta44=mysqli_query($con,"SELECT * from quimestre1 where id_periodo='$periodo' and id_notas='$id_notas' and id_asignatura_periodo='$materia' ORDER BY id_quimestre1 ASC ");
     while($row44=mysqli_fetch_array($consulta44)){
       $VpromedioQ1=$row44['promedio'];
       $VexamenQ1=$row44['examen'];
    }
if ($materia!=11) {
  $sub_VexamenQ1=$VexamenQ1*0.2;
  $promedioFQ1=$VpromedioQ1+$sub_VexamenQ1;
}else{
  $promedioFQ1=$VpromedioQ1+$VexamenQ1;
  $promedioFQ1=$promedioFQ1/2;
}

    $consulta43=mysqli_query($con,"SELECT * from quimestre2 where id_periodo='$periodo' and id_notas='$id_notas' and id_asignatura_periodo='$materia' ORDER BY id_quimestre2 ASC ");
     while($row43=mysqli_fetch_array($consulta43)){
       $VpromedioQ2=$row43['promedio'];
       $VexamenQ2=$row43['examen'];
    }
if ($materia!=11) {
  $sub_VexamenQ2=$VexamenQ2*0.2;
  $promedioFQ2=$VpromedioQ2+$sub_VexamenQ2;
}else{
  $promedioFQ2=$VpromedioQ2+$VexamenQ2;
  $promedioFQ2=$promedioFQ2/2;
}


  $sub_promedio_PF=$promedioFQ1+$promedioFQ2;
  $prmedio_NPF=$sub_promedio_PF/2;

  if ($prmedio_NPF>=9) {
    $promedio_equivalente_PF="DRA";
  }
  if ($prmedio_NPF>=7 && $prmedio_NPF<9) {
    $promedio_equivalente_PF="AAR";
  }
  if ($prmedio_NPF>4 && $prmedio_NPF<7) {
    $promedio_equivalente_PF="PAAR";
  }
  if ($prmedio_NPF<=4) {
    $promedio_equivalente_PF="NAAR";
  }

    $ingreso8=mysqli_query($con,"INSERT into promedio (q1,q2,sub_pro,promedio,promedio_equivalente,id_periodo,id_notas,id_asignatura_periodo) values ('$promedioFQ1','$promedioFQ2','$sub_promedio_PF','$prmedio_NPF','$promedio_equivalente_PF','$periodo','$id_notas','$materia')") or die ("error".mysqli_error());

}

//  $ingreso3=mysqli_query($con,"UPDATE quimestre2 SET examen='$examen_quimestral' where id_quimestre2='$id_quimestre2' ") or die ("error".mysqli_error());



mysqli_close($con);
header("Location:ingreso_calificacion4.php?id_estudiante=$estudiante&id_materia=$materia&id_curso=$curso_p&id_periodo=$periodo");
 ?>
