<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/5/30
 * Time: 0:29
 */

namespace app\api\controller\v1;
use app\api\model\Theme as ThemeModel;
use app\api\validate\IDCollection;
use app\api\validate\IDMustPositiveInt;
use app\lib\exception\ThemeException;

class Theme
{
    /*public function getTheme($id){
        (new IDMustPositiveInt())->goCheck();
        $theme = ThemeModel::getThemeById($id);
        if (!$theme) {
            throw new ThemeException();
        }
        return $theme;
    }*/

    /**
     * @url /theme?ids=id1,id2,id3...
     * @return 一组theme模型
     * @throws
     */
    public function getSimpleList($ids = ''){
        (new IDCollection())->goCheck();
        $ids = explode(',', $ids);
        $result = ThemeModel::with(['topicImg', 'headImg'])->select($ids);  //不可以with('topicImg, headImg')
        if (!$result){
            throw new ThemeException();
        }
        return $result;
    }

    public function getComplexOne($id){
        return 'success';
    }
}