<?php

require_once 'Configuration.php';

abstract class Modele {

    private static $bdd;

    private static function getBdd(){
        if (self::$bdd === null) {
            $dsn = Configuration::get('dsn');
            $login = Configuration::get('login');
            $mdp= Configuration::get('mdp');
            self::$bdd = new PDO ($dsn, $login, $mdp);
            self::$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return self::$bdd;
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