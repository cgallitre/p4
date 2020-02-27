<?php

namespace App\Framework;
/* require_once 'Setup.php'; */

abstract class Model {

    private static $db;

    private static function getDb(){
        if (self::$db === null) {
            $dsn = Setup::get('dsn');
            $login = Setup::get('login');
            $pass= Setup::get('pass');
            self::$db = new \PDO ($dsn, $login, $pass);
            self::$db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
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