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
										<select class="form-control" name="idhistoriain">
											<option selected disabled> Seleccionar paciente </option>
											<?php
											include_once('../view/config/dbconect.php');
											$database = new Connection();
											$db = $database->open();
											$sql = "SELECT * FROM historial";
											foreach ($db->query($sql) as $resultado) {
												echo "<option value='" . $resultado['idhistoriain'] . "'>" . $resultado['codpaci'] . " " . $resultado['coddoc'] . "</option>";
											}

											$database->close();
											?>
										</select>
									</div>
								</div>


								<?php
								date_default_timezone_set('America/La_Paz');

								$fechaActual = date('Y-m-d');
								$horaActual = date('H:i');
								?>

								<div class="col-md-6">
									<div class="form-group form-group-default">
										<label for="fecha">Fecha:</label>
										<input type="date" id="fecha" name="fecha" value="<?php echo $fechaActual; ?>" required>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group form-group-default">
										<label for="hora">Hora:</label>
										<input type="time" id="hora" name="hora" value="<?php echo $horaActual; ?>" required>
									</div>
								</div>


								<div class="col-md-6">
									<div class="form-group form-group-default">
										<label for="fechaNacimiento">Fecha de Nacimiento:</label>
										<input type="date" name="fechaNacimiento" id="fechaNacimiento" onchange="calcularEdad()" required>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group form-group-default">
										<label for="edad">Edad:</label>
										<input type="text" name="edad" id="edad" class="form-control" readonly>
									</div>
								</div>

								<div class="col-sm-6">
									<div class="form-group form-group-default">
										<label>Talla</label>
										<input name="talla" type="text" class="form-control" required placeholder="Ingrese su talla">
									</div>
								</div>

								<div class="col-sm-6">
									<div class="form-group form-group-default">
										<label>PESO</label>
										<input name="peso" type="text" class="form-control" required placeholder="Ingrese su talla">
									</div>
								</div>

								<div class="col-sm-12">
									<div class="form-group form-group-default">
										<label>EST. NUTRICIONAL</label>
										<input name="imc" type="text" class="form-control" required placeholder="Ingrese su estado nutricional">
									</div>
								</div>


								<div class="col-sm-12">
									<div class="form-group form-group-default">
										<label>PRESION ARTERIAL</label>
										<input name="p_a" type="text" class="form-control" required placeholder="Ingrese su presion arterial">
									</div>
								</div>

								<div class="col-sm-12">
									<div class="form-group form-group-default">
										<label>FRECUENCIA CARDIACA</label>
										<input name="f_c" type="text" class="form-control" required placeholder="Ingrese frecuencia cardiaca">
									</div>
								</div>

								<div class="col-sm-12">
									<div class="form-group form-group-default">
										<label>FRECUENCIA RESPITORATORIA</label>
										<input name="f_r" type="text" class="form-control" required placeholder="Ingrese frecuencia respiratoria">
									</div>
								</div>

								<div class="col-sm-12">
									<div class="form-group form-group-default">
										<label>TEMPERATURA</label>
										<input name="temp" type="text" class="form-control" required placeholder="Ingrese temperatura">
									</div>
								</div>

								<div class="col-sm-12">
									<div class="form-group form-group-default">
										<label>SUBJETIVO</label>
										<input name="subjetivo" type="text" class="form-control" required placeholder="Ingrese el subjetivo">
									</div>
								</div>

								<div class="col-sm-12">
									<div class="form-group form-group-default">
										<label>OBJETIVO</label>
										<input name="objetivo" type="text" class="form-control" required placeholder="Ingrese el objetivo">
									</div>
								</div>

								<div class="col-sm-12">
									<div class="form-group form-group-default">
										<label>ANALISIS</label>
										<input name="analisis" type="text" class="form-control" required placeholder="Ingrese el analisis">
									</div>
								</div>

								<div class="col-sm-12">
									<div class="form-group form-group-default">
										<label>CIE</label>
										<input name="cie" type="text" class="form-control" required placeholder="Ingrese el cie">
									</div>
								</div>


								<div class="col-sm-12">
									<div class="form-group form-group-default">
										<label>TRATAMIENTO</label>
										<input name="tratamiento" type="text" class="form-control" required placeholder="Ingrese su tratamiento">
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

<script>
	function calcularEdad() {
		var fechaNacimiento = new Date(document.getElementById('fechaNacimiento').value);
		var hoy = new Date();
		var edad = hoy.getFullYear() - fechaNacimiento.getFullYear();

		if (hoy.getMonth() < fechaNacimiento.getMonth() || (hoy.getMonth() === fechaNacimiento.getMonth() && hoy.getDate() < fechaNacimiento.getDate())) {
			edad--;
		}

		document.getElementById('edad').value = edad;
	}
</script>