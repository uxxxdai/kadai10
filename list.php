<?php
require_once "./dbc.php";

session_start();
unset($_SESSION['gopage']);
$_SESSION['gopage'] = $_SERVER["REQUEST_URI"];
if(isset($_SESSION['kanri_flg'])){
  $kanri_flg = $_SESSION['kanri_flg'];
}else{
  $kanri_flg = 0;
};
if(isset($_SESSION['lid'])){
  $lid = $_SESSION['lid'];
}else{
  $lid = 'no-login_user';
};
?>

<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>アップロードフォーム</title>
    <!-- <link rel="stylesheet" href="css/reset.css"> -->
    <link rel="stylesheet" href="css/style.css">
  </head>
  
  <body>
    <header>
        <nav class="navbar">
            <div class="container-fluid">
                <div class="navbar-header"><a class="navbar-brand" href="input_form.php">登録画面</a></div>
                <div class="navbar-header"><a class="navbar-brand" href="all_map.php">落とし物map</a></div>
                <div class="navbar-header"><a class="navbar-brand" href="login.php">ログイン</a></div>
                <div class="navbar-header"><a class="navbar-brand" href="logout.php">ログアウト</a></div>
            </div>
        </nav>
    </header> 
 
 <!-- 直近のものから降順に一覧表示 -->
 <p class="title2">落とし物一覧<br>（最近のもの順）</p>
    <?php $files = getAllFile();
    foreach($files as $file):?>
      <div class="wrap">
        <div class = "product_image">
          <img src="<?php echo "{$file['file_path']}"; ?>" alt="">
        </div>
        <div class = "text_output">
          <table class ="text_table" border = "1">
            <tr>
            <td width=30%>入力日時</td>
            <td><?php echo h("{$file['insert_date']}"); ?></td>
            </tr>
            <tr>
            <td>品名</td>
            <td><?php echo h("{$file['hinmei']}"); ?></td>
            </tr>
            <tr>
            <td>色</td>
            <td><?php echo h("{$file['color']}"); ?></td>
            </tr>
            <tr>
            <td>サイズ</td>
            <td><?php echo h("{$file['size']}"); ?></td>
            </tr>
            <tr>
            <td>ブランド・製造元</td>
            <td><?php echo h("{$file['brand']}"); ?></td>
            </tr>
            <tr>
            <td>発見後の対応</td>
            <td><?php echo h("{$file['description']}"); ?></td>
            </tr>
          </table>

          <!-- <button onclick="GetMap()">地図</button> -->
          <!-- <a href ="./map.php">地図</a> -->
          <div class="wrap mobile">
              <form enctype="multipart/form-data" action="./map.php" method="post">
                <input type="hidden" name="hinmei" value= <?=$file['hinmei']?>>
                <input type="hidden" name="latitude" value= <?=$file['latitude']?>>
                <input type="hidden" name="longitude" value= <?=$file['longitude']?>>
                <input type="submit" value="地図" class="btn2"/>
                </form>
              <form enctype="multipart/form-data" action="./update_form.php" method="post">
                <input type="hidden" name="id" value= <?=$file['id']?>>
                <input type="hidden" name="kanri_flg" value= <?=$kanri_flg?>>
                <input type="hidden" name="lid" value= <?=$lid?>>
                <input type="submit" value="更新" class="btn2"/>
              </form>
              <form enctype="multipart/form-data" action="./delete.php" method="post">
                <input type="hidden" name="id" value= <?=$file['id']?>>
                <input type="hidden" name="kanri_flg" value= <?=$kanri_flg?>>
                <input type="hidden" name="lid" value= <?=$lid?>>
                <input type="submit" value="削除" class="btn2"/>
              </form>
          </div>
          
        </div>

        </div>
      <?php endforeach; ?>
    
  </body>
</html>