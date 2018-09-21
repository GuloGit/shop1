<?php
namespace Controllers;

class Index extends Controller
{
    public function show()
    {
        $this->view->display("index", [
            "pageTitle" => "Главная страница",
            "content" => "Адрес главной страницы — " . $this->config->get("system:host")
        ]);
    }
}