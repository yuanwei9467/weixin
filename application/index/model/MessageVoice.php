<?php
/**
 * Created by PhpStorm.
 * User: AivyYuan
 * Date: 2017/8/11
 * Time: 15:12
 */
namespace app\index\model;

use think\Model;

class MessageVoice extends Model{
    public static function saveVoice($data){
        return self::save($data);
    }
}