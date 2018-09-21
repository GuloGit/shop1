<?php
namespace Libs;


class View
{
    public function display($template, $dataArray)
    {
        extract($dataArray);

        include "./templates/common/header.php";
        include "./templates/".$template.".php";
        include "./templates/common/footer.php";
    }

    public function setNotFound()
    {
        header("HTTP/1.1 404 Not Found");
    }
}