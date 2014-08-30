<?php
/**
 * @FileName: error.php
 * @Desc: 
 * @Author: Faithlee098
 * @Mail: lijiabin098@126.com 
 * @CTime: Sat 30 Aug 2014 10:35:00 PM CST
 */

mysql_connect("inexistent"); //Generate an error. The actual error handler is set by default

function foo1() {echo "<br>Error foo1<br>";}
function foo2() {echo "<br>Error foo2<br>";}
function foo3() {echo "<br>Error foo3<br>";}

set_error_handler("foo1");    //current error handler: foo1
set_error_handler("foo2");    //current error handler: foo2
set_error_handler("foo3");    //current error handler: foo3

mysql_connect("inexistent");    

restore_error_handler();        //now, current error handler: foo2
mysql_connect("inexistent");     

restore_error_handler();        //now, current error handler: foo1
mysql_connect("inexistent"); 

restore_error_handler();        //now current error handler: default handler
mysql_connect("inexistent");

restore_error_handler(); 
