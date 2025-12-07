<!-- Editar Registros -->
<div class="modal fade" id="editRowModal<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header no-bd">
				<h5 class="modal-title">
					<span class="fw-mediumbold ">Editar Registro</span>
				</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Cerrar" >
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<div class="modal-body">
				<div class="container-fluid">
					<form method="POST" action="../view/estudiantes/obtener.php">
						<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
						<div class="row">
							<!-- Nombres -->
							<div class="col-md-6 pr-0">
								<div class="form-group form-group-default">
									<label>Nombres</label>
									<input name="nombres" value="<?php echo $row['nombres'];?>" type="text" class="form-control" required>
								</div>
							</div>

							<!-- Apellidos -->
							<div class="col-md-6">
								<div class="form-group form-group-default">
									<label>Apellidos</label>
									<input name="apellidos" value="<?php echo $row['apellidos'];?>"  type="text" class="form-control" required>
								</div>
							</div>

							<!-- CI -->
							<div class="col-md-6">
								<div class="form-group form-group-default">
									<label>CI</label>
									<input name="ci" value="<?php echo $row['ci'];?>"  type="text" required class="form-control" maxlength="8">
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group form-group-default">
									<label>Fecha</label>
									<input name="fecha" value="<?php echo $row['fecha'];?>"  type="date" required class="form-control" maxlength="8">
								</div>
							</div>

							<!-- Carrera -->
							<div class="col-md-6">
								<div class="form-group form-group-default">
									<label>Carrera</label>
									<select class="form-control" name="carrera_id">
										<?php
										include_once('../view/config/dbconect.php');
										$database = new Connection();
										$db = $database->open();
										$sql = "SELECT * FROM carreras";
										foreach ($db->query($sql) as $resultado) {
											$selected = ($resultado['id'] == $row['carrera_id']) ? 'selected' : '';
											echo "<option value='".$resultado['id']."' $selected>".$resultado['nombre']."</option>";
										}
										$database->close();
										?>
									</select>
								</div>
							</div>

							<!-- Turno -->
							<div class="col-md-6">
								<div class="form-group form-group-default">
									<label>Turno</label>
									<select class="form-control" name="turno_id">
										<?php
										include_once('../view/config/dbconect.php');
										$database = new Connection();
										$db = $database->open();
										$sql = "SELECT * FROM turnos";
										foreach ($db->query($sql) as $resultado) {
											$selected = ($resultado['id'] == $row['turno_id']) ? 'selected' : '';
											echo "<option value='".$resultado['id']."' $selected>".$resultado['nombre']."</option>";
										}
										$database->close();
										?>
									</select>
								</div>
							</div>

							

						</div>
				</div>
			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
				<button type="submit" name="editar" class="btn btn-primary">Guardar Cambios</button>
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
                <h2 class="text-center"><?php echo $row['nombres']; ?></h2>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <a href="../view/estudiantes/BorrarRegistro.php?id=<?php echo $row['id']; ?>" class='btn btn-danger'>Eliminar</a>
            </div>
        </div>
    </div>
</div>