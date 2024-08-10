<?php
require 'FPDF/fpdf.php';
class PDF extends FPDF
{

  function Header()
  {
    include('config/config.php');
    $result= mysqli_query($con,"SELECT * from periodo order by id_periodo DESC");
    $row= mysqli_fetch_array($result);
  //$this->image($row['logo'],20,10,40);
   $this->SetFont('arial','B',10);
   $this->SetXY(235,6);
   $this->Cell(50,10,'Fecha: Guayaquil, '.date('d-m-y').'',0,1,'C');
   $this->SetFont('arial','B',14);
   $this->SetXY(125,10);
   $this->Cell(50,10,utf8_decode('UNIDAD EDUCATIVA Nº 518 "ARCO IRIS INFANTIL"'),0,1,'C');
   $this->SetXY(125,20);
   $this->Cell(50,10,utf8_decode('REPORTE DE NOTAS '.$row['periodo'].' '),0,1,'C');
  }
  function Footer(){
    $this->SetY(-15);
    $this->SetFont('arial','I',8);
    $this->Cell(0,10,'pagina'.$this->PageNo().'/{nb}',0,0,'C');
  }

}

 ?>
