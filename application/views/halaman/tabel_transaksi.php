
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

if(isset($_GET['hapus_id']))
{
mysql_query("DELETE FROM master where kode_transaksi = '$_GET[hapus_id]' ");
				echo "<script>
				window.location.href = 'master.php?f=active';
				</script>";
}
?>

    <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">TABEL DATA KWITANSI</h4><p class="category" align="right"><a class="btn btn-success btn-fill btn-wd" href="form_master.php?f=active&fn=add">Buat Kwitansi Baru ( + )</a></p>
                            </div>
							<hr>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-striped table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>KODE TRANSAKSI</th>
                                            <th>GUNA BAYAR</th>
                                            <th>NOMINAL</th>
                                            <th>JUMLAH</th>
                                            <th>AKSI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
        <?php
        $sql = "select * from master";
        $query = $db->query($sql);

        while ($row = $query->fetch_assoc()) :?>
                                        <tr>
										<td><?php echo $row['kode_transaksi'];?></td>
										<td><?php echo $row['guna_bayar'];?></td>
										<td><?php
				$number = $row['nominal'];
				$format_indonesia = number_format ($number, 0, ',', '.');
				echo "Rp. ".$format_indonesia;
										?></td>
										<td><?php $stringedit =  str_replace(" ", "+", $row['guna_bayar']); echo"<a class='btn btn-primary btn-xs' href='form_master.php?f=active&fn=edit&id=".$row['kode_transaksi']."&gb=".$stringedit."&nom=".$row['nominal']."'>📝</a> | <a class='btn btn-danger btn-xs' href='master.php?f=active&hapus_id=".$row['kode_transaksi']."'>❌</a>";?></td>
                                        </tr>
        <?php endwhile;?>
                                    </tbody>
                                </table>
                            </div>
                         </div>  
                        </div>
						</div>

