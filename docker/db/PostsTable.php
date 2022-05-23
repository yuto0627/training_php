<?php
require_once 'Db.php';

class PostsTable extends Db
{
    public function __construct()
    {
    }

    public function createPosts()
    {
        session_start();
        $title = $_POST['title'];
        $content = $_POST['contents'];
        try {
            $db = $this->getDb();
            $sql = "INSERT INTO posts (user_id, post_date, post_title, post_contents) VALUES (:user_id, now(), :title, :content)";
            $stmt = $db->prepare($sql);
            $stmt->bindValue(':user_id', $_SESSION['user_id']);
            $stmt->bindValue(':title', $title);
            $stmt->bindValue(':content', $content);
            $stmt->execute();
        } catch (PDOException $e) {
            // 例外発生時の処理
            echo 'DB接続エラー！: ' . $e->getMessage();
        }
    }


    public function updatePosts()
    {
        error_log('aaaaaaaaaaaaa');
        $id = $_POST['id'];
        $title = $_POST['title'];
        $contents = $_POST['contents'];
        error_log($title);
        try {
            $db = $this->getDb();
            $sql = "UPDATE posts SET post_date = now(), post_title = :post_title, post_contents = :post_contents WHERE seq_no = :id";
            $stmt = $db->prepare($sql);
            $stmt->bindValue(':id', $id);
            $stmt->bindValue(':post_title', $title);
            $stmt->bindValue(':post_contents', $contents);
            $stmt->execute();
        } catch (PDOException $e) {
            // 例外発生時の処理
            echo 'DB接続エラー！: ' . $e->getMessage();
        }
    }

    /**
     * 投稿一覧を取得する
     * 
     */
    public function getPostContents()
    {
        try {
            $db = $this->getDb();
            $sql = "SELECT * FROM posts order by seq_no asc;";
            $titles = $db->prepare($sql);
            $titles->execute();
            $title_data = $titles->fetchAll(PDO::FETCH_ASSOC);
            if (isset($title_data)) {
                return $title_data;
            } else {
                return;
            }
        } catch (PDOException $e) {
            // 例外発生時の処理
            echo 'DB接続エラー！: ' . $e->getMessage();
        }
    }


    /**
     * 投稿内容を削除する
     */
    public function deletePost()
    {
        session_start();
        $id = $_POST['id'];
        try {
            $db = $this->getDb();
            $sql = "DELETE FROM posts WHERE seq_no = :id";
            $stmt = $db->prepare($sql);
            $stmt->bindValue(':id', $id);
            $stmt->execute();
        } catch (PDOException $e) {
            // 例外発生時の処理
            echo 'DB接続エラー！: ' . $e->getMessage();
        }
    }
}