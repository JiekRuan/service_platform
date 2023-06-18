<?php

namespace MyApp;


class Router {

    public function __construct() {
        $this->request = $_SERVER['REQUEST_URI'];
        $this->method = $_SERVER['REQUEST_METHOD'];
        //on enlève le 'http://' de l'url
        $this->url = preg_replace('/^http:\/{2}/', '$0 --> $2 $1', $this->request);

        if($this->method = 'GET'){
            $this->url = explode('?', $this->url)[0];
        }

        // on récupère le domaine (pas d'utilité pour le moment)
        $this->domain = preg_split('/\//', $this->url)[0];

        //  on récupère le reste de la requêta après le nom de domaine
        $this->route = preg_replace('/^' . $this->domain . '/', '$0 --> $2 $1', $this->url);
    }


    //  routage
    public function dispatch() {

        //je récupère les routes
        $routes = $this->getRoutes();

        //je vérifie si ma route est vide (que l'on a juste tapé le nom du domaine), ex : http://localhost:3000
        if($this->route == '') {
            $controller = new UserController;
            $controller->homepage();
            return true;
        }

        foreach($routes as $route) {
            if($route['url'] == $this->route){
                if($route['method'] != $this->method) {
                    header("HTTP/1.1 405 Method not Allowed");
                    $controller = new UserController;
                    $controller->error404();
                    return false;
                }
                $className = $route['controllerClass'];
                $controller = new $className;
                $function = $route['function'];
                $controller->$function();

                return true;
            }
        }
        //si aucune route ne correspond on lui envoie une erreur 404
        header("HTTP/1.1 404 Content not Found");
        $controller = new UserController;
        $controller->error404();
        return false;
    }

    //  fonction qui récupère les routes concernées par la requête
    //  faire un json pour stocker toutes les routes
    private function getRoutes(){
        $filename = 'routes.json';
        $data = file_get_contents($filename);

        return json_decode($data);
    }
}
