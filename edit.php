<?php
//更新ページ
// var_dump($_POST);
// exit();

// 関数ファイル読み込み
include('functions.php');
// 送信されたidをgetで受け取る
$id = $_GET['id'];

// DB接続&id名でテーブルから検索
$pdo = connect_to_db();
$sql = 'SELECT * FROM user_touroku WHERE id=:id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

// fetch()で1レコード取得できる．
if ($status == false) {
  $error = $stmt->errorInfo();
  echo json_encode(["error_msg" => "{$error[2]}"]);
  exit();
} else {
  $record = $stmt->fetch(PDO::FETCH_ASSOC);
}

?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>編集画面</title>
</head>

<body>
  <form action="update.php" method="POST">
    <fieldset>
      <legend>編集画面</legend>
      <div class="main_box_text">
        <div class="koumoku">
          ユーザー名：<input type="text" name="username" value="<?= $record["username"] ?>">
        </div>
        <div class="koumoku">
          メールアドレス：<input type="text" name="mail" value="<?= $record["mail"] ?>">
        </div>
        <div class="koumoku">
          <!-- 更新ページの↓このradioボタンの性別を初期値として設定する方法が分からずエラーになる -->
          性別：<input type="radio" name="gender" value="男性" value="<?= $record["gender"] ?>">男
          <input type="radio" name="gender" value="女性" value="<?= $record["gender"] ?>">女
        </div>
        <div class="koumoku">
          年齢：<input type="text" name="age" value="<?= $record["age"] ?>">
        </div>
        <div class="koumoku">
          健康上気になる点：<input type="text" name="kijutu" value="<?= $record["kijutu"] ?>">
        </div>

        <div class="koumoku">
          <button>送信</button>
        </div>
      </div>
      <a href="read.php">一覧画面</a>
      <!-- // idを見えないように送る.input type="hidden"を使用する！form内に以下を追加 -->
      <input type="hidden" name="id" value="<?= $record['id'] ?>">
      <!-- 更新のformは，登録と同じくpostで各値を送信しています！ -->
      <div>
        <button>submit</button>
      </div>

    </fieldset>
  </form>

</body>

</html>