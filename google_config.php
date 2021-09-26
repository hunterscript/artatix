<?php

// Include Librari Google Client (API)
include_once 'plugin/google-client/Google_Client.php';
include_once 'plugin/google-client/contrib/Google_Oauth2Service.php';

$client_id = '543784125353-b7p82iggl60ltl98ktj6g0iuhj1q889j.apps.googleusercontent.com'; // Google client ID
$client_secret = 'A95fyZeuzUfx8J88dPDcfdEW'; // Google Client Secret
$redirect_url = 'http://localhost/artatix/google_login.php'; // Callback URL

// Call Google API
$gclient = new Google_Client();
$gclient->setApplicationName('Google Login'); // Set dengan Nama Aplikasi Kalian
$gclient->setClientId($client_id); // Set dengan Client ID
$gclient->setClientSecret($client_secret); // Set dengan Client Secret
$gclient->setRedirectUri($redirect_url); // Set URL untuk Redirect setelah berhasil login

$google_oauthv2 = new Google_Oauth2Service($gclient);

?>