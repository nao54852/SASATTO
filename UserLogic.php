<?php
    require_once './dbconnect.php';

    class UserLogic {
        /**
         * ユーザーを登録する
         * @param array $userData
         * @return bool $result
         */

        public static function createUser($userData){
            //例外が発生したときにfalseを返すよう、先に定義しておく。
            $result = false;
            $sql = 'INSERT INTO users (userName, email, password) VALUES (?, ?, ?)';

            //ユーザーデータを配列に入れる
            $arr = [];
            $arr[] = $userData['userName'];
            $arr[] = $userData['email'];
            $arr[] = password_hash($userData['password'], PASSWORD_DEFAULT);

            //例外処理
            try{
                //プリペアドで用意したSQL文の？にarrの値が入っていく
                //executeの内容が成功したらresultがtrueになる
                $stmt = connect()->prepare($sql);
                $result = $stmt->execute($arr);
                return $result;
            }catch(\Exception $e){
                //例外が発生した場合resultにfalseを返す（11行目に定義してた）
                return $result;
            }
        }

        /**
         * ログイン処理
         * @param string $email
         * @param string $password
         * @return bool $result
         */

        public static function login($email,$password){
            //結果を定義
            $result = false;
            //ユーザーをemailから検索して取得
            //長くなるのでロジックを作って呼び出す
            $user = self::getUserByEmail($email);

            //入力したメールアドレスがなかった場合エラーを返す
            if(!$user){
                $_SESSION['msg'] = 'emailが一致しません。';
                return $result;
            }

            //パスワードの照会
            if (password_verify($password, $user['password'])){
                //ログイン成功
                //セッションハイジャック対策
                session_regenerate_id(true);
                //セッションに帰ってきた$userの値を入れる
                $_SESSION['login_user'] = $user;
                //結果をtrueにして返す
                $result = true;
                return $result;
            }

            //入力したパスワードがなかった場合エラーを返す
            $_SESSION['msg'] = 'パスワードが一致しません。';
            return $result;
        }

        /**
         * emailからユーザーを取得
         * @param string $email
         * @return array|bool $user|false
         */

        public static function getUserByEmail($email){
            //SQLの準備
            //$emailと一致しているemailのデータを返す
            $sql = 'SELECT * FROM users WHERE email = ?';

            //emailを配列に入れる
            $arr = [];
            $arr[] = $email;

            //例外処理
            try{
                //SQL実行
                $stmt = connect()->prepare($sql);
                $stmt->execute($arr);

                //SQLの結果を返す
                $user = $stmt->fetch();
                return $user;
            }catch(\Exception $e){
                return false;
            }
        }


    }

?>
