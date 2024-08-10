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
                          <h2>Registrar Diario </h2>
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
                              <form id="formulario" class="formulario" action="guardar_diario.php" method="post" enctype="multipart/form-data">
                                <fieldset class="fieldset_normal">
                                  <h2>Diario</h2>
                                  <hr>
                                  <div class="cont_cajas_peque">
                                    <label class="etiq_caja">Fecha</label>
                                    <input type="text" name="fecha" value="<?php $fecha=date('Y-m-d'); echo $fecha; ?>" placeholder="" onkeypress="return enable(event)" onpaste="return false">
                                  </div>
                                  <!-- <div class="cont_cajas_peque">
                                    <label class="etiq_caja">Foto</label>
                                    <input type="file" name="foto" value="" placeholder="">
                                  </div> -->
                                  <div class="cont_cajas_peque">
                                  </div>
                                  <div class="cont_cajas_peque">
                                    <label class="etiq_caja">Curso</label>
                                    <select class="F_combo" name="curso" required >
                                      <option value="" >-SELECCIONE-</option>
                                        <?php  $consulta4=mysqli_query($con,"SELECT * from pre_planificacion PP INNER JOIN curso_periodo CP ON PP.id_curso_periodo=CP.id_curso_periodo INNER JOIN curso C ON CP.id_curso=C.id_curso INNER JOIN paralelo P ON P.id_paralelo=CP.id_paralelo");
                                              while($row4=mysqli_fetch_array($consulta4)){
                                                echo "<option value='".$row4['id_curso_periodo']."'>"; echo $row4['curso']." - ".$row4['paralelo']; echo "</option>"; } ?>
                                    </select>
                                  </div>
                                  <div class="cont_cajas_peque">
                                  </div>
                                  <div class="cont_cajas">
                                    <label class="etiq_caja">Descripción</label>
                                    <textarea name="descripcion" id="" cols="50" rows="10"></textarea>
                                  </div>
                                  <div class="conten_botom_formu">
                                    <input  type="submit" name="enviar" value="Guardar" class="acao">
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
                              <th>FECHA</th>
                              <th>CURSO</th>
                              <th>DESCRIPCION</th>

                              <th>EDITAR / BORRAR</th>
                              </tr>
                              </thead>
                              <tr>
                                <?php

                                $consulta=mysqli_query($con,"SELECT * from diario D INNER JOIN curso_periodo CP ON D.id_curso_periodo=CP.id_curso_periodo INNER JOIN curso C ON CP.id_curso=C.id_curso INNER JOIN paralelo P ON P.id_paralelo=CP.id_paralelo");
                                 while($row=mysqli_fetch_array($consulta)){
                                ?>
                                      <td><?php echo $row['fecha']; ?> </td>
                                      <td><?php echo $row['curso']." - ".$row['paralelo']; ?> </td>
                                      <td><?php echo $row['descripcion']; ?> </td>
                                      <td><div class="cont_tbn_tb"><a href="editar_estudiante.php?ide=<?php echo $row['id_estudiante']; ?>"><button type="button" title="Modificar" class="modificar" name="button"><i class="far fa-edit"> </i></button></a>
                                      <button type="button" class="eliminar" title="Eliminar" name="button"><i class="far fa-trash-alt"> </i></button></div></td>
                          </tr>
                          <script type="text/javascript">
                            $('.eliminar').click(function(e){
                             if (confirm("¿Está segur@ de ELIMINAR?")){
                                document.location.href="eliminar_estudiante.php?id=<?php echo $row['id_estudiante'];?>";
                              }else{
                                document.location.href="ingreso_estudiantes.php";
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
