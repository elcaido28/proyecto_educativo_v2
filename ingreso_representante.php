<?php
    $title ="Sistema Educativo";
    include "head.php";
    include "sidebar.php";
    include('config/config.php');
    $id_estu=$_REQUEST['id'];
?>
    <div class="right_col" role=""> <!-- page content -->
        <div class="">
            <div class="page-title">


              <div class="col-md-12 col-sm-12 col-xs-12">

                  <div class="x_panel">
                      <div class="x_title">
                          <h2>Registrar Representante </h2>
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
                              <form id="formulario" class="formulario" action="guardar_representante.php?id=<?php echo $id_estu ?>" method="post" enctype="multipart/form-data">
                                <fieldset class="fieldset_normal">
                                  <h2>Ingrese Representante</h2>
                                  <hr>
                                  <!-- <h3>algunas configuraciones</h3> -->
                                  <div class="cont_cajas_peque">
                                    <label class="etiq_caja">Foto</label>
                                    <input type="file" name="foto" value="" placeholder="" accept="image/jpeg">
                                  </div>

                                  <div class="cont_cajas_peque">
                                    <label class="etiq_caja">Cedula</label>
                                    <input type="text" name="cedula" value="" id="cedula" placeholder="" maxlength="10" onkeypress="return solonumeroRUC(event)" >
                                  </div>
                                  <div class="cont_cajas_peque">
                                    <label class="etiq_caja">Nombres</label>
                                  <input type="txt" name="nombres" value="" placeholder="" onkeypress="return sololetras(event)" onpaste="return false">
                                  </div>
                                  <div class="cont_cajas_peque">
                                    <label class="etiq_caja">Apellidos</label>
                                  <input type="txt" name="apellidos" value="" placeholder="" onkeypress="return sololetras(event)" onpaste="return false">
                                  </div>
                                  <div class="cont_cajas_peque">
                                    <label class="etiq_caja">Sexo</label>
                                    <select class="" name="sexo"><option value="">-SELECIONE-</option><option>Femenino</option><option>Masculino</option></select>
                                  </div>
                                  <div class="cont_cajas_peque">
                                  <label class="etiq_caja">Fecha de nacimineto</label>
                                  <input type="date" name="fecha_naci" value="" id="fecha" onchange="fecha_edad(this.value);" placeholder="">
                                  </div>
                                  <div class="cont_cajas_peque">
                                    <label class="etiq_caja">Dirección</label>
                                  <input type="text" name="direccion" value="" placeholder="">
                                  </div>
                                  <div class="cont_cajas_peque">
                                    <label class="etiq_caja">Correo</label>
                                  <input type="email" name="correo" value="" placeholder="">
                                  </div>
                                  <div class="cont_cajas_peque">
                                    <label class="etiq_caja">Parentesco</label>
                                  <input type="text" name="parentesco" value="" placeholder="">
                                  </div>
                                  <!-- <div class="cont_cajas">
                                    <label class="etiq_caja">Privilegio</label>
                                    <select class="F_combo" name="privi" required ><option value="" >-SELECCIONE-</option>
                                   <?php /* $consulta4=mysqli_query($con,"SELECT * from privilegios");
                                      while($row4=mysqli_fetch_array($consulta4)){
                                      echo "<option value='".$row4['id_privilegios']."'>"; echo $row4['privilegios']; echo "</option>"; }*/ ?> </select>
                                  </div> -->

                                  <div class="conten_botom_formu">
                                    <input  type="submit" name="enviar" value="Enviar" class="acao">
                                    <a href="ingreso_estudiantes.php" class="cancelar">Cancelar</a>
                                  </div>
                                </fieldset>

                              </form>
                              <script src="js/funcions.js" charset="utf-8"></script>
                              <!-- /ajax -->
                              <script type="text/javascript">
                                function fecha_edad() {
                                    var fecha_actual = new Date();
                                    var fecha = document.getElementById('fecha').value;
                                    var ano=fecha.substr(0,4);
                                    var ano_actual= fecha_actual.getFullYear();
                                    var mayor=parseInt(ano)+18;
                                    if (mayor>ano_actual) {
                                      alert("Tiene que ser Mayor de edad");
                                      var fecha = document.getElementById('fecha').value="00-00-0000";

                                    }
                                }
                              </script>

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

                      <div class="cont_tabla">
                        <table class="tabla" >
                            <thead>
                              <tr>
                              <th>FOTO</th>
                              <th>CEDULA</th>
                              <th>NOMBRES</th>
                              <th>APELLIDOS</th>
                              <th>SEXO</th>
                              <th>FECHA / NACIMIENTO</th>
                              <th>DIRECCIÓN</th>
                              <th>PARENTESCO</th>
                              <th>EDITAR / BORRAR</th>
                              </tr>
                              </thead>
                              <tr>
                                <?php

                                $consulta=mysqli_query($con,"SELECT * from representante R INNER JOIN estado E ON R.id_estado=E.id_estado WHERE R.id_estado='1' AND id_estudiante='$id_estu' ORDER BY fecha DESC ");
                                 while($row=mysqli_fetch_array($consulta)){
                                ?>
                                      <td> <img src=" <?php echo $row['foto']; ?>" alt="" width="100" height="100"> </td>
                                      <td><?php echo $row['cedula']; ?> </td>
                                      <td><?php echo $row['nombres'] ?> </td>
                                      <td><?php echo $row['apellidos']; ?> </td>
                                      <td><?php echo $row['sexo']; ?> </td>
                                      <td><?php echo $row['fecha_naci'] ?> </td>
                                      <td><?php echo $row['direccion'] ?> </td>
                                      <td><?php echo $row['parentesco'] ?> </td>
                                      <td> <div class="cont_tbn_tb"><a href="editar_representante.php?idrep=<?php echo $row['id_representante']; ?>&ide=<?php echo $id_estu;?> "><button type="button" title="Modificar" class="modificar" name="button"><i class="far fa-edit"> </i></button></a>
                                      <button type="button" class="eliminar" title="Eliminar" name="button"><i class="far fa-trash-alt"> </i></button></div></td>
                          </tr>
                          <script type="text/javascript">
                            $('.eliminar').click(function(e){
                             if (confirm("¿Está segur@ de ELIMINAR?")){
                                document.location.href="eliminar_representante.php?id=<?php echo $row['id_representante'];?>&idest=<?php echo $id_estu; ?>";
                              }else{
                                document.location.href="ingreso_representante.php";
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
    </div><!-- /page content -->

<?php include "footer.php" ?>
