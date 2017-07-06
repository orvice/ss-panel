<?php


namespace App\Command;


use Pongtan\FakeLaravel\Application as FakeLaravel;

class FakeApp extends FakeLaravel
{

    public function __construct()
    {
    }

    public function offsetExists($offset)
    {
        return isset(app()->getContainer()[$offset]);
    }

    public function offsetGet($offset)
    {
        return app()->getContainer()[$offset];
    }

    public function offsetSet($offset, $value)
    {
        app()->getContainer()[$offset] = $value;
    }

    public function offsetUnset($offset)
    {
        unset(app()->getContainer()[$offset]);
    }


}