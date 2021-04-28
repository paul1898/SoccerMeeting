<?php

namespace App\Controller;

use App\Repository\UserRepository;
use App\View\View;

/**
 * Siehe Dokumentation im DefaultController.
 */
class UserController
{
    public function index()
    {
        $userRepository = new UserRepository();

        $view = new View('user/index');
        $view->title = 'Benutzer';
        $view->heading = 'Benutzer';
        $view->login = (isset($_SESSION['login']))? $_SESSION['login'] : false;
        $view->users = $userRepository->readAll();
        $view->display();
    }

    public function create()
    {
        $view = new View('user/create');
        $view->title = 'Benutzer erstellen';
        $view->heading = 'Benutzer erstellen';
        $view->display();
    }

    public function doCreate()
    {
        if (is_string($_POST['username']) && !empty($_POST['username']) && !empty($_POST['email']) && 
        is_string($_POST['password']) && !empty($_POST['password']) && is_string($_POST['password1']) && !empty($_POST['password1'])) { 
            echo "Alle Eingaben müssen korrekt ausgefüllt werden!"; 
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $password1 = $_POST['password1']; 

            $regexUsername = ' ^[a-zA-Z0-9]+([._]?[a-zA-Z0-9]+)*$'; 

            if(!filter_var($email, FILTER_VALIDATE_EMAIL) && $password != $password1 && !preg_match($regexUsername, $username)) {
                echo "Ungültige Eingabeinformationen!"; 
            }
            else {
                $userRepository = new UserRepository();
                $userRepository->create($username, $email, $password);
    
                header("location:/user/index");
            }
        }
        else 
        {
            header("location:/user/create"); 
        }
        // Anfrage an die URI /user weiterleiten (HTTP 302)
    }

    public function delete()
    {
        $userRepository = new UserRepository();
        $userRepository->deleteById($_GET['id']);

        // Anfrage an die URI /user weiterleiten (HTTP 302)
        header('Location: /user');
    }
    
    public function doLogin()
    {
        if(is_string($_POST['username']) && !empty($_POST['username']) && is_string($_POST['password']) && !empty($_POST['password'])){
            $repository = new UserRepository();
            
            $username = $_POST['username']; 
            $password = $_POST['password']; 

            $user = $repository->readByUserAttributes($username, $password);

            if (!$user){
                header("location:/user/index");
            }else{
                $_SESSION['id'] = $user->id;
                $_SESSION['username'] = $user->username;
                $_SESSION['login'] = true;
                header("location:/");
            }
        }
        else{
            header("location:/user/index");
        }
    }
    public function logOut()
    {
        session_destroy();
        unset($_SESSION);

        header("location:/");
    }
}
