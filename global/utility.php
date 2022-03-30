<?php

function sendMessage($chatId, $msg, $token){
	$request_params = [
		'chat_id' => $chatId,
		'text' => $msg,
		'parse_mode' => 'html'
	];    
	
	$request_url = 'https://api.telegram.org/bot'. $token . '/sendMessage?' . http_build_query($request_params);

	file_get_contents($request_url);
}

function tglWaktuIndo($tglWaktu){
    $pisahSpasi =  explode(' ', $tglWaktu);
    $tanggal = $pisahSpasi[0];
    $waktu = $pisahSpasi[1];

	$bulan = array (
		1 =>   'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);
	$pecahkan = explode('-', $tanggal);
	
	// variabel pecahkan 0 = tanggal
	// variabel pecahkan 1 = bulan
	// variabel pecahkan 2 = tahun
	if($tanggal != ''){
		return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0] . ' ('.$waktu.')';
	}else{
		return 'Belum Tersedia';
	}
	
}

function statCairan($cairan, $cairMax, $cairMin){

    $batasPenuh = $cairMax * 0.9;
    $status = 'Error';

    if($cairan < $cairMin){
        $status = 'Kosong';
    }elseif($cairan >= $cairMin && $cairan <= $batasPenuh){
        $status = 'Normal';
    }elseif($cairan > $batasPenuh){
        $status = 'Penuh';
    }

    return $status;
}

?>