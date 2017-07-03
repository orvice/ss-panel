<?php


namespace App\Controllers\Api\Admin;


use Slim\Http\Request;
use Slim\Http\Response;
use App\Controllers\BaseController;
use App\Utils\Tools;
use App\Models\InviteCode;

class InviteController extends BaseController
{
    public function index(Request $request, Response $response, $args)
    {
        $pageNum = 1;
        if (isset($request->getQueryParams()['page'])) {
            $pageNum = $request->getQueryParams()['page'];
        }
        $traffic = InviteCode::paginate(15, [
            '*',
        ], 'page', $pageNum);
        $traffic->setPath('/api/admin/invites');
        //return $this->echoJsonWithData($res,$traffic);
        return $this->echoJson($response, $traffic);
    }

    public function store(Request $request, Response $response, $args)
    {
        $n = $request->getParam('num');
        $prefix = $request->getParam('prefix');
        $uid = $request->getParam('uid');
        if ($n < 1) {
            return $this->echoJsonError($response, []);
        }
        for ($i = 0; $i < $n; $i++) {
            $char = Tools::genRandomChar(32);
            $code = new InviteCode();
            $code->code = $prefix . $char;
            $code->user_id = $uid;
            $code->save();
        }
        return $this->echoJsonWithData($response, []);
    }

    public function delete(Request $req, Response $res, $args)
    {
        $node = InviteCode::find($args['id']);
        $node->delete();
        return $this->echoJsonWithData($res, []);
    }
}