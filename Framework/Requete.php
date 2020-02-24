<?php
class Requete
{
    // paramétres de la requete sous forme de tableau
    private $parametres;

    public function __construct($parametres)
    {
        $this->parametres = $parametres;
    }

    // Renvoie vrai si le paramètre existe dans la requête
    public function existeParametre($nom){
        return (isset($this->parametres[$nom]) && $this->parametres[$nom]!="");
    }

    // Renvoie la valeur du parametre
    public function getParametre($nom){
        if($this->existeParametre($nom)){
            return $this->parametres[$nom];
        } else {
            throw new Exception ("Parametre $nom absent de la requête");
        }
    }
}