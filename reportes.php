
<?php
include('TD_reportes_Horizontal.php');
include('config/config.php');
$id_curso_periodo=$_POST['cursos'];
$id_periodo=$_POST['periodo'];
$combo=$_POST['tipo_repor'];
if($combo=="minima"){
$consulta=mysqli_query($con,"SELECT * from estudiante E inner join matricula M on M.id_estudiante=E.id_estudiante inner join notas N on N.id_matricula=M.id_matricula where M.id_periodo='$id_periodo' and M.id_curso_periodo='$id_curso_periodo' ");


$pdf=new PDF('L','mm','A4');#(horizontal L o vertical P,medida cm mm, A3-A4)
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('arial','B',12);
$pdf->SetXY(20,17);
$pdf->Cell(260,10,utf8_decode('REPORTE DE NOTAS'),0,1,'C');#(ancho,alto,texto,borde,salto linea,alineacion L C R)

$y=$pdf->GetY();
$pdf->SetXY(60,$y+15);
$pdf->SetFont('arial','B',10);
$pdf->SetFillColor(255, 96, 28);
 $pdf->SetTextColor(255, 255, 255);

$pdf->Cell(70,10,utf8_decode('QUIMESTRE1 - PARCIAL 1'),0,1,'C',true);

$y=$pdf->GetY();
$pdf->SetXY(60,$y+5);
$pdf->Cell(70,10,utf8_decode('NOMBRES ESTUDIANTE'),1,0,'C',true);
$pdf->Cell(70,10,utf8_decode('ASIGNATURA'),1,0,'C',true);
$pdf->Cell(40,10,utf8_decode('PROMEDIO MAS BAJO'),1,1,'C',true);
$pdf->SetFont('arial','B',8);
 $pdf->SetTextColor(0, 0, 0);
while($row4=mysqli_fetch_array($consulta)){
  $y=$pdf->GetY();
  $pdf->SetXY(60,$y);

 $id_notas=$row4['id_notas'];
 $pdf->Cell(70,10,utf8_decode($row4['nombres']." ".$row4['apellidos']),1,0,'C');


  $consulta2=mysqli_query($con,"SELECT *, MIN(PQ1.promedio) nota_min from asignatura_periodo AP inner join quimestre1 Q1 on Q1.id_asignatura_periodo =AP.id_asignatura_periodo inner join parcial1_q1 PQ1 on PQ1.id_quimestre1=Q1.id_quimestre1 inner join asignatura A on A.id_asignatura=AP.id_asignatura where Q1.id_notas='$id_notas' and PQ1.promedio!='0' and A.id_asignatura!='11' GROUP BY PQ1.promedio ");
  $row5=mysqli_fetch_array($consulta2);
  $y=$pdf->GetY();
  $pdf->SetXY(130,$y);

 $pdf->Cell(70,10,utf8_decode($row5['nombre']),1,0,'C');
$pdf->Cell(40,10,utf8_decode($row5['nota_min']),1,1,'C');


}



$consulta6=mysqli_query($con,"SELECT * from estudiante E inner join matricula M on M.id_estudiante=E.id_estudiante inner join notas N on N.id_matricula=M.id_matricula where M.id_periodo='$id_periodo' and M.id_curso_periodo='$id_curso_periodo' ");
$y=$pdf->GetY();
$pdf->SetXY(60,$y+10);
$pdf->SetFont('arial','B',10);
$pdf->SetFillColor(255, 96, 28);
 $pdf->SetTextColor(255, 255, 255);

$pdf->Cell(70,10,utf8_decode('QUIMESTRE1 - PARCIAL 2'),0,1,'C',true);

$y=$pdf->GetY();
$pdf->SetXY(60,$y+5);
$pdf->Cell(70,10,utf8_decode('NOMBRES ESTUDIANTE'),1,0,'C',true);
$pdf->Cell(70,10,utf8_decode('ASIGNATURA'),1,0,'C',true);
$pdf->Cell(40,10,utf8_decode('PROMEDIO MAS BAJO'),1,1,'C',true);
$pdf->SetFont('arial','B',8);
 $pdf->SetTextColor(0, 0, 0);
while($row6=mysqli_fetch_array($consulta6)){
  $y=$pdf->GetY();
  $pdf->SetXY(60,$y);

 $id_notas=$row6['id_notas'];
 $pdf->Cell(70,10,utf8_decode($row6['nombres']." ".$row6['apellidos']),1,0,'C');


  $consulta7=mysqli_query($con,"SELECT *, MIN(PQ2.promedio) nota_min from asignatura_periodo AP inner join quimestre1 Q1 on Q1.id_asignatura_periodo =AP.id_asignatura_periodo inner join parcial2_q1 PQ2 on PQ2.id_quimestre1=Q1.id_quimestre1 inner join asignatura A on A.id_asignatura=AP.id_asignatura where Q1.id_notas='$id_notas' and PQ2.promedio!='0' and A.id_asignatura!='11' GROUP BY PQ2.promedio");
  $row7=mysqli_fetch_array($consulta7);
  $y=$pdf->GetY();
  $pdf->SetXY(130,$y);

 $pdf->Cell(70,10,utf8_decode($row7['nombre']),1,0,'C');
$pdf->Cell(40,10,utf8_decode($row7['nota_min']),1,1,'C');


}




$consulta8=mysqli_query($con,"SELECT * from estudiante E inner join matricula M on M.id_estudiante=E.id_estudiante inner join notas N on N.id_matricula=M.id_matricula where M.id_periodo='$id_periodo' and M.id_curso_periodo='$id_curso_periodo' ");
$y=$pdf->GetY();
$pdf->SetXY(60,$y+10);
$pdf->SetFont('arial','B',10);
$pdf->SetFillColor(255, 96, 28);
 $pdf->SetTextColor(255, 255, 255);

$pdf->Cell(70,10,utf8_decode('QUIMESTRE1 - PARCIAL 3'),0,1,'C',true);

$y=$pdf->GetY();
$pdf->SetXY(60,$y+5);
$pdf->Cell(70,10,utf8_decode('NOMBRES ESTUDIANTE'),1,0,'C',true);
$pdf->Cell(70,10,utf8_decode('ASIGNATURA'),1,0,'C',true);
$pdf->Cell(40,10,utf8_decode('PROMEDIO MAS BAJO'),1,1,'C',true);
$pdf->SetFont('arial','B',8);
 $pdf->SetTextColor(0, 0, 0);
while($row8=mysqli_fetch_array($consulta8)){
  $y=$pdf->GetY();
  $pdf->SetXY(60,$y);

 $id_notas=$row8['id_notas'];
 $pdf->Cell(70,10,utf8_decode($row8['nombres']." ".$row8['apellidos']),1,0,'C');


  $consulta9=mysqli_query($con,"SELECT  MIN(PQ2.promedio) nota_min,A.id_asignatura, A.nombre from asignatura_periodo AP inner join quimestre1 Q1 on Q1.id_asignatura_periodo =AP.id_asignatura_periodo inner join parcial3_q1 PQ2 on PQ2.id_quimestre1=Q1.id_quimestre1 inner join asignatura A on A.id_asignatura=AP.id_asignatura where Q1.id_notas='$id_notas' and PQ2.promedio!='0' and A.id_asignatura!='11' GROUP BY PQ2.promedio  ");
  $row9=mysqli_fetch_array($consulta9);
  $y=$pdf->GetY();
  $pdf->SetXY(130,$y);

 $pdf->Cell(70,10,utf8_decode($row9['nombre']),1,0,'C');
$pdf->Cell(40,10,utf8_decode($row9['nota_min']),1,1,'C');


}



$consulta6=mysqli_query($con,"SELECT * from estudiante E inner join matricula M on M.id_estudiante=E.id_estudiante inner join notas N on N.id_matricula=M.id_matricula where M.id_periodo='$id_periodo' and M.id_curso_periodo='$id_curso_periodo' ");
$y=$pdf->GetY();
$pdf->SetXY(60,$y+10);
$pdf->SetFont('arial','B',10);
$pdf->SetFillColor(255, 96, 28);
 $pdf->SetTextColor(255, 255, 255);

$pdf->Cell(70,10,utf8_decode('QUIMESTRE2 - PARCIAL 1'),0,1,'C',true);

$y=$pdf->GetY();
$pdf->SetXY(60,$y+5);
$pdf->Cell(70,10,utf8_decode('NOMBRES ESTUDIANTE'),1,0,'C',true);
$pdf->Cell(70,10,utf8_decode('ASIGNATURA'),1,0,'C',true);
$pdf->Cell(40,10,utf8_decode('PROMEDIO MAS BAJO'),1,1,'C',true);
$pdf->SetFont('arial','B',8);
 $pdf->SetTextColor(0, 0, 0);
while($row6=mysqli_fetch_array($consulta6)){
  $y=$pdf->GetY();
  $pdf->SetXY(60,$y);

 $id_notas=$row6['id_notas'];
 $pdf->Cell(70,10,utf8_decode($row6['nombres']." ".$row6['apellidos']),1,0,'C');


  $consulta7=mysqli_query($con,"SELECT *, MIN(PQ2.promedio) nota_min from asignatura_periodo AP inner join quimestre2 Q1 on Q1.id_asignatura_periodo =AP.id_asignatura_periodo inner join parcial1_q2 PQ2 on PQ2.id_quimestre2=Q1.id_quimestre2 inner join asignatura A on A.id_asignatura=AP.id_asignatura where Q1.id_notas='$id_notas' and PQ2.promedio!='0' and A.id_asignatura!='11' GROUP BY PQ2.promedio");
  $row7=mysqli_fetch_array($consulta7);
  $y=$pdf->GetY();
  $pdf->SetXY(130,$y);

 $pdf->Cell(70,10,utf8_decode($row7['nombre']),1,0,'C');
$pdf->Cell(40,10,utf8_decode($row7['nota_min']),1,1,'C');


}




$consulta8=mysqli_query($con,"SELECT * from estudiante E inner join matricula M on M.id_estudiante=E.id_estudiante inner join notas N on N.id_matricula=M.id_matricula where M.id_periodo='$id_periodo' and M.id_curso_periodo='$id_curso_periodo' ");
$y=$pdf->GetY();
$pdf->SetXY(60,$y+10);
$pdf->SetFont('arial','B',10);
$pdf->SetFillColor(255, 96, 28);
 $pdf->SetTextColor(255, 255, 255);

$pdf->Cell(70,10,utf8_decode('QUIMESTRE2 - PARCIAL 2'),0,1,'C',true);

$y=$pdf->GetY();
$pdf->SetXY(60,$y+5);
$pdf->Cell(70,10,utf8_decode('NOMBRES ESTUDIANTE'),1,0,'C',true);
$pdf->Cell(70,10,utf8_decode('ASIGNATURA'),1,0,'C',true);
$pdf->Cell(40,10,utf8_decode('PROMEDIO MAS BAJO'),1,1,'C',true);
$pdf->SetFont('arial','B',8);
 $pdf->SetTextColor(0, 0, 0);
while($row8=mysqli_fetch_array($consulta8)){
  $y=$pdf->GetY();
  $pdf->SetXY(60,$y);

 $id_notas=$row8['id_notas'];
 $pdf->Cell(70,10,utf8_decode($row8['nombres']." ".$row8['apellidos']),1,0,'C');


  $consulta9=mysqli_query($con,"SELECT  MIN(PQ2.promedio) nota_min,A.id_asignatura, A.nombre from asignatura_periodo AP inner join quimestre2 Q1 on Q1.id_asignatura_periodo =AP.id_asignatura_periodo inner join parcial2_q2 PQ2 on PQ2.id_quimestre2=Q1.id_quimestre2 inner join asignatura A on A.id_asignatura=AP.id_asignatura where Q1.id_notas='$id_notas' and PQ2.promedio!='0' and A.id_asignatura!='11' GROUP BY PQ2.promedio  ");
  $row9=mysqli_fetch_array($consulta9);
  $y=$pdf->GetY();
  $pdf->SetXY(130,$y);

 $pdf->Cell(70,10,utf8_decode($row9['nombre']),1,0,'C');
$pdf->Cell(40,10,utf8_decode($row9['nota_min']),1,1,'C');


}



$consulta8=mysqli_query($con,"SELECT * from estudiante E inner join matricula M on M.id_estudiante=E.id_estudiante inner join notas N on N.id_matricula=M.id_matricula where M.id_periodo='$id_periodo' and M.id_curso_periodo='$id_curso_periodo' ");
$y=$pdf->GetY();
$pdf->SetXY(60,$y+10);
$pdf->SetFont('arial','B',10);
$pdf->SetFillColor(255, 96, 28);
 $pdf->SetTextColor(255, 255, 255);

$pdf->Cell(70,10,utf8_decode('QUIMESTRE2 - PARCIAL 3'),0,1,'C',true);

$y=$pdf->GetY();
$pdf->SetXY(60,$y+5);
$pdf->Cell(70,10,utf8_decode('NOMBRES ESTUDIANTE'),1,0,'C',true);
$pdf->Cell(70,10,utf8_decode('ASIGNATURA'),1,0,'C',true);
$pdf->Cell(40,10,utf8_decode('PROMEDIO MAS BAJO'),1,1,'C',true);
$pdf->SetFont('arial','B',8);
 $pdf->SetTextColor(0, 0, 0);
while($row8=mysqli_fetch_array($consulta8)){
  $y=$pdf->GetY();
  $pdf->SetXY(60,$y);

 $id_notas=$row8['id_notas'];
 $pdf->Cell(70,10,utf8_decode($row8['nombres']." ".$row8['apellidos']),1,0,'C');


  $consulta9=mysqli_query($con,"SELECT  MIN(PQ2.promedio) nota_min,A.id_asignatura, A.nombre from asignatura_periodo AP inner join quimestre2 Q1 on Q1.id_asignatura_periodo =AP.id_asignatura_periodo inner join parcial3_q2 PQ2 on PQ2.id_quimestre2=Q1.id_quimestre2 inner join asignatura A on A.id_asignatura=AP.id_asignatura where Q1.id_notas='$id_notas' and PQ2.promedio!='0' and A.id_asignatura!='11' GROUP BY PQ2.promedio  ");
  $row9=mysqli_fetch_array($consulta9);
  $y=$pdf->GetY();
  $pdf->SetXY(130,$y);

 $pdf->Cell(70,10,utf8_decode($row9['nombre']),1,0,'C');
$pdf->Cell(40,10,utf8_decode($row9['nota_min']),1,1,'C');


}



}

