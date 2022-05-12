<html>

<head>
    <link rel="stylesheet" href="index.css">
</head>

<body>
    <div class="body">
        <div class="header_left">
            <header class="header_letter">
                Bulletine Board
            </header>
        </div>

        <div class="login_screen upper">
            <h1>Bulletine Board</h1>
            <p class="login_letter">ログイン画面</p>
        </div>

        <div class="login_screen greybox">
            <div>
                <h2>ログイン</h2>
                <p>ユーザーIDとパスワードを入力してください。</p>
            </div>

            <div>
                <input type="text" value="" placeholder="ユーザーID">
                <input type="text" value="" placeholder="パスワード">
            </div>

            <div>
                <div class="login_button">
                    <form type="submit">
                        <button onclick="location.href='login'">ログインする</button>
                    </form>
                </div>
                <div>
                    <a href="docker/web/php/createAccount.php">新規追加はこちら</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>