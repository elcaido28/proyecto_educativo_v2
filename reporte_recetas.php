
<?php
include('TD_reportes_Horizontal.php');
include('config/config.php');

$consulta=mysqli_query($con,"SELECT * from estduadiante E inner join matricula M on M.id_estudiante=E.id_estudiante inner join notas N on N.id_matricula=M.id_matricula ");






$pdf=new PDF('L','mm','A4');#(horizontal L o vertical P,medida cm mm, A3-A4)
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('arial','B',12);
$pdf->SetXY(20,17);
$pdf->Cell(260,10,utf8_decode('REPORTE DE RECETAS'),0,1,'C');#(ancho,alto,texto,borde,salto linea,alineacion L C R)

$y=$pdf->GetY();
$pdf->SetXY(20,$y+15);
$pdf->SetFont('arial','B',10);
$pdf->SetFillColor(255, 96, 28);
 $pdf->SetTextColor(255, 255, 255);
$pdf->Cell(70,10,utf8_decode('NOMBRE RECETA'),1,0,'C',true);
$pdf->Cell(40,10,utf8_decode('CATEGORIA'),1,0,'C',true);
$pdf->Cell(30,10,utf8_decode('ESTADO'),1,1,'C',true);
$pdf->SetFont('arial','B',8);
 $pdf->SetTextColor(0, 0, 0);
while($row4=mysqli_fetch_array($consulta)){
 $id_notas=$row5['id_notas'];
  $consulta2=mysqli_query($con,"SELECT *, MIN(Q1.promedio) nota_min from asignatura_periodo AP inner join quimestre1 Q1 on Q1.id_asignatura_periodo =AP.id_asignatura_periodo where Q1.id_notas='$id_notas' and Q1.promedio!='0' ");
  while($row5=mysqli_fetch_array($consulta2)){
  $y=$pdf->GetY();
  $pdf->SetXY(20,$y);

$pdf->Cell(70,10,utf8_decode($row5['nota_min']),1,0,'C');
$pdf->Cell(40,10,utf8_decode($row5['categoria']),1,0,'C');
$pdf->Cell(30,10,utf8_decode($row5['estado']),1,1,'C');


$y=$pdf->GetY();
$pdf->SetY($y+15);
$pdf->SetFont('arial','B',10);
$pdf->SetFillColor(255, 96, 28);
 $pdf->SetTextColor(255, 255, 255);
$pdf->Cell(60,10,utf8_decode('Descripción'),1,0,'C',true);
$pdf->Cell(30,10,utf8_decode('Tipo'),1,0,'C',true);
$pdf->Cell(30,10,utf8_decode('Cantidad'),1,0,'C',true);
$pdf->Cell(10,10,utf8_decode(''),0,0,'C');
$pdf->Cell(70,10,utf8_decode('Preparación'),1,0,'C',true);
$pdf->Cell(70,10,utf8_decode('Aplicación'),1,1,'C',true);
 $y2=$pdf->GetY();
$pdf->SetFont('arial','B',8);
 $pdf->SetTextColor(0, 0, 0);
 $consulta2=mysqli_query($con,"SELECT * from ingredientes where id_receta='$id_receta' ORDER BY descripcion ASC");
while($row2=mysqli_fetch_assoc($consulta2)){
  $y=$pdf->GetY();
  $pdf->SetY($y);
$pdf->Cell(60,10,utf8_decode($row2['descripcion']),1,0,'C');
$pdf->Cell(30,10,utf8_decode($row2['tipo']),1,0,'C');
$pdf->Cell(30,10,utf8_decode($row2['cantidad']),1,0,'C');
$pdf->Cell(10,10,utf8_decode(''),0,1,'C');
}
$pdf->SetXY(140,$y2);
$consulta3=mysqli_query($con,"SELECT * from prepara_aplica where id_receta='$id_receta'");
while($row3=mysqli_fetch_assoc($consulta3)){
 $y=$pdf->GetY();
 $pdf->SetXY(140,$y);
 $pdf->MultiCell(70,5,utf8_decode($row3['desc_preparacion']),1,'C',0);
//$pdf->Cell(70,10,utf8_decode($row3['desc_preparacion']),1,0,'C');
 $pdf->SetXY(210,$y2);
 $pdf->MultiCell(70,5,utf8_decode($row3['desc_aplicacion']),1,'C',0);
//$pdf->Cell(70,10,utf8_decode($row3['desc_aplicacion']),1,1,'C');
}
}
/*
$pdf->SetFont('arial','B',15);
$pdf->SetXY(10,70);
$pdf->MultiCell(60,5,'hola mundo como estan todo aqui',1,'C',0);
$pdf->MultiCell(100,5,'hola mundo como estan todo aqui',1,'C',0);
*/
$pdf->Output();
 ?>
