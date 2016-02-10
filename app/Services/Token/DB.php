<?php


namespace App\Services\Token;

use App\Models\User,App\Models\Token as TokenModel;

class DB extends Base
{
    function store($token, User $user)
    {
        $model = new TokenModel();
    }

    function delete($token)
    {
        // TODO: Implement remove() method.
    }

    function get($token)
    {
        // TODO: Implement get() method.
    }
}