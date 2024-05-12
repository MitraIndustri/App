<?php
session_start();
require("mainconfig.php");

if (isset($_SESSION['user'])) {
	$sess_username = $_SESSION['user']['username'];
	$check_user = mysqli_query($db, "SELECT * FROM users WHERE username = '$sess_username'");
	$data_user = mysqli_fetch_assoc($check_user);
	if (mysqli_num_rows($check_user) == 0) {
		header("Location: ".$cfg_baseurl."logout.php");
	} else if ($data_user['status'] == "Suspended") {
		header("Location: ".$cfg_baseurl."logout.php");
	}
}

//api dari kawalcorona.com
$url = file_get_contents('https://api.kawalcorona.com/indonesia/');
$data = json_decode($url,true);

include("lib/header.php");
?>
<br><br><br>
<div class="row">
<div class="col-xl-6 col-md-4">
          <div class="ms-card card-gradient-danger ms-widget ms-infographics-widget">
            <div class="ms-card-body media">
              <div class="media-body">
                <h6>Data dari Negara</h6>
                <p class="ms-card-change"><?php echo "" . $data[0]['name'] . "<br/>"; ?></p>
                <p class="fs-12"><?php echo $date; ?></p>
              </div>
            </div>
            <i class="flaticon-user"></i>
          </div>
        </div>

        <div class="col-xl-6 col-md-4">
          <div class="ms-card card-gradient-primary ms-widget ms-infographics-widget">
            <div class="ms-card-body media">
              <div class="media-body">
                <h6>Total Positif</h6>
                <p class="ms-card-change"><?php echo "" . $data[0]['positif'] . " Orang <br/>"; ?></p>
                <p class="fs-12"><?php echo $date; ?></p>
              </div>
            </div>
            <i class="flaticon-user"></i>
          </div>
        </div>

        <div class="col-xl-6 col-md-4">
          <div class="ms-card card-gradient-info ms-widget ms-infographics-widget">
            <div class="ms-card-body media">
              <div class="media-body">
                <h6>Total Sembuh</h6>
                <p class="ms-card-change"><?php echo "" . $data[0]['sembuh'] . " Orang <br/>"; ?></p>
                <p class="fs-12"><?php echo $date; ?></p>
              </div>
            </div>
            <i class="flaticon-user"></i>
          </div>
        </div>

        <div class="col-xl-6 col-md-4">
          <div class="ms-card card-gradient-light ms-widget ms-infographics-widget">
            <div class="ms-card-body media">
              <div class="media-body">
                <h6>Total Meninggal</h6>
                <p class="ms-card-change"><?php echo "" . $data[0]['meninggal'] . " Orang <br/>"; ?></p>
                <p class="fs-12"><?php echo $date; ?></p>
              </div>
            </div>
            <i class="flaticon-user"></i>
          </div>
        </div>
        </div>

<div class="ms-panel">
            <div class="ms-panel-header">
              <h6>Info Korban Covid-19</h6>
            </div>
            <div class="ms-panel-body">
<b>Distribute</b>
<br>
<br>
<ul>
<li>- Api : api.kawalcorona.com</li>
<li>- Powered : davin.id</li>
<li>- Update : <?php echo $date; ?></li>
</ul>
<br>
<b>Hastag Peduli Corona</b>
<br>
<br>
<p>
#covid-19<br>
#corona<br>
#wabahcorona<br>
#kitapeduli<br>
#timmedis<br>
#pejuangcovid<br>
</p>
</div>
</div>
</div>
</div>
                    </div>
                    <!-- end container -->
                </div>
                <!-- end content -->

<?php
include("lib/footer.php");
?>