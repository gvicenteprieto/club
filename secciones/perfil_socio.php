<?php include('../view/head/header.php'); ?>
<?php include('../secciones/socios.php');
$id = isset($_POST['id']) ? $_POST['id'] : "";
if ($id) {
    $sql = "SELECT * FROM socios WHERE id=:id";
    $query = $conexionDB->prepare($sql);
    $query->bindParam(':id', $id);
    $query->execute();
    $users = $query->fetchAll(PDO::FETCH_ASSOC);
    foreach ($users as $user) {
        $id = $user['id'];
        $NSOCIO = $user['NSOCIO'];
        $APELLIDO = $user['APELLIDO'];
        $NOMBRE = $user['NOMBRE'];
        $FINGRESO = $user['FINGRESO'];
        $CALLE = $user['CALLE'];
        $ALTURA = $user['ALTURA'];
        $ECALLE_1 = $user['ECALLE_1'];
        $ECALLE_2 = $user['ECALLE_2'];
        $PISO = $user['PISO'];
        $DEPTO = $user['DEPTO'];
        $PARTIDO = $user['PARTIDO'];
        $CPOSTAL = $user['CPOSTAL'];
        $LOCALIDAD = $user['LOCALIDAD'];
        $CELULAR = $user['CELULAR'];
        $DNI = $user['DNI'];
        $FNACIMIENTO = $user['FNACIMIENTO'];
        $OSOCIAL = $user['OSOCIAL'];
        $NAFILIADO = $user['NAFILIADO'];
        $EMAIL = $user['EMAIL'];
        $OBSERVACIONES = $user['OBSERVACIONES'];
        $ESTADO = $user['ESTADO'];
    };
    $sqlx = "SELECT * FROM actividades 
    WHERE id IN (SELECT idActividad FROM socios_actividades WHERE idSocio = :idSocio)";
    $query = $conexionDB->prepare($sqlx);
    $query->bindParam(':idSocio', $id);
    $query->execute();
    $actividad = $query->fetchAll();
}

?>
<style>
    #customers {
        border-collapse: collapse;
        width: 100%;
    }

    #customers td,
    #customers th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    #customers tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    #customers tr:hover {
        background-color: #ddd;
    }

    #customers th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #04AA6D;
        color: white;
    }
</style>

