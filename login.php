<?php
    session_start();

    $err = $_SESSION;

    //ログインエラーのメッセージを入れる
    //ログインエラーがセッションにあればそのまま、ないときnullを入れる
    $login_err = isset($_SESSION['login_err']) ? $_SESSION['login_err'] : null;
    //２回目入った時はログインエラーを消す
    unset($_SESSION['login_err']);

    //画面ロードしたときに空欄のエラーメッセージが出ないようにする
    //セッションを消す
    $_SESSION = array();
    session_destroy();

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>ログイン画面 | SASATTO</title>
    <meta name="description" content="ログイン画面です。">
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
                <li class="login vis">
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
        <h2>ログイン</h2>
        <?php if(isset($err['msg'])) : ?>
            <p class="err"><?php echo $err['msg']; ?></p>
        <?php endif; ?>
        <div class="wrapperLogin">
            <form class="mailLogin" action="user.php" method="post">
                <p>メールアドレス<br>
                    <input type="email" name="email">
                    <!-- email欄が空白だったらメッセージを表示 -->
                    <?php if(isset($err['email'])) : ?>
                            <p class="err"><?php echo $err['email']; ?></p>
                    <?php endif; ?>
                </p>
                <p>パスワード<br>
                    <input type="password" name="password" maxlength="24">
                    <!-- パスワード欄が空白だったらメッセージを表示 -->
                    <?php if(isset($err['password'])) : ?>
                        <p class="err"><?php echo $err['password']; ?></p>
                    <?php endif; ?>
                </p>
                <input type="submit" name="login" value="ログインする">
            </form>
        </div><!--wrapperLogin-->
        <div class="goRegistration">
            <p>まだ会員登録されていない方は<span class="res"><a href="registration.php
                ">こちらから新規登録</a></span></p>
        </div><!--goRegistration-->
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