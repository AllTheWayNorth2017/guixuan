<?php

    $ch = curl_init();
    $bj = "01151604";
    curl_setopt($ch, CURLOPT_URL, "http://jwzx.cqupt.edu.cn/jwzxtmp/showBjStu.php?bj=".$bj);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HEADER, 1);
    $result = curl_exec($ch);
    preg_match_all("/<tr>.*<\/tr>/U", $result, $num);
    // var_dump($num[0]);

    require_once 'conn.php';
    $query = $pdo -> prepare("SELECT id from class");
    if(!$query -> execute()) {

        for($i = 0;$i<31;$i++) {

            preg_match_all("/(?<=<td>).+(?=<\/td>)/U", $num[0][$i], $value);
            // var_dump($value);

            $stmt = $pdo -> prepare("INSERT INTO class(id, num, name, gender, class, majornum, major, academy, grade, status) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bindValue(1, $value[0][0], PDO::PARAM_INT);
            $stmt->bindValue(2, $value[0][1], PDO::PARAM_INT);
            $stmt->bindValue(3, $value[0][2], PDO::PARAM_STR);
            $stmt->bindValue(4, $value[0][3], PDO::PARAM_INT);
            $stmt->bindValue(5, $value[0][4], PDO::PARAM_STR);
            $stmt->bindValue(6, $value[0][5], PDO::PARAM_STR);
            $stmt->bindValue(7, $value[0][6], PDO::PARAM_STR);
            $stmt->bindValue(8, $value[0][7], PDO::PARAM_STR);
            $stmt->bindValue(9, $value[0][8], PDO::PARAM_INT);
            $stmt->bindValue(10, $value[0][9], PDO::PARAM_STR);
            $stmt->execute();

        }
            // print_r($stmt->errorInfo());
    } else {
            echo "数据已存在";
    }

    echo "<br>存入数据库成功";

    curl_close($ch);

