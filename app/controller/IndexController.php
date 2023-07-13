<?php

namespace app\controller;

use support\Request;
use support\View;
use support\Db;

class IndexController
{
    // 127.0.0.1:8787/index
    public function index(Request $request)
    {
        // return response('hello webman');

        // 创建 response 对象
        $response = response();

        // 设置http头
        $response->header('Content-Type', 'application/json');

        // 设置 cookie
        $response->cookie('foo', 'value');

        // 设置要返回的数据
        $response->withBody('hello world');
        return $response;
    }

    // 127.0.0.1:8787/index/view
    public function view(Request $request)
    {
        // 给模版赋值
        View::assign('title', 'hello world');
        View::assign([
            'name' => 'galen',
            'age' => 25,
        ]);

        return view('index/view', ['name' => 'webman']);
    }

    // 127.0.0.1:8787/index/json
    public function json(Request $request)
    {
        $defaultName = 'webman';
        $name = $request->get('name', $defaultName);

        return json(['code' => 0, 'msg' => 'ok', 'data' => ['name' => $name]]);
    }

    // 使用数据库
    public function db(Request $request)
    {
        $uid = 1;
        $uid = $request->get('uid', $uid);
        $user = Db::table('user_infos')->where('id', $uid)->first();

        // 可以使用其他数据库 修改 connection()
        // $user = Db::connection('mysql')->table('user_infos')->where('id', $uid)->first();

        return json(['code' => 0, 'msg' => 'ok', 'data' => $user]);
    }

}
