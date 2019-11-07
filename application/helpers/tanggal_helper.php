<?php 

function formatHariTanggal($tgl)
	{
		$hari_array = [
			'Minggu',
			'Senin',
			'Selasa',
			'Rabu',
			'Kamis',
			'Jumat',
			'Sabtu'
		];

		$hr = date('w', strtotime($tgl));
		$hari = $hari_array[$hr];

		$tanggal = date('j', strtotime($tgl));

		$bulan_array = [
			1 => 'Januari',
			2 => 'February',
			3 => 'Maret',
			4 => 'April',
			5 => 'Mei',
			6 => 'Juni',
			7 => 'Juli',
			8 => 'Agustus',
			9 => 'September',
			10 => 'Oktober',
			11 => 'November',
			12 => 'Desember',
		];

		$bl = date('n', strtotime($tgl));
		$bulan = $bulan_array[$bl];
		$tahun = date('Y', strtotime($tgl));

		return "$hari, $tanggal, $bulan, $tahun";
	}

	function waktu($waktu){
	
    if(($waktu>0) and ($waktu<60)){
        $lama=number_format($waktu,2)." detik";
        return $lama;
    }
    if(($waktu>60) and ($waktu<3600)){
        $detik=fmod($waktu,60);
        $menit=$waktu-$detik;
        $menit=$menit/60;
        $lama=$menit." Menit ".number_format($detik,2)." detik";
        return $lama;
    }
    elseif($waktu >3600){
        $detik=fmod($waktu,60);
        $tempmenit=($waktu-$detik)/60;
        $menit=fmod($tempmenit,60);
        $jam=($tempmenit-$menit)/60;    
        $lama=$jam." Jam ".$menit." Menit ".number_format($detik,2)." detik";
        return $lama;
    }

    echo $lama;
}
