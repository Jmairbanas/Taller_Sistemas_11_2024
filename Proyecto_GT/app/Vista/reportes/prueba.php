<?php
require_once('tcpdf/tcpdf.php');
require_once('config.php');
date_default_timezone_set('America/Bogota');

ob_end_clean;

class MYPDF extends TCPDF{
    public function Header(){
        $bMargin = $this->getBreakMargin();
        $auto_page_break = $this->AutoPageBreak;
        $this->SetAutoPageBreak(false,0);
        $img_file = dir(__FILE__).'../../../public/imagenes/Colegio-Piloto-Logo_Blanco.png';
        $this->Image($img_file,85,8,20,25,'','','',false,30,'',false,false,0);
        $this->SetAutoPageBreak($auto_page_break, $bMargin);
        $this->setPageMark();
    }
}

//Se inicia un nuevo pdf.

$reporte /*$pdf*/ = new MYPDF (PDF_PAGE_ORIENTATION, 'mm', 'letter', true, 'UTF-8', false);

//Establecer margenes del pdf

$reporte->SetMargins(20,35,25);
$reporte->SetHeaderMargin(20);
$reporte->SetPrintFooter(false);
$reporte->SetPrintHeader(true);
$reporte->SetAutoPageBreak(true, PDF_MARGIN_BOTTOM);

//Información del PDF

$reporte->SetCreator('Taller de Sistemas JT');
$reporte->SetAutor('Taller de Sistemas JT');
$reporte->SetTitle('Informe Usuarios');

//


?>