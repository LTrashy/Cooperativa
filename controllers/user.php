<?php
include_once 'models/personamodel.php';
class User extends SessionController{
    
    private $user;
    private $persona;

    function __construct()
    {
        parent::__construct();
        $this->user = $this->getUserSessionData()['user'];
        $this->persona = new PersonaModel();
        error_log('User::construct -> inicio User');
    }

    function render()
    {
        $this->persona->get($this->user->getIdPersona());
        $this->view->render('user/index', [
            'user' => $this->user,
            'persona' => $this->persona,
        ]);
    }

    function updateData()
    {
        if(!$this->existPOST(['nombre', 'direccion', 'telefono', 'email', 'birthDate'])){
            $this->redirect('user', ['errors' => Errors::ERROR_USER_UPDATEDATA]); // ERROR
            return;
        }

        $nombre = $this->getPost('nombre');
        $direccion = $this->getPost('direccion');
        $telefono = $this->getPost('telefono');
        $email = $this->getPost('email');
        $birthDate = $this->getPost('birthDate');

        if(empty($nombre) || is_numeric($nombre) || $nombre == null){
            $this->redirect('user', ['errors' => Errors::ERROR_USER_UPDATEDATA_EMPTY]);// error
            return;
        }

        if(empty($direccion) || $direccion == null){
            $this->redirect('user', ['errors' => Errors::ERROR_USER_UPDATEDATA_EMPTY]);// error
            return;
        }
        
        if(empty($telefono) || $telefono == 0 || $telefono < 0){
            $this->redirect('user', ['errors' => Errors::ERROR_USER_UPDATEDATA_EMPTY]);// error
            return;
        }

        if(empty($email) || $email == null){
            $this->redirect('user', ['errors' => Errors::ERROR_USER_UPDATEDATA_EMPTY]);// error
            return;
        }

        if(empty($birthDate) || $birthDate == null){
            $this->redirect('user', ['errors' => Errors::ERROR_USER_UPDATEDATA_EMPTY]);// error
            return;
        }
        
        $this->persona->setId($this->user->getIdPersona());
        $this->persona->setNombre($nombre);
        $this->persona->setDireccion($direccion);
        $this->persona->setTelefono($telefono);
        $this->persona->setEmail($email);
        $this->persona->setBirthDate($birthDate);

        if($this->persona->update()){
            $this->redirect('user', ['success' => Success::SUCCESS_USER_UPDATEDATA]); // success
            return;
        }else{
            $this->redirect('user', ['errors' => Errors::ERROR_USER_UPDATEDATA]); // errors
            return;
        }

    }

    function updateUsername()
    {
        if(!$this->existPOST('username')){
            $this->redirect('user',['errors' => Errors::ERROR_USER_UPDATEUSER]);// error
            return;
        }

        $username = $this->getPost('username');

        if(empty($username)){
            $this->redirect('user', ['errors' => Errors::ERROR_USER_UPDATEUSER_EMPTY]); // ERRORS
            return;
        }

        $this->user->setUsername($username);

        if($this->user->update()){
            $this->redirect('user', ['success' => Success::SUCCESS_USER_UPDATEUSER]); // success
            return;
        }else{
            $this->redirect('user',['errors' => Errors::ERROR_USER_UPDATEUSER]);// error
            return;
        }

    }

    function changePass()
    {
        if(!$this->existPOST(['current_password', 'new_password'])){
            $this->redirect('user', ['errors' => Errors::ERROR_USER_UPDATEPASSWORD]);// errors
            return;
        }

        $current = $this->getPost('current_password');
        $new = $this->getPost('new_password');

        if(empty($current) || empty($new)){
            $this->redirect('user', ['errors' => Errors::ERROR_USER_UPDATEPASSWORD_EMPTY]);// errors
            return;
        }

        if($current === $new){
            $this->redirect('user', ['errors' => Errors::ERROR_USER_UPDATEPASSWORD_ISNOTTHESAME]);// errors
            return;
        }

        $newHash = $this->model->comparePasswords($current, $this->user->getId());
        if($newHash){
            $this->user->setPassword($new);

            if($this->user->update()){
                $this->redirect('user', ['success' => Success::SUCCESS_USER_UPDATEPASSWORD]);// success
                return;
            }else{
                $this->redirect('user', ['errors' => Errors::ERROR_USER_UPDATEPASSWORD]);// errors
                return;
            }
        }else{
            $this->redirect('user', ['errors' => Errors::ERROR_USER_UPDATEPASSWORD]);// errors
            return;
        }


    }
}