<?php

namespace App\Framework;
/* require_once 'Setup.php'; */

Class View
{
    private $file;   // nom du file associé à la View
    private $title;     // title de la View (défini dans le file View)

    public function __construct($action, $controller="")
    {
 
        $file=".." . DIRECTORY_SEPARATOR . "src" . DIRECTORY_SEPARATOR . "View" . DIRECTORY_SEPARATOR;
        if ($controller !=""){
            $file = $file . $controller . DIRECTORY_SEPARATOR;
        }
        $this->file = $file . $action . ".php";
    }

    public function generate($data)
    {
        $content=$this->generateFile($this->file, $data);
        $rootWeb = Setup::get("rootWeb","/");
        $View = $this->generateFile('../src/View/template.php',[
            'title' => $this->title,
            'content' => $content,
            'rootWeb' => $rootWeb,
        ]);
        echo $View;
    }

    private  function generateFile($file, $data)
    {
        if(file_exists($file)){
            extract($data);
            ob_start();
            require $file;
            return ob_get_clean();
        } else {
        throw new \Exception("Fichier $file introuvable");
        }
    } 

    private function clean($value)
    {
        return htmlspecialchars($value, ENT_QUOTES, 'UTF-8', false);
    }
}