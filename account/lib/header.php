<?php
error_reporting(0);

    $check_user = mysqli_query($db, "SELECT * FROM users WHERE username = '$sess_username'");
	$data_user = mysqli_fetch_assoc($check_user);
	$theme = $data_user['theme'];
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <!-- Untuk Chrome & Opera -->
  <meta name="theme-color" content="#357ffa"/>
  <!-- Untuk Windows Phone -->
  <meta name="msapplication-navbutton-color" content="#357ffa"/>
  <meta name="apple-mobile-web-app-status-bar-style" content="#357ffa"/>
  <meta name="description" content="Davin Wardana">
  <meta name="author" content="Davin Wardana">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title><?php echo $cfg_webname; ?></title>
  <!-- Iconic Fonts -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo $cfg_baseurl; ?>vendors/iconic-fonts/flat-icons/flaticon.css">
  <!-- Bootstrap core CSS -->
  <link rel="shortcut icon" href="<?php echo $cfg_baseurl; ?>assets/images/SMK_Mitra_Industri.png">
  <link href="https://davin.id/assets/css/bootstrap.min.css" rel="stylesheet">
  <!-- jQuery UI -->
  <link href="https://davin.id/assets/css/jquery-ui.min.css" rel="stylesheet">
  <!-- Mystic styles -->
  <link href="https://davin.id/assets/css/first.css" rel="stylesheet">
  <!-- Page Specific Css (Datatables.css) -->
  <link href="https://davin.id/assets/css/datatables.min.css" rel="stylesheet">
  <link href="https://davin.id/assets/css/icons.css" rel="stylesheet" type="text/css">
  <!-- Page Specific CSS (Morris Charts.css) -->
  <link href="<?php echo $cfg_baseurl; ?>assets/css/morris.css" rel="stylesheet">
  <link href="https://davin.id/assets/plugins/morris/morris.css" rel="stylesheet" />
  <script src="https://davin.id/assets/plugins/morris/morris.min.js"></script>
  <script src="https://davin.id/assets/plugins/raphael/raphael-min.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <!-- Favicon -->

</head>

