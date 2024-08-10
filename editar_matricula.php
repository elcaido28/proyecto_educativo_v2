<?php
    $title ="Sistema Educativo";
    include "head.php";
    include "sidebar.php";
    include('config/config.php');

    $idmat=$_REQUEST['idm'];
    $consulta="SELECT * from matricula M inner join estudiante E on E.id_estudiante=M.id_estudiante inner join periodo P on P.id_periodo=M.id_periodo inner join curso_periodo CP on CP.id_curso_periodo=M.id_curso_periodo inner join curso C on C.id_curso=CP.id_curso inner join paralelo PL on PL.id_paralelo=CP.id_paralelo WHERE M.id_matricula='$idmat'";
    $ejec=mysqli_query($con,$consulta);
    $row=mysqli_fetch_array($ejec);

    $id_rep=$row['id_representante'];
    $consul55=mysqli_query($con,"SELECT * from representante where id_representante='$id_rep'");
    $row55=mysqli_fetch_assoc($consul55);
    $cedula=$row55['cedula'];
?>
    <div class="right_col" role=""> <!-- page content -->
        <div class="">
            <div class="page-title">


              <div class="col-md-12 col-sm-12 col-xs-12">

                  <div class="x_panel">
                      <div class="x_title">
                          <h2>Editar Matricula </h2>
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
                              <form id="formulario" class="formulario" action="modificar_matricula.php?num=<?php echo $idmat; ?>" method="post" enctype="multipart/form-data">
                                <fieldset class="fieldset_normal">
                                  <h2>Datos Estudiante</h2>
                                  <hr>
                                  <!-- <h3>algunas configuraciones</h3> -->
                                  <div class="cont_cajas_peque">
                                    <label class="etiq_caja">Nº Matricula</label>
                                    <input type="text" name="num_matri" value="<?php echo $row['num_matricula']; ?>" placeholder="" onkeypress="return enable(event)" onpaste="return false">
                                  </div>
                                  <div class="cont_cajas_peque">
                                    <label class="etiq_caja">Periodos</label>
                                    <select class="F_combo" id="periodo" name="periodo" required ><option value="<?php echo $row['id_periodo']; ?>" ><?php echo $row['periodo']; ?></option>
                                   <?php  $consulta4=mysqli_query($con,"SELECT * from periodo");
                                      while($row4=mysqli_fetch_array($consulta4)){
                                      echo "<option value='".$row4['id_periodo']."'>"; echo $row4['periodo']; echo "</option>"; } ?> </select>
                                  </div>
                                 <div class="cont_cajas_peque">
                                    <label class="etiq_caja">Estudiante</label>
                                    <select class="F_combo" id="estudiante" name="estudiante" required ><option value="<?php echo $row['id_estudiante']; ?>" ><?php echo $row['nombres']." ".$row['apellidos']; ?></option>
                                   <?php  $consulta4=mysqli_query($con,"SELECT * from estudiante");
                                      while($row4=mysqli_fetch_array($consulta4)){
                                      echo "<option value='".$row4['id_estudiante']."'>"; echo $row4['nombres']." ". $row4['apellidos']; echo "</option>"; } ?> </select>
                                  </div>


                                  <div class="cont_cajas_peque">
                                    <label class="etiq_caja">Representante</label>
                                    <!-- <input type="text" id="representa" name="representante" value="<?php echo $cedula; ?>" placeholder=""> -->
                                    <input type="text" name="representante" value="<?php echo $cedula; ?>" placeholder="" onkeypress="return enable(event)" onpaste="return false">
                                  </div>

                                  <div class="cont_cajas_peque" id="cont_comb_curso">
                                     <label class="etiq_caja">Curso</label>
                                     <select class="F_combo" name="curso" required ><option value="" >-SELECCIONE-</option></select>
                                   </div>
                                   <script src="ajax_cedula_representante.js" charset="utf-8"></script>
                                   <script src="ajax_cursos.js" charset="utf-8"></script>



                                  <div class="conten_botom_formu">
                                    <input  type="submit" name="enviar" value="Modificar" class="acao">
                                    <a href="ingreso_matricula.php" class="cancelar">Cancelar</a>
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
