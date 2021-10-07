<?php
    class Consultaas extends Controller{
        function __construct(){
            parent::__construct();
            $this->view->asociados = [];
        }

        function render(){
            $asociados = $this->model->get();
            $this->view->asociados = $asociados;
            $this->view->mensaje="";
            $this->view->render('consultaas/index');
        }

        function verAsociado($param = null){
            $idAsociado = $param[0];
            $asociado = $this->model->getById($idAsociado);

            session_start();
            $asociado->id_persona = $idAsociado;
            $_SESSION['id_as'] = $asociado->id_persona;
            $this->view->asociado = $asociado;
            $this->view->mensaje="";
            $this->view->render('consultaas/detalle');
        }

        function actualizarAsociado(){
            session_start();
            $id_persona = $_SESSION['id_as'];

            $cedula = $_POST['cedula'];
            $nombre = $_POST['nombre'];
            $direccion = $_POST['direccion'];
            $telefono = $_POST['telefono'];
            $email= $_POST['email'];
            $birth_date = $_POST['birth_date'];

            

            if($this->model->update(['id_persona' => $id_persona,
                                     'cedula' => $cedula,
                                     'nombre' => $nombre,
                                     'direccion' => $direccion,
                                     'telefono' => $telefono,
                                     'email' => $email,
                                     'birth_date' => $birth_date ])){
                $asociado = new Asociado();
                $asociado->cedula = $cedula;
                $asociado->nombre = $nombre; 
                $asociado->direccion = $direccion; 
                $asociado->telefono = $telefono; 
                $asociado->email = $email; 
                $asociado->birth_date = $birth_date; 

                $this->view->asociado = $asociado;
                $this->view->mensaje ="Asociado actualizado con exito";
            }else{
                $this->view->mensaje ="Asociado no se pudo Actualizar";
            }
            $this->view->render('consultaas/detalle');
        }

        function eliminarAsociado($param = null){
            $id_persona = $param[0];
            
            if($this->model->delete($id_persona)){
                $mensaje = "Asociado eliminado con exito";
            }else{
                $mensaje = "Asociado no se pudo eliminar";
            }
            echo $mensaje;
        }

        
    }
