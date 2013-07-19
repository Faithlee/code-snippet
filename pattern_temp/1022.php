<?php
function __autoload($className) {
    $file = "../{$className}.php";

    try {
        if (!file_exists($file)) {
            throw new Exception("the file cant found!\n");
        }    
        include "{$file}";
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}

$cdproductObj = new CDProduct('cdrecode', 20, 'red');

$reflectObj = new ReflectionClass('CDProduct');

//reflection::export($reflectObj);

//检查类：
function classData(ReflectionClass $class) {
    $detail = '';
    $name = $class->getName();
    if ($class->isUserDefined()) {
        $detail .= "{$name} is user defined\n";
    }

    //isInternal()

    //isInterface()

    //isAbstract()

    //isInstantiable()

    return $detail;
} 

echo classData($reflectObj);



?>
