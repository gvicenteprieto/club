<?php include("head.php"); ?>

<div class="fondo_menu">
    <div>
        <nav class="navbar navbar-expand-lg bg-dark  navbar-dark">
            <div class="container-fluid m-2">

                <div class="p-1 mt-2 text-center text-success">
                    <a href="/login/view/home/panelControl.php">
                        <i class="fa-regular fa-futbol icono_login"> CLUB SOCIAL</i>
                    </a>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <?php
                //si el usuario no está logueado:
                if (empty($_SESSION['usuario'])) :
                ?>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <!-- <a class="nav-link active" 
                                aria-current="page" href="#">Actividades</a> -->
                            </li>

                            <li class="nav-item">
                                <!-- <a class="nav-link" href="#">Contacto</a> -->
                            </li>
                        </ul>

                        <a href="/login/view/home/login.php" class="boton_nav-login bg-success ">INGRESAR</a>
                        <!-- <a href="/login/view/home/signup.php" 
                            class="boton_nav-signup bg-primary">REGISTRO</a> -->
                    </div>


                <?php elseif ($_SESSION['usuario'] == "admin") :
                    //si el usuario está logueado como administrador
                ?>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link text-warning mt-1" href="/login/secciones/vista_usuarios.php">
                                    USUARIOS
                                </a>
                            </li>
                        </ul>

                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link text-warning mt-1" href="/login/secciones/vista_actividades.php">
                                    ACTIVIDADES
                                </a>
                            </li>
                        </ul>

                        <!-- <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link text-warning mt-1" 
                                href="/login/secciones/perfil_usuario.php">
                                Perfiles
                            </a>
                        </li>
                    </ul> -->

                        <ul class="navbar-nav me-auto mb-lg-0"></ul>

                        <ul class="navbar-nav me-auto mb-lg-0">
                            <li class="nav-item">
                                <?php if ($_SESSION['usuario'] !== "root") : ?>
                                    <i class="fa-solid fa-user text-success">
                                        <b class="text-light"> <?= $_SESSION['usuario']; ?></b>
                                    </i>
                                <?php endif; ?>
                            </li>
                        </ul>

                        <ul class="navbar-nav">
                            <a href="/login/view/home/logout.php" class="boton_nav-login bg-danger ">SALIR</a>
                        </ul>
                    </div>


                <?php elseif ($_SESSION['usuario'] == "root") :
                    //si el usuario está logueado como root
                ?>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-lg-0"></ul>
                        <ul class="navbar-nav">
                            <a href="/login/view/home/logout.php" class="boton_nav-login bg-danger ">SALIR</a>
                        </ul>
                    </div>

                <?php elseif (!empty($_SESSION['usuario']) && $_SESSION['usuario'] !== "root") :
                    //si el usuario está logueado:
                ?>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link text-warning" href="/login/view/home/editProfile.php">EDITAR PERFIL</a>
                            </li>
                        </ul>

                        <ul class="navbar-nav me-auto mb-lg-0"></ul>

                        <ul class="navbar-nav me-auto mb-lg-0">
                            <li class="nav-item">

                                <i class="fa-solid fa-user text-success">
                                    <a href="/login/view/home/panelControl.php" style="text-decoration: none;">
                                        <b class="text-light"> <?= $_SESSION['usuario']; ?></b>
                                    </a>
                                </i>
                            </li>
                        </ul>

                        <ul class="navbar-nav">
                            <a href="/login/view/home/logout.php" class="boton_nav-login bg-danger ">SALIR</a>
                        </ul>

                    </div>


                <?php endif ?>

            </div>
        </nav>
    </div>
</div>
<div class="fondo_login2">