<?php
    $title ="Sistema Educativo";
    include "head.php";

    include "sidebar.php";
    include('config/config.php');

    $idpa=$_REQUEST['idp'];
    $consulta="SELECT * FROM paralelo P WHERE P.id_paralelo='$idpa'";
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
                                      <h1>Editar Paralelo</h1>
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
                                              <form id="formulario" class="formulario" action="modificar_paralelo.php?id=<?php echo $idpa; ?>" method="post" enctype="multipart/form-data">
                                                <fieldset class="fieldset_normal">
                                                  <h2>Editar Paralelo</h2>
                                                  <hr>
                                                  <!-- <h3>algunas configuraciones</h3> -->

                                                  <div class="cont_cajas_peque">
                                                    <label class="etiq_caja">Paralelo</label>
                                                  <input type="txt" name="curso" value="<?php echo $row['paralelo']; ?>" placeholder="" maxlength="2" onkeypress="return sololetras(event)" onpaste="return false">
                                                  </div>
                                                  <div class="cont_cajas_peque">
                                                    <label class="etiq_caja">capacidad</label>
                                                  <input type="txt" name="cantidad" value="<?php echo $row['cantidad']; ?>" placeholder="" maxlength="2" onkeypress="return solonumeroRUC(event)" onpaste="return false">
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
