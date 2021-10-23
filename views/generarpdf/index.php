<?php
    $credito = $this->credito;
    $asociado = $this->asociado;
    $cuotas = $this->cuotas;
    // var_dump($asociado);
    // die();
    $headers='<h1>Copp</h1>';
    $html='
        
        <div style="font-family: Arial, Helvetica, sans-serif; background-color: rgba(194, 201, 240, 0.973);  padding: 10px;">
        <h1 style="text-align: center; ">Cooperativa</h1>
        <h3>'.$asociado->nombre.'</h3> 
        <h3>'.$asociado->cedula.'</h3> 
        <h3>'.$asociado->email.'</h3>
        <h3>'.$asociado->direccion.'</h3>
        <h3>'.$asociado->telefono.'</h3>
        
        <p>
            <table>
                <thead>
                    <tr>
                        <th>Valor del credito</th>
                        <th>Numero de cuotas</th>
                        <th>Tasa interes %</th>
                        <th>Valor de la cuota</th>
                        <th>Saldo</th>
                        <th>Fecha estimada de pago</th>
                    </tr>
                </thead>
                <tbody >
                    <tr>
                        <td style="text-aling:center;">'.$credito->valor_credito.'</td>
                        <td style="text-aling:center;">'.$credito->nro_cuotas.'</td>
                        <td style="text-aling:center;">'.$credito->tasa_interes.'</td>
                        <td style="text-aling:center;">'.$credito->valor_cuota.'</td>
                        <td style="text-aling:center;">'.$credito->saldo.'</td>
                        <td style="text-aling:center;">'.$credito->dia_pago.'</td>
                    </tr>
                </tbody>
            </table>
        </p>
        

        </div>
        ';
        require_once 'vendor/autoload.php';
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->writeHTMLHeaders('<div style="text-align: center; font-weight: bold;">cOPP</div>');
        $mpdf->WriteHTML($html);
        $mpdf->Output();
        //$mpdf->Output($this->asociado->cedula.".pdf",'D');
        
    ?>

