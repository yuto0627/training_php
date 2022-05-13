<html>

<head>
    <link rel="stylesheet" href="/docker/web/css/createAccount.css">
</head>

<body>
    <div class="header-left">
        <header class="header-letter">
            Bulltin Board
        </header>
    </div>

    <div class="return-button">
        <input onclick="location.href='../../../index.php'" value="戻る">
    </div>

    <div class="login-screen upper">
        <h1>Bulltin Board</h1>
        <p>新規追加画面</p>
    </div>

    <div class="back-square">
        <div class="login-screen">
            <h2>新規追加</h2>
            <p>ユーザーIDとパスワードを登録してください。</p>
        </div>

        <div class="createaccount-screen">
            <form method="post" action="login">
                <input type="text" placeholder="ユーザーID">
            </form>
        </div>

        <div class="login-screen">
            <input type="text" placeholder="パスワード">
            <input type="text" placeholder="パスワード確認">
        </div>

        <div class="login-button">
            <button onclick="location.href='login'">登録する</button>
        </div>
    </div>
</body>

</html>