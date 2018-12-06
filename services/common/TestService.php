<?php
namespace services\common;

/**
 * Class TestService
 * @package services\common
 */
class TestService extends \oframe\basics\services\Service
{
    public $text = '来自父 Test 服务的调用';

    public function p()
    {
        var_dump($this -> text);
    }
}