
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
                          <h2>Calificaciones - Paso 3</h2>
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
                                    <th>CEDULA</th>
                                    <th>MONBRES DEL ESTUDIANTE</th>
                                    <th>SIGUIENTE</th>
                                    </tr>
                                    </thead>
                                    <tr>
                                      <?php
                                      $periodo=$_REQUEST['id_periodo'];
                                      $curso_p=$_REQUEST['id_curso'];
                                      $materia=$_REQUEST['id_materia'];
                                    $consulta=mysqli_query($con,"SELECT * from matricula M inner join estudiante E on E.id_estudiante=M.id_estudiante inner join curso_periodo CP on CP.id_curso_periodo=M.id_curso_periodo where M.id_curso_periodo='$curso_p'  ");
                                       while($row=mysqli_fetch_array($consulta)){
                                      ?>
                                            <td><?php echo $row['cedula'] ?> </td>
                                            <td><?php echo $row['nombres']." ". $row['apellidos'] ?> </td>

                                            <td> <a href="ingreso_calificacion4.php?id_estudiante=<?php echo $row['id_estudiante']; ?>&id_materia=<?php echo $materia; ?>&id_curso=<?php echo $curso_p; ?>&id_periodo=<?php echo $periodo; ?>"><button type="button" title="Modificar" class="modificar" name="button"><i class="far fa-share-square"></i></button></a> </td>

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
