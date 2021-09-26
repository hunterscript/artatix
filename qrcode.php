<?php
session_start();
include "koneksi/koneksi.php";
include "plugin/phpqrcode/qrlib.php";
   // outputs image directly into browser, as PNG stream
   QRcode::png('RSV001 :)');
?>


<!DOCTYPE html>
<html lang="zxx" class="no-js">


</html>