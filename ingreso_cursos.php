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
                                  <div class="opmenu tab-primera active"><a href="#empleados">Cursos</a></div>
                                  <div class="opmenu tab-segunda"><a href="#clientes">Paralelos</a></div>
                                  <div class="opmenu tab-tercera"><a href="#proveedores">Cursos del Periodo  </a></div>
                              </div>

                              <!-- Contenido de los Formularios -->
                              <div class="contenedor-formularios">
                              <div class="contenido-tab">
                                  <!-- Empleados -->
                                  <div id="empleados">
                                      <h1>Cursos</h1>
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
                                              <form id="formulario" class="formulario" action="guardar_curso.php" method="post" enctype="multipart/form-data">
                                                <fieldset class="fieldset_normal">
                                                  <h2>Ingrese Cursos</h2>
                                                  <hr>
                                                  <!-- <h3>algunas configuraciones</h3> -->

                                                  <div class="cont_cajas">
                                                    <label class="etiq_caja">Curso</label>
                                                  <input type="txt" name="curso" value="" placeholder="" onkeypress="return sololetras(event)" onpaste="return false">
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



                                      <script src="js/jquery/dist/jquery.min.js"></script>
                                      <script src="jquery.dataTables.min.js" charset="utf-8"></script>

                                      <div class="cont_tabla2">
                                        <table class="tabla" >
                                            <thead>
                                              <tr>
                                              <th>CURSO</th>
                                              <th>EDITAR</th>
                                              </tr>
                                              </thead>
                                              <tr>
                                                <?php

                                                $consulta=mysqli_query($con,"SELECT * from curso ORDER BY id_curso ASC ");
                                                 while($row=mysqli_fetch_array($consulta)){
                                                ?>

                                                      <td><?php echo $row['curso'] ?> </td>
                                                      <td> <div class="cont_tbn_tb"><a href="editar_curso.php?idc=<?php echo $row['id_curso'];?>"><button type="button" title="Modificar" class="modificar" name="button"><i class="far fa-edit"> </i></button></a>
                                                      <!-- <button type="button" class="eliminar" title="Eliminar" name="button"><i class="far fa-trash-alt"> </i></button> --></div></td>
                                          </tr>
                                          <script type="text/javascript">
                                            $('.eliminar').click(function(e){
                                             if (confirm("¿Está segur@ de ELIMINAR?")){
                                                document.location.href="eliminar_curso.php?id=<?php echo $row['id_curso'];?>";
                                              }else{
                                                document.location.href="ingreso_cursos.php";
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
                                      <h1>Paralelos</h1>
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
                                              <form id="formulario" class="formulario" action="guardar_representante.php?id=<?php echo $id_estu ?>" method="post" enctype="multipart/form-data">
                                                <fieldset class="fieldset_normal">
                                                  <h2>Ingrese Paralelos</h2>
                                                  <hr>
                                                  <!-- <h3>algunas configuraciones</h3> -->

                                                  <div class="cont_cajas_peque">
                                                    <label class="etiq_caja">Paralelo</label>
                                                  <input type="txt" name="curso" value="" placeholder="" maxlength="2" onkeypress="return sololetras(event)" onpaste="return false">
                                                  </div>
                                                  <div class="cont_cajas_peque">
                                                    <label class="etiq_caja">capacidad</label>
                                                  <input type="txt" name="cantidad" value="" placeholder="" maxlength="2" onkeypress="return solonumeroRUC(event)" onpaste="return false">
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



                                      <script src="js/jquery/dist/jquery.min.js"></script>
                                      <script src="jquery.dataTables.min.js" charset="utf-8"></script>

                                      <div class="cont_tabla2">
                                        <table class="tabla" >
                                            <thead>
                                              <tr>
                                              <th>PARALELO</th>
                                              <th>CAPACIDAD</th>
                                              <th>EDITAR</th>
                                              </tr>
                                              </thead>
                                              <tr>
                                                <?php

                                                $consulta=mysqli_query($con,"SELECT * from paralelo ORDER BY id_paralelo ASC ");
                                                 while($row=mysqli_fetch_array($consulta)){
                                                ?>

                                                      <td><?php echo $row['paralelo'] ?> </td>
                                                      <td><?php echo $row['cantidad'] ?> </td>
                                                      <td> <div class="cont_tbn_tb"><a href="editar_paralelo.php?idp=<?php echo $row['id_paralelo']; ?>"><button type="button" title="Modificar" class="modificar" name="button"><i class="far fa-edit"> </i></button></a>
                                                      <!-- <button type="button" class="eliminar" title="Eliminar" name="button"><i class="far fa-trash-alt"> </i></button> --></div></td>
                                          </tr>
                                          <script type="text/javascript">
                                            $('.eliminar').click(function(e){
                                             if (confirm("¿Está segur@ de ELIMINAR?")){
                                                document.location.href="eliminar_paralelo.php?id=<?php echo $row['id_paralelo'];?>";
                                              }else{
                                                document.location.href="ingreso_cursos.php";
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
                                              <form id="formulario" class="formulario" action="guardar_cursos_periodo.php" method="post" enctype="multipart/form-data">
                                                <fieldset class="fieldset_normal">
                                                  <h2>Ingrese asignacion</h2>
                                                  <hr>
                                                  <div class="cont_cajas">
                                                    <label class="etiq_caja">Periodos</label>
                                                    <select class="F_combo" name="periodo" required ><option value="" >-SELECCIONE-</option>
                                                   <?php  $consulta4=mysqli_query($con,"SELECT * from periodo");
                                                      while($row4=mysqli_fetch_array($consulta4)){
                                                      echo "<option value='".$row4['id_periodo']."'>"; echo $row4['periodo']; echo "</option>"; } ?> </select>
                                                  </div>
                                                  <div class="cont_cajas_peque">
                                                    <label class="etiq_caja">cursos</label>
                                                    <select class="F_combo" name="cursos" required ><option value="" >-SELECCIONE-</option>
                                                   <?php  $consulta4=mysqli_query($con,"SELECT * from curso");
                                                      while($row4=mysqli_fetch_array($consulta4)){
                                                      echo "<option value='".$row4['id_curso']."'>"; echo $row4['curso']; echo "</option>"; } ?> </select>
                                                  </div>
                                                  <div class="cont_cajas_peque">
                                                    <label class="etiq_caja">Paralelo</label>
                                                    <select class="F_combo" name="paralelo" required ><option value="" >-SELECCIONE-</option>
                                                   <?php  $consulta4=mysqli_query($con,"SELECT * from paralelo");
                                                      while($row4=mysqli_fetch_array($consulta4)){
                                                      echo "<option value='".$row4['id_paralelo']."'>"; echo $row4['paralelo']; echo "</option>"; } ?> </select>
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



                                      <script src="js/jquery/dist/jquery.min.js"></script>
                                      <script src="jquery.dataTables.min.js" charset="utf-8"></script>

                                      <div class="cont_tabla2">
                                        <table class="tabla" >
                                            <thead>
                                              <tr>
                                              <th>PERIODO</th>
                                              <th>CURSO</th>
                                              <th>PARALELO</th>
                                              <th>EDITAR</th>
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
                                                      <td><div class="cont_tbn_tb"><a href="editar_periodo.php?idp=<?php echo $row['id_curso_periodo']; ?>"><button type="button" id="<?php echo $row['id_curso_periodo'];?>" title="Modificar" class="modificar" name="button"><i class="far fa-edit"> </i></button></a>
                                                  <!-- <button type="button" class="eliminar" title="Eliminar" name="button"><i class="far fa-trash-alt"> </i></button> --></div></td>
                                            </tr>
                                            <script type="text/javascript">
                                              $('.eliminar').click(function(e){
                                               if (confirm("¿Está segur@ de ELIMINAR?")){
                                                  document.location.href="eliminar_curso_periodo.php?id=<?php echo $row['id_curso_periodo'];?>";
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



                  </div>
              </div>




            </div>
        </div>
    </div><!-- /page content -->

<?php include "footer.php" ?>
<script src="js/selecopciones.js" charset="utf-8"></script>
