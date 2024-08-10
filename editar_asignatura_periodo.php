<?php
    $title ="Sistema Educativo";
    include "head.php";

    include "sidebar.php";
    include('config/config.php');

    $ida=$_REQUEST['id'];
    $consulta="SELECT * FROM asignatura_periodo AP INNER JOIN asignatura A ON AP.id_asignatura=A.id_asignatura INNER JOIN periodo P ON AP.id_periodo=P.id_periodo WHERE AP.id_asignatura_periodo='$ida'";
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
                                          <div class="clearfix"></div>
                                      </div>
                                      <div class="x_content">
                                          <div class="table-responsive">
                                              <!-- ajax -->
                                              <form id="formulario" class="formulario" action="modificar_asignatura_periodo.php?id=<?php echo $ida; ?>" method="post" enctype="multipart/form-data">
                                                <fieldset class="fieldset_normal">
                                                  <h2>Editar Asignatura del Periodo</h2>
                                                  <hr>
                                                  <!-- <h3>algunas configuraciones</h3> -->

                                                  <div class="cont_cajas_peque">
                                                    <label class="etiq_caja">Periodos</label>
                                                    <select class="F_combo" name="periodo" required ><option value="<?php echo $row['id_periodo']; ?>" ><?php echo $row['periodo']; ?></option>
                                                   <?php  $consulta4=mysqli_query($con,"SELECT * from periodo");
                                                      while($row4=mysqli_fetch_array($consulta4)){
                                                      echo "<option value='".$row4['id_periodo']."'>"; echo $row4['periodo']; echo "</option>"; } ?> </select>
                                                  </div>
                                                  <div class="cont_cajas_peque">
                                                    <label class="etiq_caja">Asignatura</label>
                                                    <select class="F_combo" name="asignatura" required ><option value="<?php echo $row['id_asignatura']; ?>" ><?php echo $row['nombre']; ?></option>
                                                   <?php  $consulta4=mysqli_query($con,"SELECT * from asignatura");
                                                      while($row4=mysqli_fetch_array($consulta4)){
                                                      echo "<option value='".$row4['id_asignatura']."'>"; echo $row4['nombre']; echo "</option>"; } ?> </select>
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
