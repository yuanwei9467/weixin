<?php
/**
 * Created by PhpStorm.
 * User: AivyYuan
 * Date: 2017/8/9
 * Time: 9:49
 */
class weixin{
    public $access_token;
    const APP_ID = "wxa951174b0c51d641";
    const SERCERT = "874b0e9bac4303b95d36edb57aa8f294";
    public function __construct()
    {
        if(empty($this->access_token)){
            $this->access_token = $this->getAccessToken();
        }
    }

    //封装get方法
    public function get($url){
        $curl = curl_init();
        curl_setopt($curl,CURLOPT_URL,$url);
        curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
        curl_setopt($curl,CURLOPT_HEADER,0);
        $ssl = substr($url, 0, 8) == "https://" ? true : false;
        if($ssl){
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false); // 信任任何证书
            //curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, true); // 检查证书中是否设置域名
        }
        $output = curl_exec($curl);
        if($output === false){
            echo curl_error($curl);
        }
        curl_close($curl);
        return $output;
    }
    //封装post方法
    public function post($url,$data){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        $ssl = substr($url, 0, 8) == "https://" ? true : false;
        if($ssl){
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // 信任任何证书
            //curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, true); // 检查证书中是否设置域名
        }
        $output = curl_exec($ch);

        if(curl_errno($ch)){
            throw new Exception(curl_error($ch));
        }
        return $output;
    }
    //获取token
    public function getAccessToken(){
        if(empty($this->access_token)){
            $access_token_content = $this->get("https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=".self::APP_ID."&secret=".self::SERCERT);
            $access_token_content = json_decode($access_token_content);
            $access_token = $access_token_content->access_token;
            $this->access_token = $access_token;
        }
        return $this->access_token;

    }
    //获取自定义菜单
    public function getMenu(){
        $url = "https://api.weixin.qq.com/cgi-bin/menu/get?access_token=".$this->access_token;
        $content = $this->get($url);

        $content = json_decode($content);

        return $content;

    }
    //创建自定义菜单
    public function createMenu($data){
        $url = "https://api.weixin.qq.com/cgi-bin/menu/create?access_token=".$this->access_token;
       $content =  $this->post($url,$data);
        $content = json_decode($content);
        if($content->errcode != 0){
            throw new Exception($content->errmsg);
        }
        return $content;
    }
}


