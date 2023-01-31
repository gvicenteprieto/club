<?php
    include("../home/panelControl.php");
    if (!empty($_SESSION['usuario'])) {
        header("Location:panelControl.php");
    }
?>

<!-- <div class="fondo_login"> -->
<div class="fondo_login2">
    <div class="icono">
        <a href="/login/index.php">
            <i class="fa-regular fa-futbol icono_login"> CLUB SOCIAL</i>
        </a>
    </div>
    <div class="titulo">
        Registro de usuario
    </div>
    <form action="store.php" method="post" class="login col-4" autocomplete="off">

    <div class="mb-3">
            <label for="dni" class="form-label">dni:</label>
            <input type="text" class="form-control" id="dni" name="dni" 
                value="<?= (!empty($_GET['dni'])) ? $_GET['dni'] : "" ?>" 
                aria-describedby="dni">
        </div>

        <div class="mb-3">
            <label for="usuario" class="form-label">Usuario:</label>
            <input type="text" class="form-control" id="usuario" name="usuario" 
                value="<?= (!empty($_GET['usuario'])) ? $_GET['usuario'] : "" ?>" 
                aria-describedby="usuario">
        </div>

        <div class="mb-3">
            <label for="apellidos" class="form-label">Apellidos:</label>
            <input type="text" class="form-control" id="apellidos" name="apellidos" 
                value="<?= (!empty($_GET['apellidos'])) ? $_GET['apellidos'] : "" ?>" 
                aria-describedby="apellidos">
        </div>

        <div class="mb-3">
            <label for="nombres" class="form-label">Nombres:</label>
            <input type="text" class="form-control" id="nombres" name="nombres" 
                value="<?= (!empty($_GET['nombres'])) ? $_GET['nombres'] : "" ?>" 
                aria-describedby="nombres">
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" class="form-control" id="email" name="email" 
                value="<?= (!empty($_GET['email'])) ? $_GET['email'] : "" ?>" 
                aria-describedby="emailHelp">
        </div>

        <div class="mb-3">
            <label for="pass" class="form-label">Contraseña:</label>
            <div class="ojoVisor">
                <button type="button" onClick="mostrarPass('pass', 'eyepass')">
                    <i id="eyepass" class="fa-solid fa-eye changePass"></i>
                </button>
            </div>
            <input type="password" class="form-control" id="pass" name="pass" 
                value="<?= (!empty($_GET['pass'])) ? $_GET['pass'] : "" ?>">
        </div>

        <div class="mb-3">
            <label for="confirmPass" class="form-label">Repita Contraseña:</label>
            <div class="ojoVisor">
                <button type="button" onClick="mostrarPass('confirmPass', 'eyepass2')">
                    <i id="eyepass2" class="fa-solid fa-eye changePass"></i>
                </button>
            </div>
            <input type="password" class="form-control" id="confirmPass" name="confirmPass" 
                value="<?= (!empty($_GET['confirmPass'])) ? $_GET['confirmPass'] : "" ?>">
        </div>
        <hr>
        <?php if (!empty($_GET['error'])) : ?>
            <div id="alertError" class="d-grid gap-2 btn mb-2 text-danger bg-warning" 
                style="font-weight: bold; text-align: center; margin: auto" role="alert">
                <?= !empty($_GET['error']) ? ($_GET['error']) : "" ?>
            </div>

        <?php endif; ?>

        <div class="d-grid gap-2">
            <button type="submit" class="btn btn-primary">Crear cuenta</button>
        </div>
    </form>
    <div class="login titulo col-3 mt-1 col-4">
        ¿Ya posee cuenta? 
        <div class="d-grid gap-2">
        <a href="./login.php" class="text-success" 
            style="text-decoration:none; font-weight: 700">Iniciar Sesión</a>
        </div>
    </div>

</div>

<!-- <?php
    require_once("C://xampp3/htdocs/login/view/head/footer.php");
?> -->