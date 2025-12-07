<?php
require_once('../../vendor/autoload.php');
require_once('../../view/config/dbconect.php');
require_once('../../model/modelinscripciones.php'); 

use Dompdf\Dompdf;
use Dompdf\Options;

// ⿡ Validar ID
if (!isset($_GET['id'])) {
    die("ID no proporcionado.");
}

$id = intval($_GET['id']);

// ⿢ Instanciar modelo
$model = new Modelo();

// ⿣ Consultar datos reales de la inscripción
$datos = $model->mostrar("inscripcions", "inscripcions.id = $id");

// Validación
if (!$datos || count($datos) == 0) {
    die("No se encontró la inscripción.");
}

// ⿤ Convertir datos
$d = $datos[0];

// Variables seguras
$estudiante     = $d['nombres'] ?? '';
$apellido       = $d['apellidos'] ?? '';
$ci             = $d['ci'] ?? '';
$carrera        = $d['carrera_nombre'] ?? '';
$semestre       = $d['semestre_nombre'] ?? '';
$turno          = $d['turno_nombre'] ?? '';
$direccion      = $d['direccion'] ?? '';
$celular        = $d['celular'] ?? '';
$numero         = $d['numero'] ?? '';
$fecha_nac      = $d['fecha'] ?? '';
$procedencia    = $d['procedencia'] ?? '';
$tipo_beca      = $d['tipo_beca'] ?? '';
$porcentaje     = $d['porcentaje'] ?? '';
$expediente     = $d['n_expediente'] ?? '';
$resolucion     = $d['n_resolucion'] ?? '';
$estado         = $d['estado'] ?? 'PENDIENTE';

// Fecha actual formateada
$fecha_formateada = date('d/m/Y H:i:s');
// Opciones Dompdf
$options = new Options();
$options->set('isHtml5ParserEnabled', true);
$options->set('isRemoteEnabled', true);
$dompdf = new Dompdf($options);

// Construcción del HTML con variables interpoladas
$html = "
<!DOCTYPE html>
<html lang='es'>
<head>
<meta charset='UTF-8'>
<meta name='viewport' content='width=device-width, initial-scale=1.0'>
<title>Formulario de Solicitud de Beca</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            color: #000;
            font-size: 10pt;
        }

        @page {
            size: legal;
            margin: 0.5in;
        }

        .page {
            width: 7.5in;
            margin: 0 auto;
            box-sizing: border-box;
            line-height: 1.3;
        }

        p {
            margin: 0 0 3px 0;
            font-size: 9.5pt;
            text-align: justify;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 5px;
            padding-bottom: 5px;
            border-bottom: 1px solid #000;
        }

        .header-left {
            width: 2in;
            min-width: 2in;
        }

        .logo-box {
            border: 1px solid #000;
            padding: 4px 8px;
            font-size: 16pt;
            font-weight: bold;
            display: inline-block;
            margin-bottom: 2px;
        }

        .num-box {
            font-size: 8pt;
            font-weight: bold;
        }

        .header-center {
            flex-grow: 1;
            text-align: center;
            padding: 0 10px;
            padding-top: 5px;
            font-size: 8pt;
        }

        .header-center .main-institute {
            font-size: 9pt;
            font-weight: bold;
            margin-bottom: 1px;
        }

        .form-title-box {
            text-align: center;
            margin-bottom: 12px;
        }

        .main-title {
            font-size: 11pt;
            font-weight: bold;
            margin: 3px 0;
        }

        .sub-sede {
            font-size: 8pt;
            margin-top: 3px;
            font-weight: bold;
        }

        .section-heading,
        .section-sub-heading {
            text-align: center;
            font-weight: bold;
            margin: 8px 0 6px 0;
            font-size: 10.5pt;
        }

        .article {
            margin-left: 20px;
            margin-bottom: 3px;
            line-height: 1.5;
        }

        .article-title {
            font-weight: bold;
        }

        .signatures-solicitud,
        .resolution-signatures {
            display: flex;
            justify-content: space-around;
            text-align: center;
            margin-top: 25px;
            font-size: 9pt;
        }

        .signature-box {
            border-top: 1px solid #000;
            padding-top: 5px;
            width: 30%;
            height: 40px;
            line-height: 1;
        }

        .note-solicitud {
            font-size: 7pt;
            margin-top: 15px;
        }

        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        table td {
            vertical-align: top;
            padding: 0 10px;
        }

        table td p.title {
            font-weight: bold;
            margin: 0;
        }
    </style>
</head>
<body>
<div class='page'>

<header class='header'>
    <div class='header-left'>
        <div class='logo-box'>UB</div>
        <p class='num-box'>Num. 00000262</p>
    </div>
    <div class='header-center'>
        <p class='main-institute'>UNIVERSIDAD UNIÓN BOLIVARIANA</p>
        <p>DIRECCIÓN DE BIENESTAR INSTITUCIONAL</p>
        <p>GESTIÓN 2 - 2025</p>
    </div>
    <div class='header-right-photo'></div>
</header>

<div class='form-title-box'>
    <h1 class='main-title'>FORMULARIO DE SOLICITUD DE BECA N.º{$numero}/ II - 2025</h1>
    <p class='sub-sede'>SUB SEDE EL ALTO</p>
</div>

