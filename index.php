<?php

require_once('docker/web/php/Validation.php');
require_once('docker/db/usersTable.php');

// ログインボタンが押された時
session_start();
if (isset($_POST["login"])) {
    $loginuserid = htmlspecialchars($_POST["loginUserId"]);
    $loginpassword = ($_POST["loginPassword"]);
    $loginvalidationcheck = new Validation();
    $loginerrormessege = $loginvalidationcheck->loginValidation($loginuserid, $loginpassword);
    if (!empty($loginerrormessege)) {
        echo "<script>alert('$loginerrormessege')</script>";
    } else {
        header('Location:docker/web/php/post.php');
    }
}

?>

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

        <form method="post" action="">
            <div class="login-screen">
                <input type="text" name="loginUserId" maxlength="20" placeholder="ユーザーID">
                <input type="password" name="loginPassword" maxlength="30" placeholder="パスワード">
            </div>

            <div class="login-button">
                <input type="submit" name="login" value="ログインする">
            </div>
        </form>

        <a href="/docker/web/php/createAccount.php">新規追加はこちら</a>

    </div>
</body>

</html>