	<!-- Modal-edit -->
	<div class="modal fade" id="editRowModal<?php echo $row['codpaci']; ?>" aria-labelledby="myModalLabel" tabindex="-1" role="dialog" aria-hidden="true">
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
					<form method="POST" action="../view/pacientes/obtener.php?codpaci=<?php echo $row['codpaci']; ?>">
						<div class="row">
							<div class="col-sm-12">
								<div class="form-group form-group-default">
									<label>CI</label>
									<input type="text" maxlength="8" class="form-control" name="dnipa" value="<?php echo $row['dnipa']; ?>">
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group form-group-default">
									<label>Nombres</label>
									<input type="text" class="form-control" name="nombrep" value="<?php echo $row['nombrep']; ?>">
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group form-group-default">
									<label>Apellidos</label>
									<input type="text" class="form-control" name="apellidop" value="<?php echo $row['apellidop']; ?>">
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group form-group-default">
									<label>Seguro</label>
									<select class="form-control" name="seguro" value="<?php echo $row['seguro']; ?>">
										<option value="Si">Si</option>
										<option value="No">No</option>
									</select>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group form-group-default">
									<label>Teléfono</label>
									<input type="text" class="form-control" name="tele" value="<?php echo $row['tele']; ?>">
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group form-group-default">
									<label>Sexo</label>
									<select class="form-control" name="sexo" value="<?php echo $row['sexo']; ?>">
										<option value="Masculino">Masculino</option>
										<option value="Femenino">Femenino</option>
									</select>
								</div>
							</div>

							<!-- Comunidad -->
							<div class="col-md-6">
								<div class="form-group form-group-default">
									<label>Comunidad</label>
									<select class="form-control" id="comunidad" required name="id_comunidad">
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
											echo "<option value='" . $resultado['id_comunidad'] . "'>" . $resultado['provincia'] . "</option>";
										}
										$database->close();
										?>
									</select>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group form-group-default">
									<label>Estado Civil</label>
									<select class="form-control" name="estadociv" value="<?php echo $row['estadociv']; ?>">
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
									<input type="text" class="form-control" name="ocupacion" value="<?php echo $row['ocupacion']; ?>">
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group form-group-default">
									<label>Nacimiento</label>
									<input type="date" class="form-control" name="nacimiento" value="<?php echo $row['nacimiento']; ?>">
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group form-group-default">
									<label>Departamento</label>
									<select class="form-control" name="departamento" value="<?php echo $row['departamento']; ?>">
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
									<input name="zona_barrio" type="text" class="form-control" value="<?php echo $row['zona_barrio']; ?>">
								</div>
							</div>

							<div class="col-md-12">
								<div class="form-group form-group-default">
									<label>Domicilio Actual</label>
									<input name="domicilioac" type="text" class="form-control" value="<?php echo $row['domicilioac']; ?>">
								</div>
							</div>


							<div class="col-md-6">
								<div class="form-group form-group-default">
									<label>Usuario</label>
									<input type="text" class="form-control" name="usuario" value="<?php echo $row['usuario']; ?>">
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
	<div class="modal fade" id="deleteRowModal<?php echo $row['codpaci']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<center>
						<h4 class="modal-title" id="myModalLabel"></h4>
					</center>
				</div>

				<div class="modal-body">
					<p class="text-center">¿Esta seguro de borrar el registro?</p>
					<h2 class="text-center"><?php echo $row['nombrep']; ?></h2>
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
					<a href="../view/pacientes/BorrarRegistro.php?codpaci=<?php echo $row['codpaci']; ?>" class="btn btn-danger"><span class="fa fa-times"></span> Eliminar</a>
				</div>
			</div>
		</div>
	</div>

	<!-- Password-->
	<div class="modal fade" id="PassRowModal<?php echo $row['codpaci']; ?>" aria-labelledby="myModalLabel" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header no-bd">
					<h5 class="modal-title">
						<span class="fw-mediumbold">
							Password</span>
					</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>

				<div class="modal-body">
					<form method="POST" action="../view/pacientes/password.php?codpaci=<?php echo $row['codpaci']; ?>">


						<div class="row">
							<div class="col-sm-12">

								<div class="form-group form-group-default">
									<label>New Password</label>
									<input type="password" class="form-control" name="clave">
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

	<!-- Modal historial-->
	<div class="modal fade bd-example-modal-lg show" id="verDetallesModal<?php echo $row['codpaci']; ?>" aria-labelledby="myModalLabel" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header no-bd">
					<h5 class="modal-title">
						<span class="fw-mediumbold">
							Historia Clinica</span>
					</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>

				<div class="modal-body">
					<div class="table-responsive">
						<table id="add-row" class="display table table-striped table-hover">
							<thead>
								<tr>
								<th>#</th>
									<th>Fecha</th>
									<th>Hora</th>
									<th>Doctor</th>
									<th>Especialidad</th>
									<th>Diagnostico</th>
									<th>Consulta</th>
									<th>Hospital</th>
									<th>Estado</th>
									
									
								</tr>
							</thead>
							<tfoot>
								<tr>
								<th>#</th>
									<th>Fecha</th>
									<th>Hora</th>
									<th>Doctor</th>
									<th>Especialidad</th>
									<th>Diagnostico</th>
									<th>Consulta</th>
									<th>Hospital</th>
									<th>Estado</th>
								
								</tr>
							</tfoot>


							<tbody>
								<?php
								include_once('../view/config/dbconect.php');

								$database = new Connection();
								$db = $database->open();

								$id=$row['codpaci'];

								
								//$id=(isset($_GET[$row['codpaci']])) ? $_GET[$row['codpaci']] : 0;

								//
								try {
									$sql="SELECT * 
									FROM pacientes
									INNER JOIN historial ON pacientes.codpaci=historial.codpac
									INNER JOIN doctor ON historial.coddoc=doctor.coddoc
									INNER JOIN comunidad ON pacientes.comunidad_id=comunidad.id_comunidad
									INNER JOIN especialidades ON especialidades.codespe=doctor.codespe
									  WHERE pacientes.codpaci=$id
									";
									$cont=1;
									foreach($db->query($sql) as $datos){
								?>
								<tr>
								<td><?php echo $cont?></td>
									<td><?php echo $datos['fecha']?></td>
									
									<td><?php echo $datos['nomdoc']." ".$datos['apedoc']?></td>
									<td><?php echo $datos['nombrees']?></td>
									<td><?php echo $datos['diagnostico']?></td>
									<td><?php echo $datos['consulta']?></td>
									<td><?php echo $datos['hospital']?></td>
									<td><?php echo $datos['estado']?></td>
								</tr>
								
								<?php
								$cont++;
									}
								} catch (PDOException $e) {
									echo "Hubo un problema en la conexión: " . $e->getMessage();
								}
								//Cerrar la Conexion
								$database->close();
								?>
							</tbody>
						</table>
					</div>
				<div class="modal-footer no-bd">
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
				</div>
				</form>
			</div>
		</div>
	</div>



	