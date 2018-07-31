    <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Data Penilaian Agent Call Center</h4>
                                <p class="category">Lihat Per Periode<br>
								<form method=post action=nilai2.php><input type=date name=awal> s/d <input type=date name=akhir> &nbsp; <input type=submit value=Filter></p></form>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-striped">
                                    <thead align="center">
                                       <th>Tanggal</th>
										<th>NIP</th>
                                        <th>UTILSASI</th>
                                        <th>CALL</th>
                                        <th>AUX</th>
                                        <th>AHT</th>
                                        <th>OCC</th>
                                        <th>CWC</th>
                                        <th>PNP</th>
                                        <th>QM</th>
                                        <th>Catatan</th>
                                    	
                                    </thead>
                                    <tbody>
									<?php
									include "koneksi.php";
									$view=mysql_query("select * from penilaian");
									while ($data=mysql_fetch_array($view))
									{
                                        echo "<tr>";
                                        echo "	<td>$data[1]</td>";
                                        echo "	<td>$data[2]</td>";
                                        echo "	<td>$data[3]</td>";
                                        echo "	<td>$data[4]</td>";
                                        echo "	<td>$data[5]</td>";
                                        echo "	<td>$data[6]</td>";
                                        echo "	<td>$data[7]</td>";
                                        echo "	<td>$data[8]</td>";
                                        echo "	<td>$data[9]</td>";
                                        echo "	<td>$data[10]</td>";
                                        echo "	<td>$data[11]</td>";
                                        echo "</tr>";
									}
                                    ?>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>


              

                </div>
            </div>
        