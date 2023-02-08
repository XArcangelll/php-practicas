<?php

require_once "classes/session.php";
require_once "models/usermodel.php";
require_once "models/expensesmodel.php";
require_once "models/categoriesmodel.php";

class SessionController extends Controller{
    private $userSession;
    private $userName;
    private $userid;
    private $session;
    private $sites;
    private $defaultSites;
    private $user;

    public function __construct()
    {
        parent::__construct();
        $this->init();
    }

    public function init(){
        $this->session = new Session();
        $json = $this->getJSONFileConfig();
        $this->sites = $json["sites"];
        $this->defaultSites= $json["default-sites"];

        $this->validateSession();
    }

    private function getJSONFileConfig(){
        $string = file_get_contents("config/access.json");
        $json = json_decode($string,true);
        return $json;
    }

    public function validateSession(){
        error_log("SESSIONCONTROLLER::validateSession");
        //si existe la sesion
        if($this->existsSession()){
                $role = $this->getUserSessionData()->getRole();
                //si la pagina a entrar es publica
                if($this->isPublic()){
                    $this->redirectDefaultSiteByRole($role);
                    error_log( "SessionController::validateSession() => sitio público, redirige al main de cada rol" );
                }else{
                    if($this->isAuthorized($role)){
                        error_log( "SessionController::validateSession() => autorizado, lo deja pasar" );
                        //si el usuario está en una página de acuerdo
                        // a sus permisos termina el flujo
                    }else{
                        error_log( "SessionController::validateSession() => no autorizado, redirige al main de cada rol" );
                        // si el usuario no tiene permiso para estar en
                        // esa página lo redirije a la página de inicio
                        $this->redirectDefaultSiteByRole($role);
                    }
                }
        }else{
            //no existe la sesion
            if($this->isPublic()){
                //no pasa nada lo deja entrar
            }else{
                header("location: " .constant("URL") . "");
            }
        }
    }

    private function redirectDefaultSiteByRole($role){
        $url = '';
        for($i = 0; $i < sizeof($this->sites); $i++){
            if($this->sites[$i]['role'] === $role){
                $url = '/curso/expenses/'.$this->sites[$i]['site'];
            break;
            }
        }
        header('location: ' .$url);
        
    }

    function existsSession(){
        if(!$this->session->exists()) return false;
        if($this->session->getCurrentUser() == null) return false;

        $userid = $this->session->getCurrentUser();

        if($userid) return true;

        return false;
    }

    function getUserSessionData(){
        $id = $this->session->getCurrentUser();
        $this->user = new UserModel();
        $this->user->get($id);
        error_log("sessionController::getUserSessionData(): " . $this->user->getUsername());

        return $this->user;
    }

    private function isAuthorized($role){
        $currentURL = $this->getCurrentPage();
        $currentURL = preg_replace( "/\?.*/", "", $currentURL); //omitir get info
        
        for($i = 0; $i < sizeof($this->sites); $i++){
            if($currentURL === $this->sites[$i]['site'] && $this->sites[$i]['role'] === $role){
                return true;
            }
        }
        return false;
    }

    function isPublic(){
        $currentURL = $this->getCurrentPage();
        error_log("sessionController::isPublic(): currentURL => " . $currentURL);
        $currentURL = preg_replace( "/\?.*/", "", $currentURL);
        for($i = 0; $i < sizeof($this->sites); $i++){
            if($currentURL === $this->sites[$i]['site'] && $this->sites[$i]['access'] === 'public'){
                return true;
            }
        }
        return false;

    }

    private function getCurrentPage(){
        $actualLink = trim("$_SERVER[REQUEST_URI]");
        $url = explode('/', $actualLink);
        error_log("sessionController::getCurrentPage(): actualLink =>" . $actualLink . ", url =>"  . $url[3]);
        return $url[3];

    }
    public function initialize($user){
        error_log("sessionController::initialize(): user: " . $user->getUsername());
        $this->session->setCurrentUser($user->getId());
        $this->authorizeAccess($user->getRole());
    }


    function authorizeAccess($role){
        error_log("sessionController::authorizeAccess(): role: $role");
        switch($role){
            case 'user':
                $this->redirect($this->defaultSites['user'],[]);
            break;
            case 'admin':
                $this->redirect($this->defaultSites['admin'],[]);
            break;
            default:
        }
    }

    function logout(){
        $this->session->closeSession();
    }

}

?>