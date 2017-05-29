<?php

namespace app\api\model;

class Image extends BaseModel
{
    protected $hidden = ['id', 'from', 'delete_time', 'update_time'];

    // 读取器 $value当前字段值；$data一条记录值
    public function getUrlAttr($value, $data){
        return $this->prefixImgUrl($value, $data);
    }
}
