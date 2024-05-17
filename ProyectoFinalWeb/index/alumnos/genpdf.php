<?php
include '../../conn.php';
require('../../../fpdf.php');
include '../sesion.php';

$pdf=new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','I',10);

$sql = "SELECT materia, seccion, periodo, status_mater, creditos FROM kardex WHERE id_matricula=".$_SESSION["usuario"]." AND `status_mater` = 'En Curso'";

$pdf->Cell(40,10,utf8_decode('Materias cursando'));


    $result = $conn->query($sql);

    $pdf->Cell(120,10, $_SESSION["usuario"]);
    $pdf->Ln(20);
    
    $pdf->Cell(60,6,$row="Materia",1);
    $pdf->Cell(15,6,$row='seccion',1);
    $pdf->Cell(20,6,$row='periodo',1);
    $pdf->Cell(23,6,$row='status_mater',1);
    $pdf->Cell(15,6,$row='Creditos',1);
    $pdf->Ln(10);

    while($row = $result->fetch_assoc()){
        $pdf->Cell(60,6,$row['materia'],1);
        $pdf->Cell(15,6,$row['seccion'],1);
        $pdf->Cell(20,6,$row['periodo'],1);
        $pdf->Cell(23,6,$row['status_mater'],1);
        $pdf->Cell(15,6,$row['creditos'],1);
        $pdf->Ln(6);
    }

    $pdf->Cell(30,15,"",0,1,'C',0);



    $sql = "SELECT materia, seccion, periodo, status_mater, creditos FROM kardex WHERE id_matricula=".$_SESSION["usuario"]." AND `status_mater` = 'Aprobado'";

    $pdf->Cell(40,10,utf8_decode('Materias Aprobadas'));

    $result = $conn->query($sql);

    $pdf->Ln(20);
    
    $pdf->Cell(90,6,$row="Materia",1);
    $pdf->Cell(15,6,$row='seccion',1);
    $pdf->Cell(20,6,$row='periodo',1);
    $pdf->Cell(23,6,$row='status_mater',1);
    $pdf->Cell(15,6,$row='Creditos',1);
    $pdf->Ln(10);

    while($row = $result->fetch_assoc()){
        $pdf->Cell(90,6,$row['materia'],1);
        $pdf->Cell(15,6,$row['seccion'],1);
        $pdf->Cell(20,6,$row['periodo'],1);
        $pdf->Cell(23,6,$row['status_mater'],1);
        $pdf->Cell(15,6,$row['creditos'],1);
        $pdf->Ln(6);
    }

    $pdf->Cell(30,15,"",0,1,'C',0);
//-------

    $pdf->Output();
    ob_end_flush();
?>