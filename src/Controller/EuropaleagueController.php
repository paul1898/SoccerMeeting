<?php

namespace App\Controller;

use App\Repository\KommentarRepository;
use App\View\View;

class EuropaleagueController
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
        $europaleagueRepository = new KommentarRepository();
        
        $view = new View('europaleague/index');
        $view->title = 'europaleague';
        $view->heading = 'europaleague';
        $view->edit_id = ((isset($_GET['id']) && $_GET['id'] > 0) ? $_GET['id'] : 0);
        $view->login = (isset($_SESSION['login']))? $_SESSION['login'] : false;
        $view->username = $_SESSION['username'];
        $view->comments = $europaleagueRepository->readAll();
        $view->display();
    }

    public function doCreate()
    {
        if (isset($_POST['kommentar'])) {
            $kommentar = $_POST['kommentar'];
            $theme = 3; 
            $europaleagueRepository = new KommentarRepository();
            $europaleagueRepository->create($kommentar, $theme);
        }

        // Anfrage an die URI /user weiterleiten (HTTP 302)
        header('Location: /europaleague');
    }

    public function delete()
    {
        $europaleagueRepository = new KommentarRepository();
        $europaleagueRepository->deleteById($_GET['id']);

        // Anfrage an die URI /user weiterleiten (HTTP 302)
        header('Location: /europaleague');
    }

    public function doEdit()
    {
        $europaleagueRepository = new KommentarRepository(); 
        $europaleagueRepository->editById($_GET['id'], $_POST['text']);

        header('Location: /europaleague');
    }

    public function display(){
        //$view = new View('europaleague/create'); 
        $europaleagueRepository = new KommentarRepository(); 
        $view->comment = $europaleagueRepository->readById($_POST['id']);
    }
}
?>