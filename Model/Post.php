<?php

require_once 'Framework/Model.php';

class Post extends Model
{
    public function getPosts()
    {
        $sql = 'SELECT id as id, date as date, title as title, content as content FROM posts ORDER BY id DESC';
        $posts = $this->executeRequest($sql);
        return $posts;
    }

    public function getPost($idPost)
    {
        $sql = 'SELECT id as id, date as date, title as title, content as content FROM posts WHERE id = ?';
        $post = $this->executeRequest($sql, [$idPost]);
        if ($post->rowCount() == 1){
            return $post->fetch();
        } else {
            throw new Exception("Aucun post ne correspondant à l'identifiant $idPost");
        }
    }

}