<section class='data-section'>
    <p>SR. VICERRECTOR DE LA SUBSEDE EL ALTO M.Sc. MIGUEL ÁNGEL MEDINA RIVERO</p>
    <p>Yo {$estudiante} {$apellido}, mayor de edad y estudiante de {$semestre} la Carrera de {$carrera} de la Universidad Unión Boliviana Sub Sede El Alto, con C.I. N.º{$ci}</p>
    <p>Con domicilio en {$direccion} con celular N.º{$celular}</p>
    <p>Fecha El Alto, {$fecha_formateada} | Modalidad: {$turno} | Procedencia: {$procedencia}</p>
</section>

<section class='section'>
    <p class='section-heading'>EXPONGO</p>
    <p>Que, reúno todos los requisitos exigidos para participar en la Convocatoria de Becas convocada por la Dirección de Bienestar Institucional de la UB. Sub Sede El Alto, por el periodo de la Matrícula.</p>
</section>

<section class='section'>
    <p class='section-heading'>SOLICITO</p>
    <p>Ser admitido con la beca{$tipo_beca} siendo beneficiado con el descuento del {$porcentaje} % en esta gestión, adjunto la siguiente documentación:</p>
    <div class='list-container'>
        <p>a) Matrícula de inscripción</p>
        <p>b) Expediente académico</p>
        <p>c) Fotocopia de C.I.</p>
    </div>
</section>

<table width='100%' style='margin-top:50px; text-align:center; border-collapse:collapse;'>
<tr>
<td style='width:33%; vertical-align: top;'>
    <div style='border-top:1px solid #000; margin-bottom:5px; height:10px;'></div>
    <div>FIRMA BIENESTAR INSTITUCIONAL S-EA</div>
</td>
<td style='width:33%; vertical-align: top;'>
    <div style='border-top:1px solid #000; margin-bottom:5px; height:10px;'></div>
    <div>FIRMA ESTUDIANTE</div>
</td>
<td style='width:33%; vertical-align: top;'>
    <div style='border-top:1px solid #000; margin-bottom:5px; height:10px;'></div>
    <div>FIRMA VICERRECTOR UB S-EA</div>
</td>
</tr>
</table>

<p style='font-size:7pt; margin-top:15px;'>*Cualquier dato falso, podrá ser motivo de exclusión o en su caso de rescisión de la beca.</p>
 <section class='resolution-section'>
            <p class='section-sub-heading'>VISTO:</p>
            <p>El expediente N.º / II - 2025, Registro de Vicerrectorado; Reglamento de Becas de la Universidad Unión Boliviana.</p>

            <p class='section-sub-heading'>CONSIDERANDO:</p>
            <p>De acuerdo a su Estatuto Orgánico y Reglamento General; la Universidad Unión Boliviana es una institución social y de educación superior y, en uso de las atribuciones conferidas por la Ley de Educación, Reglamento de Becas de la UB, en cumplimiento al Reglamento de Universidades Privadas.</p>

            <p class='section-sub-heading'>POR TANTO:</p>
            <p>En sesión con el Directorio y el Vicerrector de la Universidad Unión Boliviana Sub Sede El Alto en uso de sus atribuciones</p>

            <p class='section-sub-heading'>RESUELVEN:</p>
            <p class='article'><span class='article-title'>Art. 1:</span> Conceder {$porcentaje}a el/la estudiante . $estudiante . ' ' . $apellido .  Debiendo cancelar su matrícula y el {$porcentaje}% de su colegiatura por el periodo de la matrícula.</p>
            <p class='article'><span class='article-title'>Art. 2:</span> Realizar el seguimiento académico al estudiante cuyo promedio general deberá ser superior a <strong>75 puntos</strong> como requisito para mantener su beca.</p>

            <p class='article-final'>Regístrese, comuníquese y archívese.</p>
        </section>

        <table>
            <tr>
                <td style='text-align:left;'>
                    <p><strong>DRA. WENDY FERNÁNDEZ DELGADILLO</strong></p>
                    <p class='title'>DIRECTOR(A) UNIVERSIDAD UNIÓN BOLIVIANA</p>
                </td>
                <td style='text-align:right;'>
                    <p><strong>M.Sc. MIGUEL ÁNGEL MEDINA RIVERO</strong></p>
                    <p class='title'>VICERRECTOR UNIVERSIDAD UNIÓN BOLIVIANA</p>
                    <p class='title'>SUB SEDE EL ALTO</p>
                </td>
            </tr>
        </table>

        <section class='final-note' style='font-size: 8.5pt; margin-top: 20px;'>
            <p style='font-weight: bold;'>NOTA:</p>
            <p>EL ESTUDIANTE BECADO ESTÁ EN LA OBLIGACIÓN DE *APOYAR EN TODAS LAS ACTIVIDADES INTERNAS Y EXTERNAS QUE DESARROLLE LA UB EL ALTO*, CONSIDERANDO LAS COMISIONES QUE LE ASIGNE LA DIRECCIÓN.</p>
            <p>LA PRESENTE BECA ES VÁLIDA SOLO PARA LAS MATERIAS DEL SEMESTRE QUE SE CURSE.</p>
        </section>
</div>
</body>
</html>
";

// Cargar HTML en Dompdf
$dompdf->loadHtml($html);

// Tamaño y orientación
$dompdf->setPaper('letter', 'portrait');

// Renderizar
$dompdf->render();

// Descargar
$filename = 'Validacion_Datos_' . $id . '.pdf';
$dompdf->stream($filename, ["Attachment" => true]);
exit;
?>