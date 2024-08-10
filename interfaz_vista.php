<?php
    $title ="Sistema Educativo";
    include "head.php";
    include "sidebar.php";
    include('config/config.php');

    // $ida=$_REQUEST['id'];
    if (isset($_SESSION['ID_rep'])) {
      $idrepresentante=$_SESSION['ID_rep'];
      $cons="SELECT * FROM matricula M INNER JOIN curso_periodo CP ON M.id_curso_periodo=CP.id_curso_periodo INNER JOIN curso C ON CP.id_curso=C.id_curso INNER JOIN paralelo P ON CP.id_paralelo=P.id_paralelo WHERE M.id_representante='$idrepresentante'";
    }
    if (isset($_SESSION['ID_estu'])) {
      $idestudiante=$_SESSION['ID_estu'];
      $cons="SELECT * FROM matricula M INNER JOIN curso_periodo CP ON M.id_curso_periodo=CP.id_curso_periodo INNER JOIN curso C ON CP.id_curso=C.id_curso INNER JOIN paralelo P ON CP.id_paralelo=P.id_paralelo WHERE M.id_estudiante='$idestudiante'";
    }
  
    $ejec=mysqli_query($con,$cons);
    $row=mysqli_fetch_array($ejec);
    $curso=$row['id_curso'];
    $paralelo=$row['id_paralelo'];

    $consulta="SELECT * from diario D INNER JOIN curso_periodo CP ON D.id_curso_periodo=CP.id_curso_periodo INNER JOIN curso C ON CP.id_curso=C.id_curso INNER JOIN paralelo P ON P.id_paralelo=CP.id_paralelo WHERE CP.id_curso='$curso' AND CP.id_paralelo='$paralelo' ORDER BY D.id_diario DESC";
    $ejec2=mysqli_query($con,$consulta);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
  <link href="css/custom.min.css" rel="stylesheet">
        <link rel="stylesheet" href="css/esti_formu.css">
</head>
<body>
    <div class="right_col" role="">
        <div class="">
            <div class="page-title">


              <div class="col-md-12 col-sm-12 col-xs-12">

                  <div class="x_panel">
                      <div class="x_title">
                          <h2>Diario del Estudiante</h2>
                          <ul class="nav navbar-right panel_toolbox">
                              <!-- <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                              </li>
                              <li><a class="close-link"><i class="fa fa-close"></i></a>
                              </li> -->
                          </ul>
                          <div class="clearfix"></div>
                      </div>


                      <!-- form search -->


                      <!-- end form search -->

                      <div class="x_content">
                          <div class="table-responsive">
                              <!-- ajax -->
                              <?php while ($row2=mysqli_fetch_array($ejec2)) { ?>
                              <div id="formulario" class="formulario">

                                <fieldset class="fieldset_normal">
                                  <h2>Diario del dia <?php echo $row2['fecha']; ?></h2>
                                  <div class="cont_cajas_peque">
                                    <!-- <label class="etiq_caja">Fecha</label>
                                    <input type="text" name="fecha" value="<?php $fecha=date('Y-m-d'); echo $fecha; ?>" placeholder=""> -->
                                  </div>
                                  <!-- <div class="cont_cajas_peque">
                                    <label class="etiq_caja">Foto</label>
                                    <input type="file" name="foto" value="" placeholder="">
                                  </div> -->
                                  <div class="cont_cajas_peque">
                                  </div>
                                  <div class="cont_cajas">
                                    <textarea name="" id="" cols="30" rows="10" disabled><?php echo $row2['descripcion']; ?></textarea>

                                  </div>
                                  <!-- <div class="conten_botom_formu">
                                    <input  type="submit" name="enviar" value="Guardar" class="acao">
                                    <a href="" class="cancelar">Cancelar</a>
                                  </div> -->
                                </fieldset>
                                <?php } ?>
                              </div>
                              <script src="js/funcions.js" charset="utf-8"></script>
                              <!-- /ajax -->
                          </div>
                      </div>
                      <script src="js/jquery/dist/jquery.min.js"></script>
                      <script src="jquery.dataTables.min.js" charset="utf-8"></script>
                  </div>
              </div>
            </div>
        </div>
    </div><!-- /page content -->

<?php include "footer.php" ?>
