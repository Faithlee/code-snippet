<?php

function __autoload($className) 
{
    $file = '../' . $className . '.php';

    try {
        if (!file_exists($file)) {
            throw new Exception("the file not exists!\n");
        }
        
        require $file;
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}

$product = new CDProduct('cards', 30, 'green');

$reflectObj = new ReflectionClass('CDProduct');
$method = $reflectObj->getMethod('getSummaryLine');

//var_dump($method);
//获取文件路径
$file = $method->getFileName();

//获取文件每行的内容
$lineInfo = file($file);

//获取当前方法的开始行
$startLine = $method->getStartLine();

//获取当前方法的结束行
$endLine = $method->getEndLine();

$content = array_slice($lineInfo, $startLine - 1, $endLine);

//获取类的参数：
$method2 = $reflectObj->getMethod('__construct');
$paramObj = $method2->getParameters();

//getName()方法、getClass()方法

$param1 = $paramObj[0];

$name = $param1->getName();

$class = $param1->getClass();

print_r($class);





?>
