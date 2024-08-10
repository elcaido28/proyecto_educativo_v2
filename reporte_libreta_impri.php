
<?php
session_start();
include('TD_reportes_Horizontal.php');
include('config/config.php');

  $idrepresentante=$_SESSION['ID_rep'];

  $ejec0=mysqli_query($con,"SELECT * FROM matricula M inner join estudiante E on E.id_estudiante=M.id_estudiante INNER JOIN curso_periodo CP ON M.id_curso_periodo=CP.id_curso_periodo INNER JOIN representante R ON R.id_representante=M.id_representante INNER JOIN notas N ON N.id_matricula=M.id_matricula WHERE M.id_representante='$idrepresentante'");
  $row0=mysqli_fetch_array($ejec0);
  $id_curso_periodo=$row0['id_curso_periodo'];
  $id_notas=$row0['id_notas'];
  $Id_perido=$row0['id_periodo'];
  $Id_estudiante=$row0['id_estudiante'];

  $consulta567=mysqli_query($con,"SELECT * from estudiante E inner join matricula M on M.id_estudiante=E.id_estudiante inner join curso_periodo CP on CP.id_curso_periodo=M.id_curso_periodo inner join curso C on C.id_curso=CP.id_curso inner join paralelo P on P.id_paralelo=CP.id_paralelo where M.id_periodo='$Id_perido' and M.id_curso_periodo='$id_curso_periodo' ");;
  $row567=mysqli_fetch_assoc($consulta567);
  $nombre_estu=$row567['nombres']." ".$row567['apellidos'];
  $curso_para=$row567['curso']." ".$row567['paralelo'];


