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
}