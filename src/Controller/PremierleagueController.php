<?php

namespace App\Controller;

use App\Repository\KommentarRepository;
use App\View\View;

class PremierleagueController
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
        $premierleagueRepository = new KommentarRepository();
        
        $view = new View('premierleague/index');
        $view->title = 'premierleague';
        $view->heading = 'premierleague';
        $view->edit_id = ((isset($_GET['id']) && $_GET['id'] > 0) ? $_GET['id'] : 0);
        $view->login = (isset($_SESSION['login']))? $_SESSION['login'] : false;
        $view->username = $_SESSION['username'];
        $view->comments = $premierleagueRepository->readAll();
        $view->display();
    }

    public function doCreate()
    {
        if (isset($_POST['kommentar'])) {
            $kommentar = $_POST['kommentar']; 
            $theme = 5;
            $premierleagueRepository = new KommentarRepository();
            $premierleagueRepository->create($kommentar, $theme);
        }

        // Anfrage an die URI /user weiterleiten (HTTP 302)
        header('Location: /premierleague');
    }

    public function delete()
    {
        $premierleagueRepository = new KommentarRepository();
        $premierleagueRepository->deleteById($_GET['id']);

        // Anfrage an die URI /user weiterleiten (HTTP 302)
        header('Location: /premierleague');
    }

    public function doEdit()
    {
        $premierleagueRepository = new KommentarRepository(); 
        $premierleagueRepository->editById($_GET['id'], $_POST['text']);

        header('Location: /premierleague');
    }

    public function display(){
        //$view = new View('premierleague/create'); 
        $premierleagueRepository = new KommentarRepository(); 
        $view->comment = $premierleagueRepository->readById($_POST['id']);
    }
}
?>