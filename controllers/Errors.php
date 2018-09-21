<?php
namespace Controllers;


class Errors extends Controller
{
    public function show404 ()
    {
        $this->view->setNotFound();
        $this->view->display("errors/404", [
           "pageTitle" => "Ошибка 404"
        ]);
    }
}