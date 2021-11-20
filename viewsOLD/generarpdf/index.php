<?php
    require_once 'vendor/autoload.php';
    require_once 'plantilla.php';
    //$css = file_get_contents('public/css/pdf.css');
    
    // var_dump($asociado);
    // die();
    
        $mpdf = new \Mpdf\Mpdf([
            "format" => "Legal"
        ]);
        $credito = $this->credito;
        $asociado = $this->asociado;
        $cuotas = $this->cuotas;

        //$plantilla = getPlantilla($credito,$asociado,$cuotas);
        $mpdf->WriteHTML(file_get_contents('public/css/pdf.css'), \Mpdf\HTMLParserMode::HEADER_CSS);
        $mpdf->WriteHTML(getPlantilla($credito,$asociado,$cuotas), \Mpdf\HTMLParserMode::HTML_BODY);
        //$mpdf->Output();
        $mpdf->Output($this->asociado->cedula.".pdf",'I');
        
    ?>

