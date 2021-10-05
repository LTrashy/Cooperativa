<?php
    class Nuevoas extends Controller{
        function __construct(){
            parent::__construct();
            $this->view->mensaje = "";
        }

        function render(){
            $this->view->render('nuevoas/index');
        }

        function registrarAsociado(){
            $id_persona = $_POST['id_persona'];
            $nombre = $_POST['nombre'];
            $direccion = $_POST['direccion'];
            $telefono = $_POST['telefono'];
            $email = $_POST['email'];
            $birth_date = $_POST['birth_date'];
            $id_asociado = $_POST['id_asociado'];
            $create_time = $_POST['create_time'];
            $total_aportes = $_POST['total_aportes'];

            $mensaje ="";

            if($this->model->insertPersona(['id_persona' => $id_persona,
                                            'nombre' => $nombre,
                                            'direccion' => $direccion,
                                            'telefono' => $telefono,
                                            'email' => $email,
                                            'birth_date' => $birth_date])
               && $this->model->insertAsociado(['id_asociado' => $id_asociado,
                                                'id_persona' => $id_persona,
                                                'create_time' => $create_time,
                                                'total_aportes' => $total_aportes])){

                $mensaje = "Nuevo Asociado creado con exito";                                                    

            }else{
                $mensaje = "Asociado ya existe";
            }

            $this->view->mensaje = $mensaje;
            $this->render();
            
        }
    }