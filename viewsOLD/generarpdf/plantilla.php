<?php


function getPlantilla($credito,$asociado,$cuotas){
    
    setlocale(LC_MONETARY,"en_US");

    $plantilla='<body>
                    <header class="clearfix">
                        <div id="logo">
                            <img src="public/acces/images/icono.png" width="120px" heigth="120px">
                        </div>
                        <div id="company">
                            <h2 class="name">Cooperativa XD</h2>
                            <div>Bogotá, Colombia</div>
                            <div>320-884-9623</div>
                         <div><a href="mailto:company@example.com">company@example.com</a></div>
                        </div>
                    </header>
                    <main>
                        <div id="details">
                            <div id="client">
                                <div class="to">Extracto de Credito para:</div>
                                <h2 class="name">'.$asociado->nombre.'</h2>
                                <div class="email"><a href="mailto:"'.$asociado->email.'"">'.$asociado->email.'</a></div>
                                <div class="address">'.$asociado->direccion.'</div>
                                <div class="telefono">'.$asociado->telefono.'</div>
                            </div>
                            <div id="invoice">
                                <h1>Credito #'.$credito->id_credito.'</h1>
                                <div class="date">Fecha del Extracto: '.date('Y-m-d').'</div>
                                <div class="pago">Dia proximo PAGO: '.$credito->dia_pago.'</div>
                            </div>
                        </div>
                        <table border="0" cellspacing="0" cellpadding="0">
                            <thead>
                            <tr>
                                <th class="no">Valor Credito</th>
                                <th class="desc">Numero Cuotas</th>
                                <th class="unit">Tasa del Interes</th>
                                <th class="qty">Valor Cuota Fija</th>
                                <th class="total">Saldo</th>
                            </tr>
                            </thead>
                            <tbody>
                            
                            <tr>
                                <td class="no">'.number_format($credito->valor_credito,0,',','.').'</td>
                                <td class="desc">'.$credito->nro_cuotas.'</td>
                                <td class="unit">'.$credito->tasa_interes.' %</td>
                                <td class="qty">'.number_format($credito->valor_cuota,3,',','.').'</td>
                                <td class="total">'.number_format($credito->saldo,3,',','.').'</td>
                            </tr>
                            
                            </tbody>
                            
                        </table>
                        <div id="thanks">Listado de cuotas del credito</div>

                        <table border="0" cellspacing="0" cellpadding="0">
                            <thead>
                                <tr>
                                    <th class="no">Cuota #</th>
                                    <th class="desc">Fecha Estimada de pago</th>
                                    <th class="unit">Abono a capital</th>
                                    <th class="qty">Valor del interes</th>
                                    <th class="unit">Interes por mora</th>
                                    <th class="total">Saldo de la cuota</th>
                                </tr>
                            </thead>
                            <tbody>';
                            include_once 'models/cuota.php';
                            foreach($cuotas as $row){
                                $cuota = new Cuota();
                                $cuota = $row;
                                $plantilla .='<tr>
                                                <td class="no">'.$cuota->num_cuota.'</td>
                                                <td class="desc">'.$cuota->fecha_proyeccion.'</td>
                                                <td class="unit">'.number_format($cuota->abono_capital,3,',','.').'</td>
                                                <td class="qty">'.number_format($cuota->interes_corriente,3,',','.').'</td>
                                                <td class="unit">'.number_format($cuota->interes_mora,3,',','.').'</td>
                                                <td class="total">'.number_format($cuota->saldo_cuota,3,',','.').'</td>
                                            </tr>';
                            }


                            
                    $plantilla .='</tbody>
                            
                        </table>
                        
                        <div id="notices">
                            <div>NOTICIA:</div>
                            <div class="notice">Se cobrara la tasa por mora del 3% mensual por cada dia que pasa de la Fecha de pago estimada</div>
                        </div>
                    </main>
                    <footer>
                    coop
                    </footer>
                </body>';

            return $plantilla;
    }