<?php
namespace App\Controller;


use App\Model\Comment;
use App\Framework\Controller;

class ControllerComment extends Controller
{
    private $comment;

    public function __construct()
    {
        $this->comment = new Comment();
    }

    // list all signaled comments
    public function index(){
        $comments = $this->comment->getListComments();
        $this->generateView([
            'comments' => $comments
            ]);
    }

    // delete a comment
    public function delete(){
        $this->checkConnection();
        $commentId = $this->request->getParameter("id");
        // delete post
        $this->comment->deleteComment($commentId);
        // actualisation de l'affichage
        $_SESSION['classMessage'] = 'danger';
        $_SESSION['message'] = 'Commentaire définitivement supprimé.';
        $this->executeAction("index");
    }

    // agree a comment
    public function valid(){
        $this->checkConnection();
        $commentId = $this->request->getParameter("id");
        // delete post
        $this->comment->updateComment($commentId);
        // actualisation de l'affichage
        $_SESSION['classMessage'] = 'success';
        $_SESSION['message'] = 'Commentaire  publié.';
        $this->executeAction("index");
    }

}