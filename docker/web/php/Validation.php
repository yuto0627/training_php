<?php

require_once("ValidationUtil.php");

class Validation
{

    /**
     * ユーザー登録のバリデーション用メソッド
     * 
     * @return string $errors
     */

    public function userRegistValidation($userid, $password, $passwordcheck)
    {
        $errors = '';

        if (empty($userid || $password || $passwordcheck)) {
            $errors .= "項目に未記入のものがあります。" . '\n';
        }

        if (!ValidationUtil::isHanEisu($userid) || !ValidationUtil::isMaxLength($userid, 20)) {
            $errors .= "IDは半角英数字で20文字以下にしてください。" . '\n';
        }

        if (!ValidationUtil::isHanEisu($password) || !ValidationUtil::isMaxLength($password, 30)) {
            $errors .= "パスワードは半角英数字で30文字以下にしてください。" . '\n';
        }

        if (!ValidationUtil::isHanEisu($passwordcheck) || !ValidationUtil::isMaxLength($passwordcheck, 30)) {
            $errors .= "確認用パスワードは半角英数字で30文字以下にしてください。" . '\n';
        }

        if ($password != $passwordcheck) {
            $errors .= "パスワードと確認用パスワードが一致していません。";
        }
        if (!empty($errors)) {
            return $errors;
        }
    }
}