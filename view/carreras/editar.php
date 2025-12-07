<!-- Modal editar registro -->
<div class="modal fade" id="editRowModal<?php echo $row['id']; ?>" aria-labelledby="myModalLabel" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header no-bd">
                <h5 class="modal-title">
                    <span class="fw-mediumbold">Editar Registro</span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="../view/carreras/obtener.php">
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    <div class="row">
                        <!-- Nombre -->
                        <div class="col-md-6 pr-0">
                            <div class="form-group form-group-default">
                                <label>Nombre</label>
                                <input name="nombre" value="<?php echo $row['nombre']; ?>" type="text" class="form-control" required placeholder="Ingrese nombre">
                            </div>
                        </div>
                        <!-- Semestre -->
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>Semestre</label>
                                <input name="semestre" value="<?php echo $row['semestre']; ?>" type="text" class="form-control" required placeholder="Ingrese semestre">
                            </div>
                        </div>
                        <!-- Descripción -->
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>Descripción</label>
                                <input name="descripcion" value="<?php echo $row['descripcion']; ?>" type="text" class="form-control" required placeholder="Ingrese descripción">
                            </div>
                        </div>
                        <!-- Turno -->
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>Turno</label>
                                <select name="turno_id" class="form-control" required>
                                    <option value="">Seleccione un turno</option>
                                    <?php
                                    // Traer todos los turnos desde la tabla turnos
                                    $database = new Connection();
                                    $db = $database->open();
                                    $stmt = $db->query("SELECT id, nombre FROM turnos");
                                    foreach($stmt as $t){
                                        $selected = ($t['id'] == $row['turno_id']) ? 'selected' : '';
                                        echo "<option value='".$t['id']."' $selected>".$t['nombre']."</option>";
                                    }
                                    $database->close();
                                    ?>
                                </select>
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


<div class="modal fade" id="deleteRowModal<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                
            </div>
            <div class="modal-body">  
                <p class="text-center">¿Está seguro de borrar el turno?</p>
                <h2 class="text-center"><?php echo $row['nombre']; ?></h2>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <a href="../view/carreras/BorrarRegistro.php?id=<?php echo $row['id']; ?>" class='btn btn-danger'>Eliminar</a>
            </div>
        </div>
    </div>
</div>
