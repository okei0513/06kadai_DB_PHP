<?php

// DB接続情報
//「dbname」「port」「host」「username」「password」を設定
$dbn = 'mysql:dbname=gsacf_DEV8_04_kada;charset=utf8;port=3306;host=localhost';
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
$sql = 'SELECT * FROM todo_table';

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

<body>
    <fieldset>
        <legend>登録一覧</legend>
        <a href="input.php">入力画面へ</a>
        <table>
            <thead>
                <tr>
                    <th>username</th>
                    <th>mail</th>
                    <th>gender</th>
                    <th>age</th>
                    <th>kijutu</th>
                </tr>
            </thead>
            <tbody>
                <!-- ここに<tr><td>deadline</td><td>todo</td><tr>の形でデータが入る -->
                <?= $output ?>
            </tbody>
        </table>
    </fieldset>
</body>

</html>