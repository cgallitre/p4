<?php

class Setup
{
    private static $parameters;

    // Return parameter value of configuration
    public static function get($name, $defaultValue = null){
        if (isset(self::getParameters()[$name])){
            $value = self::getParameters()[$name];
        } else {
            $value = $defaultValue;
        }
        return $value;
    }

    // Return array of parameters 
    private static function getParameters() {
        if (self::$parameters == null) {
            $pathFile = "Setup/prod.ini";
            if (!file_exists($pathFile)) {
                $pathFile = "Setup/dev.ini";
            }
            if (!file_exists($pathFile)) {
                throw new Exception("Aucun fichier de configuration trouvé");
            }
            else {
                self::$parameters = parse_ini_file($pathFile);
            }
        }
        return self::$parameters;
  }
}