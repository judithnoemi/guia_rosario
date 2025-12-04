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
$this->Image('../../assets/img/logo.jpeg', 15, 15, 50);
        $this->SetFont('Arial', 'B', 12); //tamaño de titulo

        // Title
        $this->Cell(0, 10, 'LISTA DE COMUNIDADES', 0, 1, 'C');
        // Line break
        $this->Ln(5);
        $this->Cell(0, 5, 'Generado el : ' . date('Y-m-d H:i:s'), 0, 1, 'C');
        $this->Ln(10);
        $this->SetFont('Arial', 'B', 20); //tamaño titulo

       
        //$this->SetFont('Arial', '', 12);//tamaño fecha
        $this->Ln(5);
}
// Funcion pie de pagina
function Footer()
{
// Position at 1.5 cm from bottom
$this->SetY(-15);
// Arial italic 8
$this->SetFont('Arial', 'I', 10);
// Page number
$this->Cell(0, 10, utf8_decode('Pagina') . $this->PageNo(), 0, 0, 'C');
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
$display_heading = array('id_comunidad'=>'#', 'nombre_comunidad'=> 'Comunidad');

$result = mysqli_query($connString, "SELECT * FROM comunidad ") or die("database error:". mysqli_error($connString));
$header = mysqli_query($connString, "SHOW columns FROM comunidad");

// Crear nuevo documento PDF
$pdf = new PDF("p", "mm", "letter");
$pdf->AliasNbPages(); //no se pa que es
$pdf->AddPage();
$pdf->AddStyles();

$pdf->AliasNbPages();
$pdf->SetFont('Arial', 'B', 10, 'UTF-8');

// Declaramos el encabezado de la tabla
$pdf->Cell(30, 5, "", 0, 0, "C");
$pdf->Cell(10, 5, "ID", 1, 0, "C", true);
$pdf->Cell(60, 5, "COMUNIDAD", 1, 0, "C", true);
$pdf->Cell(60, 5, "PROVINCIA", 1, 0, "C", true);
$pdf->Ln();

foreach($result as $row)
{
    $pdf->Cell(30, 6, '', 0, 0, 'C');
    $pdf->Cell(10, 6, $row['id_comunidad'], 1, 0, 'C');

    $pdf->Cell(60, 6, ($row['nombre_comunidad']), 1, 0, 'C');
    
    $pdf->Cell(60, 6, ($row['provincia']), 1, 0, 'C');
$pdf->Ln();
}
$pdf->SetX((210 - $pdf->GetStringWidth('Pagina ' . $pdf->PageNo())) / 2);

$pdf->Output();
?>