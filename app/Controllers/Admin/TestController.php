<?php


namespace App\Controllers\Admin;

use App\Controllers\AdminController;
use App\Services\Mail;
use App\Utils\Tools;

class TestController extends AdminController
{
    public function sendMail($request, $response, $args)
    {
        return $this->view()->display('admin/test/sendmail.tpl');
    }

    public function sendMailPost($request, $response, $args)
    {
        $to = $request->getParam('email');
        try {
            Mail::send($to, "Test", 'test.tpl', [
                'time' => Tools::toDateTime(time())
            ], [
                BASE_PATH . '/LICENSE'
            ]);
            $res = [
                "ret" => 1,
                "msg" => "ok"
            ];
        } catch (\Exception $e) {
            $res = [
                "ret" => 0,
                "msg" => $e->getMessage()
            ];
        }
        return $this->echoJson($response, $res);
    }
}