<?php
namespace App\Model;

use App\Framework\Model;

class login extends model
{
    public function getLogin()
    {
        $sql = 'SELECT username, password FROM user';
        $login = $this->executeRequest($sql);
        return $login->fetch();
    }
}