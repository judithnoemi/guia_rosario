
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
date_default_timezone_set('America/La_Paz');
include_once('../../assets/fpdf/fpdf.php');

class PDF extends FPDF
{
// Funcion encargado de realizar el encabezado
function Header()
{
// Logo
$this->Image('../../assets/img/icon.png',10,-1,30);
$this->SetFont('Arial','B',12);
// Move to the right
$this->Cell(80);
// Title
$this->Cell(95,10,'LISTA HISTORIALES CLINICOS',1,0,'C');
// Line break
$this->Ln(20);
$this->Cell(0,5, 'GENERADO EL : ' .date('Y-m-d H:i:s'), 0, 1, 'C');
$this->Ln(5);
}
// Funcion pie de pagina
function Footer()
{
// Position at 1.5 cm from bottom
$this->SetY(-15);
// Arial italic 8
$this->SetFont('Arial','I',10);
// Page number
$this->Cell(0,10,'Pagina '.$this->PageNo(),0,0,'C');
}
function AddStyles()
    {
        // Estilo para el encabezado de la tabla
        $this->SetFont('Arial', 'B', 12);
        $this->SetFillColor(149, 149, 255);
        $this->SetDrawColor(149, 149, 255);

        // Estilo para el contenido de la tabla
        $this->SetFont('Arial', '', 12);
    }
}

$db = new dbConexion();
$connString = $db->getConexion();
$display_heading = array('idhistoria'=>'#', 'hour'=> 'Hora','fecha'=> 'Fecha');

$result = mysqli_query($connString, "SELECT historial.idhistoria, pacientes.codpaci,pacientes.nombrep,pacientes.apellidop,pacientes.nacimiento,
doctor.nomdoc,doctor.apedoc,especialidades.nombrees,
historial.fecha,historial.hora,historial.edad,historial.fecha,historial.talla,
historial.peso,historial.imc,historial.p_a,historial.f_c,historial.f_r,historial.temp,historial.subjetivo,
historial.objetivo,historial.analisis,historial.cie,historial.tratamiento
FROM historial 

INNER JOIN doctor ON historial.coddoc = doctor.coddoc 
INNER JOIN especialidades ON doctor.codespe = especialidades.codespe 
INNER JOIN pacientes ON pacientes.codpaci = historial.codpac") or die("database error:". mysqli_error($connString));
$header = mysqli_query($connString, "SHOW columns FROM historial");

$pdf = new PDF('L','mm',"letter");
//header
$pdf->AliasNbPages();
//foter page
$pdf->AddPage();
$pdf->AddStyles();
$pdf->SetFont('Arial','B',10, 'UTF-8');

$pdf->AliasNbPages();
$pdf->SetFont('Arial', 'B', 10, 'UTF-8');
// Declaramos el ancho de las columnas
$w = array(10, 40, 150,65);
//Declaramos el encabezado de la tabla
$pdf->Cell(25,12,'#',1);

$pdf->Cell(45,12,'FECHA Y HORA ',1);
$pdf->Cell(40,12,'PACIENTE',1);
$pdf->Cell(52,12,'MEDICO',1);
$pdf->Cell(22,12,'SUBJETIVO',1);
$pdf->Cell(20,12,'OBJETIVO',1);
$pdf->Cell(20,12,'ANALISIS',1);
$pdf->Cell(14,12,'CIE',1);
$pdf->Cell(30,12,'TRATAMIENTO',1);


$pdf->Ln();
$pdf->SetFont('Arial','',12, 'UTF-8');
//Mostramos el contenido de la tabla
foreach($result as $row)
{
$pdf->Cell(25,6 ,$row['idhistoria'],1);

$pdf->Cell(45, 6, $row['fecha'] . ' ' . $row['hora'], 1);
$pdf->Cell(40, 6, $row['nombrep']. ' ' .$row['apellidop']. ' ' .$row['edad'],1);
$pdf->Cell(52, 6, $row['nomdoc']. ' ' .$row['apedoc']. ' ' .$row['nombrees'],1);
$pdf->Cell(22,6 ,$row['subjetivo'],1);
$pdf->Cell(20,6 ,$row['objetivo'],1);
$pdf->Cell(20,6 ,$row['analisis'],1);
$pdf->Cell(14,6 ,$row['cie'],1);

$pdf->MultiCell(50, 6, $row['tratamiento'], 1);
// Ajusta el ancho de la celda según tus necesidades
$anchoCelda = 50;

// Obtén el contenido del tratamiento
$tratamiento = $row['tratamiento'];

// Divide el tratamiento en líneas
$lineas = explode("\n", $tratamiento);

// Calcula la altura necesaria para el contenido
$numLineas = count($lineas);
$alturaContenido = $numLineas * 6; // 6 es la altura de una línea, ajusta según sea necesario

// Agrega una nueva línea si es necesario
$pdf->Ln();

// Imprime el contenido usando Cell con una altura ajustada
$pdf->MultiCell($anchoCelda, 6, $tratamiento, 1);

// Agrega espacio vertical después de la celda
$pdf->Ln(6); // Puedes ajustar la cantidad según tus necesidades




$pdf->Ln();
}
$pdf->Output();
?>