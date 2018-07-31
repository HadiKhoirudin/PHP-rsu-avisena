
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

if(isset($_GET['hapus_no']))
{
mysql_query("DELETE FROM pasien where no_pasien = '$_GET[hapus_no]' ");
				echo "<script>
				window.location.href = 'pasien.php?p=active';
				</script>";
}
?>

    <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">TABEL DATA PASIEN</h4><p class="category" align="right"><a class="btn btn-primary btn-fill btn-wd" href="form_pasien.php?p=active&fn=add">Tambah Data Pasien ( + )</a></p>
                            </div>
							<hr>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-striped table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>NO PASIEN</th>
                                            <th>NAMA</th>
                                            <th>GENDER</th>
                                            <th>TANGGAL LAHIR</th>
                                            <th>ALAMAT</th>
                                            <th>AKSI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
        <?php
        $sql = "select * from pasien";
        $query = $db->query($sql);

        while ($row = $query->fetch_assoc()) :?>
                                        <tr>
										<td><?php echo $row['no_pasien'];?></td>
										<td><?php echo $row['nama_pasien'];?></td>
										<td><?php echo $row['gender_pasien'];?></td>
										<td><?php echo $row['tanggal_lahir'];?></td>
										<td><?php echo $row['alamat_pasien'];?></td>
										<td><?php 
										$stringedit_nama =  str_replace(" ", "+", $row['nama_pasien']); 
										$stringedit_alamat_pasien =  str_replace(" ", "+", $row['alamat_pasien']); 
										echo"<a class='btn btn-primary btn-xs' href='form_pasien.php?p=active&fn=edit&nop=".$row['no_pasien']."&nm=".$stringedit_nama."&gen=".$row['gender_pasien']."&tgll=".$row['tanggal_lahir']."&almt=".$row['alamat_pasien']."'>📝</a> | <a class='btn btn-danger btn-xs' href='pasien.php?p=active&hapus_no=".$row['no_pasien']."'>❌</a>";?></td>
                                        </tr>
        <?php endwhile;?>
                                    </tbody>
                                </table>
                            </div>
                         </div>  
                        </div>
						</div>

