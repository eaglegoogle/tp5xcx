<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/5/20
 * Time: 13:35
 */

namespace app\api\controller\v1;

use app\api\validate\IDMustPositiveInt;
use app\api\model\Banner as BannerModel;//别名
use app\lib\exception\BannerMissException;
use think\Exception;
use think\exception\HttpException;

//use app\api\validate\TestValidate;
//use think\Validate;
class Banner
{
    /**
     * @url /banner/:id
     * @http GET
     * @id banner的id号
     */
    public function getBanner($id)
    {
        //AOP 面向切面思想
        (new IDMustPositiveInt())->goCheck(); // 相当一个拦截器

        //$banner = BannerModel::with(['items', 'items.img'])->find($id);

        //$banner = BannerModel::with('items')->find($id);

        //$banner = BannerModel::with(['items', 'items2'])->find($id);

        //$banner = new BannerModel();
        //$banner = $banner->get($id);

        $banner = BannerModel::getBannerByID($id);
        //$banner = $banner->hidden(['delete_time', 'update_time']);
        //$banner = $banner->visible(['id', 'name', 'items']);

        if (!$banner){
            // log('error');
            throw new BannerMissException();
            //throw new Exception('服务器内部错误');
        }
        ////Db类要返回json，不然会报错: variable type error： array
        return $banner;

        /*try{
            $banner = BannerModel::getBannerByID($id);
        } catch (Exception $e) {
            //可以继续抛出。TP5有一个全局处理类。但这里可以不用抛，可以直接return一个消息给客户端。先定义一个消息的结构体。
            $err = [
                'error_code' => 10001,
                'msg' => $e->getMessage(),
            ];
            return json($err, 400); // 通过TP5的json函数返回给客户端
        }

        // 正常的情况下是直接return回这个信息
        return $banner;*/
        // 但假如上面的数据库错误，是否需要对这个错误进行异常处理呢？第二种情况就是当返回数据为null时，比如ID为50的信息不存在。所以我们需要异常进行分类
    }
}