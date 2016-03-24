<?php

namespace App\Models;

class EmailVerify extends Model
{

    public $incrementing = false;

    protected $table = 'email_verify';
    protected $primaryKey = 'email';

}
