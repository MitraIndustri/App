<?php
session_start();
require("mainconfig.php");
if (isset($_SESSION['user'])) {
	$sess_username = $_SESSION['user']['username'];
	$check_user = mysqli_query($db, "SELECT * FROM users WHERE username = '$sess_username'");
	$data_user = mysqli_fetch_assoc($check_user);
    
	if (mysqli_num_rows($check_user) == 0) {
		header("Location: ".$cfg_baseurl."auth/logout.php");
	}
    
    $ua = $_SERVER['HTTP_USER_AGENT'];
    if(preg_match('#Mozilla/4.05 [fr] (Win98; I)#',$ua) || preg_match('/Java1.1.4/si',$ua) || preg_match('/MS FrontPage Express/si',$ua) || preg_match('/HTTrack/si',$ua) || preg_match('/IDentity/si',$ua) || preg_match('/HyperBrowser/si',$ua) || preg_match('/Lynx/si',$ua)) 
    {
    header('Location:http://shafou.com');
    die();
    }
} else {
	header("Location: ".$home."login");
}
    if (isset($_POST['change_pswd'])) {
		$post_password = trim(stripslashes(strip_tags(htmlspecialchars($_POST['password'],ENT_QUOTES))));
		$post_npassword = trim(stripslashes(strip_tags(htmlspecialchars($_POST['npassword'],ENT_QUOTES))));
		$post_cnpassword = trim(stripslashes(strip_tags(htmlspecialchars($_POST['cnpassword'],ENT_QUOTES))));
		if (empty($post_password) || empty($post_npassword) || empty($post_cnpassword)) {
			$msg_type = "error";
			$msg_content = '<b>Gagal:</b> Mohon mengisi semua input.';
		} else if (md5($post_password) <> $data_user['password']) {
			$msg_type = "error";
			$msg_content = '<b>Gagal:</b> Password salah.';
		    $data = [
                'api_key' => ''.$cfg_apikey.'',
                'sender'  => ''.$cfg_bot.'',
                'number'  => ''.$data_user['phone'].'',
                'message' => '*Mitra Industri*',
                'footer' => 'Ada percobaan penggantian password akun Mitra Industri yang gagal. Jika ini bukan anda, harap segera lakukan pengubahan dan pengamanan akun segera.',
        'template1' => 'url|Login|'.$home.'',
        'template2' => 'url|Reset Password|'.$cfg_baseurl.''
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
		} else if ($sess_username == "demo") {
			$msg_type = "error";
			$msg_content = '<b>Gagal:</b> Akun demo dilarang mengubah data.';
		} else if (strlen($post_npassword) < 5) {
			$msg_type = "error";
			$msg_content = '<b>Gagal:</b> Password baru telalu pendek, minimal 5 karakter.';
		} else if ($post_cnpassword <> $post_npassword) {
			$msg_type = "error";
			$msg_content = '<b>Gagal:</b> Konfirmasi password baru tidak sesuai.';
		} else {
		    $data = [
                'api_key' => ''.$cfg_apikey.'',
                'sender'  => ''.$cfg_bot.'',
                'number'  => ''.$data_user['phone'].'',
                'message' => '*Mitra Industri*
                
Nama : '.$data_user['asli'].'
Username : '.$sess_username.'
Password Baru : '.$post_cnpassword.'',
                'footer' => 'Anda baru saja mengganti password account Mitra Industri anda. Jika ini bukan anda, harap segera lakukan pengubahan dan pengamanan akun segera.',
        'template1' => 'url|Login|'.$home.'',
        'template2' => 'url|Reset Password|'.$cfg_baseurl.''
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
                $post_cnpassword = md5($post_cnpassword);
			$update_user = mysqli_query($db, "UPDATE users SET password = '$post_cnpassword' WHERE username = '$sess_username'");
			if ($update_user == TRUE) {
				$msg_type = "success";
				$msg_content = '<b>Success:</b> Password telah diubah.';
			} else {
				$msg_type = "error";
				$msg_content = '<b>Gagal:</b> Error system.';
			}
		}
	} else if (isset($_POST['phone'])) {
	    $post_phone = trim($_POST['phone']);
		$check_phone = mysqli_query($db, "SELECT * FROM users WHERE phone = '$post_phone'");
	    if ($post_phone == $data_user['phone']) {
		$msg_type = "error";
		$msg_content = "<b>Gagal:</b> Anda sudah menggunakan nomor WhatsApp $post_phone.";
	    } else if (mysqli_num_rows($check_phone) > 0) {
		$msg_type = "error";
		$msg_content = "<b>Gagal:</b> Nomor WhatsApp $post_phone sudah terdaftar dalam database.";
	    } else {
		    $data = [
                'api_key' => ''.$cfg_apikey.'',
                'sender'  => ''.$cfg_bot.'',
                'number'  => ''.$data_user['phone'].'',
                'message' => '*Mitra Industri*
                
Nama : '.$data_user['asli'].'
Username : '.$sess_username.'
WhatsApp Baru : '.$post_phone.'',
                'footer' => 'Nomor WhatsApp baru telah terhubung. Anda baru saja melakukan perubahan nomor pada akun Mitra Industri. Jika ini bukan anda, harap segera lakukan pengubahan dan pengamanan akun segera.',
        'template1' => 'url|Login|'.$home.'',
        'template2' => 'url|Reset Password|'.$cfg_baseurl.''
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
		    $data = [
                'api_key' => ''.$cfg_apikey.'',
                'sender'  => ''.$cfg_bot.'',
                'number'  => ''.$post_phone.'',
                'message' => '*Mitra Industri*
                
Nama : '.$data_user['asli'].'
Username : '.$sess_username.'
WhatsApp Baru : '.$post_phone.'',
                'footer' => 'Nomor WhatsApp baru telah terhubung. Anda baru saja melakukan perubahan nomor pada akun Mitra Industri. Jika ini bukan anda, harap segera lakukan pengubahan dan pengamanan akun segera.',
        'template1' => 'url|Login|'.$home.'',
        'template2' => 'url|Reset Password|'.$cfg_baseurl.''
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
	    $update_user = mysqli_query($db, "UPDATE users SET phone = '$post_phone' WHERE username = '$sess_username'");
	    if ($update_user == TRUE) {
		$msg_type = "success";
		$msg_content = "<b>Berhasil:</b> Nomor berhasil diubah.";
		} else {
	    $msg_type = "error";
		$msg_content = "<b>Gagal:</b> Error system.";
			}
		}
	}
    else if (isset($_POST['change_profile'])) {
		$extention	= array('png','jpg','jpeg');
		$file = $_FILES['file']['name'];
		$x = explode('.', $file);
		$hasil = str_replace(" ", "", $file);
		$ekstensi = strtolower(end($x));
		$size = $_FILES['file']['size'];
		$file_tmp = $_FILES['file']['tmp_name'];
		$target = $data_user['target'];
		$upload = "davin-wardana-".$target."-".$date."-".$hasil;
		$url = $cfg_baseurl."foto/".$upload;
		if (empty($file)) {
			$msg_type = "error";
			$msg_content = "<b>Error:</b> Mohon mengisi semua input.";
		} else if (in_array($ekstensi, $extention) === FALSE) {
		    $msg_type = "error";
			$msg_content = "<b>Error:</b> File harus berjenis 'jpg','png' atau 'jpeg'.";
		} else {
	    move_uploaded_file($file_tmp, 'foto/'.$upload);
		$update_user = mysqli_query($db, "UPDATE users SET profile = '$url' WHERE username = '$sess_username'");
	    if ($update_user == TRUE) {
		$msg_type = "success";
		$msg_content = "<b>Berhasil:</b> Profile berhasil diubah.";
		} else {
	    $msg_type = "error";
		$msg_content = "<b>Gagal:</b> Error system.";
			}
		}
	}
	else if (isset($_POST['change_nama'])) {
	    $post_nama = trim($_POST['nama']);
		$check_dbnama = mysqli_query($db, "SELECT * FROM users WHERE nama = '$post_nama'");
	    if (mysqli_num_rows($check_dbnama) > 0) {
		$msg_type = "error";
		$msg_content = "<b>Gagal:</b> Nama $post_nama sudah terdaftar dalam database.";
	    } 
	    else 
	    {
	    $update_user = mysqli_query($db, "UPDATE users SET nama = '$post_nama' WHERE username = '$sess_username'");
	     $update_user = mysqli_query($db, "UPDATE guru SET nama = '$post_nama' WHERE username = '$sess_username'");
	    if ($update_user == TRUE) {
		$msg_type = "success";
		$msg_content = "<b>Berhasil:</b> Nama berhasil diubah.";
		} else {
	    $msg_type = "error";
		$msg_content = "<b>Gagal:</b> Error system.";
			}
		}
	}
	else if (isset($_POST['change_theme'])) {
	    $post_theme = trim($_POST['theme']);
		$check_dbtheme = mysqli_query($db, "SELECT * FROM users WHERE username = '$sess_username'");
	    if (mysqli_num_rows($check_dbtheme) == $post_theme) {
		$msg_type = "error";
		$msg_content = "<b>Gagal:</b> Tema ini sudah active.";
	    } else {
	    $update_theme = mysqli_query($db, "UPDATE users SET theme = '$post_theme' WHERE username = '$sess_username'");
	    if ($update_theme == TRUE) {
		$msg_type = "success";
		$msg_content = "Tema telah diaktifkan.";
		} else {
	    $msg_type = "error";
		$msg_content = "<b>Gagal:</b> Error system.";
			}
		}
	}
	else if (isset($_POST['change_nik'])) {
	    $post_nik = trim($_POST['nik']);
		$check_dbguru = mysqli_query($db, "SELECT * FROM guru WHERE nik = '$post_nik'");
	    if (mysqli_num_rows($check_dbguru) > 0) {
		$msg_type = "error";
		$msg_content = "<b>Gagal:</b> Nik $post_email sudah terdaftar dalam database.";
	    } 
	    else 
	    {
	    $update_nik = mysqli_query($db, "UPDATE guru SET nik = '$post_nik' WHERE username = '$sess_username'");
	    if ($update_nik == TRUE) {
		$msg_type = "success";
		$msg_content = "<b>Berhasil:</b> NIK Anda berhasil diubah.";
		} else {
	    $msg_type = "error";
		$msg_content = "<b>Gagal:</b> Error system.";
			}
		}
	}
	else if (isset($_POST['change_mail'])) {
	    $post_email = trim($_POST['email']);
		$check_dbemail = mysqli_query($db, "SELECT * FROM users WHERE email = '$post_email'");
	    if (mysqli_num_rows($check_dbemail) > 0) {
		$msg_type = "error";
		$msg_content = "<b>Gagal:</b> Email $post_email sudah terdaftar dalam database.";
	    } 
	    else 
	    {
	    $update_user = mysqli_query($db, "UPDATE users SET email = '$post_email' WHERE username = '$sess_username'");
	    if ($update_user == TRUE) {
		$msg_type = "success";
		$msg_content = "<b>Berhasil:</b> Email berhasil diubah.";
		} else {
	    $msg_type = "error";
		$msg_content = "<b>Gagal:</b> Error system.";
			}
		}
	}
	else if (isset($_POST['change_cita'])) {
	    $post_cita = trim($_POST['cita']);
	    $update_user = mysqli_query($db, "UPDATE users SET citacita = '$post_cita' WHERE username = '$sess_username'");
	    if ($update_user == TRUE) {
		$msg_type = "success";
		$msg_content = "<b>Berhasil:</b> Cita-cita berhasil diubah.";
		} else {
	    $msg_type = "error";
		$msg_content = "<b>Gagal:</b> Error system.";
			}
		}
	else if (isset($_POST['change_achievement'])) {
	    $post_achievement = trim($_POST['achievement']);
	    $update_user = mysqli_query($db, "UPDATE users SET achievement = '$post_achievement' WHERE username = '$sess_username'");
	    if ($update_user == TRUE) {
		$msg_type = "success";
		$msg_content = "<b>Berhasil:</b> Achievement berhasil diubah.";
		} else {
	    $msg_type = "error";
		$msg_content = "<b>Gagal:</b> Error system.";
			}
		}
	
	$check_user = mysqli_query($db, "SELECT * FROM users WHERE username = '$sess_username'");
	$data_user = mysqli_fetch_assoc($check_user);

	$check_guruu = mysqli_query($db, "SELECT * FROM guru WHERE username = '$sess_username'");
	$data_guruu = mysqli_fetch_assoc($check_guruu);
	
	include("lib/header.php");
	
?>
<div class="row">
								
							<div class="col-lg-12 mx-auto">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="member-card">
                                        <div class="text-center w-75 m-auto">
                                            <img src="<?php echo $data_user['profile']; ?>" class="img-thumbnail" alt="profile-image">
                                        </div>

                                        <div class="text-center w-75 m-auto">
                                            <h4 class="m-b-5 mt-2"><?php echo $data_user['asli']; ?></h4>
                                            <p class="text-muted">Informasi Profile Anda</p>
                                        </div> 

									<div class="table-responsive">
										<table class="table table-bordered">
										        <tr>
													<td>Username</td>
													<td><?php echo $data_user['username']; ?></td>
												</tr>
												<tr>
													<td>Account</td>
													<td><?php echo $data_user['status']; ?></td>
												</tr>
												<?php if (!empty($data_user['phone'])) { ?>
												<tr>
													<td>Phone</td>
													<td><?php echo $data_user['phone']; ?></td>
												</tr>
												<?php } ?>
												<?php if (!empty($data_user['email'])) { ?>
												<tr>
													<td>Email</td>
													<td><?php echo $data_user['email']; ?></td>
												</tr>
												<?php } ?>
												<?php if (!empty($data_user['nis'])) { ?>
												<tr>
													<td>NIS</td>
													<td><?php echo $data_user['nis']; ?></td>
												</tr>
												<?php } ?>
												<?php if (!empty($data_user['nisn'])) { ?>
												<tr>
													<td>NISN</td>
													<td><?php echo $data_user['nisn']; ?></td>
												</tr>
												<?php } ?>
												<?php if (!empty($data_user['kelas'])) { ?>
												<tr>
													<td>Kelas</td>
													<td><?php echo $data_user['kelas']; ?></td>
												</tr>
												<?php } ?>
												<?php if (!empty($data_user['jurusan'])) { ?>
												<tr>
													<td>Jurusan</td>
													<td><?php echo $data_user['jurusan']; ?></td>
												</tr>
												<?php } ?>
												<?php if ($data_user['point'] != '') { ?>
												<tr>
													<td>Point</td>
													<td><?php echo $data_user['point']; ?> Point</td>
												</tr>
												<?php } ?>
										</table>
									</div>

                                    </div>

                                </div> <!-- end card-box -->
                            </div> <!-- end col -->
                        </div>
								
                        </div>
                        <!-- end row -->
						<div class="row">
						    <div class="col-lg-12">
										<?php 
										if ($msg_type == "success") {
										?>
										<div class="alert alert-success">
											<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
											<i class="fa fa-check-circle"></i>
											<?php echo $msg_content; ?>
										</div>
										<?php
										} else if ($msg_type == "error") {
										?>
										<div class="alert alert-danger">
											<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
											<i class="fa fa-times-circle"></i>
											<?php echo $msg_content; ?>
										</div>
										<?php
										}
										?>
							</div>
						</div>
						<div class="row">	
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header text-uppercase">Ganti Password</div>
                                        <div class="card-body">
										<form class="form-horizontal" role="form" method="POST">
											<div class="form-group">
												<label class="col-md-12 control-label">Password</label>
												<div class="col-md-9">
													<input type="password" name="password" class="form-control" placeholder="Password">
												</div>
											</div>
											<div class="form-group">
												<label class="col-md-12 control-label">Password Baru</label>
												<div class="col-md-9">
													<input type="password" name="npassword" class="form-control" placeholder="Password Baru">
												</div>
											</div>
											<div class="form-group">
												<label class="col-md-12 control-label">Konfirmasi Password Baru</label>
												<div class="col-md-9">
													<input type="password" name="cnpassword" class="form-control" placeholder="Konfirmasi Password Baru">
												</div>
											</div>
											<div class="form-group">
												<div class="col-md-offset-2 col-md-10">
											<button type="submit" class="btn btn-success btn-bordered waves-effect w-md waves-light" name="change_pswd">Ubah Password</button>
												</div>
											</div>
										</form>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header text-uppercase">Ganti Profile</div>
                                        <div class="card-body">
										<form class="form-horizontal" method="POST" enctype="multipart/form-data">
											<div class="form-group">
												<label class="col-md-12 control-label">Upload Foto</label>
												<div class="col-md-9">
													<input type="file" name="file" class="form-control"/>
												</div>
											</div>
											
											<div class="form-group">
												<div class="col-md-offset-2 col-md-10">
											<button type="submit" class="btn btn-success btn-bordered waves-effect w-md waves-light" name="change_profile">Ubah Profile</button>
												</div>
											</div>
										</form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header text-uppercase">Cita-Cita</div>
                                        <div class="card-body">
										<form class="form-horizontal" role="form" method="POST">
											<div class="form-group">
												<label class="col-md-12 control-label">Cita-Cita</label>
												<div class="col-md-9">
													<input type="text" name="cita" class="form-control" placeholder="Cita-Cita" value="<?php echo $data_user['citacita']; ?>">
												</div>
											</div>
											
											<div class="form-group">
												<div class="col-md-offset-2 col-md-10">
											<button type="submit" class="btn btn-success btn-bordered waves-effect w-md waves-light" name="change_cita">Ubah Cita-Cita</button>
												</div>
											</div>
										</form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header text-uppercase">Achievement</div>
                                        <div class="card-body">
										<form class="form-horizontal" role="form" method="POST">
											<div class="form-group">
												<label class="col-md-12 control-label">achievement</label>
												<div class="col-md-9">
													<input type="text" name="achievement" class="form-control" placeholder="Achievement" value="<?php echo $data_user['achievement']; ?>">
												</div>
											</div>
											
											<div class="form-group">
												<div class="col-md-offset-2 col-md-10">
											<button type="submit" class="btn btn-success btn-bordered waves-effect w-md waves-light" name="change_cita">Ubah Achievement</button>
												</div>
											</div>
										</form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header text-uppercase">WhatsApp</div>
                                        <div class="card-body">
										<form class="form-horizontal" role="form" method="POST">
											<div class="form-group">
												<label class="col-md-12 control-label">Nomor WhatsApp</label>
												<div class="col-md-9">
													<input type="text" name="phone" class="form-control" placeholder="Isi dengan nomor WhatsApp anda..." value="<?php echo $data_user['phone']; ?>">
												</div>
											</div>
											
											<div class="form-group">
												<div class="col-md-offset-2 col-md-10">
											<button type="submit" class="btn btn-success btn-bordered waves-effect w-md waves-light" name="change_phone">Ubah Nomor</button>
												</div>
											</div>
										</form>
                                </div>
                            </div>
                        </div>
                        <?php
        				if ($data_user['username'] == "davin") {
        				?>
                        <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header text-uppercase">Ganti Nama</div>
                                        <div class="card-body">
										<form class="form-horizontal" role="form" method="POST">
											<div class="form-group">
												<label class="col-md-12 control-label">Nama Lengkap</label>
												<div class="col-md-9">
													<input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" value="<?php echo $data_user['nama']; ?>">
												</div>
											</div>
											
											<div class="form-group">
												<div class="col-md-offset-2 col-md-10">
											<button type="submit" class="btn btn-success btn-bordered waves-effect w-md waves-light" name="change_nama">Ubah Nama</button>
												</div>
											</div>
										</form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header text-uppercase">Ganti Tema</div>
                                        <div class="card-body">
										<form class="form-horizontal" role="form" method="POST">
											<div class="form-group">
												<label class="col-md-12 control-label">Pilih Tema</label>
												    <select class="form-control" name="theme" id="sistem">
														<option value="<?php echo $data_user['theme']; ?>"><?php echo $data_user['theme']; ?> (Active)</option>
														<option value="dark">Dark Mode</option></option>
														<option value="primary">Tema Biasa</option>
													</select>
											</div>
											
											<div class="form-group">
												<div class="col-md-offset-2 col-md-10">
											<button type="submit" class="btn btn-success btn-bordered waves-effect w-md waves-light" name="change_theme">Ubah Tema</button>
												</div>
											</div>
										</form>
                                </div>
                            </div>
                        </div>
                        <?php
                        }
                        ?>
                        <?php
        				if ($data_user['status'] == "Guru") {
        				?>
                        <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header text-uppercase">Ganti NIK</div>
                                        <div class="card-body">
										<form class="form-horizontal" role="form" method="POST">
											<div class="form-group">
												<label class="col-md-12 control-label">NIK Guru</label>
												<div class="col-md-9">
													<input type="text" name="nik" class="form-control" placeholder="Isi Dengan NIK Anda" value="<?php echo $data_guruu['nik']; ?>">
												</div>
											</div>
											
											<div class="form-group">
												<div class="col-md-offset-2 col-md-10">
											<button type="submit" class="btn btn-success btn-bordered waves-effect w-md waves-light" name="change_nik">Ubah NIK</button>
												</div>
											</div>
										</form>
                                </div>
                            </div>
                        </div>
          <!--              <div class="col-lg-6">-->
          <!--                      <div class="card">-->
          <!--                          <div class="card-header text-uppercase">Ganti Nama</div>-->
          <!--                              <div class="card-body">-->
										<!--<form class="form-horizontal" role="form" method="POST">-->
										<!--	<div class="form-group">-->
										<!--		<label class="col-md-12 control-label">Nama Lengkap</label>-->
										<!--		<div class="col-md-9">-->
										<!--			<input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" value="<?php echo $data_user['nama']; ?>">-->
										<!--		</div>-->
										<!--	</div>-->
											
										<!--	<div class="form-group">-->
										<!--		<div class="col-md-offset-2 col-md-10">-->
										<!--	<button type="submit" class="btn btn-success btn-bordered waves-effect w-md waves-light" name="change_nama">Ubah Nama</button>-->
										<!--		</div>-->
										<!--	</div>-->
										<!--</form>-->
          <!--                      </div>-->
          <!--                  </div>-->
          <!--              </div>-->
                        <?php
                        }
                        ?>
                        
                        </div>
                    </div>
                    </div>
                </div>
<?php
include("lib/footer.php");
?> 