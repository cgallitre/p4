<?php
namespace App\Model;

use App\Framework\Model;

class Post extends Model
{
    public function getPosts()
    {
        $sql = 'SELECT id as id, created_at as date, title as title, content as content FROM posts ORDER BY id DESC';
        $posts = $this->executeRequest($sql);
        return $posts;
    }

    public function getPost($idPost)
    {
        $sql = 'SELECT id as id, created_at as date, title as title, content as content FROM posts WHERE id = :id';
        $post = $this->executeRequest($sql, ['id' => $idPost]);
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
        $sql= 'DELETE FROM posts WHERE id = :id';
        $postDelete = $this->executeRequest($sql, ['id' => $postId]);
        return $postDelete;
    }

    public function addPost($title, $content, $published, $date)
    {
        $sql = 'INSERT INTO posts (created_at, title, content, published) VALUES (:date, :title, :content, :published)';
        $this->executeRequest($sql, [
            'date' => $date, 
            'title' => $title,
            'content' => $content,
            'published' => $published
        ]);
    }
}