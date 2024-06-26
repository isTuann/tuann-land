<?php
//存有图片链接的文件名.txt
$filename = '/var/task/user/api/images.txt';
if(!file_exists('/var/task/user/api/images.txt')) {
    die('文件不存在唷！');
}
 
//从文本获取链接
$pics = [];
$fs = fopen($filename, "r");
while(!feof($fs)){
    $line=trim(fgets($fs));
    if($line!=''){
        array_push($pics, $line);
    }
}
 
//从数组随机获取链接
$pic = $pics[array_rand($pics)];

header('Content-type:text/json');
die(json_encode(['url'=>$pic]));
