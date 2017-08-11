<?php
namespace app\index\controller;

use app\index\model\Message;
use think\Request;
use think\Log;

class Index
{
    public function index()
    {
        if(Request::instance()->has('echostr')){
            return $this->verify();
        }else{
            $data = isset($GLOBALS['HTTP_RAW_POST_DATA']) ? $GLOBALS['HTTP_RAW_POST_DATA']:'';
            if(empty($data)){
                echo '';
                exit;
            }
            $xml = simplexml_load_string($data);
            //接收消息
            if(isset($xml->MsgType) && isset($xml->MsgId)){
                \app\index\api\Message::receive($xml->MsgType,$xml,1);
            }

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
        $data = isset($GLOBALS['HTTP_RAW_POST_DATA']) ? $GLOBALS['HTTP_RAW_POST_DATA']:'';
        Log::write($data,"info");
        if(empty($data)){
            echo '';
            exit;
        }
        $p = xml_parser_create();
        xml_parse_into_struct($p, $data, $vals, $index);
        xml_parser_free($p);
        Log::write($vals,"info");

        $to_user = $vals[1]['value'] ;
        $from_user = $vals[3]['value'];
        $time = $vals[5]['value'];
        $type = $vals[7]['value'];
        $content = $vals[9]['value'];
        $msgid = $vals[11]['value'];
        $message = new Message();
        $message->to_user = $to_user;
        $message->from_user = $from_user;
        $message->time = $time;
        $message->type = $type;
        $message->content = $content;
        $message->msgid = $msgid;
        if($message->save()){
            echo "success";   //需要回复信息给微信服务器，否则会出现该微信公众号无法提供服务，请稍后再试
            exit;
        }else{

        }

        }

}
