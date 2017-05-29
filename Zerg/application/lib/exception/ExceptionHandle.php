<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/5/22
 * Time: 13:35
 */

namespace app\lib\exception;


use think\Exception;
use think\Config;
use think\exception\Handle;
use think\Log;
use think\Request;

class ExceptionHandle extends Handle
{
    private $code;
    private $msg;
    private $errorCode;
    //还需要返回客户端当前请求的URL路径，这个不用成员变量，到时组装时返回就好

    public function render(\Exception $e)
    {
        if ($e instanceof BaseException){
            // 如果是自定义的异常
            // 返回具体消息，所以要定义上面三个成员变量。可以根据自己的实际情况增加或减少
            // 上面四个成员变量的值从哪里取出来呢，因为BaseException是已经定义了三个变量，可直接这里取
            $this->code = $e->code;
            $this->msg = $e->msg;
            $this->errorCode = $e->errorCode;
        } else {
            //Config::get('app_debug');
            if (config('app_debug')) {
                //return default error page
                return parent::render($e);
            } else {
                $this->code = 500;
                $this->msg = '服务器内部错误，不想告诉你';
                $this->errorCode = 999;
                $this->recordErrorLog($e);
            }
        }
        $result = [
            'msg' => $this->msg,
            'error_code' => $this->errorCode,
            'request_url' => Request::instance()->url()  //一般请求的东西都先想到TP5的Request类
        ];
        return json($result, $this->code);
    }

    private function recordErrorLog(\Exception $e) {
        Log::init([
            'type' => 'File',
            'path' => LOG_PATH,
            'level' => ['error']
        ]);
        Log::record($e->getMessage(), 'error'); //两个参数：一个是消息；二是错误类型。第二个参数也可以自己定义
    }
}