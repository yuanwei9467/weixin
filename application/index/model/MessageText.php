<?php
/**
 * Created by PhpStorm.
 * User: AivyYuan
 * Date: 2017/8/11
 * Time: 15:11
 */
namespace app\index\model;

use think\Model;

class MessageText extends Model{
    public static function saveText($data){
        return self::save($data);
    }
}