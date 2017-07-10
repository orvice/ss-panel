<?php


namespace App\Controllers\Api\Admin;


use App\Controllers\BaseController;
use Slim\Http\Request;
use Slim\Http\Response;
use App\Models\User;

class UserController extends BaseController
{
    public function index(Request $req, Response $res, $args)
    {
        $pageNum = 1;
        if (isset($req->getQueryParams()['page'])) {
            $pageNum = $req->getQueryParams()['page'];
        }
        $traffic = User::paginate(15, [
            '*',
        ], 'page', $pageNum);
        $traffic->setPath('/api/admin/users');
        //return $this->echoJsonWithData($res,$traffic);
        return $this->echoJson($res, $traffic);
    }
}