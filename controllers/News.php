<?php
namespace Controllers;

class News extends Controller
{
    private $news;

    public function __construct()
    {
        // вызов родительского конструктора
        parent::__construct();
        $this->news = new \Models\News();
    }

    // метод для показа главной страницы новостей (списка)
    public function index()
    {
        $list = $this->news->all();

        $data = [
            "news" => $list,
            "pageTitle" => "Список всех новостей"
        ];

        $this->view->display("news/list", $data);
    }

    // для просмотра новости
    public function show($id)
    {
        $news = $this->news->get($id);

        $this->view->display("news/page", [
           "content" => $news["content"],
           "pageTitle" => $news["title"]
        ]);
    }
}