<?php

namespace App\Framework;

use App\Framework\View;

abstract class Controller 
{
    private $action;            // action à réaliser
    protected $request;         // request entrante

    // Définit la request entrante
    public function setRequest(Request $request){
        $this->request =$request;
    }

    // Exécute l'action
    public function executeAction($action){
        if (method_exists($this, $action)){
            $this->action = $action;
            $this->{$this->action}();
        } else {
            $classController = get_class($this);
            throw new \Exception("Action $action non défini dans la classe $classController");
        }
    }

    // Méthode abstraite pour l'action par défaut -> doit être définie dans les controleurs enfants
    // Oblige les classes dérivées à implémenter cette action par défaut
    public abstract function index();

    // Genère la view associée au contrôleur courant
    protected function generateView($dataView = array()){
        // Déterminer le nom du fichier view à partir du nom du controller$classController actuel
        $classController = get_class($this);
        $classController = str_replace("App\Controller\Controller", "", $classController);
        // instancie et génère la view
        $view = new View($this->action, $classController);
        $view->generate($dataView);
    }

    protected function checkConnection()
        {
            if (!(isset($_SESSION['auth']))) {
                header('Location: /backoffice/index');
         }
    }
}