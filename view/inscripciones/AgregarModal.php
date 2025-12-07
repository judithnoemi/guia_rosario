<!-- Agregar Nuevos Registros -->
<div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<center>
					<h4 class="modal-title" id="myModalLabel">Nuevo Registro</h4>
				</center>
			</div>

			<div class="modal-body">
				<div class="container-fluid">
					<div class="card-body">
						<form method="POST" autocomplete="off" enctype="multipart/form-data">
							<div class="row">
					

                            <div class="col-md-6">
    <div class="form-group form-group-default">
        <label>Semestre</label>
        <select name="semestre_id" class="form-control" required>
            <option value="">Seleccione un turno</option>
            <?php
            // Traer todos los turnos desde la tabla turnos
            include_once('../view/config/dbconect.php');
            $database = new Connection();
            $db = $database->open();
            $stmt = $db->query("SELECT id, nombre FROM semestre ");
            foreach($stmt as $t){
                echo "<option value='".$t['id']."'>".$t['nombre']."</option>";
            }
            $database->close();
            ?>
        </select>
    </div>
</div>


<div class="col-md-6">
    <div class="form-group form-group-default">
        <label>Estudiante</label>
        <select name="estudiante_id" class="form-control" required>
            <option value="">Seleccione un estudiante</option>
            <?php
            // Traer todos los estudiantes desde la tabla estudiantes
            include_once('../view/config/dbconect.php');
            $database = new Connection();
            $db = $database->open();

            // Consulta para traer id, nombres y apellidos
            $stmt = $db->query("SELECT id, nombres, apellidos FROM estudiantes ORDER BY apellidos ASC");

            foreach($stmt as $estudiante){
                // Concatenar nombres y apellidos para mostrar en el select
                $nombre_completo = $estudiante['nombres'] . ' ' . $estudiante['apellidos'];
                echo "<option value='".$estudiante['id']."'>".$nombre_completo."</option>";
            }

            $database->close();
            ?>
        </select>
    </div>
</div>

				<div class="col-sm-12">
									<div class="form-group form-group-default">
										<label>Estado</label>
										<input name="estado" type="text" class="form-control" required placeholder="">
									</div>
								</div>

							
                            

								<!-- Turno -->

							
								

							</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
				<button type="submit" name="agregar" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar Registro</button>
			</div>
			</form>
		</div>
	</div>
</div>
<!-- -->