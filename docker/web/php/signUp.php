<?php
require_once '../../db/UsersTable.php';

$db = new UsersTable();
$errorMessage = "";

// 新規登録ボタンが押された場合
if (isset($_POST['register'])) {
    // ユーザーID、パスワードの入力チェック
    if (empty($_POST['reg_id'])) {
        $errorMessage = 'ユーザーIDが未入力です。';
    }
    if (empty($_POST['reg_password'])) {
        $errorMessage = 'パスワードが未入力です。';
    }
    if (!empty($_POST['reg_id']) && !empty($_POST['reg_password'])) {
        $errorMessage = $db->signUP();
    }
}

// 新規登録ボタンが押された場合
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

?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>掲示板</title>
    <link rel="stylesheet" type="text/css" href="../css/loginStyle.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script src="../js/signUp.js" type="text/javascript"></script>
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
                <span class="disp_title">新規追加画面</span>
            </div>
        </div>
        <div class="error">
            <?php echo $errorMessage; ?>
        </div>
        <div class="modal">
            <div class="close-modal">
                <i class="fa fa-2x fa-times"></i>
            </div>
            <div class="title">
                新規追加
            </div>
            <div>ユーザーIDとパスワードを登録してください。</div>
            <div class="error">
                <?php echo $errorMessage; ?>
            </div>
            <form action="" name="user_form" method="POST" onsubmit="return check()">
                <div class="input_form">
                    <label class="label" for="reg_id">ユーザーID</label>
                    <input type="text" name="reg_id" id="reg_id">
                </div>
                <div class="input_form">
                    <label class="label" for="reg_password">パスワード</label>
                    <input type="password" name="reg_password" id="reg_password">
                </div>
                <div class="input_form">
                    <label class="label" for="check_password">パスワード確認</label>
                    <input type="password" name="check_password" id="check_password">
                </div>
                <div class="log_btn_area">
                    <input class="log_btn" type="submit" value="登録する" name="register" id="signUp">
                </div>
            </form>
        </div>
    </div>
</body>

</html>