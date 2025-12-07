<div class="modal fade" id="editRowModal<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <center>
                    <h4 class="modal-title" id="myModalLabel">Editar Registro</h4>
                </center>
            </div>
            <div class="modal-body">
                <form method="POST" action="../view/inscripciones/obtener.php">
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

                    <div class="form-group">
                        <label>Semestre</label>
                        <select name="semestre_id" class="form-control" required>
                            <option value="">Seleccione un semestre</option>
                            <?php
                            include_once('../view/config/dbconect.php');
                            $database = new Connection();
                            $db = $database->open();
                            $stmt = $db->query("SELECT id, nombre FROM semestre");
                            foreach($stmt as $t){
                                $selected = ($t['id'] == $row['semestre_id']) ? 'selected' : '';
                                echo "<option value='".$t['id']."' $selected>".$t['nombre']."</option>";
                            }
                            $database->close();
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Estudiante</label>
                        <select name="estudiante_id" class="form-control" required>
                            <option value="">Seleccione un estudiante</option>
                            <?php
                            $database = new Connection();
                            $db = $database->open();
                            $stmt = $db->query("SELECT id, nombres, apellidos FROM estudiantes ORDER BY apellidos ASC");
                            foreach($stmt as $estudiante){
                                $nombre_completo = $estudiante['nombres'] . ' ' . $estudiante['apellidos'];
                                $selected = ($estudiante['id'] == $row['estudiante_id']) ? 'selected' : '';
                                echo "<option value='".$estudiante['id']."' $selected>".$nombre_completo."</option>";
                            }
                            $database->close();
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Estado</label>
                        <input name="estado" type="text" class="form-control" required value="<?php echo $row['estado']; ?>">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        <button type="submit" name="agregar" class="btn btn-primary">Guardar Registro</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<td class="text-center">
   
   

    <!-- Botón PDF -->
    <a href="../view/inscripciones/pdf.php?id=<?= $row['id']; ?>" 
   target="_blank" 
   class="btn btn-link btn-warning btn-sm">
    <i class="fas fa-file-pdf"></i>
</a>

</td>
