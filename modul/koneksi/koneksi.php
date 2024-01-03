<?php
 //koneksi ke database danau indah utama
 $server = "localhost";
 $user = "root";
 $pass = "";
 $dbname = "db_danauindahutama";

 $koneksi = mysqli_connect($server,$user,$pass,$dbname);
 if(mysqli_connect_errno()){
  echo "Koneksi database gagal".mysqli_connect_error();
 }
?>
