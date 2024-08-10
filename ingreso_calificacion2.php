
<?php
    $title ="Sistema Educativo";
    include "head.php";
    include "sidebar.php";
    include('config/config.php');
?>
    <div class="right_col" role=""> <!-- page content -->
        <div class="">
            <div class="page-title">


              <div class="col-md-12 col-sm-12 col-xs-12">

                  <div class="x_panel">
                      <div class="x_title">
                          <h2>Calificaciones - Paso 2</h2>
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
                          <script src="js/jquery/dist/jquery.min.js"></script>
                            <script src="jquery.dataTables.min.js" charset="utf-8"></script>
                          <div class="cont_tabla2">
                              <table class="tabla" >
                                  <thead>
                                    <tr>
                                    <th>ASIGNATURA</th>
                                    <th>SIGUIENTE</th>
                                    </tr>
                                    </thead>
                                    <tr>
                                      <?php
                                      if (isset($_POST['periodo']) && isset($_POST['periodo'])) {
                                        $_SESSION['PERIODO']=$_POST['periodo'];
                                        $_SESSION['CURSO']=$_POST['curso'];
                                        $periodo=$_SESSION['PERIODO'];
                                        $curso_p=$_SESSION['CURSO'];
                                      }else{
                                      $periodo=$_SESSION['PERIODO'];
                                      $curso_p=$_SESSION['CURSO'];

                                    }
                                    $consulta=mysqli_query($con,"SELECT * from asignatura_curso_periodo ACP inner join asignatura_periodo AP on AP.id_asignatura_periodo=ACP.id_asignatura_periodo inner join asignatura A on A.id_asignatura=AP.id_asignatura inner join curso_periodo CP on CP.id_curso_periodo=ACP.id_curso_periodo where CP.id_curso_periodo='$curso_p'  ");
                                       while($row=mysqli_fetch_array($consulta)){
                                      ?>

                                            <td><?php echo $row['nombre'] ?> </td>
                                            <td> <a href="ingreso_calificacion3.php?id_materia=<?php echo $row['id_asignatura_periodo']; ?>&id_curso=<?php echo $curso_p; ?>&id_periodo=<?php echo $periodo; ?>"><button type="button" title="Modificar" class="modificar" name="button"><i class="far fa-share-square"></i></button></a> </td>

                                      </tr>

                                      <?php
                                            }
                                      ?>
                              </table>
                            </div>
                            <script>
                              $(document).ready( function () {
                              $('.tabla').DataTable();
                                } );
                            </script>
                              <!-- /ajax -->
                          </div>
                      </div>
                    <!-- TABLA aqui -->
                  </div>
              </div>




            </div>
        </div>
    </div><!-- /page content -->

<?php include "footer.php" ?>
