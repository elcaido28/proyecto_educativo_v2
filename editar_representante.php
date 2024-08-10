<?php
    $title ="Sistema Educativo";
    include "head.php";
    include "sidebar.php";
    include('config/config.php');

    $id_estu=$_REQUEST['ide'];
    $id_repre=$_REQUEST['idrep'];
    $consulta="SELECT * FROM representante R INNER JOIN estado ES ON R.id_estado=ES.id_estado WHERE R.id_representante='$id_repre'";
    $ejec=mysqli_query($con,$consulta);
    $row=mysqli_fetch_array($ejec);
?>
    <div class="right_col" role=""> <!-- page content -->
        <div class="">
            <div class="page-title">


              <div class="col-md-12 col-sm-12 col-xs-12">

                  <div class="x_panel">
                      <div class="x_title">
                          <h2>Editar Representante </h2>
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
                              <form id="formulario" class="formulario" action="modificar_representante.php?id=<?php echo $id_repre ?>&ide=<?php echo $id_estu ?>" method="post" enctype="multipart/form-data">
                                <fieldset class="fieldset_normal">
                                  <h2>Editar Datos del Representante</h2>
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
                                    <select class="" name="sexo"><option><?php echo $row['sexo']; ?></option><option>Femenino</option><option>Masculino</option></select>
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
                                  <div class="cont_cajas_peque">
                                    <label class="etiq_caja">Parentesco</label>
                                  <input type="text" name="parentesco" value="<?php echo $row['parentesco']; ?>" placeholder="">
                                  </div>
                                  <div class="conten_botom_formu">
                                    <input  type="submit" name="enviar" value="Modificar" class="acao">
                                    <a href="ingreso_representante.php?id=<?php echo $id_estu ?>" class="cancelar">Cancelar</a>
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
