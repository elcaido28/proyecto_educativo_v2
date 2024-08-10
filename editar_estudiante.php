<?php
    $title ="Sistema Educativo";
    include "head.php";
    include "sidebar.php";
    include('config/config.php');

    $ide=$_REQUEST['ide'];
    $consulta="SELECT * FROM estudiante E INNER JOIN estado ES ON E.id_estado=ES.id_estado WHERE E.id_estudiante='$ide'";
    $ejec=mysqli_query($con,$consulta);
    $row=mysqli_fetch_array($ejec);
?>
    <div class="right_col" role=""> <!-- page content -->
        <div class="">
            <div class="page-title">


              <div class="col-md-12 col-sm-12 col-xs-12">

                  <div class="x_panel">
                      <div class="x_title">
                          <h2>Registrar Estudiante </h2>
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
                              <form id="formulario" class="formulario" action="modificar_estudiante.php?idem=<?php echo $ide; ?>" method="post" enctype="multipart/form-data">
                                <fieldset class="fieldset_normal">
                                  <h2>Ingrese Estudiante</h2>
                                  <hr>
                                  <!-- <h3>algunas configuraciones</h3> -->
                                  <div class="cont_cajas_peque">
                                    <label class="etiq_caja">Foto</label>
                                    <input type="file" name="foto" value="" placeholder="" accept="image/jpeg">
                                  </div>

                                  <div class="cont_cajas_peque">
                                    <label class="etiq_caja">Cedula</label>
                                    <input type="text" name="cedula" id="cedula" value="<?php echo $row['cedula']; ?>" maxlength="10" placeholder="" onkeypress="return solonumeroRUC(event)" >
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
                                    <select class="" name="sexo"><option><?php echo $row['sexo']; ?><option>Femenino</option><option>Masculino</option></select>
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
                                  <div class="conten_botom_formu">
                                    <input  type="submit" name="enviar" value="Modificar" class="acao">
                                    <a href="ingreso_estudiantes.php" class="cancelar">Cancelar</a>
                                  </div>
                                </fieldset>

                              </form>
                              <script src="js/funcions.js" charset="utf-8"></script>
                              <!-- /ajax -->
                              <script type="text/javascript">
                              $(document).on('keyup','#cedula', function(){
                                var cedula = document.getElementById('cedula').value;
                                array = cedula.split( "" );
                                num = array.length;
                                if ( num == 10 )
                                {
                                  total = 0;
                                  digito = (array[9]*1);
                                  for( i=0; i < (num-1); i++ )
                                  {
                                    mult = 0;
                                    if ( ( i%2 ) != 0 ) {
                                      total = total + ( array[i] * 1 );
                                    }
                                    else
                                    {
                                      mult = array[i] * 2;
                                      if ( mult > 9 )
                                        total = total + ( mult - 9 );
                                      else
                                        total = total + mult;
                                    }
                                  }
                                  decena = total / 10;
                                  decena = Math.floor( decena );
                                  decena = ( decena + 1 ) * 10;
                                  final = ( decena - total );
                                  if ( ( final == 10 && digito == 0 ) || ( final == digito ) ) {
                                    $("#cedula").css({
                                      "background-color": "rgba(56,208,49,0.5)"
                                    });
                                    return true;
                                  }
                                  else
                                  {
                                    alert( "La c\xe9dula NO es v\xe1lida!!!" );
                                    document.getElementById('cedula').value="";
                                    $("#cedula").css({
                                      "background-color": "rgba(0,0,0,0)"
                                    });
                                    return false;
                                  }
                                }
                                else
                                {

                                  return false;
                                }
                              });
                              </script>

                          </div>
                      </div>
                      <script src="js/jquery/dist/jquery.min.js"></script>
                      <script src="jquery.dataTables.min.js" charset="utf-8"></script>
                  </div>
              </div>
            </div>
        </div>
    </div><!-- /page content -->

<?php include "footer.php" ?>
