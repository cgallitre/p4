<?php

abstract class Modele {

    private $bdd;

    private function getBdd()
    {
        if ($this->bdd == null){
            $this->bdd = new PDO('mysql:host=localhost;dbname=php-mvc;charset=utf8', 'root', 'root');
            $this->bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return $this->bdd;
    }

    protected function executerRequete($sql, $params = null){
        if ($params == null){
            $resultat = $this->getBdd()->query($sql);
        } else {
            $resultat = $this->getBdd()->Prepare($sql);
            $resultat->execute($params);
        }

        return $resultat;
    }
}