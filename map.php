<?php 
$post = $_POST;
// echo ("<br>");
$hinmei = filter_input(INPUT_POST, 'hinmei', FILTER_SANITIZE_SPECIAL_CHARS);
// echo ("<br>");
$latitude = filter_input(INPUT_POST, 'latitude', FILTER_SANITIZE_SPECIAL_CHARS);
// echo $latitude;
// echo ("<br>");
$longitude = filter_input(INPUT_POST, 'longitude', FILTER_SANITIZE_SPECIAL_CHARS);
// echo $longitude;
// echo ("<br>");
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Otoshimono Map</title>
    <!-- <link rel="stylesheet" href="css/style.css"> -->
    <style>body{padding:0;margin:0;background:#333;}h1{padding:0;margin:0;font-size:50%;color:white;}</style>
</head>
<body>
<h1>Otoshimono Map</h1>
<div class = "wrapper" style='margin:0 auto;width:600px;height:1200px;display:flex'>
    <div id="myMap" style='width:100%;height:70%'></div>
</div>


<!-- [ EVENT Object ] https://msdn.microsoft.com/en-us/library/mt750279.aspx -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src='https://www.bing.com/api/maps/mapcontrol?callback=GetMap&key=XXX' async defer></script>
<script>
    var hinmei = "<?=$hinmei?>";
    var lat = <?=$latitude?>;
    var lng = <?=$longitude?>;
//----------------------------
//Bing Mapsの読み込み//
//----------------------------
function GetMap() {
    //Map:init
    let map = new Microsoft.Maps.Map('#myMap', {
        center: new Microsoft.Maps.Location(lat, lng),
        zoom: 15
    });

    let location = new Microsoft.Maps.Location(lat, lng);
    let pin = new Microsoft.Maps.Pushpin(location, {
        text: hinmei,
        icon: './pushpin2.png' 
    });
    map.entities.push(pin); //Add pin to Map
};

</script>
</body>
</html>