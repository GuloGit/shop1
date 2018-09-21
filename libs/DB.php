<?php
namespace Libs;


class DB
{
    protected static $instance = null;
    protected $conn = null;

    protected function __construct() {}
    protected function __clone() {}

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self;
        }

        return self::$instance;
    }

    public function connect($host, $user, $pass, $db)
    {
        if ($this->conn === null) {
            $this->conn = new \mysqli($host, $user, $pass, $db);

            if ($this->conn->connect_errno) {
                throw new \Exception("Ошибка подключения к БД: " . $this->conn->connect_error);
            }
        }
    }

    public function query($str)
    {
        if ($this->conn) {
            return $this->conn->query($str);
        }

        throw new \Exception("Невозможно выполнить запрос к базе без подключения к ней!");
    }

}