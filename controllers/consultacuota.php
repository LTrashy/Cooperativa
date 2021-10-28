    <?php
        include_once 'models/consultacreditomodel.php';
        include_once 'generarpdf.php';
        include_once 'models/pdf.php';
        class consultacuota extends Controller{
            function __construct(){
                parent::__construct();
                $this->view->cuotas=[];
                

            }
            function render(){
                $this->view->mensaje="";
                $this->view->render();
            }

            function verCuota($param = null){
                $cuota = $this->model->getById($param[0]);
                // var_dump($cuota);
                // die();
                session_start();
                $_SESSION['id_cu'] = $param[0];
                $this->view->cuota = $cuota;
                $this->view->mensaje="";
                $this->view->render('consultacredito/pagarcuota');
            }
            function pagarCuota(){
                $modelcred = new consultacreditoModel();
                session_start();
                $id_cuota = $_SESSION['id_cu'];
                $saldo_cuota = $_POST['valor_cuota'];
                $fecha_pago = $_POST['fecha_pago'];
                

                $cuota = $this->model->getById($id_cuota);
                $credito = $modelcred->getById($cuota->id_credito);
                $dia_pago = date("Y-m-d", strtotime($cuota->fecha_proyeccion. "+ 1 month"));
                $saldo_credito = $credito->saldo;
                // var_dump($cuota);
                // die();
                $interes_mora =0;
                
                if($fecha_pago > $cuota->fecha_proyeccion){
                    $fechapa = new DateTime($fecha_pago);
                    $fechapro = new DateTime($cuota->fecha_proyeccion);
                    $difdia = $fechapa->diff($fechapro);                    
                    $interes_mora = (($credito->tasa_mora/100)*$cuota->saldo_cuota)*$difdia->days;
                    $saldo_cuota_nuevo = $cuota->saldo_cuota + $interes_mora - $saldo_cuota;
                    $saldo_credito += $saldo_cuota_nuevo - $saldo_cuota;
                    if($this->model->update([
                                    'id_cuota' => $id_cuota,
                                    'interes_mora' => $interes_mora,
                                    'fecha_pago' => $fecha_pago,
                                    'saldo_cuota' => $saldo_cuota_nuevo,
                                    'dia_pago' => $dia_pago,
                                    'saldo' => $saldo_credito])){
                                        $this->view->mensaje ="Tiene un saldo de mora pendiente";
                                    }else{
                                        $this->view->mensaje ="ERror al pagar";
                                    }
                    
                }else{
                    $saldo_cuota_nuevo = $cuota->saldo_cuota - $saldo_cuota;
                    $saldo_credito += $saldo_cuota_nuevo - $saldo_cuota;
                    if($this->model->update([
                        'id_cuota' => $id_cuota,
                        'interes_mora' => $interes_mora,
                        'fecha_pago' => $fecha_pago,
                        'saldo_cuota' => $saldo_cuota_nuevo,
                        'dia_pago' => $dia_pago,
                        'saldo' => $saldo_credito])){
                            $this->view->mensaje ="Cuota pagada Correctamente";
                        }else{
                            $this->view->mensaje ="Error en el pago";
                        }
                }

                $cuotaa = new Cuota();
                $cuotaa->num_cuota = $cuota->num_cuota;
                $cuotaa->saldo_cuota = $saldo_cuota_nuevo;
                $this->view->cuota = $cuotaa;

                $this->view->render('consultacredito/pagarcuota');
            }

            function verCuotas($param = null){
                if(isset($param[0])){
                    $cuotas = $this->model->getByIdCuotas($param[0]);
                    $this->view->cuotas = $cuotas;

                    $pdf = new pdf();
                    $pdf->id = $param[0];
                    $this->view->pdf = $pdf;


                    $this->view->mensaje = "";
                    $this->view->render('consultacredito/cuota');
                    /*
                    include_once 'models/cuota.php';
                    foreach($this->view->cuotas as $row){
                        $cuota = new Cuota();
                        $cuota = $row;

                        echo '<td>'.$cuota->num_cuota. '</td>';
                        echo '<td>'.$cuota->fecha_proyeccion. '</td>';
                        echo '<td>'.$cuota->abono_capital. '</td>';
                        echo '<td>'.$cuota->interes_corriente. '</td>';
                        echo '<td>'.$cuota->saldo_cuota. '</td>';
                        echo '<td>'.$cuota->fecha_pago. '</td>';
                        echo '<td>'.$cuota->interes_mora. '</td>';
                        echo '<td><a class="href" href="#">Pagar Cuota</a></td>';
                        echo '</tr>';
                    }
                    */
                }
            }
            
        }