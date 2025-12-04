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
								
							
								
								<!-- Paciente -->
								<div class="col-md-6">
									<div class="form-group form-group-default">
										<label>Paciente</label>
										<select class="form-control" name="codpaci">
											<option selected disabled> Seleccionar paciente </option>
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
										<label>Instruccion</label>
										<input name="grado_instruccion" type="text" class="form-control" required placeholder="Ingrese grado instruccion">
									</div>
								</div>
                            
								<div class="col-sm-12">
									<div class="form-group form-group-default">					
  <label for="fecha">Fecha:</label>
  <input type="date" id="fecha" name="fecha" value="<?php echo $fecha; ?>" required>
									</div>
								</div>

								<div class="col-sm-12">
									<div class="form-group form-group-default">
										<label>Diagnostico</label>
										<input name="diagnostico" type="text" class="form-control" required placeholder="Ingrese el diagnostico">
									</div>
								</div>

								<div class="col-sm-12">
									<div class="form-group form-group-default">
										<label>Consulta</label>
										<input name="consulta" type="text" class="form-control" required placeholder="Ingresa la consulta">
									</div>
								</div>

								<div class="col-sm-12">
									<div class="form-group form-group-default">
										<label>Hospital</label>
										<input name="hospital" type="text" class="form-control" placeholder="Ingrese el nombre del hosítal">
									</div>
								</div>

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