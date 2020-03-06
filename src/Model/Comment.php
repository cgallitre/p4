<?php
namespace App\Model;

// use DateTime;
use App\Framework\Model;

class Comment extends Model
{
    public function getComments($postId)
    {
        $sql = 'SELECT id as id, created_at as date, author as author, content as content, status as status FROM comments WHERE postId= :postId and status=1';
        $comments = $this->executeRequest($sql, ['postId' => $postId]);
        return $comments;
    }

    public function getListComments()
    {
        $sql = 'SELECT comments.id, comments.created_at as date, comments.author, comments.content, comments.status FROM comments WHERE comments.status <>1';
        $Comments = $this->executeRequest($sql);
        return $Comments;
    }

    public function addComment($author, $content, $postId, $date, $status){
        $sql = 'INSERT INTO comments (created_at, author, content, postId, status) VALUES (:date, :author, :content, :postId, :status)';
        $this->executeRequest($sql, [
            'date' => $date,
            'author' => $author,
            'content' => $content,
            'postId' => $postId,
            'status' => $status
        ]);
    }

    // delete a comment
    public function deleteComment($commentId)
    {
        $sql= 'DELETE FROM comments WHERE id = :commentId';
        $commentDelete = $this->executeRequest($sql, ['commentId' => $commentId]);
        return $commentDelete;
    }

    // agree a comment
    public function updateComment($commentId)
    {
        $sql= 'UPDATE comments SET status = 1 WHERE id = :commentId';
        $this->executeRequest($sql, ['commentId' => $commentId]);
    }

    // signal a comment
    public function signalComment($commentId)
    {
        $sql= 'UPDATE comments SET status = 0 WHERE id = :commentId';
        $this->executeRequest($sql, ['commentId' => $commentId]);
    }
}
