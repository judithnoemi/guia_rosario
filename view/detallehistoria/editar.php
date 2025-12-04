	<!-- Modal-edit -->
	<div class="modal fade" id="editRowModal<?php echo $row['idhistoria']; ?>" aria-labelledby="myModalLabel" tabindex="-1" role="dialog" aria-hidden="true">
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
					<form method="POST" action="../view/detallehistoria/obtener.php?idhistoria=<?php echo $row['idhistoria']; ?>">
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group form-group-default">
									<label>Fecha</label>
									<input type="date" class="form-control" name="fecha" value="<?php echo $row['fecha']; ?>">
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group form-group-default">
									<label>Hora</label>
									<input type="time" class="form-control" name="hora" value="<?php echo $row['hora']; ?>">
								</div>
							</div>

							
						
							<div class="col-md-6">
									<div class="form-group form-group-default">
										<label for="fechaNacimiento">Fecha de Nacimiento:</label>
        								<input type="date" name="fechaNacimiento" id="fechaNacimiento_up" onchange="calcularEdad_up()" required>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group form-group-default">
										<label for="edad">Edad:</label>
        								<input type="text" name="edad" id="edad_up" class="form-control"  readonly  value="<?php echo $row['edad']; ?>" >
									</div>
								</div>

								<div class="col-sm-6">
									<div class="form-group form-group-default">
										<label>Talla</label>
										<input name="talla" type="text" class="form-control" value="<?php echo $row['talla']; ?>" >
									</div>
								</div>
								

								<div class="col-sm-6">
									<div class="form-group form-group-default">
										<label>PESO</label>
										<input name="peso" type="text" class="form-control" value="<?php echo $row['peso']; ?>" >
									</div>
								</div>

								<div class="col-sm-12">
									<div class="form-group form-group-default">
										<label>EST. NUTRICIONAL</label>
										<input name="imc" type="text" class="form-control" value="<?php echo $row['imc']; ?>">
									</div>
								</div>


								<div class="col-sm-12">
									<div class="form-group form-group-default">
										<label>PRESION ARTERIAL</label>
										<input name="p_a" type="text" class="form-control" value="<?php echo $row['p_a']; ?>">
									</div>
								</div>

								<div class="col-sm-12">
									<div class="form-group form-group-default">
										<label>FRECUENCIA CARDIACA</label>
										<input name="f_c" type="text" class="form-control" value="<?php echo $row['f_c']; ?>" >
									</div>
								</div>

								<div class="col-sm-12">
									<div class="form-group form-group-default">
										<label>FRECUENCIA RESPITORATORIA</label>
										<input name="f_r" type="text" class="form-control" value="<?php echo $row['f_r']; ?>">
									</div>
								</div>
                            
								<div class="col-sm-12">
									<div class="form-group form-group-default">
										<label>TEMPERATURA</label>
										<input name="temp" type="text" class="form-control" value="<?php echo $row['temp']; ?>">
									</div>
								</div>

								<div class="col-sm-12">
									<div class="form-group form-group-default">
										<label>SUBJETIVO</label>
										<input name="subjetivo" type="text" class="form-control" value="<?php echo $row['subjetivo']; ?>">
									</div>
								</div>

								<div class="col-sm-12">
									<div class="form-group form-group-default">
										<label>OBJETIVO</label>
										<input name="objetivo" type="text" class="form-control" value="<?php echo $row['objetivo']; ?>">
									</div>
								</div>
                            
								<div class="col-sm-12">
									<div class="form-group form-group-default">
										<label>ANALISIS</label>
										<input name="analisis" type="text" class="form-control" value="<?php echo $row['analisis']; ?>">
									</div>
								</div>

								<div class="col-sm-12">
									<div class="form-group form-group-default">
										<label>CIE</label>
										<input name="cie" type="text" class="form-control" value="<?php echo $row['cie']; ?>">
									</div>
								</div>


								<div class="col-sm-12">
									<div class="form-group form-group-default">
										<label>TRATAMIENTO</label>
										<input name="tratamiento" type="text" class="form-control" value="<?php echo $row['tratamiento']; ?>">
									</div>
								</div>
						</div>
				</div>

				<div class="modal-footer no-bd">
					<button type="submit" name="editar" class="btn btn-primary">Editar</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
				</div>
					</form>
			</div>
		</div>
	</div>


	<!-- Delete -->
	<div class="modal fade" id="deleteRowModal<?php echo $row['idhistoria']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<center>
						<h4 class="modal-title" id="myModalLabel"></h4>
					</center>
				</div>
				<div class="modal-body">
					<p class="text-center">¿Esta seguro de borrar está cita?</p>
					<h2 class="text-center"><?php echo $row['fecha']; ?></h2>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
					<a href="../view/detallehistoria/BorrarRegistro.php?idhistoria=<?php echo $row['idhistoria']; ?>" class="btn btn-danger"><span class="fa fa-times"></span> Eliminar</a>
				</div>

			</div>
		</div>
	</div>

	<script>
    function calcularEdad_up() {
        var fechaNacimiento = new Date(document.getElementById('fechaNacimiento_up').value);
        var hoy = new Date();
        var edad = hoy.getFullYear() - fechaNacimiento.getFullYear();

        if (hoy.getMonth() < fechaNacimiento.getMonth() || (hoy.getMonth() === fechaNacimiento.getMonth() && hoy.getDate() < fechaNacimiento.getDate())) {
            edad--;
        }

        document.getElementById('edad_up').value = edad;
    }
</script>