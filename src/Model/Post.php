<?php
namespace App\Model;

use App\Framework\Model;

class Post extends Model
{
    public function getPostsPublished()
    {
        $sql = 'SELECT id as id, created_at as date, title as title, content as content, excerpt FROM posts WHERE published=1 ORDER BY id';
        $posts = $this->executeRequest($sql);
        return $posts;
    }

        public function getPostsUnPublished()
    {
        $sql = 'SELECT id as id, created_at as date, title as title, content as content, excerpt FROM posts WHERE published=0 ORDER BY id';
        $posts = $this->executeRequest($sql);
        return $posts;
    }

    public function getPost($idPost)
    {
        $sql = 'SELECT id as id, created_at as date, title as title, content as content, excerpt, published FROM posts WHERE id = :id';
        $post = $this->executeRequest($sql, ['id' => $idPost]);
        if ($post->rowCount() == 1){
            return $post->fetch();
        } else {
            throw new \Exception("Aucun post ne correspondant à l'identifiant $idPost");
        }
    }

    public function getTitlesPosts()
    {
        $sql = 'SELECT id, title, published FROM posts ORDER BY id';
        $titlesPosts = $this->executeRequest($sql);
        return $titlesPosts;
    } 

    public function deletePost($postId)
    {
        $sql= 'DELETE FROM posts WHERE id = :id';
        $postDelete = $this->executeRequest($sql, ['id' => $postId]);
        return $postDelete;
    }

    public function addPost($title, $content, $published, $excerpt, $date)
    {
        $sql = 'INSERT INTO posts (created_at, title, content, excerpt, published) VALUES (:date, :title, :content, :excerpt, :published)';
        $this->executeRequest($sql, [
            'date' => $date, 
            'title' => $title,
            'content' => $content,
            'excerpt' =>$excerpt,
            'published' => $published
        ]);
    }

    public function updatePost($title, $content, $excerpt, $published, $postId)
    {
        $sql = 'UPDATE posts SET title = :title, content = :content, excerpt = :excerpt, published = :published WHERE id = :id';
        $this->executeRequest($sql, [
            'title' => $title,
            'content' => $content,
            'excerpt' => $excerpt,
            'published' => $published,
            'id' => $postId
        ]);
    }
}