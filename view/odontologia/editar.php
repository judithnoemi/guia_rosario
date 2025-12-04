	<!-- Modal-edit -->
	<div class="modal fade" id="editRowModal<?php echo $row['idodontologia']; ?>" aria-labelledby="myModalLabel" tabindex="-1" role="dialog" aria-hidden="true">
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
					<form method="POST" action="../view/odontologia/obtener.php?idodontologia=<?php echo $row['idodontologia']; ?>">
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
									<input type="date" id="fecha" name="fechaod" required value="<?php echo $row['fechaod'];?>" >
								</div>
							</div>

							<div class="col-sm-12">
								<div class="form-group form-group-default">
									<label>Registro</label>
									<input name="registrodon" type="text" class="form-control" required value="<?php echo $row['registrodon'];?>" >
								</div>
							</div>

							<div class="col-sm-12">
								<div class="form-group form-group-default">
									<label>Detalle</label>
									<input name="detalleodon" type="text" class="form-control" required value="<?php echo $row['detalleodon'];?>" >
								</div>
							</div>

							<div class="col-sm-12">
								<div class="form-group form-group-default">
									<label>Atencion</label>
									<input name="atencionod" type="text" class="form-control" required value="<?php echo $row['atencionod'];?>" >
								</div>
							</div>

							<div class="col-sm-12">
								<div class="form-group form-group-default">
									<label>Diagnostico</label>
									<input name="diagnosticood" type="text" class="form-control" required value="<?php echo $row['diagnosticood'];?>">
								</div>
							</div>

							<div class="col-sm-12">
								<div class="form-group form-group-default">
									<label>Primera Consulta</label>
									<input name="primeraconod" type="text" class="form-control" required value="<?php echo $row['primeraconod'];?>">
								</div>
							</div>

							<div class="col-sm-12">
								<div class="form-group form-group-default">
									<label>Pieza dental</label>
									<input name="piezadenod" type="text" class="form-control" required value="<?php echo $row['piezadenod'];?>">
								</div>
							</div>

							<div class="col-sm-12">
								<div class="form-group form-group-default">
									<label>Mujeres embarazadas</label>
									<input name="mujeresemod" type="text" class="form-control" required value="<?php echo $row['mujeresemod'];?>">
								</div>
							</div>

							<div class="col-sm-12">
								<div class="form-group form-group-default">
									<label>Mujeres post parto</label>
									<input name="mujerespostod" type="text" class="form-control" required value="<?php echo $row['mujerespostod'];?>">
								</div>
							</div>

							<div class="col-sm-12">
								<div class="form-group form-group-default">
									<label>Mujeres preventidas</label>
									<input name="medidasprevenod" type="text" class="form-control" required value="<?php echo $row['medidasprevenod'];?>">
								</div>
							</div>

							<div class="col-sm-12">
								<div class="form-group form-group-default">
									<label>Restauraciones</label>
									<input name="restauracionesod" type="text" class="form-control" required value="<?php echo $row['restauracionesod'];?>">
								</div>
							</div>

							<div class="col-sm-12">
								<div class="form-group form-group-default">
									<label>Endodoncia</label>
									<input name="endodonciaod" type="text" class="form-control" required value="<?php echo $row['endodonciaod'];?>">
								</div>
							</div>

							<div class="col-sm-12">
								<div class="form-group form-group-default">
									<label>Periodoncia</label>
									<input name="periodonciaod" type="text" class="form-control" required value="<?php echo $row['periodonciaod'];?>">
								</div>
							</div>

							<div class="col-sm-12">
								<div class="form-group form-group-default">
									<label>Cirujia Bucal Menor</label>
									<input name="cir_bucalmenorod" type="text" class="form-control" required value="<?php echo $row['cir_bucalmenorod'];?>">
								</div>
							</div>

							<div class="col-sm-12">
								<div class="form-group form-group-default">
									<label>Otras acciones</label>
									<input name="otrasaccod" type="text" class="form-control" required value="<?php echo $row['otrasaccod'];?>">
								</div>
							</div>

							<div class="col-sm-12">
								<div class="form-group form-group-default">
									<label>Rayos X</label>
									<input name="rxod" type="text" class="form-control" required value="<?php echo $row['rxod'];?>">
								</div>
							</div>

							<div class="col-sm-12">
								<div class="form-group form-group-default">
									<label>Referencias y contrareferencias</label>
									<input name="refycontrarefod" type="text" class="form-control" required value="<?php echo $row['refycontrarefod'];?>">
								</div>
							</div>

							<div class="col-sm-12">
								<div class="form-group form-group-default">
									<label>Tratamiento</label>
									<input name="tratamientood" type="text" class="form-control" required value="<?php echo $row['tratamientood'];?>">
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
	<div class="modal fade" id="deleteRowModal<?php echo $row['idodontologia']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<center>
						<h4 class="modal-title" id="myModalLabel"></h4>
					</center>
				</div>
				<div class="modal-body">
					<p class="text-center">¿Esta seguro de borrar este odontologia?</p>
					<h2 class="text-center"><?php echo $row['diagnosticood']; ?></h2>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
					<a href="../view/odontologia/BorrarRegistro.php?idodontologia=<?php echo $row['idodontologia']; ?>" class="btn btn-danger"><span class="fa fa-times"></span> Eliminar</a>
				</div>

			</div>
		</div>
	</div>