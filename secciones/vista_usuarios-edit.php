<?php include('../view/head/header.php'); ?>
<?php
if (empty($_SESSION['usuario'])) {
    header("Location:../view/home/panelControl.php");
}
?>
<?php include('../secciones/usuarios.php');
$id = isset($_POST['id']) ? $_POST['id'] : "";
if ($id) {
    $sql = "SELECT * FROM usuarios WHERE id=:id";
    $query = $conexionDB->prepare($sql);
    $query->bindParam(':id', $id);
    $query->execute();
    $users = $query->fetchAll(PDO::FETCH_ASSOC);
    foreach ($users as $user) {
        $id = $user['id'];
        $dni = $user['dni'];
        $usuario = $user['usuario'];
        $apellidos = $user['apellidos'];
        $nombres = $user['nombres'];
        $email = $user['email'];
    };
}
?>
<div class="fondo_login">
    <div class="container p-5">
        <div class="row">
            <div class="col-12">
                <h5 class="p-2 text-center text-success card bg-light mb-3 fw-bold">USUARIOS</h5>
                <div class="row">
                    <div class="col-md-12">
                        <form action="vista_usuarios.php" method="post">
                            <div class="card card-background p-1">
                                <br>
                                <div class="btn-warning bg-warning card card-header fw-bold m-3">
                                    EDICION registro de usuario
                                </div>
                                <div class="row col-12 animate__animated animate__pulse">
                                    <div class="col-10 text-end p-2 text-secondary fw-bold">Nombre de Usuario: </div>

                                    <div class="col-1 bg-secondary text-warning text-center card fw-bold">
                                        <h5 class="mt-2">
                                            <i>
                                                <?php echo $usuario; ?>
                                            </i>
                                        </h5>
                                    </div>
                                    <div class="col-1"></div>
                                </div>
                                <div class="card-body row">
                                    <input type="hidden" class="form-control text-primary fw-bold fs-5" name="id" id="id" value="<?php echo $id; ?>">
                                    <div class="mb-3 col-3">
                                        <label for="dni" class="form-label text-secondary">DNI: </label>
                                        <input type="text" class="form-control bg-primary-subtle text-primary-emphasis" 
                                            name="dni" id="dni" readonly=true value="<?php echo $dni; ?>" placeholder="Documento Nacional de Identidad">
                                    </div>
                                    <input type="hidden" class="form-control text-primary fw-bold fs-5" name="usuario" 
                                        id="usuario" value="<?php echo $usuario; ?>">
                                    <div class="mb-3 col-3">
                                        <label for="apellidos" class="form-label text-secondary">Apellidos:</label>
                                        <input type="text" class="form-control bg-primary-subtle text-primary-emphasis" 
                                            name="apellidos" id="apellidos" value="<?php echo $apellidos; ?>" placeholder="Apellidos">
                                    </div>
                                    <div class="mb-3 col-3">
                                        <label for="nombres" class="form-label text-secondary">Nombres:</label>
                                        <input type="text" class="form-control bg-primary-subtle text-primary-emphasis" 
                                            name="nombres" id="nombres" value="<?php echo $nombres; ?>" placeholder="Nombres">
                                    </div>
                                    <div class="mb-3 col-3">
                                        <label for="email" class="form-label text-secondary">Email:</label>
                                        <input type="email" class="form-control bg-primary-subtle text-primary-emphasis" 
                                            name="email" id="email" value="<?php echo $email; ?>" placeholder="Correo Electr??nico">
                                    </div>

                                </div>
                                <div class="container row">
                                    <div class="col-8"></div>
                                    <div class="col-4 bg-warning text-warning text-center card fw-bold">
                                        <!-- <input type="hidden" name="id" id="id" value="<?php echo $id;  ?>"> -->
                                        <button onclick="return confirmEdit();" type="submit" name="accion" value="editar" 
                                            class="btn btn-warning boton_nav-estad">EDITAR USUARIO
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="card-body row">
                                    
                                    <div class="mb-3 col-3">
                                    <div class="btn-group d-flex " role="group" aria-label="Button group name">
                            <button class="btn btn-success" onclick='document.getElementById("dni").removeAttribute("readonly", false)'>
                                Permitir Edici??n DNI
                            </button>
                        </div>
                                    </div>

                        
                    </div>
                    <div class="container row text-center mt-3">
                        <div class="col-8"></div>
                        <div class="col-4">
                            <div>
                                <a href="./vista_usuarios.php" class="btn btn-secondary m-2 boton_nav-estad">
                                    REGRESAR
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include("../view/head/footer.php"); ?>