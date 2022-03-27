<!DOCTYPE html>
<?php
if(isset($_SESSION["Kullanici"])){
    header("Location: ../../");
    die();
}else{
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/style.css">

    <title>Simple-SQLiLab | login</title>
</head>
<body>
    <button class="button-36" role="button" onclick="window.location='../kayit/'">Kayıt Ol</button>

    <div class="login">
        <h1>Giriş</h1>
        <form method="POST" action="#" id="login-form">
            <input type="text" name="login_username" placeholder="Username"/>
            <input type="password" name="login_passwd" placeholder="Password"/>
            <button type="submit" class="btn btn-primary btn-block btn-large" style="margin-left: 10px;">Giriş yap</button>
            <span id="login-statustxt" style="display: none; text-align: center;">Giriş Yapılıyor...</span>
        </form>
    </div>
</body>
</html>

<script>
var form = document.getElementById("login-form");
var statusTxt = document.getElementById("login-statustxt");

    form.onsubmit = (e)=>{
        e.preventDefault(); // Preventing form from submitting
        statusTxt.style.color = "var(--button-color)";
        statusTxt.style.display = "block";

        let xhr = new XMLHttpRequest(); // Creating new xml object
        xhr.open("POST", "../../config/login.php", true); // Sending POST request to message.php
        xhr.onload = ()=>{
            if(xhr.readyState == 4 && xhr.status == 200){ // If ajax response status is 200 & ready status is 4 means there is no any error                
                let response = xhr.response; // Storing ajax response in a response variable
                if(response.indexOf("Girilen bilgilere ait kullanıcı bulunamadı.") != -1 || response.indexOf("Lütfen boş alan bırakmayın.") != -1){
                    statusTxt.style.color = "#f00";
                }else{
                    form.reset();
                    statusTxt.style.color = "#6f0";
                    setTimeout(()=>{
                        statusTxt.style.display = "none";
                        window.location = '../../';
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
$VeritabaniBaglantisi = null;
?>
