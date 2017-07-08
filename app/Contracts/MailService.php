<?php


namespace App\Contracts;


interface MailService
{
    public function send($to, $subject, $template, $params, $file = null);
}