if($combo=="maxima"){
$consulta=mysqli_query($con,"SELECT * from estudiante E inner join matricula M on M.id_estudiante=E.id_estudiante inner join notas N on N.id_matricula=M.id_matricula where M.id_periodo='$id_periodo' and M.id_curso_periodo='$id_curso_periodo' ");


$pdf=new PDF('L','mm','A4');#(horizontal L o vertical P,medida cm mm, A3-A4)
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('arial','B',12);
$pdf->SetXY(20,17);
$pdf->Cell(260,10,utf8_decode('REPORTE DE RECETAS'),0,1,'C');#(ancho,alto,texto,borde,salto linea,alineacion L C R)

$y=$pdf->GetY();
$pdf->SetXY(60,$y+15);
$pdf->SetFont('arial','B',10);
$pdf->SetFillColor(255, 96, 28);
 $pdf->SetTextColor(255, 255, 255);$pdf->Cell(70,10,utf8_decode('QUIMESTRE1 - PARCIAL 1'),0,1,'C',true);

 $y=$pdf->GetY();
 $pdf->SetXY(60,$y+5);
 $pdf->Cell(70,10,utf8_decode('NOMBRES ESTUDIANTE'),1,0,'C',true);
 $pdf->Cell(70,10,utf8_decode('ASIGNATURA'),1,0,'C',true);
 $pdf->Cell(40,10,utf8_decode('PROMEDIO MAS BAJO'),1,1,'C',true);
 $pdf->SetFont('arial','B',8);
  $pdf->SetTextColor(0, 0, 0);
 while($row4=mysqli_fetch_array($consulta)){
   $y=$pdf->GetY();
   $pdf->SetXY(60,$y);

  $id_notas=$row4['id_notas'];
  $pdf->Cell(70,10,utf8_decode($row4['nombres']." ".$row4['apellidos']),1,0,'C');

$data="SELECT *, MAX(PQ.promedio) nota_min from asignatura_periodo AP inner join quimestre1 Q1 on Q1.id_asignatura_periodo=AP.id_asignatura_periodo inner join parcial1_q1 PQ on PQ.id_quimestre1=Q1.id_quimestre1 inner join asignatura A on A.id_asignatura=AP.id_asignatura where Q1.id_notas='$id_notas' and A.id_asignatura!='11' group by PQ.promedio order by PQ.promedio DESC ";
$consulta2=mysqli_query($con,$data);
   $row5=mysqli_fetch_array($consulta2);
   $y=$pdf->GetY();
   $pdf->SetXY(130,$y);

  $pdf->Cell(70,10,utf8_decode($row5['nombre']),1,0,'C');
 $pdf->Cell(40,10,utf8_decode($row5['nota_min']),1,1,'C');


 }



 $consulta6=mysqli_query($con,"SELECT * from estudiante E inner join matricula M on M.id_estudiante=E.id_estudiante inner join notas N on N.id_matricula=M.id_matricula where M.id_periodo='$id_periodo' and M.id_curso_periodo='$id_curso_periodo' ");
 $y=$pdf->GetY();
 $pdf->SetXY(60,$y+10);
 $pdf->SetFont('arial','B',10);
 $pdf->SetFillColor(255, 96, 28);
  $pdf->SetTextColor(255, 255, 255);

 $pdf->Cell(70,10,utf8_decode('QUIMESTRE1 - PARCIAL 2'),0,1,'C',true);

 $y=$pdf->GetY();
 $pdf->SetXY(60,$y+5);
 $pdf->Cell(70,10,utf8_decode('NOMBRES ESTUDIANTE'),1,0,'C',true);
 $pdf->Cell(70,10,utf8_decode('ASIGNATURA'),1,0,'C',true);
 $pdf->Cell(40,10,utf8_decode('PROMEDIO MAS BAJO'),1,1,'C',true);
 $pdf->SetFont('arial','B',8);
  $pdf->SetTextColor(0, 0, 0);
 while($row6=mysqli_fetch_array($consulta6)){
   $y=$pdf->GetY();
   $pdf->SetXY(60,$y);

  $id_notas=$row6['id_notas'];
  $pdf->Cell(70,10,utf8_decode($row6['nombres']." ".$row6['apellidos']),1,0,'C');

$data2="SELECT *, MAX(PQ2.promedio) nota_min from asignatura_periodo AP inner join quimestre1 Q1 on Q1.id_asignatura_periodo =AP.id_asignatura_periodo inner join parcial2_q1 PQ2 on PQ2.id_quimestre1=Q1.id_quimestre1 inner join asignatura A on A.id_asignatura=AP.id_asignatura where Q1.id_notas='$id_notas' and A.id_asignatura!='11' group by PQ2.promedio order by PQ2.promedio DESC";
   $consulta7=mysqli_query($con,$data2);
   $row7=mysqli_fetch_array($consulta7);
   $y=$pdf->GetY();
   $pdf->SetXY(130,$y);

  $pdf->Cell(70,10,utf8_decode($row7['nombre']),1,0,'C');
 $pdf->Cell(40,10,utf8_decode($row7['nota_min']),1,1,'C');


 }




 $consulta8=mysqli_query($con,"SELECT * from estudiante E inner join matricula M on M.id_estudiante=E.id_estudiante inner join notas N on N.id_matricula=M.id_matricula where M.id_periodo='$id_periodo' and M.id_curso_periodo='$id_curso_periodo' ");
 $y=$pdf->GetY();
 $pdf->SetXY(60,$y+10);
 $pdf->SetFont('arial','B',10);
 $pdf->SetFillColor(255, 96, 28);
  $pdf->SetTextColor(255, 255, 255);

 $pdf->Cell(70,10,utf8_decode('QUIMESTRE1 - PARCIAL 3'),0,1,'C',true);

 $y=$pdf->GetY();
 $pdf->SetXY(60,$y+5);
 $pdf->Cell(70,10,utf8_decode('NOMBRES ESTUDIANTE'),1,0,'C',true);
 $pdf->Cell(70,10,utf8_decode('ASIGNATURA'),1,0,'C',true);
 $pdf->Cell(40,10,utf8_decode('PROMEDIO MAS BAJO'),1,1,'C',true);
 $pdf->SetFont('arial','B',8);
  $pdf->SetTextColor(0, 0, 0);
 while($row8=mysqli_fetch_array($consulta8)){
   $y=$pdf->GetY();
   $pdf->SetXY(60,$y);

  $id_notas=$row8['id_notas'];
  $pdf->Cell(70,10,utf8_decode($row8['nombres']." ".$row8['apellidos']),1,0,'C');

$data3="SELECT *,MAX(PQ2.promedio) nota_min from asignatura_periodo AP inner join quimestre1 Q1 on Q1.id_asignatura_periodo=AP.id_asignatura_periodo inner join parcial3_q1 PQ2 on PQ2.id_quimestre1=Q1.id_quimestre1 inner join asignatura A on A.id_asignatura=AP.id_asignatura where Q1.id_notas='$id_notas' and A.id_asignatura!='11' group by PQ2.promedio order by PQ2.promedio DESC ";
   $consulta9=mysqli_query($con,$data3);
   $row9=mysqli_fetch_array($consulta9);
   $y=$pdf->GetY();
   $pdf->SetXY(130,$y);

  $pdf->Cell(70,10,utf8_decode($row9['nombre']),1,0,'C');
 $pdf->Cell(40,10,utf8_decode($row9['nota_min']),1,1,'C');


 }



 $consulta6=mysqli_query($con,"SELECT * from estudiante E inner join matricula M on M.id_estudiante=E.id_estudiante inner join notas N on N.id_matricula=M.id_matricula where M.id_periodo='$id_periodo' and M.id_curso_periodo='$id_curso_periodo' ");
 $y=$pdf->GetY();
 $pdf->SetXY(60,$y+10);
 $pdf->SetFont('arial','B',10);
 $pdf->SetFillColor(255, 96, 28);
  $pdf->SetTextColor(255, 255, 255);

 $pdf->Cell(70,10,utf8_decode('QUIMESTRE2 - PARCIAL 1'),0,1,'C',true);

 $y=$pdf->GetY();
 $pdf->SetXY(60,$y+5);
 $pdf->Cell(70,10,utf8_decode('NOMBRES ESTUDIANTE'),1,0,'C',true);
 $pdf->Cell(70,10,utf8_decode('ASIGNATURA'),1,0,'C',true);
 $pdf->Cell(40,10,utf8_decode('PROMEDIO MAS BAJO'),1,1,'C',true);
 $pdf->SetFont('arial','B',8);
  $pdf->SetTextColor(0, 0, 0);
 while($row6=mysqli_fetch_array($consulta6)){
   $y=$pdf->GetY();
   $pdf->SetXY(60,$y);

  $id_notas=$row6['id_notas'];
  $pdf->Cell(70,10,utf8_decode($row6['nombres']." ".$row6['apellidos']),1,0,'C');

$data4="SELECT *, MAX(PQ2.promedio) nota_min from asignatura_periodo AP inner join quimestre2 Q1 on Q1.id_asignatura_periodo=AP.id_asignatura_periodo inner join parcial1_q2 PQ2 on PQ2.id_quimestre2=Q1.id_quimestre2 inner join asignatura A on A.id_asignatura=AP.id_asignatura where Q1.id_notas='$id_notas' and A.id_asignatura!='11' group by PQ2.promedio order by PQ2.promedio DESC";
   $consulta7=mysqli_query($con,$data4);
   $row7=mysqli_fetch_array($consulta7);
   $y=$pdf->GetY();
   $pdf->SetXY(130,$y);

  $pdf->Cell(70,10,utf8_decode($row7['nombre']),1,0,'C');
 $pdf->Cell(40,10,utf8_decode($row7['nota_min']),1,1,'C');


 }



$data5="SELECT * from estudiante E inner join matricula M on M.id_estudiante=E.id_estudiante inner join notas N on N.id_matricula=M.id_matricula where M.id_periodo='$id_periodo' and M.id_curso_periodo='$id_curso_periodo' ";
 $consulta8=mysqli_query($con,$data5);
 $y=$pdf->GetY();
 $pdf->SetXY(60,$y+10);
 $pdf->SetFont('arial','B',10);
 $pdf->SetFillColor(255, 96, 28);
  $pdf->SetTextColor(255, 255, 255);

 $pdf->Cell(70,10,utf8_decode('QUIMESTRE2 - PARCIAL 2'),0,1,'C',true);

 $y=$pdf->GetY();
 $pdf->SetXY(60,$y+5);
 $pdf->Cell(70,10,utf8_decode('NOMBRES ESTUDIANTE'),1,0,'C',true);
 $pdf->Cell(70,10,utf8_decode('ASIGNATURA'),1,0,'C',true);
 $pdf->Cell(40,10,utf8_decode('PROMEDIO MAS BAJO'),1,1,'C',true);
 $pdf->SetFont('arial','B',8);
  $pdf->SetTextColor(0, 0, 0);
 while($row8=mysqli_fetch_array($consulta8)){
   $y=$pdf->GetY();
   $pdf->SetXY(60,$y);

  $id_notas=$row8['id_notas'];
  $pdf->Cell(70,10,utf8_decode($row8['nombres']." ".$row8['apellidos']),1,0,'C');

$data6="SELECT *, MAX(PQ2.promedio) nota_min from asignatura_periodo AP inner join quimestre2 Q1 on Q1.id_asignatura_periodo =AP.id_asignatura_periodo inner join parcial2_q2 PQ2 on PQ2.id_quimestre2=Q1.id_quimestre2 inner join asignatura A on A.id_asignatura=AP.id_asignatura where Q1.id_notas='$id_notas' and A.id_asignatura!='11' group by PQ2.promedio order by PQ2.promedio DESC ";
   $consulta9=mysqli_query($con,$data6);
   $row9=mysqli_fetch_array($consulta9);
   $y=$pdf->GetY();
   $pdf->SetXY(130,$y);

  $pdf->Cell(70,10,utf8_decode($row9['nombre']),1,0,'C');
 $pdf->Cell(40,10,utf8_decode($row9['nota_min']),1,1,'C');


 }



 $consulta8=mysqli_query($con,"SELECT * from estudiante E inner join matricula M on M.id_estudiante=E.id_estudiante inner join notas N on N.id_matricula=M.id_matricula where M.id_periodo='$id_periodo' and M.id_curso_periodo='$id_curso_periodo' ");
 $y=$pdf->GetY();
 $pdf->SetXY(60,$y+10);
 $pdf->SetFont('arial','B',10);
 $pdf->SetFillColor(255, 96, 28);
  $pdf->SetTextColor(255, 255, 255);

 $pdf->Cell(70,10,utf8_decode('QUIMESTRE2 - PARCIAL 3'),0,1,'C',true);

 $y=$pdf->GetY();
 $pdf->SetXY(60,$y+5);
 $pdf->Cell(70,10,utf8_decode('NOMBRES ESTUDIANTE'),1,0,'C',true);
 $pdf->Cell(70,10,utf8_decode('ASIGNATURA'),1,0,'C',true);
 $pdf->Cell(40,10,utf8_decode('PROMEDIO MAS BAJO'),1,1,'C',true);
 $pdf->SetFont('arial','B',8);
  $pdf->SetTextColor(0, 0, 0);
 while($row8=mysqli_fetch_array($consulta8)){
   $y=$pdf->GetY();
   $pdf->SetXY(60,$y);

  $id_notas=$row8['id_notas'];
  $pdf->Cell(70,10,utf8_decode($row8['nombres']." ".$row8['apellidos']),1,0,'C');


   $consulta9=mysqli_query($con,"SELECT *, MAX(PQ2.promedio) nota_min from asignatura_periodo AP inner join quimestre2 Q1 on Q1.id_asignatura_periodo =AP.id_asignatura_periodo inner join parcial3_q2 PQ2 on PQ2.id_quimestre2=Q1.id_quimestre2 inner join asignatura A on A.id_asignatura=AP.id_asignatura where Q1.id_notas='$id_notas' and A.id_asignatura!='11' group by PQ2.promedio order by PQ2.promedio DESC ");
   $row9=mysqli_fetch_array($consulta9);
   $y=$pdf->GetY();
   $pdf->SetXY(130,$y);

  $pdf->Cell(70,10,utf8_decode($row9['nombre']),1,0,'C');
 $pdf->Cell(40,10,utf8_decode($row9['nota_min']),1,1,'C');


 }
}

