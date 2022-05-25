$(function () {
// 共通------------------------------------------------------------------

    // nav howToをクリックしたら使い方リストをアコーディオン表示
    $('.howTo').click(function(e){
        $(this).next().toggleClass('open');
        $(this).toggleClass('vis');
        e.stopPropagation();
    });

    //spanタグの中をクリックしてもアコーディオンが動くようにする
    $('.accordion').click(function(e){
        $(this).parent().next().toggleClass('open');
        $(this).parent().toggleClass('vis');
        e.stopPropagation();
    });

    // アコーディオン以外の場所をクリックしたらアコーディオンを閉じる
    $('body').click(function(e){
        if( !$(e.target).next().hasClass('open') ){
            $('.howToList').removeClass('open');
            $('.howTo').removeClass('vis');
        }
    });

    //スクロールしたらアコーディオンを閉じる
    $(window).on('scroll', function(e){
        if( !$(e.target).next().hasClass('open') ){
            $('.howToList').removeClass('open');
            $('.howTo').removeClass('vis');
        }
    });

// index-------------------------------------------------------------------

    //スワイプでスライドショー
    // 参照　https://www.single-life.tokyo/jquery%E3%83%97%E3%83%A9%E3%82%B0%E3%82%A4%E3%83%B3%E3%80%8Cowl-carousel-2%E3%80%8D%E3%82%92%E4%BD%BF%E3%81%A3%E3%81%A6%E3%82%AB%E3%83%AB%E3%83%BC%E3%82%BB%E3%83%AB%EF%BC%8F%E3%82%B9%E3%83%A9%E3%82%A4/

    $('.owl-carousel').owlCarousel({
        margin:8,
        rewind:true,
        stagePadding: 30,
        responsive:{
            0:{
                items:3
            },
            600:{
                items:5
            },
        }
    });

// post-recipe-------------------------------------------------------------

    //post-recipeで選んだ画像をプレビューする
    // 参照　https://nyanblog2222.com/programming/javascript/1132/

    // ファイル選択後に呼ばれるイベント
    $('#pic').on('change', function (e) {
        // 画像ファイルの読み込みクラス
        var reader = new FileReader();
        // 準備が終わったら、id=previewのsrc属性に選択した画像ファイルの情報を設定
        reader.onload = function (e) {
            $("#preview").attr('src', e.target.result);
        }
        // 読み込んだ画像ファイルをURLに変換
        reader.readAsDataURL(e.target.files[0]);
    });


    // 「材料・工程を追加する」ボタンを押すと入力欄が追加される

    // 「button」をクリックすると
    $('.addFood').click(function(){
        // 「input[type="text]~」を追加する
        $(this).prev('ul').append('<li><input class="food" type="text" name="food" placeholder="食材名" maxlength="64"><input class="foodServ" type="text" name="foodServ" placeholder="分量" maxlength="64"></li>');
    });

    $('.addRecipe').click(function(){
        $(this).prev('ol').append('<li><br><textarea name="recipe" maxlength="255"></textarea></li>');
    });

    // user-----------------------------------------------------------------

    // wrapperUserのh3をクリックしたらformがアコーディオン
    $('.wrapperUser').find('h3').click(function(){
        $(this).next().toggleClass('open');
        // 右の+,-のマークを入れ替える
        if( $(this).next().hasClass('open')){
            $(this).css('background-image','url(./img/arrow-right.png), url(./img/close.png)');
        }else{
            $(this).css('background-image','url(./img/arrow-right.png), url(./img/add-yg.png)');
        }
    });

    // アコーディオン以外の場所をクリックしたらアコーディオンを閉じる
    $('body').click(function(e){
        if( !$(e.target).next().hasClass('open') ){
            $('.wrapperUser').find('h3').removeClass('open');
        }
    });
});