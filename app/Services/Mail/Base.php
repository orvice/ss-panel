<?php

namespace App\Services\Mail;

use App\Contracts\MailService;
use Twig_Environment;

class Base implements MailService
{
    /**
     * @return Twig_Environment
     */
    private function getView()
    {
        return app()->make('view');
    }


    public function genHtml($template, $param)
    {
        return $this->getView()->render($template . ".html", $param);
    }


    public function send($to, $subject, $template, $params, $file = NULL)
    {
    }
}
