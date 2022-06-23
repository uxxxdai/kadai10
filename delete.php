<?php
header('Expires: Tue, 1 Jan 2019 00:00:00 GMT');
header('Last-Modified:'. gmdate( 'D, d M Y H:i:s' ). 'GMT');
header('Cache-Control:no-cache,no-store,must-revalidate,max-age=0');
header('Cache-Control:pre-check=0,post-check=0',false);
header('Pragma:no-cache');

// 0. SESSION開始！！
session_start();

//１-1．関数群の読み込み
require_once('dbc.php');

// 1-2. ログインチェック処理！
loginCheck();

//1.Delete_Flagを設置
$id = $_POST['id'];
$kanri_flg = $_POST['kanri_flg'];
$lid = $_POST['lid'];

//2.DBに接続
$pdo = dbc();

//2.5 権限チェック
$stmt = $pdo->prepare("SELECT * FROM otoshimono_table WHERE id = :id");
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute(); //実行

$view = '';

if ($status === false) {
    sql_error($stmt);
} else {
  $result = $stmt->fetch();

    // var_dump($result);
    if ($kanri_flg == 1){
    }else if($result['login_id'] == $lid){
    }else{exit('削除権限がありません。（自身で作られたアイテムのみ削除可能です）');
    };
}


//3.データ登録SQL作成
$stmt = $pdo->prepare('UPDATE otoshimono_table 
                SET delete_flag = 1
                WHERE id = :id;
                ');

$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute(); //実行

//4.データ登録処理後
if ($status === false) {
    sql_error($stmt);
} else {
    redirect('list.php');
}