if($combo=="conducta"){
$consulta=mysqli_query($con,"SELECT * from estudiante E inner join matricula M on M.id_estudiante=E.id_estudiante inner join notas N on N.id_matricula=M.id_matricula where M.id_periodo='$id_periodo' and M.id_curso_periodo='$id_curso_periodo' ");

$pdf=new PDF('L','mm','A4');#(horizontal L o vertical P,medida cm mm, A3-A4)
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('arial','B',12);
$pdf->SetXY(20,17);
$pdf->Cell(260,10,utf8_decode('REPORTE DE RECETAS'),0,1,'C');#(ancho,alto,texto,borde,salto linea,alineacion L C R)

$y=$pdf->GetY();
$pdf->SetXY(60,$y+15);
$pdf->SetFont('arial','B',10);
$pdf->SetFillColor(255, 96, 28);
 $pdf->SetTextColor(255, 255, 255);$pdf->Cell(70,10,utf8_decode('QUIMESTRE1 - PARCIAL 1'),0,1,'C',true);

 $y=$pdf->GetY();
 $pdf->SetXY(60,$y+5);
 $pdf->Cell(70,10,utf8_decode('NOMBRES ESTUDIANTE'),1,0,'C',true);
 $pdf->Cell(70,10,utf8_decode('ASIGNATURA'),1,0,'C',true);
 $pdf->Cell(40,10,utf8_decode('PROMEDIO MAS BAJO'),1,1,'C',true);
 $pdf->SetFont('arial','B',8);
  $pdf->SetTextColor(0, 0, 0);
 while($row4=mysqli_fetch_array($consulta)){
   $y=$pdf->GetY();
   $pdf->SetXY(60,$y);

  $id_notas=$row4['id_notas'];
  $pdf->Cell(70,10,utf8_decode($row4['nombres']." ".$row4['apellidos']),1,0,'C');

$data="SELECT *, MIN(PQ.promedio) nota_min from asignatura_periodo AP inner join quimestre1 Q1 on Q1.id_asignatura_periodo=AP.id_asignatura_periodo inner join parcial1_q1 PQ on PQ.id_quimestre1=Q1.id_quimestre1 inner join asignatura A on A.id_asignatura=AP.id_asignatura where Q1.id_notas='$id_notas' and A.id_asignatura='11' ";
$consulta2=mysqli_query($con,$data);
   $row5=mysqli_fetch_array($consulta2);
   $y=$pdf->GetY();
   $pdf->SetXY(130,$y);

  $pdf->Cell(70,10,utf8_decode($row5['nombre']),1,0,'C');
 $pdf->Cell(40,10,utf8_decode($row5['nota_min']),1,1,'C');


 }



 $consulta6=mysqli_query($con,"SELECT * from estudiante E inner join matricula M on M.id_estudiante=E.id_estudiante inner join notas N on N.id_matricula=M.id_matricula where M.id_periodo='$id_periodo' and M.id_curso_periodo='$id_curso_periodo' ");
 $y=$pdf->GetY();
 $pdf->SetXY(60,$y+10);
 $pdf->SetFont('arial','B',10);
 $pdf->SetFillColor(255, 96, 28);
  $pdf->SetTextColor(255, 255, 255);

 $pdf->Cell(70,10,utf8_decode('QUIMESTRE1 - PARCIAL 2'),0,1,'C',true);

 $y=$pdf->GetY();
 $pdf->SetXY(60,$y+5);
 $pdf->Cell(70,10,utf8_decode('NOMBRES ESTUDIANTE'),1,0,'C',true);
 $pdf->Cell(70,10,utf8_decode('ASIGNATURA'),1,0,'C',true);
 $pdf->Cell(40,10,utf8_decode('PROMEDIO MAS BAJO'),1,1,'C',true);
 $pdf->SetFont('arial','B',8);
  $pdf->SetTextColor(0, 0, 0);
 while($row6=mysqli_fetch_array($consulta6)){
   $y=$pdf->GetY();
   $pdf->SetXY(60,$y);

  $id_notas=$row6['id_notas'];
  $pdf->Cell(70,10,utf8_decode($row6['nombres']." ".$row6['apellidos']),1,0,'C');

$data2="SELECT *, MIN(PQ2.promedio) nota_min from asignatura_periodo AP inner join quimestre1 Q1 on Q1.id_asignatura_periodo =AP.id_asignatura_periodo inner join parcial2_q1 PQ2 on PQ2.id_quimestre1=Q1.id_quimestre1 inner join asignatura A on A.id_asignatura=AP.id_asignatura where Q1.id_notas='$id_notas' and A.id_asignatura='11'";
   $consulta7=mysqli_query($con,$data2);
   $row7=mysqli_fetch_array($consulta7);
   $y=$pdf->GetY();
   $pdf->SetXY(130,$y);

  $pdf->Cell(70,10,utf8_decode($row7['nombre']),1,0,'C');
 $pdf->Cell(40,10,utf8_decode($row7['nota_min']),1,1,'C');


 }




 $consulta8=mysqli_query($con,"SELECT * from estudiante E inner join matricula M on M.id_estudiante=E.id_estudiante inner join notas N on N.id_matricula=M.id_matricula where M.id_periodo='$id_periodo' and M.id_curso_periodo='$id_curso_periodo' ");
 $y=$pdf->GetY();
 $pdf->SetXY(60,$y+10);
 $pdf->SetFont('arial','B',10);
 $pdf->SetFillColor(255, 96, 28);
  $pdf->SetTextColor(255, 255, 255);

 $pdf->Cell(70,10,utf8_decode('QUIMESTRE1 - PARCIAL 3'),0,1,'C',true);

 $y=$pdf->GetY();
 $pdf->SetXY(60,$y+5);
 $pdf->Cell(70,10,utf8_decode('NOMBRES ESTUDIANTE'),1,0,'C',true);
 $pdf->Cell(70,10,utf8_decode('ASIGNATURA'),1,0,'C',true);
 $pdf->Cell(40,10,utf8_decode('PROMEDIO MAS BAJO'),1,1,'C',true);
 $pdf->SetFont('arial','B',8);
  $pdf->SetTextColor(0, 0, 0);
 while($row8=mysqli_fetch_array($consulta8)){
   $y=$pdf->GetY();
   $pdf->SetXY(60,$y);

  $id_notas=$row8['id_notas'];
  $pdf->Cell(70,10,utf8_decode($row8['nombres']." ".$row8['apellidos']),1,0,'C');

$data3="SELECT *,min(PQ2.promedio) nota_min from asignatura_periodo AP inner join quimestre1 Q1 on Q1.id_asignatura_periodo=AP.id_asignatura_periodo inner join parcial3_q1 PQ2 on PQ2.id_quimestre1=Q1.id_quimestre1 inner join asignatura A on A.id_asignatura=AP.id_asignatura where Q1.id_notas='$id_notas' and A.id_asignatura='11' ";
   $consulta9=mysqli_query($con,$data3);
   $row9=mysqli_fetch_array($consulta9);
   $y=$pdf->GetY();
   $pdf->SetXY(130,$y);

  $pdf->Cell(70,10,utf8_decode($row9['nombre']),1,0,'C');
 $pdf->Cell(40,10,utf8_decode($row9['nota_min']),1,1,'C');


 }



 $consulta6=mysqli_query($con,"SELECT * from estudiante E inner join matricula M on M.id_estudiante=E.id_estudiante inner join notas N on N.id_matricula=M.id_matricula where M.id_periodo='$id_periodo' and M.id_curso_periodo='$id_curso_periodo' ");
 $y=$pdf->GetY();
 $pdf->SetXY(60,$y+10);
 $pdf->SetFont('arial','B',10);
 $pdf->SetFillColor(255, 96, 28);
  $pdf->SetTextColor(255, 255, 255);

 $pdf->Cell(70,10,utf8_decode('QUIMESTRE2 - PARCIAL 1'),0,1,'C',true);

 $y=$pdf->GetY();
 $pdf->SetXY(60,$y+5);
 $pdf->Cell(70,10,utf8_decode('NOMBRES ESTUDIANTE'),1,0,'C',true);
 $pdf->Cell(70,10,utf8_decode('ASIGNATURA'),1,0,'C',true);
 $pdf->Cell(40,10,utf8_decode('PROMEDIO MAS BAJO'),1,1,'C',true);
 $pdf->SetFont('arial','B',8);
  $pdf->SetTextColor(0, 0, 0);
 while($row6=mysqli_fetch_array($consulta6)){
   $y=$pdf->GetY();
   $pdf->SetXY(60,$y);

  $id_notas=$row6['id_notas'];
  $pdf->Cell(70,10,utf8_decode($row6['nombres']." ".$row6['apellidos']),1,0,'C');

$data4="SELECT *, MIN(PQ2.promedio) nota_min from asignatura_periodo AP inner join quimestre2 Q1 on Q1.id_asignatura_periodo=AP.id_asignatura_periodo inner join parcial1_q2 PQ2 on PQ2.id_quimestre2=Q1.id_quimestre2 inner join asignatura A on A.id_asignatura=AP.id_asignatura where Q1.id_notas='$id_notas' and A.id_asignatura='11'";
   $consulta7=mysqli_query($con,$data4);
   $row7=mysqli_fetch_array($consulta7);
   $y=$pdf->GetY();
   $pdf->SetXY(130,$y);

  $pdf->Cell(70,10,utf8_decode($row7['nombre']),1,0,'C');
 $pdf->Cell(40,10,utf8_decode($row7['nota_min']),1,1,'C');


 }



$data5="SELECT * from estudiante E inner join matricula M on M.id_estudiante=E.id_estudiante inner join notas N on N.id_matricula=M.id_matricula where M.id_periodo='$id_periodo' and M.id_curso_periodo='$id_curso_periodo' ";
 $consulta8=mysqli_query($con,$data5);
 $y=$pdf->GetY();
 $pdf->SetXY(60,$y+10);
 $pdf->SetFont('arial','B',10);
 $pdf->SetFillColor(255, 96, 28);
  $pdf->SetTextColor(255, 255, 255);

 $pdf->Cell(70,10,utf8_decode('QUIMESTRE2 - PARCIAL 2'),0,1,'C',true);

 $y=$pdf->GetY();
 $pdf->SetXY(60,$y+5);
 $pdf->Cell(70,10,utf8_decode('NOMBRES ESTUDIANTE'),1,0,'C',true);
 $pdf->Cell(70,10,utf8_decode('ASIGNATURA'),1,0,'C',true);
 $pdf->Cell(40,10,utf8_decode('PROMEDIO MAS BAJO'),1,1,'C',true);
 $pdf->SetFont('arial','B',8);
  $pdf->SetTextColor(0, 0, 0);
 while($row8=mysqli_fetch_array($consulta8)){
   $y=$pdf->GetY();
   $pdf->SetXY(60,$y);

  $id_notas=$row8['id_notas'];
  $pdf->Cell(70,10,utf8_decode($row8['nombres']." ".$row8['apellidos']),1,0,'C');

$data6="SELECT *, MIN(PQ2.promedio) nota_min from asignatura_periodo AP inner join quimestre2 Q1 on Q1.id_asignatura_periodo =AP.id_asignatura_periodo inner join parcial2_q2 PQ2 on PQ2.id_quimestre2=Q1.id_quimestre2 inner join asignatura A on A.id_asignatura=AP.id_asignatura where Q1.id_notas='$id_notas' and A.id_asignatura='11'";
   $consulta9=mysqli_query($con,$data6);
   $row9=mysqli_fetch_array($consulta9);
   $y=$pdf->GetY();
   $pdf->SetXY(130,$y);

  $pdf->Cell(70,10,utf8_decode($row9['nombre']),1,0,'C');
 $pdf->Cell(40,10,utf8_decode($row9['nota_min']),1,1,'C');


 }



 $consulta8=mysqli_query($con,"SELECT * from estudiante E inner join matricula M on M.id_estudiante=E.id_estudiante inner join notas N on N.id_matricula=M.id_matricula where M.id_periodo='$id_periodo' and M.id_curso_periodo='$id_curso_periodo' ");
 $y=$pdf->GetY();
 $pdf->SetXY(60,$y+10);
 $pdf->SetFont('arial','B',10);
 $pdf->SetFillColor(255, 96, 28);
  $pdf->SetTextColor(255, 255, 255);

 $pdf->Cell(70,10,utf8_decode('QUIMESTRE2 - PARCIAL 3'),0,1,'C',true);

 $y=$pdf->GetY();
 $pdf->SetXY(60,$y+5);
 $pdf->Cell(70,10,utf8_decode('NOMBRES ESTUDIANTE'),1,0,'C',true);
 $pdf->Cell(70,10,utf8_decode('ASIGNATURA'),1,0,'C',true);
 $pdf->Cell(40,10,utf8_decode('PROMEDIO MAS BAJO'),1,1,'C',true);
 $pdf->SetFont('arial','B',8);
  $pdf->SetTextColor(0, 0, 0);
 while($row8=mysqli_fetch_array($consulta8)){
   $y=$pdf->GetY();
   $pdf->SetXY(60,$y);

  $id_notas=$row8['id_notas'];
  $pdf->Cell(70,10,utf8_decode($row8['nombres']." ".$row8['apellidos']),1,0,'C');


   $consulta9=mysqli_query($con,"SELECT *, MIN(PQ2.promedio) nota_min from asignatura_periodo AP inner join quimestre2 Q1 on Q1.id_asignatura_periodo =AP.id_asignatura_periodo inner join parcial3_q2 PQ2 on PQ2.id_quimestre2=Q1.id_quimestre2 inner join asignatura A on A.id_asignatura=AP.id_asignatura where Q1.id_notas='$id_notas' and A.id_asignatura='11'");
   $row9=mysqli_fetch_array($consulta9);
   $y=$pdf->GetY();
   $pdf->SetXY(130,$y);

  $pdf->Cell(70,10,utf8_decode($row9['nombre']),1,0,'C');
 $pdf->Cell(40,10,utf8_decode($row9['nota_min']),1,1,'C');


 }
}
//$pdf->Cell(70,10,utf8_decode($row3['desc_aplicacion']),1,1,'C');

/*
$pdf->SetFont('arial','B',15);
$pdf->SetXY(10,70);
$pdf->MultiCell(60,5,'hola mundo como estan todo aqui',1,'C',0);
$pdf->MultiCell(100,5,'hola mundo como estan todo aqui',1,'C',0);
*/
$pdf->Output();
 ?>
