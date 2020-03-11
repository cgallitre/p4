<?php
namespace App\Controller;
use App\Model\Backoffice;
use App\Framework\Controller;

class ControllerBackoffice extends Controller
{
    private $backoffice;

    public function __construct()
    {
        $this->backoffice = new backoffice();
    }

    // connection
    public function index()
    {
        // authentification exist, got to dashboard
        if (isset($_SESSION['auth'])){

            header('Location: /backoffice/dashboard');
            exit();
        // Verify login
        } elseif ($this->request->existParameter("username")) {

            $username = $this->request->getParameter("username");
            $pass = $this->request->getParameter("password");

            $login = $this->backoffice->getLogin($username);

            if ($login['username']==$username && password_verify($pass, $login['password'])){
                // authentification ok
                $_SESSION['auth'] = true;
                $this->executeAction("index");
            } else {
                $_SESSION['classMessage'] = 'danger';
                $_SESSION['message'] = 'Mauvais login ou mot de passe.';
                $this->generateView([]);
            }
        // Show form authentification
        } else {
            $this->generateView([]);
        }
    }

    public function dashboard()
    {
        $this->checkConnection();
        $stat = $this->backoffice->statistics();
        
        $this->generateView([
            'postsPublished' => $stat[0],
            'postsInProgress' => $stat[1],
            'signaledComments' => $stat[2]
            ]);
    }

    public function logout()
    {
        $_SESSION = [];
        unset($_SESSION);
        // $_SESSION['message'] = '<div class="alert alert-danger">Vous êtes déconnecté.</div>';
        $_SESSION['classMessage'] = 'danger';
        $_SESSION['message'] = 'Vous êtes déconnecté.';
        $this->executeAction("index");
    }

    public function inscription()
    {
        $this->checkConnection();

        // try a inscription
        if ($this->request->existParameter("username"))
        {
            $username = $this->request->getParameter("username");
            $password = $this->request->getParameter("password");
            $passwordConfirm = $this->request->getParameter("passwordConfirm");

            // check if account exist and passwords are corrects
            $account = $this->backoffice->getLogin($username);
            $checkPassword = ($password === $passwordConfirm);
            if ($account === false && $checkPassword){
                $this->backoffice->addAccount($username, password_hash($password, PASSWORD_BCRYPT));
                $_SESSION['classMessage'] = 'success';
                $_SESSION['message']= 'Le compte a été créé.';
                header('Location: /backoffice/dashboard');
                exit();
            } else {
                // Error
                $_SESSION['classMessage'] = 'danger';
                $_SESSION['message'] = 'Ce compte existe déjà ou les mots de passe ne correspondent pas.';
                $this->generateView([]);
            }

        } else {
        // show new inscription form
        $this->generateView([]);
        }
    }
}