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

    <title>Simple-SQLiLab | Haber bülteni aboneliği</title>
</head>
<body>
<button class="button-36" role="button" onclick="window.location='../../'" style="top: 20px; left: 20px; position: absolute;">Geri Dön</button>

    <div class="alert info">
        <span class="closebtn">&times;</span>  
        <strong>Bilgilendirme!</strong> Haber bültenimize abone olmak ister misin?<br/>
        Hemen mail adresini yazarak abone olabilirsin!
    </div>

    <div class="subscribe_form">
        <form action="" method="POST" class="forms">
            <input type="email" class="form-pict input-text" name="subscriber_mail" id="" placeholder="e-posta adresiniz" required>
            <input class="button-36 form-pict" type="submit" value="Abone ol">
        </form>
    <?php
    if(isset($_POST["subscriber_mail"])){
        if(filter_var($_POST["subscriber_mail"], FILTER_VALIDATE_EMAIL)){
        ?>
            <div class="alert">
                <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                <strong>Hata!</strong> Lütfen geçerli bir mail adresi girin.
            </div>
        <?php
        }else{
            $subscriber_mail = $_POST["subscriber_mail"];

            $kontrolSorgusu = $VeritabaniBaglantisi->prepare("SELECT * FROM sibervatan_subscribers WHERE subscriberMail=?");
            $kontrolSorgusu->execute([$subscriber_mail]);
            $subscribers        = $kontrolSorgusu->fetch(PDO::FETCH_ASSOC);
            if($kontrolSorgusu->rowCount() > 0){
        ?>
            <div class="alert">
                <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                <strong>Hata!</strong> Bu e-posta ile daha önce abone olunmuş.
            </div>
        <?php
            }else{
                $kontrolSorgusu2 = $VeritabaniBaglantisi->query("INSERT INTO sibervatan_subscribers (subscriberMail) VALUES ('$subscriber_mail')");
                if($kontrolSorgusu2->rowCount() > 0){
        ?>
                    <div class="alert success">
                        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                        <strong>Başarılı</strong> bir şekilde abone oldunuz ☺
                    </div>
        <?php
                }else{
        ?>
                    <div class="alert warning">
                        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                        <strong>Uyarı!</strong> Bilinmeyen bir hata oluştu. Lütfen bildiriniz.
                    </div>
        <?php
                }
            }
        }
    }else{
        ?>
            <div class="alert warning">
                <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                <strong>Uyarı!</strong> Lütfen boş bırakmayın.
            </div>
        <?php
    }
    ?>
</body>
</html>
<?php
}
?>