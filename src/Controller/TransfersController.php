<?php

namespace App\Controller;

use App\Repository\KommentarRepository;
use App\View\View;

class TransfersController
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
        $transfersRepository = new KommentarRepository();
        
        $view = new View('transfers/index');
        $view->title = 'transfers';
        $view->heading = 'transfers';
        $view->edit_id = ((isset($_GET['id']) && $_GET['id'] > 0) ? $_GET['id'] : 0);
        $view->login = (isset($_SESSION['login']))? $_SESSION['login'] : false;
        $view->username = $_SESSION['username'];
        $view->comments = $transfersRepository->readAll();
        $view->display();
    }

    public function doCreate()
    {
        if (isset($_POST['kommentar'])) {
            $kommentar = $_POST['kommentar']; 
            $theme = 4;
            $transfersRepository = new KommentarRepository();
            $transfersRepository->create($kommentar, $theme);
        }

        // Anfrage an die URI /user weiterleiten (HTTP 302)
        header('Location: /transfers');
    }

    public function delete()
    {
        $transfersRepository = new KommentarRepository();
        $transfersRepository->deleteById($_GET['id']);

        // Anfrage an die URI /user weiterleiten (HTTP 302)
        header('Location: /transfers');
    }

    public function doEdit()
    {
        $transfersRepository = new KommentarRepository(); 
        $transfersRepository->editById($_GET['id'], $_POST['text']);

        header('Location: /transfers');
    }

    public function display(){
        //$view = new View('transfers/create'); 
        $transfersRepository = new KommentarRepository(); 
        $view->comment = $transfersRepository->readById($_POST['id']);
    }
}
?>