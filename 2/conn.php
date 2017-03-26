<?php

try{
    $pdo = new PDO(
        "mysql:host=127.0.0.1;dbname=myclass;charest=utf8;port=3306",
        "root",
        "1234"
    );
    $pdo -> exec("set names utf8");
} catch(PDOException $e) {
    echo "数据库连接失败" . $e->getMessage();
    exit;
}

