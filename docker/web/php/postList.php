<?php
session_start();

if (!isset($_SESSION["user_id"])) {
    header('Location:/');
}

?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>投稿</title>
    <link rel="stylesheet" type="text/css" href="../css/postListStyle.css">
    <script src="https://kit.fontawesome.com/4ee9f8f3a5.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script src="../js/postList.js" type="text/javascript"></script>
</head>

<body>
    <div id="main">
        <div class="header ">
            Bulletin board
            <div id="toggle">
                <div id="toggle-box">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
            <div id="nav-content">
                <nav>
                    <ul>
                        <li id="add-post-link" style="padding-top: 40px;">投稿追加</li>
                        <li id="manage-user-link">
                            <a href="./userList.php">ユーザー管理</a>
                        </li>
                        <li id="logout-link">
                            <a href="../../db/logout.php">ログアウト</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <div id="post-list-contents" class="contents">
            <form action="">
                <div class="contents_title_area">
                    <span class="contents_title">投稿一覧</span>
                    <span class="delete_btn">
                        <input type="button" value="削除">
                    </span>
                </div>
                <div>
                    <table>
                        <thead>
                            <tr>
                                <th>選択</th>
                                <th>No.</th>
                                <th>ユーザー名</th>
                                <th>投稿日時</th>
                                <th>項目(内容)</th>
                                <th>編集</th>
                                <th>削除</th>
                            </tr>
                        </thead>
                        <tbody id="post_data">
                        </tbody>
                    </table>
                </div>
            </form>
        </div>
        <div id="post_modal" class="post_modal is_not_show">
            <div class="modal_header">
                <span class="modal_title">投稿追加</span>
                <span></span>
            </div>
            <div class="modal_body">
                <div style="padding: 15px;">
                    <div>投稿タイトル</div>
                    <div>
                        <input id="post_title" type="text" name="title" placeholder="20文字以内で入力してください"
                            style="width: 510px;">
                    </div>
                    <div>投稿内容</div>
                    <div>
                        <textarea name="content" id="post_contents" cols=" 30" rows="10"
                            style="width: 510px;"></textarea>
                    </div>
                </div>
                <div class="post_btn_area">
                    <input class="post_btn" type="submit" value="投稿する" name="login">
                </div>
            </div>
        </div>
        <div id="edit_modal" class="edit_modal is_not_show">
            <div class="modal_header">
                <span class="modal_title">投稿編集</span>
                <span></span>
            </div>
            <div class="modal_body">
                <div style="padding: 15px;">
                    <div>投稿タイトル</div>
                    <div>
                        <input id="edit_title" type="text" name="title" placeholder="20文字以内で入力してください"
                            style="width: 510px;">
                    </div>
                    <div>投稿内容</div>
                    <div>
                        <textarea name="content" id="edit_contents" cols="30" rows="10"
                            style="width: 510px;"></textarea>
                    </div>
                    <input type="hidden" id="edit_id">
                </div>
                <div class="edit_btn_area">
                    <input class="edit_btn" type="submit" value="投稿する" name="login">
                </div>
            </div>
        </div>
    </div>
</body>

</html>