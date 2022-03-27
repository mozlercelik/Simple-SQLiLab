<!DOCTYPE html>
<?php
require_once("../../config/database.php");
if(!isset($_SESSION["Kullanici"])){
    header("Location: ../login/");
    die();
}else{
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/style.css">

    <title>Simple-SQLiLab | Report</title>
</head>
<body>
    <button class="button-36" role="button" onclick="window.location='../../'">Geri Dön</button>

    <div class="report">
        <h1>Rapor formu</h1>
        <form method="POST" action="#" id="report-form">
            <select name="report_database" id="" style="margin-left: 10px;" class="option-selected" onchange="this.className=this.options[this.selectedIndex].className">
                <option value="" class="option-selected">1) Veritabanını seç</option>
                <option value="0">MySQL</option>
                <option value="1">Oracle</option>
                <option value="2">PostgreSQL</option>
                <option value="3">Microsoft SQL Server</option>
                <option value="4">SQLite</option>
                <option value="5">Microsoft Access</option>
                <option value="6">Firebird</option>
                <option value="7">MaxDB</option>
                <option value="8">Sybase</option>
                <option value="9">IBM DB2</option>
                <option value="10">HSQLDB</option>
                <option value="11">H2</option>
                <option value="12">Informix</option>
                <option value="13">MonetDB</option>
                <option value="14">Apache Derby</option>
                <option value="15">Vertica</option>
                <option value="16">Mckoi</option>
                <option value="17">Presto</option>
                <option value="18">Altibase</option>
                <option value="19">MimerSQL</option>
                <option value="20">CrateDB</option>
                <option value="21">Cubrid</option>
                <option value="22">InterSystems Cache</option>
                <option value="23">eXtremeDB</option>
                <option value="24">FrontBase</option>
                <option value="25">Raima Database Manager</option>
                <option value="26">Virtuoso</option>
            </select>
            <input type="text" name="report_dbname" placeholder="2) Veritabanı adı"/>
            <input type="text" name="report_tablename_users" placeholder="3) Üyeler tablo adı"/>
            <input type="text" name="report_tablename_subscribs" placeholder="4) Aboneler tablo adı"/>
            <input type="text" name="report_admin" placeholder="5) Admin'in kullanıcı adı"/>
            <input type="text" name="report_sibervatan" placeholder="6) sibervatan kullanıcısının şifresi (hash olmayacak)"/>
            <button type="submit" class="btn btn-primary btn-block btn-large" style="margin-left: 10px;">Raporu gönder</button>
            <span style="text-align: center; color: #fff; display: block; margin-top: 10px;">Format: sibervatan_xxx</span>
            <span id="report-statustxt" style="display: none; text-align: center;">Rapor gönderiliyor...</span>
        </form>
    </div>
    <?php
        $userID = $_SESSION["Kullanici"][0];

        $sql_query = $VeritabaniBaglantisi->prepare("SELECT report_database as answ1,
        report_dbname as answ2,
        report_tablename_users as answ3,
        report_tablename_subscribs as answ4,
        report_admin as answ5,
        report_sibervatan as answ6
        FROM members WHERE id=?");
        $sql_query->execute([$userID]);
        $userAnswers = $sql_query->fetch(PDO::FETCH_ASSOC);
        if($userAnswers["answ1"] || $userAnswers["answ2"] || $userAnswers["answ3"] || $userAnswers["answ4"] || $userAnswers["answ5"] || $userAnswers["answ6"]){
    ?>
    <div class="report2">
        <h1>Cevapların:</h1>
        <div class="answers">1 <span><?php if($userAnswers["answ1"]){echo "Doğru";} ?></span></div>
        <div class="answers">2 <span><?php if($userAnswers["answ2"]){echo "Doğru";} ?></span></div>
        <div class="answers">3 <span><?php if($userAnswers["answ3"]){echo "Doğru";} ?></span></div>
        <div class="answers">4 <span><?php if($userAnswers["answ4"]){echo "Doğru";} ?></span></div>
        <div class="answers">5 <span><?php if($userAnswers["answ5"]){echo "Doğru";} ?></span></div>
        <div class="answers">6 <span><?php if($userAnswers["answ6"]){echo "Doğru";} ?></span></div>
    </div>
    <?php } ?>
</body>
</html>
<script>
var form = document.getElementById("report-form");
var statusTxt = document.getElementById("report-statustxt");

    form.onsubmit = (e)=>{
        e.preventDefault(); // Preventing form from submitting
        statusTxt.style.color = "var(--button-color)";
        statusTxt.style.display = "block";

        let xhr = new XMLHttpRequest(); // Creating new xml object
        xhr.open("POST", "../../config/reportControl.php", true); // Sending POST request to message.php
        xhr.onload = ()=>{
            if(xhr.readyState == 4 && xhr.status == 200){ // If ajax response status is 200 & ready status is 4 means there is no any error                
                let response = xhr.response; // Storing ajax response in a response variable
                if(response.indexOf("ERROR::Bilinmeyen Hata!") != -1 || response.indexOf("Rapor gönderimi başarısız.") != -1){
                    statusTxt.style.color = "#f00";
                }else{
                    form.reset();
                    statusTxt.style.color = "#6f0";
                    setTimeout(()=>{
                        statusTxt.style.display = "none";
                        window.location.reload(false)
                    }, 1000); // Hide the statusTxt after 3 seconds if the msg is sent
                }
                statusTxt.innerHTML = response;
            }
        }
        let formData = new FormData(form); // Creating new FormData object. This object is used to send form data
        xhr.send(formData); // Sending form data
    }
</script>
<?php
}
?>
