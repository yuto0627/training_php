<?php
session_start();

class Db
{
    public function __construct()
    {
    }
    /**
     * データーベースへの接続スクリプトの外部化
     */
    public function getDb()
    {
        // データーベース接続文字列
        $dsn = 'pgsql:dbname=board_database; host=db; port=5555;';
        // 接続ユーザー名
        $user = 'root';
        // 接続時のパスワード
        $password = 'password';

        // データーベースへの接続を確立
        $db = new PDO($dsn, $user, $password);
        return $db;
    }
}