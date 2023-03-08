<?php include('../view/head/header.php'); ?>
<?php include('../secciones/socios.php');
//$id = isset($_POST['id']) ? $_POST['id'] : "";
// print_r($id);

// if ($id) {
//     $sql = "SELECT * FROM socios WHERE id=:id";
//     $query = $conexionDB->prepare($sql);
//     $query->bindParam(':id', $id);
//     $query->execute();
//     $users = $query->fetchAll(PDO::FETCH_ASSOC);
//     foreach ($users as $user) {
//         $id = $user['id'];
//         $NSOCIO = $user['NSOCIO'];
//         $APELLIDO = $user['APELLIDO'];
//         $NOMBRE = $user['NOMBRE'];
//         $FINGRESO = $user['FINGRESO'];
//         $CALLE = $user['CALLE'];
//         $ALTURA = $user['ALTURA'];
//         $ECALLE_1 = $user['ECALLE_1'];
//         $ECALLE_2 = $user['ECALLE_2'];
//         $PISO = $user['PISO'];
//         $DEPTO = $user['DEPTO'];
//         $PARTIDO = $user['PARTIDO'];
//         $CPOSTAL = $user['CPOSTAL'];
//         $LOCALIDAD = $user['LOCALIDAD'];
//         $CELULAR = $user['CELULAR'];
//         $DNI = $user['DNI'];
//         $FNACIMIENTO = $user['FNACIMIENTO'];
//         $OSOCIAL = $user['OSOCIAL'];
//         $NAFILIADO = $user['NAFILIADO'];
//         $EMAIL = $user['EMAIL'];
//         $OBSERVACIONES = $user['OBSERVACIONES'];
//         $ESTADO = $user['ESTADO'];
//     };
//     $sql = "SELECT * FROM actividades 
//     WHERE id IN (SELECT idActividad FROM socios_actividades WHERE idSocio = :idSocio)";
//     $query = $conexionDB->prepare($sql);
//     $query->bindParam(':idSocio', $id);
//     $query->execute();
//     $actividadSocio = $query->fetchAll(PDO::FETCH_ASSOC);
// }

// $idAct = isset($_POST['idAct']) ? $_POST['idAct'] : "";
// print_r($idAct);
?>

