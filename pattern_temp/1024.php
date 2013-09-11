<?php

//面向对象与面向过程的区别：职责分配不同，过程化忙于处理细节问题
//如果多种文件格式，则需要处理多次

function readParams($source) {
    $parma = array();

    if (preg_match('/\.xml$/', $source)) {
        //读取方式1
    } else {
        //读取方式2
    }

    return $param;
}

function writeParam($param, $source) {
    if (preg_match('/\.xml$/i', $source)) {
        //写入方式1
    } else {
        //写入方式2
    }
}

?>
