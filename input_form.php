<?php
header('Expires: Tue, 1 Jan 2019 00:00:00 GMT');
header('Last-Modified:'. gmdate( 'D, d M Y H:i:s' ). 'GMT');
header('Cache-Control:no-cache,no-store,must-revalidate,max-age=0');
header('Cache-Control:pre-check=0,post-check=0',false);
header('Pragma:no-cache');
?>


<?php
require_once "./dbc.php";

//ログイン後戻すためにセッションにURLを保持
session_start();
unset($_SESSION['gopage']);
$_SESSION['gopage'] = $_SERVER["REQUEST_URI"];
?>
<!-- ①フォームの説明 -->
<!-- ②$_FILEの確認 -->
<!-- ③バリデーション -->
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
                <div class="navbar-header"><a class="navbar-brand" href="list.php">落とし物一覧</a></div>
                <div class="navbar-header"><a class="navbar-brand" href="login.php">ログイン</a></div>
                <div class="navbar-header"><a class="navbar-brand" href="logout.php">ログアウト</a></div>
              </div>
        </nav>
    </header>


    <form enctype="multipart/form-data" class = "upload_form" action="./file_upload.php" method="post">
      <p class="title">落とし物登録システム</P>
      <div class="file-up">
        <input type="hidden" name="MAX_FILE_SIZE" value="3000000" />
        <input name="img" type="file" accept="image/*" onclick="gps_get()" required/>
      </div>
      <div>
        <p>品名（必須）</P>
        <input class = "input_text" type="text" name="hinmei" required/>
        <p>色（任意）</P>
        <input class = "input_text" type="text" name="color"/>
        <p>サイズ（任意）</P>
        <input class = "input_text" type="text" name="size"/>
        <p>ブランド・製造元（任意）</P>
        <input class = "input_text" type="text" name="brands" id="brands"/>
        <p>発見後の対応（必須）<br>etc.公園のベンチに置いてきた。<br>●●警察に届けた等</P>
        <textarea
          name="caption"
          id="caption"
          required></textarea>
        <br>
        <p>※更新/削除をご希望の方は<br>IDとPW登録ください（任意）</P>
        <p>ログインID（任意）</P>
        <input class = "input_text" type="text" name="lid"/>
        <p>パスワード（任意）</P>
        <input class = "input_lasttext" type="text" name="lpw"/>
      </div>
      <div class="submit">
        <input type="submit" value="登録" class="btn"/>
      </div>
    </form>

  <!-- //緯度経度の取得 -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script>

  function success(pos){
      var lat = pos.coords.latitude;
      var lng = pos.coords.longitude;


    const html = `
      <input type="hidden" name="latitude" value="${lat}"/>
      <input type="hidden" name="longitude" value="${lng}"/>
    `;

    let container = $(".upload_form");
    container.append(html);
  }

  function fail(pos){
    alert('位置情報の取得に失敗しました。東京中心の緯度経度が入ります。');
    lat = 35.6769883;
    lng = 139.7588499;
    const html = `
      <input type="hidden" name="latitude" value="${lat}"/>
      <input type="hidden" name="longitude" value="${lng}"/>
    `;

    let container = $(".upload_form");
    container.append(html);
  }

  function gps_get() {
  navigator.geolocation.getCurrentPosition(success,fail);
  };
  </script>
    
  </body>
</html>
