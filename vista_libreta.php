<?php
    session_start();
    include "config/config.php";
    $title="Sistema Educativo";
    if(empty($_SESSION['ID_usu'])){
       header("Location: index.php");
    }
    $idrepresentante=$_SESSION['ID_rep'];
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo $title." "; ?> </title>

        <!-- Bootstrap -->
        <link href="css/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">

        <!-- NProgress -->
        <link href="css/nprogress/nprogress.css" rel="stylesheet">
          <!-- iCheck -->
       <link href="css/iCheck/skins/flat/green.css" rel="stylesheet">
       <!-- Datatables -->
        <link href="css/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
        <link href="css/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
        <link href="css/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
        <link href="css/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
        <link href="css/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
        <!-- jQuery custom content scroller -->
        <link href="css/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css" rel="stylesheet"/>

        <!-- bootstrap-daterangepicker -->
        <link href="css/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

        <!-- Custom Theme Style -->
        <link href="css/custom.min.css" rel="stylesheet">
        <link rel="stylesheet" href="css/esti_formu.css">
        <link rel="stylesheet" href="css/tabla_normal.css">

        <!-- MICSS button[type="file"] -->
        <link rel="stylesheet" href="css/micss.css">
        <script src="js/jquery/dist/jquery.min.js"></script>

    </head>

    <body class="nav-md">
        <div class="container body">
            <div class="main_container">
                <div class="col-md-3 left_col">
                    <div class="left_col scroll-view">
                        <div class="navbar nav_title" style="border: 0;">
                          <a href="#" class="site_title"> <i class="fas fa-university"></i>  <span>Sistema Educativo</span></a>
                        </div>
                        <div class="clearfix"></div>

                            <!-- menu profile quick info -->
                                <div class="profile clearfix">
                                    <div class="profile_pic">
                                        <img src="<?php echo $_SESSION['FOTO']; ?>" alt="" class="img-circle profile_img">
                                    </div>
                                    <div class="profile_info">
                                        <span>Bienvenido,</span>
                                        <h2><?php if(isset($_SESSION['NU'])){echo $_SESSION['NU'];}else{ echo "Sistema Educativo";} ?></h2>
                                    </div>
                                </div>
                            <!-- /menu profile quick info -->

                        <br />

<?php
    $title ="Sistema Educativo";
    include "sidebar.php";
    include('config/config.php');
    $pace="";
    $quime="";
    if (isset($_POST['quime']) && isset($_POST['parcial'])) {
      $pace=$_POST['parcial'];
      $quime=$_POST['quime'];
    }
