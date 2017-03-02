<?php


namespace App\Contracts;


interface TokenStorageInterface
{
    public function store($token);

    public function get($token);

    public function delete($token);
}