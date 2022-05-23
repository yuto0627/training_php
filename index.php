<?php
require_once './docker/db/UsersTable.php';

$db = new UsersTable();
$errorMessage = "";

// ログインボタンが押された場合
if (isset($_POST['login'])) {
    // ユーザーID、パスワードの入力チェック
    if (empty($_POST['log_id'])) {
        $errorMessage = 'ユーザーIDが未入力です。';
    } else if (empty($_POST['log_password'])) {
        $errorMessage = 'パスワードが未入力です。';
    } else {
        $db->login();
    }
}

// 削除ボタン押下時
if (isset($_POST['delete'])) {
    $db->deleteUser();
}

$users = $db->getUserList();
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>掲示板</title>
    <link rel="stylesheet" type="text/css" href="./docker/web/css/loginStyle.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
</head>

<body>
    <div id="main">
        <div class="header">
            Bulletin board
        </div>
        <div class="main_title">
            <div>
                <span class="app_title">Bulletin board</span>
                <br>
                <span class="disp_title">ログイン画面</span>
            </div>
        </div>
        <div class="error">
            <?php echo $errorMessage; ?>
        </div>
        <div class="form">
            <div class="title">
                ログイン
            </div>
            <div>
                ユーザーIDとパスワードを入力してください。
            </div>
            <form action="" method="POST">
                <div class="input_form">
                    <label class="label" for="log_id">ユーザーID</label>
                    <input type="text" name="log_id" id="log_id">
                </div>
                <div class="input_form">
                    <label class="label" for="log_password">パスワード</label>
                    <input type="password" name="log_password" id="log_password">
                </div>
                <div class="log_btn_area">
                    <input class="log_btn" type="submit" value="ログインする" name="login">
                </div>
                <div>
                    <a href="/docker/web/php/signUp.php">新規追加はこちら</a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>