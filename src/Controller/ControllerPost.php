<?php
namespace App\Controller;

use App\Model\Post;
use App\Model\Comment;
use App\Framework\Controller;


class ControllerPost extends Controller
{
    private $post;
    private $comment;

    public function __construct()
    {
        $this->post = new post();
        $this->comment = new comment();
    }

    // List all posts
    public function index(){
        $posts = $this->post->getPostsPublished();
        $this->generateView([
            'posts' => $posts,
            ]);
    }

    // one post
    public function view(){
        if (isset($_POST['commentId'])){
            $this->comment->signalComment($_POST['commentId']);
        $_SESSION['classMessage'] = 'danger';
        $_SESSION['message'] = 'Commentaire  signalé.';
        }

        $postId = $this->request->getParameter("id");
        $post=$this->post->getPost($postId);
        $titlesPosts = $this->post->getTitlesPosts();
        $comments=$this->comment->getComments($postId);
        
        $this->generateView([
            'post' => $post,
            'comments' =>$comments,
            'titlesPosts' => $titlesPosts
        ]);
    }

    
    // form to add a post
    public function add(){
 
        $this->checkConnection();
        if ($this->request->existParameter("title"))
        {
            $title = $this->request->getParameter("title");

            if($this->request->existParameter("content")){
                $content = $this->request->getParameter("content");
            } else {
                $content = "Chapitre en cours de rédaction.";
            }

            if($this->request->existParameter('excerpt')){
                $excerpt = $this->request->getParameter("excerpt");
            } else {
                $excerpt = "En cours de rédaction.";
            }
            
            $date = new \DateTime('Europe/Paris');
            $date = $date->format('Y-m-d H:i:s');

            if ($this->request->existParameter("published"))
            {
                $published = 1; // 1 = published
            } else {
                $published = 0; // 0 = not published
            }
            $this->post->addPost($title, $content, $published, $excerpt, $date);
            $_SESSION['classMessage'] = 'success';
            $_SESSION['message'] = 'Chapitre ajouté.';    
            header('Location: /post/manage');
            exit();
        }
        $this->generateView([]);
        
    }

    // To view posts for update or delete
    public function manage(){
        $this->checkConnection();
        $titlesPosts = $this->post->getTitlesPosts();
        $this->generateView([
            'titlesPosts' => $titlesPosts
            ]);
    }

    public function update()
    {
        $this->checkConnection();
        if ($this->request->existParameter("title"))
        {
            // Save modifications
            $postId = $this->request->getParameter("id");
             $title = $this->request->getParameter("title");

            if($this->request->existParameter("content")){
                $content = $this->request->getParameter("content");
            } else {
                $content = "Chapitre en cours de rédaction.";
            }

            if($this->request->existParameter('excerpt')){
                $excerpt = $this->request->getParameter("excerpt");
            } else {
                $excerpt = "En cours de rédaction.";
            }

            if ($this->request->existParameter("published"))
            {
                $published = 1; // 1 = published
            } else {
                $published = 0; // 0 = not published
            }

            $this->post->updatePost($title, $content, $excerpt, $published, $postId);
            // view list of posts
            $_SESSION['classMessage'] = 'success';
            $_SESSION['message'] = 'Chapitre modifié.';
            $this->executeAction("manage");

        } else {

            // view post
            $postId = $this->request->getParameter("id");
            $post=$this->post->getPost($postId);
            
            if ($post['published'] == 1){
                $post['published'] = "checked";
            }
            
            $this->generateView([
                'post' => $post
                ]);
        }
    }

    public function delete(){
        $this->checkConnection();
        $postId = $this->request->getParameter("id");
        // delete post
        $this->post->deletePost($postId);
        // actualisation de l'affichage
        $_SESSION['classMessage'] = 'danger';
        $_SESSION['message'] = 'Chapitre définitivement supprimé.';
        $this->executeAction("manage");
    }

    // add a comment to the post 
    public function comment(){
        $postId = $this->request->getParameter("id");
        $author = $this->request->getParameter("author");
        $content = $this->request->getParameter("content");
        $date = new \DateTime('Europe/Paris');
        $date = $date->format('Y-m-d H:i:s');
        $status = 1; // 1 = default value (published)
        // save of the comment
        $this->comment->addComment($author, $content, $postId, $date, $status);
        // view
        $_SESSION['classMessage'] = 'success';
        $_SESSION['message'] = 'Commentaire ajouté.';       
        $this->executeAction("view");
    }
}