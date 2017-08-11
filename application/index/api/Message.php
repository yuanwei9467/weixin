<?php
/**
 * Created by PhpStorm.
 * User: AivyYuan
 * Date: 2017/8/11
 * Time: 13:55
 */
namespace app\index\api;

class Message{
    public static $message;
    public static $receive_data ;
    public static function receive($type,$data,$reply = 0){
        self::$message = new \app\index\model\Message();
        self::$receive_data = $data;
        self::$type($data);
        if($reply){
            echo self::replyText($data);
        }else{
            echo "success";
        }
        exit;

    }
    //接收文本消息
    public static function text($data){
        return self::$message->saveText($data);
    }
    //接收图片消息
    public static function image($data){
        return self::$message->saveImage($data);
    }
    //接收语音消息
    public static function voice($data){
        return self::$message->saveVoice($data);
    }
    //接收视频消息
    public static function video($data){
        return self::$message->saveVideo($data);
    }
    //接收段视频
    public static function shortvideo($data){
        return self::$message->saveVideo($data);
    }
    //回复文本消息
    public static function replyText($data){
            $time = time();
            $str = <<<EOT
    <xml>
    <ToUserName>$data->FromUserName</ToUserName>
    <FromUserName><![CDATA[$data->ToUserName]]></FromUserName>
    <CreateTime>$time</CreateTime>
    <MsgType><![CDATA[text]]></MsgType>
    <Content><![CDATA[你好]]></Content>
    </xml>
EOT;

    }
}