<?php
session_start();
require("../mainconfig.php");
$ip = $_SERVER['REMOTE_ADDR'];
$id = random_number(7);
if (isset($_SESSION['user'])) {
	header("Location: ".$cfg_baseurl);
} else {
	if (isset($_POST['daftar'])) {
		$post_email = $_POST['email'];
		$post_password = $_POST['password'];

		$checkdb_user = mysqli_query($db, "SELECT * FROM users WHERE email = '$post_email'");
		$datadb_user = mysqli_fetch_assoc($checkdb_user);
		$post_random = random(30);
			if (empty($post_password) || empty($post_email)) {
				$msg_type = "error";
				$msg_content = "<b>Gagal:</b> Mohon mengisi semua input.";
			} else if (mysqli_num_rows($checkdb_user) > 0) {
				$msg_type = "error";
				$msg_content = "<b>Gagal:</b> Email $post_email sudah terdaftar dalam pendaftaran.";
			} else {
			    $post_md5 = md5($_POST['password']);
				$insert_user = mysqli_query($db, "INSERT INTO users (username, email, password, registered, tahun, verification) VALUES ('$post_email', '$post_email', '$post_md5', '$date $time', '2021/2022', '$post_random')");
				if ($insert_user == TRUE) {
				    $msg_login = $cfg_baseurl."auth/login?1=".$post_email."&2=".$post_password."&3=Ok";
					$msg_type = "success";
					$msg_content = "
					<b>Pendaftaran Berhasil</b><br />
					<b>Berhasil:</b> Member telah ditambahkan.<br />
					<b>Email:</b> $post_email<br />
					<b>Password:</b> $post_password<br />
					<meta http-equiv='refresh' content='3; url=$msg_login'>";
				} else {
					$msg_type = "error";
					$msg_content = "<b>Gagal:</b> Error system.";

		
				
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
              <h6>Daftar</h6>
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
										} else if ($msg_type == "success") {
										?>
										<div class="alert alert-success">
											<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
											<i class="fa fa-times-circle"></i>
											<?php echo $msg_content; ?>
										</div>
										<?php }
										?>
                                    
                                        
                                        <div class="text-center w-75 m-auto">
                                            <img src="<?php echo $cfg_baseurl; ?>assets/images/mitra.png" width="200" height="200" class="rounded-circle img-thumbnail" alt="profile-image">
                                        </div><hr>
                                        
              <form method="POST">
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Email</label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control" name="email" placeholder="Masukkan Email" required>
                  </div>
                </div>
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
						<button type="submit" class="btn btn-primary shadow-primary btn-round px-5" name="daftar"><i class="icon-lock"></i> Daftar</button>
					  </div>
					</div>
              </form>
              Sudah punya akun? <a href="<?php echo $cfg_baseurl; ?>auth/login">Login!</a>
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