<?php
session_start();

include 'google_config.php';
$gclient->revokeToken();
session_destroy();
header("location:page_login.php?pesan=logout");
?>