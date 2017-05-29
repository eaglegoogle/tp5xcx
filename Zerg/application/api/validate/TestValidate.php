<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/5/20
 * Time: 15:05
 */

namespace app\api\validate;


use think\Validate;

class TestValidate extends Validate
{
    protected $rule = [
        'name' => 'require|max:10',
        'email'=> 'email'
    ];
}