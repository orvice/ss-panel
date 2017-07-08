<?php


namespace App\Controllers\Api;


use App\Contracts\Codes\Auth;
use App\Controllers\BaseController;
use Slim\Http\Request;
use Slim\Http\Response;
use App\Services\Password;
use App\Models\User;
use App\Models\PasswordReset;
use App\Utils\Hash;

class PasswordController extends BaseController implements Auth
{


    public function store(Request $req, Response $res, $args)
    {
        $email = $req->getParam('email');
        // send email
        $user = User::where('email', $email)->first();
        if ($user == null) {
            return $this->echoJson($res, [
                'error_code' => self::EmailNotExist,
            ], 400);
        }
        $p = new Password();
        $p->sendResetEmail($email);
        return $this->echoJsonWithData($res, []);
    }

    public function show(Request $request, Response $response, $args)
    {

    }

    public function verify(Request $request, Response $response, $args)
    {
        $tokenStr = $args['token'];
        $password = $request->getParam('password');
        // check token
        $token = PasswordReset::where('token', $tokenStr)->first();
        if ($token == null || $token->expire_time < time()) {
            return $this->echoJson($response, [
                'error_code' => self::LinkExpired,
            ], 400);
        }
        $user = User::where('email', $token->email)->first();
        if ($user == null) {
            return $this->echoJson($response, [
                'error_code' => self::LinkExpired,
            ], 400);
        }
        // reset password
        $hashPassword = Hash::passwordHash($password);
        $user->pass = $hashPassword;
        $user->save();
        $token->delete();
        return $this->echoJsonWithData($response, []);
    }
}