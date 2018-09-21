<?php
namespace Libs\Config;

interface ISource
{
    public function get($name);
    public function set($name, $value);
    public function getName();
}