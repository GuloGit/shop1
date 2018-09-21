<?php
namespace Models;


class Products extends Model
{
    public function all()
    {
        $result = $this->db->query("SELECT * FROM products");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function get($id)
    {
        return
            [
                "ProductName" => "Наименование товара {$id}",
                "ProductDescription" => "Описание товара {$id}"
                   ];
    }
}