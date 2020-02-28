<?php
namespace App\Model;

use App\Framework\Model;

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
            throw new \Exception("Aucun post ne correspondant à l'identifiant $idPost");
        }
    }

    public function getTitlesPosts()
    {
        $sql = 'SELECT id, title FROM posts ORDER BY title';
        $titlesPosts = $this->executeRequest($sql);
        return $titlesPosts;
    }

    public function deletePost($postId)
    {
        $sql= 'DELETE FROM posts WHERE id = ?';
        $postDelete = $this->executeRequest($sql, [$postId]);
        return $postDelete;
    }

    public function addPost($title, $content)
    {
        $sql = 'INSERT INTO posts (date, title, content) VALUES (?, ?, ?)';
        $date = new \DateTime('Europe/Paris');
        $date = $date->format('Y-m-d H:i:s');
        $this->executeRequest($sql, [
            $date, 
            $title,
            $content
        ]);
    }
}