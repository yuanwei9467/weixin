<?php
namespace app\index\controller;

use app\index\model\Message;
use think\Request;

class Index
{
    public function index()
    {
        if(Request::instance()->has('echostr')){
            return $this->verify();
        }else{
            return $this->receivemsg();
        }
    }
    //验签
    public function verify(){
        $signature = $_GET['signature'];
        $timestamp = $_GET['timestamp'];
        $nonce = $_GET['nonce'];
        $echostr = $_GET['echostr'];
        $data = array(123456,$timestamp,$nonce);
        sort($data,SORT_STRING);

        $str = sha1(implode($data));

        if($str == $signature){
            echo $echostr;
            exit;
        }
    }
    //接收消息
    public function receivemsg(){
        $data = $GLOBALS['HTTP_RAW_POST_DATA'];
        $p = xml_parser_create();
        xml_parse_into_struct($p, $data, $vals, $index);
        xml_parser_free($p);

        $to_user = $vals[2]['value'];
        $from_user = $vals[3]['value'];
        $time = $vals[4]['value'];
        $type = $vals[5]['value'];
        $content = $vals[6]['value'];
        $msgid = $vals[7]['value'];
        $message = new Message();
        $message->to_user = $to_user;
        $message->from_user = $from_user;
        $message->time = $time;
        $message->type = $type;
        $message->content = $content;
        $message->msgid = $msgid;
        $message->save();
        }
}
