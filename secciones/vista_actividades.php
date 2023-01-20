<?php include('../view/head/header.php'); ?>

<?php include('../secciones/actividades.php');  ?>


<div class="container-fluid p-5">
    <div class="row">
        <div class="col-12">
            <h5 class="p-2 text-center text-success card bg-light mb-3 fw-bold">ACTIVIDADES</h5>

            <div class="row">
                <div class="col-md-4 mb-3">
                    <form action="" method="post">
                        <div class="card card-background p-1">
                            <br>
                            <div class="card card-header bg-secondary text-light">
                                <h6 class="text-center mt-1 fw-bold">Gestión de actividades</h6>
                            </div>
                            <div class="card-body">

                                <div class="mb-3">
                                    <label for="" class="form-label">CODIGO ACTIVIDAD</label>
                                    <input type="text" class="form-control" name="id" id="id" 
                                    value="<?php echo $id; ?>" placeholder="ID Actividad">
                                </div>

                                <div class="mb-3">
                                    <label for="nombre_actividad" class="form-label">Nombre</label>
                                    <input type="text" class="form-control" name="nombre_actividad" 
                                    id="nombre_actividad" 
                                    value="<?php echo $nombre_actividad; ?>" placeholder="Nombre Actividad">
                                </div>

                                <div class="mb-3">
                                    <label for="nombre_actividad" class="form-label">Lugar</label>
                                    <input type="text" class="form-control" name="lugar" 
                                    id="lugar" 
                                    value="<?php echo $lugar; ?>" placeholder="Lugar donde se practica">
                                </div>

                                <div class="btn-group d-flex " role="group" aria-label="Button group name">
                                    <!-- <div class="d-flex p-3"> -->
                                    <button type="submit" name="accion" 
                                    value="agregar" class="btn btn-success" style="background-color: #00623d">AGREGA</button>
                                    <button type="submit" name="accion" 
                                    value="editar" class="btn btn-warning">EDITA</button>
                                    <button type="submit" name="accion" 
                                    value="borrar" class="btn btn-danger">BORRA</button>
                                    <!-- </div> -->
                                </div>
                            </div>

                        </div>
                    </form>
                </div>

                <div class="col-md-8">
                    <div class="card card-background p-1 mb-3">
                        <br>
                        <div class="card card-header bg-secondary text-light">
                        <a class="nav-link text-center mt-1 fw-bold" 
                                href="/login/secciones/vista_actividades.php">
                                Listado de Actividades
                            </a>
                            <!-- <h6 class="text-center mt-1">Listado de Actividades</h6> -->
                        </div>

                        <div class="text-center mb-2 mt-5">
                            <form action="vista_actividades.php" method="post">
                                <input type="text" name="buscar" 
                                    class="btn fw-bold fs-6" style="background-color: #a6c3de">
                                <input type="submit" value="Buscar" class="btn btn-primary">
                            </form>
                        </div>

                        <!-- tabla -->
                        <div class="table-responsive card-body card-background">
                            <table class="table ">
                                <thead>
                                    <tr>
                                        <th class="text-center">ID Actividad</th>
                                        <th class="">Nombre</th>
                                        <th class="">Lugar</th>
                                    </tr>
                                </thead>

                                <tbody>

                                <?php if ($buscar != "") { ?>

                                        <?php foreach ($sql_response as $response) :?>

                                        <tr>
                                            <td class="text-center"><?=$response['id']; ?></td>
                                            <td class="text-primary fw-bold"><?=$response['nombre_actividad']; ?></td>
                                            <td ><?=$response['lugar']; ?></td>
                                            <td >
                                                <form action="" method="post">
                                                    <input type="hidden" name="id" id="id" class="text-center"
                                                    value="<?php echo $response['id']; ?>">
                                                    <input type="submit" value="seleccionar" name="accion" class="btn btn-secondary">
                                                </form>
                                            </td>
                                        </tr>

                                        <?php endforeach; ?> 

                                    <?php } else {?> 




                                    <!-- 0. 1. foreach para recorrer el listado y poder mostrar cda axctividad -->
                                    <?php foreach ($listaActividades as $actividad) { ?>
                                        <tr>
                                            <td class="text-center"><?php echo $actividad['id']; ?></td>
                                            <td class=" text-primary fw-bold "><?php echo $actividad['nombre_actividad']; ?></td>
                                            <td ><?php echo $actividad['lugar']; ?></td>
                                            <td>
                                                <form action="" method="post">
                                                    <input type="hidden" name="id" id="id" 
                                                    value="<?php echo $actividad['id']; ?>">
                                                    <input type="submit" value="seleccionar" name="accion" 
                                                    class="btn btn-secondary">
                                                </form>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    <?php } ?> 
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>

</div>

<?php include("../view/head/footer.php"); ?>