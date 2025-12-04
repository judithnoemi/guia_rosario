	<!-- Modal-edit -->
	<div class="modal fade" id="editRowModal<?php echo $row['idhistoriain']; ?>" aria-labelledby="myModalLabel" tabindex="-1" role="dialog" aria-hidden="true">
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
					<form method="POST" action="../view/historia/obtener.php?idhistoriain=<?php echo $row['idhistoriain']; ?>">
						<div class="row">

					
                        
							<!-- Paciente -->
							<div class="col-md-6">
									<div class="form-group form-group-default">
										<label>Paciente</label>
										<select class="form-control" required name="codpac">
										
											<?php
											include_once('../view/config/dbconect.php');
											$database = new Connection();
											$db = $database->open();
											$sql = "SELECT * FROM pacientes";
											foreach ($db->query($sql) as $resultado) {
												echo "<option value='" . $resultado['codpaci'] . "'>" . $resultado['nombrep'] ." ". $resultado['apellidop'] . "</option>";

											}

											$database->close();
											?>
										</select>
									</div>
								</div>

						<div class="col-md-6">
									<div class="form-group form-group-default">
										<label>Medico</label>
										<select class="form-control" id="medico" required name="coddoc">
											<?php
											include_once('../view/config/dbconect.php');
											$database = new Connection();
											$db = $database->open();

											$sql = "SELECT * from doctor";

											foreach ($db->query($sql) as $resultado) {
												$nombre_completo = $resultado['apedoc'] . ' ' . $resultado['nomdoc'];
												echo "<option value='" . $resultado['coddoc'] . "'>" . $nombre_completo . "</option>";
											}

											$database->close();
											?>
										</select>
									</div>
								</div>

							<div class="col-sm-12">
								<div class="form-group form-group-default">
									<label>Grado Instruccion</label>
									<input type="text" class="form-control" name="grado_instruccion" value="<?php echo $row['grado_instruccion']; ?>">
								</div>
							</div>

							<div class="col-sm-6">
								<div class="form-group form-group-default">
									<label>Fecha</label>
									<input type="date" class="form-control" name="fecha" value="<?php echo $row['fecha']; ?>">
								</div>
							</div>

							<div class="col-sm-12">
								<div class="form-group form-group-default">
									<label>Diagnostico</label>
									<input type="text" class="form-control" name="diagnostico" value="<?php echo $row['diagnostico']; ?>">
								</div>
							</div>

							<div class="col-sm-12">
								<div class="form-group form-group-default">
									<label>Consulta</label>
									<input type="text" class="form-control" name="consulta" value="<?php echo $row['consulta']; ?>">
								</div>
							</div>

							<div class="col-sm-12">
								<div class="form-group form-group-default">
									<label>Nombre del Hospital</label>
									<input type="text" class="form-control" name="hospital" value="<?php echo $row['hospital']; ?>">
								</div>
							</div>

							
						</div>
				</div>

				<div class="modal-footer no-bd">
					<button type="submit" name="editar" class="btn btn-primary">Editar</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
				</div>
					</form>
			</div>
		</div>
	</div>


	<!-- Delete -->
	<div class="modal fade" id="deleteRowModal<?php echo $row['idhistoriain']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<center>
						<h4 class="modal-title" id="myModalLabel"></h4>
					</center>
				</div>
				<div class="modal-body">
					<p class="text-center">¿Esta seguro de borrar este historial?</p>
					<h2 class="text-center"><?php echo $row['diagnostico']; ?></h2>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
					<a href="../view/historia/BorrarRegistro.php?idhistoriain=<?php echo $row['idhistoriain']; ?>" class="btn btn-danger"><span class="fa fa-times"></span> Eliminar</a>
				</div>

			</div>
		</div>
	</div>