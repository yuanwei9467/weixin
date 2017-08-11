<?php
/**
 * Created by PhpStorm.
 * User: AivyYuan
 * Date: 2017/8/11
 * Time: 15:12
 */
namespace app\index\model;

use think\Model;

class MessageImage extends Model{
    public static function saveImage($data){
        return self::save($data);
    }
}