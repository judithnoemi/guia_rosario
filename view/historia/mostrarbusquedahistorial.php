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
	<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
	<title>BUSCADOR DE HISTORIALES</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="../../assets/img/icon.ico" type="image/x-icon" />

	<!-- Fonts and icons -->
	<script src="../../assets/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {
				"families": ["Lato:400,400,700,900"]
			},
			custom: {
				"families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"],
				urls: ['../../assets/css/fonts.min.css']
			},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="../../assets/css/atlantis.min.css">

	<!-- CSS Just for demo purPOSe, don't include it in your project -->
	<link rel="stylesheet" href="../../assets/css/demo.css">

</head>

<body>
	<div class="wrapper">
		<div class="main-header">
			<!-- Logo Header -->
			<div class="logo-header" data-background-color="blue">
				<a href="../../view/admin/admin.php" class="logo">
					<img src="../../assets/img/hospital.svg" alt="navbar brand" class="navbar-brand">
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
									<img src="../../assets/img/mujer.png" alt="..." class="avatar-img rounded-circle">
								</div>
							</a>
							<ul class="dropdown-menu dropdown-user animated fadeIn">
								<div class="dropdown-user-scroll scrollbar-outer">
									<li>
										<div class="user-box">
											<div class="avatar-lg"><img src="../../assets/img/mujer.png" alt="image profile" class="avatar-img rounded"></div>
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
										<a class="dropdown-item" href="../../cerrarSesion.php">Logout</a>
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
							<img src="../../assets/img/mujer.png" alt="..." class="avatar-img rounded-circle">
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
						<li class="nav-item active">
							<a data-toggle="collapse" href="#base">
								<i class="fas fa-layer-group"></i>
								<p>Historiales Clinicos</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="base">
								<ul class="nav nav-collapse">


									<li>
										<a href="../../folder/detallehistoria.php">
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
										<a href="../../folder/pacientes.php">
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
								<i class="fas fa-calendar-alt"></i>
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
								<a href="../../view/admin/admin.php">
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
									</div>
									<div class="card-tools">
										<a href="../view/historia/reporte1.php" class="btn btn-info btn-border btn-round btn-sm mr-2">
											<span class="btn-label">
												<i class="fa fa-pencil"></i>
											</span>
											Export PDF
										</a>
									</div>
										<br>
										<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
											<label for="busqueda">¿Que desea buscar? </label>
											<input type="text" id="busqueda" name="busqueda" required>

											<button type="submit">Buscar</button>
										</form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $conn = new mysqli("localhost", "root", "", "tarea1");

        if ($conn->connect_error) {
            die("Error de conexión: " . $conn->connect_error);
        }

        $busqueda = $_POST["busqueda"];

        $sql = "SELECT * 
                FROM historial
				INNER JOIN pacientes ON historial.codpac=pacientes.codpaci
				INNER JOIN doctor ON historial.coddoc=doctor.coddoc
				INNER JOIN detallehistorial ON historial.idhistoriain=detallehistorial.idhistoriain
				INNER JOIN comunidad ON pacientes.comunidad_id = comunidad.id_comunidad
					WHERE ((pacientes.nombrep LIKE '%$busqueda%' OR pacientes.apellidop LIKE '%$busqueda%' OR pacientes.departamento LIKE '%$busqueda%' OR comunidad.nombre_comunidad LIKE '%$busqueda%' OR doctor.nomdoc LIKE '%$busqueda%' OR doctor.apedoc LIKE '%$busqueda'
							OR doctor.apedoc LIKE '%$busqueda' OR doctor.dnidoc LIKE '%$busqueda' OR historial.fecha LIKE '%$busqueda%' OR pacientes.dnipa LIKE '%$busqueda%'
							OR detallehistorial.edad LIKE '%$busqueda%' OR historial.diagnostico LIKE '%$busqueda%' OR historial.consulta LIKE '%$busqueda%'
							OR historial.hospital LIKE '%$busqueda%' OR detallehistorial.talla LIKE '%$busqueda%' OR detallehistorial.peso LIKE '%$busqueda%' 
							OR detallehistorial.imc LIKE '%$busqueda%' OR detallehistorial.p_a LIKE '%$busqueda%' OR detallehistorial.f_c LIKE '%$busqueda%' OR detallehistorial.f_r LIKE '%$busqueda%'
							OR detallehistorial.temp LIKE '%$busqueda%' OR detallehistorial.subjetivo LIKE '%$busqueda%' OR detallehistorial.objetivo LIKE '%$busqueda%' OR detallehistorial.analisis LIKE '%$busqueda%'
							OR detallehistorial.cie LIKE '%$busqueda%' OR detallehistorial.tratamiento LIKE '%$busqueda%')) 
                    ORDER BY historial.idhistoriain ASC";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<br>";
            echo "<h2>Resultados:</h2>";
			echo "<div class='card-body'>";
			echo "<div class='table-responsive'>";
            echo "<table id='add-row' class='display table table-striped table-hover'>";
            
			echo "<thead>
                    <th>ID historial</th>
                    <th>Fecha</th>
                    <th>Paciente</th>
                    <th>CI paciente</th>
                    <th>Departamento</th>
                    <th>Edad</th>
                    <th>Comunidad</th>
                    <th>Doctor</th>
                    <th>Diagnostico</th>
                    <th>Consulta</th>
                    <th>Hospital</th>

                    <th>Talla</th>
                    <th>Peso</th>
                    <th>IMC</th>
                    <th>Presion Arterial</th>
                    <th>Frecuencia Cardiaca</th>
                    <th>Frecuencia Respiratoria</th>
                    <th>Temperatura</th>
                    <th>Subjetivo</th>
                    <th>Objetivo</th>
                    <th>Analisis</th>
                    <th>CIE</th>
                    <th>Tratamiento</th>

                </thead>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row["idhistoriain"] . "</td>
                        <td>" . $row["fecha"] . "</td>
                        <td>" . $row["nombrep"]." ".$row["apellidop"]."</td>
                        <td>" . $row["dnipa"] . "</td>
                        <td>" . $row["departamento"] . "</td>
                        <td>" . $row["edad"] . " años</td>
                        <td>" . $row["nombre_comunidad"] . "</td>
                        <td>" . $row["nomdoc"]." ".$row["apedoc"]."</td>
                        <td>" . $row["diagnostico"] . "</td>
                        <td>" . $row["consulta"] . "</td>
                        <td>" . $row["hospital"] . "</td>

                        <td>" . $row["talla"] . " cm</td>
                        <td>" . $row["peso"] . " kg</td>
                        <td>" . $row["imc"] . " </td>
                        <td>" . $row["p_a"] . " mmHg</td>
                        <td>" . $row["f_c"] . " lat/min</td>
                        <td>" . $row["f_r"] . " rpm</td>
                        <td>" . $row["temp"] . " °C</td>
                        <td>" . $row["subjetivo"] . "</td>
                        <td>" . $row["objetivo"] . "</td>
                        <td>" . $row["analisis"] . "</td>
                        <td>" . $row["cie"] . "</td>
                        <td>" . $row["tratamiento"] . "</td>
                    </tr>";
            }

            echo "</table>";
        } else {
            echo "<p>No se encontraron resultados.</p>";
        }

        $conn->close();
    }
    ?>
	
	<!--   Core JS Files   -->
	<script src="../../assets/js/core/jquery.3.2.1.min.js"></script>
	<script src="../../assets/js/core/popper.min.js"></script>
	<script src="../../assets/js/core/bootstrap.min.js"></script>
	<!-- jQuery UI -->
	<script src="../../assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="../../assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

	<!-- jQuery Scrollbar -->
	<script src="../../assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
	<!-- Datatables -->
	<script src="../../assets/js/plugin/datatables/datatables.min.js"></script>
	<!-- Atlantis JS -->
	<script src="../../assets/js/atlantis.min.js"></script>
	<!-- Atlantis DEMO methods, don't include it in your project! -->
	<script src="../../assets/js/setting-demo2.js"></script>
	
</body>

</html>