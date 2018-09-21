<?php
namespace Controllers;

class Products extends Controller
{
    private $products;

    public function __construct()
    {
        parent::__construct();
        $this->products =  new \Models\Products();
    }

    public function index(){
        $list = $this->products->all();
        $data = [
            "products"=>$list,
            "pageTitle"=>"Список товаров"
        ];
        $this->view->display("products/list", $data);
        }

    public function show($id){
        $products=$this->products->get($id);
        $this->view->display("products/page", [
            "content"=>$products["ProductDescription"],
            "pageTitle"=>$products["ProductName"]
         ]);
        }

}