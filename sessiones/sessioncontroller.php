<?php

require_once 'sessiones/session.php';
require_once 'sessiones/sessiondb.php';
require_once 'models/usermodel.php';
require_once 'models/relacionroleusermodel.php';

class SessionController extends Controller
{
    private $userSession;
    private $userName;
    private $userId;
    
    private $session;
    private $sites;
    
    private $user;
    private $userRole;
    public function __construct()
    {
        parent::__construct();
        $this->init();
    }

    function init()
    {
        $this->session = new Session();

        //$this->defaultSites = $this->getDefaultSites();
        $this->sites = $this->getAllSites();
        // var_dump($this->sites);
        // die();


        $this->validateSession();
    }



    private function getAllSites()
    {
        $modelSession = new SessionDb();
        $sites = $modelSession->getAllSites();

        return $sites;
    }


    public function validateSession()
    {
        error_log('SESSIONCONTROLLER::validateSession');
        // $role = $this->getUserSessionData();
        //     var_dump($role);
        //     die();
        if ($this->existsSession()){
            $role = $this->getUserSessionData()['role']['name_role'];
            // var_dump($role);
            // die();
            //validar si el acceso es publico
            if($this->isPublic()){
                // var_dump("a");
                // die();
                $this->redirectDefaultSiteByRole($role);
            }else{
                if($this->isAuthorized($role)){
                    //se deja pasar

                }else{
                    $this->redirectDefaultSiteByRole($role);
                }
            }
        } else {
            // var_dump($this->isPublic());
            // die();
            //no existe la sesion 
            if($this->isPublic()){
                //lo deja entrar
            }else{
                header('Location:' . constant('URL') . '');
            }

        }
    }

    function existsSession()
    {
        if(!$this->session->exists()) return false;
        if($this->session->getCurrentUser() == null) return false;

        $userId = $this->session->getCurrentUser();

        if($userId) return true;

        return false;
    }

    function getUserSessionData()
    {
        $id = $this->session->getCurrentUser();

        $this->user = new UserModel();
        $this->user->get($id);

        error_log('SESSIONCONTROLLER::getUSerSessionData -> ' . $this->user->getUsername());

        $this->userRole = new RelacionRoleUserModel();
        $role = $this->userRole->getRoleById($id);

        return [
            'role' => $role,
            'user' => $this->user,
        ];
    }
    
    

    function isPublic()
    {
        $currentURL = $this->getCurrentPage();
        // var_dump($currentURL);
        // die();
        $currentURL = preg_replace("/\?.*/", "", $currentURL);

      
        for($i = 0; $i < count($this->sites); $i++){
            
            if($currentURL == $this->sites[$i]["name_permiso"] && $this->sites[$i]["name_role"] == "public"){
                return true;
            }
            // var_dump($this->sites[$i]['public']);
            
        }
        // die();
        // var_dump($this->sites);
        // die();
        return false;
    }

    function getCurrentPage()
    {
        $actualLink = trim("$_SERVER[REQUEST_URI]");
        $url = explode('/', $actualLink);
        // var_dump($url);
        // die();
        error_log('SESSIONCONTROLLER::getCurrentPAge -> ' . $url[1]);
        return $url[1];
    }

    private function redirectDefaultSiteByRole($role)
    {
        $url = '';
        for($i = 0; $i < sizeof($this->sites); $i++){
            // var_dump($role);
            // var_dump($this->sites[$i]["name_role"]);
            if($this->sites[$i]["name_role"] == $role){
                $url = '/' . $this->sites[$i]['name_permiso'];
                //var_dump($this->sites[$i]['name_permiso']);
                break;
            }
        }
        // var_dump($url);
        // die();
        header('Location:'  . $url);
    }

    private function isAuthorized($role)
    {
        $currentURL = $this->getCurrentPage();
        $currentURL = preg_replace("/\?.*/", "", $currentURL);
        // var_dump($role['name_role']);
        // die();
        for($i = 0; $i < sizeof($this->sites); $i++){
            //var_dump($this->sites[$i]['name_role']);
            if($currentURL == $this->sites[$i]['name_permiso'] && $this->sites[$i]['name_role'] == $role){
                // var_dump("true");
                // die();    
                return true;
                }
        }
        // var_dump("false");
        // die();

        return false;       
    }

    function initialize($user)
    {
        // var_dump($user->getId());
        // die();
        $this->session->setCurrentUser($user->getId());
        $this->userRole = new RelacionRoleUserModel();
        $role = $this->userRole->getRoleById($user->getId());
        // var_dump($role['name_role']);
        // die();
        $this->authorizeAccess($role['name_role']);
    }

    function authorizeAccess($role)
    {
        switch($role){
            case 'user':
                $this->redirect('dashboard', []);
            break;
            case 'admin':
                $this->redirect('admin', []);
            break;
                 
        }
    }

    function logout()
    {
        $this->session->closeSession();
    }
}