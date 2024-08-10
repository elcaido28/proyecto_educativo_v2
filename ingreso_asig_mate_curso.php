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
                          <h2>Registrar de Asignaturas a curso </h2>
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
                                      <th>PERIODO</th>
                                      <th>ASIGNATURA</th>
                                      <th>TIPO</th>
                                      <th>AGREGAR MATERIAS</th>
                                      </tr>
                                      </thead>
                                      <tr>
                                        <?php
                                        $id_cursoP=$_REQUEST['id_curso_peri'];
                                        $dato_where="";
                                        $wheref="";
                                        $cont=0;
                                        $consulta3=mysqli_query($con,"SELECT * from asignatura_curso_periodo WHERE id_curso_periodo='$id_cursoP' ORDER BY id_asignatura_periodo ASC ");
                                         while($row3=mysqli_fetch_array($consulta3)){
                                           $cont++;
                                           if($cont>1){
                                             $dato_where.=" AND ";
                                           }
                                           $dato_where.="AP.id_asignatura_periodo!='".$row3['id_asignatura_periodo']."'";
                                         }

                                         if($cont>0){
                                           $wheref=" where ".$dato_where;
                                         }
                                         $consulta=mysqli_query($con,"SELECT * from asignatura_periodo AP inner join asignatura A on A.id_asignatura=AP.id_asignatura inner join tipo_materia TM on TM.id_tipo_materia=A.id_tipo_materia inner join periodo P on P.id_periodo=AP.id_periodo  ".$wheref." ORDER BY A.nombre ASC  ");
                                         while($row=mysqli_fetch_array($consulta)){
                                        ?>
                                        <td><?php echo $row['periodo'] ?> </td>
                                        <td><?php echo $row['nombre'] ?> </td>
                                        <td><?php echo $row['tipo_mate'] ?> </td>
                                        <td> <a href="guardar_asig_mate_curso.php?id_asignatura_periodo=<?php echo $row['id_asignatura_periodo']; ?>&id_cursoP=<?php echo $id_cursoP; ?>"><button type="button" title="Modificar" class="modificar" name="button"><i class="fas fa-check"></i></button></a> </td>

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

                                $consulta=mysqli_query($con,"SELECT * from asignatura_curso_periodo MP  inner join asignatura_periodo AP on AP.id_asignatura_periodo=MP.id_asignatura_periodo inner join asignatura A on A.id_asignatura=AP.id_asignatura  inner join curso_periodo CP on CP.id_curso_periodo=MP.id_curso_periodo  inner join curso C on C.id_curso=CP.id_curso where CP.id_curso_periodo='$id_cursoP' ORDER BY A.nombre DESC ");
                                 while($row=mysqli_fetch_array($consulta)){
                                ?>

                                      <td><?php echo $row['curso']; ?> </td>
                                      <td><?php echo $row['nombre']; ?> </td>

                                      <td> <div class="cont_tbn_tb"><!-- <button type="button" id="<?php echo $row['id_usuarios'];?>" title="Modificar" class="modificar" name="button"><i class="far fa-edit"> </i></button> -->
                                      <button type="button" class="eliminar" title="Eliminar" name="button"><i class="far fa-trash-alt"> </i></button></div></td>
                          </tr>
                          <script type="text/javascript">
                            $('.eliminar').click(function(e){
                             if (confirm("¿Está segur@ de ELIMINAR?")){
                                document.location.href="eliminar_asignatura_curso.php?id=<?php echo $row['id_asignatura_curso_periodo'];?>&idcur=<?php echo $id_cursoP ?>";
                              }else{
                                document.location.href="ingreso_asig_mate_curso.php?id_curso_peri=<?php echo $id_cursoP ?>";
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
