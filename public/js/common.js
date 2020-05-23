$(function () {

    // 知識詳細
    $('#comment-area').toggle();
    $("#comment-add-btn").click(function() {
        $("#comment-area").toggle();
        if ($('#comment-area').css('display') == 'block') {
            // 表示されている場合
            $(this).removeClass('btn-outline-primary');
            $(this).addClass('btn-primary');
        }else{
            // 表示されていない場合
            $(this).removeClass('btn-primary');
            $(this).addClass('btn-outline-primary');
        }
    });

    if($('#comment').hasClass('is-invalid')){
        $("#comment-area").show();
    }

    $("#nice-btn").click(function() {
        // TODO: URLの設定
        $.ajax({
            type: 'GET',
            url: 'http://localhost:8099/api/word/nice/' + $(this).data('wid') + '/' + $(this).data('uid'),
            dataType: 'json',
            success: function(rs) {
                if(rs.deleteFlg){
                    $("#nice-btn").removeClass('btn-danger');
                    $("#nice-btn").addClass('btn-outline-danger');
                }else{
                    $("#nice-btn").removeClass('btn-outline-danger');
                    $("#nice-btn").addClass('btn-danger');
                }
            },
            error: function(xhr, status, error) {
                console.log(xhr);
                console.log(status);
                console.log(error);
            }
        });
    });

    // お知らせ登録
    $('#date-picker').datepicker({
        format: "yyyy-mm-dd",
        language: "ja",
        autoclose: true,
    });

    // お知らせ削除
    $('.delete-btn').click(function(){
        if(!confirm('本当に削除しますか？')){
            // キャンセルの場合
            return false;
        }
    });

});