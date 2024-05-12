<?php

session_start();
require("mainconfig.php");
$msg_type = "nothing";


if (isset($_SESSION['user'])) {
	$sess_username = $_SESSION['user']['username'];
	$check_user = mysqli_query($db, "SELECT * FROM users WHERE username = '$sess_username'");
	$data_user = mysqli_fetch_assoc($check_user);
	$username = $data_user['username'];
	
	if (mysqli_num_rows($check_user) == 0) {
		header("Location: ".$cfg_baseurl."logout.php");
	} else if ($data_user['status'] == "Suspended") { 
		header("Location: ".$cfg_baseurl."logout.php");
	exit();
	}

        $status = $data_user['status'];
        $nama = $data_user['nama'];

        $count_users = mysqli_num_rows(mysqli_query($db, "SELECT * FROM users"));
    
    $ua = $_SERVER['HTTP_USER_AGENT'];
    if(preg_match('#Mozilla/4.05 [fr] (Win98; I)#',$ua) || preg_match('/Java1.1.4/si',$ua) || preg_match('/MS FrontPage Express/si',$ua) || preg_match('/HTTrack/si',$ua) || preg_match('/IDentity/si',$ua) || preg_match('/HyperBrowser/si',$ua) || preg_match('/Lynx/si',$ua)) 
    {
    header('Location:http://shafou.com');
    die();
    }
} else {
	header("Location: ".$cfg_baseurl."auth/login");
}

include("lib/header.php");
if (isset($_SESSION['user'])) {
?>
<br/><br/><br/>
<div class="row">

				<div class="col-lg-12 mx-auto">			
                                <div class="card">
                                    <div class="card-body">
                                        <div class="member-card">
                                        <div class="text-center w-75 m-auto">
                                            <img src="https://www.davin.id/images/logo/404.png" width="200" height="200" class="rounded-circle img-thumbnail" alt="profile-image">
                                        </div>

                                        <div class="text-center w-75 m-auto">
                                            <h4 class="m-b-5 mt-2">Halaman Tidak Tersedia</h4>
                                            <p class="text-muted">Error 404 Not Found</p>
                                        </div> 


                                    </div>

                                </div> <!-- end card-box -->
                            </div> <!-- end col -->
                        </div>
			    </div>
			    
                            
<script>
            $('#informasi').modal('show');
            function baca_informasi() {
	        $.ajax({
		    type: "GET",
		    url: "<?php echo $cfg_baseurl; ?>user/read_news"
	       });
        }
        </script>
<?php
}
include("lib/footer.php");
?> 