?>
    <div class="right_col" role=""> <!-- page content -->
        <div class="">
            <div class="page-title">


              <div class="col-md-12 col-sm-12 col-xs-12">

                  <div class="x_panel">
                      <div class="x_title">
                          <h2>Vista de notas por parcial &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h2>   <a href="reporte_libreta_impri.php" target="_blank">  <h2> IMPRIMIR NOTAS <i class="fas fa-print"></i></h2></a>
                          <ul class="nav navbar-right panel_toolbox">
                              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                              </li>
                              <li><a class="close-link"><i class="fa fa-close"></i></a>
                              </li>
                          </ul>
                          <div class="clearfix"></div>
                      </div>


                      <!-- form search -->


                      <!-- end form search -->

                      <div class="x_content">
                          <div class="table-responsive">
                            <form id="formulario" class="formulario" action="vista_libreta.php" method="post" enctype="multipart/form-data">
                              <fieldset class="fieldset_normal">
                                <h2></h2>
                                <hr>
                                <div class="cont_cajas_peque">
                                  <label class="etiq_caja">Quimestres</label>
                                  <select class="F_combo" name="quime" required ><option value="" >-SELECCIONE-</option> <option>Quimestre1</option><option>Quimestre2</option><option>Promedio Final</option> </select>
                                </div>
                                <div class="cont_cajas_peque">
                                  <label class="etiq_caja">Parciales</label>
                                  <select class="F_combo" name="parcial" required ><option value="" >-SELECCIONE-</option> <option>Parcial1</option><option>Parcial2</option><option>Parcial3</option><option>Promedio</option> </select>
                                </div>

                                <div class="conten_botom_formu">
                                  <input  type="submit" name="enviar" value="Agregar" class="acao">
                                  <a href="" class="cancelar">Cancelar</a>
                                </div>
                              </fieldset>

                            </form>
                              <script src="js/funcions.js" charset="utf-8"></script>
                            </div>  </div>    <!-- ajax -->

                      <?php



                          $ejec0=mysqli_query($con,"SELECT * FROM matricula M inner join estudiante E on E.id_estudiante=M.id_estudiante INNER JOIN curso_periodo CP ON M.id_curso_periodo=CP.id_curso_periodo INNER JOIN representante R ON R.id_representante=M.id_representante INNER JOIN notas N ON N.id_matricula=M.id_matricula WHERE M.id_representante='$idrepresentante'");
                          $row0=mysqli_fetch_array($ejec0);
                          $id_curso_periodo=$row0['id_curso_periodo'];
                          $id_notas=$row0['id_notas'];
                          $Id_perido=$row0['id_periodo'];
                          $Id_estudiante=$row0['id_estudiante'];



              if ($pace=="Parcial1" && $quime=="Quimestre1") {
?>
<h1>Quimestre 1</h1>
<h2>parcial 1</h2>
<div class="">
  <table>
      <thead>
        <tr>
          <th >ASIGNNATURA</th>
          <th>Tareas</th>
          <th>Trab. Individual</th>
          <th>Trab. Grupal</th>
          <th>Lecciones</th>
          <th>Prueba Parcial</th>
          <th>Nota</th>
        </tr>
      </thead>
        <tr>

<?php
                        $dato_where="";
                        $cont=0;
                          $consulta="SELECT * from asignatura_periodo AP INNER JOIN asignatura A ON A.id_asignatura=AP.id_asignatura INNER JOIN quimestre1 Q1 ON Q1.id_asignatura_periodo=AP.id_asignatura_periodo where AP.id_periodo='$Id_perido' and Q1.id_notas='$id_notas'  ";
                          $ejec=mysqli_query($con,$consulta);
                          while ($row=mysqli_fetch_array($ejec)) {
                            $id_quimestre1=$row['id_quimestre1'];
                            $cont++;
                            if($cont>1){
                              $dato_where.=" AND ";
                            }
                            $dato_where.="AP.id_asignatura_periodo!='".$row['id_asignatura_periodo']."'";

                            ?> <td><?php echo $row['nombre']; ?> </td> <?php

                            $consulta11="SELECT * from  quimestre1 Q1 INNER JOIN parcial1_q1 P1Q1 on P1Q1.id_quimestre1=Q1.id_quimestre1 where  Q1.id_quimestre1='$id_quimestre1' ";
                            $ejec11=mysqli_query($con,$consulta11);
                            while ($row11=mysqli_fetch_array($ejec11)) {
                              $asd=1;
                            ?>
                            <td <?php if ($row11['deber']>4 && $row11['deber']<=7 && $row11['deber']!=0) { echo ' style="background: #cfd159;"'; }if ($row11['deber']<=4 && $row11['deber']!=0) { echo ' style="background: #d44848;"'; } ?> ><?php echo $row11['deber']; ?> </td>
                            <td <?php if ($row11['activi_individual']>4 && $row11['activi_individual']<=7 && $row11['activi_individual']!=0) { echo ' style="background: #cfd159;"'; }if ($row11['activi_individual']<=4 && $row11['activi_individual']!=0) { echo ' style="background: #d44848;"'; } ?> ><?php echo $row11['activi_individual']; ?> </td>
                            <td <?php if ($row11['activi_grupal']>4 && $row11['activi_grupal']<=7 && $row11['activi_grupal']!=0) { echo ' style="background: #cfd159;"'; }if ($row11['activi_grupal']<=4 && $row11['activi_grupal']!=0) { echo ' style="background: #d44848;"'; } ?>><?php echo $row11['activi_grupal']; ?> </td>
                            <td <?php if ($row11['leccion']>4 && $row11['leccion']<=7 && $row11['leccion']!=0) { echo ' style="background: #cfd159;"'; }if ($row11['leccion']<=4 && $row11['leccion']!=0) { echo ' style="background: #d44848;"'; } ?>><?php echo $row11['leccion']; ?> </td>
                            <td <?php if ($row11['aporte']>4 && $row11['aporte']<=7 && $row11['aporte']!=0) { echo ' style="background: #cfd159;"'; }if ($row11['aporte']<=4 && $row11['aporte']!=0) { echo ' style="background: #d44848;"'; } ?>><?php echo $row11['aporte']; ?> </td>
                            <td  <?php if ($row11['promedio']>4 && $row11['promedio']<=7 && $row11['promedio']!=0) { echo ' style="background: #cfd159;"'; }if ($row11['promedio']<=4 && $row11['promedio']!=0) { echo ' style="background: #d44848;"'; } ?>><?php echo $row11['promedio']; ?> </td>
                            <?php }


                            ?>
                            </tr>
                            <tr>
                          <?php

                          }
                          if($cont>0){
                            $wheref=$dato_where ." and ";
                          }

                          $consultax=mysqli_query($con,"SELECT * from asignatura_curso_periodo ACP inner join asignatura_periodo AP on AP.id_asignatura_periodo=ACP.id_asignatura_periodo inner join asignatura A on A.id_asignatura=AP.id_asignatura inner join curso_periodo CP on CP.id_curso_periodo=ACP.id_curso_periodo where ".$wheref." CP.id_curso_periodo='$id_curso_periodo'  ");
                             while($rowx=mysqli_fetch_array($consultax)){ ?>
                               <td><?php echo $rowx['nombre']; ?> </td>
                               <td>0.00</td>
                               <td>0.00</td>
                               <td>0.00</td>
                               <td>0.00</td>
                               <td>0.00</td>
                               <td>0.00</td>
                           </tr>
                           <?php }


?>  </table>
<?php }  if ($pace=="Parcial2" && $quime=="Quimestre1") { ?>
  <h1>Quimestre 1</h1>
<h2>parcial 2</h2>
<div class="">
  <table>
      <thead>
        <tr>
          <th >ASIGNNATURA</th>
          <th>Tareas</th>
          <th>Trab. Individual</th>
          <th>Trab. Grupal</th>
          <th>Lecciones</th>
          <th>Prueba Parcial</th>
          <th>Nota</th>
        </tr>
      </thead>
        <tr>

<?php
$dato_where="";
$cont=0;
                          $consulta="SELECT * from asignatura_periodo AP INNER JOIN asignatura A ON A.id_asignatura=AP.id_asignatura INNER JOIN quimestre1 Q1 ON Q1.id_asignatura_periodo=AP.id_asignatura_periodo where AP.id_periodo='$Id_perido' and Q1.id_notas='$id_notas'  ";
                          $ejec=mysqli_query($con,$consulta);
                          while ($row=mysqli_fetch_array($ejec)) {
                            $id_quimestre1=$row['id_quimestre1'];
                              $cont++;
                                if($cont>1){
                                  $dato_where.=" AND ";
                                }
                                $dato_where.="AP.id_asignatura_periodo!='".$row['id_asignatura_periodo']."'";
                            ?> <td><?php echo $row['nombre']; ?> </td> <?php

                            $consulta11="SELECT * from  quimestre1 Q1 INNER JOIN parcial2_q1 P2Q1 on P2Q1.id_quimestre1=Q1.id_quimestre1 where  Q1.id_quimestre1='$id_quimestre1' ";
                            $ejec11=mysqli_query($con,$consulta11);
                            while ($row11=mysqli_fetch_array($ejec11)) {
                              ?>
                              <td  <?php if ($row11['deber']>4 && $row11['deber']<=7 && $row11['deber']!=0) { echo ' style="background: #cfd159;"'; }if ($row11['deber']<=4 && $row11['deber']!=0) { echo ' style="background: #d44848;"'; } ?> ><?php echo $row11['deber']; ?> </td>
                              <td <?php if ($row11['activi_individual']>4 && $row11['activi_individual']<=7 && $row11['activi_individual']!=0) { echo ' style="background: #cfd159;"'; }if ($row11['activi_individual']<=4 && $row11['activi_individual']!=0) { echo ' style="background: #d44848;"'; } ?>><?php echo $row11['activi_individual']; ?> </td>
                              <td <?php if ($row11['activi_grupal']>4 && $row11['activi_grupal']<=7 && $row11['activi_grupal']!=0) { echo ' style="background: #cfd159;"'; }if ($row11['activi_grupal']<=4 && $row11['activi_grupal']!=0) { echo ' style="background: #d44848;"'; } ?>><?php echo $row11['activi_grupal']; ?> </td>
                              <td <?php if ($row11['leccion']>4 && $row11['leccion']<=7 && $row11['leccion']!=0) { echo ' style="background: #cfd159;"'; }if ($row11['leccion']<=4 && $row11['leccion']!=0) { echo ' style="background: #d44848;"'; } ?>><?php echo $row11['leccion']; ?> </td>
                              <td <?php if ($row11['aporte']>4 && $row11['aporte']<=7 && $row11['aporte']!=0) { echo ' style="background: #cfd159;"'; }if ($row11['aporte']<=4 && $row11['aporte']!=0) { echo ' style="background: #d44848;"'; } ?>><?php echo $row11['aporte']; ?> </td>
                              <td <?php if ($row11['promedio']>4 && $row11['promedio']<=7 && $row11['promedio']!=0) { echo ' style="background: #cfd159;"'; }if ($row11['promedio']<=4 && $row11['promedio']!=0) { echo ' style="background: #d44848;"'; } ?>><?php echo $row11['promedio']; ?> </td>
                              <?php } ?>
                              </tr><tr>
                            <?php
                             }
                              if($cont>0){
                                $wheref=$dato_where ." and ";
                              }

                              $consultax=mysqli_query($con,"SELECT * from asignatura_curso_periodo ACP inner join asignatura_periodo AP on AP.id_asignatura_periodo=ACP.id_asignatura_periodo inner join asignatura A on A.id_asignatura=AP.id_asignatura inner join curso_periodo CP on CP.id_curso_periodo=ACP.id_curso_periodo where ".$wheref." CP.id_curso_periodo='$id_curso_periodo'  ");
                                 while($rowx=mysqli_fetch_array($consultax)){ ?>
                                   <td><?php echo $rowx['nombre']; ?> </td>
                                   <td>0.00</td>
                                   <td>0.00</td>
                                   <td>0.00</td>
                                   <td>0.00</td>
                                   <td>0.00</td>
                                   <td>0.00</td>
                               </tr>
                               <?php }
                            ?>  </table>
<?php }  if ($pace=="Parcial3" && $quime=="Quimestre1") { ?>
    <h1>Quimestre 1</h1>
                            <h2>parcial 3</h2>
                            <div class="">
                              <table>
                                  <thead>
                                    <tr>
                                      <th >ASIGNNATURA</th>
                                      <th>Tareas</th>
                                      <th>Trab. Individual</th>
                                      <th>Trab. Grupal</th>
                                      <th>Lecciones</th>
                                      <th>Prueba Parcial</th>
                                      <th>Nota</th>
                                    </tr>
                                  </thead>
                                    <tr>

                            <?php
                            $dato_where="";
                            $cont=0;
                          $consulta="SELECT * from asignatura_periodo AP INNER JOIN asignatura A ON A.id_asignatura=AP.id_asignatura INNER JOIN quimestre1 Q1 ON Q1.id_asignatura_periodo=AP.id_asignatura_periodo where AP.id_periodo='$Id_perido' and Q1.id_notas='$id_notas'  ";
                          $ejec=mysqli_query($con,$consulta);
                          while ($row=mysqli_fetch_array($ejec)) {
                            $id_quimestre1=$row['id_quimestre1'];
                            $cont++;
                            if($cont>1){
                              $dato_where.=" AND ";
                            }
                            $dato_where.="AP.id_asignatura_periodo!='".$row['id_asignatura_periodo']."'";

                          ?> <td><?php echo $row['nombre']; ?> </td> <?php

                            $consulta11="SELECT * from  quimestre1 Q1 INNER JOIN parcial3_q1 P3Q1 on P3Q1.id_quimestre1=Q1.id_quimestre1 where  Q1.id_quimestre1='$id_quimestre1' ";
                            $ejec11=mysqli_query($con,$consulta11);
                            while ($row11=mysqli_fetch_array($ejec11)) {
                              ?>
                              <td <?php if ($row11['deber']>4 && $row11['deber']<=7 && $row11['deber']!=0) { echo ' style="background: #cfd159;"'; }if ($row11['deber']<=4 && $row11['deber']!=0) { echo ' style="background: #d44848;"'; } ?>><?php echo $row11['deber']; ?> </td>
                              <td <?php if ($row11['activi_individual']>4 && $row11['activi_individual']<=7 && $row11['activi_individual']!=0) { echo ' style="background: #cfd159;"'; }if ($row11['activi_individual']<=4 && $row11['activi_individual']!=0) { echo ' style="background: #d44848;"'; } ?>><?php echo $row11['activi_individual']; ?> </td>
                              <td <?php if ($row11['activi_grupal']>4 && $row11['activi_grupal']<=7 && $row11['activi_grupal']!=0) { echo ' style="background: #cfd159;"'; }if ($row11['activi_grupal']<=4 && $row11['activi_grupal']!=0) { echo ' style="background: #d44848;"'; } ?>><?php echo $row11['activi_grupal']; ?> </td>
                              <td <?php if ($row11['leccion']>4 && $row11['leccion']<=7 && $row11['leccion']!=0) { echo ' style="background: #cfd159;"'; }if ($row11['leccion']<=4 && $row11['leccion']!=0) { echo ' style="background: #d44848;"'; } ?>><?php echo $row11['leccion']; ?> </td>
                              <td <?php if ($row11['aporte']>4 && $row11['aporte']<=7 && $row11['aporte']!=0) { echo ' style="background: #cfd159;"'; }if ($row11['aporte']<=4 && $row11['aporte']!=0) { echo ' style="background: #d44848;"'; } ?>><?php echo $row11['aporte']; ?> </td>
                              <td <?php if ($row11['promedio']>4 && $row11['promedio']<=7 && $row11['promedio']!=0) { echo ' style="background: #cfd159;"'; }if ($row11['promedio']<=4 && $row11['promedio']!=0) { echo ' style="background: #d44848;"'; } ?>><?php echo $row11['promedio']; ?> </td>
                              <?php } ?>
                              </tr>  <tr>
                            <?php
                            }if($cont>0){
                              $wheref=$dato_where ." and ";
                            }

                            $consultax=mysqli_query($con,"SELECT * from asignatura_curso_periodo ACP inner join asignatura_periodo AP on AP.id_asignatura_periodo=ACP.id_asignatura_periodo inner join asignatura A on A.id_asignatura=AP.id_asignatura inner join curso_periodo CP on CP.id_curso_periodo=ACP.id_curso_periodo where ".$wheref." CP.id_curso_periodo='$id_curso_periodo'  ");
                               while($rowx=mysqli_fetch_array($consultax)){ ?>
                                 <td><?php echo $rowx['nombre']; ?> </td>
                                 <td>0.00</td>
                                 <td>0.00</td>
                                 <td>0.00</td>
                                 <td>0.00</td>
                                 <td>0.00</td>
                                 <td>0.00</td>
                             </tr>
                             <?php }
                            ?>  </table>
<?php }  if ($pace=="Promedio" && $quime=="Quimestre1") { ?>
<h1>Quimestre 1</h1>
                            <h2>Promedio Quimestral</h2>
                            <div class="">
                              <table>
                                  <thead>
                                    <tr>
                                      <th >ASIGNNATURA</th>
                                      <th>Promedio</th>
                                      <th>Examen</th>
                                      <th>Nota</th>
                                    </tr>
                                  </thead>
                                    <tr>

                            <?php
                            $dato_where="";
                            $cont=0;

$consulta="SELECT * from asignatura_periodo AP INNER JOIN asignatura A ON A.id_asignatura=AP.id_asignatura INNER JOIN quimestre1 Q1 ON Q1.id_asignatura_periodo=AP.id_asignatura_periodo where AP.id_periodo='$Id_perido' and Q1.id_notas='$id_notas'  ";
$ejec=mysqli_query($con,$consulta);
while ($row=mysqli_fetch_array($ejec)) {
  $id_quimestre1=$row['id_quimestre1'];
  $cont++;
if($cont>1){
$dato_where.=" AND ";
}
$dato_where.="AP.id_asignatura_periodo!='".$row['id_asignatura_periodo']."'";

?> <td><?php echo $row['nombre']; ?> </td> <?php
$examen_finalQ1=$row['examen']*0.2;
$promediofinalQ1=$examen_finalQ1+$row['promedio'];

?>
<td><?php echo $row['promedio']; ?> </td>
<td><?php echo $examen_finalQ1; ?> </td>
<td <?php if ($promediofinalQ1>4 && $promediofinalQ1<=7 && $promediofinalQ1!=0) { echo ' style="background: #cfd159;"'; }if ($promediofinalQ1<=4 && $promediofinalQ1!=0) { echo ' style="background: #d44848;"'; } ?>><?php echo $promediofinalQ1; ?> </td>
</tr><tr>
<?php
}
if($cont>0){
                                $wheref=$dato_where ." and ";
                              }

                              $consultax=mysqli_query($con,"SELECT * from asignatura_curso_periodo ACP inner join asignatura_periodo AP on AP.id_asignatura_periodo=ACP.id_asignatura_periodo inner join asignatura A on A.id_asignatura=AP.id_asignatura inner join curso_periodo CP on CP.id_curso_periodo=ACP.id_curso_periodo where ".$wheref." CP.id_curso_periodo='$id_curso_periodo'  ");
                                 while($rowx=mysqli_fetch_array($consultax)){ ?>
                                   <td><?php echo $rowx['nombre']; ?> </td>
                                   <td>0.00</td>
                                   <td>0.00</td>
                                   <td>0.00</td>
                               </tr>
                               <?php }

?>  </table>
<?php }  if ($pace=="Parcial1" && $quime=="Quimestre2") { ?>

<h1>Quimestre 2</h1>
<h2>parcial 1</h2>
<div class="">
  <table>
      <thead>
        <tr>
          <th >ASIGNNATURA</th>
          <th>Tareas</th>
          <th>Trab. Individual</th>
          <th>Trab. Grupal</th>
          <th>Lecciones</th>
          <th>Prueba Parcial</th>
          <th>Nota</th>
        </tr>
      </thead>
        <tr>

<?php
$dato_where="";
$cont=0;
                          $consulta2="SELECT * from asignatura_periodo AP INNER JOIN asignatura A ON A.id_asignatura=AP.id_asignatura INNER JOIN quimestre2 Q2 ON Q2.id_asignatura_periodo=AP.id_asignatura_periodo where AP.id_periodo='$Id_perido'  and Q2.id_notas='$id_notas' ";
                          $ejec2=mysqli_query($con,$consulta2);
                          while ($row2=mysqli_fetch_array($ejec2)) {
                            $id_quimestre2=$row2['id_quimestre2'];
                            $cont++;
if($cont>1){
$dato_where.=" AND ";
}
$dato_where.="AP.id_asignatura_periodo!='".$row2['id_asignatura_periodo']."'";

                            ?> <td><?php echo $row2['nombre']; ?> </td> <?php

                            $consulta12="SELECT * from  quimestre2 Q2 INNER JOIN parcial1_q2 P1Q2 on P1Q2.id_quimestre2=Q2.id_quimestre2 where  Q2.id_quimestre2='$id_quimestre2' ";
                            $ejec12=mysqli_query($con,$consulta12);
                            while ($row12=mysqli_fetch_array($ejec12)) {
                              ?>
                              <td <?php if ($row12['deber']>4 && $row12['deber']<=7 && $row12['deber']!=0) { echo ' style="background: #cfd159;"'; }if ($row12['deber']<=4 && $row12['deber']!=0) { echo ' style="background: #d44848;"'; } ?>><?php echo $row12['deber']; ?> </td>
                              <td <?php if ($row12['activi_individual']>4 && $row12['activi_individual']<=7 && $row12['activi_individual']!=0) { echo ' style="background: #cfd159;"'; }if ($row12['activi_individual']<=4 && $row12['activi_individual']!=0) { echo ' style="background: #d44848;"'; } ?>><?php echo $row12['activi_individual']; ?> </td>
                              <td <?php if ($row12['activi_grupal']>4 && $row12['activi_grupal']<=7 && $row12['activi_grupal']!=0) { echo ' style="background: #cfd159;"'; }if ($row12['activi_grupal']<=4 && $row12['activi_grupal']!=0) { echo ' style="background: #d44848;"'; } ?>><?php echo $row12['activi_grupal']; ?> </td>
                              <td <?php if ($row12['leccion']>4 && $row12['leccion']<=7 && $row12['leccion']!=0) { echo ' style="background: #cfd159;"'; }if ($row12['leccion']<=4 && $row12['leccion']!=0) { echo ' style="background: #d44848;"'; } ?>><?php echo $row12['leccion']; ?> </td>
                              <td <?php if ($row12['aporte']>4 && $row12['aporte']<=7 && $row12['aporte']!=0) { echo ' style="background: #cfd159;"'; }if ($row12['aporte']<=4 && $row12['aporte']!=0) { echo ' style="background: #d44848;"'; } ?>><?php echo $row12['aporte']; ?> </td>
                              <td <?php if ($row12['promedio']>4 && $row12['promedio']<=7 && $row12['promedio']!=0) { echo ' style="background: #cfd159;"'; }if ($row12['promedio']<=4 && $row12['promedio']!=0) { echo ' style="background: #d44848;"'; } ?>><?php echo $row12['promedio']; ?> </td>
                              <?php } ?>
                              </tr><tr>
                            <?php
                            }if($cont>0){
                                $wheref=$dato_where ." and ";
                              }

                              $consultax=mysqli_query($con,"SELECT * from asignatura_curso_periodo ACP inner join asignatura_periodo AP on AP.id_asignatura_periodo=ACP.id_asignatura_periodo inner join asignatura A on A.id_asignatura=AP.id_asignatura inner join curso_periodo CP on CP.id_curso_periodo=ACP.id_curso_periodo where ".$wheref." CP.id_curso_periodo='$id_curso_periodo'  ");
                                 while($rowx=mysqli_fetch_array($consultax)){ ?>
                                   <td><?php echo $rowx['nombre']; ?> </td>
                                   <td>0.00</td>
                                   <td>0.00</td>
                                   <td>0.00</td>
                                   <td>0.00</td>
                                   <td>0.00</td>
                                   <td>0.00</td>
                               </tr>
                               <?php }

                            ?>  </table>
<?php }  if ($pace=="Parcial2" && $quime=="Quimestre2") { ?>
      <h1>Quimestre 2</h1>
                            <h2>parcial 2</h2>
                            <div class="">
                              <table>
                                  <thead>
                                    <tr>
                                      <th >ASIGNNATURA</th>
                                      <th>Tareas</th>
                                      <th>Trab. Individual</th>
                                      <th>Trab. Grupal</th>
                                      <th>Lecciones</th>
                                      <th>Prueba Parcial</th>
                                      <th>Nota</th>
                                    </tr>
                                  </thead>
                                    <tr>

                            <?php
                            $dato_where="";
$cont=0;


                          $consulta2="SELECT * from asignatura_periodo AP INNER JOIN asignatura A ON A.id_asignatura=AP.id_asignatura INNER JOIN quimestre2 Q2 ON Q2.id_asignatura_periodo=AP.id_asignatura_periodo where AP.id_periodo='$Id_perido'  and Q2.id_notas='$id_notas' ";
                          $ejec2=mysqli_query($con,$consulta2);
                          while ($row2=mysqli_fetch_array($ejec2)) {
                            $id_quimestre2=$row2['id_quimestre2'];
                            $cont++;
if($cont>1){
$dato_where.=" AND ";
}
$dato_where.="AP.id_asignatura_periodo!='".$row2['id_asignatura_periodo']."'";

                            ?> <td><?php echo $row2['nombre']; ?> </td> <?php

                            $consulta12="SELECT * from  quimestre2 Q2 INNER JOIN parcial2_q2 P2Q2 on P2Q2.id_quimestre2=Q2.id_quimestre2 where  Q2.id_quimestre2='$id_quimestre2' ";
                            $ejec12=mysqli_query($con,$consulta12);
                            while ($row12=mysqli_fetch_array($ejec12)) {
                              ?>
                              <td <?php if ($row12['deber']>4 && $row12['deber']<=7 && $row12['deber']!=0) { echo ' style="background: #cfd159;"'; }if ($row12['deber']<=4 && $row12['deber']!=0) { echo ' style="background: #d44848;"'; } ?>><?php echo $row12['deber']; ?> </td>
                              <td <?php if ($row12['activi_individual']>4 && $row12['activi_individual']<=7 && $row12['activi_individual']!=0) { echo ' style="background: #cfd159;"'; }if ($row12['activi_individual']<=4 && $row12['activi_individual']!=0) { echo ' style="background: #d44848;"'; } ?>><?php echo $row12['activi_individual']; ?> </td>
                              <td <?php if ($row12['activi_grupal']>4 && $row12['activi_grupal']<=7 && $row12['activi_grupal']!=0) { echo ' style="background: #cfd159;"'; }if ($row12['activi_grupal']<=4 && $row12['activi_grupal']!=0) { echo ' style="background: #d44848;"'; } ?>><?php echo $row12['activi_grupal']; ?> </td>
                              <td <?php if ($row12['leccion']>4 && $row12['leccion']<=7 && $row12['leccion']!=0) { echo ' style="background: #cfd159;"'; }if ($row12['leccion']<=4 && $row12['leccion']!=0) { echo ' style="background: #d44848;"'; } ?>><?php echo $row12['leccion']; ?> </td>
                              <td <?php if ($row12['aporte']>4 && $row12['aporte']<=7 && $row12['aporte']!=0) { echo ' style="background: #cfd159;"'; }if ($row12['aporte']<=4 && $row12['aporte']!=0) { echo ' style="background: #d44848;"'; } ?>><?php echo $row12['aporte']; ?> </td>
                              <td <?php if ($row12['promedio']>4 && $row12['promedio']<=7 && $row12['promedio']!=0) { echo ' style="background: #cfd159;"'; }if ($row12['promedio']<=4 && $row12['promedio']!=0) { echo ' style="background: #d44848;"'; } ?>><?php echo $row12['promedio']; ?> </td>
                              <?php } ?>
                              </tr><tr>
                            <?php
                            }if($cont>0){
                                $wheref=$dato_where ." and ";
                              }

                              $consultax=mysqli_query($con,"SELECT * from asignatura_curso_periodo ACP inner join asignatura_periodo AP on AP.id_asignatura_periodo=ACP.id_asignatura_periodo inner join asignatura A on A.id_asignatura=AP.id_asignatura inner join curso_periodo CP on CP.id_curso_periodo=ACP.id_curso_periodo where ".$wheref." CP.id_curso_periodo='$id_curso_periodo'  ");
                                 while($rowx=mysqli_fetch_array($consultax)){ ?>
                                   <td><?php echo $rowx['nombre']; ?> </td>
                                   <td>0.00</td>
                                   <td>0.00</td>
                                   <td>0.00</td>
                                   <td>0.00</td>
                                   <td>0.00</td>
                                   <td>0.00</td>
                               </tr>
                               <?php }

                            ?>  </table>
<?php }  if ($pace=="Parcial3" && $quime=="Quimestre2") { ?>
      <h1>Quimestre 2</h1>
                            <h2>parcial 3</h2>
                            <div class="">
                              <table>
                                  <thead>
                                    <tr>
                                      <th >ASIGNNATURA</th>
                                      <th>Tareas</th>
                                      <th>Trab. Individual</th>
                                      <th>Trab. Grupal</th>
                                      <th>Lecciones</th>
                                      <th>Prueba Parcial</th>
                                      <th>Nota</th>
                                    </tr>
                                  </thead>
                                    <tr>

                            <?php
                            $dato_where="";
$cont=0;

                          $consulta2="SELECT * from asignatura_periodo AP INNER JOIN asignatura A ON A.id_asignatura=AP.id_asignatura INNER JOIN quimestre2 Q2 ON Q2.id_asignatura_periodo=AP.id_asignatura_periodo where AP.id_periodo='$Id_perido'  and Q2.id_notas='$id_notas' ";
                          $ejec2=mysqli_query($con,$consulta2);
                          while ($row2=mysqli_fetch_array($ejec2)) {
                            $id_quimestre2=$row2['id_quimestre2'];
                            $cont++;
if($cont>1){
$dato_where.=" AND ";
}
$dato_where.="AP.id_asignatura_periodo!='".$row2['id_asignatura_periodo']."'";

                            ?> <td><?php echo $row2['nombre']; ?> </td> <?php

                            $consulta12="SELECT * from  quimestre2 Q2 INNER JOIN parcial3_q2 P3Q2 on P3Q2.id_quimestre2=Q2.id_quimestre2 where  Q2.id_quimestre2='$id_quimestre2' ";
                            $ejec12=mysqli_query($con,$consulta12);
                            while ($row12=mysqli_fetch_array($ejec12)) {
                              ?>
                              <td <?php if ($row12['deber']>4 && $row12['deber']<=7 && $row12['deber']!=0) { echo ' style="background: #cfd159;"'; }if ($row12['deber']<=4 && $row12['deber']!=0) { echo ' style="background: #d44848;"'; } ?>><?php echo $row12['deber']; ?> </td>
                              <td <?php if ($row12['activi_individual']>4 && $row12['activi_individual']<=7 && $row12['activi_individual']!=0) { echo ' style="background: #cfd159;"'; }if ($row12['activi_individual']<=4 && $row12['activi_individual']!=0) { echo ' style="background: #d44848;"'; } ?>><?php echo $row12['activi_individual']; ?> </td>
                              <td <?php if ($row12['activi_grupal']>4 && $row12['activi_grupal']<=7 && $row12['activi_grupal']!=0) { echo ' style="background: #cfd159;"'; }if ($row12['activi_grupal']<=4 && $row12['activi_grupal']!=0) { echo ' style="background: #d44848;"'; } ?>><?php echo $row12['activi_grupal']; ?> </td>
                              <td <?php if ($row12['leccion']>4 && $row12['leccion']<=7 && $row12['leccion']!=0) { echo ' style="background: #cfd159;"'; }if ($row12['leccion']<=4 && $row12['leccion']!=0) { echo ' style="background: #d44848;"'; } ?>><?php echo $row12['leccion']; ?> </td>
                              <td <?php if ($row12['aporte']>4 && $row12['aporte']<=7 && $row12['aporte']!=0) { echo ' style="background: #cfd159;"'; }if ($row12['aporte']<=4 && $row12['aporte']!=0) { echo ' style="background: #d44848;"'; } ?>><?php echo $row12['aporte']; ?> </td>
                              <td <?php if ($row12['promedio']>4 && $row12['promedio']<=7 && $row12['promedio']!=0) { echo ' style="background: #cfd159;"'; }if ($row12['promedio']<=4 && $row12['promedio']!=0) { echo ' style="background: #d44848;"'; } ?>><?php echo $row12['promedio']; ?> </td>
                              <?php } ?>
                              </tr>
                            <?php
                          }
                          if($cont>0){
                                $wheref=$dato_where ." and ";
                              }

                              $consultax=mysqli_query($con,"SELECT * from asignatura_curso_periodo ACP inner join asignatura_periodo AP on AP.id_asignatura_periodo=ACP.id_asignatura_periodo inner join asignatura A on A.id_asignatura=AP.id_asignatura inner join curso_periodo CP on CP.id_curso_periodo=ACP.id_curso_periodo where ".$wheref." CP.id_curso_periodo='$id_curso_periodo'  ");
                                 while($rowx=mysqli_fetch_array($consultax)){ ?>
                                   <td><?php echo $rowx['nombre']; ?> </td>
                                   <td>0.00</td>
                                   <td>0.00</td>
                                   <td>0.00</td>
                                   <td>0.00</td>
                                   <td>0.00</td>
                                   <td>0.00</td>
                               </tr>
                               <?php }

                          ?></table>
<?php }  if ($pace=="Promedio" && $quime=="Quimestre2") { ?>
      <h1>Quimestre 2</h1>
                         <h2>Promedio Quimestral</h2>
                         <div class="">
                           <table>
                               <thead>
                                 <tr>
                                   <th >ASIGNNATURA</th>
                                   <th>Promedio</th>
                                   <th>Examen</th>
                                   <th>Nota</th>
                                 </tr>
                               </thead>
                                 <tr>
                         <?php
                         $dato_where="";
                         $cont=0;
                          $consulta="SELECT * from asignatura_periodo AP INNER JOIN asignatura A ON A.id_asignatura=AP.id_asignatura INNER JOIN quimestre2 Q2 ON Q2.id_asignatura_periodo=AP.id_asignatura_periodo where AP.id_periodo='$Id_perido' and Q2.id_notas='$id_notas'  ";
                          $ejec=mysqli_query($con,$consulta);
                          while ($row=mysqli_fetch_array($ejec)) {
                            $id_quimestre2=$row['id_quimestre2'];
                            $cont++;
if($cont>1){
$dato_where.=" AND ";
}
$dato_where.="AP.id_asignatura_periodo!='".$row['id_asignatura_periodo']."'";

                          ?> <td><?php echo $row['nombre']; ?> </td> <?php
                          $examen_finalQ1=$row['examen']*0.2;
                          $promediofinalQ1=$examen_finalQ1+$row['promedio'];

                          ?>
                          <td><?php echo $row['promedio']; ?> </td>
                          <td><?php echo $examen_finalQ1; ?> </td>
                          <td <?php if ($promediofinalQ1>4 && $promediofinalQ1<=7 && $promediofinalQ1!=0) { echo ' style="background: #cfd159;"'; }if ($promediofinalQ1<=4 && $promediofinalQ1!=0) { echo ' style="background: #d44848;"'; } ?>><?php echo $promediofinalQ1; ?> </td>
                          </tr>  <tr>
                          <?php
                          }
                          if($cont>0){
                                $wheref=$dato_where ." and ";
                              }

                              $consultax=mysqli_query($con,"SELECT * from asignatura_curso_periodo ACP inner join asignatura_periodo AP on AP.id_asignatura_periodo=ACP.id_asignatura_periodo inner join asignatura A on A.id_asignatura=AP.id_asignatura inner join curso_periodo CP on CP.id_curso_periodo=ACP.id_curso_periodo where ".$wheref." CP.id_curso_periodo='$id_curso_periodo'  ");
                                 while($rowx=mysqli_fetch_array($consultax)){ ?>
                                   <td><?php echo $rowx['nombre']; ?> </td>
                                   <td>0.00</td>
                                   <td>0.00</td>
                                   <td>0.00</td>
                               </tr>
                               <?php }

                          ?>  </table>


<?php }  if ($quime=="Promedio Final") { ?>
                          <h1>Promedio del Periodo Lectivo</h1>
                          <div class="">
                            <table>
                                <thead>
                                  <tr>
                                    <th >ASIGNNATURA</th>
                                    <th>Quimestre 1</th>
                                    <th>Quimestre 2</th>
                                    <th>Promedio</th>
                                    <th>Promedio Equivalente</th>
                                  </tr>
                                </thead>
                                  <tr>
                          <?php
                          $dato_where="";
                          $cont=0;
                           $consulta="SELECT * from asignatura_periodo AP INNER JOIN asignatura A ON A.id_asignatura=AP.id_asignatura INNER JOIN promedio PR ON PR.id_asignatura_periodo=AP.id_asignatura_periodo where AP.id_periodo='$Id_perido' and PR.id_notas='$id_notas'  ";
                           $ejec=mysqli_query($con,$consulta);
                           while ($row=mysqli_fetch_array($ejec)) {
                             $cont++;
 if($cont>1){
 $dato_where.=" AND ";
 }
 $dato_where.="AP.id_asignatura_periodo!='".$row['id_asignatura_periodo']."'";

                           ?> <td><?php echo $row['nombre']; ?> </td>
                           <td><?php echo $row['q1']; ?> </td>
                           <td><?php echo $row['q2']; ?> </td>
                           <td <?php if ($row['promedio']>4 && $row['promedio']<=7 && $row['promedio']!=0) { echo ' style="background: #cfd159;"'; }if ($row['promedio']<=4 && $row['promedio']!=0) { echo ' style="background: #d44848;"'; } ?>><?php echo $row['promedio']; ?> </td>
                           <td><?php echo $row['promedio_equivalente']; ?> </td>
                           </tr>  <tr>
                           <?php
                           }
                           if($cont>0){
                                 $wheref=$dato_where ." and ";
                               }

                               $consultax=mysqli_query($con,"SELECT * from asignatura_curso_periodo ACP inner join asignatura_periodo AP on AP.id_asignatura_periodo=ACP.id_asignatura_periodo inner join asignatura A on A.id_asignatura=AP.id_asignatura inner join curso_periodo CP on CP.id_curso_periodo=ACP.id_curso_periodo where ".$wheref." CP.id_curso_periodo='$id_curso_periodo'  ");
                                  while($rowx=mysqli_fetch_array($consultax)){ ?>
                                    <td><?php echo $rowx['nombre']; ?> </td>
                                    <td>0.00</td>
                                    <td>0.00</td>
                                    <td>0.00</td>
                                    <td>0.00</td>
                                </tr>
                                <?php }

                           ?>  </table>

                          <?php

}


                            // $consulta="SELECT * from  quimestre1 Q1 INNER JOIN parcial1_q1 P1Q1 on P1Q1.id_quimestre1=Q1.id_quimestre1 where  Q1.id_quimestre1='$id_quimestre1' ";
                            // $consulta="SELECT * from  quimestre1 Q1 INNER JOIN parcial2_q1 P2Q1 on P2Q1.id_quimestre1=Q1.id_quimestre1 where  Q1.id_quimestre1='$id_quimestre1' ";
                            // $consulta="SELECT * from  quimestre1 Q1 INNER JOIN parcial3_q1 P3Q1 on P3Q1.id_quimestre1=Q1.id_quimestre1 where  Q1.id_quimestre1='$id_quimestre1' ";
                            // $consulta="SELECT * from  quimestre1 Q1 INNER JOIN promedio_q1 PRQ1 on PRQ1.id_quimestre1=Q1.id_quimestre1 where  Q1.id_quimestre1='$id_quimestre1' ";
                            //
                            // $consulta="SELECT * from  quimestre1 Q1 INNER JOIN parcial1_q2 P1Q2 on P1Q2.id_quimestre1=Q1.id_quimestre1 where  Q1.id_quimestre1='$id_quimestre2' ";
                            // $consulta="SELECT * from  quimestre1 Q1 INNER JOIN parcial2_q2 P2Q2 on P2Q2.id_quimestre1=Q1.id_quimestre1 where  Q1.id_quimestre1='$id_quimestre2' ";
                            // $consulta="SELECT * from  quimestre1 Q1 INNER JOIN parcial3_q2 P3Q2 on P3Q2.id_quimestre1=Q1.id_quimestre1 where  Q1.id_quimestre1='$id_quimestre2' ";
                            // $consulta="SELECT * from  quimestre1 Q1 INNER JOIN promedio_q2 PRQ2 on PRQ2.id_quimestre1=Q1.id_quimestre1 where  Q1.id_quimestre1='$id_quimestre2' ";



                           ?>
                              <!-- /ajax -->
                          </div>
                      </div>

                  </div>
              </div>

</div>
<br><br><br><br><br>
    <!-- /pagebr content -->
<?php include "footer.php" ?>
