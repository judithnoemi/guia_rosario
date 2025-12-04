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


    # Consultar la base de datos para obtener las ventas en el rango de fechas
    $sql = "SELECT *
            FROM historial
            INNER JOIN pacientes ON historial.codpac = pacientes.codpaci
            INNER JOIN doctor ON historial.coddoc= doctor.coddoc
            INNER JOIN especialidades ON doctor.codespe = especialidades.codespe
                ORDER BY historial.idhistoriain ASC";

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
    $pdf->SetFont('Arial','B',18);
    $pdf->SetTextColor(33,33,33);
    $pdf->Cell(255,25,utf8_decode('LISTADO DE HISTORIALES CLINICOS'),0,0,'C');
    $pdf->Ln(10.5);

    #Titulo
    $pdf->SetFont('Arial','B',13);
    $pdf->SetTextColor(33,33,33);
    $pdf->Cell(255,25,utf8_decode('Generado el: '.date('Y-m-d H:i:s')),0,0,'C');
    $pdf->Ln(10.5);
    
    $pdf->Image('../../assets/img/logo.jpeg',15,10,50,);  
    $pdf->Ln(15);
    
    $pdf->SetFillColor(38,198,208);
    $pdf->SetDrawColor(38,198,208);
    $pdf->SetTextColor(33,33,33);
    $pdf->SetFont('Arial','B',11);
    $pdf->Cell(22,8,utf8_decode('ID historia'),1,0,'L',true);
    $pdf->Cell(22,8,utf8_decode('Fecha'),1,0,'L',true);
    $pdf->Cell(35,8,utf8_decode('Paciente'),1,0,'L',true);
    $pdf->Cell(45,8,utf8_decode('Doctor'),1,0,'L',true);
    $pdf->Cell(28,8,utf8_decode('Especialidad'),1,0,'L',true);
    $pdf->Cell(50,8,utf8_decode('Diagnostico'),1,0,'L',true);
    $pdf->Cell(20,8,utf8_decode('Consulta'),1,0,'L',true);
    $pdf->Cell(40,8,utf8_decode('Hospital'),1,0,'L',true);
    $pdf->Ln(8);
    
    while($rows = $datos->fetch_assoc()){
        
        $cod=$rows['idhistoriain'];
        
        $pdf->SetFont('Arial','',10);
        $pdf->Cell(22,8,utf8_decode($rows['idhistoriain']),'L',0,'C');
        $pdf->Cell(22,8,utf8_decode(date("d/m/Y", strtotime($rows['fecha']))),'L',0,'L');
        $pdf->Cell(35,8,utf8_decode($rows['nombrep'].' '.$rows['apellidop']),'L',0,'L');
        $pdf->Cell(45,8,utf8_decode($rows['nomdoc'].' '.$rows['apedoc']),'L',0,'L');
        $pdf->Cell(28,8,utf8_decode($rows['nombrees']),'L',0,'L');
        $pdf->Cell(50,8,utf8_decode($rows['diagnostico']),'L',0,'L');
        $pdf->Cell(20,8,utf8_decode($rows['consulta']),'L',0,'L');
        $pdf->Cell(40,8,utf8_decode($rows['hospital']),'LR',0,'L');
        //$pdf->Cell(10,5,utf8_decode(),'L',0,'L');
        //$pdf->SetFont('Arial','',7);
        //$pdf->Cell(107,5,utf8_decode(mb_substr($rows[''],0,70)),'L',0,'L');
        //$pdf->SetFont('Arial','',8);
        //$pdf->Cell(10,5,utf8_decode($rows['']),'L',0,'L');

        #Totalventa
        
        $prev=$cod;
        $pdf->Ln(6);
    }

    $pdf->Ln(2);
    $pdf->SetFont('Arial','',10);
    $pdf->Cell(22,5,utf8_decode(''),'T',0,'L');
    $pdf->Cell(22,5,utf8_decode(''),'T',0,'C');
    $pdf->Cell(35,5,utf8_decode(''),'T',0,'L');
    $pdf->Cell(45,5,utf8_decode(''),'T',0,'L');
    $pdf->Cell(28,5,utf8_decode(''),'T',0,'L');
    $pdf->Cell(65,5,utf8_decode(''),'T',0,'L');    
    $pdf->Cell(20,5,utf8_decode(''),'T',0,'L');    
    $pdf->Cell(25,5,utf8_decode(''),'T',0,'L');    

    $pdf->Ln(4);
    
    $pdf->Ln();

    



    $pdf->Output("I","Recibo.pdf",true);

?>