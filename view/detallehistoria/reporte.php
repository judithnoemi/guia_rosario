<?php 
    # Conectar a la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "tarea1";

    $conn = new mysqli($servername, $username, $password, $dbname);

    # Verificar la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    $sql = "SELECT *
            FROM historial
            INNER JOIN detallehistorial ON historial.idhistoriain = detallehistorial.idhistoriain
            INNER JOIN pacientes ON historial.codpac = pacientes.codpaci
                ORDER BY detallehistorial.idhistoria ASC";

    $datos = $conn->query($sql);

    $prev=null;

    #FPDF
    include_once('../../assets/fpdf/fpdf.php');
    date_default_timezone_set('America/La_Paz');

    class PDF extends FPDF
    {
        function Footer()
        {
            $this->SetTextColor(0,0,0);
            $this->SetY(260);
            $this->SetFont('Arial', 'I', 8);
            $this->Cell(181, 10, utf8_decode('Página ') . $this->PageNo()." de {nb}", 0, 0, 'C');
        }
    }

    $pdf = new PDF('L','mm','Letter');
    $pdf->SetAutoPageBreak(true, 35);
    $pdf->AliasNbPages();
    $pdf->AddPage();

    #Titulo DDE
    $pdf->SetFont('Arial','B',15.5);
    $pdf->SetTextColor(33,33,33);
    $pdf->Cell(255,25,utf8_decode('LISTADO DE DETALLES DE HISTORIALES CLINICOS'),0,0,'C');
    $pdf->Ln(10.5);

    #Titulo
    $pdf->SetFont('Arial','B',12);
    $pdf->SetTextColor(33,33,33);
    $pdf->Cell(255,25,utf8_decode('Generado el: '.date('Y-m-d H:i:s')),0,0,'C');
    $pdf->Ln(10.5);
    
    $pdf->Image('../../assets/img/logo.jpeg',15,10,50,);  
    $pdf->Ln(15);
    
    $pdf->SetFillColor(38,198,208);
    $pdf->SetDrawColor(38,198,208);
    $pdf->SetTextColor(33,33,33);
    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(20,7,utf8_decode('ID'),1,0,'L',true);
    $pdf->Cell(20,7,utf8_decode('Fecha'),1,0,'L',true);
    $pdf->Cell(30,7,utf8_decode('Paciente'),1,0,'L',true);
    $pdf->Cell(15,7,utf8_decode('Edad'),1,0,'L',true);
    $pdf->Cell(14,7,utf8_decode('Talla'),1,0,'C',true);
    $pdf->Cell(14,7,utf8_decode('Peso'),1,0,'C',true);
    $pdf->Cell(12,7,utf8_decode('IMC'),1,0,'C',true);
    $pdf->Cell(18,7,utf8_decode('PA'),1,0,'C',true);
    $pdf->Cell(18,7,utf8_decode('FC'),1,0,'C',true);
    $pdf->Cell(18,7,utf8_decode('FR'),1,0,'C',true);
    $pdf->SetFont('Arial','B',6);
    $pdf->Cell(14,7,utf8_decode('Temperatura'),1,0,'L',true);
    $pdf->SetFont('Arial','B',6.5);
   
    $pdf->Cell(25,7,utf8_decode('Objetivo'),1,0,'L',true);
    $pdf->Cell(20,7,utf8_decode('Analisis'),1,0,'L',true);
    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(10,7,utf8_decode('CIE'),1,0,'C',true);
    $pdf->SetFont('Arial','B',7);
    $pdf->Cell(20,7,utf8_decode('Tratamiento'),1,0,'L',true);
    $pdf->Ln(7);
    
    #257
    
    while($rows = $datos->fetch_assoc()){
        
        $cod=$rows['idhistoria'];
        
        $pdf->SetFont('Arial','',9);
        $pdf->Cell(20,7,utf8_decode($rows['idhistoria']),'L',0,'C');
        $pdf->Cell(20,7,utf8_decode(date("d/m/Y", strtotime($rows['fecha']))),'L',0,'L');
        $pdf->Cell(30,7,utf8_decode($rows['nombrep'].' '.$rows['apellidop']),'L',0,'L');
        $pdf->Cell(15,7,utf8_decode($rows['edad']. ' años'),'L',0,'L');
        $pdf->Cell(14,7,utf8_decode($rows['talla']. ' cm'),'L',0,'L');
        $pdf->Cell(14,7,utf8_decode($rows['peso']. ' kg'),'L',0,'L');
        $pdf->Cell(12,7,utf8_decode($rows['imc']),'L',0,'L');
        $pdf->Cell(18,7,utf8_decode($rows['p_a']. ' mmHg'),'L',0,'L');
        $pdf->Cell(18,7,utf8_decode($rows['f_c']. ' lat/min'),'L',0,'L');
        $pdf->Cell(18,7,utf8_decode($rows['f_r']. ' rpm'),'L',0,'L');
        $pdf->Cell(14,7,utf8_decode($rows['temp']. ' °C'),'L',0,'L');
        
        $pdf->Cell(25,7,utf8_decode($rows['objetivo']),'L',0,'L');
        $pdf->Cell(20,7,utf8_decode($rows['analisis']),'L',0,'L');
        $pdf->Cell(10,7,utf8_decode($rows['cie']),'L',0,'L');
        $pdf->Cell(20,7,utf8_decode($rows['tratamiento']),'LR',0,'L');
        
        $prev=$cod;
        $pdf->Ln(5);
    }
    

    $pdf->Ln(2);
    $pdf->SetFont('Arial','',10);
    $pdf->Cell(260,5,utf8_decode(''),'T',0,'L');  

    $pdf->Ln(4);
    
    $pdf->Ln();

    



    $pdf->Output("I","Recibo.pdf",true);

?>