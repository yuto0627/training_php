<html>

<head>
    <link rel="stylesheet" href="/docker/web/css/index.css">
</head>

<body>
    <div class="header_left">
        <header class="header_letter">
            Bulltin Board
        </header>
    </div>

    <div class="login_screen upper">
        <h1>Bulltin Board</h1>
        <p>ログイン画面</p>
    </div>

    <div class="back-square">
        <div class="login_screen">
            <h2>ログイン</h2>
            <p>ユーザーIDとパスワードを登録してください。</p>
        </div>

        <div class="login_screen">
            <form method="post" action="login">
                <input type="text" placeholder="ユーザーID">
                <input type="text" placeholder="パスワード">
            </form>
        </div>

        <div class="login_button">
            <button onclick="location.href='login'">ログインする</button>
        </div>

        <a class="authorization_link marker" href="/docker/web/php/createAccount.php">新規追加はこちら</a>

    </div>
</body>
</html>