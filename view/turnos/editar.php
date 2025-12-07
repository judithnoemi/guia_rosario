<!-- Modal editar turno -->
<div class="modal fade" id="editRowModal<?php echo $row['id']; ?>" aria-labelledby="myModalLabel" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header no-bd">
                <h5 class="modal-title">
                    <span class="fw-mediumbold">Editar Turno</span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="../view/turnos/obtener.php">
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    <div class="row">
                        <div class="col-md-6 pr-0">
                            <div class="form-group form-group-default">
                                <label>Nombre</label>
                                <input name="nombre" value="<?php echo $row['nombre']; ?>" type="text" class="form-control" required placeholder="Ingrese nombre">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>Descripción</label>
                                <input name="descripcion" value="<?php echo $row['descripcion']; ?>" type="text" class="form-control" required placeholder="Ingrese descripción">
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer no-bd">
                <button type="submit" name="editar" class="btn btn-primary">Guardar Cambios</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            </div>
                </form>
        </div>
    </div>
</div>

<!-- Modal eliminar turno -->
<div class="modal fade" id="deleteRowModal<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title">Eliminar Turno</h4></center>
            </div>
            <div class="modal-body">  
                <p class="text-center">¿Está seguro de borrar el turno?</p>
                <h2 class="text-center"><?php echo $row['nombre']; ?></h2>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <a href="../view/turnos/BorrarRegistro.php?id=<?php echo $row['id']; ?>" class='btn btn-danger'>Eliminar</a>
            </div>
        </div>
    </div>
</div>
