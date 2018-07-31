
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
mysql_query("DELETE FROM login where id = '$_GET[hapus_id]' ");
				echo "<script>
				window.location.href = 'settings.php';
				</script>";
}
?>

    <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">TABEL DATA LOGIN</h4>
								<?php
										switch ($t_akses)
										{
											case 'Admin' : echo'<p class="category" align="right"><a class="btn btn-primary btn-fill btn-wd" href="form_settings?fn=add">Tambah Data Login ( + )</a></p>'; break;
											case 'User' : echo'<p class="category" align="right"><a class="btn btn-primary btn-fill btn-wd" href="form_settings?fn=add" disabled="disabled">Tambah Data Login ( + )</a></p>'; break;
										}
								?>
								
                            </div>
							<hr>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-striped table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>USERNAME</th>
                                            <th>PASSWORD</th>
                                            <th>AKSES</th>
                                            <th>NAMA</th>
                                            <th>NO PONSEL</th>
                                            <th>AKSI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
        <?php
        $sql = "select * from login";
        $query = $db->query($sql);

        while ($row = $query->fetch_assoc()) :?>
                                        <tr>
										<td><?php echo $row['id'];?></td>
										<td><?php echo $row['username'];?></td>
										<td><?php echo '▫▫▫▫▫▫▫▫▫▫▫▫▫▫▫▫▫▫▫▫';?></td>
										<td><?php echo $row['akses'];?></td>
										<td><?php echo $row['nama'];?></td>
										<td><?php echo $row['no_ponsel'];?></td>
										<td><?php 
										$stringedit_nama =  str_replace(" ", "+", $row['nama']); 
										$stringedit_user =  str_replace(" ", "+", $row['username']); 
										
										switch ($t_akses)
										{
											case 'Admin' : echo"<a class='btn btn-primary btn-xs' href='form_settings?fn=edit&id=".$row['id']."&nm=".$stringedit_nama."&usr=".$stringedit_user."&pws=".$row['password']."&aks=".$row['akses']."&nope=".$row['no_ponsel']."'>📝</a> | <a class='btn btn-danger btn-xs' href='".base_url('/layanan/delete_settings')."?hapus_id=".$row['id']."'>❌</a>"; break;
											case 'User' : echo" &nbsp; 📛 "; break;
										}
										?>
										
										</td>
                                        </tr>
        <?php endwhile;?>
                                    </tbody>
                                </table>
                            </div>
                         </div>  
                        </div>
						</div>

