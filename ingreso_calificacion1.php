<?php
    $title ="Sistema Educativo";
    include "head.php";
    include "sidebar.php";
    include('config/config.php');
?>
    <div class="right_col" role=""> <!-- page content -->
        <div class="">
            <div class="page-title">


              <div class="col-md-12 col-sm-12 col-xs-12">

                  <div class="x_panel">
                      <div class="x_title">
                          <h2>Calificaciones </h2>
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
                              <form id="formulario" class="formulario" action="ingreso_calificacion2.php" method="post" >
                                <fieldset class="fieldset_normal">
                                  <h2>Calificacion - Paso 1</h2>
                                  <hr>
                                  <!-- <div class="cont_cajas_peque">
                                    <label class="etiq_caja">Foto</label>
                                    <input type="file" name="foto" value="" placeholder="">
                                  </div> -->

                                  <div class="cont_cajas_peque">
                                    <label class="etiq_caja">Periodos</label>
                                    <select class="F_combo" name="periodo" id="periodo" required ><option value="" >-SELECCIONE-</option>
                                   <?php  $consulta4=mysqli_query($con,"SELECT * from periodo");
                                      while($row4=mysqli_fetch_array($consulta4)){
                                      echo "<option value='".$row4['id_periodo']."'>"; echo $row4['periodo']; echo "</option>"; } ?> </select>
                                  </div>
                                  <div class="cont_cajas_peque" id="cont_comb_curso">
                                    <label class="etiq_caja">Curso</label>
                                  <select class="F_combo" name="curso" required ><option value="" >-SELECCIONE-</option></select>
                                  </div>

                                  <div class="conten_botom_formu">
                                    <input  type="submit" name="enviar" value="Siguiente" class="acao">
                                  </div>
                                </fieldset>

                              </form>
                              <script src="js/funcions.js" charset="utf-8"></script>
                              <!-- /ajax -->
                          </div>
                      </div>
                  </div>
              </div>

<script type="text/javascript">

$(buscar_curso());

function buscar_curso(consul){
  $.ajax({
    url: 'ajax_curso2.php',
    type: 'POST',
    dataType: 'html',
    data: {consul: consul},
  })
  .done(function(respuesta){
  if(respuesta!=0){
    $('#cont_comb_curso').html(respuesta);
  }
  })
  .fail(function(){
    console.log("error")
  })
}
$(document).on('change','#periodo', function(){
  var valr= $(this).val();
  if(valr!=""){
    buscar_curso(valr);
  }
});

</script>


            </div>
        </div>
    </div><!-- /page content -->

<?php include "footer.php" ?>
