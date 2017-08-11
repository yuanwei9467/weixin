<?php
/**
 * Created by PhpStorm.
 * User: AivyYuan
 * Date: 2017/8/11
 * Time: 15:12
 */
namespace app\index\model;

use think\Model;

class MessageVideo extends Model{
    public static function saveVideo($data){
        return self::save($data);
    }
}