<?php
require_once("database.php");

$rpDBinfo       = trim($_POST["report_database"]);
$rpDBname       = trim($_POST["report_dbname"]);
$rpUsersTable   = trim($_POST["report_tablename_users"]);
$rpSubsTable    = trim($_POST["report_tablename_subscribs"]);
$rpAdmin        = trim($_POST["report_admin"]);
$rpSiberVatan   = trim($_POST["report_sibervatan"]);
$rpUserID       = $_SESSION["Kullanici"][0];
$rpUser         = $_SESSION["Kullanici"][1];


    $kontrolSorgusu = $VeritabaniBaglantisi->prepare("SELECT report_database, report_dbname, report_tablename_users, report_tablename_subscribs, report_admin, report_sibervatan
    FROM sibervatan_sqlmap_lab1.members WHERE id=?");
    $kontrolSorgusu->execute([$rpUserID]);
    if($kontrolSorgusu->rowCount() > 0){
        $informations           = $kontrolSorgusu->fetch(PDO::FETCH_ASSOC);
        $report_db              = $informations["report_database"];
        $report_dbname          = $informations["report_dbname"];
        $report_users_table     = $informations["report_tablename_users"];
        $report_subs_table      = $informations["report_tablename_subscribs"];
        $report_admin           = $informations["report_admin"];
        $report_sibervatan      = $informations["report_sibervatan"];

        if($rpDBinfo == 0){
            $report_db = 1;
        }
        if($rpDBname == "sibervatan_sqlmap_lab1"){
            $report_dbname = 1;
        }
        if($rpUsersTable == "sibervatan_members"){
            $report_users_table = 1;
        }
        if($rpSubsTable == "sibervatan_subscribers"){
            $report_subs_table = 1;
        }
        if($rpAdmin == "sibervatan_y0u-4re-aw3some"){
            $report_admin = 1;
        }
        if($rpSiberVatan == "passw0rd123"){
            $report_sibervatan = 1;
        }

        $updateSorgusu = $VeritabaniBaglantisi->prepare("UPDATE sibervatan_sqlmap_lab1.members 
        SET report_database=?,
        report_dbname=?,
        report_tablename_users=?,
        report_tablename_subscribs=?,
        report_admin=?,
        report_sibervatan=?
        WHERE id=?");
        try{
            $updateSorgusu->execute([$report_db, $report_dbname, $report_users_table, $report_subs_table, $report_admin, $report_sibervatan, $rpUserID]);
            echo "Rapor başarıyla gönderildi.";
        }catch(PDOException $Hata){
            echo "sql hatası<br/>" . $Hata->GetMessage();
            die();
        }
    }else{
        echo "ERROR::Bilinmeyen Hata!";
    }

?>