<?php

namespace App\Controller;

use App\Repository\KommentarRepository;
use App\View\View;

class SerieaController
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
        $serieaRepository = new KommentarRepository();
        
        $view = new View('seriea/index');
        $view->title = 'seriea';
        $view->heading = 'seriea';
        $view->edit_id = ((isset($_GET['id']) && $_GET['id'] > 0) ? $_GET['id'] : 0);
        $view->login = (isset($_SESSION['login']))? $_SESSION['login'] : false;
        $view->username = $_SESSION['username'];
        $view->comments = $serieaRepository->readAll();
        $view->display();
    }

    public function doCreate()
    {
        if (isset($_POST['kommentar'])) {
            $kommentar = $_POST['kommentar']; 
            $theme = 8;
            $serieaRepository = new KommentarRepository();
            $serieaRepository->create($kommentar, $theme);
        }

        // Anfrage an die URI /user weiterleiten (HTTP 302)
        header('Location: /seriea');
    }

    public function delete()
    {
        $serieaRepository = new KommentarRepository();
        $serieaRepository->deleteById($_GET['id']);

        // Anfrage an die URI /user weiterleiten (HTTP 302)
        header('Location: /seriea');
    }

    public function doEdit()
    {
        $serieaRepository = new KommentarRepository(); 
        $serieaRepository->editById($_GET['id'], $_POST['text']);

        header('Location: /seriea');
    }

    public function display(){
        //$view = new View('seriea/create'); 
        $serieaRepository = new KommentarRepository(); 
        $view->comment = $serieaRepository->readById($_POST['id']);
    }
}
?>