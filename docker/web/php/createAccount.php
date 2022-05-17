<?php

require_once('validationUtil.php');
require_once('../../db/usersTable.php');

// 登録ボタンが押された時
if (isset($_POST["signUp"])) {
    $userId = htmlspecialchars($_POST["userId"], ENT_QUOTES);
    $password = ($_POST["password"]);
    $passwordCheck = ($_POST["passwordCheck"]);
    $passwordHash = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $passwordCheckHash = password_hash($_POST["passwordCheck"], PASSWORD_DEFAULT);
    $validationCheck = new validationUtil();
    $errorMessage = $validationCheck->validation($userId, $password, $passwordCheck);
    if (!empty($errorMessage)) {
        echo "<script>alert('$errorMessage')</script>";
    } else {
        $data = new usersTable();
        $data->regist($userId, $passwordHash);
    }
}
?>

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

        <form action="" method="post">
            <div class="createaccount-screen">
                <input type="text" maxlength="20" name="userId" placeholder="ユーザーID">
            </div>

            <div class="login-screen">
                <input type="password" maxlength="30" name="password" placeholder="パスワード">
                <input type="password" maxlength="30" name="passwordCheck" placeholder="パスワード確認">
            </div>

            <div class="login-button">
                <input type="submit" name="signUp" value="登録する">
            </div>
        </form>
    </div>
    </div>
</body>

</html>