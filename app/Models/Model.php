<?php

namespace App\Models;

use Pongtan\Database\Model as BaseModel;

/**
 * Base Model.
 */
class Model extends BaseModel
{
    public $timestamps = false;

    public function getPdo()
    {
        $this->getConnection()->getPdo();
    }
}
