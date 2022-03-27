<?php
require_once("database.php");

if(!empty($_POST["login_username"]) && !empty($_POST["login_passwd"])){
    $gkusername       = trim($_POST["login_username"]);
    $gkuserpass       = hash("md5", trim($_POST["login_passwd"]));

    $kontrolSorgusu = $VeritabaniBaglantisi->prepare("SELECT * FROM members WHERE kullanici_adi=? AND parola=?");
    $kontrolSorgusu->execute([$gkusername, $gkuserpass]);
    $gkUser  = $kontrolSorgusu->fetch(PDO::FETCH_ASSOC);
    $kontrolSayisi = $kontrolSorgusu->rowCount();
    if($kontrolSayisi > 0){
        $_SESSION["Kullanici"] = array($gkUser["id"], $gkUser["kullanici_adi"]);
        echo "Giriş Başarılı";
    }else{
        echo "Girilen bilgilere ait kullanıcı bulunamadı.";
    
    }
}else{
    echo "Lütfen boş alan bırakmayın.";
}
?>