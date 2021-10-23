    <?php
        include_once 'generarpdf.php';
        class consultacuota extends Controller{
            function __construct(){
                parent::__construct();
                $this->view->cuotas=[];
            }
            function render(){
                $this->view->mensaje="";
                $this->view->render('consultacredito/cuota');
            }
            function verCuotas($param = null){
                if(isset($param[0])){
                    $cuotas = $this->model->getByIdCuotas($param[0]);
                    $this->view->cuotas = $cuotas;

                    $genpdf = new generarpdf();
                    $genpdf->verPDF($param[0]);

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