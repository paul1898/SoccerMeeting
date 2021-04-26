<?php

namespace App\Controller;

use App\Repository\KommentarRepository;
use App\View\View;

class LaligaController
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
        $laligaRepository = new KommentarRepository();
        
        $view = new View('laliga/index');
        $view->title = 'laliga';
        $view->heading = 'laliga';
        $view->edit_id = ((isset($_GET['id']) && $_GET['id'] > 0) ? $_GET['id'] : 0);
        $view->login = (isset($_SESSION['login']))? $_SESSION['login'] : false;
        $view->username = $_SESSION['username'];
        $view->comments = $laligaRepository->readAll();
        $view->display();
    }

    public function doCreate()
    {
        if (isset($_POST['kommentar'])) {
            $kommentar = $_POST['kommentar']; 
            $theme = 6;
            $laligaRepository = new KommentarRepository();
            $laligaRepository->create($kommentar, $theme);
        }

        // Anfrage an die URI /user weiterleiten (HTTP 302)
        header('Location: /laliga');
    }

    public function delete()
    {
        $laligaRepository = new KommentarRepository();
        $laligaRepository->deleteById($_GET['id']);

        // Anfrage an die URI /user weiterleiten (HTTP 302)
        header('Location: /laliga');
    }

    public function doEdit()
    {
        $laligaRepository = new KommentarRepository(); 
        $laligaRepository->editById($_GET['id'], $_POST['text']);

        header('Location: /laliga');
    }

    public function display(){
        //$view = new View('laliga/create'); 
        $laligaRepository = new KommentarRepository(); 
        $view->comment = $laligaRepository->readById($_POST['id']);
    }
}
?>