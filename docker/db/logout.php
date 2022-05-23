<?php

/**
 * ログアウト処理を行う
 * セッションの中身を全て削除する
 * セッションを破壊する
 */
session_start();
$_SESSION = array(); //セッションの中身をすべて削除
session_destroy(); //セッションを破壊

header('Location:/');