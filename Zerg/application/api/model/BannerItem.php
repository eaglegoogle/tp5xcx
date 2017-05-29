<?php

namespace app\api\model;

use think\Model;

class BannerItem extends BaseModel
{
    protected $hidden = ['id', 'update_time', 'delete_time', 'img_id', 'banner_id'];
//    protected $visible = [];
    public function img(){
        return $this->belongsTo('Image', 'img_id', 'id');
    }
}
