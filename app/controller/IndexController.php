<?php

namespace app\controller;

use support\Request;

class IndexController
{
    // 127.0.0.1:8787/index
    public function index(Request $request)
    {
        return response('hello webman');
    }

    // 127.0.0.1:8787/index/view
    public function view(Request $request)
    {
        return view('index/view', ['name' => 'webman']);
    }

    // 127.0.0.1:8787/index/json
    public function json(Request $request)
    {
        return json(['code' => 0, 'msg' => 'ok']);
    }
}
