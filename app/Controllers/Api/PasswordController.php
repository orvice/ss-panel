<?php


namespace App\Controllers\Api;


use App\Contracts\Codes\Auth;
use App\Controllers\BaseController;
use Slim\Http\Request;
use Slim\Http\Response;
use App\Services\Password;
use App\Models\User;

class PasswordController extends BaseController implements Auth
{


    public function store(Request $req, Response $res, $args)
    {
        $email = $req->getParam('email');
        // send email
        $user = User::where('email', $email)->first();
        if ($user == null) {
            return $this->echoJson($res,[
                'error_code' => self::EmailNotExist,
            ],400);
        }
        $p = new Password();
        $p->sendResetEmail($email);
        return $this->echoJsonWithData($res, []);
    }

    public function show(Request $req, Response $res, $args)
    {

    }

    public function verify(Request $req, Response $res, $args)
    {

    }
}