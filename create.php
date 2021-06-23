<?php
// var_dump($_POST);
// exit();

//入力チェック
if (
    !isset($_POST['username']) || $_POST['username'] == '' ||
    !isset($_POST['mail']) || $_POST['mail'] == '' ||
    !isset($_POST['gender']) || $_POST['gender'] == '' ||
    !isset($_POST['age']) || $_POST['age'] == ''
) {
    exit('ParamError');
};

//データを変数に格納
$username = $_POST['username'];
$mail = $_POST['mail'];
$gender = $_POST['gender'];
$age = $_POST['age'];
$kijutu = $_POST['kijutu'];

// DB接続情報
$dbn = 'mysql:dbname=gsacf_DEV8_04_kadai;charset=utf8;port=3306;host=localhost';
$user = 'root';
$pwd = ''; //（空文字）

// DB接続
try {
    $pdo = new PDO($dbn, $user, $pwd);
} catch (PDOException $e) {
    echo json_encode(["db error" => "{$e->getMessage()}"]);
    exit();
}

//悪意のある誰かが何かを送ってくる可能性
//手書きしない。間違う。まずコピーしてSQLで表示⇨VALUESを編集
$sql = 'INSERT INTO
        todo_table(id, username, mail, gender, age, kijutu)
        VALUES(NULL, :username, :mail, :gender, :age, :kijutu, sysdate(), sysdate())';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':username', $username, PDO::PARAM_STR);
$stmt->bindValue(':mail', $mail, PDO::PARAM_STR);
$stmt->bindValue(':gender', $gender, PDO::PARAM_STR);
$stmt->bindValue(':age', $age, PDO::PARAM_STR);
$stmt->bindValue(':kijutu', $kijutu, PDO::PARAM_STR);

$status = $stmt->execute(); // SQLを実行

// 失敗時にエラーを出力し,成功時は登録画面に戻る
if ($status == false) {
    $error = $stmt->errorInfo();
    // データ登録失敗次にエラーを表示
    exit('sqlError:' . $error[2]);
} else {
    // 登録ページへ移動
    header('Location:input.php');
};

//登録しているユーザーの情報
//ユーザー名・アドレス・性別・年齢・健康上で気になっていること（選べたらより良い）
//送信