<div class="container p-5">
    <div class="row">
        <div class="col-12">
            <h5 class="p-2 text-center text-success card bg-light mb-3 fw-bold">
                Perfil de Socio
            </h5>
            <div class="row">
                <div>
                    <div class="card p-3">
                        <br>
                        <div class="card card-header bg-secondary text-light">
                            <h5 class="fs-4 text-center text-warning">
                                <?php echo "N° "; ?>
                                <i>
                                    <?php echo $NSOCIO; ?>
                                </i>
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive card-background">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Apellido</th>
                                            <th>Nombre</th>
                                            <th>Teléfono</th>
                                            <th>Email</th>
                                            <th>Localidad - Partido</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><?php echo $APELLIDO; ?></td>
                                            <td><?php echo $NOMBRE; ?></td>
                                            <td><?php echo $CELULAR; ?></td>
                                            <td><?php echo $EMAIL; ?></td>
                                            <td><?php echo $LOCALIDAD; ?> - <?php echo $PARTIDO; ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-body row">
                            <div class="mb-3 col-6">
                                <label for="FINGRESO" class="form-label">Fecha Ingreso:</label>
                                <input type="date" class="form-control" name="FINGRESO" id="FINGRESO" readonly=true value="<?php echo $FINGRESO; ?>" placeholder="Fecha ingreso">
                            </div>
                            <div class="mb-3 col-6">
                                <label for="NSOCIO" class="form-label">N° Socio:</label>
                                <input type="text" class="form-control" name="NSOCIO" id="NSOCIO" readonly=true value="<?php echo $NSOCIO; ?>" placeholder="N° Socio">
                            </div>
                            <div class="mb-3 col-6">
                                <label for="APELLIDO" class="form-label">Apellido:</label>
                                <input type="text" class="form-control" name="APELLIDO" id="APELLIDO" readonly=true value="<?php echo $APELLIDO; ?>" placeholder="Apellido">
                            </div>
                            <div class="mb-3 col-6">
                                <label for="NOMBRE" class="form-label">Nombre:</label>
                                <input type="text" class="form-control" name="NOMBRE" id="NOMBRE" readonly=true value="<?php echo $NOMBRE; ?>" placeholder="Nombre">
                            </div>
                            <div class="mb-3 col-6">
                                <label for="CALLE" class="form-label">Calle:</label>
                                <input type="text" class="form-control" name="CALLE" id="CALLE" readonly=true value="<?php echo $CALLE; ?>" placeholder="Calle">
                            </div>
                            <div class="mb-3 col-6">
                                <label for="ALTURA" class="form-label">Altura:</label>
                                <input type="text" class="form-control" name="ALTURA" id="ALTURA" readonly=true value="<?php echo $ALTURA; ?>" placeholder="Altura">
                            </div>
                            <div class="mb-3 col-6">
                                <label for="ECALLE_1" class="form-label">Entre Calle 1:</label>
                                <input type="text" class="form-control" name="ECALLE_1" id="ECALLE_1" readonly=true value="<?php echo $ECALLE_1; ?>" placeholder="Entre Calle 1">
                            </div>
                            <div class="mb-3 col-6">
                                <label for="ECALLE_2" class="form-label">Entre Calle 2:</label>
                                <input type="text" class="form-control" name="ECALLE_2" id="ECALLE_2" readonly=true value="<?php echo $ECALLE_2; ?>" placeholder="Entre Calle 2">
                            </div>
                            <div class="mb-3 col-6">
                                <label for="PISO" class="form-label">Piso:</label>
                                <input type="text" class="form-control" name="PISO" id="PISO" readonly=true value="<?php echo $PISO; ?>" placeholder="Piso">
                            </div>
                            <div class="mb-3 col-6">
                                <label for="DEPTO" class="form-label">Departamento:</label>
                                <input type="text" class="form-control" name="DEPTO" id="DEPTO" readonly=true value="<?php echo $DEPTO; ?>" placeholder="Departamento">
                            </div>
                            <div class="mb-3 col-6">
                                <label for="PARTIDO" class="form-label">Partido:</label>
                                <input type="text" class="form-control" name="PARTIDO" id="PARTIDO" readonly=true value="<?php echo $PARTIDO; ?>" placeholder="Partido">
                            </div>
                            <div class="mb-3 col-6">
                                <label for="CPOSTAL" class="form-label">Código Postal:</label>
                                <input type="text" class="form-control" name="CPOSTAL" id="CPOSTAL" readonly=true value="<?php echo $CPOSTAL; ?>" placeholder="Código Postal">
                            </div>
                            <div class="mb-3 col-6">
                                <label for="LOCALIDAD" class="form-label">Localidad:</label>
                                <input type="text" class="form-control" name="LOCALIDAD" id="LOCALIDAD" readonly=true value="<?php echo $LOCALIDAD; ?>" placeholder="Localidad - Barrio">
                            </div>
                            <div class="mb-3 col-6">
                                <label for="CELULAR" class="form-label">Celular:</label>
                                <input type="text" class="form-control" name="CELULAR" id="CELULAR" readonly=true value="<?php echo $CELULAR; ?>" placeholder="Celular">
                            </div>
                            <div class="mb-3 col-6">
                                <label for="DNI" class="form-label">DNI:</label>
                                <input type="text" class="form-control" name="DNI" id="DNI" readonly=true value="<?php echo $DNI; ?>" placeholder="DNI">
                            </div>
                            <div class="mb-3 col-6">
                                <label for="FNACIMIENTO" class="form-label">Fecha Nacimiento:</label>
                                <input type="date" class="form-control" name="FNACIMIENTO" id="FNACIMIENTO" readonly=true value="<?php echo $FNACIMIENTO; ?>" placeholder="Fecha Nacimiento">
                            </div>
                            <div class="mb-3 col-6">
                                <label for="OSOCIAL" class="form-label">Obra Social:</label>
                                <input type="text" class="form-control" name="OSOCIAL" id="OSOCIAL" readonly=true value="<?php echo $OSOCIAL; ?>" placeholder="Obra Social">
                            </div>
                            <div class="mb-3 col-6">
                                <label for="NAFILIADO" class="form-label">N° Afiliado:</label>
                                <input type="text" class="form-control" name="NAFILIADO" id="NAFILIADO" readonly=true value="<?php echo $NAFILIADO; ?>" placeholder="N° Afiliado">
                            </div>
                            <div class="mb-3 col-6">
                                <label for="EMAIL" class="form-label">Email:</label>
                                <input type="email" class="form-control" name="EMAIL" id="EMAIL" readonly=true value="<?php echo $EMAIL; ?>" placeholder="Correo Electrónico">
                            </div>
                            <div class="mb-3 col-3">
                                <label for="OBSERVACIONES" class="form-label">Observaciones:</label>
                                <input type="text" class="form-control" name="OBSERVACIONES" id="OBSERVACIONES" readonly=true value="<?php echo $OBSERVACIONES; ?>" placeholder="Observaciones">
                            </div>
                            <div class="mb-3 col-3">
                                <label for="ESTADO" class="form-label">Estado:</label>
                                <input type="text" class="form-control" name="ESTADO" id="ESTADO" readonly=true value="<?php echo $ESTADO; ?>" placeholder="Estado">
                            </div>
                        </div>

                        <div class="container">
                            <?php if ($actividad) : ?>

                                <div class="container px-2 py-2 mt-2">
                                    <h5 class="text-primary">
                                        Actividades Vinculadas al Socio
                                    </h5>
                                </div>
                                <div class="table-responsive card-background">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="bg-secondary text-warning">ACTIVIDAD</th>
                                                <th class="bg-secondary text-warning">LUGAR DE DESARROLLO</th>
                                                <!-- <th class="bg-secondary text-warning">ACCIONES</th> -->
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

                                                <!-- <td>
                                                    <form action="/login/secciones/vista_socios-edit.php" method="post">
                                                        <div role="group" aria-label="Button group name">
                                                            <input type="hidden" name="id" id="id" value="<?php echo $id;  ?>">
                                                            <button onclick="return confirmEdit();" type="submit" name="accion" 
                                                                value="seleccionar" class="btn btn-danger m-2">
                                                                Edición registro de Socio -REVISAR!!
                                                            </button>
                                                        </div>
                                                    </form>
                                                </td> -->

                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container text-center mt-3">
                <div class="row justify-content-between">
                    <div class="col-4">
                        <form action="/login/secciones/vista_socios-edit.php" method="post">
                            <div role="group" aria-label="Button group name">
                                <input type="hidden" name="id" id="id" value="<?php echo $id;  ?>">
                                <button onclick="return confirmEdit();" type="submit" name="accion" value="seleccionar" class="btn btn-warning m-2">
                                    Edición registro de Socio
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="col-4">
                        <div>
                            <a href="./vista_socios.php" class="btn btn-secondary m-2">
                                REGRESAR
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<link href="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/css/tom-select.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/js/tom-select.complete.min.js"></script>

<script type="text/javascript">
    function confirmDelete() {
        let confirmar = confirm("¿Confirma la eliminación de éste registro?");
        if (confirmar) {
            return true;
        } else {
            return false;
        }
    }

    function confirmEdit() {
        let confirmar = confirm("¿Desea editar éste socio?");
        if (confirmar) {
            return true;
        } else {
            return false;
        }
    }
</script>
<script>
    //new TomSelect('#listaActividades');

    new TomSelect("#listaActividades", {
        plugins: ['remove_button'],
    });
</script>
<?php include("../view/head/footer.php"); ?>