<?php
    $title ="Sistema Educativo";
    include "head.php";

    include "sidebar.php";
    include('config/config.php');

?>
<link rel="stylesheet" href="css\estilo_selec_opcion.css">

    <div class="right_col" role=""> <!-- page content -->
        <div class="">
            <div class="page-title">


              <div class="col-md-12 col-sm-12 col-xs-12">

                  <div class="x_panel">

                      <!-- form search -->

                      <section class="content">
                          <div class="grande">
                              <div class="contenedor-opciones-restaurar">
                                  <div class="opmenu tab-primera active"><a href="#empleados">Quimestre 1</a></div>
                                  <div class="opmenu tab-segunda"><a href="#clientes">Quimestre 2</a></div>
                                  <div class="opmenu tab-tercera"><a href="#proveedores">Examen Supletorio  </a></div>
                              </div>

                              <!-- Contenido de los Formularios -->
                              <div class="contenedor-formularios">
                              <div class="contenido-tab">
                                  <!-- Empleados -->
                                  <div id="empleados">
                                      <h1>Notas del Primer Quimestre</h1>
                                      <div class="x_title">
                                          <ul class="nav navbar-right panel_toolbox">
                                              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                              </li>
                                              <li><a class="close-link"><i class="fa fa-close"></i></a>
                                              </li>
                                          </ul>
                                          <div class="clearfix"></div>
                                      </div>
                                      <div class="x_content">
                                          <div class="table-responsive">
                                              <!-- ajax -->
                                              <?php
                                              $estudiante=$_REQUEST['id_estudiante'];
                                              $periodo=$_REQUEST['id_periodo'];
                                              $curso_p=$_REQUEST['id_curso'];
                                              $materia=$_REQUEST['id_materia'];
                                              $id_quimestre1="";


                                              $consulta2=mysqli_query($con,"SELECT * from matricula M inner join notas N on N.id_matricula=M.id_matricula inner join estudiante E on E.id_estudiante=M.id_estudiante where E.id_estudiante='$estudiante'  ORDER BY N.id_notas ASC ");
                                               while($row2=mysqli_fetch_array($consulta2)){
                                                 $id_notas=$row2['id_notas'];
                                              }
                                                $consulta31=mysqli_query($con,"SELECT * from quimestre1 where id_periodo='$periodo' and id_notas='$id_notas' and id_asignatura_periodo='$materia' ORDER BY id_quimestre1 ASC ");
                                                 while($row31=mysqli_fetch_array($consulta31)){
                                                     $id_quimestre1=$row31['id_quimestre1'];
                                                     $promedio_Q1=$row31['promedio'];
                                                     $examenQ1=$row31['examen'];

                                                }

                                                $consulta5=mysqli_query($con,"SELECT * from parcial1_q1 where id_quimestre1='$id_quimestre1' ORDER BY id_parcial1_Q1 ASC ");
                                                 $row5=mysqli_fetch_array($consulta5);
                                                   $id_parcial1=$row5['id_parcial1_Q1'];
                                                   $deberp1=$row5['deber'];
                                                   $act_indip1=$row5['activi_individual'];
                                                   $activi_grupalp1=$row5['activi_grupal'];
                                                   $leccionp1=$row5['leccion'];
                                                   $aportep1=$row5['aporte'];



                                                  $consulta6=mysqli_query($con,"SELECT * from parcial2_q1 where id_quimestre1='$id_quimestre1' ORDER BY id_parcial2_Q1 ASC ");
                                                   $row6=mysqli_fetch_array($consulta6);
                                                     $id_parcial2=$row6['id_parcial2_Q1'];
                                                     $deberp2=$row6['deber'];
                                                     $act_indip2=$row6['activi_individual'];
                                                     $activi_grupalp2=$row6['activi_grupal'];
                                                     $leccionp2=$row6['leccion'];
                                                     $aportep2=$row6['aporte'];


                                                  $consulta7=mysqli_query($con,"SELECT * from parcial3_q1 where id_quimestre1='$id_quimestre1' ORDER BY id_parcial3_Q1 ASC ");
                                                   $row7=mysqli_fetch_array($consulta7);
                                                     $id_parcial3=$row7['id_parcial3_Q1'];
                                                     $deberp3=$row7['deber'];
                                                     $act_indip3=$row7['activi_individual'];
                                                     $activi_grupalp3=$row7['activi_grupal'];
                                                     $leccionp3=$row7['leccion'];
                                                     $aportep3=$row7['aporte'];

                                               ?>
                                              <form id="formulario" class="formulario" action="guardar_notas_estudiante.php?id_estudiante=<?php echo $estudiante; ?>&id_materia=<?php echo $materia; ?>&id_curso=<?php echo $curso_p; ?>&id_periodo=<?php echo $periodo; ?>" method="post" enctype="multipart/form-data">
                                                <fieldset class="fieldset_grande">

                                                <!-- <h3>algunas configuraciones</h3> -->

                                                  <div class="cont_cajas_peque">
                                                    <label class="etiq_caja">Parcial</label>
                                                    <select class="F_combo" name="parcial" id="parci" required ><option value="" >-SELECCIONE-</option><option value="P1">Parcial 1</option><option value="P2">Parcial 2</option><option value="P3">Parcial 3</option> </select>
                                                  </div>

                                                  <div class="content_cont_formu">
                                                    <h2>Notas Quimestre</h2>
                                                    <div class="cont_cajas_peque">
                                                      <label class="etiq_caja">Promedio Quimestre</label>
                                                    <input type="txt" name="promedio" value="<?php if (isset($promedio_Q1)){ echo $promedio_Q1; } ?>" placeholder="" maxlength="5" onkeypress="return enable(event)" onpaste="return false">
                                                    </div>
                                                    <div class="cont_cajas_peque">
                                                      <label class="etiq_caja">Examen Quimestral</label>
                                                    <input type="txt" name="examen_quimestral" value="<?php if (isset($examenQ1)){ echo $examenQ1; } ?>" placeholder="" maxlength="5" onkeypress="return solonumeros(event)" onpaste="return false">
                                                    </div>
                                                  </div>

                                                  <div class="content_cont_formu">
                                                    <h2>Notas Parcial (Insumos)</h2>
