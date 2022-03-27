<?php
    require_once("../../config/database.php");
if(!isset($_SESSION["Kullanici"])){
    header("Location: ../../userops/login/");
    die();
}else{
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/style.css">

    <title>Simple-SQLiLab | Galeri</title>
</head>
<body>
<button class="button-36" role="button" onclick="window.location='../../'" style="top: 20px; left: 20px; position: absolute;">Geri Dön</button>
    <div class="picture">
    <?php
    if(isset($_GET["pictValue"])){
        $pictValue = Filtre($_GET["pictValue"]);
        try{
        $kontrolSorgusu = $VeritabaniBaglantisi->query("SELECT * FROM landscape_gallery WHERE id='". $pictValue. "'");
        $picture        = $kontrolSorgusu->fetch(PDO::FETCH_ASSOC);
            if($kontrolSorgusu->rowCount() > 0){
    ?>
        <img src="../../<?= $picture["landscape_pictureURL"] ?>" alt="">
        <div style="color: #fff;"><span><?= $picture["picture_name"] ?></span></div>


    <form action="" method="GET" class="forms">
        <input type="text" class="form-pict input-text" name="pictValue", value="<?= $picture["id"] ?>">
        <input class="button-36 form-pict" type="submit" value="Görseli gör">
    </form>
    <?php
            }else{
                ?>
                <div style="color: #fff;"><span>Görsel bulunamadı.</span></div>
                <form action="" method="GET" class="forms">
                    <input type="text" class="form-pict input-text" name="pictValue">
                    <input class="button-36 form-pict" type="submit" value="Görseli gör">
                </form>
                <?php
            }
        }catch(PDOException $Exception ){
    ?>
        <div style="color: #fff;"><span>Görsel bulunamadı.</span></div>
        <form action="" method="GET" class="forms">
            <input type="text" class="form-pict input-text" name="pictValue">
            <input class="button-36 form-pict" type="submit" value="Görseli gör">
        </form>

<?php
        }
    }
?>
    </div>
</body>
</html>
<?php
}
?>