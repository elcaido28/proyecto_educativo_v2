<?php
    $title ="Sistema Educativo";
    include "head.php";
    include "sidebar.php";
    include('config/config.php');

    $idpro=$_REQUEST['idp'];
    $consulta="SELECT * FROM profesor P INNER JOIN estado E ON P.id_estado=E.id_estado WHERE P.id_profesor='$idpro'";
    $ejec=mysqli_query($con,$consulta);
    $row=mysqli_fetch_array($ejec);
?>
    <div class="right_col" role=""> <!-- page content -->
        <div class="">
            <div class="page-title">


              <div class="col-md-12 col-sm-12 col-xs-12">

                  <div class="x_panel">
                      <div class="x_title">
                          <h2>Registrar Profesores </h2>
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
                              <form id="formulario" class="formulario" action="modificar_profesor.php?id=<?php echo $idpro; ?>" method="post" enctype="multipart/form-data">
                                <fieldset class="fieldset_normal">
                                  <h2>Ingrese Profesores</h2>
                                  <hr>
                                  <!-- <h3>algunas configuraciones</h3> -->
                                  <div class="cont_cajas_peque">
                                    <label class="etiq_caja">Foto</label>
                                    <input type="file" name="foto" value="" placeholder="" accept="image/jpeg">
                                  </div>

                                  <div class="cont_cajas_peque">
                                    <label class="etiq_caja">Cedula</label>
                                    <input type="text" name="cedula" value="<?php echo $row['cedula']; ?>" placeholder="" maxlength="10" onkeypress="return solonumeroRUC(event)" >
                                  </div>
                                  <div class="cont_cajas_peque">
                                    <label class="etiq_caja">Nombres</label>
                                  <input type="txt" name="nombres" value="<?php echo $row['nombres']; ?>" placeholder="" onkeypress="return sololetras(event)" onpaste="return false">
                                  </div>
                                  <div class="cont_cajas_peque">
                                    <label class="etiq_caja">Apellidos</label>
                                  <input type="txt" name="apellidos" value="<?php echo $row['apellidos']; ?>" placeholder="" onkeypress="return sololetras(event)" onpaste="return false">
                                  </div>
                                  <div class="cont_cajas_peque">
                                    <label class="etiq_caja">Sexo</label>
                                    <select class="" name="sexo"><option value="<?php echo $row['sexo']; ?>"><?php echo $row['sexo']; ?></option><option>Femenino</option><option>Masculino</option></select>
                                  </div>
                                  <div class="cont_cajas_peque">
                                  <label class="etiq_caja">Fecha de nacimineto</label>
                                  <input type="date" name="fecha_naci" value="<?php echo $row['fecha_naci']; ?>" placeholder="">
                                  </div>
                                  <div class="cont_cajas_peque">
                                    <label class="etiq_caja">Dirección</label>
                                  <input type="text" name="direccion" value="<?php echo $row['direccion']; ?>" placeholder="">
                                  </div>
                                  <div class="cont_cajas_peque">
                                    <label class="etiq_caja">Correo</label>
                                  <input type="email" name="correo" value="<?php echo $row['email']; ?>" placeholder="">
                                  </div>
                                  <!-- <div class="cont_cajas">
                                    <label class="etiq_caja">Privilegio</label>
                                    <select class="F_combo" name="privi" required ><option value="" >-SELECCIONE-</option>
                                   <?php /* $consulta4=mysqli_query($con,"SELECT * from privilegios");
                                      while($row4=mysqli_fetch_array($consulta4)){
                                      echo "<option value='".$row4['id_privilegios']."'>"; echo $row4['privilegios']; echo "</option>"; }*/ ?> </select>
                                  </div> -->

                                  <div class="conten_botom_formu">
                                    <input  type="submit" name="enviar" value="Modificar" class="acao">
                                    <a href="ingreso_profesores.php" class="cancelar">Cancelar</a>
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
