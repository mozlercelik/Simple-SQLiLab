<?php
session_start();
if(!isset($_SESSION["Kullanici"])){
    header("Location: userops/login/");
    die();
}else{
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">

    <title>Simple-SQLiLab | Anasayfa</title>
</head>
<body>
<button class="button-36" role="button" onclick="window.location='userops/logout/'" style="position: absolute; right: 20px; top: 20px;">Çıkış yap</button>
<button class="button-36" role="button" onclick="window.location='userops/report/'" style="position: absolute; right: 200px; top: 20px;">Rapor Gönder</button>
    <div class="warning" style="color: #fff;">
    <button class="button-36" role="button" style="cursor: default; position: absolute; left: 20px; top: 20px;">[<span style="color: #f00;"> ! </span>] Bulduğun verileri not almayı unutma!!</button>
    </div>
    <div class="labs">
        <button class="button-36" role="button" onclick="window.location='app/e274b0a65912e49a28a9ae5c1479bdce/?pictValue=1'">sqlmap-lab1 ( GET )</button>
        <button class="button-36" role="button" onclick="window.location='app/ee22396c106a303d50c9922e3484f564/'">sqlmap-lab2 ( POST )</button>
    </div>
    
</body>
</html>
<?php
}
?>