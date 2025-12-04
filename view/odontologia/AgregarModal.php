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
												$nombre_paciente= $resultado['apellidop'] . ' ' . $resultado['nombrep'];
												echo "<option value='" . $resultado['codpaci'] . "'>" . $nombre_paciente. "</option>";
											}

											$database->close();
											?>
										</select>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group form-group-default">
										<label>Medico</label>
										<select class="form-control" id="medico" required name="coddocod">
											<?php
											include_once('../view/config/dbconect.php');
											$database = new Connection();
											$db = $database->open();

											$sql = "SELECT * FROM doctor";

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
  										<label for="fecha">Fecha:</label>
  										<input type="date" id="fecha" name="fechaod" required>
									</div>
								</div>

								<div class="col-sm-12">
									<div class="form-group form-group-default">
										<label>Registro</label>
										<input name="registrodon" type="text" class="form-control" required placeholder="Ingrese el registro">
									</div>
								</div>

								<div class="col-sm-12">
									<div class="form-group form-group-default">
										<label>Detalle</label>
										<input name="detalleodon" type="text" class="form-control" required placeholder="Ingrese el detalle">
									</div>
								</div>

								<div class="col-sm-12">
									<div class="form-group form-group-default">
										<label>Atencion</label>
										<input name="atencionod" type="text" class="form-control" required>
									</div>
								</div>

								<div class="col-sm-12">
									<div class="form-group form-group-default">
										<label>Diagnostico</label>
										<input name="diagnosticood" type="text" class="form-control" required>
									</div>
								</div>

								<div class="col-sm-12">
									<div class="form-group form-group-default">
										<label>Primera Consulta</label>
										<input name="primeraconod" type="text" class="form-control" required>
									</div>
								</div>

								<div class="col-sm-12">
									<div class="form-group form-group-default">
										<label>Pieza dental</label>
										<input name="piezadenod" type="text" class="form-control" required>
									</div>
								</div>

								<div class="col-sm-12">
									<div class="form-group form-group-default">
										<label>Mujeres embarazadas</label>
										<input name="mujeresemod" type="text" class="form-control" required>
									</div>
								</div>

								<div class="col-sm-12">
									<div class="form-group form-group-default">
										<label>Mujeres post parto</label>
										<input name="mujerespostod" type="text" class="form-control" required>
									</div>
								</div>

								<div class="col-sm-12">
									<div class="form-group form-group-default">
										<label>Mujeres preventidas</label>
										<input name="medidasprevenod" type="text" class="form-control" required>
									</div>
								</div>

								<div class="col-sm-12">
									<div class="form-group form-group-default">
										<label>Restauraciones</label>
										<input name="restauracionesod" type="text" class="form-control" required>
									</div>
								</div>

								<div class="col-sm-12">
									<div class="form-group form-group-default">
										<label>Endodoncia</label>
										<input name="endodonciaod" type="text" class="form-control" required>
									</div>
								</div>

								<div class="col-sm-12">
									<div class="form-group form-group-default">
										<label>Periodoncia</label>
										<input name="periodonciaod" type="text" class="form-control" required>
									</div>
								</div>

								<div class="col-sm-12">
									<div class="form-group form-group-default">
										<label>Cirujia Bucal Menor</label>
										<input name="cir_bucalmenorod" type="text" class="form-control" required>
									</div>
								</div>

								<div class="col-sm-12">
									<div class="form-group form-group-default">
										<label>Otras acciones</label>
										<input name="otrasaccod" type="text" class="form-control" required>
									</div>
								</div>

								<div class="col-sm-12">
									<div class="form-group form-group-default">
										<label>Rayos X</label>
										<input name="rxod" type="text" class="form-control" required>
									</div>
								</div>

								<div class="col-sm-12">
									<div class="form-group form-group-default">
										<label>Referencias y contrareferencias</label>
										<input name="refycontrarefod" type="text" class="form-control" required>
									</div>
								</div>

								<div class="col-sm-12">
									<div class="form-group form-group-default">
										<label>Tratamiento</label>
										<input name="tratamientood" type="text" class="form-control" required>
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
