$(function () {
    // ハンバーガーメニュー
    $('#toggle').on('click', function () {
        $('.header').toggleClass('is-open');
        $('.contents').toggleClass('overlay');
    });

    $(document).on('click', '.overlay', function () {
        $('.header').removeClass('is-open');
        $('.contents').removeClass('overlay');
        $('.post_modal').fadeOut();
    });

    // 投稿追加リンク押下時の処理
    $('#add-post-link').on('click', function () {
        $('.header').removeClass('is-open');
        $('.post_modal').fadeIn();
    });

    // 編集アイコン押下時の処理
    $(document).on('click', '.edit-icon', function () {
        const id = $(this).attr('id');

        $('.contents').toggleClass('overlay');
        $('.edit_modal').fadeIn();

        const text = $(document).$('post_title_' + id).val();
        // const text = document.getElementById('post_title_' + id);
        const contents = document.getElementById('post_contents_' + id).innerText;

        document.getElementById("edit_id").value = id;
        document.getElementById("edit_title").value = text;
        document.getElementById("edit_contents").value = contents;
    });


    // 削除ボタン押下時の処理
    $(document).on('click', '.delete-icon', function () {
        const id = $(this).attr('id');

        confirm('No.' + id + 'の投稿を削除してよろしいですか？')

        $.ajax({
            type: 'POST',
            url: '../php/ajax.php',
            datatype: 'json',
            data: {
                'class': 'PostsTable',
                'func': 'deletePost',
                'id': id,
            },
        })
            .done(function (data) {
                $('#post_data').empty();
                getPostData();
            }).fail(function (data) {
                alert('通信失敗');
            })
    });

    // 一括削除ボタン押下時の処理
    $('.delete_btn').on('click', function () {
        alert('一括削除ボタンが押下されました');
    });

    // 投稿ボタン押下時の処理
    $('.post_btn').on('click', function () {
        const title = $('#post_title').val();
        const contents = $('#post_contents').val();

        $.ajax({
            type: 'POST',
            url: '../php/ajax.php',
            datatype: 'json',
            data: {
                'class': 'PostsTable',
                'func': 'createPosts',
                'title': title,
                'contents': contents
            },
        })
            .done(function (data) {
                $('.contents').toggleClass('overlay');
                $('.post_modal').fadeOut();

                $('#post_data').empty();
                getPostData();
            }).fail(function (data) {
                alert('通信失敗');
            })
    });


    // 投稿編集ボタン押下時の処理
    $('.edit_btn').on('click', function () {
        const id = $('#edit_id').val();
        const title = $('#edit_title').val();
        const contents = $('#edit_contents').val();

        $.ajax({
            type: 'POST',
            url: '../php/ajax.php',
            datatype: 'json',
            data: {
                'class': 'PostsTable',
                'func': 'updatePosts',
                'id': id,
                'title': title,
                'contents': contents
            },
        })
            .done(function (data) {
                $('.contents').toggleClass('overlay');
                $('.edit_modal').toggleClass('is_not_show');
            }).fail(function (data) {
                alert('通信失敗');
            })
    });

    // 投稿一覧データを取得
    function getPostData() {
        $.ajax({
            type: 'POST',
            url: '../php/ajax.php',
            datatype: 'json',
            data: {
                'class': 'PostsTable',
                'func': 'getPostContents',
            },
        })
            .done(function (data) {
                $.each(data, function (key, value) {
                    // #post_data内にappendで追記していく
                    $('#post_data').append('<tr><td>' + '<input type="checkbox"></td><td>' + value.seq_no + '</td><td>' + value.user_id + '</td><td>'
                        + value.post_date.slice(0, -15) + '</td><td><span id="post_title_"' + value.seq_no + '>' + value.post_title + '</span><br /><span id="post_contents_"' + value.seq_no + '>' + value.post_contents +
                        '</span></td><td id=' + value.seq_no + ' class="edit-icon"><i class="fa-solid fa-pen-to-square"></i></td><td id=' + value.seq_no + ' class="delete-icon"><i class="fa-solid fa-xmark"></i></td></tr>');
                });
            }).fail(function (data) {
                alert('通信失敗');
            })
    }
    getPostData();
});