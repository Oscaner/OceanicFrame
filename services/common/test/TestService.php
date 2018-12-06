<?php
namespace services\common\test;

/**
 * Class TestService
 * @package services\common\test
 */
class TestService extends \services\common\TestService
{
    public function init()
    {
        $this -> text = '来自子 Test 服务的调用';

        return parent::init();
    }

}