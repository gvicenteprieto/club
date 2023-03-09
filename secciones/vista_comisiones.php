<?php include('../view/head/header.php'); ?>
<?php include('../secciones/comisiones.php');  ?>
<div class="container p-5">
    <div class="row">
        <div class="col-12">
            <h5 class="p-2 text-center text-success card bg-light mb-3 fw-bold">COMISIONES</h5>
            <div class="row">
                <div class="col-5 mb-3">
                    <form action="" method="post">
                        <div class="card card-background p-1">
                            <br>
                            <div class="card card-header bg-secondary text-light fs-5 m-3">
                                Gestión de Comisiones
                            </div>
                            <div class="card-body">

                                <div class="mb-3">
                                    <label for="" class="form-label">N° Código</label>
                                    <input type="text" class="form-control" name="id" id="id" value="<?php echo $id; ?>" 
                                        placeholder="Se autogenerará al agregar la Comisión">
                                </div>
                                <div class="mb-3">
                                    <label for="nombre_comision" class="form-label">Nombre</label>
                                    <input type="text" class="form-control text-success fw-bold" name="nombre_comision" 
                                        id="nombre_comision" value="<?php echo $nombre_comision; ?>" placeholder="Nombre Comisión">
                                </div>
                                <div class="mb-3">
                                    <label for="lugar_comision" class="form-label">Lugar</label>
                                    <input type="text" class="form-control" name="lugar" id="lugar" value="<?php echo $lugar; ?>" 
                                        placeholder="Lugar de encuentro">
                                </div>
                                <div class="mb-3">
                                    <label for="dia" class="form-label">Día</label>
                                    <input type="text" class="form-control" name="dia" id="dia" value="<?php echo $dia; ?>" 
                                        placeholder="Día de reuión">
                                </div>
                                <div class="mb-3">
                                    <label for="horaInicio" class="form-label">Hora de Inicio</label>
                                    <input type="time" class="form-control" name="horaInicio" id="horaInicio" 
                                        value="<?php echo $horaInicio; ?>" 
                                        placeholder="Hora de Inicio">
                                </div>
                                <div class="mb-3">
                                    <label for="lugar_comision" class="form-label">Hora de Finalización</label>
                                    <input type="time" class="form-control" name="horaFin" id="horaFin" value="<?php echo $horaFin; ?>" 
                                        placeholder="Hora de Finalización">
                                </div>
                                <div class="btn-group d-flex " role="group" aria-label="Button group name">
                                    <button type="submit" name="accion" value="agregar" class="btn btn-success" 
                                        style="background-color: #00623d">AGREGA
                                    </button>
                                    <button type="submit" name="accion" value="editar" class="btn btn-warning">EDITA
                                    </button>
                                    <button type="submit" name="accion" value="borrar" class="btn btn-danger">BORRA</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-7">
                    <div class="card card-background p-1">
                        <br>
                        <div class="card card-header bg-secondary text-light fs-5 m-3">
                            Listado de Comisiones
                        </div>
                        <div class="text-center mb-2">
                            <form action="vista_comisiones.php" method="post">
                                <input type="text" name="buscar" class="btn fw-bold fs-6" style="background-color: #a6c3de">
                                <input type="submit" value="Buscar" class="btn btn-primary">
                            </form>
                        </div>
                        <div class="table-responsive card-body card-background">
                            <table class="table ">
                                <thead>
                                    <tr>
                                        <th>Comisión</th>
                                        <th>Lugar</th>
                                        <th>Día</th>
                                        <th >Inicio</th>
                                        <th>Fin</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if ($buscar != "") { ?>
                                        <?php foreach ($sql_response as $response) : ?>
                                            <tr>
                                                <!-- <td class="text-center"><?= $response['id']; ?></td> -->
                                                <td class="text-success fw-bold"><?= $response['nombre_comision']; ?></td>
                                                <td><?= $response['lugar']; ?></td>
                                                <td><?= $response['dia']; ?></td>
                                                <td><?= $response['horaInicio']; ?></td>
                                                <td><?= $response['horaFin']; ?></td>
                                                <td>
                                                    <form action="" method="post">
                                                        <input type="hidden" name="id" id="id" class="text-center" 
                                                            value="<?php echo $response['id']; ?>">
                                                        <input type="submit" value="seleccionar" name="accion" class="btn btn-secondary">
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php } else { ?>
                                        <?php foreach ($listaComisiones as $comision) { ?>
                                            <tr>
                                                <!-- <td class="text-center"><?php echo $comision['id']; ?></td> -->
                                                <td class=" text-success fw-bold "><?php echo $comision['nombre_comision']; ?></td>
                                                <td><?php echo $comision['lugar']; ?></td>
                                                <td><?php echo $comision['dia']; ?></td>
                                                <td><?php echo $comision['horaInicio']; ?></td>
                                                <td><?php echo $comision['horaFin']; ?></td>
                                                <td>
                                                    <form action="" method="post">
                                                        <input type="hidden" name="id" id="id" value="<?php echo $comision['id']; ?>">
                                                        <input type="submit" value="seleccionar" name="accion" class="btn btn-secondary">
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    <?php } ?>
                                </tbody>
                            </table>
                            <?php if ($buscar != "") { ?>
                                <div class="container text-center mt-3">
                                    <div class="row justify-content-between">
                                        <div class="col-4"></div>
                                        <div class="col-4">
                                            <div>
                                                <a href="./vista_comisiones.php" class="btn btn-success m-2">
                                                    REGRESAR A VISTA DE COMISIONES
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="container text-center mt-3">
                    <div class="row justify-content-between">
                        <div class="col-4"></div>
                        <div class="col-4">
                            <div>
                                <a href="./vista_socios.php" class="btn btn-secondary m-2">
                                    REGRESAR A VISTA DE SOCIOS
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