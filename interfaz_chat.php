<?php
    $title ="Sistema Educativo";
    include "head.php";
    include "sidebar.php";
    include('config/config.php');

    // $ida=$_REQUEST['id'];
    if(isset($_SESSION['PRIV']) && $_SESSION['PRIV']=="Profesor"){
      $log_person="Docente";
      $id_profesor=$_SESSION['ID_pro'];
      $ced_profesor=$_SESSION['CEDU'];
      //BUSCAR DATOS DEL CHAT
      $consulta="SELECT * from chat_parental CH INNER JOIN curso_periodo CP ON CH.id_curso_periodo=CP.id_curso_periodo INNER JOIN matricula M ON CP.id_curso_periodo=M.id_curso_periodo INNER JOIN pre_planificacion PP ON CP.id_curso_periodo=PP.id_curso_periodo INNER JOIN curso C ON CP.id_curso=C.id_curso INNER JOIN paralelo P ON CP.id_paralelo=P.id_paralelo WHERE CH.id_profesor='$id_profesor' ORDER BY CH.id_chat DESC";
      $ejec=mysqli_query($con,$consulta);
      $row22=mysqli_fetch_array($ejec);
      $row23=mysqli_num_rows($ejec);
      $nom_curso=$row22['curso']." - ".$row22['paralelo'];
      $estudiante=$row22['id_estudiante'];

    }elseif(isset($_SESSION['PRIV']) && $_SESSION['PRIV']=="Representante"){
      $log_person="Representante";
      $idrepresentante=$_SESSION['ID_rep'];
      $cons1="SELECT * FROM matricula M INNER JOIN curso_periodo CP ON M.id_curso_periodo=CP.id_curso_periodo inner join representante R on R.id_representante=M.id_representante WHERE M.id_representante='$idrepresentante'";
      $ejec1=mysqli_query($con,$cons1);
      $row1=mysqli_fetch_array($ejec1);
      $curso=$row1['id_curso_periodo'];
      $consulta="SELECT * from chat_parental CH WHERE CH.id_curso_periodo='$curso' ORDER BY CH.id_chat DESC";
      $ejec=mysqli_query($con,$consulta);
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
  <link href="css/custom.min.css" rel="stylesheet">
        <link rel="stylesheet" href="css/esti_formu.css">
</head>
<body>
    <div class="right_col" role="">
        <div class="">
            <div class="page-title">


              <div class="col-md-12 col-sm-12 col-xs-12">

                  <div class="x_panel">
                      <div class="x_title">
                          <h2>Chat de Control</h2>
                          <ul class="nav navbar-right panel_toolbox">
                              <!-- <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                              </li>
                              <li><a class="close-link"><i class="fa fa-close"></i></a>
                              </li> -->
                          </ul>
                          <div class="clearfix"></div>
                      </div>

                      <div class="x_content">
                          <div class="table-responsive">
                            <form id="formulario" class="formulario" action="guardar_chat.php" method="post" enctype="multipart/form-data">
                                <fieldset class="fieldset_x">
                                  <h2>Vista del <?php echo $log_person; ?></h2>
                                  <div class="cont_cajas">
                                    <label class="etiq_caja">Mensaje</label>
                                    <input type="text" name="mensaje" value="" placeholder="Escriba su mensaje"><button>Enviar</button>
                                  </div>
                                </fieldset>
                            </form>
                            <div id="formulario" class="formulario">
                              <fieldset class="fieldset_xg">
                                  <div class="cont_cajas_peque">
                                    <!-- <label class="etiq_caja">Foto</label>
                                    <input type="file" name="foto" value="" placeholder=""> -->
                                  </div>
                                  <div class="cont_cajas">
                                    <label class="etiq_caja">Historial</label>
                                    <hr>
                                    <?php while ($row=mysqli_fetch_array($ejec)) { ?>
                                    <textarea name="" id="" cols="30" rows="2" disabled><?php echo $row['descripcion']; ?></textarea>
                                    <?php } ?>
                                  </div>
                                  <!-- <div class="conten_botom_formu">
                                    <input  type="submit" name="enviar" value="Guardar" class="acao">
                                    <a href="" class="cancelar">Cancelar</a>
                                  </div> -->
                                </fieldset>
                            </div>
                            <script src="js/funcions.js" charset="utf-8"></script>
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
