<?php include('../view/head/header.php'); ?>

<?php include('../secciones/usuarios.php');

$id = isset($_POST['id']) ? $_POST['id'] : "";
if ($id) {
    $sql = "SELECT * FROM usuarios WHERE id=:id";
    $query = $conexionDB->prepare($sql);
    $query->bindParam(':id', $id);
    $query->execute();
    $users = $query->fetchAll(PDO::FETCH_ASSOC);
    foreach ($users as $user) {
        $dni = $user['dni'];
        $usuario = $user['usuario'];
        $apellidos = $user['apellidos'];
        $nombres = $user['nombres'];
        $email = $user['email'];
    }
}
?>

<div class="container-fluid p-5">
    <div class="row">
        <div class="col-12">
            <h5 class="p-2 text-center text-success card bg-light mb-3 fw-bold">USUARIOS</h5>
            <div class="row">

                <div class="col-md-12 mb-3">

                    <form action="vista_usuarios.php" method="post">
                        <div class="card card-background p-1">
                            <br>
                            <!-- <div class="card card-header bg-warning text-center mt-1 fw-bold"> -->
                            <div class="btn btn-warning fw-bold">
                                Gestión de EDICION usuarios
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="dni" class="form-label text-secondary">DNI</label>
                                    <input type="text" class="form-control" name="dni" id="dni" 
                                        readonly=true value="<?php echo $dni; ?>" 
                                        placeholder="Documento Nacional de Identidad">
                                </div>
                                <div class="mb-3">
                                    <label for="usuario" class="form-label">Usuario</label>
                                    <input type="text" class="form-control text-primary fw-bold fs-5" 
                                        name="usuario" id="usuario" value="<?php echo $usuario; ?>" 
                                        placeholder="Usuario">
                                </div>
                                <div class="mb-3">
                                    <label for="apellidos" class="form-label text-secondary">Apellidos</label>
                                    <input type="text" class="form-control" name="apellidos" id="apellidos" 
                                        value="<?php echo $apellidos; ?>" placeholder="Apellidos">
                                </div>
                                <div class="mb-3">
                                    <label for="nombres" class="form-label text-secondary">Nombres</label>
                                    <input type="text" class="form-control" name="nombres" id="nombres" 
                                        value="<?php echo $nombres; ?>" placeholder="Nombres">
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label text-secondary">Email</label>
                                    <input type="email" class="form-control" name="email" id="email" 
                                        value="<?php echo $email; ?>" placeholder="Correo Electrónico">
                                </div>
                                <div class="mb-3"></div>

                                <!-- ACTIVIDADES -->
                                <!-- <div class="mb-3">
                                    <label for="" class="form-label">Actividades del Usuario</label>

                                    <select multiple class="form-control" name="actividades[]" id="listaActividades">
                                        <?php foreach ($actividades as $actividad) { ?>
                                            <option <?php
                                                    if (!empty($arrayActividades)) :
                                                        if (in_array($actividad['id'], $arrayActividades)) :
                                                            echo "selected";
                                                        endif;

                                                    endif;
                                                    ?> value="<?php echo $actividad['id']; ?>">
                                                <?php echo $actividad['id']; ?> - <?php echo $actividad['nombre_actividad']; ?>
                                            </option>
                                        <?php } ?>

                                    </select>
                                </div>


                                <div class="btn-group d-flex " role="group" aria-label="Button group name">
                                    <button type="submit" name="accion" value="agregar" class="btn btn-success">AGREGA</button>
                                    <button type="submit" name="accion" value="editar" class="btn btn-warning">EDITA</button>
                                    <button type="submit" name="accion" value="borrar" class="btn btn-danger">BORRA</button>
                                </div> -->

                                <div class="btn-group d-flex " role="group" aria-label="Button group name">
                                    <button onclick="return confirmEdit();" type="submit" name="accion" 
                                        value="editar" class="btn btn-warning fw-bold">EDITAR USUARIO
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>

                    <div class="btn-group d-flex " role="group" aria-label="Button group name">
                        <button class="btn btn-success" onclick='document.getElementById("dni").removeAttribute("readonly", false)'>
                            Permitir Edición DNI
                        </button>
                        <!-- <button class="btn btn-info" 
                            onclick='document.getElementById("dni").setAttribute("readonly", true)'>
                            Impedir Edición DNI
                        </button> -->
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<?php include("../view/head/footer.php"); ?>