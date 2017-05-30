<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/5/30
 * Time: 0:30
 */

namespace app\api\model;


class Theme extends BaseModel
{
    protected $hidden = ['update_time', 'delete_time', 'topic_img_id', 'head_img_id'];

    public function topicImg(){
        return $this->belongsTo('Image', 'topic_img_id', 'id');
    }

    public function headImg(){
        return $this->belongsTo('Image', 'head_img_id', 'id');
    }

//    public static function getThemeById($id){
//        return self::with(['topicImg', 'headImg'])->find($id);
//    }

    public function products(){
        // 多对多[四个变量，后面三个变量都与中间表相关]：关联模型，关联两者的关联表，关联表里的关联模型的主键，关联表里的当前模型的主键
        return $this->belongsToMany('Product', 'theme_product', 'product_id', 'theme_id');
    }


}