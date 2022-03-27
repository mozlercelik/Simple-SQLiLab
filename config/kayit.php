<?php
require_once("database.php");
if(isset($_POST["kayit_username"]) && isset($_POST["kayit_passwd"])){
    $kousername       = trim($_POST["kayit_username"]);
    $kouserpass       = hash("md5", trim($_POST["kayit_passwd"]));

    $kontrolSorgusu = $VeritabaniBaglantisi->prepare("SELECT * FROM members WHERE kullanici_adi=?");
    $kontrolSorgusu->execute([$kousername]);
    $kontrolSayisi  = $kontrolSorgusu->rowCount();

    if($kontrolSayisi > 0){
        echo "Girilen bilgilere sahip kullanıcı daha önce kayıt yapmış.";
    }else{
        $kayitEkle =   $VeritabaniBaglantisi->prepare("INSERT INTO members (kullanici_adi, parola) values (?, ?)");
        $kayitEkle->execute([$kousername, $kouserpass]);
		$kayitkontrolSayisi  =   $kayitEkle->rowCount();
        if($kayitkontrolSayisi > 0){
            echo "Kayıt başarılı.";
        }else{
            echo "Kayıt yapılırken bir hata oluştu.";
        }
    
    }
}else{
    echo "Lütfen boş alan bırakmayın.";
}



?>