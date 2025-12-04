	<!-- Modal-edit -->
	<div class="modal fade" id="editRowModal<?php echo $row['idanticoncepcion']; ?>" aria-labelledby="myModalLabel" tabindex="-1" role="dialog" aria-hidden="true">
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
					<form method="POST" action="../view/anticoncepcion/obtener.php?idanticoncepcion=<?php echo $row['idanticoncepcion']; ?>">
						<div class="row">

					
                        
							<!-- Paciente -->
							<div class="col-md-6">
									<div class="form-group form-group-default">
										<label>Paciente</label>
										<select class="form-control"name="codpaci" value="<?php echo $row['codpaci']; ?>">
										
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
										<select class="form-control" id="medico"  name="coddoc" value="<?php echo $row['coddoc']; ?>">
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

						
							<div class="col-sm-6">
								<div class="form-group form-group-default">
									<label>Fecha</label>
									<input type="date" class="form-control" name="fechaan" value="<?php echo $row['fechaan']; ?>">
								</div>
							</div>

							<div class="col-sm-12">
									<div class="form-group form-group-default">
										<label>Registro</label>
										<input name="registroan" type="text" class="form-control" value="<?php echo $row['registroan']; ?>" >
									</div>
								</div>


								<div class="col-sm-12">
									<div class="form-group form-group-default">
										<label>Detalle</label>
										<input name="detallean" type="text" class="form-control" value="<?php echo $row['detallean']; ?>" >
									</div>
								</div>

								<div class="col-sm-12">
									<div class="form-group form-group-default">
										<label>Atencion</label>
										<input name="atencionan" type="text" class="form-control" value="<?php echo $row['atencionan']; ?>" >
									</div>
								</div>

								<div class="col-sm-12">
									<div class="form-group form-group-default">
										<label>Orientacion</label>
										<input name="orientacion" type="text" class="form-control" value="<?php echo $row['orientacion']; ?>">
									</div>
								</div>

								<div class="col-sm-12">
									<div class="form-group form-group-default">
										<label>Metodos Anticonceptivos Modernos</label>
										<input name="metodosantimode" type="text" class="form-control" value="<?php echo $row['metodosantimode']; ?>" >
									</div>
								</div>

								<div class="col-sm-12">
									<div class="form-group form-group-default">
										<label>Insumos</label>
										<input name="insumos" type="text" class="form-control" value="<?php echo $row['insumos']; ?>">
									</div>
								</div>

								<div class="col-sm-12">
									<div class="form-group form-group-default">
										<label>Metodos Naturales</label>
										<input name="metodosnat" type="text" class="form-control"  value="<?php echo $row['metodosnat']; ?>">
									</div>
								</div>

								<div class="col-sm-12">
									<div class="form-group form-group-default">
										<label>Muestras Pap Tomadas</label>
										<input name="muestraspaptom" type="text" class="form-control"  value="<?php echo $row['muestraspaptom']; ?>">
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
	<div class="modal fade" id="deleteRowModal<?php echo $row['idanticoncepcion']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
					<h2 class="text-center"><?php echo $row['fechaan']; ?></h2>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
					<a href="../view/anticoncepcion/BorrarRegistro.php?idanticoncepcion=<?php echo $row['idanticoncepcion']; ?>" class="btn btn-danger"><span class="fa fa-times"></span> Eliminar</a>
				</div>

			</div>
		</div>
	</div>