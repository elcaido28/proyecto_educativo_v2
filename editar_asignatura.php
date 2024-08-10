<?php
    $title ="Sistema Educativo";
    include "head.php";

    include "sidebar.php";
    include('config/config.php');

    $ida=$_REQUEST['id'];
    $consulta="SELECT * FROM asignatura A INNER JOIN tipo_materia T ON A.id_tipo_materia=T.id_tipo_materia WHERE A.id_asignatura='$ida'";
    $ejec=mysqli_query($con,$consulta);
    $row=mysqli_fetch_array($ejec);
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
                              <!-- Contenido de los Formularios -->
                              <div class="contenedor-formularios">
                              <div class="contenido-tab">
                                  <!-- Empleados -->
                                  <div id="empleados">
                                      <h1>Editar Asignaturas</h1>
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
                                              <form id="formulario" class="formulario" action="modificar_asignatura.php?id=<?php echo $ida; ?>" method="post" enctype="multipart/form-data">
                                                <fieldset class="fieldset_normal">
                                                  <h2>Ingrese Asignatura</h2>
                                                  <hr>
                                                  <!-- <h3>algunas configuraciones</h3> -->

                                                  <div class="cont_cajas_peque">
                                                    <label class="etiq_caja">Materia</label>
                                                  <input type="txt" name="nombre" value="<?php echo $row['nombre']; ?>" placeholder="" onkeypress="return sololetras(event)" onpaste="return false">
                                                  </div>
                                                  <div class="cont_cajas_peque">
                                                    <label class="etiq_caja">Tipo de materia</label>
                                                    <select class="F_combo" name="id_tipo_materia" required ><option value="<?php echo $row['id_tipo_materia']; ?>" ><?php echo $row['tipo_mate']; ?></option>
                                                   <?php  $consulta4=mysqli_query($con,"SELECT * from tipo_materia");
                                                      while($row4=mysqli_fetch_array($consulta4)){
                                                      echo "<option value='".$row4['id_tipo_materia']."'>"; echo $row4['tipo_mate']; echo "</option>"; } ?> </select>
                                                  </div>

                                                  <div class="conten_botom_formu">
                                                    <input  type="submit" name="enviar" value="Modificar" class="acao">
                                                    <a href="ingreso_asignaturas.php" class="cancelar">Cancelar</a>
                                                  </div>
                                                </fieldset>

                                              </form>
                                              <script src="js/funcions.js" charset="utf-8"></script>
                                              <!-- /ajax -->
                                          </div>
                                      </div>
                                      <script src="js/jquery/dist/jquery.min.js"></script>
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
