<?php include('../view/head/header.php'); ?>
<?php include('../secciones/estadisticas.php');

if (empty($_SESSION['usuario'])) {
    header("Location:../index.php");
}
?>
<div class="fondo_login">
    <div class="container-fluid p-5">
        <div class="row">
            <div class="col-12">
                <h5 class="p-2 text-center text-success card bg-light mb-3 fw-bold">ESTADISTICAS</h5>
                <div class="row">
                    <div class="col-12">
                        <br>
                        <div class="card card-header bg-secondary text-light fs-5">
                            Datos
                        </div>

                        <div class="row col-12">
                            <div class="row col-6 mt-3 mb-3">
                                <div class="col-5 p-2 text-end ">Número de Usuarios: </div>
                                <div class="col-1"></div>
                                <div class="col-5 text-success text-center card fw-bold">
                                    <h5 class="mt-2">
                                        <i>
                                            <?php echo $cantidadUsuarios; ?>
                                        </i>
                                    </h5>
                                </div>
                                <div class="col-1"></div>
                            </div>

                            <div class="row col-6 mt-3 mb-3">
                                <div class="col-5 p-2 text-end ">Número de Socios: </div>
                                <div class="col-1"></div>
                                <div class="col-5 text-success text-center card fw-bold">
                                    <h5 class="mt-2">
                                        <i>
                                            <?php echo $cantidadSocios; ?>
                                        </i>
                                    </h5>
                                </div>
                                <div class="col-1"></div>
                            </div>
                        </div>

                        <div class="row col-12">
                            <div class="row col-6 mt-3 mb-3">
                                <div class="col-5 p-2 text-end ">Número de Actividades: </div>
                                <div class="col-1"></div>
                                <div class="col-5 text-success text-center card fw-bold">
                                    <h5 class="mt-2">
                                        <i>
                                            <?php echo $cantidadActividades; ?>
                                        </i>
                                    </h5>
                                </div>
                                <div class="col-1"></div>
                            </div>

                            <div class="row col-6 mt-3 mb-3">
                                <div class="col-5 p-2 text-end ">Número de Comisiones: </div>
                                <div class="col-1"></div>
                                <div class="col-5 text-success text-center card fw-bold">
                                    <h5 class="mt-2">
                                        <i>
                                            <?php echo $cantidadComisiones; ?>
                                        </i>
                                    </h5>
                                </div>
                                <div class="col-1"></div>
                            </div>
                        </div>

                        <div class="d-grid gap-2 mb-2 mt-3 p-3">
                            <div class="bg-secondary-subtle border border-secondary rounded-3"></div>
                        </div>

                        <div class="row col-12">

                            <div class="row col-6">

                                <?php if ($sociosDirectiva != 0) { ?>
                                    <!-- <div class="row col-12 mt-3 mb-3"> -->
                                        <div class="col-5 p-2 text-end ">Socios en Comisión Directiva: </div>
                                        <div class="col-1"></div>
                                        <div class="col-5 text-success text-center card fw-bold">
                                            <h5 class="mt-2 ">
                                                <i >
                                                    <?php echo $sociosDirectiva; ?>
                                                </i>
                                            </h5>
                                        </div>
                                        <div class="col-1"></div>
                                    <!-- </div> -->
                                <?php }  ?>

                                <?php if ($sociosDeportes != 0) { ?>
                                    <!-- <div class="row col-12 mt-3 mb-3"> -->
                                        <div class="col-5 p-2 text-end ">Socios en Comisión Deportes: </div>
                                        <div class="col-1"></div>
                                        <div class="col-5 text-success text-center card fw-bold">
                                            <h5 class="mt-2">
                                                <i>
                                                    <?php echo $sociosDeportes; ?>
                                                </i>
                                            </h5>
                                        </div>
                                        <div class="col-1"></div>
                                    <!-- </div> -->
                                <?php }  ?>

                                <?php if ($sociosPrensa != 0) { ?>
                                    <!-- <div class="row col-12 mt-3 mb-3"> -->
                                        <div class="col-5 p-2 text-end ">Socios en Comisión Prensa: </div>
                                        <div class="col-1"></div>
                                        <div class="col-5 text-success text-center card fw-bold">
                                            <h5 class="mt-2">
                                                <i>
                                                    <?php echo $sociosPrensa; ?>
                                                </i>
                                            </h5>
                                        </div>
                                        <div class="col-1"></div>
                                    <!-- </div> -->
                                <?php }  ?>

                                <?php if ($sociosCultura != 0) { ?>
                                    <!-- <div class="row col-12 mt-3 mb-3"> -->
                                        <div class="col-5 p-2 text-end ">Socios en Comisión Cultura: </div>
                                        <div class="col-1"></div>
                                        <div class="col-5 text-success text-center card fw-bold">
                                            <h5 class="mt-2">
                                                <i>
                                                    <?php echo $sociosCultura; ?>
                                                </i>
                                            </h5>
                                        </div>
                                        <div class="col-1"></div>
                                    <!-- </div> -->
                                <?php }  ?>
                            </div>
                            <!-- <div class="d-grid gap-2 mb-2 mt-3 p-3">
                                        <div class="bg-secondary-subtle border border-secondary rounded-3"></div>
                                    </div> -->
                            <div class="row col-6">
                                <?php if ($sociosFutbol != 0) { ?>
                                    <!-- <div class="row col-12 mt-3 mb-3"> -->
                                        <div class="col-5 p-2 text-end ">Socios en Actividad Fútbol: </div>
                                        <div class="col-1"></div>
                                        <div class="col-5 text-success text-center card fw-bold">
                                            <h5 class="mt-2">
                                                <i>
                                                    <?php echo $sociosFutbol; ?>
                                                </i>
                                            </h5>
                                        </div>
                                        <div class="col-1"></div>
                                    <!-- </div> -->
                                <?php }  ?>

                                <?php if ($sociosRugby != 0) { ?>
                                    <!-- <div class="row col-12 mt-3 mb-3"> -->
                                        <div class="col-5 p-2 text-end ">Socios en Actividad Rugby: </div>
                                        <div class="col-1"></div>
                                        <div class="col-5 text-success text-center card fw-bold">
                                            <h5 class="mt-2">
                                                <i>
                                                    <?php echo $sociosRugby; ?>
                                                </i>
                                            </h5>
                                        </div>
                                        <div class="col-1"></div>
                                    <!-- </div> -->
                                <?php }  ?>

                                <?php if ($sociosHockey != 0) { ?>
                                    <!-- <div class="row col-12 mt-3 mb-3"> -->
                                        <div class="col-5 p-2 text-end ">Socios en Actividad Hockey: </div>
                                        <div class="col-1"></div>
                                        <div class="col-5 text-success text-center card fw-bold">
                                            <h5 class="mt-2">
                                                <i>
                                                    <?php echo $sociosHockey; ?>
                                                </i>
                                            </h5>
                                        </div>
                                        <div class="col-1"></div>
                                    <!-- </div> -->
                                <?php }  ?>

                                <?php if ($sociosTaekwondo != 0) { ?>
                                    <!-- <div class="row col-12 mt-3 mb-3"> -->
                                        <div class="col-5 p-2 text-end ">Socios en Actividad Taekwondo: </div>
                                        <div class="col-1"></div>
                                        <div class="col-5 text-success text-center card fw-bold">
                                            <h5 class="mt-2">
                                                <i>
                                                    <?php echo $sociosTaekwondo; ?>
                                                </i>
                                            </h5>
                                        </div>
                                        <div class="col-1"></div>
                                    <!-- </div> -->
                                <?php }  ?>

                                <?php if ($sociosTenis != 0) { ?>
                                    <!-- <div class="row col-12 mt-3 mb-3"> -->
                                        <div class="col-5 p-2 text-end ">Socios en Actividad Tenis: </div>
                                        <div class="col-1"></div>
                                        <div class="col-5 text-success text-center card fw-bold">
                                            <h5 class="mt-2">
                                                <i>
                                                    <?php echo $sociosTenis; ?>
                                                </i>
                                            </h5>
                                        </div>
                                        <div class="col-1"></div>
                                    <!-- </div> -->
                                <?php }  ?>

                                <?php if ($sociosGimnasio != 0) { ?>
                                    <!-- <div class="row col-12 mt-3 mb-3"> -->
                                        <div class="col-5 p-2 text-end ">Socios en Actividad Gimnasio: </div>
                                        <div class="col-1"></div>
                                        <div class="col-5 text-success text-center card fw-bold">
                                            <h5 class="mt-2">
                                                <i>
                                                    <?php echo $sociosGimnasio; ?>
                                                </i>
                                            </h5>
                                        </div>
                                        <div class="col-1"></div>
                                    <!-- </div> -->
                                <?php }  ?>

                                <?php if ($sociosPadel != 0) { ?>
                                    <!-- <div class="row col-12 mt-3 mb-3"> -->
                                        <div class="col-5 p-2 text-end ">Socios en Actividad Pádel: </div>
                                        <div class="col-1"></div>
                                        <div class="col-5 text-success text-center card fw-bold">
                                            <h5 class="mt-2">
                                                <i>
                                                    <?php echo $sociosPadel; ?>
                                                </i>
                                            </h5>
                                        </div>
                                        <div class="col-1"></div>
                                    <!-- </div> -->
                                <?php }  ?>

                                <?php if ($sociosPadel != 0) { ?>
                                    <!-- <div class="row col-12 mt-3 mb-3"> -->
                                        <div class="col-5 p-2 text-end ">Socios en Actividad Ajedrez: </div>
                                        <div class="col-1"></div>
                                        <div class="col-5 text-success text-center card fw-bold">
                                            <h5 class="mt-2">
                                                <i>
                                                    <?php echo $sociosAjedrez; ?>
                                                </i>
                                            </h5>
                                        </div>
                                        <div class="col-1"></div>
                                    <!-- </div> -->
                                <?php }  ?>
                            </div>
                        </div>
                        <div class="d-grid gap-2 mb-2 mt-3 p-3">
                            <div class="bg-secondary-subtle border border-secondary rounded-3"></div>
                        </div>
                        <div class="container text-center mt-3">
                            <div class="row justify-content-between">
                                <div class="col-4"></div>
                                <div class="col-4">
                                    <div>
                                        <a href="../view/home/panelControl.php" class="btn btn-secondary m-2 boton_nav-estad">
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
</div>
<?php include("../view/head/footer.php"); ?>