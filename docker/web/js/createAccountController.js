<?php

require_once('../../db/usersTable.php');

class createAccountController
{

    public function validation($userId, $password, $passwordCheck)
    {
        $data = new usersTable();
        $error = array();

        if (!empty($userId && $password && $passwordCheck)) {
            if (preg_match('/^[a-zA-Z0-9]+$/') && $userId <= 20 && $password <= 30 && $passwordCheck <= 30) {

                if ($password == $passwordCheck) {
                    $data->regist($userId, $password);
                } else {
                    echo 'パスワードと確認用パスワードが一致していません。';
                }
                echo 'パスワードは半角英数字';
            }
            echo '項目に未記入のものがあります。';
        }
    }
}