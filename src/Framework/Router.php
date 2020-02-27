<?php
namespace App\Framework;

use App\Framework\View;
use App\Framework\Request;

use App\Controller\ControllerHome;

require_once 'Request.php';
require_once 'View.php';

class Router
{
    // Route une requête entrante et exécute l'action associée
    public function routeRequest(){   
        try {
            // Merge $_GET et $_POST in an associative table 
            $request = new Request(array_merge($_GET, $_POST));
            $controller = $this->createController($request);
            $action=$this->createAction($request);          
            $controller->executeAction($action);
        }
        catch (Exception $e)
        {
        $this->manageError($e);
        }
    }

    // Crée le controleur en fonction de la requête
    private function createController(Request $request){
        $controller='Home'; // valeur par défaut
        
        if ($request->existParameter('controller')){
            $controller = $request->getParameter('controller');
            // Première lettre en majuscule
            $controller = ucfirst(strtolower($controller));
        }
        // création du name du fichier du controleur
        $classController = "Controller" . $controller;
        $fileController = ".." . DIRECTORY_SEPARATOR . "src" . DIRECTORY_SEPARATOR . "Controller" . DIRECTORY_SEPARATOR . $classController . ".php";
        if (file_exists($fileController)){
            // instanciation du controleur selon la requête
            require($fileController);
            $classController = 'App\Controller\\' . $classController;
            $controller = new $classController();
            $controller->setRequest($request);
            return $controller;
        } else {
            throw new \Exception("Fichier $fileController introuvable");
        }
    }

    private function createAction(Request $request){
        $action="index"; // action par défaut
        if ($request->existParameter('action')){
            $action = $request->getParameter('action');
        }
        return $action;
    }

    private function manageError(Exception $exception){
        $view = new View('Error');
        $view->generate(['msgError' => $exception->getMessage()]);
    }

    private function getParameter($table, $name){
        if (isset($table[$name])){
            return $table[$name];
        } else {
            throw new \Exception("Paramètre $name absent.");
        }
    }
}