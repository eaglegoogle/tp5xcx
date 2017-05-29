<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/5/22
 * Time: 9:55
 */

namespace app\api\validate;


use app\lib\exception\BaseException;
use app\lib\exception\ParameterException;
use think\Exception;
use think\Request;
use think\Validate;

class BaseValidate extends Validate
{
    public function goCheck(){
        // 想下独立验证的步骤：获取HTTP传入的参数；对这些参数做校验，之后返回check的结果。
        $params = Request::instance()->param();
        // 我们是在这个类的内部调用这个方法，所以不用new一个验证器出来 $validate = new IDMustPositiveInt();而是直接通过$this调用即可
        $result = $this->batch()->check($params);
        if (!$result) {
            // 不符合则中断，并返回错误信息给客户端
            //$this->getError();
            //$error = $this->error;
            //throw new Exception($error); // 先简单抛出一个tp5的异常，到时讲到全局异常时我们再抛出一下自定义的异常

            //$e = new BaseException();
            //$e->msg = $this->error;
            //$e->errorCode = 10002;
            //throw $e;

            //$e = new ParameterException();
            //$e->msg = $this->error;
            //throw $e;

            $e = new ParameterException([
                'msg' => $this->error,
                //'code' => 400,
                //'errorCode' => 10002
            ]);
            throw $e;

        } else {
            return true;
        }
    }
}