<?php
// var_dump($_POST);
// exit();

//入力チェック
if (
    !isset($_POST['username']) || $_POST['username'] == '' ||
    !isset($_POST['mail']) || $_POST['mail'] == '' ||
    !isset($_POST['gender']) || $_POST['gender'] == '' ||
    !isset($_POST['age']) || $_POST['age'] == '' ||
    !isset($_POST['kijutu']) || $_POST['kijutu'] == ''
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
include('functions.php');
$pdo = connect_to_db();

//悪意のある誰かが何かを送ってくる可能性
//SQLで表示⇨VALUESを編集
$sql = 'INSERT INTO user_touroku(id, username, mail, gender, age, kijutu)
        VALUES(NULL, :username, :mail, :gender, :age, :kijutu)';

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
    echo json_encode(["error_msg" => "{$error[2]}"]);
    exit();
} else {
    header("Location:input.php");
    exit();
}

//登録しているユーザーの情報
//ユーザー名・アドレス・性別・年齢・健康上で気になっていること（選べたらより良い）
//送信