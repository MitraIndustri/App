<?php
session_start();
require("assets/config.php");

    $post = $_GET['1'];
	$check = mysqli_query($db, "SELECT * FROM information WHERE target = '$post'");
	$data = mysqli_fetch_assoc($check);
	if (mysqli_num_rows($check) == 0) {
		header("Location: ".$cfg_baseurl);
	}
		
include("lib/header.php");
?>
    
    <!--====== TEAM START ======-->

    <section id="team" class="team-area pt-120 pb-130">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-10">
                    <div class="section-title text-center pb-30">
                        <h3 class="title"><?php echo $data['judul']; ?></h3>
                        <p class="text"><?php echo $data['dates']; ?></p>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
            <div class="row">
                
                <center><img src="<?php echo $data['gambar']; ?>" width="100%"></center>
                
                <br>
                <br>
                
                <?php echo nl2br(str_replace(‘‘, ‘‘, htmlspecialchars($data['isi']))); ?>
                
                <br>
                <br>
                <br>
                <br>
                <br>
                
                Di update pada : <?php echo $data['date']; ?> pukul <?php echo $data['time']; ?>
                
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== TEAM  ENDS ======-->
    
<?php
include("lib/footer.php");
?>

</body>

</html>
