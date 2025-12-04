<!-- Modal-edit -->
<div class="modal fade" id="editRowModal_<?php echo $va['id_comunidad']; ?>" aria-labelledby="myModalLabel" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header no-bd">
                <h5 class="modal-title">
                    <span class="fw-mediumbold">
                        Editar</span>
                </h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form method="POST" action="../view/comunidades/obtener.php?id_comunidad=<?php echo $va['id_comunidad']; ?>">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>Nombre Comunidad</label>
                                <input type="text" class="form-control" name="nombre_comunidad" value="<?php echo $va['nombre_comunidad']; ?>">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>Nombre Provincia</label>
                                <input type="text" class="form-control" name="provincia" value="<?php echo $va['provincia']; ?>">
                            </div>
                        </div>
                    </div>
            </div>

            <div class="modal-footer no-bd">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                <button type="submit" name="editar" class="btn btn-primary">Editar
                </button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Delete -->
<div class="modal fade" id="deleteRowModal<?php echo $va['id_comunidad']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center>
                    <h4 class="modal-title" id="myModalLabel"></h4>
                </center>
            </div>

            <div class="modal-body">
                <p class="text-center">¿Esta seguro de borrar el registro?</p>
                <h2 class="text-center"><?php echo $va['provincia']; ?></h2>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
                <a href="../view/comunidades/BorrarRegistro.php?id_comunidad=<?php echo $va['id_comunidad']; ?>" class="btn btn-danger"><span class="fa fa-times"></span> Eliminar</a>
            </div>
        </div>
    </div>
</div>