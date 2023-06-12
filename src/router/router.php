<?php

namespace Router;

require_once './controllers/userController.php';


// TODO faire les routes en objet et le routeur
// gerer les param dans les fonctions
// avoir des param dynamique

class Router {

    public function __construct() {
        $this->request = $_SERVER['REQUEST_URI'];
        $this->method = $_SERVER['REQUEST_METHOD'];

        //on enlève le 'http://' de l'url
        $this->url = preg_replace('/^http:\/{2}/', '$0 --> $2 $1', $this->request);

        if($this->method = 'GET'){
            $this->url = explode('?', $this->url)[0];
        }

        // on sépare l'url
        $decomposed_url = preg_split('/\//', $this->url);

        $this->domain = array_shift($decomposed_url);
        $this->route = $decomposed_url;
    }


    //  routage
    public function dispatch() {

        if($this->route == null) {
            //  require la homepage
            //
            //
            return true;
        }

        //je récupère les routes
        $routes = $this->getRoutes();

        foreach($routes as $route) {
            if($route['url'] == $this->route){
                require_once $route['file_path'];
            }
        }
    }

    //  fonction qui récupère les routes concernées par la requête
    public function getRoutes(){

        switch ($this->route[0]) {
            case 'users':
                //  retourne la liste des routes utilisateurs
                break; 
            case 'apartment':
                //  retourne la liste des routes utilisateurs
                break;
            case 'reservation':
                //  retourne la liste des routes utilisateurs
                break;
            default:
                return [];
                break;
        }
    }
}