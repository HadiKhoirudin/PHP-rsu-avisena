<?php
// memanggil file config.php
/** 
 * @var informasi untuk koneksi database 
 */
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'db-rsu-avisena.com';

/** koneksi ke database */
$db = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

// check koneksi
if ($db->connect_error) {
	die('Oops!! Terjadi error : ' . $db->connect_error);
}

	function penyebut($nilai) {
		$nilai = abs($nilai);
		$huruf = array("", "SATU", "DUA", "TIGA", "EMPAT", "LIMA", "ENAM", "TUJUH", "DELAPAN", "SEMBILAN", "SEPULUH", "SEBELAS");
		$temp = "";
		if ($nilai < 12) {
			$temp = " ". $huruf[$nilai];
		} else if ($nilai <20) {
			$temp = penyebut($nilai - 10). " BELAS";
		} else if ($nilai < 100) {
			$temp = penyebut($nilai/10)." PULUH". penyebut($nilai % 10);
		} else if ($nilai < 200) {
			$temp = " SERATUS" . penyebut($nilai - 100);
		} else if ($nilai < 1000) {
			$temp = penyebut($nilai/100) . " RATUS" . penyebut($nilai % 100);
		} else if ($nilai < 2000) {
			$temp = " SERIBU" . penyebut($nilai - 1000);
		} else if ($nilai < 1000000) {
			$temp = penyebut($nilai/1000) . " RIBU" . penyebut($nilai % 1000);
		} else if ($nilai < 1000000000) {
			$temp = penyebut($nilai/1000000) . " JUTA" . penyebut($nilai % 1000000);
		} else if ($nilai < 1000000000000) {
			$temp = penyebut($nilai/1000000000) . " MILIYAR" . penyebut(fmod($nilai,1000000000));
		} else if ($nilai < 1000000000000000) {
			$temp = penyebut($nilai/1000000000000) . " TRILIYUN" . penyebut(fmod($nilai,1000000000000));
		}     
		return $temp;
	}
 
	function terbilang($nilai) {
		if($nilai<0) {
			$hasil = "minus ". trim(penyebut($nilai));
		} else {
			$hasil = trim(penyebut($nilai));
		}     		
		return $hasil;
	}
	 

?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
    <?php echo assets::icon('apple-icon.png'); ?>
    <?php echo assets::icon('favicon.png'); ?>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>RS App</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <!-- Bootstrap core CSS     -->
    <?php echo assets::css('bootstrap.min.css'); ?>

    <?php echo assets::css('style.css'); ?>

</head>
<body>
    <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="">
<div class="header">
<center><p style="text-align:center; font-size: 12px; font-weight:bold;">
<?php echo assets::images('rs-avisena-logo-cetak-kwitansi.jpg')?></p>
<br /></div>
		<p style="font-size: 12px; font-weight:bold; text-align:right;" ><?php echo '[Nomor : '.$no_transaksi.']';?></p>
							<hr>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-striped">
                                    <tr><td style="font-size: 15px;">Telah diterima dari </td><td style="font-size: 15px;"><?php echo $nama_pasien; ?></td><tr>
                                    <tr><td style="font-size: 15px;"></td><td style="font-size: 15px;"><br></td><tr>
                                    <tr><td style="font-size: 15px;">Uang sejumlah</td><td style="font-size: 15px;"><?php echo terbilang($total).' RUPIAH'; ?></td><tr>
                                    <tr><td style="font-size: 15px;"></td><td style="font-size: 15px;"><br></td><tr>
                                    <tr><td style="font-size: 15px;"></td><td style="font-size: 15px;"><br></td><tr>
                                    <tr><td style="font-size: 15px;">Untuk pembayaran</td><td style="font-size: 15px;"><?php echo $guna_bayar; ?></td><tr>
                                    <tbody>
									<tfoot>
                                    </tfoot>
                                </table>

        <table align="right" style="width:30%; height:10%;">
        </table>

								<hr>
        <table align="right" style="width:100%; height:14%;">
            <tr >
               <td style="text-align: left; font-size: 15px" >
			   [   <?php echo 'Rp '.number_format($total, 0, ',', '.');?>   ]
			   </td>
               <td style="text-align: right; font-size: 15px" >
			   [   <?php  echo date('d F Y', strtotime($tanggal));?>   ]
			   </td>
            </tr>
        </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</body>
</html>