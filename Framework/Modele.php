<?php

require_once 'Configuration.php';

abstract class Modele {

    private static $db;

    private static function getDb(){
        if (self::$db === null) {
            $dsn = Configuration::get('dsn');
            $login = Configuration::get('login');
            $pass= Configuration::get('pass');
            self::$db = new PDO ($dsn, $login, $pass);
            self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return self::$db;
    }


    protected function executeRequest($sql, $params = null){
        if ($params == null){
            $result = $this->getdb()->query($sql);
        } else {
            $result = $this->getdb()->Prepare($sql);
            $result->execute($params);
        }

        return $result;
    }
}