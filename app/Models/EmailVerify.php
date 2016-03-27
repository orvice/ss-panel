<?php

namespace App\Models;

class EmailVerify extends Model
{

    public $incrementing = false;

    protected $table = 'sp_email_verify';

    protected $primaryKey = 'email';

}
