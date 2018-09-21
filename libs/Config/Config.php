<?php
namespace Libs\Config;

class Config
{
    protected static $instance = null;
    protected $sources = [];

    protected function __construct (){}
    protected function __clone (){}

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self;
        }

        return self::$instance;
    }

    public function get($name)
    {
        $parts = explode(":", $name);

        $settingsName = "";
        $sourceName = $parts[0];

        if (isset($parts[1])) {
            $settingsName = $parts[1];
        }

        if (isset($this->sources[$sourceName])) {
            $source = $this->sources[$sourceName];
            return $source->get($settingsName);
        } else {
            throw new \Exception("Нет настроек из источника {$sourceName}");
        }
    }

    public function set($name, $value)
    {

    }

    public function add(ISource $src)
    {
        if (!isset($this->sources[$src->getName()])) {
            $this->sources[$src->getName()] = $src;
        } else {
            throw new \Exception("Настройки " . $src->getName() . " уже добавлены!");
        }
    }
}