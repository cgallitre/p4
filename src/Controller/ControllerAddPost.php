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

    // Affiche le formulaire d'un post
    public function index(){
  
        $this->generateView([
            
        ]);
    }

    public function add(){
        $title = $this->request->getParameter("title");
        $content = $this->request->getParameter("content");
        $date = new \DateTime('Europe/Paris');
        $date = $date->format('Y-m-d H:i:s');

        if ($this->request->existParameter("published"))
        {
            $published = 1; // 1 = published
        } else {
            $published = 0; // 0 = not published
        }
        
        // sauvegarde du post
        $this->post->addPost($title, $content, $published, $date);
        // actualisation de l'affichage
        $this->executeAction("index");
    }
}