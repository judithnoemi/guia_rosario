
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
$display_heading = array('idhistoria'=>'#', 'hour'=> 'Hora','fecha'=> 'Fecha', 'grado_instruccion'=> 'Grado Instruccion','diagnostico'=> 'Diagnostico', 'consulta'=> 'Consulta', 'hospital'=> 'Hospital');

$result = mysqli_query($connString, "SELECT historial.idhistoria, historial.hour, historial.fecha, historial.grado_instruccion, historial.diagnostico, historial.consulta, historial.hospital FROM historial") or die("database error:". mysqli_error($connString));
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
$pdf->Cell(10,12,'#',1);
$pdf->Cell(25,12,'HORA',1);
$pdf->Cell(30,12,'FECHA',1);
$pdf->Cell(45,12,'GRADO INSTRUCCION',1);
$pdf->Cell(55,12,'DIAGNOSTICO',1);
$pdf->Cell(22,12,'CONSULTA',1);
$pdf->Cell(65,12,'HOSPITAL',1);

$pdf->Ln();
$pdf->SetFont('Arial','',12, 'UTF-8');
//Mostramos el contenido de la tabla
foreach($result as $row)
{
$pdf->Cell(10,6 ,$row['idhistoria'],1);

$pdf->Cell(25,6, $row['hour'],1);
$pdf->Cell(30,6,$row['fecha'],1);
$pdf->Cell(45,6,utf8_decode($row['grado_instruccion']),1);
$pdf->Cell(55,6,utf8_decode($row['diagnostico']),1);
$pdf->Cell(22,6,utf8_decode($row['consulta']),1);
$pdf->Cell(65,6,utf8_decode($row['hospital']),1);

$pdf->Ln();
}
$pdf->Output();
?>