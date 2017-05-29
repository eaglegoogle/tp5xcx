<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/5/22
 * Time: 10:41
 */

namespace app\api\model;


use think\Db;
use think\Exception;
use think\Model;

class Banner extends BaseModel
{
    //protected $table = 'image';
    protected $hidden = ['update_time', 'delete_time'];
    public function items(){
        return $this->hasMany('banner_item', 'banner_id', 'id');
    }
//    public function items2(){
//
//    }

    public static function getBannerByID($id){
        //TODO:根据banner ID号 获取banner信息
        /*try{
            1/0;  //异常
        } catch (Exception $e){
            //TODO: 处理异常，可以记录日志.
            //之后抛出异常，抛到控制器去了
            throw $e;
        }
        return 'this is a banner info';*/
        //return null;

        // Db类操作。query接收两个参数
        //$result = Db::query('SELECT * FROM `banner_item` WHERE `banner_id`=?', [$id]);
        //return $result;

        //find()方法返回的是一维数组；select()方法返回的是二维数组【代表多条记录】。两种不同的数据结构
        //$table = Db::table('banner_item');
        //$where = Db::table('banner_item')->where('banner_id', '=', $id);
        $result = Db::table('banner_item')->where('banner_id', '=', $id)->select();

        //Db::table('banner_item');
        //Db::where('banner_id', '=', $id);
        //$result = Db::select();

        //where('字段名', '表达式', '查询条件');
        //表达式法，数组法，闭包
        /*$result = Db::table('banner_item')
            //->fetchSql()   // 使用此特殊的链式方法，即使有使用select()方法，也不会真实去执行SQL，而是会返回一个组装好的SQL语句
            ->where(function($query) use ($id){  //$query就是查询器的Query对象 $id参数不能直接传进来需要用use
                $query->where('banner_id', '=', $id);  //闭包里还可以一直构造链式，但不可以接select这种生成SQL语句的方法
            })
            ->select();
        return $result;*/

        $banner = self::with(['items', 'items.img'])->find($id);
        return $banner;

    }
}