<?php
session_start();
require("assets/config.php");
include("lib/header.php");
?>
    
    <!--====== TEAM START ======-->

    <section id="team" class="team-area pt-120 pb-130">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-10">
                    <div class="section-title text-center pb-30">
                        <h3 class="title">Developer</h3>
                        <p class="text">Team IT of SMK Mitra Industri MM2100</p>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
            <div class="row">
                <?php
            	$check = mysqli_query($db, "SELECT * FROM developer ORDER BY id ASC");
            	while ($data = mysqli_fetch_assoc($check)) {
            	?>
                <div class="col-lg-4 col-sm-6">
                    <div class="team-style-eleven text-center mt-30 wow fadeIn" data-wow-duration="1s" data-wow-delay="0s">
                        <div class="team-image">
                            <a target="_blank" href="<?php echo $data['website']; ?>">
                            <img src="<?php echo $data['foto']; ?>" alt="Team">
                            </a>
                            <br><br><br><br><br><br><br><br>
                        </div>
                        <div class="team-content">
                            <div class="team-social">
                                <ul class="social">
                                    <li><a href="https://facebook.com/<?php echo $data['facebook']; ?>"><i class="lni lni-facebook-filled"></i></a></li>
                                    <li><a href="https://linkedin.com/in/<?php echo $data['linkedin']; ?>"><i class="lni lni-twitter-original"></i></a></li>
                                    <li><a href="https://twitter.com/<?php echo $data['website']; ?>"><i class="lni lni-linkedin-original"></i></a></li>
                                    <li><a href="https://instagram.com/<?php echo $data['instagram']; ?>"><i class="lni lni-instagram"></i></a></li>
                                </ul>
                            </div>
                            <h4 class="team-name"><a target="_blank" href="<?php echo $data['website']; ?>"><?php echo $data['nama']; ?></a></h4>
                            <br>
                            <span class="sub-title"><?php echo nl2br(str_replace(‘‘, ‘‘, htmlspecialchars($data['job']))); ?></span>
                            <br>
                            <br>
                            <span class="sub-title"><?php echo nl2br(str_replace(‘‘, ‘‘, htmlspecialchars($data['desk']))); ?></span>
                        </div>
                    </div> <!-- single team -->
                </div>
                <?php } ?>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== TEAM  ENDS ======-->
    
<?php
include("lib/footer.php");
?>

</body>

</html>
