<?php
            require_once __DIR__. '/vendor/autoload.php';
            $mpdf = new \Mpdf\Mpdf();
            $mpdf->WriteHTML('<H1>MAMA PINGO</H1>');