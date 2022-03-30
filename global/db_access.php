<?php

$conn = mysqli_connect("localhost", "root", "", "project_osas");

$date = new DateTime("now", new DateTimeZone('Asia/Makassar') );

$waktu = $date->format('Y-m-d H:i:s');

$botToken = '683304869:AAGz6uJlpmpk_DcWQUxx2R1uwRUXHW6jFtk';
$chat_id = '108488036';
// echo $date->format('G');
?>