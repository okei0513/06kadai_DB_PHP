<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ユーザー登録（入力画面）</title>
</head>

<body class="all_box">
    <form action="create.php" method="POST">
        <fieldset class="main_box">
            <legend class="title">ユーザー登録</legend>
            <div class="main_box_text">
                <div class="koumoku">
                    ユーザー名：<input type="text" name="username">
                </div>
                <div class="koumoku">
                    メールアドレス：<input type="text" name="mail">
                </div>
                <div class="koumoku">
                    性別：<input type="radio" name="gender" value="男性">男
                    <input type="radio" name="gender" value="女性">女
                </div>
                <div class="koumoku">
                    年齢：<input type="text" name="age">
                </div>
                <div class="koumoku">
                    健康上気になる点：<input type="text" name="kijutu">
                </div>

                <div class="koumoku">
                    <button>送信</button>
                </div>
            </div>
            <a href="read.php">一覧画面</a>
        </fieldset>
    </form>
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

    }

    .main_box_text {
        display: inline-block;
        text-align: left;
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

    .koumoku {
        padding: 10px 0 10px 0;
    }
</style>

</html>