<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/5/30
 * Time: 17:59
 */

namespace app\api\validate;


class IDCollection extends BaseValidate
{
    protected $rule = [
        'ids' => 'require|checkIDs'
    ];

    protected $message = [
        'ids' => 'ids参数必须是以逗号分隔的多个正整数'
    ];

    // ids=id1,id2,id3...
    protected function checkIDs($value, $rule='', $data='', $field=''){
        $values = explode(',', $value);
        if (empty($values)) return false;
        // 验证每个值是否都为正整数 这个我们之前就有了验证器IDMustPositiveInt，所以我们可以使用。
        // 那么我们怎样使用呢，因为这个验证器里的方法都是protected的。有同学会想直接将那里的方法抽取拿过来放这个类里，但这样不体现代码的复用性
        // 所以我们正确的做法是将验证器IDMustPositiveInt里的isPositiveInteger这个方法放在基类验证器里即可。
        foreach ($values as $id){
            if (!$this->isPositiveInteger($id)){
                return false;
            }
        }
        return true;
    }
}