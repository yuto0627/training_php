<?php
require_once 'Db.php';

class UsersTable extends Db
{
    public function __construct()
    {
    }

    /**
     * ユーザー情報を新規登録する処理を行う
     */
    public function signUP()
    {
        $id = $_POST['reg_id'];
        $pass = password_hash($_POST['reg_password'], PASSWORD_DEFAULT);

        try {
            // 例外が発生する可能性があるコード
            $db = $this->getDb();
            // 新規登録ボタンが押された場合
            // すでにユーザーIDがテーブルに存在するかチェックする
            $sql = "SELECT * FROM users WHERE user_id = :id";
            $stmt = $db->prepare($sql);
            // bindvalue()関数を使用することで、値をバインドできるため、条件が動的なSQLをアプリケーションから実行することが可能。
            $stmt->bindValue(':id', $id);
            $stmt->execute();
            $members = $stmt->fetchAll();
            foreach ($members as $member) {
                if ($member['user_id'] === $id) {
                    $errorMessage = '同じユーザーIDが存在します。';
                    return $errorMessage;
                }
            }
            //登録されていなければinsert 
            $sql = "INSERT INTO users(user_id, password) VALUES (:user_id, :password)";
            $stmt = $db->prepare($sql);
            $stmt->bindValue(':user_id', $id);
            $stmt->bindValue(':password', $pass);
            $stmt->execute();
            header('Location:/');
        } catch (PDOException $e) {
            // 例外発生時の処理
            echo 'DB接続エラー！: ' . $e->getMessage();
        }
    }

    /**
     * ログイン機能を行う
     */
    public function login()
    {
        $id = $_POST['log_id'];
        $pass = $_POST['log_password'];

        try {
            // 例外が発生する可能性があるコード
            $db = $this->getDb();
            $sql = "SELECT * from users WHERE user_id = :id";
            $stmt = $db->prepare($sql);
            $stmt->bindValue(':id', $id);
            $stmt->execute();
            $member = $stmt->fetch();
            //指定したハッシュがパスワードにマッチしているかチェック
            if (password_verify($pass, $member['password'])) {
                //DBのユーザー情報をセッションに保存
                $_SESSION['user_id'] = $member['user_id'];
                error_log('ログインしました');
                header('Location:/docker/web/php/postList.php');
            }
        } catch (PDOException $e) {
            // 例外発生時の処理
            echo 'DB接続エラー！: ' . $e->getMessage();
        }
    }

    /**
     * ユーザー一覧を取得する
     */
    public function getUserList()
    {
        try {
            $db = $this->getDb();
            $sql = "SELECT * FROM users";
            $users = $db->prepare($sql);
            $users->execute();
            $user_data = $users->fetchAll(PDO::FETCH_ASSOC);
            if (isset($user_data)) {
                return $user_data;
            } else {
                return;
            }
        } catch (PDOException $e) {
            // 例外発生時の処理
            echo 'DB接続エラー！: ' . $e->getMessage();
        }
    }

    /**
     * ユーザーを削除
     */
    public function deleteUser()
    {
        $user_id = $_POST['id'];
        try {
            $db = $this->getDb();
            $sql = "DELETE FROM users WHERE seq_no = :id";
            $stmt = $db->prepare($sql);
            $stmt->bindValue(':id', $user_id);
            $stmt->execute();
        } catch (PDOException $e) {
            // 例外発生時の処理
            echo 'DB接続エラー！: ' . $e->getMessage();
        }
    }
}