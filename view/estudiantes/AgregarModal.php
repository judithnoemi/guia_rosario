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
								
								
								<div class="col-md-6 pr-0">
									<div class="form-group form-group-default">
										<label>Nombres</label>
										<input name="nombres" type="text" class="form-control" required placeholder="Ingrese nombre">
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group form-group-default">
										<label>Apellidos</label>
										<input name="apellidos" type="text" class="form-control" required placeholder="Ingrese apellidos">
									</div>
								</div>

                                  <div class="col-md-6">
									<div class="form-group form-group-default">

										<label>CI</label>
										<input name="ci" type="text" required class="form-control" maxlength="8" placeholder="Ingrese numero de carnet" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">
									</div>
                                    </div>
								
	                            <div class="col-md-6">
									<div class="form-group form-group-default">
										<label>Carreras</label>
										<select class="form-control" id="carreras"  name="carrera_id">
											<option selected disabled> Selecciona uan carrera</option>
											<?php
											include_once('../view/config/dbconect.php');
											$database = new Connection();
											$db = $database->open();
											$sql = "SELECT * FROM carreras";
											foreach ($db->query($sql) as $resultado) {
												echo "<option value='" . $resultado['id'] . "'>" . $resultado['nombre'] . "</option>";
											}
											$database->close();
											?>
										</select>
									</div>
								</div>
								
								<div class="col-md-6">
									<div class="form-group form-group-default">
										<label>Turnos</label>
										<select class="form-control" id="turnos"  name="turno_id">
											<option selected disabled> Selecciona uan carrera</option>
											<?php
											include_once('../view/config/dbconect.php');
											$database = new Connection();
											$db = $database->open();
											$sql = "SELECT * FROM turnos";
											foreach ($db->query($sql) as $resultado) {
												echo "<option value='" . $resultado['id'] . "'>" . $resultado['nombre'] . "</option>";
											}
											$database->close();
											?>
										</select>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group form-group-default">
										<label>Numero</label>
										<input name="numero" type="text" class="form-control" required maxlength="9" placeholder="">
									</div>
								</div>
                                <!-- #region -->

								<div class="col-md-6">
									<div class="form-group form-group-default">
										<label>Direccion</label>
										<input name="direccion" type="text" class="form-control" required placeholder="Ingrese su ocupacion">
									</div>
								</div>
                              <!-- #r-->
							   <div class="col-md-6">
									<div class="form-group form-group-default">
										<label>Celular</label>
										<input name="celular" type="text" class="form-control" required maxlength="9" placeholder="Ingrese teléfono" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group form-group-default">
										<label>Fecha</label>
										<input name="fecha" type="date" class="form-control" required placeholder="Ingrese su ocupacion">
									</div>
								</div>

								

								<div class="col-md-6">
									<div class="form-group form-group-default">
										<label>Procedencia</label>
										<select class="form-control" name="procedencia">
											<option value="Incos">Incos</option>
											<option value="MQS">MQS</option>
										</select>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group form-group-default">
										<label>Tipo Beca</label>
										<select class="form-control" name="tipo_beca">
											<option value="Completa">Completa</option>
											<option value="Convenio">Convenio</option>
										</select>
									</div>
								</div>

                                   <div class="col-md-6">
									<div class="form-group form-group-default">
										<label>Descuento</label>
										<select class="form-control" name="descuento">
											<option value="25%">25%</option>
											<option value="50">50%</option>
											<option value="100">100%</option>
										</select>
									</div>
								</div>
								

								   <div class="col-md-6">
									<div class="form-group form-group-default">
										<label>Porcentaje</label>
										<select class="form-control" name="porcentaje">
											<option value="25%">25%</option>
											<option value="50">50%</option>
											<option value="100">100%</option>
										</select>
									</div>
								</div>

								<div class="col-md-12">
									<div class="form-group form-group-default">
										<label>Numero resolucion</label>
										<input name="n_resolucion" type="text" class="form-control">
									</div>
								</div>

								<div class="col-md-12">
									<div class="form-group form-group-default">
										<label>Numero expediente</label>
										<input name="n_expediente" type="text" class="form-control" required placeholder="Ingrese la zona o barrio">
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