<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/5/20
 * Time: 16:08
 */

namespace app\api\validate;


class IDMustPositiveInt extends BaseValidate
{
    protected $rule = [
        'id' => 'require|isPositiveInteger'
    ];
    // 我们自定义一个检测正整数的方法:
    // 值，规则，数据，字段
    protected function isPositiveInteger($value, $rule = '',
        $data = '', $field = '')
    {
        if (is_numeric($value) && is_int($value+0) && ($value+0)>0){
            // $data[$field] 等同于 $value
            return true;
        } else {
            return $field.'必须是正整数'; // 不满足则返回错误提示信息即可
        }
    }
}