<?php
require_once('./proses/proses_simpan_form_pasien.php');
?>
<div class="col-lg-8 col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">FORM PASIEN</h4>
                            </div>
                            <div class="content">
                                <form method="POST">
								 <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>No Pasien</label>
                                                <input type="text" class="form-control border-input" name="no_pasien_dis" placeholder="No Transaksi" value="<?php echo $value_no_pasien;?>" disabled="disabled">
                                                <input type="text" required="required" name="no_pasien" value="<?php echo $value_no_pasien;?>" hidden="hidden">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Gender</label>
                                                <select type="text" required="required" class="form-control border-input" name="gender">
		<?php
		if(isset($_GET['gen']))
		{
		switch($_GET['gen'])
		{
			case 'Laki-laki' : $ke1 = '<option value="Laki-laki">Laki-laki</option>'; 
							   $ke2 = '<option value="Perempuan">Perempuan</option>'; 
							   echo $ke1.''.$ke2;
			break;
			
			case 'Perempuan' : $ke1 = '<option value="Perempuan">Perempuan</option>'; 
							   $ke2 = '<option value="Laki-laki">Laki-laki</option>'; 
							   echo $ke1.''.$ke2;
			break;
		}
		}
		else
		{
			echo '<option value="Laki-laki">Laki-laki</option> <option value="Perempuan">Perempuan</option>';
		}
		?>
                                                </select>
                                            </div>
                                        </div>	
								 </div>										

								<hr size=50% width=100%>
								
                                    <div class="row"><div class="col-md-12">
                                            <div class="form-group">
                                                <label>Nama</label>
                                                <input type="text" required="required" class="form-control border-input" id="nama_pasien" name="nama_pasien" placeholder=" Nama Pasien " value="<?php echo $value_nama;?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Tanggal Lahir</label>
                                                <input type="date" class="form-control border-input" id="tanggal_lahir_pasien" name="tanggal_lahir_pasien" value="<?php echo $value_tanggal_lahir;?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Alamat</label>
                                                <input  type="text" required="required" class="form-control border-input" id="alamat_pasien" name="alamat_pasien" value="<?php echo $value_alamat;?>"  style="height:100px;" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-Left">
                                        <button type="submit" class="btn btn-info btn-fill btn-wd" name="<?php echo $value_submit;?>"><?php echo $value_tombol;?></button>
                                    </div>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>
					<hr>