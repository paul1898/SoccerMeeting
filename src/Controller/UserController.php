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
        if (isset($_POST['send'])) {
            $firstName = $_POST['fname'];
            $lastName = $_POST['lname'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $userRepository = new UserRepository();
            $userRepository->create($firstName, $lastName, $email, $password);
        }

        // Anfrage an die URI /user weiterleiten (HTTP 302)
        header('Location: /user');
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

            $user = $repository->readByUserAttributes($_POST['username'], $_POST['password']);

            if (!$user){
                header("location:/user");
            }else{
                $_SESSION['id'] = $user->id;
                $_SESSION['username'] = $user->username;
                $_SESSION['login'] = true;
                header("location:/");
            }
        }
        else{
            echo "gang wäg"; //FEHLER <-----
        }
    }
    public function logOut()
    {
        session_destroy();
        unset($_SESSION);

        header("location:/");
    }
}
