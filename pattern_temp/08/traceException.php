<?php
/**
 * @FileName: traceException.php
 * @Desc: 追踪异常
 * @Author: Faithlee098
 * @Mail: lijiabin098@126.com 
 * @CTime: Tue 12 Aug 2014 11:14:18 PM CST
 */

class customException extends Exception {}

function doStuff() {
	try {
		throw new InvalidArgumentException('You are doing it wrong', 112);
	} catch (Exception $e) {
		throw new customException('Something happend', 911, $e);
	}
}

//getPrevious()捕获前一个异常
try {
	doStuff();
} catch (Exception $e) {
	do {
		printf("%s:%d %s (%d) [%s]\n", $e->getFile(), $e->getLine(), $e->getMessage(), $e->getCode(), get_class($e));
	} while ($e = $e->getPrevious());
}


