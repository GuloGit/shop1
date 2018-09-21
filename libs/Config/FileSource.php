<?php
namespace Libs\Config;


class FileSource implements ISource
{
    protected $settings = [];
    protected $name = "";

    public function __construct ($dir, $file)
    {
        $this->settings = (include $dir . "/" . $file .  ".php");
        $this->name = $file;
    }

    public function getName()
    {
        return $this->name;
    }

    public function get($name = "")
    {
        if ($name === "") {
            return $this->settings;
        } else if (isset($this->settings[$name])) {
            return $this->settings[$name];
        }

        throw new \Exception("Нет настроек с ключом {$name}");
    }

    public function set($name, $value) {
        throw new \Exception("Невозможно изменить системные настройки из конфигурационных файлов");
    }
}