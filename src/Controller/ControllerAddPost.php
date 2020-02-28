<?php
namespace App\Controller;

use App\Model\Post;
use App\Framework\Controller;


class ControllerAddPost extends Controller
{
    private $post;

    public function __construct()
    {
        $this->post = new post();

    }

    // Affiche les détails d'un post
    public function index(){
  
        $this->generateView([
            
        ]);
    }

    public function add(){
        $title = $this->request->getParameter("title");
        $content = $this->request->getParameter("content");
        // sauvegarde du post
        $this->post->addPost($title, $content);
        // actualisation de l'affichage
        $this->executeAction("index");
    }
}