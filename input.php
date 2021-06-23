<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ユーザー登録（入力画面）</title>
</head>

<body>
    <form action="create.php" method="POST">
        <fieldset>
            <legend>ユーザー登録</legend>
            <div>
                ユーザー名：<input type="text" name="username">
            </div>
            <div>
                メールアドレス：<input type="text" name="mail">
            </div>
            <div>
                性別：<input type="radio" name="gender" value="男性">男
                <input type="radio" name="gender" value="女性">女
            </div>
            <div>
                年齢：<input type="text" name="age">
            </div>
            <div>
                健康上気になる点：<input type="text" name="kijutu">
            </div>

            <div>
                <button>送信</button>
            </div>
            <a href="read.php">一覧画面</a>
        </fieldset>
    </form>

</body>

</html>