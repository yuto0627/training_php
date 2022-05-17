<?php
require_once('../../db/usersTable.php'); //importと同じ役割

class validationUtil
{

    public function validation($userId, $password, $passwordConfirm)
    {
        $signUp = new usersTable();
        $alert = "";

        //未入力チェック
        if (empty($userId || $password || $passwordConfirm)) {
            $alert = $alert . "未入力の項目があります。" . '\n';
        }

        //ユーザーIDの半角英数・文字数制限チェック
        if (!preg_match("/^[a-zA-Z0-9]+$/", $userId) || (mb_strlen($userId > 20))) {
            $alert = $alert . "ユーザーIDは半角英数入力20文字以下でしてください。" . '\n';
        }

        //パスワードの半角英数・文字数制限チェック
        if (!preg_match("/^[a-zA-Z0-9]+$/", $password) || mb_strlen($password > 30)) {
            $alert = $alert . "パスワードは半角英数30文字以下で入力してください。" . '\n';
        }

        //確認用パスワードの半角英数・文字数制限チェック
        if (!preg_match("/^[a-zA-Z0-9]+$/", $passwordConfirm) || mb_strlen($passwordConfirm > 30)) {
            $alert = $alert . "パスワード確認は半角英数20文字以下で入力してください。" . '\n';
        }

        //パスワード確認チェック
        if ($password != $passwordConfirm) {
            $alert = $alert . "パスワードが一致していません。";
        }

        //エラーが１つでもヒットしていたらエラー文表示
        if (!empty($alert)) {
            return $alert;
        }
    }
}