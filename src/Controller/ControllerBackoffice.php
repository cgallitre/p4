<?php
namespace App\Controller;
use App\Model\Login;
use App\Framework\Controller;

class ControllerBackoffice extends Controller
{
    private $login;

    public function __construct()
    {
        $this->login = new login();
    }

    // connection
    public function index()
    {
        if (isset($_SESSION['auth'])){
            // go to dashboard
            header('Location: /backoffice/dashboard');

        } elseif ($this->request->existParameter("username")) {

            $login = $this->login->getLogin();
            $username = $this->request->getParameter("username");
            $pass = $this->request->getParameter("password");
            if ($login['username']==$username && password_verify($pass, $login['password'])){
                // authentification ok
                $_SESSION['auth'] = true;
                $this->executeAction("index");
            } else {
                $this->generateView([]);
            }
        } else {
            $this->generateView([]);
        }
    }

    public function dashboard()
    {
        $this->checkConnection();
        $this->generateView([]);
    }

    public function logout()
    {
        $_SESSION=[];
        \session_destroy();
        $this->executeAction("index");
    }

}