<div class="container p-5">
    <div class="row">
        <div class="col-12">
            <h5 class="p-2 text-center text-success card bg-light mb-3 fw-bold">SOCIOS</h5>
            <div class="row">
                <div class="col-md-12">
                    <form action="vista_socios.php" method="post">
                        <div class="card card-background p-1">
                            <br>
                            <div class="btn-warning bg-warning card card-header fw-bold m-3">
                                EDICION registro de socio
                            </div>
                            <div class="card-body row">

                                <div class="mb-3 col-6">
                                    <label for="FINGRESO" class="form-label">Fecha Ingreso:</label>
                                    <input type="date" class="form-control" name="FINGRESO" id="FINGRESO" value="<?php echo $FINGRESO; ?>" placeholder="Fecha ingreso">
                                </div>
                                <div class="mb-3 col-6">
                                    <label for="NSOCIO" class="form-label">N° Socio:</label>
                                    <input type="text" class="form-control" name="NSOCIO" id="NSOCIO" value="<?php echo $NSOCIO; ?>" placeholder="N° Socio">
                                </div>
                                <div class="mb-3 col-6">
                                    <label for="APELLIDO" class="form-label">Apellido:</label>
                                    <input type="text" class="form-control" name="APELLIDO" id="APELLIDO" value="<?php echo $APELLIDO; ?>" placeholder="Apellido">
                                </div>
                                <div class="mb-3 col-6">
                                    <label for="NOMBRE" class="form-label">Nombre:</label>
                                    <input type="text" class="form-control" name="NOMBRE" id="NOMBRE" value="<?php echo $NOMBRE; ?>" placeholder="Nombre">
                                </div>
                                <div class="mb-3 col-6">
                                    <label for="CALLE" class="form-label">Calle:</label>
                                    <input type="text" class="form-control" name="CALLE" id="CALLE" value="<?php echo $CALLE; ?>" placeholder="Calle">
                                </div>
                                <div class="mb-3 col-6">
                                    <label for="ALTURA" class="form-label">Altura:</label>
                                    <input type="text" class="form-control" name="ALTURA" id="ALTURA" value="<?php echo $ALTURA; ?>" placeholder="Altura">
                                </div>
                                <div class="mb-3 col-6">
                                    <label for="ECALLE_1" class="form-label">Entre Calle 1:</label>
                                    <input type="text" class="form-control" name="ECALLE_1" id="ECALLE_1" value="<?php echo $ECALLE_1; ?>" placeholder="Entre Calle 1">
                                </div>
                                <div class="mb-3 col-6">
                                    <label for="ECALLE_2" class="form-label">Entre Calle 2:</label>
                                    <input type="text" class="form-control" name="ECALLE_2" id="ECALLE_2" value="<?php echo $ECALLE_2; ?>" placeholder="Entre Calle 2">
                                </div>
                                <div class="mb-3 col-6">
                                    <label for="PISO" class="form-label">Piso:</label>
                                    <input type="text" class="form-control" name="PISO" id="PISO" value="<?php echo $PISO; ?>" placeholder="Piso">
                                </div>
                                <div class="mb-3 col-6">
                                    <label for="DEPTO" class="form-label">Departamento:</label>
                                    <input type="text" class="form-control" name="DEPTO" id="DEPTO" value="<?php echo $DEPTO; ?>" placeholder="Departamento">
                                </div>
                                <div class="mb-3 col-6">
                                    <label for="PARTIDO" class="form-label">Partido:</label>
                                    <input type="text" class="form-control" name="PARTIDO" id="PARTIDO" value="<?php echo $PARTIDO; ?>" placeholder="Partido">
                                </div>
                                <div class="mb-3 col-6">
                                    <label for="CPOSTAL" class="form-label">Código Postal:</label>
                                    <input type="text" class="form-control" name="CPOSTAL" id="CPOSTAL" value="<?php echo $CPOSTAL; ?>" placeholder="Código Postal">
                                </div>
                                <div class="mb-3 col-6">
                                    <label for="LOCALIDAD" class="form-label">Localidad:</label>
                                    <input type="text" class="form-control" name="LOCALIDAD" id="LOCALIDAD" value="<?php echo $LOCALIDAD; ?>" placeholder="Localidad - Barrio">
                                </div>
                                <div class="mb-3 col-6">
                                    <label for="CELULAR" class="form-label">Celular:</label>
                                    <input type="text" class="form-control" name="CELULAR" id="CELULAR" value="<?php echo $CELULAR; ?>" placeholder="Celular">
                                </div>
                                <div class="mb-3 col-6">
                                    <label for="DNI" class="form-label">DNI:</label>
                                    <input type="text" class="form-control" name="DNI" id="DNI" value="<?php echo $DNI; ?>" placeholder="DNI">
                                </div>
                                <div class="mb-3 col-6">
                                    <label for="FNACIMIENTO" class="form-label">Fecha Nacimiento:</label>
                                    <input type="date" class="form-control" name="FNACIMIENTO" id="FNACIMIENTO" value="<?php echo $FNACIMIENTO; ?>" placeholder="Fecha Nacimiento">
                                </div>
                                <div class="mb-3 col-6">
                                    <label for="OSOCIAL" class="form-label">Obra Social:</label>
                                    <input type="text" class="form-control" name="OSOCIAL" id="OSOCIAL" value="<?php echo $OSOCIAL; ?>" placeholder="Obra Social">
                                </div>
                                <div class="mb-3 col-6">
                                    <label for="NAFILIADO" class="form-label">N° Afiliado:</label>
                                    <input type="text" class="form-control" name="NAFILIADO" id="NAFILIADO" value="<?php echo $NAFILIADO; ?>" placeholder="N° Afiliado">
                                </div>
                                <div class="mb-3 col-6">
                                    <label for="EMAIL" class="form-label">Email:</label>
                                    <input type="email" class="form-control" name="EMAIL" id="EMAIL" value="<?php echo $EMAIL; ?>" placeholder="Correo Electrónico">
                                </div>
                                <div class="mb-3 col-3">
                                    <label for="OBSERVACIONES" class="form-label">Observaciones:</label>
                                    <input type="text" class="form-control" name="OBSERVACIONES" id="OBSERVACIONES" value="<?php echo $OBSERVACIONES; ?>" placeholder="Observaciones">
                                </div>
                                <div class="mb-3 col-3">
                                    <label for="ESTADO" class="form-label">Estado:</label>
                                    <input type="text" class="form-control" name="ESTADO" id="ESTADO" value="<?php echo $ESTADO; ?>" placeholder="Estado">
                                </div>

                                <!-- ACTIVIDADES -->
                                <!-- <?php if ($actividadSocio) : ?>
                                    <div>
                                        <h5 class="fs-5 mt-3">
                                            Actividades del Asociado
                                        </h5>
                                    </div>
                                    <div class="table-responsive card-background">
                                        <table class="table" id="customers">
                                            <thead>
                                                <tr>
                                                    <th class="bg-secondary text-warning">id</th>
                                                    <th class="bg-secondary text-warning">ACTIVIDAD</th>
                                                    <th class="bg-secondary text-warning">EDICION_1</th>
                                                    <th class="bg-secondary text-warning">LUGAR DE DESARROLLO</th>
                                                    <th class="bg-secondary text-warning">sel</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <?php
                                                        foreach ($actividadSocio as $activ) { ?>
                                                            <li class="list-group-item p-2">
                                                                <?php echo $activ['id']; ?>
                                                            </li>
                                                        <?php } ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        foreach ($actividadSocio as $activ) { ?>
                                                            <li class="list-group-item p-2">
                                                                🟠<?php echo $activ['nombre_actividad']; ?>
                                                            </li>
                                                        <?php } ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        foreach ($actividadSocio as $activ) { ?>
                                                            <li class="list-group-item p-2">
                                                                🟫<?php echo $activ['lugar']; ?>
                                                            </li>
                                                        <?php } ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        foreach ($actividadSocio as $activ) { ?>

                                                            <div role="group" aria-label="Button group name">
                                                                <input type="type" name="idAct" id="idAct" value="<?php echo $activ['id'];  ?>">
                                                                <button onclick="return confirmDelete();" type="submit" name="accion" value="borrarActividad" class="btn btn-success m-1">
                                                                    borrarActividad
                                                                </button>
                                                            </div>

                                                        <?php } ?>
                                                    </td>
                                                    <td>
                                                    <?php
                                                    foreach ($actividadSocio as $activ) { ?>
                                                    <form action="/login/secciones/vista_socios.php" method="post">
                                                        <div role="group" aria-label="Button group name">
                                                            <input type="type" name="id" id="id" 
                                                                value="<?php echo $id;  ?>">
                                                            <button type="submit" name="accion" 
                                                                value="seleccionar" class="btn btn-secondary m-1">SEL
                                                            </button>
                                                        </div>
                                                    </form>
                                                    <?php } ?>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                <?php endif; ?> -->

                                <div class="mb-3">
                                    <div class="container px-2 py-2">
                                        <h5 class="text-primary">
                                            Actividades
                                        </h5>
                                    </div>
                                    <select multiple class="form-control" name="actividades[]" id="arrayActividadesSocios">
                                        <!-- <option value="">Seleccione actividad:</option>  -->

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

                                <div role="group" aria-label="Button group name">
                                    <button type="submit" name="accion" value="agregarAct" class="btn btn-primary">Agregar Actividad
                                    </button>
                                </div>

                                <div class="mt-3">
                                    <div class="container px-2 py-2 mt-2">
                                        <h6 class="text-primary">
                                            Actividades Vinculadas al Socio
                                        </h6>
                                    </div>
                                    <select multiple class="form-control" name="actividades[]" id="listaActividades">
                                        <?php foreach ($actividades as $actividad) { ?>
                                            <option <?php
                                                    if (!empty($arregloActividades)) :
                                                        if (in_array($actividad['id'], $arregloActividades)) :
                                                            echo 'selected';
                                                        endif;
                                                    endif;
                                                    ?> value="<?php echo $actividad['id']; ?>">

                                                <?php echo $actividad['id']; ?> - <?php echo $actividad['nombre_actividad']; ?>

                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="container">
                                <br><hr >
                                </div>


                                <!-- COMISIONES -->

                                <div class="mb-3">
                                    <div class="container px-2 py-2">
                                        <h5 class="text-success">
                                            Comisiones
                                        </h5>
                                    </div>
                                    <select multiple class="form-control" name="comisiones[]" id="arrayComisionesSocios">
                                        <?php foreach ($comisiones as $comision) { ?>
                                            <option <?php
                                                    if (!empty($arrayComisiones)) :
                                                        if (in_array($comision['id'], $arrayComisiones)) :
                                                            echo "selected";
                                                        endif;
                                                    endif;
                                                    ?> value="<?php echo $comision['id']; ?>">
                                                <?php echo $comision['id']; ?> - <?php echo $comision['nombre_comision']; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <div role="group" aria-label="Button group name">
                                    <button type="submit" name="accion" value="agregarAct" class="btn btn-success">Agregar Comision
                                    </button>
                                </div>

                                <div class="mt-3">
                                    <div class="container px-2 py-2 mt-2">
                                        <h6 class="text-success">
                                            Comisiones Vinculadas al Socio
                                        </h6>
                                    </div>
                                    <select multiple class="form-control" name="comisiones[]" id="listaComisiones">
                                        <?php foreach ($comisiones as $comision) { ?>
                                            <option <?php
                                                    if (!empty($arregloComisiones)) :
                                                        if (in_array($comision['id'], $arregloComisiones)) :
                                                            echo 'selected';
                                                        endif;
                                                    endif;
                                                    ?> value="<?php echo $comision['id']; ?>">

                                                <?php echo $comision['id']; ?> - <?php echo $comision['nombre_comision']; ?>

                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                
                                <div class="text-center mt-3" >
                                    <input type="hidden" name="id" id="id" value="<?php echo $id;  ?>">
                                    <button onclick="return confirmEdit();" type="submit" name="accion" value="editar" class="btn btn-warning fw-bold">EDITAR SOCIO
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
                <div class="container text-center mt-3">
                    <div class="row justify-content-between">
                        <div class="col-4"></div>
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
</div>

<link href="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/css/tom-select.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/js/tom-select.complete.min.js"></script>
<script>
    new TomSelect("#arrayActividadesSocios", {
        plugins: ['remove_button'],
    });


    new TomSelect("#arrayComisionesSocios", {
        plugins: ['remove_button'],
    });

    new TomSelect("#listaActividades", {
        plugins: ['remove_button'],
    });

    new TomSelect("#listaComisiones", {
        plugins: ['remove_button'],
    });
</script>

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
<?php include("../view/head/footer.php"); ?>