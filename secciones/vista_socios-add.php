<?php include('../view/head/header.php'); ?>
<?php include('../secciones/socios.php');  ?>

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
                                <div class="mb-3 col-6">
                                    <label for="FINGRESO" class="form-label">Fecha Ingreso:</label>
                                    <input type="date" class="form-control" name="FINGRESO" id="FINGRESO" 
                                        value="<?php echo $FINGRESO; ?>" placeholder="Fecha ingreso">
                                </div>
                                <div class="mb-3 col-6">
                                    <label for="NSOCIO" class="form-label">N° Socio:</label>
                                    <input type="text" class="form-control" name="NSOCIO" id="NSOCIO" 
                                        value="<?php echo $NSOCIO; ?>" placeholder="N° Socio">
                                </div>
                                <div class="mb-3 col-6">
                                    <label for="APELLIDO" class="form-label">Apellido:</label>
                                    <input type="text" class="form-control" name="APELLIDO" id="APELLIDO" 
                                        value="<?php echo $APELLIDO; ?>" placeholder="Apellido">
                                </div>
                                <div class="mb-3 col-6">
                                    <label for="NOMBRE" class="form-label">Nombre:</label>
                                    <input type="text" class="form-control" name="NOMBRE" id="NOMBRE" 
                                        value="<?php echo $NOMBRE; ?>" placeholder="Nombre">
                                </div>
                                <div class="mb-3 col-6">
                                    <label for="CALLE" class="form-label">Calle:</label>
                                    <input type="text" class="form-control" name="CALLE" id="CALLE" 
                                        value="<?php echo $CALLE; ?>" placeholder="Calle">
                                </div>
                                <div class="mb-3 col-6">
                                    <label for="ALTURA" class="form-label">Altura:</label>
                                    <input type="text" class="form-control" name="ALTURA" id="ALTURA" 
                                        value="<?php echo $ALTURA; ?>" placeholder="Altura">
                                </div>
                                <div class="mb-3 col-6">
                                    <label for="ECALLE_1" class="form-label">Entre Calle 1:</label>
                                    <input type="text" class="form-control" name="ECALLE_1" id="ECALLE_1" 
                                        value="<?php echo $ECALLE_1; ?>" placeholder="Entre Calle 1">
                                </div>
                                <div class="mb-3 col-6">
                                    <label for="ECALLE_2" class="form-label">Entre Calle 2:</label>
                                    <input type="text" class="form-control" name="ECALLE_2" id="ECALLE_2" 
                                        value="<?php echo $ECALLE_2; ?>" placeholder="Entre Calle 2">
                                </div>
                                <div class="mb-3 col-6">
                                    <label for="PISO" class="form-label">Piso:</label>
                                    <input type="text" class="form-control" name="PISO" id="PISO" 
                                        value="<?php echo $PISO; ?>" placeholder="Piso">
                                </div>
                                <div class="mb-3 col-6">
                                    <label for="DEPTO" class="form-label">Departamento:</label>
                                    <input type="text" class="form-control" name="DEPTO" id="DEPTO" 
                                        value="<?php echo $DEPTO; ?>" placeholder="Departamento">
                                </div>
                                <div class="mb-3 col-6">
                                    <label for="PARTIDO" class="form-label">Partido:</label>
                                    <input type="text" class="form-control" name="PARTIDO" id="PARTIDO" 
                                        value="<?php echo $PARTIDO; ?>" placeholder="Partido">
                                </div>
                                <div class="mb-3 col-6">
                                    <label for="CPOSTAL" class="form-label">Código Postal:</label>
                                    <input type="text" class="form-control" name="CPOSTAL" id="CPOSTAL" 
                                        value="<?php echo $CPOSTAL; ?>" placeholder="Código Postal">
                                </div>
                                <div class="mb-3 col-6">
                                    <label for="LOCALIDAD" class="form-label">Localidad:</label>
                                    <input type="text" class="form-control" name="LOCALIDAD" id="LOCALIDAD" 
                                        value="<?php echo $LOCALIDAD; ?>" placeholder="Localidad - Barrio">
                                </div>
                                <div class="mb-3 col-6">
                                    <label for="CELULAR" class="form-label">Celular:</label>
                                    <input type="text" class="form-control" name="CELULAR" id="CELULAR" 
                                        value="<?php echo $CELULAR; ?>" placeholder="Celular">
                                </div>
                                <div class="mb-3 col-6">
                                    <label for="DNI" class="form-label">DNI:</label>
                                    <input type="text" class="form-control" name="DNI" id="DNI" 
                                        value="<?php echo $DNI; ?>" placeholder="DNI">
                                </div>
                                <div class="mb-3 col-6">
                                    <label for="FNACIMIENTO" class="form-label">Fecha Nacimiento:</label>
                                    <input type="date" class="form-control" name="FNACIMIENTO" id="FNACIMIENTO" 
                                        value="<?php echo $FNACIMIENTO; ?>" placeholder="Fecha Nacimiento">
                                </div>
                                <div class="mb-3 col-6">
                                    <label for="OSOCIAL" class="form-label">Obra Social:</label>
                                    <input type="text" class="form-control" name="OSOCIAL" id="OSOCIAL" 
                                        value="<?php echo $OSOCIAL; ?>" placeholder="Obra Social">
                                </div>
                                <div class="mb-3 col-6">
                                    <label for="NAFILIADO" class="form-label">N° Afiliado:</label>
                                    <input type="text" class="form-control" name="NAFILIADO" id="NAFILIADO" 
                                        value="<?php echo $NAFILIADO; ?>" placeholder="N° Afiliado">
                                </div>
                                <div class="mb-3 col-6">
                                    <label for="EMAIL" class="form-label">Email:</label>
                                    <input type="email" class="form-control" name="EMAIL" id="EMAIL" 
                                        value="<?php echo $EMAIL; ?>" placeholder="Correo Electrónico">
                                </div>
                                <div class="mb-3 col-3">
                                    <label for="OBSERVACIONES" class="form-label">Observaciones:</label>
                                    <input type="text" class="form-control" name="OBSERVACIONES" id="OBSERVACIONES" 
                                        value="<?php echo $OBSERVACIONES; ?>" placeholder="Observaciones">
                                </div>
                                <div class="mb-3 col-3">
                                    <label for="ESTADO" class="form-label">Estado:</label>
                                    <input type="text" class="form-control" name="ESTADO" id="ESTADO" 
                                        value="<?php echo $ESTADO; ?>" placeholder="Estado">
                                </div>

                                <!--nuevo-->
                                <div class="mb-3"></div>

<!-- ACTIVIDADES -->
 <div class="mb-3">
    <label for="" class="form-label">Seleccione actividad disponible para vincular al asociado: </label>

    <select multiple class="form-control" name="actividades[]" id="listaActividades">
    <!-- <option value="">Seleccione actividad:</option>  -->
        <?php foreach($actividades as $actividad){ ?>
            <option
                <?php
                    if(!empty($arrayActividades)): 
                        if(in_array($actividad['id'],$arrayActividades)):
                            echo "selected";
                        endif;

                    endif;  
                ?>
                value="<?php echo $actividad['id']; ?>">
                <?php echo $actividad['id']; ?> - <?php echo $actividad['nombre_actividad']; ?>
            </option>
        <?php } ?>
        
    </select>
</div> 

                                <div class="btn-group d-flex mt-3" role="group" aria-label="Button group name">
                                    <button type="submit" name="accion" value="agregar" 
                                        class="btn btn-success fw-bold">AGREGAR NUEVO SOCIO
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


<?php include("../view/head/footer.php"); ?>