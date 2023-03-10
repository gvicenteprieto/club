<?php include('../view/head/header.php'); ?>
<?php include('../secciones/socios.php'); 
if (empty($_SESSION['usuario'])) {
    header("Location:../index.php");
 }
 ?>
<div class="fondo_login">
    <div class="container-fluid p-5">
        <div class="row">
            <div class="col-12">
                <h5 class="p-2 text-center text-success card bg-light mb-3 fw-bold">SOCIOS</h5>
                <div class="row">
                    <div class="col-12">
                        <br>
                        <div class="card card-header bg-secondary text-light fs-5">
                            Gestión de Socios
                        </div>
                        <div class="text-center row mt-3">
                            <div class="col-6">
                                <button class="btn bg-success text-light mb-2 mt-2 ">
                                    <a class="nav-link text-center boton_nav-estad" href="/login/secciones/vista_socios-add.php">
                                        Agregar nuevo Socio
                                    </a>
                                </button>
                            </div>
                            <div class="col-6">
                                <form action="vista_socios.php" method="post">
                                    <input type="text" name="buscar" class="btn fw-bold fs-6 text-center mb-2 mt-2" 
                                        style="background-color: #a6c3de">
                                    <input type="submit" value="Buscar Socio" class="btn btn-primary boton_nav-estad">
                                </form>
                            </div>
                        </div>
                        <div class="table-responsive card-body card-background">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>N° SOCIO</th>
                                        <th>Apellido</th>
                                        <th>Nombre</th>
                                        <th>Teléfono</th>
                                        <th>Email</th>
                                        <th>Localidad - Partido</th>
                                        <th>Edición Registro Socio</th>
                                        <th>Perfiles</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if ($buscar != "") { ?>
                                        <?php foreach ($sql_response as $response) : ?>
                                            <tr>
                                                <td class="text-light fw-bold"><i><?php echo $response['NSOCIO']; ?></i>
                                                    <!-- <?php
                                                            foreach ($response["actividades"] as $actividad) { ?>
                                                            <br>
                                                            🟠<a class="text-secondary" href="#" id="listaActividades">
                                                                <?php echo $actividad['nombre_actividad']; ?> 
                                                            </a>
                                                    <?php } ?> -->
                                                </td>
                                                <td><?= $response['APELLIDO']; ?></td>
                                                <td><?= $response['NOMBRE'];  ?></td>
                                                <td><?= $response['CELULAR'];  ?></td>
                                                <td><?= $response['EMAIL'];  ?></td>
                                                <td><?= $response['LOCALIDAD'];  ?> - <?= $response['PARTIDO'];  ?></td>
                                                <td>
                                                    <div class="d-flex ">
                                                        <form action="/login/secciones/vista_socios-edit.php" method="post">
                                                            <div role="group" aria-label="Button group name">
                                                                <input type="hidden" name="id" id="id" value="<?php echo $response['id'];  ?>">
                                                                <button onclick="return confirmEdit();" type="submit" 
                                                                    name="accion" value="editar" class="btn btn-warning m-1 boton_nav-estad">EDITAR
                                                                </button>
                                                            </div>
                                                        </form> 
                                                        <form action="/login/secciones/vista_socios.php" method="post">
                                                            <div role="group" aria-label="Button group name">
                                                                <input type="hidden" name="id" id="id" value="<?php echo $response['id'];  ?>">
                                                                <button onclick="return confirmDelete();" type="submit" 
                                                                    name="accion" value="borrar" class="btn btn-danger m-1 boton_nav-estad">QUITAR
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </td>
                                                <td>
                                                    <form action="/login/secciones/perfil_socio.php" method="post">
                                                        <div role="group" aria-label="Button group name">
                                                            <input type="hidden" name="id" id="id" value="<?php echo $response['id'];  ?>">
                                                            <button type="submit" class="btn btn-light m-1">
                                                                <!-- VER -->
                                                            <!-- <i class="fa fa-eye text-info"> </i> -->
                                                            <div class="boton_nav-estad">👁️‍🗨️</div>
                                                            </button>
                                                        </div>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php } else { ?>
                                        <?php foreach ($socios as $socio) : ?>
                                            <tr>
                                                <td class="text-light"><i><?php echo $socio['NSOCIO']; ?></i>
                                                    <?php
                                                    foreach ($socio["actividades"] as $actividad) { ?>
                                                        <br>
                                                        🔸<a class="text-secondary" href="#" id="listaActividades">
                                                            <?php echo $actividad['nombre_actividad']; ?>
                                                        </a>
                                                    <?php } ?>
                                                    <?php
                                                    foreach ($socio["comisiones"] as $comision) { ?>
                                                        <br>
                                                        ❇️<a class="text-success fw-bold" href="#" id="listaComisiones">
                                                            <?php echo $comision['nombre_comision']; ?>
                                                        </a>
                                                    <?php } ?>
                                                </td>
                                                <td class=""><?php echo $socio['APELLIDO']; ?></td>
                                                <td><?php echo $socio['NOMBRE']; ?></td>
                                                <td><?php echo $socio['CELULAR']; ?></td>
                                                <td><?php echo $socio['EMAIL']; ?></td>
                                                <td><?php echo $socio['LOCALIDAD']; ?> - <?php echo $socio['PARTIDO']; ?></td>
                                                <td>
                                                    <div class="d-flex ">
                                                        <form action="/login/secciones/vista_socios-edit.php" method="post">
                                                            <div role="group" aria-label="Button group name">
                                                                <input type="hidden" name="id" id="id" value="<?php echo $socio['id'];  ?>">
                                                                <button onclick="return confirmEdit();" type="submit" name="accion" 
                                                                    value="seleccionar" class="btn btn-warning m-1">EDITAR
                                                                </button>
                                                            </div>
                                                        </form>
                                                        <form action="/login/secciones/vista_socios.php" method="post">
                                                            <div role="group" aria-label="Button group name">
                                                                <input type="hidden" name="id" id="id" value="<?php echo $socio['id'];  ?>">
                                                                <button onclick="return confirmDelete();" type="submit" name="accion" 
                                                                    value="borrar" class="btn btn-danger m-1">QUITAR
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </td>
                                                <td>
                                                    <form action="/login/secciones/perfil_socio.php" method="post">
                                                        <div role="group" aria-label="Button group name">
                                                            <input type="hidden" name="id" id="id" value="<?php echo $socio['id'];  ?>">
                                                            <button type="submit" class="btn btn-light m-1 boton_nav-estad">
                                                                <!-- <i class="fa fa-eye text-light"> </i>👁️‍🗨️ -->
                                                                <div class="boton_nav-estad">👁️‍🗨️</div>
                                                            </button>
                                                        </div>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php endforeach;  ?>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <?php if ($buscar != "") { ?>
                        <div class="container text-center mt-3">
                            <div class="row justify-content-between">
                                <div class="col-4"></div>
                                <div class="col-4">
                                    <div>
                                        <a href="./vista_socios.php" class="boton_nav-estad btn btn-secondary m-2">
                                            REGRESAR
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>

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