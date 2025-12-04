<?php
session_start();
// Validamos que exista una sesión y además que el cargo sea igual a 1 o 3
if (!isset($_SESSION['cargo']) || ($_SESSION['cargo'] != 1 && $_SESSION['cargo'] != 3)) {
    header('location: ../login.php');
    exit; // Asegúrate de terminar el script después de redirigir
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>HISTORIALES CLINICOS</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="../assets/img/icon.ico" type="image/x-icon" />

	<!-- Fonts and icons -->
	<script src="../assets/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {
				"families": ["Lato:400,400,700,900"]
			},
			custom: {
				"families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"],
				urls: ['../assets/css/fonts.min.css']
			},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="../assets/css/atlantis.min.css">

	<!-- CSS Just for demo purPOSe, don't include it in your project -->
	<link rel="stylesheet" href="../assets/css/demo.css">
</head>

<body>
	<div class="wrapper">
		<div class="main-header">
			<!-- Logo Header -->
			<div class="logo-header" data-background-color="blue">
				<a href="../view/admin/admin.php" class="logo">
					<img src="../assets/img/hospital.svg" alt="navbar brand" class="navbar-brand">
				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="icon-menu"></i>
					</span>
				</button>
				<button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
				<div class="nav-toggle">
					<button class="btn btn-toggle toggle-sidebar">
						<i class="icon-menu"></i>
					</button>
				</div>
			</div>
			<!-- End Logo Header -->

			<!-- Navbar Header -->
			<nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue2">

				<div class="container-fluid">
					<div class="collapse" id="search-nav">
						<form class="navbar-left navbar-form nav-search mr-md-3">
							<div class="input-group">
								<div class="input-group-prepend">
									<button type="submit" class="btn btn-search pr-1">
										<i class="fa fa-search search-icon"></i>
									</button>
								</div>
								<input type="text" placeholder="Buscar..." class="form-control">
							</div>
						</form>
					</div>
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
						<li class="nav-item toggle-nav-search hidden-caret">
							<a class="nav-link" data-toggle="collapse" href="#search-nav" role="button" aria-expanded="false" aria-controls="search-nav">
								<i class="fa fa-search"></i>
							</a>
						</li>
						<li class="nav-item dropdown hidden-caret">
							<a class="nav-link dropdown-toggle" href="#" id="messageDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fa fa-envelope"></i>
							</a>
							<ul class="dropdown-menu messages-notif-box animated fadeIn" aria-labelledby="messageDropdown">
								<li>
									<div class="dropdown-title d-flex justify-content-between align-items-center">
										Mensajes
										<a href="#" class="small">Mark all as read</a>
									</div>
								</li>

								<li>
									<a class="see-all" href="javascript:void(0);">See all messages<i class="fa fa-angle-right"></i> </a>
								</li>
							</ul>
						</li>
						<li class="nav-item dropdown hidden-caret">
							<a class="nav-link dropdown-toggle" href="#" id="notifDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fa fa-bell"></i>
								<span class="notification">0</span>
							</a>
							<ul class="dropdown-menu notif-box animated fadeIn" aria-labelledby="notifDropdown">
								<li>
									<div class="dropdown-title">You have 0 new notification</div>
								</li>
								<li>

								</li>
								<li>
									<a class="see-all" href="javascript:void(0);">See all notifications<i class="fa fa-angle-right"></i> </a>
								</li>
							</ul>
						</li>

						<li class="nav-item dropdown hidden-caret">
							<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
								<div class="avatar-sm">
									<img src="../assets/img/mujer.png" alt="..." class="avatar-img rounded-circle">
								</div>
							</a>
							<ul class="dropdown-menu dropdown-user animated fadeIn">
								<div class="dropdown-user-scroll scrollbar-outer">
									<li>
										<div class="user-box">
											<div class="avatar-lg"><img src="../assets/img/mujer.png" alt="image profile" class="avatar-img rounded"></div>
											<div class="u-text">
												<h4><?php echo ucfirst($_SESSION['nombre']); ?></h4>
												<p class="text-muted">Administrador</p><a href="profile.html" class="btn btn-xs btn-secondary btn-sm">View Profile</a>
											</div>
										</div>
									</li>
									<li>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="#">My Profile</a>

										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="../cerrarSesion.php">Logout</a>
									</li>
								</div>
							</ul>
						</li>
					</ul>
				</div>
			</nav>
			<!-- End Navbar -->
		</div>

		<!-- Sidebar -->
		<div class="sidebar sidebar-style-2">
			<div class="sidebar-wrapper scrollbar scrollbar-inner">
				<div class="sidebar-content">
					<div class="user">
						<div class="avatar-sm float-left mr-2">
							<img src="../assets/img/mujer.png" alt="..." class="avatar-img rounded-circle">
						</div>
						<div class="info">
							<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
								<span>
									 <?php echo ucfirst($_SESSION['nombre']); ?>
									<span class="user-level">Administrador</span>
									<span class="caret"></span>
								</span>
							</a>
							<div class="clearfix"></div>

							<div class="collapse in" id="collapseExample">
								<ul class="nav">
									<li>
										<a href="#profile">
											<span class="link-collapse">Mi Perfil</span>
										</a>
									</li>
									<li>
										<a href="#edit">
											<span class="link-collapse">Editar Perfil</span>
										</a>
									</li>
									<li>
										<a href="#settings">
											<span class="link-collapse">Configuracion</span>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<ul class="nav nav-primary">
						<li class="nav-item">

							<a data-toggle="collapse" href="#dashboard" class="collapsed" aria-expanded="false">
								<i class="fas fa-home"></i>
								<p>Home</p>
								<span class="caret"></span>
							</a>

						</li>
						<li class="nav-section">
							<span class="sidebar-mini-icon">
								<i class="fa fa-ellipsis-h"></i>
							</span>

						</li>

						<li class="nav-item">
								<a data-toggle="collapse" href="#historia">
								<i class="fas fa-file-medical-alt"></i>
									<p>Historia Clinica</p>
									<span class="caret"></span>
								</a>
								<div class="collapse" id="historia">
									<ul class="nav nav-collapse">
										<li>
											<a href="../../folder/historia.php">
												<span class="sub-item">Mostrar</span>
											</a>
										</li>
											
									</ul>
								</div>
							</li>



						<li class="nav-item active">
							<a data-toggle="collapse" href="#base">
							<i class="fas fa-file-medical"></i>
								<p>Detalles Historiales Clinicos</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="base">
								<ul class="nav nav-collapse">


									<li>
										<a href="../folder/detallehistoria.php">
											<span class="sub-item">Mostrar</span>
										</a>
									</li>
								</ul>
							</div>
						</li>

						<li class="nav-item">
								<a data-toggle="collapse" href="#sidebarLayouts">
									
								<i class="fas fa-tooth"></i>
									
									<p>Odontologia</p>
									<span class="caret"></span>
								</a>
								<div class="collapse" id="sidebarLayouts">
									<ul class="nav nav-collapse">
										<li>
											<a href="../../folder/odontologia.php">
												<span class="sub-item">Mostrar</span>
											</a>
										</li>
									</ul>
								</div>
							</li>

						<li class="nav-item">
								<a data-toggle="collapse" href="#anti">
								<i class="fas fa-venus-mars"></i>
									<p>Anticoncepcion</p>
									<span class="caret"></span>
								</a>
								<div class="collapse" id="anti">
									<ul class="nav nav-collapse">
										<li>
											<a href="../../folder/anticoncepcion.php">
												<span class="sub-item">Mostrar</span>
											</a>
										</li>
									</ul>
								</div>
							</li>


						<li class="nav-item">
							<a data-toggle="collapse" href="#sidebarLayouts">
								<i class="fas fa-male"></i>
								<p>Pacientes</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="sidebarLayouts">
								<ul class="nav nav-collapse">
									<li class="active">
										<a href="../folder/pacientes.php">
											<span class="sub-item">Mostrar</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#forms">
								<i class="fas fa-user-md"></i>
								<p>Médicos</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="forms">
								<ul class="nav nav-collapse">
									<li>
										<a href="../folder/doctor.php">
											<span class="sub-item">Mostrar</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#tables">
								<i class="fas fa-table"></i>
								<p>Áreas médicas</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="tables">
								<ul class="nav nav-collapse">
									<li>
										<a href="especialidades.php">
											<span class="sub-item">Mostrar</span>
										</a>
									</li>

								</ul>
							</div>
						</li>

						<li class="nav-item">
							<a data-toggle="collapse" href="#calendar">
								<i class="fas fa-calendar-alt"></i>
								<p>Horarios</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="calendar">
								<ul class="nav nav-collapse">
									<li>
										<a href="horario.php">
											<span class="sub-item">Mostrar</span>
										</a>
									</li>

								</ul>
							</div>
						</li>


						<li class="nav-item">
							<a data-toggle="collapse" href="#com">
							<i class="fas fa-store-alt"></i>
								<p>Comunidades</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="com">
								<ul class="nav nav-collapse">
									<li>
										<a href="comunidades.php">
											<span class="sub-item">Mostrar</span>
										</a>
									</li>

								</ul>
							</div>
						</li>

						<li class="nav-item">
							<a data-toggle="collapse" href="#user">
								<i class="fas fa-user"></i>
								<p>Usuarios</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="user">
								<ul class="nav nav-collapse">
									<li>
										<a href="usuarios.php">
											<span class="sub-item">Mostrar</span>
										</a>
									</li>

								</ul>
							</div>
						</li>


					</ul>
				</div>
			</div>
		</div>
		<!-- End Sidebar -->

		<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Historiales Clinicos</h4>
						<ul class="breadcrumbs">
							<li class="nav-home">
								<a href="../view/admin/admin.php">
									<i class="flaticon-home"></i>
								</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>


							<li class="nav-item">
								<a href="#">Mostrar</a>
							</li>
						</ul>
					</div>

					<div class="row">

						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="d-flex align-items-center">
										<h4 class="card-title">Mostrar</h4>

										<a href="#addRowModal" class="btn btn-primary btn-round ml-auto" data-toggle="modal">Nuevo</a>
										<?php include('AgregarModal.php'); ?>
									</div>
									<div class="card-tools">
										<a href="../view/detallehistoria/reporte.php" class="btn btn-info btn-border btn-round btn-sm mr-2">
											<span class="btn-label">
												<i class="fa fa-pencil"></i>
											</span>
											Export PDF
										</a>

									</div>
									<div class="card-body">
										<div class="table-responsive">
											<table id="add-row" class="display table table-striped table-hover">
												<thead>
													<tr>
													<th>#</th>
													<th>Fecha</th>
													<th>Hora</th>
														
													
														<th>Edad</th>
														
														<th>Talla</th>
														<th>Peso</th>
														<th>Estado_Nutricional</th>
														<th>Presion_Arterial</th>
														<th>Frecuencia_Cardiaca</th>
														<th>Frecuencia_Respiratoria</th>
														<th>Temperatura</th>
														<th>Subjetivo</th>
														<th>Objetivo</th>
														<th>Analisis</th>
														<th>CIE</th>
														<th>Tratamiento</th>
														<th>Estado</th>


														<th style="width: 10%">Action</th>
													</tr>
												</thead>
												<tfoot>
													<tr>
														<th>#</th>
														<th>Fecha</th>
													<th>Hora</th>
														
													
														<th> Edad</th>
														
													
														<th>Talla</th>
														<th>Peso</th>
														<th>Estado_Nutricional</th>
														<th>Presion_Arterial</th>
														<th>Frecuencia_Cardiaca</th>
														<th>Frecuencia_Respiratoria</th>
														<th>Temperatura</th>
														<th>Subjetivo</th>
														<th>Objetivo</th>
														<th>Analisis</th>
														<th>CIE</th>
														<th>Tratamiento</th>
														<th>Estado</th>
														<th>Action</th>

														
													</tr>
												</tfoot>


												<tbody>
													<?php
													//incluimos el fichero de conexion
													include_once('../view/config/dbconect.php');

													$database = new Connection();
													$db = $database->open();
													try {
														$sql = 'SELECT * 
														FROM detallehistorial
													';
														foreach ($db->query($sql) as $row) {
													?>
															<tr>
															<td><?php echo $row['idhistoria']; ?></td>
															<td><?php echo $row['fecha']; ?></td>
															<td><?php echo $row['hora']; ?></td>
															
															<td><?php echo $row['edad']; ?> Años</td>
																
																
																<td><?php echo $row['talla']; ?></td>
																<td><?php echo $row['peso']; ?></td>
																<td><?php echo $row['imc']; ?></td>
																<td><?php echo $row['p_a']; ?></td>
																<td><?php echo $row['f_c']; ?></td>
																<td><?php echo $row['f_r']; ?></td>
																<td><?php echo $row['temp']; ?></td>
																<td><?php echo $row['subjetivo']; ?></td>
																<td><?php echo $row['objetivo']; ?></td>
																<td><?php echo $row['analisis']; ?></td>
																<td><?php echo $row['cie']; ?></td>
																<td><?php echo $row['tratamiento']; ?></td>

																<td>
																	<?php if ($row['estado'] == 1) { ?>
																		<form method="get" action="javascript:activo('<?php echo $row['idhistoria']; ?>')">
																			<button type="submit" class="btn btn-success btn-xs">Activo</button>
																		</form>

																	<?php  } else { ?>
																		<form method="get" action="javascript:inactivo('<?php echo $row['idhistoria']; ?>')">
																			<button type="submit" class="btn btn-danger btn-xs">Inactivo</button>
																		</form>
																	<?php  } ?>
																</td>
																<td>

																	<div class="form-button-action">
																		<button href="#editRowModal=<?php echo $row['idhistoria']; ?>" class="btn btn-link btn-primary btn-lg" data-toggle="modal" title="" data-original-title="Edit Task" data-target="#editRowModal<?php echo $row['idhistoria']; ?>">
																			<i class="fa fa-edit"></i>
																		</button>
																		
																		

																		<button href="#deleteRowModal=<?php echo $row['idhistoria']; ?>" class="btn btn-link btn-danger btn-lg" data-toggle="modal" title="" data-original-title="Delete Task" data-target="#deleteRowModal<?php echo $row['idhistoria']; ?>">
																			<i class="fa fa-times"></i>
																		</button>

				

																		<?php include('editar.php'); ?>
																	</div>
																</td>
															</tr>

													<?php
														}
													} catch (PDOException $e) {
														echo "Hubo un problema en la conexión: " . $e->getMessage();
													}
													//Cerrar la Conexion
													$database->close();
													?>
												</tbody>
											</table><?php
													?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--   Core JS Files   -->
	<script src="../assets/js/core/jquery.3.2.1.min.js"></script>
	<script src="../assets/js/core/popper.min.js"></script>
	<script src="../assets/js/core/bootstrap.min.js"></script>
	<!-- jQuery UI -->
	<script src="../assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="../assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

	<!-- jQuery Scrollbar -->
	<script src="../assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
	<!-- Datatables -->
	<script src="../assets/js/plugin/datatables/datatables.min.js"></script>
	<!-- Atlantis JS -->
	<script src="../assets/js/atlantis.min.js"></script>
	<!-- Atlantis DEMO methods, don't include it in your project! -->
	<script src="../assets/js/setting-demo2.js"></script>
	<script>
	

			// Add Row
			$('#add-row').DataTable({
				"pageLength": 5,
			});

			var action = '<td> <div class="form-button-action"> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

			$('#addRowButton').click(function() {
				$('#add-row').dataTable().fnAddData([
					$("#addName").val(),
					$("#addPOSition").val(),
					$("#addOffice").val(),
					action
				]);
				$('#addRowModal').modal('hide');

			});
		
	</script>
	

	<script>
		function activo(idhistoria) {
			var id = idhistoria;
			$.ajax({
				type: "GET",
				url: "../assets/ajax/editar_estado_activo_historia.php?id=" + id,
			}).done(function(data) {
				window.location.href = '../folder/detallehistoria.php';
			})
		}

		// Editar estado inactivo
		function inactivo(idhistoria) {
			var id = idhistoria;
			$.ajax({
				type: "GET",
				url: "../assets/ajax/editar_estado_inactivo_historia.php?id=" + id,
			}).done(function(data) {
				window.location.href = '../folder/detallehistoria.php';
			})
		}
	</script>
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


	<!--------------------------------script nuevo--------------------------------------------------->

	<?php
	if (isset($_POST["agregar"])) {
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "tarea1";

		// Creamos la conexión
		$conn = new mysqli($servername, $username, $password, $dbname);

		// Revisamos la conexión
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
	
		$idhistoriain = $_POST['idhistoriain'];
		$edad = $_POST['edad'];
		$fecha = $_POST['fecha'];
		$hora = $_POST['hora'];
		$talla = $_POST['talla'];
		$peso = $_POST['peso'];
		$imc = $_POST['imc'];
		$p_a = $_POST['p_a'];
		$f_c = $_POST['f_c'];
		$f_r = $_POST['f_r'];
		$temp = $_POST['temp'];
		$subjetivo = $_POST['subjetivo'];
		$objetivo = $_POST['objetivo'];
		$analisis = $_POST['analisis'];
		$cie = $_POST['cie'];
		$tratamiento = $_POST['tratamiento'];


		
		$grado_instruccion = $_POST['grado_instruccion'];
		$diagnostico = $_POST['diagnostico'];
		$consulta = $_POST['consulta'];
		$hospital = $_POST['hospital'];

		// Realizamos la consulta para saber si coincide con uno de esos criterios
		$sql = "SELECT * FROM detallehistorial where idhistoria='$idhistoria'";
		$result = mysqli_query($conn, $sql);
	?>

		<?php
		// Validamos si hay resultados
		if (mysqli_num_rows($result) > 0) {
			// Si es mayor a cero imprimimos que ya existe el usuario

			if ($result) {
		?>
				<script type="text/javascript">
					Swal.fire({
						icon: 'error',
						title: 'Oops...',
						text: 'Ya existe el registro a agregar!'

					})
				</script>
				<?php
			}
		} else {
			// Si no hay resultados, ingresamos el registro a la base de datos
			$sql2="INSERT INTO detallehistorial (idhistoriain,edad,fecha,hora,estado,talla,peso,imc,p_a,f_c,f_r,temp,subjetivo,objetivo,analisis,cie,tratamiento) 
			VALUES ('$idhistoriain','$edad', '$fecha','$hora','1','$talla','$peso','$imc','$p_a','$f_c','$f_r','$temp','$subjetivo','$objetivo','$analisis','$cie','$tratamiento');";	 

			if (mysqli_query($conn, $sql2)) {

				if ($sql2) {
				?>

					<script type="text/javascript">
						Swal.fire({
							POSition: 'top-end',
							icon: 'success',
							title: 'Agregado correctamente',
							showConfirmButton: false,
							timer: 1500
						}).then(function() {
							window.location = "../folder/detallehistoria.php";
						});
					</script>

				<?php
				} else {
				?>
					<script type="text/javascript">
						Swal.fire({
							icon: 'error',
							title: 'Oops...',
							text: 'No se pudo guardar!'

						})
					</script>
	<?php

				}
			} else {

				echo "Error: " . $sql2 . "" . mysqli_error($conn);
			}
		}
		// Cerramos la conexión
		$conn->close();
	}
	?>

	
</body>

</html>