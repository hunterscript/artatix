<?php
$base_http = 'localhost/artik/';
$root = '/artik/';
error_reporting(0);
	
$konek = mysqli_connect("localhost", "root", "", "prj_artatix");
	
if(mysqli_connect_errno()){
	printf ("Gagal terkoneksi : ".mysqli_connect_error());
	exit();
}
	
?>