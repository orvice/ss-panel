<?php


namespace App\Models;

use App\Utils\Tools;

class Payment extends Model
{
    protected $table = "payment";

    public function get_created_time()
    {
        return Tools::toDateTime($this->attributes['create_time']);
    }
}