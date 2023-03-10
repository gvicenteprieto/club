<?php include("head.php"); ?>

<div class="fondo_menu">
    <div>
        <nav class="navbar navbar-expand-lg login navbar-dark">
            <div class="container-fluid m-2">
                <div class="p-1 mt-2 text-center text-success animate__animated animate__pulse">
                    <a href="/login/view/home/panelControl.php">
                        <i class="fa-regular fa-futbol icono_login"> CLUB SOCIAL</i>
                    </a>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" 
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <?php   
                    //si el usuario no está logueado:
                    if (empty($_SESSION['usuario'])) : ?>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item"></li>
                        </ul>
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a href="/login/view/home/login.php" class="boton_nav-login bg-success mt-1 p-2">Ingresar</a>
                            </li>
                        </ul>
                    </div>
                    
                <?php elseif ($_SESSION['usuario'] == "admin") : ?>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            <li class="nav-item animate__animated animate__backInLeft">
                                <a class="nav-link text-warning mt-1" href="/login/secciones/vista_usuarios.php">
                                    USUARIOS
                                </a>
                            </li>
                        </ul>
                        <ul class="navbar-nav">
                            <li class="nav-item animate__animated animate__backInLeft">
                                <a class="nav-link text-warning mt-1" href="/login/secciones/vista_actividades.php">
                                    ACTIVIDADES
                                </a>
                            </li>
                        </ul>
                        <ul class="navbar-nav">
                            <li class="nav-item animate__animated animate__backInLeft">
                                <a class="nav-link text-warning mt-1" href="/login/secciones/vista_socios.php">
                                    SOCIOS
                                </a>
                            </li>
                        </ul>
                        <ul class="navbar-nav">
                            <li class="nav-item animate__animated animate__backInLeft">
                                <a class="nav-link text-warning mt-1" href="/login/secciones/vista_comisiones.php">
                                    COMISIONES
                                </a>
                            </li>
                        </ul> 
                        <ul class="navbar-nav me-auto mb-lg-0"></ul>
                        <ul class="navbar-nav">
                            <li class="nav-item animate__animated animate__backInRight">
                                <a class="nav-link mt-1" href="/login/secciones/vista_estadisticas.php" style="color: #a6c3de">
                                    Estadísticas
                                </a>
                            </li>
                        </ul> 
                        <ul class="navbar-nav me-auto mb-lg-0"></ul>
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <i class="fa-solid fa-user text-success"></i>
                                <i>
                                    <b class="text-light mt-1 fs-5"> <?= $_SESSION['usuario']; ?></b>
                                </i>
                            </li>
                        </ul>
                        <ul class="navbar-nav me-auto mb-lg-0"></ul>
                        <br>
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a href="/login/view/home/logout.php" class="boton_nav-login bg-danger mt-1">Cerrar Sesión</a>
                            </li>
                        </ul>
                    </div>

                <?php elseif ($_SESSION['usuario'] == "root") :
                    //si el usuario está logueado como root
                ?>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-lg-0"></ul>
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a href="/login/view/home/logout.php" class="boton_nav-login bg-danger  mt-1">Cerrar Sesión</a>
                            </li>
                        </ul>
                    </div>

                <?php elseif (!empty($_SESSION['usuario']) && $_SESSION['usuario'] !== "root") :
                    //si el usuario está logueado:
                ?>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            <li class="nav-item animate__animated animate__backInDown">
                                <a class="nav-link text-light mt-1" href="/login/secciones/vista_usuario.php">PERFIL USUARIO</a>
                            </li>
                        </ul>
                        <ul class="navbar-nav">
                            <li class="nav-item animate__animated animate__backInDown">
                                <a class="nav-link text-light mt-1" href="/login/view/home/editProfile.php">EDITAR PERFIL</a>
                            </li>
                        </ul>
                        <ul class="navbar-nav">
                            <li class="nav-item animate__animated animate__backInLeft">
                                <a class="nav-link text-warning mt-1" href="/login/secciones/vista_actividades.php">
                                    ACTIVIDADES
                                </a>
                            </li>
                        </ul>
                        <ul class="navbar-nav">
                            <li class="nav-item animate__animated animate__backInLeft">
                                <a class="nav-link text-warning mt-1" href="/login/secciones/vista_socios.php">
                                    SOCIOS
                                </a>
                            </li>
                        </ul>
                        <ul class="navbar-nav me-auto mb-lg-0"></ul>
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <i class="fa-solid fa-user text-success"></i>
                                <i>
                                    <b class="text-light mt-1 fs-5"> <?= $_SESSION['usuario']; ?></b>
                                </i>
                            </li>
                        </ul>
                        <ul class="navbar-nav me-auto mb-lg-0"></ul>
                    <br>
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a href="/login/view/home/logout.php" class="boton_nav-login bg-danger mt-1">Cerrar Sesión</a>
                            </li>
                        </ul>
                    </div>
                <?php endif ?>
            </div>
        </nav>
    </div>
</div>
<div class="fondo_login2">