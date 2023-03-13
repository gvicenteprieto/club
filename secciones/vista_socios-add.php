<?php include('../view/head/header.php'); ?>
<?php
if (empty($_SESSION['usuario'])) {
     header("Location:../view/home/panelControl.php");
 }
?>
<?php include('../secciones/socios.php');  ?>

<div class="fondo_login">
    <div class="container p-5">
        <div class="row">
            <div class="col-12">
                <h5 class="p-2 text-center text-success card bg-light mb-3 fw-bold">SOCIOS</h5>
                <div class="row">
                    <div class="col-md-12">
                        <form action="vista_socios.php" method="post">
                            <div class="card card-background p-1">
                                <br>
                                <div class="btn-success bg-success card card-header fw-bold text-light m-3">
                                    Gestión de ALTA Socios
                                </div>
                                <div class="card-body row">
                                    <div class="mb-3 col-3">
                                        <label for="FINGRESO" class="form-label text-secondary">Ingreso:</label>
                                        <input type="date" class="form-control bg-primary-subtle text-primary-emphasis" 
                                            name="FINGRESO" id="FINGRESO" value="<?php echo $FINGRESO; ?>" required placeholder="Fecha ingreso">
                                    </div>
                                    <div class="mb-3 col-3">
                                        <label for="DNI" class="form-label text-secondary">DNI:</label>
                                        <input type="text" class="form-control bg-primary-subtle text-primary-emphasis" 
                                            name="DNI" id="DNI" value="<?php echo $DNI; ?>" required placeholder="DNI">
                                    </div>
                                    <div class="mb-3 col-3">
                                        <label for="APELLIDO" class="form-label text-secondary">Apellido:</label>
                                        <input type="text" class="form-control bg-primary-subtle text-primary-emphasis" 
                                            name="APELLIDO" id="APELLIDO" value="<?php echo $APELLIDO; ?>" required placeholder="Apellido">
                                    </div>
                                    <div class="mb-3 col-3">
                                        <label for="NOMBRE" class="form-label text-secondary">Nombre:</label>
                                        <input type="text" class="form-control bg-primary-subtle text-primary-emphasis" 
                                            name="NOMBRE" id="NOMBRE" value="<?php echo $NOMBRE; ?>" required placeholder="Nombre">
                                    </div>
                                    <div class="mb-3 col-3">
                                        <label for="FNACIMIENTO" class="form-label text-secondary">Nacimiento:</label>
                                        <input type="date" class="form-control bg-primary-subtle text-primary-emphasis" 
                                            name="FNACIMIENTO" id="FNACIMIENTO" value="<?php echo $FNACIMIENTO; ?>" required placeholder="Fecha Nacimiento">
                                    </div>
                                    <div class="mb-3 col-3">
                                        <label for="CELULAR" class="form-label text-secondary">Celular:</label>
                                        <input type="text" class="form-control bg-primary-subtle text-primary-emphasis" 
                                            name="CELULAR" id="CELULAR" value="<?php echo $CELULAR; ?>" required placeholder="Celular">
                                    </div>
                                    <div class="mb-3 col-6">
                                        <label for="EMAIL" class="form-label text-secondary">Email:</label>
                                        <input type="email" class="form-control bg-primary-subtle text-primary-emphasis" 
                                            name="EMAIL" id="EMAIL" value="<?php echo $EMAIL; ?>" required placeholder="Correo Electrónico">
                                    </div>

                                    <div class="d-grid gap-2 mb-2 mt-3 p-3">
                                        <div class="bg-secondary-subtle border border-secondary-subtle rounded-3"></div>
                                    </div>

                                    <div class="mb-3 col-4">
                                        <label for="CALLE" class="form-label text-secondary">Calle:</label>
                                        <input type="text" class="form-control bg-primary-subtle text-primary-emphasis" 
                                            name="CALLE" id="CALLE" value="<?php echo $CALLE; ?>" placeholder="Calle">
                                    </div>
                                    <div class="mb-3 col-2">
                                        <label for="ALTURA" class="form-label text-secondary">Altura:</label>
                                        <input type="text" class="form-control bg-primary-subtle text-primary-emphasis" 
                                            name="ALTURA" id="ALTURA" value="<?php echo $ALTURA; ?>" placeholder="Altura">
                                    </div>
                                    <div class="mb-3 col-3">
                                        <label for="ECALLE_1" class="form-label text-secondary">Entre Calle:</label>
                                        <input type="text" class="form-control bg-primary-subtle text-primary-emphasis" 
                                            name="ECALLE_1" id="ECALLE_1" value="<?php echo $ECALLE_1; ?>" placeholder="Entre Calle 1">
                                    </div>
                                    <div class="mb-3 col-3">
                                        <label for="ECALLE_2" class="form-label text-secondary">Entre Calle:</label>
                                        <input type="text" class="form-control bg-primary-subtle text-primary-emphasis" 
                                            name="ECALLE_2" id="ECALLE_2" value="<?php echo $ECALLE_2; ?>" placeholder="Entre Calle 2">
                                    </div>
                                    <div class="mb-3 col-2">
                                        <label for="PISO" class="form-label text-secondary">Piso:</label>
                                        <input type="text" class="form-control bg-primary-subtle text-primary-emphasis" 
                                            name="PISO" id="PISO" value="<?php echo $PISO; ?>" placeholder="Piso">
                                    </div>
                                    <div class="mb-3 col-2">
                                        <label for="DEPTO" class="form-label text-secondary">Dpto:</label>
                                        <input type="text" class="form-control bg-primary-subtle text-primary-emphasis" 
                                            name="DEPTO" id="DEPTO" value="<?php echo $DEPTO; ?>" placeholder="Departamento">
                                    </div>
                                    <div class="mb-3 col-3">
                                        <label for="LOCALIDAD" class="form-label text-secondary">Localidad:</label>
                                        <input type="text" class="form-control bg-primary-subtle text-primary-emphasis" 
                                            name="LOCALIDAD" id="LOCALIDAD" value="<?php echo $LOCALIDAD; ?>" placeholder="Localidad - Barrio">
                                    </div>
                                    <div class="mb-3 col-3">
                                        <label for="PARTIDO" class="form-label text-secondary">Partido:</label>
                                        <input type="text" class="form-control bg-primary-subtle text-primary-emphasis" 
                                            name="PARTIDO" id="PARTIDO" value="<?php echo $PARTIDO; ?>" placeholder="Partido">
                                    </div>
                                    <div class="mb-3 col-2">
                                        <label for="CPOSTAL" class="form-label text-secondary">C. Postal:</label>
                                        <input type="text" class="form-control bg-primary-subtle text-primary-emphasis" 
                                            name="CPOSTAL" id="CPOSTAL" value="<?php echo $CPOSTAL; ?>" placeholder="Código Postal">
                                    </div>

                                    <div class="d-grid gap-2 mb-2 mt-3 p-3">
                                        <div class="bg-secondary-subtle border border-secondary-subtle rounded-3"></div>
                                    </div>

                                    <div class="mb-3 col-3">
                                        <label for="OSOCIAL" class="form-label text-secondary">O. Social:</label>
                                        <input type="text" class="form-control bg-primary-subtle text-primary-emphasis" 
                                            name="OSOCIAL" id="OSOCIAL" value="<?php echo $OSOCIAL; ?>" placeholder="Obra Social">
                                    </div>
                                    <div class="mb-3 col-3">
                                        <label for="NAFILIADO" class="form-label text-secondary">N° Afiliado:</label>
                                        <input type="text" class="form-control bg-primary-subtle text-primary-emphasis" 
                                            name="NAFILIADO" id="NAFILIADO" value="<?php echo $NAFILIADO; ?>" placeholder="N° Afiliado">
                                    </div>
                                    <div class="mb-3 col-3">
                                        <label for="ESTADO" class="form-label text-secondary">Estado:</label>
                                        <input type="text" class="form-control bg-primary-subtle text-primary-emphasis" 
                                            name="ESTADO" id="ESTADO" value="<?php echo $ESTADO; ?>" placeholder="Estado">
                                    </div>
                                    <div class="mb-3 col-3">
                                        <label for="OBSERVACIONES" class="form-label text-secondary">Observaciones:</label>
                                        <input type="text" class="form-control bg-primary-subtle text-primary-emphasis" 
                                            name="OBSERVACIONES" id="OBSERVACIONES" value="<?php echo $OBSERVACIONES; ?>" placeholder="Observaciones">
                                    </div>

                                    <div class="d-grid gap-2 mb-2 mt-3 p-3">
                                        <div class="bg-secondary-subtle border border-secondary rounded-3"></div>
                                    </div>

                                    <div class="row col-12">
                                        <div class="col-6">
                                            <!-- ACTIVIDADES -->
                                            <div class="mb-3">
                                                <div class="container px-2 py-2">
                                                    <h5 class="text-primary">
                                                        Seleccione Actividad para vincular al asociado:
                                                    </h5>
                                                </div>
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
                                        </div>
                                        <div class="col-6">
                                        <!-- COMISIONES -->
                                            <div class="mb-3">
                                                <div class="container px-2 py-2">
                                                    <h5 class="text-success">
                                                        Seleccione Comisión para vincular al asociado:
                                                    </h5>
                                                </div>
                                                <select multiple class="form-control" name="comisiones[]" id="listaComisiones">
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
                                        </div>
                                        <div class="d-grid gap-2 mb-2 mt-3 p-3">
                                            <div class="bg-secondary-subtle border border-secondary rounded-3"></div>
                                        </div>
                                        <div class="btn-group d-flex mt-3" role="group" aria-label="Button group name">
                                            <button type="submit" name="accion" value="agregar" class="btn btn-success fw-bold boton_nav-estad">AGREGAR NUEVO SOCIO
                                            </button>
                                        </div>
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
</div>

<?php include("../view/head/footer.php"); ?>