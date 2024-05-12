<?php
error_reporting(0);
require("mainconfig.php");

    $check = mysqli_query($db, "SELECT * FROM users WHERE notif != ''");
    while($data = mysqli_fetch_assoc($check)) {
        $idlog = $data['id'];
        $notif = $data['notif'];
        $nama = $data['nama'];
        $phone = $data['phone'];
    if (mysqli_num_rows($check) == 0) {
        die("Notif login nothing.");
    } else {
        
        if ($notif == "Regist") {
        
                $data = [
                'api_key' => ''.$cfg_apikey.'',
                'sender'  => ''.$cfg_bot.'',
                'number'  => ''.$phone.'',
                'message' => 'Halo '.$nama.', segera lakukan pengisian form pendaftaran di Mitra Industri App.',
                'footer' => 'Silahkan klik tombol dibawah ini.',
        'template1' => 'url|Isi Form|https://smkmitraindustrimm2100.com/form/register',
        'template2' => 'url|Contact|https://wa.me/6281806993369'
            ];
                
                $curl = curl_init();
                                                    
                curl_setopt_array($curl, array(
                  CURLOPT_URL => "https://whatsapp.webhook.my.id/send-template",
                  CURLOPT_RETURNTRANSFER => true,
                  CURLOPT_ENCODING => '',
                  CURLOPT_MAXREDIRS => 10,
                  CURLOPT_TIMEOUT => 0,
                  CURLOPT_FOLLOWLOCATION => true,
                  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                  CURLOPT_CUSTOMREQUEST => 'POST',
                  CURLOPT_POSTFIELDS => json_encode($data),
                  CURLOPT_HTTPHEADER => array(
                    'Content-Type: application/json'
                  ),
                ));
                
                $response = curl_exec($curl);
                
                curl_close($curl);
                $update = mysqli_query($db, "UPDATE users SET notif = '' WHERE id = '$idlog'");
        if ($update == TRUE) {
          echo "===============<br>Notif Success<br><br>Nama : $nama<br>===============<br>";
        } else {
          echo "Error.";
        }
    }
}}