<?php if ($materia!=11) {?>
                                                    <div class="cont_cajas_peque2">
                                                      <label class="etiq_caja">Trabajos Academicos</label>
                                                    <input type="txt" id="deber" name="deber" value="" placeholder="" maxlength="5" onkeypress="return solonumeros(event)" onpaste="return false">
                                                    </div>
                                                    <div class="cont_cajas_peque2">
                                                      <label class="etiq_caja">Actividades Individuales</label>
                                                    <input type="txt" name="A_individual" id="A_individual" value="" placeholder="" maxlength="5" onkeypress="return solonumeros(event)" onpaste="return false">
                                                    </div>
                                                    <div class="cont_cajas_peque2">
                                                      <label class="etiq_caja">Actividades Grupales</label>
                                                    <input type="txt" name="A_grupal" id="A_grupal" value="" placeholder="" maxlength="5" onkeypress="return solonumeros(event)" onpaste="return false">
                                                    </div>
                                                    <div class="cont_cajas_peque2">
                                                      <label class="etiq_caja">Evaluaciones Lecciones</label>
                                                    <input type="txt" name="leccion" id="leccion" value="" placeholder="" maxlength="5" onkeypress="return solonumeros(event)" onpaste="return false">
                                                    </div>
                                                    <div class="cont_cajas_peque2">
                                                      <label class="etiq_caja">Evaluaciones Aporte</label>
                                                    <input type="txt" name="aporte" id="aporte" value="" placeholder="" maxlength="5" onkeypress="return solonumeros(event)" onpaste="return false">
                                                    </div>
<?php }else{?>
                                                    <div class="cont_cajas_peque">
                                                      <label class="etiq_caja">Comportamiento</label>
                                                      <select class="" name="comb_comporta"> <option value="">-SELECIONE-</option><option value="10">A - MUY SATISFACTORIO</option><option value="8">B - SATISFACTORIO</option><option value="6">C - POCO SATISFACTORIO</option><option value="4">D -MEJORABLE</option><option value="2">E - INSATISFACORIO</option> </select>
                                                    </div>
<?php } ?>


                                                  </div>

                                                  <div class="conten_botom_formu">
                                                    <input  type="submit" name="enviar" value="Subir" class="acao">
                                                    <a href="" class="cancelar">Cancelar</a>
                                                  </div>
                                                </fieldset>

                                              </form>
                                              <script src="js/funcions.js" charset="utf-8"></script>
                                              <!-- /ajax -->

              <script type="text/javascript">
              $(document).on('change','#parci', function(){
                var valr= $(this).val();
                if(valr=="P1"){
                  document.getElementById('deber').value=<?php echo $deberp1; ?>;
                  document.getElementById('A_individual').value=<?php echo $act_indip1; ?>;
                  document.getElementById('A_grupal').value=<?php echo $activi_grupalp1; ?>;
                  document.getElementById('leccion').value=<?php echo $leccionp1; ?>;
                  document.getElementById('aporte').value=<?php echo $aportep1; ?>;
                }
                if(valr=="P2"){
                  document.getElementById('deber').value=<?php echo $deberp2; ?>;
                  document.getElementById('A_individual').value=<?php echo $act_indip2; ?>;
                  document.getElementById('A_grupal').value=<?php echo $activi_grupalp2; ?>;
                  document.getElementById('leccion').value=<?php echo $leccionp2; ?>;
                  document.getElementById('aporte').value=<?php echo $aportep2; ?>;
                }
                if(valr=="P3"){
                  document.getElementById('deber').value=<?php echo $deberp3; ?>;
                  document.getElementById('A_individual').value=<?php echo $act_indip3; ?>;
                  document.getElementById('A_grupal').value=<?php echo $activi_grupalp3; ?>;
                  document.getElementById('leccion').value=<?php echo $leccionp3; ?>;
                  document.getElementById('aporte').value=<?php echo $aportep3; ?>;
                }

              });
              </script>
                                          </div>
                                      </div>

                                  </div>

                                  <!-- Clientes -->
                                  <div id="clientes" class="esconder">
                                      <h1>Notas del Segundo Quimestre</h1>
                                      <div class="x_title">
                                          <ul class="nav navbar-right panel_toolbox">
                                              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                              </li>
                                              <li><a class="close-link"><i class="fa fa-close"></i></a>
                                              </li>
                                          </ul>
                                          <div class="clearfix"></div>
                                      </div>
                                      <div class="x_content">
                                          <div class="table-responsive">
                                              <!-- ajax -->
                                              <?php
                                              $estudiante=$_REQUEST['id_estudiante'];
                                              $periodo=$_REQUEST['id_periodo'];
                                              $curso_p=$_REQUEST['id_curso'];
                                              $materia=$_REQUEST['id_materia'];
                                              $id_quimestre2="";


                                              $consulta2=mysqli_query($con,"SELECT * from matricula M inner join notas N on N.id_matricula=M.id_matricula inner join estudiante E on E.id_estudiante=M.id_estudiante where E.id_estudiante='$estudiante'  ORDER BY N.id_notas ASC ");
                                               while($row2=mysqli_fetch_array($consulta2)){
                                                 $id_notas=$row2['id_notas'];
                                              }
                                              $consulta51=mysqli_query($con,"SELECT * from quimestre2 where id_periodo='$periodo' and id_notas='$id_notas' and id_asignatura_periodo='$materia' ORDER BY id_quimestre2 ASC ");
                                                   while($row51=mysqli_fetch_array($consulta51)){
                                                       $id_quimestre2=$row51['id_quimestre2'];
                                                       $promedio_Q2=$row51['promedio'];
                                                       $examenQ2=$row51['examen'];

                                                  }

                                                  $consulta60=mysqli_query($con,"SELECT * from parcial1_q2 where id_quimestre2='$id_quimestre2' ORDER BY id_parcial1_Q2 ASC ");
                                                   $row60=mysqli_fetch_array($consulta60);
                                                     $id_parcial12=$row60['id_parcial1_Q2'];
                                                     $deberp12=$row60['deber'];
                                                     $act_indip12=$row60['activi_individual'];
                                                     $activi_grupalp12=$row60['activi_grupal'];
                                                     $leccionp12=$row60['leccion'];
                                                     $aportep12=$row60['aporte'];



                                                    $consulta61=mysqli_query($con,"SELECT * from parcial2_q2 where id_quimestre2='$id_quimestre2' ORDER BY id_parcial2_Q2 ASC ");
                                                     $row61=mysqli_fetch_array($consulta61);
                                                       $id_parcial22=$row61['id_parcial2_Q2'];
                                                       $deberp22=$row61['deber'];
                                                       $act_indip22=$row61['activi_individual'];
                                                       $activi_grupalp22=$row61['activi_grupal'];
                                                       $leccionp22=$row61['leccion'];
                                                       $aportep22=$row61['aporte'];


                                                    $consulta62=mysqli_query($con,"SELECT * from parcial3_q2 where id_quimestre2='$id_quimestre2' ORDER BY id_parcial3_Q2 ASC ");
                                                     $row62=mysqli_fetch_array($consulta62);
                                                       $id_parcial32=$row62['id_parcial3_Q2'];
                                                       $deberp32=$row62['deber'];
                                                       $act_indip32=$row62['activi_individual'];
                                                       $activi_grupalp32=$row62['activi_grupal'];
                                                       $leccionp32=$row62['leccion'];
                                                       $aportep32=$row62['aporte'];

                                                 ?>
                                                 <form class="" action="guardar_notas_estudiante3.php?id_estudiante=<?php echo $estudiante; ?>&id_materia=<?php echo $materia; ?>&id_curso=<?php echo $curso_p; ?>&id_periodo=<?php echo $periodo; ?>" method="post">
                                                   <div class="conten_botom_formu">
                                                     <input  type="submit" name="enviar" value="Subir - Asentar Notas" class="acao3">
                                                   </div>
                                                 </form>
                                              <form id="formulario" class="formulario" action="guardar_notas_estudiante2.php?id_estudiante=<?php echo $estudiante; ?>&id_materia=<?php echo $materia; ?>&id_curso=<?php echo $curso_p; ?>&id_periodo=<?php echo $periodo; ?>" method="post" enctype="multipart/form-data">
                                                <fieldset class="fieldset_grande">

                                                <!-- <h3>algunas configuraciones</h3> -->

                                                  <div class="cont_cajas_peque">
                                                    <label class="etiq_caja">Parcial</label>
                                                    <select class="F_combo" name="parcial" id="parci2" required ><option value="" >-SELECCIONE-</option><option value="P1">Parcial 1</option><option value="P2">Parcial 2</option><option value="P3">Parcial 3</option> </select>
                                                  </div>

                                                  <div class="content_cont_formu">
                                                    <h2>Notas Quimestre</h2>
                                                    <div class="cont_cajas_peque">
                                                      <label class="etiq_caja">Promedio Quimestre</label>
                                                    <input type="txt" name="promedio" value="<?php if (isset($promedio_Q2)){ echo $promedio_Q2; } ?>" placeholder="" maxlength="5" onkeypress="return enable(event)" onpaste="return false">
                                                    </div>
                                                    <div class="cont_cajas_peque">
                                                      <label class="etiq_caja">Examen Quimestral</label>
                                                    <input type="txt" name="examen_quimestral" value="<?php if (isset($examenQ2)){ echo $examenQ2; } ?>" placeholder="" maxlength="5" onkeypress="return solonumeros(event)" onpaste="return false">
                                                    </div>
                                                  </div>

                                                  <div class="content_cont_formu">
                                                    <h2>Notas Parcial (Insumos)</h2>
                                                    <?php if ($materia!=11) {?>
                                                    <div class="cont_cajas_peque2">
                                                      <label class="etiq_caja">Trabajos Academicos</label>
                                                    <input type="txt" id="deber2" name="deber" value="" placeholder="" maxlength="5" onkeypress="return solonumeros(event)" onpaste="return false">
                                                    </div>
                                                    <div class="cont_cajas_peque2">
                                                      <label class="etiq_caja">Actividades Individuales</label>
                                                    <input type="txt" name="A_individual" id="A_individual2" value="" placeholder="" maxlength="5" onkeypress="return solonumeros(event)" onpaste="return false">
                                                    </div>
                                                    <div class="cont_cajas_peque2">
                                                      <label class="etiq_caja">Actividades Grupales</label>
                                                    <input type="txt" name="A_grupal" id="A_grupal2" value="" placeholder="" maxlength="5" onkeypress="return solonumeros(event)" onpaste="return false">
                                                    </div>
                                                    <div class="cont_cajas_peque2">
                                                      <label class="etiq_caja">Evaluaciones Lecciones</label>
                                                    <input type="txt" name="leccion" id="leccion2" value="" placeholder="" maxlength="5" onkeypress="return solonumeros(event)" onpaste="return false">
                                                    </div>
                                                    <div class="cont_cajas_peque2">
                                                      <label class="etiq_caja">Evaluaciones Aporte</label>
                                                    <input type="txt" name="aporte" id="aporte2" value="" placeholder="" maxlength="5" onkeypress="return solonumeros(event)" onpaste="return false">
                                                    </div>

                                                    <?php }else{?>
                                                      <div class="cont_cajas_peque">
                                                        <label class="etiq_caja">Comportamiento</label>
                                                        <select class="" name="comb_comporta"> <option value="">-SELECIONE-</option><option value="10">A - MUY SATISFACTORIO</option><option value="8">B - SATISFACTORIO</option><option value="6">C - POCO SATISFACTORIO</option><option value="4">D -MEJORABLE</option><option value="2">E - INSATISFACORIO</option> </select>
                                                      </div>
                                                    <?php } ?>


                                                  </div>

                                                  <div class="conten_botom_formu">
                                                    <input  type="submit" name="enviar" value="Subir" class="acao">
                                                    <a href="" class="cancelar">Cancelar</a>
                                                  </div>
                                                </fieldset>

                                              </form>
                                              <script src="js/funcions.js" charset="utf-8"></script>
                                              <!-- /ajax -->

                                              <script type="text/javascript">
                                              $(document).on('change','#parci2', function(){
                                                var valr= $(this).val();
                                                if(valr=="P1"){
                                                  document.getElementById('deber2').value=<?php echo $deberp12; ?>;
                                                  document.getElementById('A_individual2').value=<?php echo $act_indip12; ?>;
                                                  document.getElementById('A_grupal2').value=<?php echo $activi_grupalp12; ?>;
                                                  document.getElementById('leccion2').value=<?php echo $leccionp12; ?>;
                                                  document.getElementById('aporte2').value=<?php echo $aportep12; ?>;
                                                }
                                                if(valr=="P2"){
                                                  document.getElementById('deber2').value=<?php echo $deberp22; ?>;
                                                  document.getElementById('A_individual2').value=<?php echo $act_indip22; ?>;
                                                  document.getElementById('A_grupal2').value=<?php echo $activi_grupalp22; ?>;
                                                  document.getElementById('leccion2').value=<?php echo $leccionp22; ?>;
                                                  document.getElementById('aporte2').value=<?php echo $aportep22; ?>;
                                                }
                                                if(valr=="P3"){
                                                  document.getElementById('deber2').value=<?php echo $deberp32; ?>;
                                                  document.getElementById('A_individual2').value=<?php echo $act_indip32; ?>;
                                                  document.getElementById('A_grupal2').value=<?php echo $activi_grupalp32; ?>;
                                                  document.getElementById('leccion2').value=<?php echo $leccionp32; ?>;
                                                  document.getElementById('aporte2').value=<?php echo $aportep32; ?>;
                                                }

                                              });
                                              </script>
                                            </div>
                                            </div>
                                  </div>

                                  <div id="proveedores" class="esconder">
                                      <h1>Supletorio</h1>
                                      <div class="x_title">
                                          <ul class="nav navbar-right panel_toolbox">
                                              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                              </li>
                                              <li><a class="close-link"><i class="fa fa-close"></i></a>
                                              </li>
                                          </ul>
                                          <div class="clearfix"></div>
                                      </div>
                                      <div class="x_content">
                                          <div class="table-responsive">
                                              <!-- ajax -->
                                              <form id="formulario" class="formulario" action="guardar_notas_estudiante4.php?id_estudiante=<?php echo $estudiante; ?>&id_materia=<?php echo $materia; ?>&id_curso=<?php echo $curso_p; ?>&id_periodo=<?php echo $periodo; ?>" method="post" enctype="multipart/form-data">
                                                <fieldset class="fieldset_normal">
                                                  <h2>Examen Supletorio</h2>
                                                  <hr>

                                                  <div class="cont_cajas">
                                                    <label class="etiq_caja">Nota de Examen Supletorio</label>
                                                  <input type="txt" name="examen_suple"  value="" placeholder="" maxlength="5" onkeypress="return solonumeros(event)" onpaste="return false">
                                                  </div>


                                                  <div class="conten_botom_formu">
                                                    <input  type="submit" name="enviar" value="Agregar" class="acao">
                                                    <a href="" class="cancelar">Cancelar</a>
                                                  </div>
                                                </fieldset>

                                              </form>
                                              <script src="js/funcions.js" charset="utf-8"></script>
                                              <!-- /ajax -->
                                          </div>
                                      </div>




                                  </div>

                              </div>
                              </div>
                          </div>
                      <!-- end form search -->



                  </div>
              </div>




            </div>
        </div>
    </div><!-- /page content -->

<?php include "footer.php" ?>
<script src="js/selecopciones.js" charset="utf-8"></script>
