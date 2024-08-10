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
                          <h2>Lista de Estudiantes por curso </h2>
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

                      <script src="js/jquery/dist/jquery.min.js"></script>
                      <script src="jquery.dataTables.min.js" charset="utf-8"></script>


                                <?php
                                $consulta=mysqli_query($con,"SELECT * from periodo order by id_periodo ASC ");
                                 while($row=mysqli_fetch_array($consulta)){
                                    $idperiodo=$row['id_periodo'];
                                  }
                                $consulta2=mysqli_query($con,"SELECT * from curso_periodo CP inner join curso C on C.id_curso=CP.id_curso inner join paralelo P on P.id_paralelo=CP.id_paralelo where CP.id_periodo='$idperiodo' ");
                                 while($row2=mysqli_fetch_array($consulta2)){
                                    $idcurso=$row2['id_curso_periodo'];
?>
<h1><?php echo $row2['curso']." ".$row2['paralelo'];;  ?></h1>
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
        </tr>
        </thead>
        <tr>
<?php
                                $consulta3=mysqli_query($con,"SELECT * from matricula M inner join estudiante E on E.id_estudiante=M.id_estudiante  WHERE M.id_estado='1' and M.id_curso_periodo='$idcurso' ");
                                 while($row3=mysqli_fetch_array($consulta3)){
                                ?>

                                      <td> <img src=" <?php echo $row3['foto']; ?>" alt="" width="100" height="100"> </td>
                                      <td><?php echo $row3['cedula']; ?> </td>
                                      <td><?php echo $row3['nombres'] ?> </td>
                                      <td><?php echo $row3['apellidos']; ?> </td>
                                      <td><?php echo $row3['sexo']; ?> </td>
                                      <td><?php echo $row3['fecha_naci'] ?> </td>
                                      <td><?php echo $row3['direccion'] ?> </td>
                          </tr>

                                <?php
                              } ?></table><br><br><br><?php }
                                ?>

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
