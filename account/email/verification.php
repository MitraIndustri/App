<?php
error_reporting(0);
require("../lib/configuration.php");
include "../vendors/PHPMailer/classes/class.phpmailer.php";

    $check = mysqli_query($db, "SELECT * FROM users WHERE verification != ''");
    
    if (mysqli_num_rows($check) == 0) {
      die("User tidak ditemukan.");
    } else {
      while($data = mysqli_fetch_assoc($check)) {
      
        if (mysqli_num_rows($check) > 0) {
            $mail = new PHPMailer;
            $mail->IsSMTP();
            $mail->SMTPSecure = 'ssl';
            $mail->Host = "mail.davin.id";
            $mail->SMTPDebug = 2;
            $mail->Port = 465;
            $mail->SMTPAuth = true;
            $mail->Username = "notification@davin.id";
            $mail->Password = "@wahyu1234";
            $mail->SetFrom("support@davin.id",$cfg_webname);
            $mail->Subject = "Verifikasi Pendaftaran SMK Mitra Industri) ";
            $mail->AddAddress($data['email'],$data['nama']);
            $mail->MsgHTML("<center><h1><b>Verifikasi Pendaftaran<br/>SMK Mitra Industri MM2100</b></h1></center><br><br>
            <hr></hr>
            <br>Hallo <b> ".$data_user['email'].", </b><br><br>
            Terima kasih telah mendaftarkan diri.<br>
            Silahkan Verifikasi<a href='".$cfg_baseurl."verification/".$data['verification']."'>disini.</a><br><br>
            <hr></hr>
            <br>Regard, $cfg_webname.");
            if($mail->Send()) echo "Message has been sent";
            else echo "Failed to sending message";
            // $whatsapp->sendMessage($data_user['nomor'], 'Your order has been *'.$u_status.'* status. '.$cfg_tab2.'ID Order: '.$o_oid.''.$cfg_tab1.'Target: '.$o_target.''.$cfg_tab1.'Service: '.$o_service.''.$cfg_tab1.'Price: Rp '.number_format($o_price,0,',','.').''.$cfg_tab1.'Message: '.$u_message.'');
        }
        $update = mysqli_query($db, "UPDATE users SET verification = '' WHERE oid = '$o_oid'");
        if ($update == TRUE)
            echo "===============<br>".$data['email']."<br>===============<br>";
        }
        }
    
