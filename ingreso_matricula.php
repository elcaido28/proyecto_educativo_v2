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
                          <h2>Matriculación de estudiantes </h2>
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
                      <?php
                      $num_consulta=mysqli_num_rows(mysqli_query($con,"SELECT * from matricula ORDER BY fecha DESC "));
                       $num_consulta=$num_consulta+1;
                       ?>
                      <div class="x_content">
                          <div class="table-responsive">
                              <!-- ajax -->
                              <form id="formulario" class="formulario" action="guardar_matricula.php" method="post" enctype="multipart/form-data">
                                <fieldset class="fieldset_normal">
                                  <h2>Ingrese Estudiante</h2>
                                  <hr>
                                  <!-- <h3>algunas configuraciones</h3> -->
                                  <div class="cont_cajas_peque">
                                    <label class="etiq_caja">Nº Matricula</label>
                                    <input type="text" name="num_matri" value="<?php echo 'UEAII-'.date('Y-m-d').'-0'.$num_consulta; ?>" placeholder="" onkeypress="return enable(event)" onpaste="return false">
                                  </div>
                                  <div class="cont_cajas_peque">
                                    <label class="etiq_caja">Periodos</label>
                                    <select class="F_combo" id="periodo" name="periodo" required ><option value="" >-SELECCIONE-</option>
                                   <?php  $consulta4=mysqli_query($con,"SELECT * from periodo");
                                      while($row4=mysqli_fetch_array($consulta4)){
                                      echo "<option value='".$row4['id_periodo']."'>"; echo $row4['periodo']; echo "</option>"; } ?> </select>
                                  </div>
                                 <div class="cont_cajas_peque">
                                    <label class="etiq_caja">Estudiante</label>
                                    <select class="F_combo" id="estudiante" name="estudiante" required ><option value="" >-SELECCIONE-</option>
                                   <?php  $consulta4=mysqli_query($con,"SELECT * from estudiante WHERE id_estado='1'");
                                      while($row4=mysqli_fetch_array($consulta4)){
                                      echo "<option value='".$row4['id_estudiante']."'>"; echo $row4['nombres']." ". $row4['apellidos']; echo "</option>"; } ?> </select>
                                  </div>


                                  <div class="cont_cajas_peque">
                                    <label class="etiq_caja">Representante</label>
                                    <input type="text" id="representa" name="representante" value="" placeholder="" onkeypress="return enable(event)" onpaste="return false">
                                  </div>

                                  <div class="cont_cajas_peque" id="cont_comb_curso">
                                     <label class="etiq_caja">Curso</label>
                                     <select class="F_combo" name="curso" id="matri_curso_peri" required ><option value="" >-SELECCIONE-</option></select>
                                   </div>
                                   <script src="ajax_cedula_representante.js" charset="utf-8"></script>
                                   <script src="ajax_curso.js" charset="utf-8"></script> 
                                   <script src="ajax_matri_cusar_curso.js" charset="utf-8"></script>



                                  <div class="conten_botom_formu">
                                    <input  type="submit" name="enviar" value="Enviar" class="acao">
                                    <a href="" class="cancelar">Cancelar</a>
                                  </div>
                                </fieldset>

                              </form>


                              <script src="js/funcions.js" charset="utf-8"></script>
                              <!-- /ajax -->
                          </div>
                      </div>
                      <script src="js/jquery/dist/jquery.min.js"></script>
                      <script src="jquery.dataTables.min.js" charset="utf-8"></script>

                      <div class="cont_tabla">
                        <table class="tabla" >
                            <thead>
                              <tr>
                              <th>PERIODO</th>
                              <th>Nº MATRICULA</th>
                              <th>ESTUDIANTE</th>
                              <th>CURSO</th>

                              <th>EDITAR / BORRAR</th>
                              </tr>
                              </thead>
                              <tr>
                                <?php

                                $consulta=mysqli_query($con,"SELECT * from matricula M inner join estudiante E on E.id_estudiante=M.id_estudiante inner join periodo P on P.id_periodo=M.id_periodo inner join curso_periodo CP on CP.id_curso_periodo=M.id_curso_periodo inner join curso C on C.id_curso=CP.id_curso inner join paralelo PL on PL.id_paralelo=CP.id_paralelo WHERE M.id_estado='1' ORDER BY M.fecha DESC ");
                                 while($row=mysqli_fetch_array($consulta)){
                                ?>

                                      <td><?php echo $row['periodo']; ?> </td>
                                      <td><?php echo $row['num_matricula'] ?> </td>
                                      <td><?php echo $row['nombres']." ".$row['apellidos']; ?> </td>
                                      <td><?php echo $row['curso']." - ".$row['paralelo']; ?> </td>
                                      <td> <div class="cont_tbn_tb"><a href="editar_matricula.php?idm=<?php echo $row['id_matricula'];?>"><button type="button" id="" title="Modificar" class="modificar" name="button"><i class="far fa-edit"> </i></button></a>
                                      <button type="button" class="eliminar" title="Eliminar" name="button"><i class="far fa-trash-alt"> </i></button></div></td>
                          </tr>
                          <script type="text/javascript">

                            $('.eliminar').click(function(e){
                             if (confirm("¿Está segur@ de ELIMINAR?")){
                                document.location.href="eliminar_matricula.php?id=<?php echo $row['id_matricula'];?>";
                              }else{
                                document.location.href="ingreso_matricula.php";
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
