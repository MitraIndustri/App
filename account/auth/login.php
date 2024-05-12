<?php
session_start();
require("../mainconfig.php");
$msg_type = "nothing";
$ip = $_SERVER['REMOTE_ADDR'];
$id = random_number(7);
if (isset($_SESSION['user'])) {
	header("Location: ".$cfg_baseurl);
} else {
    
    if (isset($_GET['1']) AND isset($_GET['2']) AND isset($_GET['3'])) {
		$post_username = $db->real_escape_string(trim(stripslashes(strip_tags(htmlspecialchars($_GET['1'],ENT_QUOTES)))));
		$post_password = $db->real_escape_string(trim(stripslashes(strip_tags(htmlspecialchars($_GET['2'],ENT_QUOTES)))));
		
		$check_user = mysqli_query($db, "SELECT * FROM users WHERE username = '$post_username'");
		$data_user = mysqli_fetch_assoc($check_user);
    		if (empty($post_password)) {
    			$msg_type = "error";
    			$msg_content = "<strong>Failed : </strong>Please fill all input.<META HTTP-EQUIV=Refresh CONTENT=\"3; URL=/login\">";
    		} else if (mysqli_num_rows($check_user) == 0) {
				$msg_type = "error";
				$msg_content = "<strong>Failed : </strong>Username not found/invalid.<META HTTP-EQUIV=Refresh CONTENT=\"3; URL=/login\">";
			} else if (md5($post_password) <> $data_user['password']) {
				$msg_type = "error";
				$msg_content = "<strong>Failed : </strong>Wrong username or password.<META HTTP-EQUIV=Refresh CONTENT=\"3; URL=/login\">";
			} else {
				    mysqli_query($db, "INSERT INTO login (username, ip, device, action, website, dates, date, time) VALUES ('$post_username', '$ip', '$device', 'Login', 'PELANGGARAN', '$dates', '$date', '$time')");
				    $_SESSION['user'] = $data_user;
					header("location: ".$cfg_baseurl);
				}
			}
			
	if (isset($_POST['login'])) {
		$post_username = mysqli_real_escape_string($db, trim($_POST['username']));
		$post_password = mysqli_real_escape_string($db, trim($_POST['password']));
        $post_ip = mysqli_real_escape_string($db, $_POST['addip']);
		if (empty($post_username) || empty($post_password)) {
			$msg_type = "error";
			$msg_content = "<b>Gagal:</b> Mohon mengisi semua input.";
		} else {
			$check_user = mysqli_query($db, "SELECT * FROM users WHERE username = '$post_username'");
			if (mysqli_num_rows($check_user) == 0) {
				$msg_type = "error";
				$msg_content = "<strong>Failed : </strong>Username tidak ditemukan.";
			} else {
				$data_user = mysqli_fetch_assoc($check_user);
				if (md5($post_password) <> $data_user['password']) {
					$msg_type = "error";
					$msg_content = "<strong>Failed : </strong>Username atau password salah.";
				} else {
				    mysqli_query($db, "INSERT INTO login (username, ip, device, action, website, dates, date, time) VALUES ('$post_username', '$ip', '$device', 'Login', 'PELANGGARAN', '$dates', '$date', '$time')");
				    $_SESSION['user'] = $data_user;
					header("location: ".$cfg_baseurl);
				}
			}
		}
	}
    include("../lib/header.php");
	?>
<br/><br/><br/>
	<div class="row">
			<div class="col-lg-10 mx-auto">
			    <div class="ms-panel">
            <div class="ms-panel-header">
              <h6>Masuk</h6>
            </div>
            <div class="ms-panel-body">
				            
                        <?php 
										if ($msg_type == "error") {
										?>
										<div class="alert alert-danger">
											<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
											<i class="fa fa-times-circle"></i>
											<?php echo $msg_content; ?>
										</div>
										<?php
										}
										?>
                                    
                                        
                                        <div class="text-center w-75 m-auto">
                                            <img src="<?php echo $cfg_baseurl; ?>assets/images/mitra.png" width="200" height="200" class="rounded-circle img-thumbnail" alt="profile-image">
                                        </div><hr>
                                        
              <form method="POST">
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Email/Username</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="username" placeholder="Masukkan Email/Username" required>
                  </div>
                </div>
                <input name="addip" type="hidden" value="<?php echo $ip; ?>"></input>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Password</label>
                  <div class="col-sm-10">
                    <input type="password" class="form-control" name="password" placeholder="Masukkan Password" required>
                  </div>
                </div>
                
                <div class="form-group row">
					  <label class="col-sm-2 col-form-label"></label>
					  <div class="col-sm-10">
					     <button type="reset" class="btn btn-danger shadow-primary btn-round px-5"><i class="icon-lock"></i> Ulangi</button>
						<button type="submit" class="btn btn-primary shadow-primary btn-round px-5" name="login"><i class="icon-lock"></i> Login</button>
					  </div>
					</div>
              </form>
              Belum punya akun? <a href="<?php echo $cfg_baseurl; ?>auth/register">Daftar sekarang!</a>
            </div>
          </div>
        </div>
              
        <div class="col-lg-10 mx-auto">
          <div class="ms-panel">
            <div class="ms-panel-header">
              <h6>Tentang Kami</h6>
            </div>
            <div class="ms-panel-body">
              <p class="card-text"> <b><?php echo $cfg_webname; ?> | Alamat </b> <?php echo $cfg_about; ?>
              <center><iframe width="230" height="158" src="https://www.youtube.com/embed/TUR9ps34Mlc" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></center>
                <hr>
                <ul>
                    <li>Kelola Poin & Kehadiran.</li>
                    <li>Kelola Nilai Rapor Siswa.</li>
                    <li>Export Nilai Rapor Siswa.</li>
                    <li>24 Hours support.</li>
                </ul></p>
            </div>
            <div class="card-footer"></div>
          </div>
        </div>
      </div><!--End Row-->
<?php
	include("../lib/footer.php");
}
?>