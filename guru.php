<?php
error_reporting(0);
include "vendor/PHPMailer/classes/class.phpmailer.php";
require("config.php");

    $check = mysqli_query($db, "SELECT * FROM users WHERE notif != ''");
    while($data = mysqli_fetch_assoc($check)) {
        $idlog = $data['id'];
        $check = mysqli_query($db, "SELECT * FROM users WHERE id = '$idlog'");
        $data = mysqli_fetch_assoc($check);
        $username = $data['username'];
        
    if (mysqli_num_rows($check) == 0) {
        echo "===============<br>Tidak ada notifikasi lagi.<br>===============<br>";
    } else {
        
        // if ($notif != "") {
        $mail = new PHPMailer;
        $mail->IsSMTP();
        $mail->SMTPSecure = 'ssl';
        $mail->Host = "smkmitraindustrimm2100.com";
        $mail->SMTPDebug = 2;
        $mail->Port = 465;
        $mail->SMTPAuth = true;
        $mail->Username = "davinwardana@smkmitraindustrimm2100.com";
        $mail->Password = "1tm1tr4101101";
        $mail->SetFrom("davinwardana@smkmitraindustrimm2100.com","Davin Wardana");
        $mail->Subject = "Mitra Industri Account";
        $mail->AddAddress($data['email'],$data['nama']);
        $mail->MsgHTML('
        <!DOCTYPE html>
        <html>
        <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="ie-edge">
        <title></title>
        <style type="text/css">
        </style>
        </head>
        <body style="background-color:#eee; font-size:13px;">
        <div style="max-width: 750px;min-width:200px; background-color:#EAF2F8;padding:20px;margin: auto;">
          <center>
          <img src="'.$cfg_baseurl.'favicon.ico" width="350">
                    <h2>Selamat Datang</h2>
                    <h1>'.$data['nama'].'</h1>
                        <p>Selamat datang di Mitra Industri App, silahkan gunakan data dibawah ini untuk login ke akun anda, akun anda memiliki akses khusus untuk guru, jadi menu akan berbeda dengan yang digunakan siswa lainnya, harap jaga akun anda agar tetap aman dan tidak diketahui siapapun, berikut data anda:<br><br>
        </center>
                        <b>Nama</b> : '.$data['nama'].'<br>
                        <b>Email</b> : '.$data['email'].'<br>
                        <b>Username</b> : '.$data['username'].'<br>
                        <b>Password</b> : '.$data['username'].'<br>
                        
                    <p>Harap pastikan huruf kapital benar, silahkan <a href="'.$cfg_baseurl.'"><b>login disini.</b></a></p>
                        <br>
                       <center>	
                       <hr>
                       <h3>Contact Developer</h3>
                       
        				<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/e/e7/Instagram_logo_2016.svg/1200px-Instagram_logo_2016.svg.png" width="15px" height="15px">&nbsp;<a href="https://www.instagram.com/davin_wardana/">davin_wardana</a><br>
        				<img src="https://play-lh.googleusercontent.com/lMoItBgdPPVDJsNOVtP26EKHePkwBg-PkuY9NOrc-fumRtTFP4XhpUNk_22syN4Datc" width="20px" height="20px">&nbsp;<a href="https://www.youtube.com/c/DavinWardana">Davin Wardana</a><br>
        				<img src="https://www.freepnglogos.com/uploads/logo-website-png/logo-website-website-logo-png-transparent-background-background-15.png" width="15px" height="15px">&nbsp;<a href="https://davin.id?mitra=1">davin.id</a>
        				
        			</center>
          </center>
        </div>
        </body>
        </html> 
        ');
            //   <img src="https://play-lh.googleusercontent.com/lMoItBgdPPVDJsNOVtP26EKHePkwBg-PkuY9NOrc-fumRtTFP4XhpUNk_22syN4Datc" width="20px" height="20px">&nbsp;<a href="https://www.youtube.com/channel/UCXyS8encGuXjGfzZdpOHPYw">SMK Mitra Industri MM2100 (Official)</a><br>
				// <img src="https://www.freepnglogos.com/uploads/logo-website-png/logo-website-website-logo-png-transparent-background-background-15.png" width="15px" height="15px">&nbsp;<a href="https://smkind-mm2100.sch.id/">SMK Mitra Industri MM2100 Official</a><br>
if($mail->Send()) echo "Message has been sent";
            else echo "Failed to sending message";
        }
            $update = mysqli_query($db, "UPDATE users SET notif = '' WHERE id = '$idlog'");
        if ($update == TRUE) {
            echo "===============<br>Notif Success<br><br>Username : $username<br>===============<br>";
        } else {
          echo "===============<br>Error.<br>===============<br>";
        }
    }
    // }
