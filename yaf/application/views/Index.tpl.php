<?php
/**
 * @FileName: Index.php
 * @Desc: 
 * @Author: Faithlee
 * @Mail: lijiabin098@126.com 
 * @CTime: Thu 27 Nov 2014 11:48:55 PM CST
 */

echo '模板输出！';
#处理$this->return无效
var_dump($this->return, $return);
?>

<?=$return;?><br/>

<?=$front->showProduct('苹果');#引入ele文件?><br/>

<?=$title?>
