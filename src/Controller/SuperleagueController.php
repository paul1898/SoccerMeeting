<?php

namespace App\Controller;

use App\Repository\KommentarRepository;
use App\View\View;

class SuperleagueController
{
    /**
     * Die index Funktion des DefaultControllers sollte in jedem Projekt
     * existieren, da diese ausgeführt wird, falls die URI des Requests leer
     * ist. (z.B. http://my-project.local/). Weshalb das so ist, ist und wann
     * welcher Controller und welche Methode aufgerufen wird, ist im Dispatcher
     * beschrieben.
     */
    public function index()
    {
        $superleagueRepository = new KommentarRepository();
        
        $view = new View('superleague/index');
        $view->title = 'superleague';
        $view->heading = 'superleague';
        $view->edit_id = ((isset($_GET['id']) && $_GET['id'] > 0) ? $_GET['id'] : 0);
        $view->login = (isset($_SESSION['login']))? $_SESSION['login'] : false;
        $view->username = $_SESSION['username'];
        $view->comments = $superleagueRepository->readAll();
        $view->display();
    }

    public function doCreate()
    {
        if (isset($_POST['kommentar'])) {
            $kommentar = $_POST['kommentar']; 
            $theme = 2;
            $superleagueRepository = new KommentarRepository();
            $superleagueRepository->create($kommentar, $theme);
        }

        // Anfrage an die URI /user weiterleiten (HTTP 302)
        header('Location: /superleague');
    }

    public function delete()
    {
        $superleagueRepository = new KommentarRepository();
        $superleagueRepository->deleteById($_GET['id']);

        // Anfrage an die URI /user weiterleiten (HTTP 302)
        header('Location: /superleague');
    }

    public function doEdit()
    {
        $superleagueRepository = new KommentarRepository(); 
        $superleagueRepository->editById($_GET['id'], $_POST['text']);

        header('Location: /superleague');
    }

    public function display(){
        //$view = new View('superleague/create'); 
        $superleagueRepository = new KommentarRepository(); 
        $view->comment = $superleagueRepository->readById($_POST['id']);
    }
}
?>