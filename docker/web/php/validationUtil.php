<?php

require_once('../../db/usersTable.php');

class validationUtil
{

    public function validation($userId, $password, $passwordCheck)
    {
        $errors = '';

        if (empty($userId || $password || $passwordCheck)) {
            $errors .= "項目に未記入のものがあります。" . '\n';
        }

        if (!preg_match("/^[a-zA-Z0-9]+$/", $userId) || mb_strlen($userId > 20)) {
            $errors .= "IDは半角英数字で20文字以下にしてください。" . '\n';
        }

        if (!preg_match("/^[a-zA-Z0-9]+$/", $password) || mb_strlen($password > 30)) {
            $errors .= "パスワードは半角英数字で30文字以下にしてください。" . '\n';
        }

        if (!preg_match("/^[a-zA-Z0-9]+$/", $passwordCheck) || mb_strlen($passwordCheck > 30)) {
            $errors .= "確認用パスワードは半角英数字で30文字以下にしてください。" . '\n';
        }

        if ($password != $passwordCheck) {
            $errors .= "パスワードと確認用パスワードが一致していません。";
        }
        if (!empty($errors)) {
            return $errors;
        }
    }
}