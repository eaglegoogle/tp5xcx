<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/5/23
 * Time: 10:32
 */

namespace app\lib\exception;


class ParameterException extends BaseException
{
    // 下面的值都是缺省值 到时自定义的值会覆盖掉
    public $code = 400;
    public $msg = '参数错误';
    public $errorCode = 10000; //将它记录进error_code文档
}