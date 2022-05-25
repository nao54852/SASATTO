<?php
session_start();
    //ユーザー登録のロジックを読み込む
    require_once './classes/UserLogic.php';

    //ログインしているか判定し、していなかったらログイン画面に戻す
    // $result = UserLogic::checkLogin();

    // if(!$result){
    //     $_SESSION['login_err'] = 'ログインしてください。';
    //     header('Location: login.php');
    //     return;
    // }

    //エラーメッセージ
    $err = [];

    //バリデーション
    //メールアドレスが空だったら
    if(!$email = filter_input(INPUT_POST, 'email')){
        //エラーを返す
        $err['email'] = '!!メールアドレスを入力してください。';
    }
    //パスワード
    if(!$password = filter_input(INPUT_POST, 'password')){
        $err['password'] = '!!パスワードを入力してください。';
    };

    //エラーがなければ
    if(count($err) > 0){
        //エラーがあった場合は戻す
        $_SESSION = $err;
        header('Location: login.php');
        return;
    }

    //resultでログインが成功したかどうか取り、ログインの処理をUserLogicのloginメソッドを使い、$email,$passwordを引数として渡す。
    $result = UserLogic::login($email, $password);

    //ログイン失敗時の処理
    if(!$result){
        header('Location: login.php');
        return;
    }

    //ログイン成功時の処理
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>ユーザー情報ページ | SASATTO</title>
    <meta name="description" content="ユーザー情報の変更、投稿したレシピの編集・削除、ログアウトはこちら。">
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
                <li class="login log">
                    <a href="login.php">ログイン</a>
                </li>
                <li class="user vis">
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
        <h2>ユーザー情報</h2>
        <div class="wrapperUser">
            <h3>ユーザー情報変更</h3>
            <form class="modify" action="#" method="post">
                <div class="modificationBox">
                    <p>ユーザー名<br>
                    ※半角英数字&emsp;32文字以内<br>
                    <input type="text" name="userName" maxlength="32" required></p>
                    <p class="mailMember">メールアドレスで会員登録している方</p>
                    <p>メールアドレス<br>
                    <input type="email" name="email" required></p>
                    <p>パスワード<br>
                    <input type="password" name="pass" maxlength="32" required></p>
                    <p>新規パスワード<br>
                        ※半角英数字&emsp;32文字以内<br>
                    <input type="password" name="pass" maxlength="32" required></p>
                    <p>新規パスワード(確認用)<br>
                    <input type="password" name="pass" maxlength="32" required></p>
                </div><!--modificationBox-->
                <input type="submit" name="modify" value="ユーザー情報を変更する"><br>
                <a href="leaves.html">退会手続き</a>
            </form>
            <h3>投稿レシピ編集</h3>
            <div class="recipeEdit">
                <p>投稿したレシピはありません。</p>
                <ul class="editList">
                    <li>
                        <div class="float">
                            <img src="./img/no-image.png" alt="画像がありません">
                            <div class="listDescription">
                                <p class="postDate"><time datetime="yyyy年mm月dd日">0000年00月00日</time></p>
                                <p class="menuName">menu name menu name menu name me</p>
                                <form action="#" method="post">
                                    <button class="deleat">削除</button>
                                    <a href="post-recipe.html">編集</a>
                                </form>
                            </div><!--listDescription-->
                        </div><!--float-->
                    </li>
                    <li>
                        <div class="float">
                            <img src="./img/no-image.png" alt="画像がありません">
                            <div class="listDescription">
                                <p class="postDate"><time datetime="yyyy年mm月dd日">0000年00月00日</time></p>
                                <p class="menuName">menu name</p>
                                <form action="#" method="post">
                                    <button class="deleat">削除</button>
                                    <a href="post-recipe.html">編集</a>
                                </form>
                            </div><!--listDescription-->
                        </div><!--float-->
                    </li>
                    <li>
                        <div class="float">
                            <img src="./img/no-image.png" alt="画像がありません">
                            <div class="listDescription">
                                <p class="postDate"><time datetime="yyyy年mm月dd日">0000年00月00日</time></p>
                                <p class="menuName">menu name</p>
                                <form action="#" method="post">
                                    <button class="deleat">削除</button>
                                    <a href="post-recipe.html">編集</a>
                                </form>
                            </div><!--listDescription-->
                        </div><!--float-->
                    </li>
                </ul>
            </div><!--recipeEdit-->
            <form class="logout" action="#" method="post">
                <button>ログアウト</button>
            </form>
        </div><!--wrapperUser-->
    </main>

    <footer>
        <div class="copyright">
            <p><small>&copy;SASATTO 2022.5</small></p>
        </div><!--copyright-->
    </footer>

    <script src="./js/vendor/jquery-1.10.2.min.js"></script>
    <script src="./js/vendor/owl.carousel.js"></script>
    <script src="./js/main.js"></script>
</body>
</html>