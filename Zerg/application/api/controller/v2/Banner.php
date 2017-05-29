<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/5/20
 * Time: 13:35
 */

namespace app\api\controller\v2;

class Banner
{
    /**
     * @url /banner/:id
     * @http GET
     * @id banner的id号
     */
    public function getBanner($id)
    {
        return 'This is V2 version';
    }
}