<?php

//工厂模式：负责生成对象的类或方法
//单例模式：

//shopProduct 类

public static function getInstance($id, PDO $dbh)
{
    $sql = "select * from products where id=?";
    $stmt = $dbh->prepare($sql);
    
    if (!$stmt->exec(array('id' => $id))) {
        $errorInfo = $dbh->errorInfo();
        die($errorInfo);
    }
    
    $row = $stmt->fetch();

    if (empty($row)) {
        return null;
    }

    if ($row['type'] == 'cd') {
        //CD产品的处理方式
    } else if ($row['type'] == 'book'){
        //Book处理
    } else {
        //shopProduct处理方式
    }
    
    $product->setId($row['id']);
    $product->setDiscount($row['discount']);

    return $product;
}





