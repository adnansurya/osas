<?php
// session_start();  
include 'global/db_access.php';
include 'global/utility.php';

$jam_telat = 11;
$menit_telat = 0;

$waktu = $date->format('Y-m-d H:i:s');
$stat = 'Empty';
// if(($_SESSION['login_role'] == 'Admin')){    

    if(isset($_GET['card'])){
        
        $load = mysqli_query($conn, "SELECT * FROM data_siswa WHERE id_card = '".$_GET['card']."'" );        
        $count = mysqli_num_rows($load);
        $stat = 'Empty';
        if($count == 1 ) {
            
            $jam_masuk = (int) $date->format('G');
            $menit_masuk = (int) $date->format('i');
            $stat = 'Empty';

            if($jam_masuk > $jam_telat && $menit_masuk > $menit_telat){
                $stat = 'Terlambat';
            }else{
                $stat = 'Tepat Waktu';
            }

            $row = mysqli_fetch_array($load,MYSQLI_ASSOC);
            $nama = $row['nama'];
            $nomor_induk = $row['nomor_induk'];

            if($nama == '' && $nomor_induk == ''){
                $stat = 'Invalid';
                echo "Data Tidak Valid";
            }else{
                echo $nama.' ---- '. $stat; 
                $pesan = 'Nama : '.$nama.PHP_EOL.'Waktu Absen : '.tglWaktuIndo($waktu).PHP_EOL."Status : ".$stat;
                sendMessage($chat_id, $pesan, $botToken);
            }   

            

           
                      
                                  
        }else{
            echo 'Belum Terdaftar. ';

            $stat = 'Tidak Dikenali';

           

            $sql = "INSERT INTO data_siswa (id_card) VALUES ('".$_GET['card']."')";

        
            if(!mysqli_query($conn, $sql)){
                echo "Gagal menambah Waitlist";
            }else{
                echo "Menambahkan ke Waitlist";                   
            }  
        }
    }else{
        echo 'Kesalahan Pembacaan';
    }

     


    $sql = "INSERT INTO log_absen (id_card, status, waktu) VALUES ('".$_GET['card']."','".$stat."','".$waktu."')";


    if(!mysqli_query($conn, $sql)){
        echo "LOG ERROR!";
        echo("Error log: " . $conn -> error);
    }    

?>