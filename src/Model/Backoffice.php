<?php
namespace App\Model;

use App\Framework\Model;

class backoffice extends model
{
    

    public function getLogin($username)
    {
        $sql = 'SELECT username, password FROM user WHERE user.username = :username';
        $login = $this->executeRequest($sql, [
            'username' => $username
        ]);
        return $login->fetch();
    }

    public function statistics()
    {
        $sql = 'SELECT COUNT(id) from posts WHERE published = 1';
        $postsPublished = $this->executeRequest($sql)->fetch();

        $sql = 'SELECT COUNT(id) from posts WHERE published = 0';
        $postsInProgress = $this->executeRequest($sql)->fetch();

        $sql = 'SELECT COUNT(id) from comments WHERE status = 0';
        $signaledComments = $this->executeRequest($sql)->fetch();

        return [$postsPublished, $postsInProgress, $signaledComments];
    }

    public function addAccount($username, $password)
    {
        $sql = 'INSERT INTO user (username, password) VALUES (:username, :password)';
        $this->executeRequest($sql, [
            'username' => $username, 
            'password' => $password
        ]);
    }
}