<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/5/19
 * Time: 15:51
 */

namespace app\sample\controller;

use think\Request;
class Test
{
    public function hello(Request $request)
    {
        $all = $request->param();
        var_dump($all);
        exit();
        $all = Request::instance()->param();
        var_dump($all);
        exit();
        $id = Request::instance()->param('id');
        $name = Request::instance()->param('name');
        $age = Request::instance()->param('age');
        echo $id;
        echo '|';
        echo $name;
        echo '|';
        echo $age;
    }
}