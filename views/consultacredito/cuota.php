<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cuota</title>
</head>
<body>
    <?php require 'views/header.php';?>
    <div class="main">
        <h1 class="center">Pagar Cuotas</h1><br>
        <div class="center"><?php echo $this->mensaje;?></div>
        
        
            <table width="100%" class="table">
                <thead>
                    <tr>
                        <th>Cuota #</th>
                        <th>Fecha Estimada</th>
                        <th>Abono a capital</th>
                        <th>Valor del interes</th>
                        <th>Saldo a pagar</th>
                        <th>Fecha del Pago</th>
                        <th>Mora Saldo</th>
                        <th>!</th>
                        
                    </tr>
                </thead>
                <tbody id="tbody-cuotas">
                    <?php
                        //var_dump($this->pdf);
                        include_once 'models/cuota.php';
                        foreach($this->cuotas as $row){
                            $cuota = new Cuota();
                            $cuota = $row;
                    ?>
                        <tr>
                            <td data-titulo="Cuota Numero: "><?php echo $cuota->num_cuota;?></td>
                            <td data-titulo="Fecha estimada de pago"><?php echo $cuota->fecha_proyeccion;?> </td>
                            <td data-titulo="Abono a capital"><?php echo $cuota->abono_capital;?></td>
                            <td data-titulo="Pago de interes"><?php echo $cuota->interes_corriente;?></td>
                            <td data-titulo="Saldo de la cuota"><?php echo $cuota->saldo_cuota;?></td>
                            <td data-titulo="Fecha del pago"><?php echo $cuota->fecha_pago;?></td>
                            <td data-titulo="Interes por mora"><?php echo $cuota->interes_mora;?></td>
                            <td class="center"><a class="href" href="<?php echo constant('URL').'consultacuota/verCuota/'.$cuota->id_cuota;?>">Pagar Cuota</a></td>
                        </tr>
                    <?php } ?>  
                </tbody>
            </table>
            <p class="center">
                <br><a class="href" href="<?php echo constant('URL').'generarpdf/verPDF/'.$this->pdf->id;?>">Generar PDF</a>
            </p>
        
        
    </div>
    <?php require 'views/footer.php';?>
    
</body>
</html>