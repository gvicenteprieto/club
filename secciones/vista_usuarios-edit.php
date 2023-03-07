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
        $id = $user['id'];
        $dni = $user['dni'];
        $usuario = $user['usuario'];
        $apellidos = $user['apellidos'];
        $nombres = $user['nombres'];
        $email = $user['email'];
    };
    $sqlx = "SELECT * FROM actividades 
    WHERE id IN (SELECT idActividad FROM usuarios_actividades WHERE idUsuario = :idUsuario)";
    $query = $conexionDB->prepare($sqlx);
    $query->bindParam(':idUsuario', $id);
    $query->execute();
    $actividad = $query->fetchAll(PDO::FETCH_ASSOC);

    foreach ($actividad as $activi) {
        $ac = $activi;
    }
}
?>
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
                                <!-- <?php if ($actividad) : ?>
                                    <div>
                                        <h5 class="fs-5 ">
                                            Actividades del usuario
                                        </h5>
                                    </div>
                                    <div class="table-responsive card-background">
                                        <table class="table" id="customers">
                                            <thead>
                                                <tr>
                                                    <th class="bg-secondary text-warning">ACTIVIDAD</th>
                                                    <th class="bg-secondary text-warning">LUGAR DE DESARROLLO</th>
                                                    <th class="bg-secondary text-warning">EDICION</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <?php
                                                        foreach ($actividad as $activ) { ?>
                                                            <li class="list-group-item p-2">
                                                                🟠<?php echo $activ['nombre_actividad']; ?>
                                                            </li>
                                                        <?php } ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        foreach ($actividad as $activ) { ?>
                                                            <li class="list-group-item p-2">
                                                                🟫<?php echo $activ['lugar']; ?>
                                                            </li>
                                                        <?php } ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        foreach ($actividad as $activ) { ?>
                                                            <li class="list-group-item p-2">
                                                                <input type="hidden" name="idAct" id="idAct" ?>
                                                                <button type="submit" name="accion" 
                                                                    value="borrarAct" class="btn btn-danger"> Quitar
                                                                </button>
                                                            </li>
                                                        <?php } ?>
                                                    </td>
                                                 </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                <?php endif; ?> -->

                                <!-- <?php if ($actividad) : ?>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Actividades vinculadas:</label>
                                        <select multiple class="form-control" name="actividades[]" id="arrayActividadesUsuarios">
                                            <?php foreach ($actividadesUsuario as $actividadUsuario) { ?>
                                                <option <?php
                                                        if (!empty($arrayActividadesUsuarios)) :
                                                            if (in_array($actividadUsuario['id'], $arrayActividadesUsuarios)) :
                                                                echo "seleccionado";
                                                            endif;
                                                        endif;
                                                        ?> value="<?php echo $actividadUsuario['id']; ?>">
                                                    <?php echo $actividadUsuario['id']; ?> - <?php echo $actividadUsuario['nombre_actividad']; ?>

                                                </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                <?php endif; ?> -->

                                <!-- <div class="mb-3">
                                    <label for="" class="form-label">Agregar Actividades:</label>
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
                                <div class="btn-group" role="group" aria-label="Button group name">
                                    <button type="submit" name="accion" value="agregarAct" class="btn btn-success">Agregar Actividad
                                    </button>
                                </div> -->
                                <div class="btn-group d-flex mt-5" role="group" aria-label="Button group name">
                                    <button onclick="return confirmEdit();" type="submit" name="accion" value="editar" 
                                        class="btn btn-warning fw-bold">EDITAR USUARIO
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

                <div class="container text-center mt-3">
                    <div class="row justify-content-between">
                        <div class="col-4"></div>
                        <div class="col-4">
                            <div>
                                <a href="./vista_usuarios.php" class="btn btn-secondary m-2">
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
<link href="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/css/tom-select.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/js/tom-select.complete.min.js"></script>
<script>
    new TomSelect("#arrayActividadesUsuarios", {
        plugins: ['remove_button'],
    });

    new TomSelect("#listaActividades", {
        plugins: ['remove_button'],
    });
</script>
<?php include("../view/head/footer.php"); ?>