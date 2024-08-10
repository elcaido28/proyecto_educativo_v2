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
                          <h2>Lista de Representantes respectivamente con sus Estudintes </h2>
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

                              <script src="js/funcions.js" charset="utf-8"></script>
                            </div>  </div>    <!-- ajax -->

<h1>Lista Representantes - Estudiantes</h1>

<div class="">


<?php
                        $dato_where="";
                        $cont=0;
                          $consulta="SELECT DISTINCT cedula , nombres,apellidos,direccion,email from representante ";
                          $ejec=mysqli_query($con,$consulta);
                          while ($row=mysqli_fetch_array($ejec)) {     ?>
                            <table>
                                <thead>
                                  <tr>
                                    <th >NOMBRE REPRESENTANTE</th>
                                    <th>CEDULA</th>
                                    <th>DIRECCIÓN</th>
                                    <th>CORREO</th>
                                  </tr>
                                </thead>
                                  <tr>
                            <td><?php echo $row['nombres']." ".$row['apellidos']; ?> </td>
                            <td><?php echo $row['cedula']; ?> </td>
                            <td><?php echo $row['direccion']; ?> </td>
                            <td><?php echo $row['email']; ?> </td>
                                </tr>
                                <tr>
                                <td style="background: #45738e;">NOMBRES DEL ESTUDIANE</td>
                                <td style="background: #45738e;">CEDULA</td>
                                <td style="background: #45738e;">DIRECCION</td>
                                <td style="background: #45738e;">CORREO</td>
                                </tr>
                            <?php
                            $ci=$row['cedula'];
                            $consul="SELECT E.nombres,E.apellidos,E.cedula,E.direccion,E.email from estudiante E inner join matricula M on M.id_estudiante=E.id_estudiante inner join representante R on R.id_representante=M.id_representante where R.cedula='$ci' and M.id_estado!='2' ";
                            $ejec2=mysqli_query($con,$consul);
                            while ($row2=mysqli_fetch_array($ejec2)) {     ?>
                              <tr>
                              <td><?php echo $row2['nombres']." ".$row2['apellidos']; ?> </td>
                              <td><?php echo $row2['cedula']; ?> </td>
                              <td><?php echo $row2['direccion']; ?> </td>
                              <td><?php echo $row2['email']; ?> </td>
                              </tr>

                           <?php  } ?>
<br><br><br>
                      <?php  } ?> </table>

<!--
                          <?php /*



                          $consultax=mysqli_query($con,"SELECT * from estudiantes E inner join representante R on R.id_estudiante=E.id_estudiante where R.id_representante='$id_curso_periodo'  ");
                             while($rowx=mysqli_fetch_array($consultax)){ ?>

                               <td><?php echo $rowx['nombre']; ?> </td>
                               <td>0.00</td>
                               <td>0.00</td>
                               <td>0.00</td>
                               <td>0.00</td>
                               <td>0.00</td>
                               <td>0.00</td>
                           </tr>
                           <?php } -->

*/
?>  </table>


                              <!-- /ajax -->
                          </div>
                      </div>

                  </div>
              </div>

</div>
<br><br><br><br><br>
    <!-- /pagebr content -->
<?php include "footer.php" ?>
