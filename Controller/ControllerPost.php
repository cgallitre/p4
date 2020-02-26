<?php

require_once 'Framework/Controller.php';
require_once 'Model/Post.php';
require_once 'Model/Comment.php';

class ControllerPost extends Controller
{
    private $post;
    private $comment;

    public function __construct()
    {
        $this->post = new post();
        $this->comment = new comment();
    }

    // Affiche les détails d'un post
    public function index(){
        $idPost = $this->request->getParameter("id");

        $post=$this->post->getPost($idPost);
        $titlesPosts = $this->post->getTitlesPosts();
        $comments=$this->comment->getComments($idPost);
        
        $this->generateView([
            'post' => $post,
            'comments' =>$comments,
            'titlesPosts' => $titlesPosts
        ]);
    }

    public function comment(){
        $idPost = $this->request->getParameter("id");
        $author = $this->request->getParameter("author");
        $content = $this->request->getParameter("content");
        // sauvegarde du comment
        $this->comment->addComment($author, $content, $idPost);
        // actualisation de l'affichage
        $this->executeAction("index");
    }
}