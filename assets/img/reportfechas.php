<?php 
    # Conectar a la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "tarea";

    $conn = new mysqli($servername, $username, $password, $dbname);

    # Verificar la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    # Obtener fechas del formulario
    $fechaInicio = $_POST['fecha_inicio_vta_reporte'];
    $fechaFinal = $_POST['fecha_final_vta_reporte'];

    # Consultar la base de datos para obtener las ventas en el rango de fechas
    $sql = "SELECT venta.*, usuario.*
            FROM usuario
            INNER JOIN venta ON venta.idusrv = usuario.idu
                WHERE venta.fechvta BETWEEN '$fechaInicio' AND '$fechaFinal'
                ORDER BY venta.fechvta ASC";

    $datos = $conn->query($sql);

    session_start(['name'=>'SCA']);
    $idUsuario=$_SESSION['id_sca'];

    $sqlusuario = "SELECT usuario.idu, usuario.nomu, usuario.apu
                    FROM usuario 
                        WHERE usuario.idu='$idUsuario'";

    $datosUsuario = $conn->query($sqlusuario);

    $prev=null;

    #FPDF
    require "./fpdf.php"; 

    $pdf = new FPDF('P','mm','Letter');
    $pdf->SetMargins(17,17,17);
    $pdf->AddPage();
    $pdf->Image('../views/assets/img/ddelpz.png',15,17,30,35,'PNG');

    #Titulo DDE
    $pdf->SetFont('Arial','B',13);
    $pdf->SetTextColor(33,33,33);
    $pdf->Cell(185,8,utf8_decode('DIRECCIÓN DEPARTAMENTAL DE EDUCACIÓN LA PAZ'),0,0,'C');
    $pdf->Ln(10.5);

    #Titulo
    $pdf->SetFont('Arial','B',20);
    $pdf->SetTextColor(33,33,33);
    $pdf->Cell(185,8,utf8_decode('RECAUDACIÓN TOTAL'),0,0,'C');
    $pdf->Ln(10.5);

    #Fechas
    $pdf->SetFont('Arial','',13);
    $pdf->SetTextColor(33,33,33);
    $pdf->Cell(95,8,utf8_decode('Fecha inicial:'),0,0,'C');
    $pdf->SetTextColor(97,97,97);
    $pdf->Cell(-42,8,utf8_decode(date("d/m/Y", strtotime($fechaInicio))),0,0,'C');
    $pdf->SetTextColor(33,33,33);
    $pdf->Cell(115,8,utf8_decode('Fecha final:'),0,0,'C');
    $pdf->SetTextColor(97,97,97);
    $pdf->Cell(-65,8,utf8_decode(date("d/m/Y", strtotime($fechaFinal))),0,0,'C');
    $pdf->SetTextColor(33,33,33);
    $pdf->Ln(7);

    #Nro recibos
    $pdf->SetFont('Arial','',13);
    $pdf->SetTextColor(33,33,33);
    $pdf->Cell(97,8,utf8_decode('Nro recibo inicial: '),0,0,'C');
    $pdf->SetTextColor(97,97,97);
    $pdf->Cell(-38,8,utf8_decode('CV313-101'),0,0,'C');
    $pdf->SetTextColor(33,33,33);
    $pdf->Cell(106,8,utf8_decode('Nro recibo final: '),0,0,'C');
    $pdf->SetTextColor(97,97,97);
    $pdf->Cell(-50,8,utf8_decode('CV313-102'),0,0,'C');
    $pdf->SetTextColor(33,33,33);
    $pdf->Ln(9);


    while($row=$datosUsuario->fetch_assoc()){
        
        #Usuario
        $pdf->SetTextColor(33,33,33);
        $pdf->Cell(20,8,utf8_decode('Usuario:'),"",0,0);
        $pdf->SetTextColor(97,97,97);
        $pdf->Cell(10,8,utf8_decode($row['nomu']." ".$row['apu']),0,0);
        $pdf->Ln(8);

        $total=0;
        $total_cant=0;

        while($rows = $datos->fetch_assoc()){

            $cod=$rows['codvta'];
            $pdf->Ln(1);

            $totvta=$rows['totvta'];

            $sqldetalledelal = "SELECT venta.codvta, detallevta.codvtaf, arancel.idarn, detallevta.idarnfdv, venta.fechvta, arancel.ctga
            FROM detallevta
            INNER JOIN venta ON venta.codvta = detallevta.codvtaf
            INNER JOIN arancel ON arancel.idarn = detallevta.idarnfdv
                WHERE venta.codvta='$cod'
                ORDER BY venta.fechvta ASC";

            $datodelal = $conn->query($sqldetalledelal);
            
            if($cod != $prev){

                #Codigo de venta
                $pdf->SetFont('Arial','',13);
                $pdf->SetTextColor(33,33,33);
                $pdf->Cell(155,10,utf8_decode('Nro de recibo:'),0,0,'C');
                $pdf->SetTextColor(97,97,97);
                $pdf->Cell(-100,10,utf8_decode($cod),0,0,'C');
                $pdf->Ln(10);

                if($col=mysqli_fetch_assoc($datodelal)){
                    $ctga=$col['ctga'];
                    if($ctga==1){
                        $pdf->SetFillColor(38,198,208);
                        $pdf->SetDrawColor(38,198,208);
                        $pdf->SetTextColor(33,33,33);
                        $pdf->SetFont('Arial','',8);
                        $pdf->Cell(10,5,utf8_decode('Código'),1,0,'L',true);
                        $pdf->SetFont('Arial','',8.5);
                        $pdf->Cell(107,5,utf8_decode('Descripción'),1,0,'L',true);
                        $pdf->Cell(10,5,utf8_decode('Del'),1,0,'L',true);
                        $pdf->Cell(10,5,utf8_decode('Al'),1,0,'L',true);
                        $pdf->Cell(13,5,utf8_decode('Cantidad'),1,0,'L',true);
                        $pdf->Cell(12,5,utf8_decode('P.U.'),1,0,'L',true);
                        $pdf->Cell(19,5,utf8_decode('Importe'),1,0,'L',true);
                        $pdf->Ln(5);
                    }else if($ctga==2 || $ctga==3){
                        $pdf->SetFillColor(38,198,208);
                        $pdf->SetDrawColor(38,198,208);
                        $pdf->SetTextColor(33,33,33);
                        $pdf->SetFont('Arial','',8);
                        $pdf->Cell(10,5,utf8_decode('Código'),1,0,'L',true);
                        $pdf->SetFont('Arial','',8.5);
                        $pdf->Cell(127,5,utf8_decode('Descripción'),1,0,'L',true);
                        $pdf->Cell(13,5,utf8_decode('Cantidad'),1,0,'L',true);
                        $pdf->Cell(12,5,utf8_decode('P.U.'),1,0,'L',true);
                        $pdf->Cell(19,5,utf8_decode('Importe'),1,0,'L',true);
                        $pdf->Ln(5);
                    }
                }
            }

            $sqldetalle = "SELECT detallevta.idarnfdv, arancel.idarn, detallevta.codvtaf, venta.codvta, venta.fechvta, detallevta.precudv, detallevta.cantdv, detallevta.descdv, detallevta.ndeldv, detallevta.naldv, arancel.codad, detallevta.descripdv
            FROM detallevta 
                INNER JOIN arancel ON detallevta.idarnfdv=arancel.idarn 
                INNER JOIN venta ON detallevta.codvtaf=venta.codvta 
                    WHERE venta.fechvta BETWEEN '$fechaInicio' AND '$fechaFinal'
                    AND venta.codvta='$cod'
                    ORDER BY venta.fechvta ASC";

            $datosdetalle=$conn->query($sqldetalle);

            while($detalle=$datosdetalle->fetch_assoc()){

                $subtotal=($detalle['precudv']*$detalle['cantdv'])-$detalle['descdv'];
                $subtotal=number_format($subtotal,2,'.','');
                
                if($detalle['ndeldv']!=0 || $detalle['naldv']!=0){
                    $pdf->Cell(10,5,utf8_decode($detalle['codad']),'L',0,'L');
                    $pdf->SetFont('Arial','',7);
                    $pdf->Cell(107,5,utf8_decode(mb_substr($detalle['descripdv'],0,70)),'L',0,'L');
                    $pdf->SetFont('Arial','',8);
                    $pdf->Cell(10,5,utf8_decode($detalle['ndeldv']),'L',0,'L');
                    $pdf->Cell(10,5,utf8_decode($detalle['naldv']),'L',0,'L');
                    $pdf->Cell(13,5,utf8_decode($detalle['cantdv']),'L',0,'L');
                    $pdf->Cell(12,5,utf8_decode($detalle['precudv']),'L',0,'L');    
                    $pdf->Cell(19,5,utf8_decode('Bs. '.$subtotal),'LR',0,'L');
                }else if($detalle['ndeldv']==0 || $detalle['naldv']==0){
                    $pdf->Cell(10,5,utf8_decode($detalle['codad']),'L',0,'L');
                    $pdf->SetFont('Arial','',7);
                    $pdf->Cell(127,5,utf8_decode(mb_substr($detalle['descripdv'],0,83)),'L',0,'L');
                    $pdf->SetFont('Arial','',8);
                    $pdf->Cell(13,5,utf8_decode($detalle['cantdv']),'L',0,'L');
                    $pdf->Cell(12,5,utf8_decode($detalle['precudv']),'L',0,'L');    
                    $pdf->Cell(19,5,utf8_decode('Bs. '.$subtotal),'LR',0,'L');
                }
                
                $total+=$subtotal;
                $total_cant+=$detalle['cantdv'];
                $pdf->Ln();
            }
            
            #Totalventa
            $pdf->SetFont('Arial','',10);
            $pdf->Cell(10,5,utf8_decode(''),'T',0,'L');
            $pdf->Cell(107,5,utf8_decode(''),'T',0,'C');
            $pdf->Cell(7,5,utf8_decode(''),'T',0,'L');
            $pdf->Cell(5,5,utf8_decode(''),'T',0,'L');
            $pdf->Cell(18,5,utf8_decode('MONTO TOTAL: '),'T',0,'L');
            $pdf->Cell(11,5,utf8_decode(''),'T',0,'L');    
            $pdf->Cell(23,5,utf8_decode('Bs. '.number_format($totvta,2,'.','')),'T',0,'L');
                      
            $prev=$cod;
            $pdf->Ln(7);
        }

        $pdf->Ln(5);
        $pdf->Ln(5);
        
        $pdf->SetFont('Arial','',15);
        $pdf->SetTextColor(0,0,0);
        $pdf->SetFillColor(0,0,0);
        $pdf->SetDrawColor(255,255,255);
        $pdf->Cell(10,6,utf8_decode(''),'B',0,'C');
        $pdf->Cell(10,6,utf8_decode(''),'B',0,'L');
        $pdf->Cell(10,6,utf8_decode(''),'B',0,'C');
        $pdf->Cell(13,6,utf8_decode(''),'B',0,'C');
        $pdf->Cell(7,6,utf8_decode(''),'B',0,'R');
        $pdf->SetDrawColor(0,0,0);
        $pdf->Cell(100,6,utf8_decode('TOTAL GENERAL DE RECAUDACIÓN'),'B',0,'L');
        $pdf->Cell(31,6,utf8_decode('Bs. '.number_format($total,2,'.','')),'B',0,'C');
        
        $pdf->Ln();

    }

    $pdf->Output("I","Recibo.pdf",true);

?>