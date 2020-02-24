<?php

class Configuration
{
    private static $parametres;

    // Renvoie la valeur d'un paramètre de configuration
    public static function get($nom, $valeurParDefault = null){
        if (isset(self::getParametres()[$nom])){
            $valeur = self::getParametres()[$nom];
        } else {
            $valeur = $valeurParDefault;
        }
        return $valeur;
    }

    // Renvoie le tableau des paramètres 
    private static function getParametres() {
        if (self::$parametres == null) {
        $cheminFichier = "Config/prod.ini";
        if (!file_exists($cheminFichier)) {
            $cheminFichier = "Config/dev.ini";
        }
        if (!file_exists($cheminFichier)) {
            throw new Exception("Aucun fichier de configuration trouvé");
        }
        else {
            self::$parametres = parse_ini_file($cheminFichier);
        }
        }
        return self::$parametres;
  }
}