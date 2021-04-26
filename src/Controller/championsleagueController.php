<?php

namespace App\Controller;

use App\Repository\KommentarRepository;
use App\View\View;

class ChampionsleagueController
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
        $championsleagueRepository = new KommentarRepository();
        
        $view = new View('championsleague/index');
        $view->title = 'championsleague';
        $view->heading = 'championsleague';
        $view->edit_id = ((isset($_GET['id']) && $_GET['id'] > 0) ? $_GET['id'] : 0);
        $view->login = (isset($_SESSION['login']))? $_SESSION['login'] : false;
        $view->username = $_SESSION['username'];
        $view->comments = $championsleagueRepository->readAll();
        $view->display();
    }

    public function doCreate()
    {
        if (isset($_POST['kommentar'])) {
            $kommentar = $_POST['kommentar']; 
            $theme = 1;
            $championsleagueRepository = new KommentarRepository();
            $championsleagueRepository->create($kommentar, $theme);
        }

        // Anfrage an die URI /user weiterleiten (HTTP 302)
        header('Location: /championsleague');
    }

    public function delete()
    {
        $championsleagueRepository = new KommentarRepository();
        $championsleagueRepository->deleteById($_GET['id']);

        // Anfrage an die URI /user weiterleiten (HTTP 302)
        header('Location: /championsleague');
    }

    public function doEdit()
    {
        $championsleagueRepository = new KommentarRepository(); 
        $championsleagueRepository->editById($_GET['id'], $_POST['text']);

        header('Location: /championsleague');
    }

    public function display(){
        //$view = new View('championsleague/create'); 
        $championsleagueRepository = new KommentarRepository(); 
        $view->comment = $championsleagueRepository->readById($_POST['id']);
    }
}
?>