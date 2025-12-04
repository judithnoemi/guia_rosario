
<?php
//Incluimos el fichero de conexion
Class dbConexion{
/* Variables de conexion */
var $dbhost = "localhost";
var $username = "root";
var $password = "";
var $dbname = "tarea1";
var $conn;
//Funcion de conexion MySQL
function getConexion() {
$con = mysqli_connect($this->dbhost, $this->username, $this->password, $this->dbname) or die("Connection failed: " . mysqli_connect_error());

/* Revisamos la conexion */
if (mysqli_connect_errno()) {
printf("Connect failed: %s\n", mysqli_connect_error());
exit();
} else {
$this->conn = $con;
}
return $this->conn;
}
}
//Incluimos la libreria PDF
include_once('../../assets/fpdf/fpdf.php');

class PDF extends FPDF
{
// Funcion encargado de realizar el encabezado
function Header()
{
// Logo
$this->Image('../../assets/img/icon.png',10,-1,30);
$this->SetFont('Arial','B',13);
// Move to the right
$this->Cell(80);
// Title
$this->Cell(95,10,'Lista de los doctores',1,0,'C');
// Line break
$this->Ln(20);
}
// Funcion pie de pagina
function Footer()
{
// Position at 1.5 cm from bottom
$this->SetY(-15);
// Arial italic 8
$this->SetFont('Arial','I',8);
// Page number
$this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
}
}

$db = new dbConexion();
$connString = $db->getConexion();
$display_heading = array('idhistoria'=>'#', 'idhistoria'=> 'DNI', 'nomdoc'=> 'Nombres','apedoc'=> 'Apellidos','nombrees'=> 'Especialidad','telefo'=> 'Telefono', 'sexo'=> 'Sexo');

$result = mysqli_query($connString, "SELECT historial.idhistoria, historial.hour, historial.fecha, historial.grado_instruccion, historial.diagnostico, historial.consulta, historial.hospital, doctor.dnidoc, doctor.nomdoc,doctor.apedoc,especialidades.nombrees
FROM historial 
    INNER JOIN doctor ON historial.coddoc = doctor.coddoc 
    INNER JOIN especialidades ON doctor.codespe = especialidades.codespe 
    INNER JOIN pacientes ON pacientes.codpaci = historial.codpac 
    INNER JOIN comunidad ON pacientes.comunidad_id = comunidad.id_comunidad") 
or die("database error:". mysqli_error($connString));
$header = mysqli_query($connString, "SHOW columns FROM doctor");

$pdf = new PDF('L','mm','A4');
//header
$pdf->AddPage();
//foter page
$pdf->AliasNbPages();
$pdf->SetFont('Arial','B',10, 'UTF-8');
// Declaramos el ancho de las columnas
$w = array(10, 25, 50, 50,45,25,25,25,35);
//Declaramos el encabezado de la tabla
$pdf->Cell(10,12,'#',1);
$pdf->Cell(25,12,'CI',1);
$pdf->Cell(50,12,'DATOS DEL PACIENTE',1);
$pdf->Cell(50,12,'DATOS DEL MEDICO',1);
$pdf->Cell(45,12,'HORA',1);
$pdf->Cell(25,12,'FECHA',1);
$pdf->Cell(25,12,'GRADO INSTRUCCION',1);
$pdf->Cell(25,12,'DIAGNOSTICO',1);
$pdf->Cell(25,12,'CONSULTA',1);
$pdf->Cell(25,12,'HOSPITAL',1);


$pdf->Ln();
$pdf->SetFont('Arial','',12, 'UTF-8');
//Mostramos el contenido de la tabla
foreach($result as $row)
{
$pdf->Cell($w[0],6,$row['idhistoria'],1);
$pdf->Cell($w[1],6,utf8_decode($row['codpac']),1);
$pdf->Cell($w[2],6,utf8_decode($row['coddoc']),1);
$pdf->Cell($w[3],6,utf8_decode($row['hour']),1);
$pdf->Cell($w[4],6,utf8_decode($row['fecha']),1);
$pdf->Cell($w[5],6,utf8_decode($row['grado_instruccion']),1);
$pdf->Cell($w[6],6,utf8_decode($row['diagnostico']),1);
$pdf->Cell($w[7],6,utf8_decode($row['consulta']),1);
$pdf->Cell($w[7],6,utf8_decode($row['hospital']),1);


$pdf->Ln();
}
$pdf->Output();
?>