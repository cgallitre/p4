<?php

namespace App\Framework;

class Request
{
    // Parameters of request in array
    private $parameters;

    public function __construct($parameters)
    {
        $this->parameters = $parameters;
    }

    // return true if the parameter exist in the request
    public function existParameter($name){
        return (isset($this->parameters[$name]) && $this->parameters[$name]!="");
    }

    // Return value of parameter
    public function getParameter($name){
        if($this->existParameter($name)){
            return $this->parameters[$name];
        } else {
            throw new \Exception ("Parametre $name absent de la requête");
        }
    }
}