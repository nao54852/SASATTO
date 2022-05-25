<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>SASATTO会員登録 | SASATTO</title>
    <meta name="description" content="新規会員登録ページです。">
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
        <h2>会員登録</h2>
        <div class="wrapperRegistration">
            <form class="mailRegistration" action="start.php" method="post">
                <div class="registrationBox">
                    <p>ユーザー名<br>
                    ※半角英数字&emsp;32文字以内<br>
                    <input type="text" name="userName" maxlength="32"></p>
                    <p>メールアドレス<br>
                    <input type="email" name="email"></p>
                    <p>パスワード<br>
                        ※半角英数字&emsp;32文字以内<br>
                    <input type="password" name="password" maxlength="32"></p>
                    <p>パスワード(確認用)<br>
                    <input type="password" name="passwordConf" maxlength="32"></p>
                </div><!--registrationBox-->
                <p>ご入力いただいたメールアドレスに登録完了の確認メー
                    ルを送信いたしますので、迷惑メールフィルターを設定
                    されている方は「@gmail」ドメインからのメールを受診
                    できるように設定してください。</p>
                <p><a href="convention.html">SASATTO利用規約</a>をお読みいただき同意される方のみ、「同意して登録する」ボタンを押してください。</p>
                <p>個人情報の取り扱いについては、<a href="privacy.html">プライバシーポリシー</a>をご参照ください。</p>
                <input type="submit" name="registration" value="同意して登録する">
            </form>
        </div><!--wrapperRegistration-->
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