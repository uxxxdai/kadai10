<?php
header('Expires: Tue, 1 Jan 2019 00:00:00 GMT');
header('Last-Modified:'. gmdate( 'D, d M Y H:i:s' ). 'GMT');
header('Cache-Control:no-cache,no-store,must-revalidate,max-age=0');
header('Cache-Control:pre-check=0,post-check=0',false);
header('Pragma:no-cache');

function dbc(){
    try {
        $host = "localhost";
        $dbname = "otoshimono_db";
        $user = "root";
        $pass = "root";
        $dns="mysql:host=$host;dbname=$dbname;charset=utf8";
        $pdo = new PDO($dns, $user, $pass);
    return $pdo;
    } catch (PDOException $e) {
        exit('DB Connection Error:' . $e->getMessage());
    }
}

//ファイルデータをDBに保存する
function fileSave($filename, $save_path, $hinmei, $color, $size, $brands, $caption, $latitude, $longitude, $lid){
    $result = False;
    
    $sql = "INSERT INTO otoshimono_table(file_name, file_path, hinmei, color, size, brand, description, latitude, longitude, delete_flag,login_id) VALUE(?,?,?,?,?,?,?,?,?,0,?)";
    try{
        $stmt = dbc()->prepare($sql);
        $stmt->bindValue(1, $filename);
        $stmt->bindValue(2, $save_path);
        $stmt->bindValue(3, $hinmei);
        $stmt->bindValue(4, $color);
        $stmt->bindValue(5, $size);
        $stmt->bindValue(6, $brands);
        $stmt->bindValue(7, $caption);
        $stmt->bindValue(8, $latitude);
        $stmt->bindValue(9, $longitude);
        $stmt->bindValue(10, $lid);
        $result = $stmt->execute();
        return $result;
    } catch(\Exception $e){
        echo $e->getMessage();
        return $result;
    }
}

//ファイルデータをDBに更新する
function fileUpdate($id, $filename, $save_path, $hinmei, $color, $size, $brands, $caption, $latitude, $longitude){
    $result = False;
    //各データのDB更新
    $id = $_POST['id'];
    $pdo = dbc();
    $stmt = $pdo->prepare('UPDATE otoshimono_table 
        SET file_name = :filename, file_path = :save_path, hinmei = :hinmei, 
                    color = :color, size = :size, brand = :brand, 
                    description = :description, update_date = sysdate(), 
                    latitude = :latitude, longitude = :longitude
        WHERE id = :id;
        ');
    // 数値の場合 PDO::PARAM_INT
    // 文字の場合 PDO::PARAM_STR
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->bindValue(':filename', $filename, PDO::PARAM_STR);
    $stmt->bindValue(':save_path', $save_path, PDO::PARAM_STR);
    $stmt->bindValue(':hinmei', $hinmei, PDO::PARAM_STR);
    $stmt->bindValue(':color', $color, PDO::PARAM_STR);
    $stmt->bindValue(':size', $size, PDO::PARAM_STR);
    $stmt->bindValue(':brand', $brands, PDO::PARAM_STR);
    $stmt->bindValue(':description', $caption, PDO::PARAM_STR);
    $stmt->bindValue(':latitude', $latitude, PDO::PARAM_STR);
    $stmt->bindValue(':longitude', $longitude, PDO::PARAM_STR);

    $result = $stmt->execute(); //実行
    return $result;
}

//ファイルデータを取得する
function getAllFile(){
    $sql = "SELECT * FROM otoshimono_table where delete_flag != 1 ORDER BY id DESC";

    $fileData = dbc()->query($sql);

    return $fileData;
}

//ユーザーデータをDBに追加する
function UserSave($lid,$lpw){
    $result = False;

    $sql = "INSERT INTO gs_user_table(name,lid,lpw,kanri_flg,life_flg) VALUE('一般登録者',?,?,0,0)";
    try{
        $stmt = dbc()->prepare($sql);
        $stmt->bindValue(1, $lid);
        $stmt->bindValue(2, $lpw);
        $result = $stmt->execute();
        return $result;
    } catch(\Exception $e){
        echo $e->getMessage();
        return $result;
    }
}

function h($s) {
    return htmlspecialchars($s, ENT_QUOTES, "UTF-8");
    }

//SQLエラー関数：sql_error($stmt)

function sql_error($stmt){
    $error = $stmt->errorInfo();
    exit('SQLError:' . print_r($error, true));
}

//リダイレクト関数: redirect($file_name)

function redirect($file_name){
    header('Location: ' . $file_name);
    exit();
}

// ログインチェク処理 loginCheck()
function loginCheck(){
    if(isset($_SESSION['chk_ssid'])){
        if($_SESSION['chk_ssid'] != session_id()){
            //loginができていない場合
            exit('更新や削除をするためにはログインしてください。');
        }else{
            //loginができている場合
            session_regenerate_id(true);
            $_SESSION['chk_ssid'] = session_id();
        };
    }else{
        exit('更新や削除ができるのはログインユーザーのみです。');
    }
};

function input_restriction($lid){
    //セキュリティ対策として1日の最大登録数、1時間の同ユーザーの最大登録数を超えていないかチェックする。
    $sql = "SELECT * FROM otoshimono_table where insert_date >= DATE_SUB(CURTIME(),INTERVAL 24 HOUR)";
    $oneday_res = dbc()->query($sql);
    $oneday_count = $oneday_res->rowCount();
    if($oneday_count >= 30){
        exit("申し訳ありません、本アプリでは登録は一日30件までと制限しております。
        <br><a href=list.php>落とし物登録リストへ移動</a>");
    };

    $sql = "SELECT * FROM otoshimono_table where insert_date >= DATE_SUB(CURTIME(),INTERVAL 1 HOUR) AND login_id = '$lid'";
    $onehour_res = dbc()->query($sql);
    $onehour_count = $onehour_res->rowCount();

    if($onehour_count >= 10){
        exit("申し訳ありません、同じユーザーの登録（ログイン無しユーザーの登録も）は1時間で10件までと制限しております。
        <br><a href=list.php>落とし物登録リストへ移動</a>");

    };
}
?>
