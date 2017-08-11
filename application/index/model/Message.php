<?php
/**
 * Created by PhpStorm.
 * User: AivyYuan
 * Date: 2017/8/10
 * Time: 16:47
 */
namespace app\index\model;

use think\Model;

class Message extends Model{
    //保存文本消息
    public function saveText($data){
        $this->to_user = $data->ToUserName;
        $this->from_user = $data->FromUserName;
        $this->time = time();
        $this->type = $data->MsgType;
        $this->msgid = $data->MsgId;
        $this->transaction();
        $message_id = $this->id;
        $text_data['message_id']  = $message_id;
        $text_data['content']  = $data->content;
        MessageText::saveText($text_data);
        $this->commit();



    }
    //保存图片消息
    public function saveImage($data){
        $this->to_user = $data->ToUserName;
        $this->from_user = $data->FromUserName;
        $this->time = time();
        $this->type = $data->MsgType;
        $this->msgid = $data->MsgId;
        $this->transaction();
        $message_id = $this->id;
        $text_data['message_id']  = $message_id;
        $text_data['pic_url']  = $data->PicUrl;
        $text_data['media_id']  = $data->MediaId;
        MessageImage::saveImage($text_data);
        $this->commit();
    }
    //保存语音消息
    public function saveVoice($data){
        $this->to_user = $data->ToUserName;
        $this->from_user = $data->FromUserName;
        $this->time = time();
        $this->type = $data->MsgType;
        $this->msgid = $data->MsgId;
        $this->transaction();
        $message_id = $this->id;
        $text_data['message_id']  = $message_id;
        $text_data['media_id']  = $data->MediaId;
        $text_data['format']  = $data->Format;
        MessageVoice::saveVoice($text_data);
        $this->commit();
    }
    //保存视频消息
    public function saveVideo($data){
        $this->to_user = $data->ToUserName;
        $this->from_user = $data->FromUserName;
        $this->time = time();
        $this->type = $data->MsgType;
        $this->msgid = $data->MsgId;
        $this->transaction();
        $message_id = $this->id;
        $text_data['message_id']  = $message_id;
        $text_data['media_id']  = $data->MediaId;
        $text_data['thumb_media_id']  = $data->ThumbMediaId;
        MessageVideo::saveVideo($text_data);
        $this->commit();
    }
}