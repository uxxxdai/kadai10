<?php

//最初にSESSIONを開始！！ココ大事！！
session_start();

//POST値を受け取る
$lid = $_POST['lid'];
$lpw = $_POST['lpw'];

//1.  DB接続します
require_once('dbc.php');
$pdo = dbc();

//2. データ登録SQL作成
// gs_user_tableに、IDとWPがあるか確認する。
$stmt = $pdo->prepare('SELECT * FROM gs_user_table WHERE lid = :lid AND lpw = :lpw');
$stmt->bindValue(':lid', $lid, PDO::PARAM_STR);
$stmt->bindValue(':lpw', $lpw, PDO::PARAM_STR);
$status = $stmt->execute();

//3. SQL実行時にエラーがある場合STOP
if($status === false){
    sql_error($stmt);
}

//4. 抽出データ数を取得
$val = $stmt->fetch();

//if(password_verify($lpw, $val['lpw'])){ //* PasswordがHash化の場合はこっちのIFを使う
    
if(isset($val['id']) != false){
    if($val['id'] != ''){
        //Login成功時 該当レコードがあればSESSIONに値を代入
        $_SESSION['chk_ssid'] = session_id();
        $_SESSION['kanri_flg'] = $val['kanri_flg'];
        $_SESSION['name'] = $val['name'];
        $_SESSION['lid'] = $val['lid'];
        $_SESSION['lpw'] = $val['lpw'];
        if($_SESSION['gopage']){
            header('Location:' . $_SESSION['gopage']);
        }else{
            header('Location: list.php');
        }
    }else{
        //Login失敗時(Logout経由)
        echo 'ログインに失敗しました。';
        ?>
        <br>
        <a href=login.php>戻る</a>
        <?php
    }
}else{
    //Login失敗時(Logout経由)
    echo 'ログインに失敗しました。';
    ?>
    <br>
    <a href=login.php>戻る</a>
    <?php
}
// header('Location: login.php');
