<?php
    require_once './classes/UserLogic.php';
    //エラーメッセージ
    $err = [];

    //バリデーション
    $username = filter_input(INPUT_POST, 'userName');
    //正規表現
    if(!preg_match("/\A[a-z\d]{8,32}+\z/i",$username)){
        //エラーを返す
        $err[] = 'ユーザー名は半角英数字、8文字以上32文字以内にしてください。';
    }
    //メールアドレスが空だったら
    if(!$email = filter_input(INPUT_POST, 'email')){
        //エラーを返す
        $err[] = 'メールアドレスを入力してください。';
    }
    //パスワード
    $password = filter_input(INPUT_POST, 'password');
    //正規表現
    if(!preg_match("/\A[a-z\d]{8,32}+\z/i",$password)){
        //エラーを返す
        $err[] = 'パスワードは半角英数字、8文字以上32文字以内にしてください。';
    }
    //パスワードと確認用パスワードが違う時
    $password_conf = filter_input(INPUT_POST, 'passwordConf');
    if($password !== $password_conf){
        $err[] = '確認用パスワードと異なっています。';
    }

    //エラーがなければ
    if(count($err) === 0){
        //ユーザー登録する処理
        //ユーザーが入力した内容をロジックに渡せたかどうか
        $hasCreated = UserLogic::createUser($_POST);
        //ロジックが失敗して（例外が起きて）falseが返ってきたら
        if(!$hasCreated){
            $err[] = '登録に失敗しました';
        }
    }
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>会員登録手続き完了 | SASATTO</title>
    <meta name="description" content="会員登録手続きが完了しました。">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <link rel="icon" type="image/png" sizes="16x16" href="./logo-16.png">
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <header>
        <div class="logo">
            <a href="index.html">
                <img src="./img/logo.png" alt="SASATTOのロゴマーク">
                <h1>sasatto</h1>
            </a>
        </div><!--logo-->
        <div class="headerNav">
            <ul>
                <li class="contact">
                    <a href="contact.html">お問合せ</a>
                </li>
                <li class="login">
                    <a href="login.php">ログイン</a>
                </li>
                <li class="user log">
                    <a href="user.php">ユーザー</a>
                </li>
            </ul>
        </div><!--headerNav-->
    </header>

    <nav>
        <ul>
            <li class="top"><a href="index.html">トップ<br><span>Top</span></a></li>
            <li class="fav"><a href="favorite.html">お気に入り<br><span>Favorite</span></a></li>
            <li class="post"><a href="post-recipe.html">投稿<br><span>Post</span></a></li>
            <li class="howTo">使い方<br><span class="accordion">How&nbsp;to</span></li>
            <div class="howToList">
                <ul>
                    <li><a href="convention.html">SASATTO利用規約</a></li>
                    <li><a href="privacy.html">プライバシーポリシー</a></li>
                    <li><a href="./img/search.pdf">レシピ検索方法(PDF)</a></li>
                </ul>
                <p>会員限定メニュー</p>
                <ul>
                    <li><a href="./img/fav.pdf">お気に入り登録と見方(PDF)</a></li>
                    <li><a href="./img/post.pdf">レシピを投稿する方法(PDF)</a></li>
                </ul>
            </div><!--howToList-->
        </ul>
    </nav>

    <main>
        <div class="start">
            <!-- エラーがあればエラーをだす -->
            <?php if (count($err) > 0) : ?>
                <?php foreach($err as $e) : ?>
                    <p><?php echo $e ?></p>
                <?php endforeach ?>
            <!-- エラーがなければ下を表示 -->
            <?php else : ?>
                <h2>会員登録手続きが完了しました</h2>
                <p>登録完了の確認メールをご登録いただいたメールアドレスに送信いたしますので、ご確認ください。</p>
                <p>確認メールが届かない場合はお手数ですが<a href="contact.html">お問合せ</a>からご連絡ください。</p>
                <a href="index.html">トップページへ</a>
        </div><!--start-->
            <?php endif ?>
    </main>

    <footer>
        <div class="copyright">
            <p><small>&copy;SASATTO 2022.5</small></p>
        </div><!--copyright-->
    </footer>

    <script src="./js/vendor/jquery-1.10.2.min.js"></script>
    <script src="./js/main.js"></script>
</body>
</html>