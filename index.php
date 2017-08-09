<?php

/**
 * Created by PhpStorm.
 * User: AivyYuan
 * Date: 2017/8/8
 * Time: 16:11
 */
require "weixin.php";
$weixin = new weixin();
$postData = '{
"button":[
{
"name":"测试1",
"sub_button":[
{
"type":"click",
"name":"子菜单名1",
"key":"name1"
},
{
"type":"click",
"name":"子菜单名2",
"key":"name2"
}
]
},
{
"type":"view",
"name":"aboutus",
"url":"http://www.baidu.com"
}
]
}';
try{
    $weixin->getMenu();
}catch (Exception $e){
    echo $e->getMessage();
}


