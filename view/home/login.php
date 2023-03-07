<?php include("../head/head.php");
if (!empty($_SESSION['usuario'])) {
    header("Location:panelControl.php");
}
?>

<div class="fondo_login p-5">
    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <br>
                <div class="icono p-2 text-center text-success card bg-light mb-3 mt-5">
                    <a href="/login/view/home/login.php">
                        <i class="fa-regular fa-futbol icono_login"> CLUB SOCIAL</i>
                    </a>
                </div>
                <form action="validar.php" method="POST" autocomplete="off">
                    <div class="card mt-1 mb-5 login">
                        <div class="card-body ">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Nombre de Usuario:</label>
                                <input type="text" class="form-control text-success fw-bold" 
                                    id="usuario" name="usuario" aria-describedby="usuario" placeholder="Usuario" >
                                <i><small class="form-text text-light mt-1">Escriba su usuario</small></i>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Contraseña:</label>
                                <input type="password" class="form-control" id="pass" name="pass" placeholder="Contraseña">
                                <i><small class="form-text text-light">Escriba su contraseña</small></i>
                            </div>
                            <hr class="border-bottom text-light">
                            <?php if (!empty($_GET['error'])) : ?>

                                <div id="alertError" class="d-grid gap-2 btn mb-2 text-danger bg-warning" 
                                    style="font-weight: bold; text-align: center; margin: auto" role="alert">
                                    <?= !empty($_GET['error']) ? ($_GET['error']) : "" ?>
                                </div>

                            <?php endif; ?>

                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-success fw-bold m-1"><i>Ingresar</i></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>