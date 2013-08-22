<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Administrator
 * Date: 13-8-11
 * Time: 下午2:46
 * To change this template use File | Settings | File Templates.
 */
function __autoload($className) {
    require $className .'.class.php';
}

$actionDir = $_GET['path'];
$dirObj = new Dir($actionDir);

if (isset($_POST['btn'])) {

    if (empty($_GET['path'])) {
        echo '<script>alert("请指定创建目录的父目录！");history.back();</script>';
    }


    $createDir = $actionDir . '/' . $_POST['dirname'];
    $res = $dirObj->createDir($createDir);
    $createInfo = $res ? '创建成功！' : '创建失败！';
    echo '<script>alert("'.$createInfo.'");history.back(-2);</script>';
} else {

    if (isset($_GET['action']) && $_GET['action'] == 'createdir') {

        echo '<form action="" method="post">';
        echo '创建目录名称：<input type="text" name="dirname">';
        echo '<input type="submit" name="btn" value="创建">';
        echo '</form>';
    } else if (isset($_GET['action']) && $_GET['action'] == 'getdirsize') {

       // $dirPath = $_GET['path'];
        $dirSize = $dirObj->getFileSize($actionDir);
        echo $dirSize;

    } else if (isset($_GET['action']) && $_GET['action'] == 'deldir') {

        $del = $dirObj->delFile($actionDir);

        if ($del) {
            echo '<script>alert("'.$actionDir.'删除成功！");history.back();</script>';
        } else {
            echo '<script>alert("删除失败！");history.back();</script>';
        }

    } else if (isset($_GET['action']) && $_GET['action'] == 'copydir'){

        $copy = $dirObj->copyFile($actionDir, $_GET['destdir']);

        if (!$copy) {
            echo '<script>alert("'.$actionDir.'复制失败！");history.back();</script>';
        } else {
            echo '<script>alert("'.$actionDir.'复制成功！");history.back();</script>';
        }

    } else {
        echo '操作错误！';
    }

}

