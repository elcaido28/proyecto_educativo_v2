<?php
    session_start();
    include "config/config.php";
    $title="Sistema Educativo";
    if(empty($_SESSION['ID_usu'])){
       header("Location: index.php");
    }
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
?>
    <div class="right_col" role=""> <!-- page content -->
        <div class="">
            <div class="page-title">


              <div class="col-md-12 col-sm-12 col-xs-12">

                  <div class="x_panel">
                      <div class="x_title">
                          <h2>Reporte por curso </h2>
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


                            <form id="formulario" class="formulario" action="reportes.php" method="post" enctype="multipart/form-data">
                              <fieldset class="fieldset_normal">
                                <h2>Ingrese asignacion</h2>
                                <hr>
                                <div class="cont_cajas_peque">
                                  <label class="etiq_caja">Periodos</label>
                                  <select class="F_combo" name="periodo" required ><option value="" >-SELECCIONE-</option>
                                 <?php  $consulta4=mysqli_query($con,"SELECT * from periodo");
                                    while($row4=mysqli_fetch_array($consulta4)){
                                    echo "<option value='".$row4['id_periodo']."'>"; echo $row4['periodo']; echo "</option>"; } ?> </select>
                                </div>
                                <div class="cont_cajas_peque">
                                  <label class="etiq_caja">cursos</label>
                                  <select class="F_combo" name="cursos" required ><option value="" >-SELECCIONE-</option>
                                 <?php  $consulta4=mysqli_query($con,"SELECT * from curso_periodo CP inner join curso C on C.id_curso=CP.id_curso inner join paralelo P on P.id_paralelo=CP.id_paralelo");
                                    while($row4=mysqli_fetch_array($consulta4)){
                                    echo "<option value='".$row4['id_curso_periodo']."'>"; echo $row4['curso']." ".$row4['paralelo']; echo "</option>"; } ?> </select>
                                </div>
                                <div class="cont_cajas">
                                  <label class="etiq_caja">Tipo de Reporte</label>
                                  <select class="F_combo" name="tipo_repor" required ><option value="" >-SELECCIONE-</option> <option value="minima">Nota minima</option> <option value="maxima">Nota maxima</option> <option value="conducta">Conducta minima</option></select>
                                </div>



                                <div class="conten_botom_formu">
                                  <input  type="submit" name="enviar" value="Agregar" class="acao">
                                  <a href="" class="cancelar">Cancelar</a>
                                </div>
                              </fieldset>

                            </form>

                              <script src="js/funcions.js" charset="utf-8"></script>
                            </div>  </div>    <!-- ajax -->



                              <!-- /ajax -->
                          </div>
                      </div>

                  </div>
              </div>

</div>
<br><br><br><br><br>
    <!-- /pagebr content -->
<?php include "footer.php" ?>
