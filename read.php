<?php

// DB接続情報
//「dbname」「port」「host」「username」「password」を設定
$dbn = 'mysql:dbname=gsacf_DEV8_04_kadai;charset=utf8;port=3306;host=localhost';
$user = 'root';
$pwd = '';

// DB接続
try {
    $pdo = new PDO($dbn, $user, $pwd);
} catch (PDOException $e) {
    echo json_encode(["db error" => "{$e->getMessage()}"]);
    exit();
}
//「dbError:...」が表示されたらdb接続でエラーが発生していることがわかる.
// 参照はSELECT文!
$sql = 'SELECT * FROM user_touroku';

$stmt = $pdo->prepare($sql);
$status = $stmt->execute();
//$statusにSQLの実行結果が入る(取得したデータではない点に注意)
// 失敗時にエラーを出力し,成功時は登録画面に戻る
if ($status == false) {
    $error = $stmt->errorInfo();
    // データ登録失敗次にエラーを表示
    exit('sqlError:' . $error[2]);
} else {
    //成功の場合
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $output = "";
    foreach ($result as $record) {
        $output .= "<tr>";
        $output .= "<td>{$record["username"]}</td>";
        $output .= "<td>{$record["mail"]}</td>";
        $output .= "<td>{$record["gender"]}</td>";
        $output .= "<td>{$record["age"]}</td>";
        $output .= "<td>{$record["kijutu"]}</td>";
        $output .= "</tr>";
    }
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>登録一覧</title>
</head>

<body class="all_box">
    <fieldset class="main_box">
        <legend class="title">登録一覧</legend>

        <table class="table_box">
            <thead>
                <tr>
                    <th>ユーザー名</th>
                    <th>mail</th>
                    <th>性別</th>
                    <th>年齢</th>
                    <th>気になること(任意)</th>
                </tr>
            </thead>
            <tbody>
                <!-- ここに<tr><td>deadline</td><td>todo</td><tr>の形でデータが入る -->
                <?= $output ?>
            </tbody>
        </table>
        <a href=" input.php">入力画面へ</a>
    </fieldset>
</body>

<style>
    .all_box {
        background-color: #BBFFFF;
        font-family: Verdana, "ＭＳ Ｐゴシック", sans-serif;
        font-size: 100%;
        margin-top: 100px;
        padding: 0;
        text-align: center;
    }

    .main_box {
        border-color: #5D99FF;
        background-color: white;
        max-width: 650px;
        text-align: center;
        margin: 0 auto;

    }

    .title {
        position: relative;
        background: #dfefff;
        box-shadow: 0px 0px 0px 5px #dfefff;
        border: dashed 2px white;
        padding: 0.2em 0.5em;
        color: #454545;
        font-size: 35px;
    }

    .title:after {
        position: absolute;
        content: '';
        left: -7px;
        top: -7px;
        border-width: 0 0 15px 15px;
        border-style: solid;
        border-color: #fff #fff #a8d4ff;
        box-shadow: 1px 1px 1px rgba(0, 0, 0, 0.15);
    }

    .table_box {
        width: 100%;
    }
</style>

</html>