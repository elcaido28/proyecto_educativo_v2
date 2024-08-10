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
                                  <div class="opmenu tab-primera active"><a href="#empleados">Asignaturas</a></div>
                                  <div class="opmenu tab-segunda"><a href="#clientes">Asignaturas del Periodo</a></div>
                                  <div class="opmenu tab-tercera"><a href="#proveedores">Asignaturas por Curso</a></div>

                              </div>

                              <!-- Contenido de los Formularios -->
                              <div class="contenedor-formularios">
                              <div class="contenido-tab">
                                  <!-- Empleados -->
                                  <div id="empleados">
                                      <h1>Asignaturas</h1>
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
                                              <form id="formulario" class="formulario" action="guardar_asignaturas.php" method="post" enctype="multipart/form-data">
                                                <fieldset class="fieldset_normal">
                                                  <h2>Ingrese Asignatura</h2>
                                                  <hr>
                                                  <!-- <h3>algunas configuraciones</h3> -->

                                                  <div class="cont_cajas_peque">
                                                    <label class="etiq_caja">Asignatura</label>
                                                  <input type="txt" name="nombre" value="" placeholder="" onkeypress="return sololetras(event)" onpaste="return false">
                                                  </div>
                                                  <div class="cont_cajas_peque">
                                                    <label class="etiq_caja">Tipo de Asignatura</label>
                                                    <select class="F_combo" name="id_tipo_materia" required ><option value="" >-SELECCIONE-</option>
                                                   <?php  $consulta4=mysqli_query($con,"SELECT * from tipo_materia");
                                                      while($row4=mysqli_fetch_array($consulta4)){
                                                      echo "<option value='".$row4['id_tipo_materia']."'>"; echo $row4['tipo_mate']; echo "</option>"; } ?> </select>
                                                  </div>

                                                  <div class="conten_botom_formu">
                                                    <input  type="submit" name="enviar" value="Agregar" class="acao">
                                                    <a href="" class="cancelar">Canelar</a>
                                                  </div>
                                                </fieldset>

                                              </form>
                                              <script src="js/funcions.js" charset="utf-8"></script>
                                              <!-- /ajax -->
                                          </div>
                                      </div>



                                      <script src="js/jquery/dist/jquery.min.js"></script>
                                      <script src="jquery.dataTables.min.js" charset="utf-8"></script>

                                      <div class="cont_tabla2">
                                        <table class="tabla" >
                                            <thead>
                                              <tr>
                                              <th>ASIGNATURA</th>
                                              <th>TIPO</th>
                                              <th>EDITAR / BORRAR</th>
                                              </tr>
                                              </thead>
                                              <tr>
                                                <?php

                                                $consulta=mysqli_query($con,"SELECT * from asignatura A inner join tipo_materia TM on TM.id_tipo_materia=A.id_tipo_materia where nombre!='Comportamiento' ORDER BY A.nombre ASC ");
                                                 while($row=mysqli_fetch_array($consulta)){
                                                ?>

                                                      <td><?php echo $row['nombre'] ?> </td>
                                                      <td><?php echo $row['tipo_mate'] ?> </td>
                                                      <td> <div class="cont_tbn_tb"><a href="editar_asignatura.php?id=<?php echo $row['id_asignatura']; ?>"><button type="button" title="Modificar" class="modificar" name="button"><i class="far fa-edit"> </i></button></a>
                                                      <button type="button" class="eliminar" title="Eliminar" name="button"><i class="far fa-trash-alt"> </i></button></div></td>
                                          </tr>
                                          <script type="text/javascript">
                                            $('.eliminar').click(function(e){
                                             if (confirm("¿Está segur@ de ELIMINAR?")){
                                                document.location.href="eliminar_asignatura_asignatura.php?id=<?php echo $row['id_asignatura'];?>";
                                              }else{
                                                document.location.href="ingreso_asignaturas.php";
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

                                  <!-- Clientes -->
                                  <div id="clientes" class="esconder">
                                      <h1>Asignaturas del Periodo</h1>
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
                                              <form id="formulario" class="formulario" action="guardar_asignatura_periodo.php" method="post" enctype="multipart/form-data">
                                                <fieldset class="fieldset_normal">
                                                  <h2>Ingrese Asignaturas al Periodo</h2>
                                                  <hr>
                                                  <!-- <h3>algunas configuraciones</h3> -->

                                                  <div class="cont_cajas_peque">
                                                    <label class="etiq_caja">Periodos</label>
                                                    <select class="F_combo" name="periodo" required ><option value="" >-SELECCIONE-</option>
                                                   <?php  $consulta4=mysqli_query($con,"SELECT * from periodo");
                                                      while($row4=mysqli_fetch_array($consulta4)){
                                                      echo "<option value='".$row4['id_periodo']."'>"; echo $row4['periodo']; echo "</option>"; } ?> </select>
                                                  </div>
                                                  <div class="cont_cajas_peque">
                                                    <label class="etiq_caja">Asignatura</label>
                                                    <select class="F_combo" name="asignatura" required ><option value="" >-SELECCIONE-</option>
                                                   <?php  $consulta4=mysqli_query($con,"SELECT * from asignatura");
                                                      while($row4=mysqli_fetch_array($consulta4)){
                                                      echo "<option value='".$row4['id_asignatura']."'>"; echo $row4['nombre']; echo "</option>"; } ?> </select>
                                                  </div>

                                                  <div class="conten_botom_formu">
                                                    <input  type="submit" name="enviar" value="Agregar" class="acao">
                                                    <a href="" class="cancelar">Canelar</a>
                                                  </div>
                                                </fieldset>

                                              </form>
                                              <script src="js/funcions.js" charset="utf-8"></script>
                                              <!-- /ajax -->
                                          </div>
                                      </div>



                                      <script src="js/jquery/dist/jquery.min.js"></script>
                                      <script src="jquery.dataTables.min.js" charset="utf-8"></script>

                                      <div class="cont_tabla2">
                                        <table class="tabla" >
                                            <thead>
                                              <tr>
                                              <th>PERIODO</th>
                                              <th>ASIGNATURA</th>
                                              <th>TIPO</th>
                                              <th>EDITAR / BORRAR</th>
                                              </tr>
                                              </thead>
                                              <tr>
                                                <?php

                                                $consulta=mysqli_query($con,"SELECT * from asignatura_periodo AP inner join asignatura A on A.id_asignatura=AP.id_asignatura inner join tipo_materia TM on TM.id_tipo_materia=A.id_tipo_materia inner join periodo P on P.id_periodo=AP.id_periodo  ORDER BY A.nombre ASC  ");
                                                 while($row=mysqli_fetch_array($consulta)){
                                                ?>

                                                      <td><?php echo $row['periodo'] ?> </td>
                                                      <td><?php echo $row['nombre'] ?> </td>
                                                      <td><?php echo $row['tipo_mate'] ?> </td>
                                                      <td> <div class="cont_tbn_tb"><a href="editar_asignatura_periodo.php?id=<?php echo $row['id_asignatura_periodo'] ?>"><button type="button" title="Modificar" class="modificar" name="button"><i class="far fa-edit"> </i></button></a>
                                                <button type="button" class="eliminar" title="Eliminar" name="button"><i class="far fa-trash-alt"> </i></button></div></td>
                                          </tr>
                                          <script type="text/javascript">
                                            $('.eliminar').click(function(e){
                                             if (confirm("¿Está segur@ de ELIMINAR?")){
                                                document.location.href="eliminar_asignatura_periodo.php?id=<?php echo $row['id_asignatura_periodo'];?>";
                                              }else{
                                                document.location.href="ingreso_asignaturas.php";
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




                                  <!-- Proveedores -->
                                  <div id="proveedores" class="esconder">
                                      <h1>Cursos de Periodo</h1>

                                      <script src="js/jquery/dist/jquery.min.js"></script>
                                      <script src="jquery.dataTables.min.js" charset="utf-8"></script>

                                      <div class="cont_tabla2">
                                        <table class="tabla" >
                                            <thead>
                                              <tr>
                                              <th>PERIODO</th>
                                              <th>CURSO</th>
                                              <th>PARALELO</th>
                                              <th>AGREGAR ASIGNATURAS</th>
                                              </tr>
                                              </thead>
                                              <tr>
                                                <?php

                                                $consulta=mysqli_query($con,"SELECT * from curso_periodo CP inner join curso C on C.id_curso=CP.id_curso inner join paralelo P on P.id_paralelo=CP.id_paralelo inner join periodo PP on PP.id_periodo=CP.id_periodo ORDER BY CP.id_curso_periodo ASC ");
                                                 while($row=mysqli_fetch_array($consulta)){
                                                ?>

                                                      <td><?php echo $row['periodo'] ?> </td>
                                                      <td><?php echo $row['curso'] ?> </td>
                                                      <td><?php echo $row['paralelo'] ?> </td>
                                                      <td> <a href="ingreso_asig_mate_curso.php?id_curso_peri=<?php echo $row['id_curso_periodo']; ?>"><button type="button" title="Modificar" class="modificar" name="button"><i class="far fa-share-square"></i></button></a> </td>
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

                                  </div>



                              </div>
                              </div>
                          </div>
                      <!-- end form search -->
                    </section>


                  </div>
              </div>




            </div>
        </div>
    </div><!-- /page content -->

<?php include "footer.php" ?>
<script src="js/selecopciones.js" charset="utf-8"></script>
