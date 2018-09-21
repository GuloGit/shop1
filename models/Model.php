<?php
namespace Models;

abstract class Model
{
    protected $db = null;
    protected $config = null;

    public function __construct ()
    {
        try {
            $this->db = \Libs\DB::getInstance();
            $this->config = \Libs\Config\Config::getInstance();

            $host = $this->config->get("database:host");
            $user = $this->config->get("database:user");
            $pass = $this->config->get("database:password");
            $dbname = $this->config->get("database:db");

            $this->db->connect($host, $user, $pass, $dbname);
        } catch (\Exception $e) {
            throw $e;
        }
    }
}