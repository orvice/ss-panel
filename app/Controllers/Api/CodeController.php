<?php


namespace App\Controllers\Api;


use App\Controllers\BaseController;
use Slim\Http\Request;
use App\Models\InviteCode;

class CodeController extends BaseController
{
    public function index(Request $request, $response, $args)
    {
        $codes = InviteCode::where('user_id', InviteCode::PublicUid)->take(10)->get();
        return $this->echoJsonWithData($response, $codes);
    }
}