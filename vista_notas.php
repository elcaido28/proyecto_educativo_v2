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
                          <h2>NOTAS </h2>
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
                              <!-- ajax -->
                              <!-- <form id="formulario" class="formulario" action="guardar_diario.php" method="post" enctype="multipart/form-data">
                                <fieldset class="fieldset_normal">

                                </fieldset>
                              </form> -->
                              <script src="js/funcions.js" charset="utf-8"></script>
                              <!-- /ajax -->
                          </div>
                      </div>
                      <script src="js/jquery/dist/jquery.min.js"></script>
                      <!-- <script src="jquery.dataTables.min.js" charset="utf-8"></script> -->

                      <div class="">
                        <table>
                            <thead>
                              <tr>
                                <th>No.</th>
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
                                $consulta=mysqli_query($con,"SELECT * from diario D INNER JOIN curso_periodo CP ON D.id_curso_periodo=CP.id_curso_periodo INNER JOIN curso C ON CP.id_curso=C.id_curso INNER JOIN paralelo P ON P.id_paralelo=CP.id_paralelo");
                                 while($row=mysqli_fetch_array($consulta)){
                              ?>
                                <td><?php echo $row['fecha']; ?> </td>
                                <td>educacion cultutral y artistica</td>
                                <td><?php echo $row['curso']; ?> </td>
                                <td><?php echo $row['paralelo']; ?> </td>
                                <td><?php echo $row['curso']; ?> </td>
                                <td><?php echo $row['paralelo']; ?> </td>
                                <td><?php echo $row['curso']; ?> </td>
                                <td><div class="cont_tbn_tb"><?php echo $row['paralelo']; ?></div></td>
                              </tr>
                                <?php } ?>
                        </table>
                      </div>
                    </div>
              </div>
            </div>
        </div>
    </div><!-- /page content -->

<?php include "footer.php" ?>
