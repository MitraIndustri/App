<?php
session_start();
require("../config.php");

session_destroy();
unset($_COOKIE[$cookie_name]);
// empty value and expiration one hour before
setcookie($cookie_name, null, -1,'/');

$cookie_name = 'cloudpad';
unset($_COOKIE[$cookie_name]);
// empty value and expiration one hour before
setcookie($cookie_name, null, -1,'/');

$cookie_name = 'PHPSESSID';
unset($_COOKIE[$cookie_name]);
// empty value and expiration one hour before
setcookie($cookie_name, null, -1,'/');

$cookie_name = '__cfduid';
unset($_COOKIE[$cookie_name]);
// empty value and expiration one hour before
setcookie($cookie_name, null, -1,'/');

header("Location: ".$cfg_baseurl);