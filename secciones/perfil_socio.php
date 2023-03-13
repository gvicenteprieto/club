<?php include('../view/head/header.php'); ?>
<?php
if (empty($_SESSION['usuario'])) {
    header("Location:../view/home/panelControl.php");
}
?>
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

    $sqly = "SELECT * FROM comisiones 
    WHERE id IN (SELECT idComision FROM socios_comisiones WHERE idSocio = :idSocio)";
    $query = $conexionDB->prepare($sqly);
    $query->bindParam(':idSocio', $id);
    $query->execute();
    $comision = $query->fetchAll();
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
<div class="fondo_login">
    <div class="container p-5">
        <div class="row">
            <div class="col-12">
                <h5 class="p-2 text-center text-success card bg-light mb-3 fw-bold">
                    Perfil de Socio
                </h5>
                <div class="row">
                    <div>
                        <div class="p-3">
                            <div class="row col-12 animate__animated animate__pulse">
                                <div class="col-10 text-end p-2 text-secondary fw-bold">Número de Socio: </div>
                                <div class="col-2 bg-secondary text-warning text-center card fw-bold">
                                    <h5 class="mt-2">
                                        <i>
                                            <?php echo $NSOCIO; ?>
                                        </i>
                                    </h5>
                                </div>
                            </div>
                            <div class="card-body row mt-3">
                                <div class="mb-3 col-3">
                                    <label for="FINGRESO" class="form-label text-secondary">Ingreso:</label>
                                    <input type="date" readonly=true class="form-control bg-primary-subtle text-primary-emphasis" 
                                        name="FINGRESO" id="FINGRESO" value="<?php echo $FINGRESO; ?>" placeholder="Fecha ingreso">
                                </div>
                                <div class="mb-3 col-3">
                                    <label for="DNI" class="form-label text-secondary">DNI:</label>
                                    <input type="text" readonly=true class="form-control bg-primary-subtle text-primary-emphasis fw-bold" 
                                        name="DNI" id="DNI" value="<?php echo $DNI; ?>" placeholder="DNI">
                                </div>
                                <div class="mb-3 col-3">
                                    <label for="APELLIDO" class="form-label text-secondary">Apellido:</label>
                                    <input type="text" readonly=true class="form-control bg-primary-subtle text-primary-emphasis fw-bold" 
                                        name="APELLIDO" id="APELLIDO" value="<?php echo $APELLIDO; ?>" placeholder="Apellido">
                                </div>
                                <div class="mb-3 col-3">
                                    <label for="NOMBRE" class="form-label text-secondary">Nombre:</label>
                                    <input type="text" readonly=true class="form-control bg-primary-subtle text-primary-emphasis fw-bold" 
                                        name="NOMBRE" id="NOMBRE" value="<?php echo $NOMBRE; ?>" placeholder="Nombre">
                                </div>
                                <div class="mb-3 col-3">
                                    <label for="FNACIMIENTO" class="form-label text-secondary">Nacimiento:</label>
                                    <input type="date" readonly=true class="form-control bg-primary-subtle text-primary-emphasis" 
                                        name="FNACIMIENTO" id="FNACIMIENTO" value="<?php echo $FNACIMIENTO; ?>" placeholder="Fecha Nacimiento">
                                </div>
                                <div class="mb-3 col-3">
                                    <label for="CELULAR" class="form-label text-secondary">Celular:</label>
                                    <input type="text" readonly=true class="form-control bg-primary-subtle text-primary-emphasis" 
                                        name="CELULAR" id="CELULAR" value="<?php echo $CELULAR; ?>" placeholder="Celular">
                                </div>

                                <div class="mb-3 col-6">
                                    <label for="EMAIL" class="form-label text-secondary">Email:</label>
                                    <input type="email" readonly=true class="form-control bg-primary-subtle text-primary-emphasis" 
                                        name="EMAIL" id="EMAIL" value="<?php echo $EMAIL; ?>" placeholder="Correo Electrónico">
                                </div>

                                <div class="d-grid gap-2 mb-2 mt-3 p-3">
                                    <div class="bg-secondary-subtle border border-secondary-subtle rounded-3"></div>
                                </div>

                                <div class="mb-3 col-4">
                                    <label for="CALLE" class="form-label text-secondary">Calle:</label>
                                    <input type="text" readonly=true class="form-control bg-primary-subtle text-primary-emphasis" 
                                        name="CALLE" id="CALLE" value="<?php echo $CALLE; ?>" placeholder="Calle">
                                </div>
                                <div class="mb-3 col-2">
                                    <label for="ALTURA" class="form-label text-secondary">Altura:</label>
                                    <input type="text" readonly=true class="form-control bg-primary-subtle text-primary-emphasis" 
                                        name="ALTURA" id="ALTURA" value="<?php echo $ALTURA; ?>" placeholder="Altura">
                                </div>
                                <div class="mb-3 col-3">
                                    <label for="ECALLE_1" class="form-label text-secondary">Entre Calle:</label>
                                    <input type="text" readonly=true class="form-control bg-primary-subtle text-primary-emphasis" 
                                        name="ECALLE_1" id="ECALLE_1" value="<?php echo $ECALLE_1; ?>" placeholder="Entre Calle 1">
                                </div>
                                <div class="mb-3 col-3">
                                    <label for="ECALLE_2" class="form-label text-secondary">Entre Calle:</label>
                                    <input type="text" readonly=true class="form-control bg-primary-subtle text-primary-emphasis" 
                                        name="ECALLE_2" id="ECALLE_2" value="<?php echo $ECALLE_2; ?>" placeholder="Entre Calle 2">
                                </div>
                                <div class="mb-3 col-2">
                                    <label for="PISO" class="form-label text-secondary">Piso:</label>
                                    <input type="text" readonly=true class="form-control bg-primary-subtle text-primary-emphasis" 
                                        name="PISO" id="PISO" value="<?php echo $PISO; ?>" placeholder="Piso">
                                </div>
                                <div class="mb-3 col-2">
                                    <label for="DEPTO" class="form-label text-secondary">Dpto:</label>
                                    <input type="text" readonly=true class="form-control bg-primary-subtle text-primary-emphasis" 
                                        name="DEPTO" id="DEPTO" value="<?php echo $DEPTO; ?>" placeholder="Departamento">
                                </div>
                                <div class="mb-3 col-3">
                                    <label for="LOCALIDAD" class="form-label text-secondary">Localidad:</label>
                                    <input type="text" readonly=true class="form-control bg-primary-subtle text-primary-emphasis" 
                                        name="LOCALIDAD" id="LOCALIDAD" value="<?php echo $LOCALIDAD; ?>" placeholder="Localidad - Barrio">
                                </div>
                                <div class="mb-3 col-3">
                                    <label for="PARTIDO" class="form-label text-secondary">Partido:</label>
                                    <input type="text" readonly=true class="form-control bg-primary-subtle text-primary-emphasis" 
                                        name="PARTIDO" id="PARTIDO" value="<?php echo $PARTIDO; ?>" placeholder="Partido">
                                </div>
                                <div class="mb-3 col-2">
                                    <label for="CPOSTAL" class="form-label text-secondary">C. Postal:</label>
                                    <input type="text" readonly=true class="form-control bg-primary-subtle text-primary-emphasis" 
                                        name="CPOSTAL" id="CPOSTAL" value="<?php echo $CPOSTAL; ?>" placeholder="Código Postal">
                                </div>


                                <div class="d-grid gap-2 mb-2 mt-3 p-3">
                                    <div class="bg-secondary-subtle border border-secondary-subtle rounded-3"></div>
                                </div>

                                <div class="mb-3 col-3">
                                    <label for="OSOCIAL" class="form-label text-secondary">O. Social:</label>
                                    <input type="text" readonly=true class="form-control bg-primary-subtle text-primary-emphasis" 
                                        name="OSOCIAL" id="OSOCIAL" value="<?php echo $OSOCIAL; ?>" placeholder="Obra Social">
                                </div>
                                <div class="mb-3 col-3">
                                    <label for="NAFILIADO" class="form-label text-secondary">N° Afiliado:</label>
                                    <input type="text" readonly=true class="form-control bg-primary-subtle text-primary-emphasis" 
                                        name="NAFILIADO" id="NAFILIADO" value="<?php echo $NAFILIADO; ?>" placeholder="N° Afiliado">
                                </div>
                                <div class="mb-3 col-3">
                                    <label for="ESTADO" class="form-label text-secondary">Estado:</label>
                                    <input type="text" readonly=true class="form-control bg-primary-subtle text-primary-emphasis" 
                                        name="ESTADO" id="ESTADO" value="<?php echo $ESTADO; ?>" placeholder="Estado">
                                </div>
                                <div class="mb-3 col-3">
                                    <label for="OBSERVACIONES" class="form-label text-secondary">Observaciones:</label>
                                    <input type="text" readonly=true class="form-control bg-primary-subtle text-primary-emphasis" 
                                        name="OBSERVACIONES" id="OBSERVACIONES" value="<?php echo $OBSERVACIONES; ?>" placeholder="Observaciones">
                                </div>

                                <div class="d-grid gap-2 mb-2 mt-3 p-3">
                                    <div class="bg-secondary-subtle border border-secondary rounded-3"></div>
                                </div>
                            </div>

                            <div class="container">
                                <!-- ACTIVIDADES -->
                                <?php if ($actividad) : ?>
                                    <div class="container px-2 py-2 mt-2">
                                        <h5 class="text-primary">
                                            Actividades vinculadas:
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
                                                                🟠 <?php echo $activ['nombre_actividad']; ?>
                                                            </li>
                                                        <?php } ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        foreach ($actividad as $activ) { ?>
                                                            <li class="list-group-item p-2">
                                                                🟧 <?php echo $activ['lugar']; ?>
                                                            </li>
                                                        <?php } ?>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                <?php endif; ?>
                                <!-- COMISIONES -->
                                <?php if ($comision) : ?>
                                    <div class="container px-2 py-2 mt-2">
                                        <h5 class="text-success">
                                            Comisiones vinculadas:
                                        </h5>
                                    </div>
                                    <div class="table-responsive card-background">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th class="bg-secondary text-warning">COMISION</th>
                                                    <th class="bg-secondary text-warning">LUGAR DE DESARROLLO</th>
                                                    <!-- <th class="bg-secondary text-warning">DIA REUNION</th> -->
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <?php
                                                        foreach ($comision as $comis) { ?>
                                                            <li class="list-group-item p-2">
                                                                ❇️ <?php echo $comis['nombre_comision']; ?>
                                                            </li>
                                                        <?php } ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        foreach ($comision as $comis) { ?>
                                                            <li class="list-group-item p-2">
                                                                🟩 <?php echo $comis['lugar']; ?>
                                                            </li>
                                                        <?php } ?>
                                                    </td>
                                                    <!-- <td>
                                                        <?php
                                                        foreach ($comision as $comis) { ?>
                                                            <li class="list-group-item p-2">
                                                                🟢 <?php echo $comis['dia']; ?>
                                                            </li>
                                                        <?php } ?>
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
                                    <button onclick="return confirmEdit();" type="submit" name="accion" 
                                        value="seleccionar" class="btn btn-warning m-2 boton_nav-estad">
                                        Edición registro de Socio
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="col-4">
                            <div>
                                <a href="./vista_socios.php" class="btn btn-secondary m-2 boton_nav-estad">
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
    new TomSelect("#listaActividades", {
        plugins: ['remove_button'],
    });
</script>
<?php include("../view/head/footer.php"); ?>