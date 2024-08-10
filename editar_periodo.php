<?php
    $title ="Sistema Educativo";
    include "head.php";

    include "sidebar.php";
    include('config/config.php');

    $idcp=$_REQUEST['idp'];
    $consulta="SELECT * FROM curso_periodo CP INNER JOIN paralelo P ON CP.id_paralelo=P.id_paralelo INNER JOIN curso C ON CP.id_curso=C.id_curso INNER JOIN periodo PE ON CP.id_periodo=PE.id_periodo WHERE CP.id_curso_periodo='$idcp'";
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
                                      <h1>Editar Curso del Periodo</h1>
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
                                              <form id="formulario" class="formulario" action="modificar_periodo.php?id=<?php echo $idcp; ?>" method="post" enctype="multipart/form-data">
                                                <fieldset class="fieldset_normal">
                                                  <h2>Ingrese asignacion</h2>
                                                  <hr>
                                                  <div class="cont_cajas">
                                                    <label class="etiq_caja">Periodos</label>
                                                    <select class="F_combo" name="periodo" required ><option value="<?php echo $row['id_periodo']; ?>" ><?php echo $row['periodo'];; ?></option>
                                                   <?php  $consulta4=mysqli_query($con,"SELECT * from periodo");
                                                      while($row4=mysqli_fetch_array($consulta4)){
                                                      echo "<option value='".$row4['id_periodo']."'>"; echo $row4['periodo']; echo "</option>"; } ?> </select>
                                                  </div>
                                                  <div class="cont_cajas_peque">
                                                    <label class="etiq_caja">cursos</label>
                                                    <select class="F_combo" name="cursos" required ><option value="<?php echo $row['id_curso']; ?>" ><?php echo $row['curso']; ?></option>
                                                   <?php  $consulta4=mysqli_query($con,"SELECT * from curso");
                                                      while($row4=mysqli_fetch_array($consulta4)){
                                                      echo "<option value='".$row4['id_curso']."'>"; echo $row4['curso']; echo "</option>"; } ?> </select>
                                                  </div>
                                                  <div class="cont_cajas_peque">
                                                    <label class="etiq_caja">Paralelo</label>
                                                    <select class="F_combo" name="paralelo" required ><option value="<?php echo $row['id_paralelo']; ?>" ><?php echo $row['paralelo']; ?></option>
                                                   <?php  $consulta4=mysqli_query($con,"SELECT * from paralelo");
                                                      while($row4=mysqli_fetch_array($consulta4)){
                                                      echo "<option value='".$row4['id_paralelo']."'>"; echo $row4['paralelo']; echo "</option>"; } ?> </select>
                                                  </div>


                                                  <div class="conten_botom_formu">
                                                    <input  type="submit" name="enviar" value="Modificar" class="acao">
                                                    <a href="ingreso_cursos.php" class="cancelar">Cancelar</a>
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
                      <!-- end form search -->
                  </div>
              </div>
            </div>
        </div>
    </div><!-- /page content -->

<?php include "footer.php" ?>
<script src="js/selecopciones.js" charset="utf-8"></script>