if(true){
$consulta=mysqli_query($con,"SELECT * from estudiante E inner join matricula M on M.id_estudiante=E.id_estudiante inner join notas N on N.id_matricula=M.id_matricula where M.id_periodo='$Id_perido' and M.id_curso_periodo='$id_curso_periodo' ");


$pdf=new PDF('L','mm','A4');#(horizontal L o vertical P,medida cm mm, A3-A4)
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('arial','B',12);
$pdf->Cell(100,5,utf8_decode(""),0,1,'C');#(ancho,alto,texto,borde,salto linea,alineacion L C R)

$pdf->SetXY(20,30);
$pdf->Cell(120,10,utf8_decode("CURSO:                             ".$curso_para),0,1,'C');#(ancho,alto,texto,borde,salto linea,alineacion L C R)

$pdf->SetXY(20,40);
$pdf->Cell(160,10,utf8_decode("ESTUDIANTE:                             ".$nombre_estu),0,1,'C');#(ancho,alto,texto,borde,salto linea,alineacion L C R)

$y=$pdf->GetY();
$pdf->SetXY(60,$y+15);
$pdf->SetFont('arial','B',10);
$pdf->SetFillColor(255, 96, 28);
 $pdf->SetTextColor(255, 255, 255);

$pdf->Cell(70,10,utf8_decode('QUIMESTRE1 - PARCIAL 1'),0,1,'C',true);

$y=$pdf->GetY();
$pdf->SetXY(25,$y+5);
$pdf->Cell(80,10,utf8_decode('ASIGNATURA'),1,0,'C',true);
$pdf->Cell(30,10,utf8_decode('TAREAS'),1,0,'C',true);
$pdf->Cell(30,10,utf8_decode('TRAB. INDIVIDUAL'),1,0,'C',true);
$pdf->Cell(30,10,utf8_decode('TRAB. GRUPAL'),1,0,'C',true);
$pdf->Cell(30,10,utf8_decode('LECCIÓN'),1,0,'C',true);
$pdf->Cell(30,10,utf8_decode('APORTE'),1,0,'C',true);
$pdf->Cell(30,10,utf8_decode('NOTA'),1,1,'C',true);
$pdf->SetFont('arial','B',8);
 $pdf->SetTextColor(0, 0, 0);

 $dato_where="";
 $cont=0;
   $consulta="SELECT * from asignatura_periodo AP INNER JOIN asignatura A ON A.id_asignatura=AP.id_asignatura INNER JOIN quimestre1 Q1 ON Q1.id_asignatura_periodo=AP.id_asignatura_periodo where AP.id_periodo='$Id_perido' and Q1.id_notas='$id_notas' and A.id_asignatura!='11'   ";
   $ejec=mysqli_query($con,$consulta);
   while ($row=mysqli_fetch_array($ejec)) {
     $id_quimestre1=$row['id_quimestre1'];
     $cont++;
     if($cont>1){
       $dato_where.=" AND ";
     }
     $dato_where.="AP.id_asignatura_periodo!='".$row['id_asignatura_periodo']."'";

     $y=$pdf->GetY();
     $pdf->SetXY(25,$y);
    $pdf->Cell(80,10,utf8_decode($row['nombre']),1,0,'C');

     $consulta11="SELECT * from  quimestre1 Q1 INNER JOIN parcial1_q1 P1Q1 on P1Q1.id_quimestre1=Q1.id_quimestre1 where  Q1.id_quimestre1='$id_quimestre1' ";
     $ejec11=mysqli_query($con,$consulta11);
     while ($row11=mysqli_fetch_array($ejec11)) {
       $asd=1;
       $y=$pdf->GetY();
       $pdf->SetXY(105,$y);
       $pdf->Cell(30,10,utf8_decode($row11['deber']),1,0,'C');
       $pdf->Cell(30,10,utf8_decode($row11['activi_individual']),1,0,'C');
       $pdf->Cell(30,10,utf8_decode($row11['activi_grupal']),1,0,'C');
       $pdf->Cell(30,10,utf8_decode($row11['leccion']),1,0,'C');
       $pdf->Cell(30,10,utf8_decode($row11['aporte']),1,0,'C');
       $pdf->Cell(30,10,utf8_decode($row11['promedio']),1,1,'C');

}
}
if($cont>0){
  $wheref=$dato_where ." and ";
}

$consultax=mysqli_query($con,"SELECT * from asignatura_curso_periodo ACP inner join asignatura_periodo AP on AP.id_asignatura_periodo=ACP.id_asignatura_periodo inner join asignatura A on A.id_asignatura=AP.id_asignatura inner join curso_periodo CP on CP.id_curso_periodo=ACP.id_curso_periodo where ".$wheref." CP.id_curso_periodo='$id_curso_periodo' and A.id_asignatura!='11' ");
   while($rowx=mysqli_fetch_array($consultax)){
     $y=$pdf->GetY();
     $pdf->SetXY(25,$y);
    $pdf->Cell(80,10,utf8_decode($rowx['nombre']),1,0,'C');
    $pdf->Cell(30,10,"0.00",1,0,'C');
    $pdf->Cell(30,10,"0.00",1,0,'C');
    $pdf->Cell(30,10,"0.00",1,0,'C');
    $pdf->Cell(30,10,"0.00",1,0,'C');
    $pdf->Cell(30,10,"0.00",1,0,'C');
    $pdf->Cell(30,10,"0.00",1,1,'C');

}



$y=$pdf->GetY();
$pdf->SetXY(25,$y+5);
$pdf->Cell(80,10,utf8_decode('ASIGNATURA'),1,0,'C',true);
$pdf->Cell(70,10,utf8_decode('EQUIVALENCIA DEL COMPORTAMIENTO'),1,1,'C',true);
$pdf->SetFont('arial','B',8);
 $pdf->SetTextColor(0, 0, 0);
$consulta="SELECT * from asignatura_periodo AP INNER JOIN asignatura A ON A.id_asignatura=AP.id_asignatura INNER JOIN quimestre1 Q1 ON Q1.id_asignatura_periodo=AP.id_asignatura_periodo where AP.id_periodo='$Id_perido' and Q1.id_notas='$id_notas' and A.id_asignatura='11'   ";
$ejec=mysqli_query($con,$consulta);
while ($row=mysqli_fetch_array($ejec)) {
  $id_quimestre1=$row['id_quimestre1'];
  $y=$pdf->GetY();
  $pdf->SetXY(25,$y);
  $pdf->Cell(80,10,utf8_decode($row['nombre']),1,0,'C');
  $consulta11="SELECT * from  quimestre1 Q1 INNER JOIN parcial1_q1 P1Q1 on P1Q1.id_quimestre1=Q1.id_quimestre1 where  Q1.id_quimestre1='$id_quimestre1' ";
  $ejec11=mysqli_query($con,$consulta11);
  while ($row11=mysqli_fetch_array($ejec11)) {
    $y=$pdf->GetY();
    $pdf->SetXY(105,$y);
  $nota_comport=$row11['promedio'];
  if ($nota_comport<=10 && $nota_comport>=9) {
    $comport_equi="A - Muy Satisfactorio";
  }
  if ($nota_comport<9 && $nota_comport>=7) {
    $comport_equi="B - Satisfactorio";
  }
  if ($nota_comport<7 && $nota_comport>=5) {
    $comport_equi="C - Poco Satisfactorio";
  }
  if ($nota_comport<5 && $nota_comport>=3) {
    $comport_equi="D - Mejorable";
  }
  if ($nota_comport<3 && $nota_comport>0) {
    $comport_equi="E - Insatisfactorio";
  }


  $pdf->Cell(70,10,utf8_decode($comport_equi),1,1,'C');

}
}








$pdf->AddPage();
$y=$pdf->GetY();
$pdf->SetXY(60,$y+15);
$pdf->SetFont('arial','B',10);
$pdf->SetFillColor(255, 96, 28);
 $pdf->SetTextColor(255, 255, 255);

$pdf->Cell(70,10,utf8_decode('QUIMESTRE1 - PARCIAL 2'),0,1,'C',true);

$y=$pdf->GetY();
$pdf->SetXY(25,$y+5);
$pdf->Cell(80,10,utf8_decode('ASIGNATURA'),1,0,'C',true);
$pdf->Cell(30,10,utf8_decode('TAREAS'),1,0,'C',true);
$pdf->Cell(30,10,utf8_decode('TRAB. INDIVIDUAL'),1,0,'C',true);
$pdf->Cell(30,10,utf8_decode('TRAB. GRUPAL'),1,0,'C',true);
$pdf->Cell(30,10,utf8_decode('LECCIÓN'),1,0,'C',true);
$pdf->Cell(30,10,utf8_decode('APORTE'),1,0,'C',true);
$pdf->Cell(30,10,utf8_decode('NOTA'),1,1,'C',true);
$pdf->SetFont('arial','B',8);
 $pdf->SetTextColor(0, 0, 0);

 $dato_where="";
 $cont=0;
   $consulta="SELECT * from asignatura_periodo AP INNER JOIN asignatura A ON A.id_asignatura=AP.id_asignatura INNER JOIN quimestre1 Q1 ON Q1.id_asignatura_periodo=AP.id_asignatura_periodo where AP.id_periodo='$Id_perido' and Q1.id_notas='$id_notas' and A.id_asignatura!='11'   ";
   $ejec=mysqli_query($con,$consulta);
   while ($row=mysqli_fetch_array($ejec)) {
     $id_quimestre1=$row['id_quimestre1'];
     $cont++;
     if($cont>1){
       $dato_where.=" AND ";
     }
     $dato_where.="AP.id_asignatura_periodo!='".$row['id_asignatura_periodo']."'";

     $y=$pdf->GetY();
     $pdf->SetXY(25,$y);
    $pdf->Cell(80,10,utf8_decode($row['nombre']),1,0,'C');

     $consulta11="SELECT * from  quimestre1 Q1 INNER JOIN parcial2_q1 P1Q1 on P1Q1.id_quimestre1=Q1.id_quimestre1 where  Q1.id_quimestre1='$id_quimestre1' ";
     $ejec11=mysqli_query($con,$consulta11);
     while ($row11=mysqli_fetch_array($ejec11)) {
       $asd=1;
       $y=$pdf->GetY();
       $pdf->SetXY(105,$y);
       $pdf->Cell(30,10,utf8_decode($row11['deber']),1,0,'C');
       $pdf->Cell(30,10,utf8_decode($row11['activi_individual']),1,0,'C');
       $pdf->Cell(30,10,utf8_decode($row11['activi_grupal']),1,0,'C');
       $pdf->Cell(30,10,utf8_decode($row11['leccion']),1,0,'C');
       $pdf->Cell(30,10,utf8_decode($row11['aporte']),1,0,'C');
       $pdf->Cell(30,10,utf8_decode($row11['promedio']),1,1,'C');

}
}
if($cont>0){
  $wheref=$dato_where ." and ";
}

$consultax=mysqli_query($con,"SELECT * from asignatura_curso_periodo ACP inner join asignatura_periodo AP on AP.id_asignatura_periodo=ACP.id_asignatura_periodo inner join asignatura A on A.id_asignatura=AP.id_asignatura inner join curso_periodo CP on CP.id_curso_periodo=ACP.id_curso_periodo where ".$wheref." CP.id_curso_periodo='$id_curso_periodo' and A.id_asignatura!='11' ");
   while($rowx=mysqli_fetch_array($consultax)){
     $y=$pdf->GetY();
     $pdf->SetXY(25,$y);
    $pdf->Cell(80,10,utf8_decode($rowx['nombre']),1,0,'C');
    $pdf->Cell(30,10,"0.00",1,0,'C');
    $pdf->Cell(30,10,"0.00",1,0,'C');
    $pdf->Cell(30,10,"0.00",1,0,'C');
    $pdf->Cell(30,10,"0.00",1,0,'C');
    $pdf->Cell(30,10,"0.00",1,0,'C');
    $pdf->Cell(30,10,"0.00",1,1,'C');

}



$y=$pdf->GetY();
$pdf->SetXY(25,$y+5);
$pdf->Cell(80,10,utf8_decode('ASIGNATURA'),1,0,'C',true);
$pdf->Cell(70,10,utf8_decode('EQUIVALENCIA DEL COMPORTAMIENTO'),1,1,'C',true);
$pdf->SetFont('arial','B',8);
 $pdf->SetTextColor(0, 0, 0);
$consulta="SELECT * from asignatura_periodo AP INNER JOIN asignatura A ON A.id_asignatura=AP.id_asignatura INNER JOIN quimestre1 Q1 ON Q1.id_asignatura_periodo=AP.id_asignatura_periodo where AP.id_periodo='$Id_perido' and Q1.id_notas='$id_notas' and A.id_asignatura='11'   ";
$ejec=mysqli_query($con,$consulta);
while ($row=mysqli_fetch_array($ejec)) {
  $id_quimestre1=$row['id_quimestre1'];
  $y=$pdf->GetY();
  $pdf->SetXY(25,$y);
  $pdf->Cell(80,10,utf8_decode($row['nombre']),1,0,'C');
  $consulta11="SELECT * from  quimestre1 Q1 INNER JOIN parcial2_q1 P1Q1 on P1Q1.id_quimestre1=Q1.id_quimestre1 where  Q1.id_quimestre1='$id_quimestre1' ";
  $ejec11=mysqli_query($con,$consulta11);
  while ($row11=mysqli_fetch_array($ejec11)) {
    $y=$pdf->GetY();
    $pdf->SetXY(105,$y);
  $nota_comport=$row11['promedio'];
  if ($nota_comport<=10 && $nota_comport>=9) {
    $comport_equi="A - Muy Satisfactorio";
  }
  if ($nota_comport<9 && $nota_comport>=7) {
    $comport_equi="B - Satisfactorio";
  }
  if ($nota_comport<7 && $nota_comport>=5) {
    $comport_equi="C - Poco Satisfactorio";
  }
  if ($nota_comport<5 && $nota_comport>=3) {
    $comport_equi="D - Mejorable";
  }
  if ($nota_comport<3 && $nota_comport>0) {
    $comport_equi="E - Insatisfactorio";
  }


  $pdf->Cell(70,10,utf8_decode($comport_equi),1,1,'C');

}
}












$pdf->AddPage();
$y=$pdf->GetY();
$pdf->SetXY(60,$y+15);
$pdf->SetFont('arial','B',10);
$pdf->SetFillColor(255, 96, 28);
 $pdf->SetTextColor(255, 255, 255);

$pdf->Cell(70,10,utf8_decode('QUIMESTRE1 - PARCIAL 3'),0,1,'C',true);

$y=$pdf->GetY();
$pdf->SetXY(25,$y+5);
$pdf->Cell(80,10,utf8_decode('ASIGNATURA'),1,0,'C',true);
$pdf->Cell(30,10,utf8_decode('TAREAS'),1,0,'C',true);
$pdf->Cell(30,10,utf8_decode('TRAB. INDIVIDUAL'),1,0,'C',true);
$pdf->Cell(30,10,utf8_decode('TRAB. GRUPAL'),1,0,'C',true);
$pdf->Cell(30,10,utf8_decode('LECCIÓN'),1,0,'C',true);
$pdf->Cell(30,10,utf8_decode('APORTE'),1,0,'C',true);
$pdf->Cell(30,10,utf8_decode('NOTA'),1,1,'C',true);
$pdf->SetFont('arial','B',8);
 $pdf->SetTextColor(0, 0, 0);

 $dato_where="";
 $cont=0;
   $consulta="SELECT * from asignatura_periodo AP INNER JOIN asignatura A ON A.id_asignatura=AP.id_asignatura INNER JOIN quimestre1 Q1 ON Q1.id_asignatura_periodo=AP.id_asignatura_periodo where AP.id_periodo='$Id_perido' and Q1.id_notas='$id_notas' and A.id_asignatura!='11'   ";
   $ejec=mysqli_query($con,$consulta);
   while ($row=mysqli_fetch_array($ejec)) {
     $id_quimestre1=$row['id_quimestre1'];
     $cont++;
     if($cont>1){
       $dato_where.=" AND ";
     }
     $dato_where.="AP.id_asignatura_periodo!='".$row['id_asignatura_periodo']."'";

     $y=$pdf->GetY();
     $pdf->SetXY(25,$y);
    $pdf->Cell(80,10,utf8_decode($row['nombre']),1,0,'C');

     $consulta11="SELECT * from  quimestre1 Q1 INNER JOIN parcial3_q1 P1Q1 on P1Q1.id_quimestre1=Q1.id_quimestre1 where  Q1.id_quimestre1='$id_quimestre1' ";
     $ejec11=mysqli_query($con,$consulta11);
     while ($row11=mysqli_fetch_array($ejec11)) {
       $asd=1;
       $y=$pdf->GetY();
       $pdf->SetXY(105,$y);
       $pdf->Cell(30,10,utf8_decode($row11['deber']),1,0,'C');
       $pdf->Cell(30,10,utf8_decode($row11['activi_individual']),1,0,'C');
       $pdf->Cell(30,10,utf8_decode($row11['activi_grupal']),1,0,'C');
       $pdf->Cell(30,10,utf8_decode($row11['leccion']),1,0,'C');
       $pdf->Cell(30,10,utf8_decode($row11['aporte']),1,0,'C');
       $pdf->Cell(30,10,utf8_decode($row11['promedio']),1,1,'C');

}
}
if($cont>0){
  $wheref=$dato_where ." and ";
}

$consultax=mysqli_query($con,"SELECT * from asignatura_curso_periodo ACP inner join asignatura_periodo AP on AP.id_asignatura_periodo=ACP.id_asignatura_periodo inner join asignatura A on A.id_asignatura=AP.id_asignatura inner join curso_periodo CP on CP.id_curso_periodo=ACP.id_curso_periodo where ".$wheref." CP.id_curso_periodo='$id_curso_periodo' and A.id_asignatura!='11' ");
   while($rowx=mysqli_fetch_array($consultax)){
     $y=$pdf->GetY();
     $pdf->SetXY(25,$y);
    $pdf->Cell(80,10,utf8_decode($rowx['nombre']),1,0,'C');
    $pdf->Cell(30,10,"0.00",1,0,'C');
    $pdf->Cell(30,10,"0.00",1,0,'C');
    $pdf->Cell(30,10,"0.00",1,0,'C');
    $pdf->Cell(30,10,"0.00",1,0,'C');
    $pdf->Cell(30,10,"0.00",1,0,'C');
    $pdf->Cell(30,10,"0.00",1,1,'C');

}



$y=$pdf->GetY();
$pdf->SetXY(25,$y+5);
$pdf->Cell(80,10,utf8_decode('ASIGNATURA'),1,0,'C',true);
$pdf->Cell(70,10,utf8_decode('EQUIVALENCIA DEL COMPORTAMIENTO'),1,1,'C',true);
$pdf->SetFont('arial','B',8);
 $pdf->SetTextColor(0, 0, 0);
$consulta="SELECT * from asignatura_periodo AP INNER JOIN asignatura A ON A.id_asignatura=AP.id_asignatura INNER JOIN quimestre1 Q1 ON Q1.id_asignatura_periodo=AP.id_asignatura_periodo where AP.id_periodo='$Id_perido' and Q1.id_notas='$id_notas' and A.id_asignatura='11'   ";
$ejec=mysqli_query($con,$consulta);
while ($row=mysqli_fetch_array($ejec)) {
  $id_quimestre1=$row['id_quimestre1'];
  $y=$pdf->GetY();
  $pdf->SetXY(25,$y);
  $pdf->Cell(80,10,utf8_decode($row['nombre']),1,0,'C');
  $consulta11="SELECT * from  quimestre1 Q1 INNER JOIN parcial3_q1 P1Q1 on P1Q1.id_quimestre1=Q1.id_quimestre1 where  Q1.id_quimestre1='$id_quimestre1' ";
  $ejec11=mysqli_query($con,$consulta11);
  while ($row11=mysqli_fetch_array($ejec11)) {
    $y=$pdf->GetY();
    $pdf->SetXY(105,$y);
  $nota_comport=$row11['promedio'];
  if ($nota_comport<=10 && $nota_comport>=9) {
    $comport_equi="A - Muy Satisfactorio";
  }
  if ($nota_comport<9 && $nota_comport>=7) {
    $comport_equi="B - Satisfactorio";
  }
  if ($nota_comport<7 && $nota_comport>=5) {
    $comport_equi="C - Poco Satisfactorio";
  }
  if ($nota_comport<5 && $nota_comport>=3) {
    $comport_equi="D - Mejorable";
  }
  if ($nota_comport<3 && $nota_comport>0) {
    $comport_equi="E - Insatisfactorio";
  }


  $pdf->Cell(70,10,utf8_decode($comport_equi),1,1,'C');

}
}







$pdf->AddPage();
$y=$pdf->GetY();
$pdf->SetXY(60,$y+15);
$pdf->SetFont('arial','B',10);
$pdf->SetFillColor(255, 96, 28);
 $pdf->SetTextColor(255, 255, 255);

$pdf->Cell(70,10,utf8_decode('QUIMESTRE1 - PROMEDIO'),0,1,'C',true);

$y=$pdf->GetY();
$pdf->SetXY(25,$y+5);
$pdf->Cell(80,10,utf8_decode('ASIGNATURA'),1,0,'C',true);
$pdf->Cell(30,10,utf8_decode('PROMEDIO'),1,0,'C',true);
$pdf->Cell(30,10,utf8_decode('EXAMEN'),1,0,'C',true);
$pdf->Cell(30,10,utf8_decode('NOTA'),1,1,'C',true);
$pdf->SetFont('arial','B',8);
 $pdf->SetTextColor(0, 0, 0);

 $dato_where="";
 $cont=0;
   $consulta="SELECT * from asignatura_periodo AP INNER JOIN asignatura A ON A.id_asignatura=AP.id_asignatura INNER JOIN quimestre1 Q1 ON Q1.id_asignatura_periodo=AP.id_asignatura_periodo where AP.id_periodo='$Id_perido' and Q1.id_notas='$id_notas' and A.id_asignatura!='11'   ";
   $ejec=mysqli_query($con,$consulta);
   while ($row=mysqli_fetch_array($ejec)) {
     $id_quimestre1=$row['id_quimestre1'];
     $cont++;
     if($cont>1){
       $dato_where.=" AND ";
     }
     $dato_where.="AP.id_asignatura_periodo!='".$row['id_asignatura_periodo']."'";
     $y=$pdf->GetY();
     $pdf->SetXY(25,$y);
    $pdf->Cell(80,10,utf8_decode($row['nombre']),1,0,'C');
       $examen_finalQ1=$row['examen']*0.2;
       $promediofinalQ1=$examen_finalQ1+$row['promedio'];
       $pdf->Cell(30,10,utf8_decode($row['promedio']),1,0,'C');
       $pdf->Cell(30,10,utf8_decode($examen_finalQ1),1,0,'C');
       $pdf->Cell(30,10,utf8_decode($promediofinalQ1),1,1,'C');
}
if($cont>0){
  $wheref=$dato_where ." and ";
}

$consultax=mysqli_query($con,"SELECT * from asignatura_curso_periodo ACP inner join asignatura_periodo AP on AP.id_asignatura_periodo=ACP.id_asignatura_periodo inner join asignatura A on A.id_asignatura=AP.id_asignatura inner join curso_periodo CP on CP.id_curso_periodo=ACP.id_curso_periodo where ".$wheref." CP.id_curso_periodo='$id_curso_periodo' and A.id_asignatura!='11' ");
   while($rowx=mysqli_fetch_array($consultax)){
     $y=$pdf->GetY();
     $pdf->SetXY(25,$y);
    $pdf->Cell(80,10,utf8_decode($rowx['nombre']),1,0,'C');
    $pdf->Cell(30,10,"0.00",1,0,'C');
    $pdf->Cell(30,10,"0.00",1,0,'C');
    $pdf->Cell(30,10,"0.00",1,1,'C');

}


$y=$pdf->GetY();
$pdf->SetXY(25,$y+5);
$pdf->Cell(80,10,utf8_decode('ASIGNATURA'),1,0,'C',true);
$pdf->Cell(70,10,utf8_decode('EQUIVALENCIA DEL COMPORTAMIENTO'),1,1,'C',true);
$pdf->SetFont('arial','B',8);
 $pdf->SetTextColor(0, 0, 0);
$consulta="SELECT * from asignatura_periodo AP INNER JOIN asignatura A ON A.id_asignatura=AP.id_asignatura INNER JOIN quimestre1 Q1 ON Q1.id_asignatura_periodo=AP.id_asignatura_periodo where AP.id_periodo='$Id_perido' and Q1.id_notas='$id_notas' and A.id_asignatura='11'   ";
$ejec=mysqli_query($con,$consulta);
while ($row=mysqli_fetch_array($ejec)) {
  $y=$pdf->GetY();
  $pdf->SetXY(25,$y);
  $pdf->Cell(80,10,utf8_decode($row['nombre']),1,0,'C');
  $examen_finalQ1=$row['examen']*0.2;
  $promediofinalQ1=$examen_finalQ1+$row['promedio'];

  $nota_comport=$promediofinalQ1;
  if ($nota_comport<=10 && $nota_comport>=9) {
    $comport_equi="A - Muy Satisfactorio";
  }
  if ($nota_comport<9 && $nota_comport>=7) {
    $comport_equi="B - Satisfactorio";
  }
  if ($nota_comport<7 && $nota_comport>=5) {
    $comport_equi="C - Poco Satisfactorio";
  }
  if ($nota_comport<5 && $nota_comport>=3) {
    $comport_equi="D - Mejorable";
  }
  if ($nota_comport<3 && $nota_comport>0) {
    $comport_equi="E - Insatisfactorio";
  }

  $pdf->Cell(70,10,utf8_decode($comport_equi),1,1,'C');


}




































$pdf->AddPage();
$y=$pdf->GetY();
$pdf->SetXY(60,$y+15);
$pdf->SetFont('arial','B',10);
$pdf->SetFillColor(255, 96, 28);
 $pdf->SetTextColor(255, 255, 255);

$pdf->Cell(70,10,utf8_decode('QUIMESTRE2 - PARCIAL 1'),0,1,'C',true);

$y=$pdf->GetY();
$pdf->SetXY(25,$y+5);
$pdf->Cell(80,10,utf8_decode('ASIGNATURA'),1,0,'C',true);
$pdf->Cell(30,10,utf8_decode('TAREAS'),1,0,'C',true);
$pdf->Cell(30,10,utf8_decode('TRAB. INDIVIDUAL'),1,0,'C',true);
$pdf->Cell(30,10,utf8_decode('TRAB. GRUPAL'),1,0,'C',true);
$pdf->Cell(30,10,utf8_decode('LECCIÓN'),1,0,'C',true);
$pdf->Cell(30,10,utf8_decode('APORTE'),1,0,'C',true);
$pdf->Cell(30,10,utf8_decode('NOTA'),1,1,'C',true);
$pdf->SetFont('arial','B',8);
 $pdf->SetTextColor(0, 0, 0);

 $dato_where="";
 $cont=0;
   $consulta="SELECT * from asignatura_periodo AP INNER JOIN asignatura A ON A.id_asignatura=AP.id_asignatura INNER JOIN quimestre2 Q1 ON Q1.id_asignatura_periodo=AP.id_asignatura_periodo where AP.id_periodo='$Id_perido' and Q1.id_notas='$id_notas' and A.id_asignatura!='11'   ";
   $ejec=mysqli_query($con,$consulta);
   while ($row=mysqli_fetch_array($ejec)) {
     $id_quimestre1=$row['id_quimestre2'];
     $cont++;
     if($cont>1){
       $dato_where.=" AND ";
     }
     $dato_where.="AP.id_asignatura_periodo!='".$row['id_asignatura_periodo']."'";

     $y=$pdf->GetY();
     $pdf->SetXY(25,$y);
    $pdf->Cell(80,10,utf8_decode($row['nombre']),1,0,'C');

     $consulta11="SELECT * from  quimestre2 Q1 INNER JOIN parcial1_q2 P1Q1 on P1Q1.id_quimestre2=Q1.id_quimestre2 where  Q1.id_quimestre2='$id_quimestre1' ";
     $ejec11=mysqli_query($con,$consulta11);
     while ($row11=mysqli_fetch_array($ejec11)) {
       $asd=1;
       $y=$pdf->GetY();
       $pdf->SetXY(105,$y);
       $pdf->Cell(30,10,utf8_decode($row11['deber']),1,0,'C');
       $pdf->Cell(30,10,utf8_decode($row11['activi_individual']),1,0,'C');
       $pdf->Cell(30,10,utf8_decode($row11['activi_grupal']),1,0,'C');
       $pdf->Cell(30,10,utf8_decode($row11['leccion']),1,0,'C');
       $pdf->Cell(30,10,utf8_decode($row11['aporte']),1,0,'C');
       $pdf->Cell(30,10,utf8_decode($row11['promedio']),1,1,'C');

}
}
if($cont>0){
  $wheref=$dato_where ." and ";
}

$consultax=mysqli_query($con,"SELECT * from asignatura_curso_periodo ACP inner join asignatura_periodo AP on AP.id_asignatura_periodo=ACP.id_asignatura_periodo inner join asignatura A on A.id_asignatura=AP.id_asignatura inner join curso_periodo CP on CP.id_curso_periodo=ACP.id_curso_periodo where ".$wheref." CP.id_curso_periodo='$id_curso_periodo' and A.id_asignatura!='11' ");
   while($rowx=mysqli_fetch_array($consultax)){
     $y=$pdf->GetY();
     $pdf->SetXY(25,$y);
    $pdf->Cell(80,10,utf8_decode($rowx['nombre']),1,0,'C');
    $pdf->Cell(30,10,"0.00",1,0,'C');
    $pdf->Cell(30,10,"0.00",1,0,'C');
    $pdf->Cell(30,10,"0.00",1,0,'C');
    $pdf->Cell(30,10,"0.00",1,0,'C');
    $pdf->Cell(30,10,"0.00",1,0,'C');
    $pdf->Cell(30,10,"0.00",1,1,'C');

}



$y=$pdf->GetY();
$pdf->SetXY(25,$y+5);
$pdf->Cell(80,10,utf8_decode('ASIGNATURA'),1,0,'C',true);
$pdf->Cell(70,10,utf8_decode('EQUIVALENCIA DEL COMPORTAMIENTO'),1,1,'C',true);
$pdf->SetFont('arial','B',8);
 $pdf->SetTextColor(0, 0, 0);
$consulta="SELECT * from asignatura_periodo AP INNER JOIN asignatura A ON A.id_asignatura=AP.id_asignatura INNER JOIN quimestre2 Q1 ON Q1.id_asignatura_periodo=AP.id_asignatura_periodo where AP.id_periodo='$Id_perido' and Q1.id_notas='$id_notas' and A.id_asignatura='11'   ";
$ejec=mysqli_query($con,$consulta);
while ($row=mysqli_fetch_array($ejec)) {
  $id_quimestre1=$row['id_quimestre2'];
  $y=$pdf->GetY();
  $pdf->SetXY(25,$y);
  $pdf->Cell(80,10,utf8_decode($row['nombre']),1,0,'C');
  $consulta11="SELECT * from  quimestre2 Q1 INNER JOIN parcial1_q2 P1Q1 on P1Q1.id_quimestre2=Q1.id_quimestre2 where  Q1.id_quimestre2='$id_quimestre1' ";
  $ejec11=mysqli_query($con,$consulta11);
  while ($row11=mysqli_fetch_array($ejec11)) {
    $y=$pdf->GetY();
    $pdf->SetXY(105,$y);
  $nota_comport=$row11['promedio'];
  if ($nota_comport<=10 && $nota_comport>=9) {
    $comport_equi="A - Muy Satisfactorio";
  }
  if ($nota_comport<9 && $nota_comport>=7) {
    $comport_equi="B - Satisfactorio";
  }
  if ($nota_comport<7 && $nota_comport>=5) {
    $comport_equi="C - Poco Satisfactorio";
  }
  if ($nota_comport<5 && $nota_comport>=3) {
    $comport_equi="D - Mejorable";
  }
  if ($nota_comport<3 && $nota_comport>0) {
    $comport_equi="E - Insatisfactorio";
  }


  $pdf->Cell(70,10,utf8_decode($comport_equi),1,1,'C');

}
}








$pdf->AddPage();
$y=$pdf->GetY();
$pdf->SetXY(60,$y+15);
$pdf->SetFont('arial','B',10);
$pdf->SetFillColor(255, 96, 28);
 $pdf->SetTextColor(255, 255, 255);

$pdf->Cell(70,10,utf8_decode('QUIMESTRE2 - PARCIAL 2'),0,1,'C',true);

$y=$pdf->GetY();
$pdf->SetXY(25,$y+5);
$pdf->Cell(80,10,utf8_decode('ASIGNATURA'),1,0,'C',true);
$pdf->Cell(30,10,utf8_decode('TAREAS'),1,0,'C',true);
$pdf->Cell(30,10,utf8_decode('TRAB. INDIVIDUAL'),1,0,'C',true);
$pdf->Cell(30,10,utf8_decode('TRAB. GRUPAL'),1,0,'C',true);
$pdf->Cell(30,10,utf8_decode('LECCIÓN'),1,0,'C',true);
$pdf->Cell(30,10,utf8_decode('APORTE'),1,0,'C',true);
$pdf->Cell(30,10,utf8_decode('NOTA'),1,1,'C',true);
$pdf->SetFont('arial','B',8);
 $pdf->SetTextColor(0, 0, 0);

 $dato_where="";
 $cont=0;
   $consulta="SELECT * from asignatura_periodo AP INNER JOIN asignatura A ON A.id_asignatura=AP.id_asignatura INNER JOIN quimestre2 Q1 ON Q1.id_asignatura_periodo=AP.id_asignatura_periodo where AP.id_periodo='$Id_perido' and Q1.id_notas='$id_notas' and A.id_asignatura!='11'   ";
   $ejec=mysqli_query($con,$consulta);
   while ($row=mysqli_fetch_array($ejec)) {
     $id_quimestre1=$row['id_quimestre2'];
     $cont++;
     if($cont>1){
       $dato_where.=" AND ";
     }
     $dato_where.="AP.id_asignatura_periodo!='".$row['id_asignatura_periodo']."'";

     $y=$pdf->GetY();
     $pdf->SetXY(25,$y);
    $pdf->Cell(80,10,utf8_decode($row['nombre']),1,0,'C');

     $consulta11="SELECT * from  quimestre2 Q1 INNER JOIN parcial2_q2 P1Q1 on P1Q1.id_quimestre2=Q1.id_quimestre2 where  Q1.id_quimestre2='$id_quimestre1' ";
     $ejec11=mysqli_query($con,$consulta11);
     while ($row11=mysqli_fetch_array($ejec11)) {
       $asd=1;
       $y=$pdf->GetY();
       $pdf->SetXY(105,$y);
       $pdf->Cell(30,10,utf8_decode($row11['deber']),1,0,'C');
       $pdf->Cell(30,10,utf8_decode($row11['activi_individual']),1,0,'C');
       $pdf->Cell(30,10,utf8_decode($row11['activi_grupal']),1,0,'C');
       $pdf->Cell(30,10,utf8_decode($row11['leccion']),1,0,'C');
       $pdf->Cell(30,10,utf8_decode($row11['aporte']),1,0,'C');
       $pdf->Cell(30,10,utf8_decode($row11['promedio']),1,1,'C');

}
}
if($cont>0){
  $wheref=$dato_where ." and ";
}

$consultax=mysqli_query($con,"SELECT * from asignatura_curso_periodo ACP inner join asignatura_periodo AP on AP.id_asignatura_periodo=ACP.id_asignatura_periodo inner join asignatura A on A.id_asignatura=AP.id_asignatura inner join curso_periodo CP on CP.id_curso_periodo=ACP.id_curso_periodo where ".$wheref." CP.id_curso_periodo='$id_curso_periodo' and A.id_asignatura!='11' ");
   while($rowx=mysqli_fetch_array($consultax)){
     $y=$pdf->GetY();
     $pdf->SetXY(25,$y);
    $pdf->Cell(80,10,utf8_decode($rowx['nombre']),1,0,'C');
    $pdf->Cell(30,10,"0.00",1,0,'C');
    $pdf->Cell(30,10,"0.00",1,0,'C');
    $pdf->Cell(30,10,"0.00",1,0,'C');
    $pdf->Cell(30,10,"0.00",1,0,'C');
    $pdf->Cell(30,10,"0.00",1,0,'C');
    $pdf->Cell(30,10,"0.00",1,1,'C');

}



$y=$pdf->GetY();
$pdf->SetXY(25,$y+5);
$pdf->Cell(80,10,utf8_decode('ASIGNATURA'),1,0,'C',true);
$pdf->Cell(70,10,utf8_decode('EQUIVALENCIA DEL COMPORTAMIENTO'),1,1,'C',true);
$pdf->SetFont('arial','B',8);
 $pdf->SetTextColor(0, 0, 0);
$consulta="SELECT * from asignatura_periodo AP INNER JOIN asignatura A ON A.id_asignatura=AP.id_asignatura INNER JOIN quimestre2 Q1 ON Q1.id_asignatura_periodo=AP.id_asignatura_periodo where AP.id_periodo='$Id_perido' and Q1.id_notas='$id_notas' and A.id_asignatura='11'   ";
$ejec=mysqli_query($con,$consulta);
while ($row=mysqli_fetch_array($ejec)) {
  $id_quimestre1=$row['id_quimestre2'];
  $y=$pdf->GetY();
  $pdf->SetXY(25,$y);
  $pdf->Cell(80,10,utf8_decode($row['nombre']),1,0,'C');
  $consulta11="SELECT * from  quimestre2 Q1 INNER JOIN parcial2_q2 P1Q1 on P1Q1.id_quimestre2=Q1.id_quimestre2 where  Q1.id_quimestre2='$id_quimestre1' ";
  $ejec11=mysqli_query($con,$consulta11);
  while ($row11=mysqli_fetch_array($ejec11)) {
    $y=$pdf->GetY();
    $pdf->SetXY(105,$y);
  $nota_comport=$row11['promedio'];
  if ($nota_comport<=10 && $nota_comport>=9) {
    $comport_equi="A - Muy Satisfactorio";
  }
  if ($nota_comport<9 && $nota_comport>=7) {
    $comport_equi="B - Satisfactorio";
  }
  if ($nota_comport<7 && $nota_comport>=5) {
    $comport_equi="C - Poco Satisfactorio";
  }
  if ($nota_comport<5 && $nota_comport>=3) {
    $comport_equi="D - Mejorable";
  }
  if ($nota_comport<3 && $nota_comport>0) {
    $comport_equi="E - Insatisfactorio";
  }


  $pdf->Cell(70,10,utf8_decode($comport_equi),1,1,'C');

}
}












$pdf->AddPage();
$y=$pdf->GetY();
$pdf->SetXY(60,$y+15);
$pdf->SetFont('arial','B',10);
$pdf->SetFillColor(255, 96, 28);
 $pdf->SetTextColor(255, 255, 255);

$pdf->Cell(70,10,utf8_decode('QUIMESTRE2 - PARCIAL 3'),0,1,'C',true);

$y=$pdf->GetY();
$pdf->SetXY(25,$y+5);
$pdf->Cell(80,10,utf8_decode('ASIGNATURA'),1,0,'C',true);
$pdf->Cell(30,10,utf8_decode('TAREAS'),1,0,'C',true);
$pdf->Cell(30,10,utf8_decode('TRAB. INDIVIDUAL'),1,0,'C',true);
$pdf->Cell(30,10,utf8_decode('TRAB. GRUPAL'),1,0,'C',true);
$pdf->Cell(30,10,utf8_decode('LECCIÓN'),1,0,'C',true);
$pdf->Cell(30,10,utf8_decode('APORTE'),1,0,'C',true);
$pdf->Cell(30,10,utf8_decode('NOTA'),1,1,'C',true);
$pdf->SetFont('arial','B',8);
 $pdf->SetTextColor(0, 0, 0);

 $dato_where="";
 $cont=0;
   $consulta="SELECT * from asignatura_periodo AP INNER JOIN asignatura A ON A.id_asignatura=AP.id_asignatura INNER JOIN quimestre2 Q1 ON Q1.id_asignatura_periodo=AP.id_asignatura_periodo where AP.id_periodo='$Id_perido' and Q1.id_notas='$id_notas' and A.id_asignatura!='11'   ";
   $ejec=mysqli_query($con,$consulta);
   while ($row=mysqli_fetch_array($ejec)) {
     $id_quimestre1=$row['id_quimestre2'];
     $cont++;
     if($cont>1){
       $dato_where.=" AND ";
     }
     $dato_where.="AP.id_asignatura_periodo!='".$row['id_asignatura_periodo']."'";

     $y=$pdf->GetY();
     $pdf->SetXY(25,$y);
    $pdf->Cell(80,10,utf8_decode($row['nombre']),1,0,'C');

     $consulta11="SELECT * from  quimestre2 Q1 INNER JOIN parcial3_q2 P1Q1 on P1Q1.id_quimestre2=Q1.id_quimestre2 where  Q1.id_quimestre2='$id_quimestre1' ";
     $ejec11=mysqli_query($con,$consulta11);
     while ($row11=mysqli_fetch_array($ejec11)) {
       $asd=1;
       $y=$pdf->GetY();
       $pdf->SetXY(105,$y);
       $pdf->Cell(30,10,utf8_decode($row11['deber']),1,0,'C');
       $pdf->Cell(30,10,utf8_decode($row11['activi_individual']),1,0,'C');
       $pdf->Cell(30,10,utf8_decode($row11['activi_grupal']),1,0,'C');
       $pdf->Cell(30,10,utf8_decode($row11['leccion']),1,0,'C');
       $pdf->Cell(30,10,utf8_decode($row11['aporte']),1,0,'C');
       $pdf->Cell(30,10,utf8_decode($row11['promedio']),1,1,'C');

}
}
if($cont>0){
  $wheref=$dato_where ." and ";
}

$consultax=mysqli_query($con,"SELECT * from asignatura_curso_periodo ACP inner join asignatura_periodo AP on AP.id_asignatura_periodo=ACP.id_asignatura_periodo inner join asignatura A on A.id_asignatura=AP.id_asignatura inner join curso_periodo CP on CP.id_curso_periodo=ACP.id_curso_periodo where ".$wheref." CP.id_curso_periodo='$id_curso_periodo' and A.id_asignatura!='11' ");
   while($rowx=mysqli_fetch_array($consultax)){
     $y=$pdf->GetY();
     $pdf->SetXY(25,$y);
    $pdf->Cell(80,10,utf8_decode($rowx['nombre']),1,0,'C');
    $pdf->Cell(30,10,"0.00",1,0,'C');
    $pdf->Cell(30,10,"0.00",1,0,'C');
    $pdf->Cell(30,10,"0.00",1,0,'C');
    $pdf->Cell(30,10,"0.00",1,0,'C');
    $pdf->Cell(30,10,"0.00",1,0,'C');
    $pdf->Cell(30,10,"0.00",1,1,'C');

}



$y=$pdf->GetY();
$pdf->SetXY(25,$y+5);
$pdf->Cell(80,10,utf8_decode('ASIGNATURA'),1,0,'C',true);
$pdf->Cell(70,10,utf8_decode('EQUIVALENCIA DEL COMPORTAMIENTO'),1,1,'C',true);
$pdf->SetFont('arial','B',8);
 $pdf->SetTextColor(0, 0, 0);
$consulta="SELECT * from asignatura_periodo AP INNER JOIN asignatura A ON A.id_asignatura=AP.id_asignatura INNER JOIN quimestre2 Q1 ON Q1.id_asignatura_periodo=AP.id_asignatura_periodo where AP.id_periodo='$Id_perido' and Q1.id_notas='$id_notas' and A.id_asignatura='11'   ";
$ejec=mysqli_query($con,$consulta);
while ($row=mysqli_fetch_array($ejec)) {
  $id_quimestre1=$row['id_quimestre2'];
  $y=$pdf->GetY();
  $pdf->SetXY(25,$y);
  $pdf->Cell(80,10,utf8_decode($row['nombre']),1,0,'C');
  $consulta11="SELECT * from  quimestre2 Q1 INNER JOIN parcial3_q2 P1Q1 on P1Q1.id_quimestre2=Q1.id_quimestre2 where  Q1.id_quimestre2='$id_quimestre1' ";
  $ejec11=mysqli_query($con,$consulta11);
  while ($row11=mysqli_fetch_array($ejec11)) {
    $y=$pdf->GetY();
    $pdf->SetXY(105,$y);
  $nota_comport=$row11['promedio'];
  if ($nota_comport<=10 && $nota_comport>=9) {
    $comport_equi="A - Muy Satisfactorio";
  }
  if ($nota_comport<9 && $nota_comport>=7) {
    $comport_equi="B - Satisfactorio";
  }
  if ($nota_comport<7 && $nota_comport>=5) {
    $comport_equi="C - Poco Satisfactorio";
  }
  if ($nota_comport<5 && $nota_comport>=3) {
    $comport_equi="D - Mejorable";
  }
  if ($nota_comport<3 && $nota_comport>0) {
    $comport_equi="E - Insatisfactorio";
  }


  $pdf->Cell(70,10,utf8_decode($comport_equi),1,1,'C');

}
}







$pdf->AddPage();
$y=$pdf->GetY();
$pdf->SetXY(60,$y+15);
$pdf->SetFont('arial','B',10);
$pdf->SetFillColor(255, 96, 28);
 $pdf->SetTextColor(255, 255, 255);

$pdf->Cell(70,10,utf8_decode('QUIMESTRE2 - PROMEDIO'),0,1,'C',true);

$y=$pdf->GetY();
$pdf->SetXY(25,$y+5);
$pdf->Cell(80,10,utf8_decode('ASIGNATURA'),1,0,'C',true);
$pdf->Cell(30,10,utf8_decode('PROMEDIO'),1,0,'C',true);
$pdf->Cell(30,10,utf8_decode('EXAMEN'),1,0,'C',true);
$pdf->Cell(30,10,utf8_decode('NOTA'),1,1,'C',true);
$pdf->SetFont('arial','B',8);
 $pdf->SetTextColor(0, 0, 0);

 $dato_where="";
 $cont=0;
   $consulta="SELECT * from asignatura_periodo AP INNER JOIN asignatura A ON A.id_asignatura=AP.id_asignatura INNER JOIN quimestre2 Q1 ON Q1.id_asignatura_periodo=AP.id_asignatura_periodo where AP.id_periodo='$Id_perido' and Q1.id_notas='$id_notas' and A.id_asignatura!='11'   ";
   $ejec=mysqli_query($con,$consulta);
   while ($row=mysqli_fetch_array($ejec)) {
     $id_quimestre1=$row['id_quimestre2'];
     $cont++;
     if($cont>1){
       $dato_where.=" AND ";
     }
     $dato_where.="AP.id_asignatura_periodo!='".$row['id_asignatura_periodo']."'";
     $y=$pdf->GetY();
     $pdf->SetXY(25,$y);
    $pdf->Cell(80,10,utf8_decode($row['nombre']),1,0,'C');
       $examen_finalQ1=$row['examen']*0.2;
       $promediofinalQ1=$examen_finalQ1+$row['promedio'];
       $pdf->Cell(30,10,utf8_decode($row['promedio']),1,0,'C');
       $pdf->Cell(30,10,utf8_decode($examen_finalQ1),1,0,'C');
       $pdf->Cell(30,10,utf8_decode($promediofinalQ1),1,1,'C');
}
if($cont>0){
  $wheref=$dato_where ." and ";
}

$consultax=mysqli_query($con,"SELECT * from asignatura_curso_periodo ACP inner join asignatura_periodo AP on AP.id_asignatura_periodo=ACP.id_asignatura_periodo inner join asignatura A on A.id_asignatura=AP.id_asignatura inner join curso_periodo CP on CP.id_curso_periodo=ACP.id_curso_periodo where ".$wheref." CP.id_curso_periodo='$id_curso_periodo' and A.id_asignatura!='11' ");
   while($rowx=mysqli_fetch_array($consultax)){
     $y=$pdf->GetY();
     $pdf->SetXY(25,$y);
    $pdf->Cell(80,10,utf8_decode($rowx['nombre']),1,0,'C');
    $pdf->Cell(30,10,"0.00",1,0,'C');
    $pdf->Cell(30,10,"0.00",1,0,'C');
    $pdf->Cell(30,10,"0.00",1,1,'C');

}


$y=$pdf->GetY();
$pdf->SetXY(25,$y+5);
$pdf->Cell(80,10,utf8_decode('ASIGNATURA'),1,0,'C',true);
$pdf->Cell(70,10,utf8_decode('EQUIVALENCIA DEL COMPORTAMIENTO'),1,1,'C',true);
$pdf->SetFont('arial','B',8);
 $pdf->SetTextColor(0, 0, 0);
$consulta="SELECT * from asignatura_periodo AP INNER JOIN asignatura A ON A.id_asignatura=AP.id_asignatura INNER JOIN quimestre2 Q1 ON Q1.id_asignatura_periodo=AP.id_asignatura_periodo where AP.id_periodo='$Id_perido' and Q1.id_notas='$id_notas' and A.id_asignatura='11'   ";
$ejec=mysqli_query($con,$consulta);
while ($row=mysqli_fetch_array($ejec)) {
  $y=$pdf->GetY();
  $pdf->SetXY(25,$y);
  $pdf->Cell(80,10,utf8_decode($row['nombre']),1,0,'C');
  $examen_finalQ1=$row['examen']*0.2;
  $promediofinalQ1=$examen_finalQ1+$row['promedio'];

  $nota_comport=$promediofinalQ1;
  if ($nota_comport<=10 && $nota_comport>=9) {
    $comport_equi="A - Muy Satisfactorio";
  }
  if ($nota_comport<9 && $nota_comport>=7) {
    $comport_equi="B - Satisfactorio";
  }
  if ($nota_comport<7 && $nota_comport>=5) {
    $comport_equi="C - Poco Satisfactorio";
  }
  if ($nota_comport<5 && $nota_comport>=3) {
    $comport_equi="D - Mejorable";
  }
  if ($nota_comport<3 && $nota_comport>0) {
    $comport_equi="E - Insatisfactorio";
  }

  $pdf->Cell(70,10,utf8_decode($comport_equi),1,1,'C');


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
