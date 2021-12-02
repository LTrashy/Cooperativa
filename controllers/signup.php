<?php
include_once 'models/personamodel.php';
include_once 'models/usermodel.php';
include_once 'models/asociadomodel.php';
include_once 'models/relacionroleusermodel.php';

class Signup extends SessionController{

    function __construct()
    {
        error_log('Singup::Construct -> inicio signup');
        parent::__construct();
    }

    function render()
    {
        error_log('Singup::render -> render signup');
        $this->view->render('login/signup', []); 
    }

    function newUser()
    {
        if($this->existPOST(['username', 'cedula', 'password'])){
            $username = $this->getPost('username');
            $cedula = $this->getPost('cedula');
            $password = $this->getPost('password');
            $createTime = date('Y-m-d');

            if(empty($username) || empty($cedula) || empty($password)){
                error_log('Singup::newUser -> campos vacios');
                $this->redirect('signup', ['errors' => Errors::ERROR_SIGNUP_NEWUSER_EMPTY]); 
            }
            $personaModel = new PersonaModel();
            $personaModel->setCedula($cedula);
            
            $userModel = new UserModel();
            //$userModel->setIdPersona($personaModel->getId());
            $userModel->setUsername($username);
            $userModel->setPassword($password);
            $userModel->setCreateTime($createTime);

            $asociadoModel = new AsociadoModel();

            $relacionRoleUser = new RelacionRoleUserModel();

            if($userModel->exists($username)){
                error_log('Singup::newUser -> username ya existe');
                $this->redirect('signup', ['errors' => Errors::ERROR_SIGNUP_NEWUSER_EXISTS]); 
            }else if($personaModel->save()){
                $userModel->setIdPersona($personaModel->getId());
                $asociadoModel->setIdPersona($personaModel->getId());
                
                if($userModel->save() && $asociadoModel->save()){
                    $relacionRoleUser->setIdUser($userModel->getId());
                    $relacionRoleUser->save();
                    $this->redirect('', ['success' => Success::SUCCESS_SIGNUP_NEWUSER]); 
                }else{
                    $this->redirect('signup', ['errors' => Errors::ERROR_SIGNUP_NEWUSER]); // ERROR
                }
            }else{
                $this->redirect('signup', ['errors' => Errors::ERROR_SIGNUP_NEWUSER]); // ERROR
            }
            //$idPersona = $personaModel->save();

        }else{
            $this->redirect('signup', ['errors' => Errors::ERROR_SIGNUP_NEWUSER]); // ERROR
        }
    }
}
?>