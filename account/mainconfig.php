<?php

date_default_timezone_set('Asia/Jakarta');

// database
$db_server = "localhost";
$db_user = "lpdwgyvk_app";
$db_password = "lpdwgyvk_app";
$db_name = "lpdwgyvk_app";
$device = $_SERVER['HTTP_USER_AGENT'];
$request = $_SERVER['REQUEST_TIME'];
$uri = $_SERVER['SCRIPT_URI'];
$ip = $_SERVER['REMOTE_ADDR'];
$location = "Indonesian";

// date & time
$bulan = array(
                '01' => 'Januari',
                '02' => 'Februari',
                '03' => 'Maret',
                '04' => 'April',
                '05' => 'Mei',
                '06' => 'Juni',
                '07' => 'Juli',
                '08' => 'Agustus',
                '09' => 'September',
                '10' => 'Oktober',
                '11' => 'November',
                '12' => 'Desember',
        );
$dates = date('d').' '.(strtolower($bulan[date('m')])).' '.date('Y');
$date = date("Y-m-d");
$time = date("H:i:s");

// require
require("lib/database.php");
require("lib/function.php");

$check_website = mysqli_query($db, "SELECT * FROM website WHERE target = 'mitra'");
$data_website = mysqli_fetch_assoc($check_website);

$check_user = mysqli_query($db, "SELECT * FROM users WHERE username = '$sess_username'");
$data_user = mysqli_fetch_assoc($check_user);
$data_siswaa = $data_user['status'];

$cfg_webname = $data_website['webname'];
$cfg_baseurl = 'https://smkmitraindustrimm2100.com/account/';
$cfg_desc = $data_website['descc'];
$cfg_author = $data_website['author'];
$cfg_development = $data_website['development'];
$cfg_logo_txt = $data_website['logo_txt'];
$cfg_about = $data_website['about'];
$home = $data_website['home'];
$cfg_apikey = $data_website['apikey'];
$cfg_bot = $data_website['bot'];
$z = $data_website['z'];
$home = $data_website['home'];
$tab1 = $data_website['enter1'];
$tab2 = $data_website['enter2'];