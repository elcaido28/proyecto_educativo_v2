        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu"><!-- sidebar menu -->
            <div class="menu_section">
                <ul class="nav side-menu">
                  <?php if(isset($_SESSION['PRIV']) && $_SESSION['PRIV']=="Administrador"  ||  isset($_SESSION['PRIV']) && $_SESSION['PRIV']=="Secretaria"){ ?>
                    <li class="<?php if(isset($active1)){echo $active1;}?>">
                        <a href="dashboard.php"><i class="fas fa-home"></i> Inicio</a>
                    </li>

                    <li class="<?php if(isset($active2)){echo $active2;}?>">
                        <a href="ingreso_profesores.php"><i class="fas fa-user-tie"></i> Profesores</a>
                    </li>

                    <li class="<?php if(isset($active3)){echo $active3;}?>">
                        <a href="ingreso_estudiantes.php"><i class="fas fa-user-graduate"></i> Estudiantes</a>
                    </li>
                    <li class="<?php if(isset($active4)){echo $active4;}?>">
                        <a href="ingreso_cursos.php"><i class="fab fa-houzz"></i> cursos</a>
                    </li>
                    <li class="<?php if(isset($active5)){echo $active5;}?>">
                        <a href="ingreso_asignaturas.php"><i class="fas fa-book-open"></i>  Asignaturas</a>
                    </li>
                    <li class="<?php if(isset($active6)){echo $active6;}?>">
                        <a href="ingreso_planificacion.php"><i class="fas fa-project-diagram"></i>  Pre-Planificación</a>
                    </li>
                    <li class="<?php if(isset($active7)){echo $active7;}?>">
                        <a href="ingreso_matricula.php"><i class="far fa-id-card"></i> Matricula</a>
                    </li>
                    <li class="<?php if(isset($active15)){echo $active15;}?>">
                        <a href="ingreso_lista_resprese_estu.php"><i class="fas fa-users"></i> Estudiantes por Representante</a>
                    </li>
                    <li class="<?php if(isset($active16)){echo $active16;}?>">
                        <a href="ingreso_lista_estudiantes.php"><i class="fas fa-users"></i> Estudiantes por Curso</a>
                    </li>
                  </li>
                  <li class="<?php if(isset($active13)){echo $active13;}?>">
                      <a href="vista_libreta2.php"><i class="fas fa-table"></i> Libreta</a>
                  </li>
                  <?php } ?>
<?php if(isset($_SESSION['PRIV']) && $_SESSION['PRIV']=="Administrador"){ ?>
                  <li class="<?php if(isset($active14)){echo $active14;}?>">
                      <a href="ingreso_reportes.php"><i class="far fa-id-card"></i> Reportes</a>
                  </li>
                  <?php } ?>
                  <?php if(isset($_SESSION['PRIV']) && $_SESSION['PRIV']=="Profesor"){ ?>
                    <li class="<?php if(isset($active8)){echo $active8;}?>">
                        <a href="ingreso_diario.php"><i class="fas fa-book"></i> Diario</a>
                    </li>
                    <li class="<?php if(isset($active10)){echo $active10;}?>">
                        <a href="interfaz_chat.php"><i class="far fa-comments"></i> Comentarios</a>
                    </li>
                    <li class="<?php if(isset($active11)){echo $active11;}?>">
                        <a href="ingreso_calificacion1.php"><i class="fas fa-sort-numeric-up"></i> Calificaciones</a>
                    </li>
                    <li class="<?php if(isset($active16)){echo $active16;}?>">
                        <a href="ingreso_lista_estudiantes2.php"><i class="fas fa-users"></i> Estudiantes por Curso</a>
                    </li>

                    <?php } ?>
                    <?php if(isset($_SESSION['PRIV']) && $_SESSION['PRIV']=="Representante"){ ?>
                    <li class="<?php if(isset($active9)){echo $active9;}?>">
                        <a href="interfaz_vista.php"><i class="fas fa-book"></i> Ver Diario</a>
                    </li>
                    <li class="<?php if(isset($active12)){echo $active12;}?>">
                        <a href="interfaz_chat.php"><i class="far fa-comments"></i>Comentarios</a>
                    </li>
                    <li class="<?php if(isset($active13)){echo $active13;}?>">
                        <a href="vista_libreta.php"><i class="fas fa-table"></i> Libreta</a>
                    </li>



                    <?php } ?>
                    <?php if(isset($_SESSION['PRIV']) && $_SESSION['PRIV']=="Estudiante"){ ?>
                    <li class="<?php if(isset($active9)){echo $active9;}?>">
                        <a href="interfaz_vista.php"><i class="fas fa-book"></i> Ver Diario</a>
                    </li>
                    <?php } ?>

                    <!-- <li class="<?php //if(isset($active4)){echo $active4;}?>">
                        <a href="categories.php"><i class="fa fa-align-left"></i> Categorias</a>
                    </li>

                    <li class="<?php //if(isset($active5)){echo $active5;}?>">
                        <a href="reports.php"><i class="fa fa-area-chart"></i> Reportes</a>
                    </li>

                    <li class="<?php //if(isset($active6)){echo $active6;}?>">
                        <a href="users.php"><i class="fa fa-users"></i> Usuarios</a>
                    </li>

                    <li class="<?php //if(isset($active8)){echo $active8;}?>">
                        <a href="about.php"><i class="fa fa-child"></i> Sobre Mi</a>
                    </li> -->

                </ul>
            </div>
        </div><!-- /sidebar menu -->
    </div>
</div>

    <div class="top_nav"><!-- top navigation -->
        <div class="nav_menu">
            <nav>
                <div class="nav toggle">
                    <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                </div>
                <ul class="nav navbar-nav navbar-right">
                    <li class="">
                        <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            <img src="<?php echo $_SESSION['FOTO']; ?>" alt="">
                            <span class=" fa fa-angle-down"></span>
                        </a>
                        <ul class="dropdown-menu dropdown-usermenu pull-right">
                            <li><a href="dashboard.php"><i class="fa fa-user"></i> Mi cuenta</a></li>
                            <li><a href="action/logout.php"><i class="fa fa-sign-out pull-right"></i> Cerrar Sesión</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </div><!-- /top navigation -->