<body class="ms-body ms-aside-left-open ms-<?php echo $theme ?>-theme">

  <!-- Setting Panel -->
  <!--<div class="ms-toggler ms-settings-toggle ms-d-block-lg">-->
  <!--  <i class="flaticon-paint"></i>-->
  <!--</div>-->
  <!--<div class="ms-settings-panel ms-d-block-lg">-->
  <!--  <div class="row">-->

  <!--    <div class="col-xl-4 col-md-4">-->
  <!--      <h4 class="section-title">Customize</h4>-->
  <!--      <div>-->
  <!--        <label class="ms-switch">-->
  <!--          <input type="checkbox" id="dark-mode">-->
  <!--          <span class="ms-switch-slider round"></span>-->
  <!--        </label>-->
  <!--        <span> Dark Mode </span>-->
  <!--      </div>-->
  <!--      <div>-->
  <!--        <label class="ms-switch">-->
  <!--          <input type="checkbox" id="remove-quickbar active" active>-->
  <!--          <span class="ms-switch-slider round"></span>-->
  <!--        </label>-->
  <!--        <span> Remove Quickbar </span>-->
  <!--      </div>-->
  <!--    </div>-->
  <!--    <div class="col-xl-4 col-md-4">-->
  <!--      <h4 class="section-title">Keyboard Shortcuts</h4>-->
  <!--      <p class="ms-directions mb-0"><code>Esc</code> Close Quick Bar</p>-->
  <!--      <p class="ms-directions mb-0"><code>Alt + (1 -> 6)</code> Open Quick Bar Tab</p>-->
  <!--      <p class="ms-directions mb-0"><code>Alt + Q</code> Enable Quick Bar Configure Mode</p>-->

  <!--    </div>-->


  <!--  </div>-->
  <!--</div>-->

  <!-- Preloader -->
  <div id="preloader-wrap">
    <div class="spinner spinner-8">
      <div class="ms-circle1 ms-child"></div>
      <div class="ms-circle2 ms-child"></div>
      <div class="ms-circle3 ms-child"></div>
      <div class="ms-circle4 ms-child"></div>
      <div class="ms-circle5 ms-child"></div>
      <div class="ms-circle6 ms-child"></div>
      <div class="ms-circle7 ms-child"></div>
      <div class="ms-circle8 ms-child"></div>
      <div class="ms-circle9 ms-child"></div>
      <div class="ms-circle10 ms-child"></div>
      <div class="ms-circle11 ms-child"></div>
      <div class="ms-circle12 ms-child"></div>
    </div>
  </div>

  <!-- Overlays -->
  <div class="ms-aside-overlay ms-overlay-left ms-toggler" data-target="#ms-side-nav" data-toggle="slideLeft"></div>
  <div class="ms-aside-overlay ms-overlay-right ms-toggler" data-target="#ms-recent-activity" data-toggle="slideRight"></div>

  <!-- Sidebar Navigation Left -->
  <aside id="ms-side-nav" class="side-nav fixed ms-aside-scrollable ms-aside-left">
    <!-- Navigation -->
    <ul class="accordion ms-main-aside fs-14" id="side-nav-accordion">
      <!-- Dashboard -->
      <br><br><br><br><br>
        <li class="menu-item">
          <a href="<?php echo $home; ?>">
            <span><i class="material-icons fs-16">apps</i>Main Page</span>
          </a>
        </li>
      <?php if (isset($_SESSION['user'])) {
      ?>
        <?php
        if ($data_user['status'] == "Admin") {
        ?>
          <!--<li class="menu-item">-->
          <!--  <a href="#" class="has-chevron" data-toggle="collapse" data-target="#admin" aria-expanded="false" aria-controls="admin">-->
          <!--    <span><i class="material-icons fs-16">account_circle</i>Menu Admin</span>-->
          <!--  </a>-->
          <!--  <ul id="admin" class="collapse" aria-labelledby="admin" data-parent="#side-nav-accordion">-->
          <!--    <li><a href="<?php echo $cfg_baseurl; ?>kelola/pelanggaran">Kelola Data Pelanggaran</a></li>-->
          <!--  </ul>-->
          <!--</li>-->
        <?php
        }
        ?>
      <?php
      } else {
      ?>
        <!-- /Maps -->
        <li class="menu-item">
          <a href="<?php echo $cfg_baseurl; ?>auth/login">
            <span><i class="material-icons fs-16">airplay</i>Masuk</span>
          </a>
        </li>
      <?php
      }
      ?>
      <!-- /Apps -->
    </ul>


  </aside>

  <!-- Main Content -->
  <main class="body-content">
    <!-- Navigation Bar -->
    <nav class="navbar ms-navbar fixed-top">
      <div class="ms-aside-toggler ms-toggler pl-0" data-target="#ms-side-nav" data-toggle="slideLeft">
        <span class="ms-toggler-bar bg-primary"></span>
        <span class="ms-toggler-bar bg-primary"></span>
        <span class="ms-toggler-bar bg-primary"></span>
      </div>

      <center>
        <h3><b><?php echo $cfg_webname; ?></b></h3>
      </center>

      <ul class="ms-nav-list ms-inline mb-0" id="ms-nav-options">
        <!--<li class="ms-nav-item ms-search-form pb-0 py-0">-->
        <!--  <form class="ms-form" method="post">-->
        <!--    <div class="ms-form-group my-0 mb-0 has-icon fs-14">-->
        <!--      <input type="search" class="ms-form-input" name="search" placeholder="Search here..." value="">-->
        <!--      <i class="flaticon-search text-disabled"></i>-->
        <!--    </div>-->
        <!--  </form>-->
        <!--</li>-->

        <li class="ms-nav-item dropdown">
          <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="notificationDropdown">
            <li class="dropdown-menu-header">
              <h6 class="dropdown-header ms-inline m-0"><span class="text-disabled">Notifications</span></h6><span class="badge badge-pill badge-info">2 New</span>
            </li>
            <li class="dropdown-divider"></li>
            <li class="ms-scrollable ms-dropdown-list">
              <a class="media p-2" href="#">
                <div class="media-body">
                  <span>Selamat beraktivitas <?php echo $data_user['nama']; ?></span>
                  <p class="fs-10 my-1 text-disabled"><i class="material-icons">access_time</i> 5 seconds ago</p>
                </div>
              </a>
            </li>
            <li class="dropdown-divider"></li>
            <li class="dropdown-menu-footer text-center">
              <a href="#">View all Notifications</a>
            </li>
          </ul>
        </li>
        <?php if (isset($_SESSION['user'])) {
        ?>
          <li class="ms-nav-item ms-nav-user dropdown">
            <a href="#" id="userDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <img class="ms-user-img ms-img-round float-right" src="<?php echo $data_user['profile']; ?>" alt="people"> </a>
            <ul class="dropdown-menu dropdown-menu-right user-dropdown" aria-labelledby="userDropdown">
              <li class="dropdown-menu-header">
                <h6 class="dropdown-header ms-inline m-0"><span class="text-disabled">Welcome, <?php echo $data_user['nama']; ?></span></h6>
              </li>
              <li class="dropdown-divider"></li>
              <li class="ms-dropdown-list">
                <a class="media fs-14 p-2" href="<?php echo $home; ?>account"> <span><i class="flaticon-gear mr-2"></i> Account Settings</span> </a>
              </li>
              <li class="dropdown-divider"></li>
              <li class="dropdown-menu-footer">
              </li>
              <li class="dropdown-menu-footer">
                <a class="media fs-14 p-2" href="<?php echo $cfg_baseurl; ?>logout"> <span><i class="flaticon-shut-down mr-2"></i> Logout</span> </a>
              </li>
            </ul>
          </li>
      </ul>

      <div class="ms-toggler ms-d-block-sm pr-0 ms-nav-toggler" data-toggle="slideDown" data-target="#ms-nav-options">
        <span class="ms-toggler-bar bg-primary"></span>
        <span class="ms-toggler-bar bg-primary"></span>
        <span class="ms-toggler-bar bg-primary"></span>
      </div>
    <?php
        }
    ?>
    </nav>

    <?php echo $z; ?>
        
    </nav>
    <!-- Body Content Wrapper -->
    <div class="ms-content-wrapper">
        <br><br><br>