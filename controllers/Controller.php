<?php
namespace Controllers;


abstract class Controller
{
    protected $view;
    protected $config;

    public function __construct ()
    {
        $this->view = new \Libs\View();
        $this->config = \Libs\Config\Config::getInstance();
    }
}