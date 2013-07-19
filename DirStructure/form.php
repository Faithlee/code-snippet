<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Administrator
 * Date: 13-8-11
 * Time: 上午10:32
 * To change this template use File | Settings | File Templates.
 */

if (!isset($_POST['btn'])) {
   die('请选择上传文件！');
}

include 'uploadFile.class.php';

$uploadFile = new uploadFile('pic', '.', '', false);

//var_dump($uploadFile);

$res = $uploadFile->upload();

if (!$res) {
    var_dump( $uploadFile->getErrorInfo());
} else {
    echo $res->getFilePath();
}



