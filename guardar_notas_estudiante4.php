
<?php
include('config/config.php');


$estudiante=$_REQUEST['id_estudiante'];
$periodo=$_REQUEST['id_periodo'];
$curso_p=$_REQUEST['id_curso'];
$materia=$_REQUEST['id_materia'];

$examen_suple=$_POST['examen_suple'];
if ($examen_suple>=7) {
  $examen_suple=7;
}
$nota_equi="A";
// QUIMESTRE 1
$consulta2=mysqli_query($con,"SELECT * from matricula M inner join notas N on N.id_matricula=M.id_matricula inner join estudiante E on E.id_estudiante=M.id_estudiante where E.id_estudiante='$estudiante'  ORDER BY N.id_notas ASC ");
 while($row2=mysqli_fetch_array($consulta2)){
   $id_notas=$row2['id_notas'];
}

$num_fil=mysqli_num_rows(mysqli_query($con,"SELECT * from examen_supletorio where id_periodo='$periodo' and id_notas='$id_notas' and id_asignatura_periodo='$materia' "));
if($num_fil<1){

if ($examen_suple<=0 || $examen_suple=="") {
    $ingreso8=mysqli_query($con,"INSERT into examen_supletorio (nota,nota_equivalente,id_periodo,id_notas,id_asignatura_periodo) values ('0.00','-','$periodo','$id_notas','$materia')") or die ("error".mysqli_error());
}else{
  $ingreso8=mysqli_query($con,"INSERT into examen_supletorio (nota,nota_equivalente,id_periodo,id_notas,id_asignatura_periodo) values ('$examen_suple','$nota_equi','$periodo','$id_notas','$materia')") or die ("error".mysqli_error());
}
}

//  $ingreso3=mysqli_query($con,"UPDATE quimestre2 SET examen='$examen_quimestral' where id_quimestre2='$id_quimestre2' ") or die ("error".mysqli_error());



mysqli_close($con);
header("Location:ingreso_calificacion4.php?id_estudiante=$estudiante&id_materia=$materia&id_curso=$curso_p&id_periodo=$periodo");
 ?>
