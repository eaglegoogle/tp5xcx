<?php

namespace app\api\model;

use think\Model;

class BaseModel extends Model
{
    // 读取器 $value当前字段值；$data一条记录值
    /*public function getUrlAttr($value, $data){
        $finalUrl = $value;
        if ($data['from'] == 1){
            $finalUrl = config('setting.img_prefix') . $value;
        }
        return $finalUrl;
    }*/
    protected function prefixImgUrl($value, $data){
        $finalUrl = $value;
        if ($data['from'] == 1){
            $finalUrl = config('setting.img_prefix') . $value;
        }
        return $finalUrl;
    }
}
