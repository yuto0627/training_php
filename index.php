<html>

<head>
    <link rel="stylesheet" href="/docker/web/css/index.css">
</head>

<body>
    <div class="header-left">
        <header class="header-letter">
            Bulletin Board
        </header>
    </div>

    <div class="login-screen upper">
        <h1>Bulletin Board</h1>
        <p>ログイン画面</p>
    </div>

    <div class="back-square">
        <div class="login-screen">
            <h2>ログイン</h2>
            <p>ユーザーIDとパスワードを登録してください。</p>
        </div>

        <div class="login-screen">
            <form method="post" action="login">
                <input type="text" maxlength="20" pattern=“^[0-9A-Za-z]+$” placeholder="ユーザーID">
                <input type="password" maxlength="30" pattern=“^[0-9A-Za-z]+$” placeholder="パスワード">
            </form>
        </div>

        <div class="login-button">
            <button onclick="location.href='login'">ログインする</button>
        </div>

        <a href="/docker/web/php/createAccount.php">新規追加はこちら</a>

    </div>
</body>

</html>