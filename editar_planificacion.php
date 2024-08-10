<?php
    $title ="Sistema Educativo";
    include "head.php";
    include "sidebar.php";
    include('config/config.php');

    $idpre=$_REQUEST['idp'];
    $consulta="SELECT * from pre_planificacion PP inner join periodo P on P.id_periodo=PP.id_periodo inner join curso_periodo CP on CP.id_curso_periodo=PP.id_curso_periodo inner join curso C on C.id_curso=CP.id_curso inner join paralelo PL on PL.id_paralelo=CP.id_paralelo WHERE PP.id_pre_planificacion='$idpre'";
    $ejec=mysqli_query($con,$consulta);
    $row=mysqli_fetch_array($ejec);

    $ceduP=$row['cedula_profesor'];
    $consulta5=mysqli_query($con,"SELECT * from profesor where cedula='$ceduP' ");
    $row5=mysqli_fetch_array($consulta5);
    $cedulaP=$row5['cedula'];
    $nombresP=$row5['nombres']." ".$row5['apellidos'];
?>
    <div class="right_col" role=""> <!-- page content -->
        <div class="">
            <div class="page-title">


              <div class="col-md-12 col-sm-12 col-xs-12">

                  <div class="x_panel">
                      <div class="x_title">
                          <h2>Pre-Planificación </h2>
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
                              <form id="formulario" class="formulario" action="modificar_planificacion.php?idpr=<?php echo $idpre; ?>" method="post" enctype="multipart/form-data">
                                <fieldset class="fieldset_normal">
                                  <h2>Editar planificaión</h2>
                                  <hr>
                                  <div class="cont_cajas_peque">
                                    <label class="etiq_caja">Periodos</label>
                                    <select class="F_combo" name="periodo" required ><option value="<?php echo $row['id_periodo']; ?>" ><?php echo $row['periodo']; ?></option>
                                   <?php  $consulta4=mysqli_query($con,"SELECT * from periodo");
                                      while($row4=mysqli_fetch_array($consulta4)){
                                      echo "<option value='".$row4['id_periodo']."'>"; echo $row4['periodo']; echo "</option>"; } ?> </select>
                                  </div>
                                  <div class="cont_cajas_peque">
                                    <label class="etiq_caja">cursos</label>
                                    <select class="F_combo" name="cursos" required ><option value="<?php echo $row['id_curso']; ?>" ><?php echo $row['curso']." - ".$row['paralelo']; ?></option>
                                   <?php  $consulta4=mysqli_query($con,"SELECT * from curso_periodo CP inner join curso C on C.id_curso=CP.id_curso inner join paralelo PL on PL.id_paralelo=CP.id_paralelo  order by C.id_curso ASC ");
                                      while($row4=mysqli_fetch_array($consulta4)){
                                      echo "<option value='".$row4['id_curso_periodo']."'>"; echo $row4['curso']." - ".$row4['paralelo']; echo "</option>"; } ?> </select>
                                  </div>
                                  <div class="cont_cajas">
                                    <label class="etiq_caja">Profesor</label>
                                    <select class="F_combo" name="profesor" required ><option value="<?php echo $cedulaP; ?>" ><?php echo $nombresP; ?></option>
                                   <?php  $consulta4=mysqli_query($con,"SELECT * from profesor");
                                      while($row4=mysqli_fetch_array($consulta4)){
                                      echo "<option value='".$row4['cedula']."'>"; echo $row4['nombres']." ".$row4['apellidos']; echo "</option>"; } ?> </select>
                                  </div>


                                  <div class="conten_botom_formu">
                                    <input  type="submit" name="enviar" value="Agregar" class="acao">
                                    <a href="ingreso_planificacion.php" class="cancelar">Cancelar</a>
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
    </div><!-- /page content -->

<?php include "footer.php" ?>
