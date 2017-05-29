<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/5/22
 * Time: 13:41
 */

namespace app\lib\exception;


use think\Exception;

class BaseException extends Exception
{
    // HTTP状态码 404 200
    public $code = 400;
    // 错误具体信息
    public $msg = '参数错误'; // 最好是写成英文，代码更漂亮
    // 自定义的错误码
    public $errorCode = 10000;

    public function __construct($params = [])
    {
        if (!is_array($params)){
            return;
            //throw new Exception('参数必须是一个数组');
        }
        // 判断关联数据是否有对应的键
        if (array_key_exists('code', $params)){
            $this->code = $params['code'];
        }

        if (array_key_exists('msg', $params)){
            $this->msg = $params['msg'];
        }

        if (array_key_exists('errorCode', $params)){
            $this->errorCode = $params['errorCode'];
        }
    }
}