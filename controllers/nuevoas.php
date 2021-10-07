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
            $cedula = $_POST['cedula'];
            $nombre = $_POST['nombre'];
            $direccion = $_POST['direccion'];
            $telefono = $_POST['telefono'];
            $email = $_POST['email'];
            $birth_date = $_POST['birth_date'];
            $create_time = $_POST['create_time'];
            $total_aportes = $_POST['total_aportes'];
            
            $mensaje ="";
            //var_dump($this);
            //die();
            $idPersona = $this->model->insertPersona(['cedula' => $cedula,
                                            'nombre' => $nombre,
                                            'direccion' => $direccion,
                                            'telefono' => $telefono,
                                            'email' => $email,
                                            'birth_date' => $birth_date]);
                                                       
            $idAsociado = $this->model->insertAsociado(['id_persona' => $idPersona,
                                                        'create_time' => $create_time,
                                                        'total_aportes' => $total_aportes]);
                                                                  
            if($idPersona && $idAsociado){

                $mensaje = "Nuevo Asociado creado con exito";                                                    

            }else{
                $mensaje = "Asociado ya existe";
            }

            $this->view->mensaje = $mensaje;
            $this->render();
            
        }
    }