<?php
namespace Models;

class News extends Model
{
    public function all()
    {
       $result = $this->db->query("SELECT * FROM news");
       return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function get($id)
    {
        return [
            "title" => "Пример заголовка {$id}",
            "content" => "Пример контента {$id}"
        ];
    }
}