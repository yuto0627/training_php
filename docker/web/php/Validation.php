<?php

require_once("validationUtil.php");

class Validation
{
    /**
     * 登録時のバリデーションチェック
     * 
     * @param int $userid ユーザーID
     * @param int $password
     * @param int $passwordcheck
     * 
     * @return string $errors 
     */
    public function userRegistValidation($userid, $password, $passwordcheck)
    {
        $errors = '';

        if (empty($userid) || empty($password) || empty($passwordcheck)) {
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

    /**
     * ログイン時のバリデーションチェック
     * 
     * @param int $loginuserid ユーザーID
     * @param int $loginpassword パスワード
     * 
     * @return string　$loginerrors
     */
    public function loginValidation($loginuserid, $loginpassword)
    {
        $loginerrors = '';
        $logindata = new usersTable();
        $logininfo = $logindata->userLogin($loginuserid);

        if (empty($loginuserid) || empty($loginpassword)) {
            $loginerrors .= "項目に未記入のものがあります。" . '\n';
        }

        if (!$logininfo) {
            $loginerrors .= 'ユーザーIDが存在しません。' . '\n';
        }

        if (password_verify($loginpassword, $logininfo['password'])) {
            $_SESSION['userId'] = $logininfo['user_id'];
        } else {
            $loginerrors .= 'ユーザーIDかパスワードが正しくありません。' . '\n';
        }

        if (!empty($loginerrors)) {
            return $loginerrors;
        }
    }
}