<?php
    $title ="Rodech S.A.";
    include "head.php";
    include "sidebar.php";

?>
    <div class="right_col" role="main"> <!-- page content -->
        <div class="">
            <div class="page-title">
                <div class="row top_tiles">
                    <?php if(isset($_SESSION['PRIV']) && $_SESSION['PRIV']=="Administrador" || isset($_SESSION['PRIV']) && $_SESSION['PRIV']=="Secretaria"){ ?>
                    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="tile-stats">
                          <div class="icon"><i class="fab fa-houzz"></i></div>
                          <?php $num_consu=mysqli_num_rows(mysqli_query($con,"SELECT * from curso ")); ?>
                          <div class="count"><?php echo $num_consu;//echo mysqli_num_rows($TicketData) ?></div>
                          <h3>Cusos</h3>
                        </div>
                    </div>
                    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="tile-stats">
                          <div class="icon"><i class="fas fa-user-tie"></i></div>
                          <?php $num_consu=mysqli_num_rows(mysqli_query($con,"SELECT * from profesor ")); ?>
                          <div class="count"><?php echo $num_consu;//echo mysqli_num_rows($ProjectData) ?></div>
                          <h3>Profesores</h3>
                        </div>
                    </div>
                    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="tile-stats">
                          <div class="icon"><i class="fas fa-user-graduate"></i></div>
                          <?php $num_consu=mysqli_num_rows(mysqli_query($con,"SELECT * from estudiante")); ?>
                          <div class="count"><?php echo $num_consu;//echo mysqli_num_rows($CategoryData) ?></div>
                          <h3>Estudiantes</h3>
                        </div>
                    </div>

                    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="tile-stats">
                          <div class="icon"><i class="fas fa-user"></i></div>
                          <?php $num_consu=mysqli_num_rows(mysqli_query($con,"SELECT * from representante")); ?>
                          <div class="count"><?php echo $num_consu;//echo mysqli_num_rows($CategoryData) ?></div>
                          <h3>Representante</h3>
                        </div>
                    </div>
                  <?php } ?>
                    <!-- <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="tile-stats">
                          <div class="icon"><i class="fas fa-users"></i></div>
                          <div class="count"><?php// echo 1;//echo mysqli_num_rows($UserData) ?></div>
                          <h3>Usuarios</h3>
                        </div>
                    </div> -->
                </div>
                <!-- content -->
                <br><br>
                <div class="row">
                    <div class="col-md-4">

                        <div id="respuesta"></div>
                    </div>

                </div>
            </div>
        </div>
    </div><!-- /page content -->

<?php include "footer.php" ?>
