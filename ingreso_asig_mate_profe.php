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
                          <h2>Registrar Asignaturas a Profesor </h2>
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

                              <div class="cont_tabla">
                                <table class="tabla" >
                                    <thead>
                                      <tr>
                                      <th>ASIGNATURA</th>
                                      <th>ASIG. MATERIAS</th>
                                      </tr>
                                      </thead>
                                      <tr>
                                        <?php
                                        $id_profe=$_REQUEST['id'];
                                        $dato_where="";
                                        $cont=0;
                                        $consulta3=mysqli_query($con,"SELECT * from materia_profesor WHERE id_profesor='$id_profe' ORDER BY id_materia_profesor ASC ");
                                         while($row3=mysqli_fetch_array($consulta3)){
                                           $cont++;
                                           if($cont>1){
                                             $dato_where.=" AND ";
                                           }
                                           $dato_where.="id_asignatura!='".$row3['id_asignatura']."'";
                                         }

                                         if($cont>0){
                                           $wheref=" where ".$dato_where;
                                         }else{ $wheref=""; }
                                        $consulta=mysqli_query($con,"SELECT * from asignatura ".$wheref."  ORDER BY nombre DESC ");
                                         while($row=mysqli_fetch_array($consulta)){
                                        ?>
                                              <td><?php echo $row['nombre'] ?> </td>
                                              <td> <a href="guardar_asig_mate_profe.php?id_tipo_materia=<?php echo $row['id_asignatura']; ?>&id_pro=<?php echo $id_profe; ?>"><button type="button" title="Asignar" class="modificar" name="button"><i class="fas fa-check"></i></button></a> </td>

                                  </tr>
                                  <script type="text/javascript">
                                    $('.eliminar').click(function(e){
                                     if (confirm("¿Está segur@ de ELIMINAR?")){
                                        document.location.href="eliminar_usuario.php?id=<?php echo $row['id_usuarios'];?>";
                                      }else{
                                        document.location.href="proyectos.php";
                                      }
                                    })
                                  </script>


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
                      <script src="js/jquery/dist/jquery.min.js"></script>
                      <script src="jquery.dataTables.min.js" charset="utf-8"></script>

                      <div class="cont_tabla">
                        <table class="tabla" >
                            <thead>
                              <tr>
                              <th>PROFESOR</th>
                              <th>ASIGNATURA</th>
                              <th>QUITAR</th>
                              </tr>
                              </thead>
                              <tr>
                                <?php

                                $consulta=mysqli_query($con,"SELECT * from materia_profesor MP inner join profesor P on P.id_profesor=MP.id_profesor inner join asignatura A on A.id_asignatura=MP.id_asignatura where P.id_profesor='$id_profe' ORDER BY A.nombre DESC ");
                                 while($row=mysqli_fetch_array($consulta)){
                                ?>

                                      <td><?php echo $row['nombres']." ". $row['apellidos']; ?> </td>
                                      <td><?php echo $row['nombre']; ?> </td>

                                      <td> <div class="cont_tbn_tb"><button type="button" class="eliminar" title="Eliminar" name="button"><i class="far fa-trash-alt"> </i></button></div></td>
                          </tr>
                          <script type="text/javascript">
                            $('.eliminar').click(function(e){
                             if (confirm("¿Está segur@ de ELIMINAR?")){
                                document.location.href="eliminar_asignatura.php?id=<?php echo $row['id_materia_profesor'];?>&idprof=<?php echo $id_profe; ?>";
                              }else{
                                document.location.href="proyectos.php";
                              }
                            })
                          </script>


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
                  </div>
              </div>




            </div>
        </div>
    </div><!-- /page content -->

<?php include "footer.php" ?>
