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

$ini_t_ak = date('d-m-Y', strtotime($t_tanggal_akhir));
$ini_t_aw = date('d-m-Y', strtotime($t_tanggal_awal));

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
    <?php echo $ini; ?>
    <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="">
<div class="header">
<center><p style="text-align:center; font-size: 12px; font-weight:bold;">
<?php echo assets::images('rs-avisena-logo-cetak.jpg')?></p>
<br /><p style="text-align:center; font-size: 12px; font-weight:bold;">
LAPORAN DATA TRANSAKSI <br> <p style="font-size:12px; text-align:center;">Periode <?php echo $this->model_laporan->tanggal_indo($t_tanggal_awal, true).' - '.$this->model_laporan->tanggal_indo($t_tanggal_akhir, true);?></p></p></center>
</div>
		<p style="font-size: 12px; font-weight:bold; text-align:center;" ></p>
							<hr>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-striped">
                                    <thead>
                                        <th style="font-size: 10px; border: 1px dotted black;"><center>NO</center></th>
                                        <th style="font-size: 10px; border: 1px dotted black;"><center>TANGGAL</center></th>
										<th style="font-size: 10px; border: 1px dotted black;"><center>NO TRANSAKSI</center></th>
                                    	<th style="font-size: 10px; border: 1px dotted black;">GUNA BAYAR</th>
                                    	<th style="font-size: 10px; border: 1px dotted black;"><center>NOMINAL</center></th>
                                    	<th style="font-size: 10px; border: 1px dotted black;"><center>JUMLAH</center></th>
                                    	<th style="font-size: 10px; border: 1px dotted black;"><center>TOTAL</center></th>
                                    </thead>
                                    <tbody>
									<?php
									$sql= "SELECT * FROM transaksi  WHERE tanggal between '$t_tanggal_awal' AND '$t_tanggal_akhir' ORDER BY tanggal DESC";
									$query = $db->query($sql);
									while ($row = $query->fetch_assoc())
										
									{   $no++;
                                        echo "<tr>";
                                        echo "	<td style='font-size: 10px; border: 1px dotted black;'>$no</td>";
                                        echo "	<td style='font-size: 10px; border: 1px dotted black;'>$row[tanggal]</td>";
                                        echo "	<td style='font-size: 10px; border: 1px dotted black;'><center>$row[no_transaksi]</center></td>";
                                        echo "	<td style='font-size: 10px; border: 1px dotted black;'>$row[guna_bayar]</td>";
                                        $nominalnya = number_format ($row['nominal'], 0, ',', '.');
                                        echo "	<td style='font-size: 10px; border: 1px dotted black;'>Rp. $nominalnya</td>";
                                        echo "	<td style='font-size: 10px; border: 1px dotted black;'><center>$row[jumlah]</center></td>";
										$tabel_totalnya = number_format ($row['total'], 0, ',', '.');
										echo "	<td style='font-size: 10px; border: 1px dotted black;'>Rp. $tabel_totalnya</td>";
                                        echo "</tr>";
									}
                                    ?>
                                    </tbody>
									<tfoot>
									<?php
									
									$sql2= "select SUM(transaksi.total) AS total_semua from transaksi WHERE tanggal between '$t_tanggal_awal' AND '$t_tanggal_akhir'";
									$query = $db->query($sql2);
									while ($row2 = $query->fetch_assoc())
									{
										$initotal = $row2['total_semua'];

                                        echo "<tr>";
                                        echo "<td></td>";
                                        echo "</tr>";
									}
                                    ?>
                                    </tfoot>
                                </table>
								<hr>
        <table align="right" style="width:30%; height:10%;">
            <tr >
<td colspan="25" >
<b>Total keseluruhan : <?php $totalnya = number_format ($initotal, 0, ',', '.'); echo'Rp. '.$totalnya.',-';?></b>
</td>
            </tr>
        </table>
								<hr><td colspan="2"><center><b>Mengetahui :</b></center></td>
        <table align="right" style="width:10%; height:10%;">
            <tr >
               <td colspan="25" >
			   <br />
			   <br />
			   <br />
			   <br />
			   <br />
			   <br />
			   (.................................)
			   <center><b></b></center></td>
            </tr>
        </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</body>
</html>