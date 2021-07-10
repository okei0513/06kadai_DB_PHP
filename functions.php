<?php
//関数の定義
function connect_to_db()
{
    $dbn = 'mysql:dbname=gsacf_DEV8_04_kadai;charset=utf8;port=3306;host=localhost';
    $user = 'root';
    $pwd = '';

    try {
        return new PDO($dbn, $user, $pwd); //返してもらう
    } catch (PDOException $e) {
        echo json_encode(["db error" => "{$e->getMessage()}"]);
        exit();
    }
}
