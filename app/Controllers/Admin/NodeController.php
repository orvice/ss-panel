<?php

namespace App\Controllers\Admin;

use App\Controllers\AdminController;
use App\Models\Node;

class NodeController extends AdminController
{
    public function index($request, $response, $args)
    {
        $nodes = Node::all();
        return $this->view()->assign('nodes', $nodes)->display('admin/node/index.tpl');
    }

    public function create($request, $response, $args)
    {
        $method = Node::getCustomerMethod();
        $ssrmethod = Node::getSSRMethod();
        $protocol = Node::getProtocolMethod();
        $obfs = Node::getObfsMethod();
        $v2rayprotocol = Node::getV2rayProtocol();
        return $this->view()->assign('method', $method)
            ->assign('ssrmethod', $ssrmethod)
            ->assign('protocol', $protocol)
            ->assign('obfs', $obfs)
            ->assign('v2rayprotocol', $v2rayprotocol)
            ->display('admin/node/create.tpl');
    }

    public function add($request, $response, $args)
    {
        $node = new Node();
        $node->name = $request->getParam('name');
        $node->server = $request->getParam('server');
        $node->method = $request->getParam('method');
        $node->custom_method = $request->getParam('custom_method');
        $node->custom_rss = $request->getParam('custom_rss');
        $node->traffic_rate = $request->getParam('rate');
        $node->info = $request->getParam('info');
        $node->type = $request->getParam('type');
        $node->status = $request->getParam('status');
        $node->ss = $request->getParam('ss');
        $node->ssr = $request->getParam('ssr');
        $node->sort = $request->getParam('sort');
        $node->protocol = $request->getParam('protocol');
        $node->protocol_param = $request->getParam('protocol_param');
        $node->obfs = $request->getParam('obfs');
        $node->obfs_param = $request->getParam('obfs_param');
        $node->ssr_port = $request->getParam('ssr_port');
        $node->add_port_only = $request->getParam('add_port_only');
        $node->add_method = $request->getParam('add_method');
        $node->add_passwd = $request->getParam('add_passwd');
        $node->v2ray = $request->getParam('v2ray');
        $node->v2ray_port = $request->getParam('v2ray_port');
        $node->v2ray_protocol = $request->getParam('v2ray_protocol');
        $node->v2ray_path = $request->getParam('v2ray_path');
        $node->v2ray_tls = $request->getParam('v2ray_tls');
        if (!$node->save()) {
            $rs['ret'] = 0;
            $rs['msg'] = "添加失败";
            return $response->getBody()->write(json_encode($rs));
        }
        $rs['ret'] = 1;
        $rs['msg'] = "节点添加成功";
        return $response->getBody()->write(json_encode($rs));
    }

    public function edit($request, $response, $args)
    {
        $id = $args['id'];
        $node = Node::find($id);
        if ($node == null) {

        }
        $method = Node::getCustomerMethod();
        $ssrmethod = Node::getSSRMethod();
        $protocol = Node::getProtocolMethod();
        $obfs = Node::getObfsMethod();
        $v2rayprotocol = Node::getV2rayProtocol();
        return $this->view()->assign('node', $node)
            ->assign('method', $method)
            ->assign('ssrmethod', $ssrmethod)
            ->assign('protocol', $protocol)
            ->assign('obfs', $obfs)
            ->assign('v2rayprotocol', $v2rayprotocol)
            ->display('admin/node/edit.tpl');
    }

    public function update($request, $response, $args)
    {
        $id = $args['id'];
        $node = Node::find($id);

        $node->name = $request->getParam('name');
        $node->server = $request->getParam('server');
        $node->method = $request->getParam('method');
        $node->custom_method = $request->getParam('custom_method');
        $node->custom_rss = $request->getParam('custom_rss');
        $node->traffic_rate = $request->getParam('rate');
        $node->info = $request->getParam('info');
        $node->type = $request->getParam('type');
        $node->status = $request->getParam('status');
        $node->ss = $request->getParam('ss');
        $node->ssr = $request->getParam('ssr');
        $node->sort = $request->getParam('sort');
        $node->protocol = $request->getParam('protocol');
        $node->protocol_param = $request->getParam('protocol_param');
        $node->obfs = $request->getParam('obfs');
        $node->obfs_param = $request->getParam('obfs_param');
        $node->ssr_port = $request->getParam('ssr_port');
        $node->add_port_only = $request->getParam('add_port_only');
        $node->add_method = $request->getParam('add_method');
        $node->add_passwd = $request->getParam('add_passwd');
        $node->v2ray = $request->getParam('v2ray');
        $node->v2ray_port = $request->getParam('v2ray_port');
        $node->v2ray_protocol = $request->getParam('v2ray_protocol');
        $node->v2ray_path = $request->getParam('v2ray_path');
        $node->v2ray_tls = $request->getParam('v2ray_tls');
        if (!$node->save()) {
            $rs['ret'] = 0;
            $rs['msg'] = "修改失败";
            return $response->getBody()->write(json_encode($rs));
        }
        $rs['ret'] = 1;
        $rs['msg'] = "修改成功";
        return $response->getBody()->write(json_encode($rs));
    }


    public function delete($request, $response, $args)
    {
        $id = $args['id'];
        $node = Node::find($id);
        if (!$node->delete()) {
            $rs['ret'] = 0;
            $rs['msg'] = "删除失败";
            return $response->getBody()->write(json_encode($rs));
        }
        $rs['ret'] = 1;
        $rs['msg'] = "删除成功";
        return $response->getBody()->write(json_encode($rs));
    }

    public function deleteGet($request, $response, $args)
    {
        $id = $args['id'];
        $node = Node::find($id);
        $node->delete();
        return $this->redirect($response, '/admin/node');
    }
}