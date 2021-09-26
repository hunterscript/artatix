<?php

  session_start();

  $tiketID = $_GET['id'];

  foreach ($_SESSION['cart'] as $index => $data) {
      if ($data['id'] == $tiketID) {
          unset($_SESSION['cart'][$index]);
          // echo"data ditemukan";
      }else{
        // echo"data tidak ditemukan";
      }
  }

  $_SESSION['message'] = "Cart Berhasil Dihapus";

  header('location:page_event_cart_list.php');
?>
