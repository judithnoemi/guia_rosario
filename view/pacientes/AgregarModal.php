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
								
								<div class="col-sm-12">
									<div class="form-group form-group-default">

										<label>CI</label>
										<input name="dnipa" type="text" required class="form-control" maxlength="8" placeholder="Ingrese numero de carnet" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">
									</div>
								</div>

								<div class="col-md-6 pr-0">
									<div class="form-group form-group-default">
										<label>Nombre</label>
										<input name="nombrep" type="text" class="form-control" required placeholder="Ingrese nombre">
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group form-group-default">
										<label>Apellidos</label>
										<input name="apellidop" type="text" class="form-control" required placeholder="Ingrese apellidos">
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group form-group-default">
										<label>Seguro</label>
										<select class="form-control" name="seguro">
											<option value="SUS">SUS</option>
											<option value="CNS">CNS</option>
										</select>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group form-group-default">
										<label>Teléfono</label>
										<input name="tele" type="text" class="form-control" required maxlength="9" placeholder="Ingrese teléfono" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group form-group-default">
										<label>Sexo</label>
										<select class="form-control" name="sexo">
											<option value="Masculino">Masculino</option>
											<option value="Femenino">Femenino</option>
										</select>
									</div>
								</div>

								<!-- Comunidad -->
								<div class="col-md-6">
									<div class="form-group form-group-default">
										<label>Comunidad</label>
										<select class="form-control" id="comunidad"  name="id_comunidad">
											<option selected disabled> Seleccionar comunidad </option>
											<?php
											include_once('../view/config/dbconect.php');
											$database = new Connection();
											$db = $database->open();
											$sql = "SELECT * FROM comunidad";
											foreach ($db->query($sql) as $resultado) {
												echo "<option value='" . $resultado['id_comunidad'] . "'>" . $resultado['nombre_comunidad'] . "</option>";
											}
											$database->close();
											?>
										</select>
									</div>
								</div>

								<!-- Provincia -->
								<div class="col-md-6">
									<div class="form-group form-group-default">
										<label>Provincia</label>
										<select class="form-control" id="comunidad" required name="provinciapac">
											<option selected disabled> Seleccionar provincia </option>
											<?php
											include_once('../view/config/dbconect.php');
											$database = new Connection();
											$db = $database->open();
											$sql = "SELECT * FROM comunidad";
											foreach ($db->query($sql) as $resultado) {
												echo "<option value='" . $resultado['provincia'] . "'>" . $resultado['provincia'] . "</option>";
											}
											$database->close();
											?>
										</select>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group form-group-default">
										<label>Estado Civil</label>
										<select class="form-control" name="estadociv">
											<option value="Soltero">Soltero</option>
											<option value="Casado">Casado</option>
											<option value="Viudo">Viudo</option>
											<option value="Divorciado">Divorciado</option>
										</select>
									</div>
								</div>

								<div class="col-md-12">
									<div class="form-group form-group-default">
										<label>Ocupacion</label>
										<input name="ocupacion" type="text" class="form-control" required placeholder="Ingrese su ocupacion">
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group form-group-default">
										<label>Fecha Nacimiento</label>
										<input name="nacimiento" type="date" class="form-control">
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group form-group-default">
										<label>Departamento</label>
										<select class="form-control" name="departamento">
											<option value="La Paz">La Paz</option>
											<option value="Cochabamba">Cochabamba</option>
											<option value="Potosi">Potosi</option>
											<option value="Oruro">Oruro</option>
											<option value="Tarija">Tarija</option>
											<option value="Beni">Beni</option>
											<option value="Santa Cruz">Santa Cruz</option>
											<option value="Pando">Pando</option>
											<option value="Chuquisaca">Chuquisaca</option>
										</select>
									</div>
								</div>

								<div class="col-md-12">
									<div class="form-group form-group-default">
										<label>Zona o Barrio</label>
										<input name="zona_barrio" type="text" class="form-control" required placeholder="Ingrese la zona o barrio">
									</div>
								</div>

								<div class="col-md-12">
									<div class="form-group form-group-default">
										<label>Domicilio Actual</label>
										<input name="domicilioac" type="text" class="form-control" required placeholder="Ingrese su domicilio actual">
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group form-group-default">
										<label>Usuario</label>
										<input name="usuario" type="text" class="form-control" required placeholder="Ingrese usuario">
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group form-group-default">
										<label>Password</label>
										<input name="clave" type="password" class="form-control" required placeholder="Ingrese contraseña">
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